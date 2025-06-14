<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Waste;
use App\Models\Transaction;
use App\Models\PickupRequest;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalNasabah = User::where('role', 'nasabah')->count();
        $totalTransaksi = Transaction::count();
        $totalSampah = Transaction::sum('weight'); // Total berat sampah dalam kg
        $totalPendapatan = Transaction::sum('total_amount'); // Total pendapatan
        $totalPoints = Point::sum('total_points');
        $pendingPickups = PickupRequest::where('status', 'pending')->count();
        
        $recentTransactions = Transaction::with(['user', 'waste'])
            ->latest()
            ->take(5)
            ->get();
            
        $recentPickups = PickupRequest::with(['user', 'waste'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalNasabah',
            'totalTransaksi',
            'totalSampah', 
            'totalPendapatan',
            'totalPoints',
            'pendingPickups',
            'recentTransactions',
            'recentPickups'
        ));
    }

    // Kelola Nasabah
    public function nasabah()
    {
        $nasabah = User::where('role', 'nasabah')->with('points')->paginate(10);
        return view('admin.nasabah.index', compact('nasabah'));
    }

    public function createNasabah()
    {
        return view('admin.nasabah.create');
    }

    public function storeNasabah(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'nasabah',
        ]);

        Point::create([
            'user_id' => $user->id,
            'total_points' => 0,
        ]);

        return redirect()->route('admin.nasabah')->with('success', 'Nasabah berhasil ditambahkan.');
    }

    public function editNasabah(User $user)
    {
        return view('admin.nasabah.edit', compact('user'));
    }

    public function updateNasabah(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.nasabah')->with('success', 'Nasabah berhasil diperbarui.');
    }

    public function destroyNasabah(User $user)
    {
        $user->delete();
        return redirect()->route('admin.nasabah')->with('success', 'Nasabah berhasil dihapus.');
    }

    // Kelola Kategori
    public function categories()
    {
        $categories = Category::withCount('wastes')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($request->only('name'));

        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function editCategory(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($request->only('name'));

        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroyCategory(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil dihapus.');
    }

    // Kelola Sampah
    public function wastes()
    {
        $wastes = Waste::with('category')->paginate(10);
        return view('admin.wastes.index', compact('wastes'));
    }

    public function createWaste()
    {
        $categories = Category::all();
        return view('admin.wastes.create', compact('categories'));
    }

    public function storeWaste(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price_per_kg' => 'required|numeric|min:0',
        ]);

        Waste::create($request->all());

        return redirect()->route('admin.wastes')->with('success', 'Data sampah berhasil ditambahkan.');
    }

    public function editWaste(Waste $waste)
    {
        $categories = Category::all();
        return view('admin.wastes.edit', compact('waste', 'categories'));
    }

    public function updateWaste(Request $request, Waste $waste)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price_per_kg' => 'required|numeric|min:0',
        ]);

        $waste->update($request->all());

        return redirect()->route('admin.wastes')->with('success', 'Data sampah berhasil diperbarui.');
    }

    public function destroyWaste(Waste $waste)
    {
        $waste->delete();
        return redirect()->route('admin.wastes')->with('success', 'Data sampah berhasil dihapus.');
    }

    // Kelola Transaksi
    public function transactions()
    {
        $transactions = Transaction::with(['user', 'waste'])->latest()->paginate(10);
        return view('admin.transactions.index', compact('transactions'));
    }

    public function createTransaction()
    {
        $nasabah = User::where('role', 'nasabah')->get();
        $wastes = Waste::with('category')->get();
        return view('admin.transactions.create', compact('nasabah', 'wastes'));
    }

    public function storeTransaction(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'waste_id' => 'required|exists:wastes,id',
            'weight' => 'required|numeric|min:0.1',
            'date' => 'required|date',
        ]);

        $waste = Waste::find($request->waste_id);
        $totalPrice = $request->weight * $waste->price_per_kg;
        $totalPoints = floor($totalPrice / 100);

        $transaction = Transaction::create([
            'user_id' => $request->user_id,
            'waste_id' => $request->waste_id,
            'weight' => $request->weight,
            'total_price' => $totalPrice,
            'total_points' => $totalPoints,
            'date' => $request->date,
        ]);

        // Update user points
        $userPoints = Point::where('user_id', $request->user_id)->first();
        $userPoints->addPoints($totalPoints);

        return redirect()->route('admin.transactions')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function editTransaction(Transaction $transaction)
    {
        $nasabah = User::where('role', 'nasabah')->get();
        $wastes = Waste::with('category')->get();
        return view('admin.transactions.edit', compact('transaction', 'nasabah', 'wastes'));
    }

    public function updateTransaction(Request $request, Transaction $transaction)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'waste_id' => 'required|exists:wastes,id',
            'weight' => 'required|numeric|min:0.1',
            'date' => 'required|date',
        ]);

        $waste = Waste::find($request->waste_id);
        $totalPrice = $request->weight * $waste->price_per_kg;
        $totalPoints = floor($totalPrice / 100);

        // Update user points (subtract old, add new)
        $userPoints = Point::where('user_id', $transaction->user_id)->first();
        $userPoints->subtractPoints($transaction->total_points);
        
        $transaction->update([
            'user_id' => $request->user_id,
            'waste_id' => $request->waste_id,
            'weight' => $request->weight,
            'total_price' => $totalPrice,
            'total_points' => $totalPoints,
            'date' => $request->date,
        ]);

        $newUserPoints = Point::where('user_id', $request->user_id)->first();
        $newUserPoints->addPoints($totalPoints);

        return redirect()->route('admin.transactions')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroyTransaction(Transaction $transaction)
    {
        // Subtract points from user
        $userPoints = Point::where('user_id', $transaction->user_id)->first();
        $userPoints->subtractPoints($transaction->total_points);
        
        $transaction->delete();
        return redirect()->route('admin.transactions')->with('success', 'Transaksi berhasil dihapus.');
    }

    // Kelola Permintaan Jemput
    public function pickupRequests()
    {
        $pickupRequests = PickupRequest::with(['user', 'waste'])->latest()->paginate(10);
        return view('admin.pickup-requests.index', compact('pickupRequests'));
    }

    public function updatePickupStatus(Request $request, PickupRequest $pickupRequest)
    {
        $request->validate([
            'status' => 'required|in:pending,dijemput,selesai',
            'actual_weight' => 'required_if:status,selesai|numeric|min:0.1',
        ]);

        $pickupRequest->update(['status' => $request->status]);

        // If completed, create transaction and update points
        if ($request->status === 'selesai' && $request->actual_weight) {
            $waste = $pickupRequest->waste;
            $totalPrice = $request->actual_weight * $waste->price_per_kg;
            $totalPoints = floor($totalPrice / 100);

            Transaction::create([
                'user_id' => $pickupRequest->user_id,
                'waste_id' => $pickupRequest->waste_id,
                'weight' => $request->actual_weight,
                'total_price' => $totalPrice,
                'total_points' => $totalPoints,
                'date' => now()->toDateString(),
            ]);

            $userPoints = Point::where('user_id', $pickupRequest->user_id)->first();
            $userPoints->addPoints($totalPoints);
        }

        return redirect()->route('admin.pickup-requests')->with('success', 'Status permintaan jemput berhasil diperbarui.');
    }

    // Kelola Poin
    public function points()
    {
        $points = Point::with('user')->paginate(10);
        return view('admin.points.index', compact('points'));
    }

    public function updatePoints(Request $request, Point $point)
    {
        $request->validate([
            'total_points' => 'required|integer|min:0',
        ]);

        $point->update($request->only('total_points'));

        return redirect()->route('admin.points')->with('success', 'Poin berhasil diperbarui.');
    }
}