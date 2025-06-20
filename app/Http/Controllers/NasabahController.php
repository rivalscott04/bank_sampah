<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use App\Models\Transaction;
use App\Models\PickupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NasabahController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $totalPoints = $user->points->total_points ?? 0;
        $totalTransactions = $user->transactions()->count();
        $pendingPickups = $user->pickupRequests()->where('status', 'pending')->count();

        // Menambahkan variabel totalWeight dari field weight di tabel transactions
        $totalWeight = $user->transactions()->sum('weight') ?? 0;

        $recentTransactions = $user->transactions()
            ->with('waste')
            ->latest()
            ->take(5)
            ->get();

        $recentPickups = $user->pickupRequests()
            ->with('waste')
            ->latest()
            ->take(5)
            ->get();

        return view('nasabah.dashboard', compact(
            'totalPoints',
            'totalTransactions',
            'pendingPickups',
            'totalWeight',
            'recentTransactions',
            'recentPickups'
        ));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('nasabah.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'current_password' => 'nullable|required_with:password',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Check current password if new password is provided
        if ($request->password) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
            }
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('nasabah.profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function wastes()
    {
        $wastes = Waste::with('category')->paginate(12);
        return view('nasabah.wastes', compact('wastes'));
    }

    public function transactions()
    {
        $user = Auth::user();
        $transactions = $user->transactions()
            ->with('waste')
            ->latest()
            ->paginate(10);

        return view('nasabah.transactions', compact('transactions'));
    }

    public function pickupRequests()
    {
        $user = Auth::user();
        $pickupRequests = $user->pickupRequests()
            ->with('waste')
            ->latest()
            ->paginate(10);

        return view('nasabah.pickup-requests.index', compact('pickupRequests'));
    }

    public function createPickupRequest()
    {
        $wastes = Waste::with('category')->get();
        return view('nasabah.pickup-requests.create', compact('wastes'));
    }

    public function storePickupRequest(Request $request)
    {
        $request->validate([
            'waste_id' => 'required|exists:wastes,id',
            'address' => 'required|string|max:500',
            'date_request' => 'required|date|after:today',
            'estimated_weight' => 'required|numeric|min:0.1',
        ]);

        PickupRequest::create([
            'user_id' => Auth::id(),
            'waste_id' => $request->waste_id,
            'address' => $request->address,
            'date_request' => $request->date_request,
            'estimated_weight' => $request->estimated_weight,
            'status' => 'pending',
        ]);

        return redirect()->route('nasabah.pickup-requests')->with('success', 'Permintaan jemput sampah berhasil dikirim.');
    }

    public function showPickupRequest(PickupRequest $pickupRequest)
    {
        // Ensure user can only view their own pickup requests
        if ($pickupRequest->user_id !== Auth::id()) {
            abort(403);
        }

        $pickupRequest->load('waste');
        return view('nasabah.pickup-requests.show', compact('pickupRequest'));
    }

    public function editPickupRequest(PickupRequest $pickupRequest)
    {
        // Ensure user can only edit their own pickup requests and only if pending
        if ($pickupRequest->user_id !== Auth::id() || $pickupRequest->status !== 'pending') {
            abort(403);
        }

        $wastes = Waste::with('category')->get();
        return view('nasabah.pickup-requests.edit', compact('pickupRequest', 'wastes'));
    }

    public function updatePickupRequest(Request $request, PickupRequest $pickupRequest)
    {
        // Ensure user can only update their own pickup requests and only if pending
        if ($pickupRequest->user_id !== Auth::id() || $pickupRequest->status !== 'pending') {
            abort(403);
        }

        $request->validate([
            'waste_id' => 'required|exists:wastes,id',
            'address' => 'required|string|max:500',
            'date_request' => 'required|date|after:today',
            'estimated_weight' => 'required|numeric|min:0.1',
        ]);

        $pickupRequest->update($request->only([
            'waste_id',
            'address',
            'date_request',
            'estimated_weight'
        ]));

        return redirect()->route('nasabah.pickup-requests')->with('success', 'Permintaan jemput sampah berhasil diperbarui.');
    }

    public function destroyPickupRequest(PickupRequest $pickupRequest)
    {
        // Ensure user can only delete their own pickup requests and only if pending
        if ($pickupRequest->user_id !== Auth::id() || $pickupRequest->status !== 'pending') {
            abort(403);
        }

        $pickupRequest->delete();
        return redirect()->route('nasabah.pickup-requests')->with('success', 'Permintaan jemput sampah berhasil dibatalkan.');
    }
}
