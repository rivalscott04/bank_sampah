@extends('layouts.app')

@section('title', 'Dashboard Nasabah')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard Nasabah</h1>
        <p class="mt-2 text-gray-600">Selamat datang, {{ auth()->user()->name }}!</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Poin -->
        <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-yellow-100 truncate">Total Poin Anda</dt>
                            <dd class="text-2xl font-bold text-white">{{ number_format($totalPoints) }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Transaksi -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Transaksi</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $totalTransaction }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Permintaan Pending -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Permintaan Pending</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $permintaanPending }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Berat Sampah -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16l3-1m-3 1l-3-1" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Berat (kg)</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ number_format($totalBerat, 1) }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Lihat Daftar Sampah -->
        <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-lg transition-shadow">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Daftar Sampah</h3>
                        <p class="text-sm text-gray-500">Lihat harga sampah</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('nasabah.wastes') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                        Lihat
                    </a>
                </div>
            </div>
        </div>

        <!-- Request Jemput -->
        <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-lg transition-shadow">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a4 4 0 11-8 0v-1a4 4 0 014-4h4a4 4 0 014 4v1a4 4 0 11-8 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Request Jemput</h3>
                        <p class="text-sm text-gray-500">Minta penjemputan sampah</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('nasabah.pickup-requests.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Request
                    </a>
                </div>
            </div>
        </div>

        <!-- Riwayat Transaksi -->
        <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-lg transition-shadow">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Riwayat Transaksi</h3>
                        <p class="text-sm text-gray-500">Lihat transaksi Anda</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('nasabah.transactions') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700">
                        Lihat
                    </a>
                </div>
            </div>
        </div>

        <!-- Update Profil -->
        <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-lg transition-shadow">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Update Profil</h3>
                        <p class="text-sm text-gray-500">Edit profil Anda</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('nasabah.profile') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Transactions & Pickup Requests -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Transactions -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Transaksi Terbaru</h3>
                @if($recentTransactions->count() > 0)
                    <div class="space-y-3">
                        @foreach($recentTransactions as $transaction)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $transaction->waste->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $transaction->weight }} kg • {{ $transaction->date->format('d M Y') }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-medium text-green-600">Rp {{ number_format($transaction->total_price) }}</p>
                                    <p class="text-xs text-yellow-600">+{{ number_format($transaction->total_points) }} poin</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('nasabah.transactions') }}" class="text-sm text-green-600 hover:text-green-500">Lihat semua transaksi →</a>
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4">Belum ada transaksi</p>
                @endif
            </div>
        </div>

        <!-- Recent Pickup Requests -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Permintaan Jemput Terbaru</h3>
                @if($recentPickups->count() > 0)
                    <div class="space-y-3">
                        @foreach($recentPickups as $pickup)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $pickup->waste->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $pickup->estimated_weight }} kg • {{ $pickup->date_request->format('d M Y') }}</p>
                                </div>
                                <div class="text-right">
                                    @if($pickup->status === 'pending')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            Pending
                                        </span>
                                    @elseif($pickup->status === 'dijemput')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            Dijemput
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Selesai
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('nasabah.pickup-requests.index') }}" class="text-sm text-green-600 hover:text-green-500">Lihat semua permintaan →</a>
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4">Belum ada permintaan jemput</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection