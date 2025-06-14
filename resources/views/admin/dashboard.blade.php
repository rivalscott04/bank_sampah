@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary: #0ea5e9;
        --primary-dark: #0284c7;
        --secondary: #06b6d4;
        --accent: #10b981;
        --gradient-primary: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);
        --gradient-secondary: linear-gradient(135deg, #06b6d4 0%, #10b981 100%);
        --gradient-accent: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }
    
    .bg-gradient-primary {
        background: var(--gradient-primary);
    }
    
    .bg-gradient-secondary {
        background: var(--gradient-secondary);
    }
    
    .bg-gradient-accent {
        background: var(--gradient-accent);
    }
    
    .shadow-glow {
        box-shadow: 0 0 20px rgba(14, 165, 233, 0.3);
    }
</style>

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl p-6 border border-slate-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-sky-100 rounded-lg">
                            <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600">Total Nasabah</p>
                            <p class="text-2xl font-bold text-slate-900">{{ $totalNasabah ?? 1247 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 border border-slate-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-cyan-100 rounded-lg">
                            <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600">Sampah Terkumpul</p>
                            <p class="text-2xl font-bold text-slate-900">{{ $totalSampah ?? 89 }} <span class="text-sm font-normal text-slate-500">ton</span></p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 border border-slate-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-cyan-100 rounded-lg">
                            <svg class="w-6 h-6 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600">Total Transaksi</p>
                            <p class="text-2xl font-bold text-slate-900">{{ $totalTransaksi ?? 3456 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 border border-slate-200">
                    <div class="flex items-center">
                        <div class="p-3 bg-emerald-100 rounded-lg">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600">Total Pendapatan</p>
                            <p class="text-2xl font-bold text-slate-900">Rp {{ number_format($totalPendapatan ?? 15750000) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Management Menu -->
            <div class="bg-white rounded-xl border border-slate-200 p-6 mb-8">
                <h2 class="text-xl font-bold text-slate-900 mb-6">Menu Kelola Data</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="#" class="flex items-center p-4 rounded-lg border border-slate-200 hover:border-sky-300 hover:bg-sky-50 transition-all duration-200 group">
                        <div class="p-2 bg-sky-100 rounded-lg group-hover:bg-sky-200 transition-colors duration-200">
                            <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium text-slate-900">Kelola Nasabah</p>
                            <p class="text-sm text-slate-500">Tambah, edit, hapus data nasabah</p>
                        </div>
                    </a>

                    <a href="#" class="flex items-center p-4 rounded-lg border border-slate-200 hover:border-emerald-300 hover:bg-emerald-50 transition-all duration-200 group">
                        <div class="p-2 bg-emerald-100 rounded-lg group-hover:bg-emerald-200 transition-colors duration-200">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium text-slate-900">Kategori Sampah</p>
                            <p class="text-sm text-slate-500">Kelola jenis dan kategori sampah</p>
                        </div>
                    </a>

                    <a href="#" class="flex items-center p-4 rounded-lg border border-slate-200 hover:border-cyan-300 hover:bg-cyan-50 transition-all duration-200 group">
                        <div class="p-2 bg-cyan-100 rounded-lg group-hover:bg-cyan-200 transition-colors duration-200">
                            <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium text-slate-900">Data Sampah</p>
                            <p class="text-sm text-slate-500">Kelola data sampah yang masuk</p>
                        </div>
                    </a>

                    <a href="#" class="flex items-center p-4 rounded-lg border border-slate-200 hover:border-sky-300 hover:bg-sky-50 transition-all duration-200 group">
                        <div class="p-2 bg-sky-100 rounded-lg group-hover:bg-sky-200 transition-colors duration-200">
                            <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium text-slate-900">Transaksi</p>
                            <p class="text-sm text-slate-500">Kelola transaksi nasabah</p>
                        </div>
                    </a>

                    <a href="#" class="flex items-center p-4 rounded-lg border border-slate-200 hover:border-cyan-300 hover:bg-cyan-50 transition-all duration-200 group">
                        <div class="p-2 bg-cyan-100 rounded-lg group-hover:bg-cyan-200 transition-colors duration-200">
                            <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium text-slate-900">Permintaan Jemput</p>
                            <p class="text-sm text-slate-500">Kelola jadwal penjemputan</p>
                        </div>
                    </a>

                    <a href="#" class="flex items-center p-4 rounded-lg border border-slate-200 hover:border-emerald-300 hover:bg-emerald-50 transition-all duration-200 group">
                        <div class="p-2 bg-emerald-100 rounded-lg group-hover:bg-emerald-200 transition-colors duration-200">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium text-slate-900">Poin Nasabah</p>
                            <p class="text-sm text-slate-500">Kelola sistem poin dan reward</p>
                        </div>
                    </a>
                </div>
            </div>
l 
            <!-- Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Transaksi Terbaru -->
                <div class="bg-white rounded-xl border border-slate-200 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-bold text-slate-900">Transaksi Terbaru</h2>
                        <a href="#" class="text-sm text-teal-600 hover:text-teal-700 font-medium">Lihat Semua</a>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center">
                                    <span class="text-teal-600 font-semibold text-sm">AR</span>
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-slate-900">Ahmad Rizki</p>
                                    <p class="text-sm text-slate-500">Plastik PET • 2.5 kg</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-slate-900">Rp 12.500</p>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    Selesai
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center">
                                    <span class="text-emerald-600 font-semibold text-sm">SN</span>
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-slate-900">Siti Nurhaliza</p>
                                    <p class="text-sm text-slate-500">Kertas Koran • 5.0 kg</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-slate-900">Rp 15.000</p>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">
                                    Proses
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-cyan-100 rounded-full flex items-center justify-center">
                                    <span class="text-cyan-600 font-semibold text-sm">BS</span>
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-slate-900">Budi Santoso</p>
                                    <p class="text-sm text-slate-500">Kaleng Aluminium • 1.2 kg</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-slate-900">Rp 18.000</p>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    Selesai
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Permintaan Jemput -->
                <div class="bg-white rounded-xl border border-slate-200 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-bold text-slate-900">Permintaan Jemput</h2>
                        <a href="#" class="text-sm text-teal-600 hover:text-teal-700 font-medium">Lihat Semua</a>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                    <span class="text-purple-600 font-semibold text-sm">DS</span>
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-slate-900">Dewi Sartika</p>
                                    <p class="text-sm text-slate-500">Jl. Merdeka No. 15</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-slate-600">25 Nov 2024</p>
                                <div class="flex space-x-2 mt-1">
                                    <button class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium hover:bg-green-200">Terima</button>
                                    <button class="px-2 py-1 bg-red-100 text-red-700 rounded text-xs font-medium hover:bg-red-200">Tolak</button>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                    <span class="text-orange-600 font-semibold text-sm">RH</span>
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-slate-900">Rudi Hermawan</p>
                                    <p class="text-sm text-slate-500">Jl. Sudirman No. 8</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-slate-600">24 Nov 2024</p>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700 mt-1">
                                    Dijemput
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <span class="text-blue-600 font-semibold text-sm">LM</span>
                                </div>
                                <div class="ml-3">
                                    <p class="font-medium text-slate-900">Lisa Maharani</p>
                                    <p class="text-sm text-slate-500">Jl. Diponegoro No. 22</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-slate-600">23 Nov 2024</p>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 mt-1">
                                    Selesai
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection