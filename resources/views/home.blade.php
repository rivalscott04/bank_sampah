<x-app-layout>
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-teal-50 via-emerald-50 to-cyan-50">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden z-0">
            <div class="floating-shape absolute top-20 left-20 w-32 h-32 bg-gradient-to-r from-teal-400 to-emerald-500 rounded-full opacity-10 animate-float"></div>
            <div class="floating-shape absolute top-40 right-32 w-24 h-24 bg-gradient-to-r from-emerald-400 to-cyan-500 rounded-full opacity-15 animate-float-delayed"></div>
            <div class="floating-shape absolute bottom-32 left-1/3 w-40 h-40 bg-gradient-to-r from-cyan-400 to-teal-500 rounded-full opacity-8 animate-float-slow"></div>
            <div class="floating-shape absolute bottom-20 right-20 w-28 h-28 bg-gradient-to-r from-teal-500 to-emerald-600 rounded-full opacity-12 animate-float-reverse"></div>
        </div>

        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-fade-in-up py-20">
                <!-- Main Heading -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-8">
                    <span class="block bg-gradient-to-r from-teal-600 via-emerald-600 to-cyan-600 bg-clip-text text-transparent mb-4">Bank Sampah</span>
                    <span class="block text-slate-700 text-2xl sm:text-3xl lg:text-4xl font-semibold">Digital Platform</span>
                </h1>
                
                <!-- Subtitle -->
                <p class="text-lg sm:text-xl text-slate-600 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Transformasi sampah menjadi nilai ekonomi dengan teknologi digital yang inovatif dan ramah lingkungan
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
                    @guest
                        <a href="{{ route('register') }}" class="btn-primary group">
                            <span>Mulai Sekarang</span>
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                        <a href="#features" class="btn-secondary">
                            Pelajari Lebih Lanjut
                        </a>
                    @else
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="btn-primary group">
                                <span>Dashboard Admin</span>
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('nasabah.dashboard') }}" class="btn-primary group">
                                <span>Dashboard Saya</span>
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        @endif
                        <a href="#features" class="btn-secondary">
                            Jelajahi Fitur
                        </a>
                    @endguest
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto mt-8">
                    <div class="glass-card group hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                        <div class="text-3xl font-bold bg-gradient-to-r from-teal-600 to-emerald-600 bg-clip-text text-transparent mb-2" data-counter="1000">0</div>
                        <div class="text-slate-600 text-sm font-medium">Nasabah Aktif</div>
                        <div class="absolute inset-0 bg-gradient-to-r from-teal-500/10 to-emerald-500/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="glass-card group hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                        <div class="text-3xl font-bold bg-gradient-to-r from-emerald-600 to-cyan-600 bg-clip-text text-transparent mb-2" data-counter="50">0</div>
                        <div class="text-slate-600 text-sm font-medium">Ton Sampah</div>
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/10 to-cyan-500/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="glass-card group hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                        <div class="text-3xl font-bold bg-gradient-to-r from-cyan-600 to-teal-600 bg-clip-text text-transparent mb-2" data-counter="25">0</div>
                        <div class="text-slate-600 text-sm font-medium">Kota Terlayani</div>
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-teal-500/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="glass-card group hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
                        <div class="text-3xl font-bold bg-gradient-to-r from-teal-600 to-emerald-600 bg-clip-text text-transparent mb-2" data-counter="95">0</div>
                        <div class="text-slate-600 text-sm font-medium">% Kepuasan</div>
                        <div class="absolute inset-0 bg-gradient-to-r from-teal-500/10 to-emerald-500/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gradient-to-br from-white via-teal-50/30 to-emerald-50/30 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-0 w-full h-full" style="background-image: radial-gradient(circle at 25% 25%, #14b8a6 2px, transparent 2px), radial-gradient(circle at 75% 75%, #10b981 2px, transparent 2px); background-size: 50px 50px;"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative z-10 text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 mb-4">
                    Fitur <span class="bg-gradient-to-r from-teal-600 to-emerald-600 bg-clip-text text-transparent">Unggulan</span>
                </h2>
                <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                    Platform digital yang memudahkan pengelolaan sampah dengan teknologi terdepan
                </p>
            </div>
            
            <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="modern-feature-card group" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon-modern bg-gradient-to-br from-teal-500 to-emerald-600">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Transaksi Digital</h3>
                    <p class="text-slate-600 leading-relaxed">Sistem pembayaran digital yang aman dan transparan untuk setiap transaksi sampah</p>
                    <div class="feature-glow"></div>
                </div>
                
                <!-- Feature 2 -->
                <div class="modern-feature-card group" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon-modern bg-gradient-to-br from-emerald-500 to-cyan-600">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Laporan Real-time</h3>
                    <p class="text-slate-600 leading-relaxed">Dashboard analitik yang memberikan insight mendalam tentang aktivitas bank sampah</p>
                    <div class="feature-glow"></div>
                </div>
                
                <!-- Feature 3 -->
                <div class="modern-feature-card group" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon-modern bg-gradient-to-br from-cyan-500 to-teal-600">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Manajemen Nasabah</h3>
                    <p class="text-slate-600 leading-relaxed">Kelola data nasabah dengan mudah dan efisien melalui sistem terintegrasi</p>
                    <div class="feature-glow"></div>
                </div>
                
                <!-- Feature 4 -->
                <div class="modern-feature-card group" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-icon-modern bg-gradient-to-br from-teal-600 to-emerald-500">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Notifikasi Instant</h3>
                    <p class="text-slate-600 leading-relaxed">Dapatkan notifikasi real-time untuk setiap aktivitas dan update penting</p>
                    <div class="feature-glow"></div>
                </div>
                
                <!-- Feature 5 -->
                <div class="modern-feature-card group" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-icon-modern bg-gradient-to-br from-emerald-600 to-cyan-500">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Keamanan Terjamin</h3>
                    <p class="text-slate-600 leading-relaxed">Sistem keamanan berlapis untuk melindungi data dan transaksi Anda</p>
                    <div class="feature-glow"></div>
                </div>
                
                <!-- Feature 6 -->
                <div class="modern-feature-card group" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-icon-modern bg-gradient-to-br from-cyan-600 to-teal-500">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Ramah Lingkungan</h3>
                    <p class="text-slate-600 leading-relaxed">Berkontribusi dalam menjaga lingkungan dengan sistem daur ulang yang efektif</p>
                    <div class="feature-glow"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Waste Types Section -->
    <section class="py-20 bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-20 h-20 bg-teal-400 rounded-full animate-pulse"></div>
            <div class="absolute bottom-20 right-20 w-16 h-16 bg-emerald-400 rounded-full animate-pulse animation-delay-1000"></div>
            <div class="absolute top-1/2 left-1/4 w-12 h-12 bg-cyan-400 rounded-full animate-pulse animation-delay-2000"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative z-10 text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 mb-4">
                    Jenis <span class="bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">Sampah</span>
                </h2>
                <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                    Berbagai jenis sampah yang dapat Anda setorkan dengan harga yang kompetitif
                </p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8" id="waste-types-container">
                @if(isset($wastes) && count($wastes) > 0)
                    @foreach($wastes as $index => $waste)
                        <div class="waste-card group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="waste-icon">
                                @switch($waste->jenis)
                                    @case('Plastik')
                        <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        @break
                    @case('Kertas')
                        <svg class="w-8 h-8 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        @break
                    @case('Logam')
                        <svg class="w-8 h-8 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                        </svg>
                                        @break
                                    @default
                        <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                                @endswitch
                            </div>
                            <h3 class="text-lg font-semibold text-slate-900 mb-2">{{ $waste->jenis }}</h3>
                            <p class="text-slate-600 text-sm mb-3">{{ $waste->deskripsi }}</p>
                            <div class="price-tag">
                                Rp {{ number_format($waste->harga, 0, ',', '.') }}/kg
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-full text-center py-12">
                        <div class="text-slate-400 mb-4">
                            <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <p class="text-slate-500 text-lg">Data jenis sampah akan segera tersedia</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-900 mb-4">
                    Cara <span class="text-gradient">Kerja</span>
                </h2>
                <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                    Proses sederhana untuk memulai perjalanan Anda menuju gaya hidup yang lebih berkelanjutan
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="step-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-number">1</div>
                    <div class="step-icon bg-blue-500">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">Daftar Akun</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Buat akun gratis dan lengkapi profil Anda untuk memulai</p>
                </div>
                
                <!-- Step 2 -->
                <div class="step-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-number">2</div>
                    <div class="step-icon bg-green-500">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">Kumpulkan Sampah</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Pisahkan dan kumpulkan sampah sesuai dengan jenisnya</p>
                </div>
                
                <!-- Step 3 -->
                <div class="step-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-number">3</div>
                    <div class="step-icon bg-purple-500">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">Setor ke Bank</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Bawa sampah ke bank sampah terdekat atau jadwalkan pickup</p>
                </div>
                
                <!-- Step 4 -->
                <div class="step-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="step-number">4</div>
                    <div class="step-icon bg-orange-500">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">Terima Pembayaran</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Dapatkan pembayaran langsung ke akun digital Anda</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-br from-teal-600 via-emerald-600 to-cyan-600 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <!-- Floating Elements -->
        <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full animate-float"></div>
        <div class="absolute bottom-10 right-10 w-24 h-24 bg-white/10 rounded-full animate-float-delayed"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white/10 rounded-full animate-float-slow"></div>
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-6">
                    Siap Memulai Perubahan?
                </h2>
                <p class="text-xl text-white/90 mb-8 leading-relaxed">
                    Bergabunglah dengan ribuan orang yang telah merasakan manfaat bank sampah digital
                </p>
                @guest
                    <a href="{{ route('register') }}" class="btn-white group">
                        <span>Daftar Sekarang</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                @else
                    <p class="text-white/90 text-lg">Selamat datang kembali, {{ Auth::user()->name }}!</p>
                @endguest
            </div>
        </div>
    </section>
</x-app-layout>

<style>
/* Custom Animations */
@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(90deg); }
}

@keyframes float-delayed {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-12px) rotate(-90deg); }
}

@keyframes float-slow {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-8px) rotate(45deg); }
}

@keyframes float-reverse {
    0%, 100% { transform: translateY(-8px) rotate(0deg); }
    50% { transform: translateY(0px) rotate(-45deg); }
}

@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-float { animation: float 8s ease-in-out infinite; }
.animate-float-delayed { animation: float-delayed 10s ease-in-out infinite; }
.animate-float-slow { animation: float-slow 12s ease-in-out infinite; }
.animate-float-reverse { animation: float-reverse 9s ease-in-out infinite; }
.animate-fade-in-up { animation: fade-in-up 1.2s ease-out; }

.animation-delay-1000 { animation-delay: 1s; }
.animation-delay-2000 { animation-delay: 2s; }

/* Responsive adjustments */
@media (max-width: 768px) {
    .floating-shape {
        opacity: 0.05 !important;
        width: 20px !important;
        height: 20px !important;
    }
    
    .text-4xl { font-size: 2rem; }
    .text-5xl { font-size: 2.5rem; }
    .text-6xl { font-size: 3rem; }
}

@media (max-width: 640px) {
    .py-20 { padding-top: 3rem; padding-bottom: 3rem; }
    .py-24 { padding-top: 4rem; padding-bottom: 4rem; }
    .gap-8 { gap: 1.5rem; }
    .gap-10 { gap: 2rem; }
}
</style>

<script>
// Counter Animation
function animateCounters() {
    const counters = document.querySelectorAll('[data-counter]');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-counter'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            counter.textContent = Math.floor(current).toLocaleString();
        }, 16);
    });
}

// Intersection Observer for counter animation
const observerOptions = {
    threshold: 0.5,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounters();
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

const statsSection = document.querySelector('.glass-card');
if (statsSection) {
    observer.observe(statsSection.parentElement);
}

// Parallax Effect for floating elements
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const parallax = document.querySelectorAll('.floating-shape');
    
    parallax.forEach((element, index) => {
        const speed = 0.5 + (index * 0.1);
        element.style.transform = `translateY(${scrolled * speed}px)`;
    });
});

// Real-time data refresh
function refreshWasteData() {
    fetch('/api/waste-types')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('waste-types-container');
            if (container && data.length > 0) {
                // Update waste types data
                console.log('Data refreshed:', data);
            }
        })
        .catch(error => console.log('Refresh error:', error));
}

// Refresh data every 30 seconds
setInterval(refreshWasteData, 30000);

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add loading animation
document.addEventListener('DOMContentLoaded', function() {
    // Fade in elements on load
    const elements = document.querySelectorAll('.modern-feature-card, .glass-card');
    elements.forEach((el, index) => {
        setTimeout(() => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease-out';
            
            setTimeout(() => {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, 100);
        }, index * 100);
    });
});
</script>