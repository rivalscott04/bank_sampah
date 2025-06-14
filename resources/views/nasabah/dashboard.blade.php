<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-blue-50 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-eco rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-blob"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-primary rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-blob animation-delay-2000"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-gradient-secondary rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-blob animation-delay-4000"></div>
        </div>

        <div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8 relative z-10">
            <!-- Header -->
            <div class="mb-10 glass-effect backdrop-blur-lg bg-white/80 p-8 rounded-3xl shadow-2xl border border-white/20 animate-fade-in-up">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold text-gradient mb-3">Dashboard Nasabah</h1>
                        <p class="text-xl text-slate-600">Selamat datang kembali, <span class="font-bold text-green-600">{{ auth()->user()->name }}</span>!</p>
                        <p class="text-sm text-slate-500 mt-2">Mari kelola sampah Anda dengan bijak dan dapatkan reward menarik</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-24 h-24 bg-gradient-eco rounded-full flex items-center justify-center shadow-glow animate-pulse">
                            <svg class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <!-- Total Poin -->
                <div class="glass-effect backdrop-blur-lg bg-gradient-to-br from-yellow-400/90 to-yellow-600/90 overflow-hidden shadow-2xl rounded-3xl transform hover:scale-105 transition-all duration-300 border border-yellow-300/30 animate-fade-in-up">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-500/30 p-4 rounded-2xl shadow-glow">
                                <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-base font-semibold text-yellow-100 truncate mb-1">Total Poin Anda</dt>
                                    <dd class="text-3xl font-bold text-white counter" data-target="{{ $totalPoints }}">0</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Transaksi -->
                <div class="glass-effect backdrop-blur-lg bg-white/80 overflow-hidden shadow-2xl rounded-3xl transform hover:scale-105 transition-all duration-300 border border-white/20 animate-fade-in-up animation-delay-200">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-100 p-4 rounded-2xl shadow-lg">
                                <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-base font-semibold text-slate-600 truncate mb-1">Total Transaksi</dt>
                                    <dd class="text-3xl font-bold text-slate-900 counter" data-target="{{ $totalTransaction }}">0</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Permintaan Pending -->
                <div class="glass-effect backdrop-blur-lg bg-white/80 overflow-hidden shadow-2xl rounded-3xl transform hover:scale-105 transition-all duration-300 border border-white/20 animate-fade-in-up animation-delay-400">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-orange-100 p-4 rounded-2xl shadow-lg">
                                <svg class="h-8 w-8 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-base font-semibold text-slate-600 truncate mb-1">Permintaan Pending</dt>
                                    <dd class="text-3xl font-bold text-slate-900 counter" data-target="{{ $permintaanPending }}">0</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Berat Sampah -->
                <div class="glass-effect backdrop-blur-lg bg-white/80 overflow-hidden shadow-2xl rounded-3xl transform hover:scale-105 transition-all duration-300 border border-white/20 animate-fade-in-up animation-delay-600">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-100 p-4 rounded-2xl shadow-lg">
                                <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16l3-1m-3 1l-3-1" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-base font-semibold text-slate-600 truncate mb-1">Total Berat (kg)</dt>
                                    <dd class="text-3xl font-bold text-slate-900 counter" data-target="{{ $totalBerat }}">0</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <!-- Daftar Sampah -->
                <a href="{{ route('nasabah.wastes.index') }}" class="group glass-effect backdrop-blur-lg bg-white/80 overflow-hidden shadow-2xl rounded-3xl hover:shadow-3xl transform hover:scale-105 transition-all duration-300 border border-white/20 animate-fade-in-up">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-100 p-4 rounded-2xl group-hover:bg-green-200 transition-colors duration-300 shadow-lg">
                                <svg class="h-8 w-8 text-green-600 group-hover:text-green-700 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-lg font-bold text-slate-900 truncate mb-1 group-hover:text-green-600 transition-colors duration-300">Daftar Sampah</dt>
                                    <dd class="text-sm text-slate-600 group-hover:text-slate-700 transition-colors duration-300">Lihat daftar sampah yang tersedia</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Request Jemput -->
                <a href="{{ route('nasabah.pickup-requests.create') }}" class="group glass-effect backdrop-blur-lg bg-white/80 overflow-hidden shadow-2xl rounded-3xl hover:shadow-3xl transform hover:scale-105 transition-all duration-300 border border-white/20 animate-fade-in-up animation-delay-200">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-100 p-4 rounded-2xl group-hover:bg-blue-200 transition-colors duration-300 shadow-lg">
                                <svg class="h-8 w-8 text-blue-600 group-hover:text-blue-700 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a4 4 0 11-8 0v-1a4 4 0 014-4h4a4 4 0 014 4v1a4 4 0 11-8 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-lg font-bold text-slate-900 truncate mb-1 group-hover:text-blue-600 transition-colors duration-300">Request Jemput</dt>
                                    <dd class="text-sm text-slate-600 group-hover:text-slate-700 transition-colors duration-300">Minta penjemputan sampah</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Riwayat Transaksi -->
                <a href="{{ route('nasabah.transactions') }}" class="group glass-effect backdrop-blur-lg bg-white/80 overflow-hidden shadow-2xl rounded-3xl hover:shadow-3xl transform hover:scale-105 transition-all duration-300 border border-white/20 animate-fade-in-up animation-delay-400">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-100 p-4 rounded-2xl group-hover:bg-purple-200 transition-colors duration-300 shadow-lg">
                                <svg class="h-8 w-8 text-purple-600 group-hover:text-purple-700 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-lg font-bold text-slate-900 truncate mb-1 group-hover:text-purple-600 transition-colors duration-300">Riwayat Transaksi</dt>
                                    <dd class="text-sm text-slate-600 group-hover:text-slate-700 transition-colors duration-300">Lihat transaksi Anda</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Update Profil -->
                <a href="{{ route('nasabah.profile') }}" class="group glass-effect backdrop-blur-lg bg-white/80 overflow-hidden shadow-2xl rounded-3xl hover:shadow-3xl transform hover:scale-105 transition-all duration-300 border border-white/20 animate-fade-in-up animation-delay-600">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-100 p-4 rounded-2xl group-hover:bg-indigo-200 transition-colors duration-300 shadow-lg">
                                <svg class="h-8 w-8 text-indigo-600 group-hover:text-indigo-700 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-lg font-bold text-slate-900 truncate mb-1 group-hover:text-indigo-600 transition-colors duration-300">Update Profil</dt>
                                    <dd class="text-sm text-slate-600 group-hover:text-slate-700 transition-colors duration-300">Edit profil Anda</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Recent Transactions & Pickup Requests -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Transactions -->
                <div class="glass-effect backdrop-blur-lg bg-white/80 shadow-2xl rounded-3xl border border-white/20 animate-fade-in-up">
                    <div class="px-6 py-6 sm:p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-slate-900">Transaksi Terbaru</h3>
                            <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                </svg>
                            </div>
                        </div>
                        @if($recentTransactions->count() > 0)
                            <div class="space-y-4">
                                @foreach($recentTransactions as $transaction)
                                    <div class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-blue-50 rounded-2xl border border-green-100 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                                <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-slate-900">{{ $transaction->waste->name }}</p>
                                                <p class="text-xs text-slate-500">{{ $transaction->weight }} kg • {{ $transaction->date->format('d M Y') }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-bold text-green-600">Rp {{ number_format($transaction->total_price) }}</p>
                                            <p class="text-xs text-yellow-600 font-semibold">+{{ number_format($transaction->total_points) }} poin</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-6">
                                <a href="{{ route('nasabah.transactions') }}" class="inline-flex items-center text-sm font-semibold text-green-600 hover:text-green-500 transition-colors duration-300">
                                    Lihat semua transaksi 
                                    <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <p class="text-slate-500 font-medium">Belum ada transaksi</p>
                                <p class="text-sm text-slate-400 mt-1">Mulai jual sampah Anda sekarang!</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Recent Pickup Requests -->
                <div class="glass-effect backdrop-blur-lg bg-white/80 shadow-2xl rounded-3xl border border-white/20 animate-fade-in-up animation-delay-200">
                    <div class="px-6 py-6 sm:p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-slate-900">Permintaan Jemput Terbaru</h3>
                            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a4 4 0 11-8 0v-1a4 4 0 014-4h4a4 4 0 014 4v1a4 4 0 11-8 0z" />
                                </svg>
                            </div>
                        </div>
                        @if($recentPickups->count() > 0)
                            <div class="space-y-4">
                                @foreach($recentPickups as $pickup)
                                    <div class="flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl border border-blue-100 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                                <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a4 4 0 11-8 0v-1a4 4 0 014-4h4a4 4 0 014 4v1a4 4 0 11-8 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-slate-900">{{ $pickup->waste->name }}</p>
                                                <p class="text-xs text-slate-500">{{ $pickup->estimated_weight }} kg • {{ $pickup->date_request->format('d M Y') }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            @if($pickup->status === 'pending')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-800 border border-yellow-200">
                                                    <div class="w-2 h-2 bg-yellow-400 rounded-full mr-2 animate-pulse"></div>
                                                    Pending
                                                </span>
                                            @elseif($pickup->status === 'dijemput')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800 border border-blue-200">
                                                    <div class="w-2 h-2 bg-blue-400 rounded-full mr-2"></div>
                                                    Dijemput
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800 border border-green-200">
                                                    <div class="w-2 h-2 bg-green-400 rounded-full mr-2"></div>
                                                    Selesai
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-6">
                                <a href="{{ route('nasabah.pickup-requests.index') }}" class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-500 transition-colors duration-300">
                                    Lihat semua permintaan 
                                    <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a4 4 0 11-8 0v-1a4 4 0 014-4h4a4 4 0 014 4v1a4 4 0 11-8 0z" />
                                    </svg>
                                </div>
                                <p class="text-slate-500 font-medium">Belum ada permintaan jemput</p>
                                <p class="text-sm text-slate-400 mt-1">Buat permintaan jemput pertama Anda!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('.counter');
            
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const increment = target / 100;
                let current = 0;
                
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = Math.floor(current).toLocaleString();
                        setTimeout(updateCounter, 20);
                    } else {
                        counter.textContent = target.toLocaleString();
                    }
                };
                
                updateCounter();
            });
        }

        // Start animation when page loads
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(animateCounters, 500);
        });
    </script>

    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        .animation-delay-200 {
            animation-delay: 0.2s;
        }
        .animation-delay-400 {
            animation-delay: 0.4s;
        }
        .animation-delay-600 {
            animation-delay: 0.6s;
        }
    </style>
</x-app-layout>