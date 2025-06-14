<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bank Sampah Digital - Platform inovatif untuk mengelola sampah dan mendapatkan nilai ekonomi dari limbah rumah tangga">
    <title>Bank Sampah Digital - Transformasi Sampah Jadi Berkah</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&family=poppins:300,400,500,600,700" rel="stylesheet" />
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
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
        
        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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
        
        .glass-effect {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
        
        .shadow-glow {
            box-shadow: 0 0 20px rgba(14, 165, 233, 0.3);
        }
        
        .shadow-glow-cyan {
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.3);
        }
        
        .btn-primary {
            @apply bg-gradient-primary text-white font-semibold px-6 py-3 rounded-xl shadow-lg hover:shadow-glow transform hover:-translate-y-1 transition-all duration-300;
        }
        
        .btn-secondary {
            @apply bg-white text-sky-600 font-semibold px-6 py-3 rounded-xl border-2 border-sky-200 hover:border-sky-400 hover:bg-sky-50 transform hover:-translate-y-1 transition-all duration-300;
        }
        
        .feature-card {
            @apply bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-white/20 hover:shadow-xl hover:-translate-y-2 transition-all duration-300;
        }
        
        .stat-card {
            @apply bg-white/90 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-white/30 text-center;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes float-reverse {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(10px); }
        }
        
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(14, 165, 233, 0.3);
            }
            50% {
                box-shadow: 0 0 30px rgba(14, 165, 233, 0.6);
            }
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        .animate-float-reverse {
            animation: float-reverse 3s ease-in-out infinite;
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out;
        }
        
        .animate-pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }
        
        .bg-pattern-dots {
            background-image: radial-gradient(circle, rgba(14, 165, 233, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
        }
        
        .bg-pattern-grid {
            background-image: linear-gradient(rgba(14, 165, 233, 0.1) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(14, 165, 233, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
</head>

<body class="font-inter bg-gradient-to-br from-slate-50 to-blue-50 text-slate-800">
    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center justify-center relative overflow-hidden pt-16">
        <!-- Background Elements -->
        <div class="absolute inset-0 bg-pattern-dots opacity-20"></div>
        <div class="absolute top-20 left-10 w-72 h-72 bg-sky-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float"></div>
        <div class="absolute top-40 right-10 w-72 h-72 bg-cyan-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float-reverse"></div>
        <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-emerald-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-float"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Hero Content -->
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        Transformasi <span class="text-gradient">Sampah</span><br>
                        Jadi <span class="text-gradient">Berkah</span>
                    </h1>
                    <p class="text-lg md:text-xl text-slate-600 mb-8 max-w-2xl">
                        Platform digital inovatif yang mengubah cara Anda memandang sampah. Dapatkan nilai ekonomi dari limbah rumah tangga sambil berkontribusi untuk lingkungan yang lebih bersih.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        @auth
                            <a href="{{ route('home') }}" class="btn-primary text-lg px-8 py-4">Mulai Sekarang</a>
                        @else
                            <a href="{{ route('register') }}" class="btn-primary text-lg px-8 py-4">Mulai Sekarang</a>
                        @endauth
                        <a href="#features" class="btn-secondary text-lg px-8 py-4">Pelajari Lebih Lanjut</a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 mt-12">
                        <div class="text-center">
                            <div class="text-2xl md:text-3xl font-bold text-gradient counter" data-target="1000">0</div>
                            <div class="text-sm text-slate-600">Nasabah Aktif</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl md:text-3xl font-bold text-gradient counter" data-target="50">0</div>
                            <div class="text-sm text-slate-600">Ton Sampah</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl md:text-3xl font-bold text-gradient counter" data-target="500">0</div>
                            <div class="text-sm text-slate-600">Juta Rupiah</div>
                        </div>
                    </div>
                </div>
                
                <!-- Hero Image -->
                <div class="relative">
                    <div class="glass-effect bg-white/20 p-8 rounded-3xl shadow-2xl border border-white/30 animate-float">
                        <div class="bg-gradient-primary p-6 rounded-2xl text-white text-center">
                            <svg class="w-24 h-24 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-xl font-bold mb-2">Sampah = Uang</h3>
                            <p class="text-sky-100">Tukar sampah Anda dengan poin yang bisa ditukar menjadi uang tunai</p>
                        </div>
                    </div>
                    
                    <!-- Floating Elements -->
                    <div class="absolute -top-4 -right-4 w-20 h-20 bg-gradient-secondary rounded-full flex items-center justify-center shadow-glow-cyan animate-pulse-glow">
                        <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-gradient-accent rounded-full flex items-center justify-center shadow-lg animate-float-reverse">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <a href="#features" class="text-slate-400 hover:text-sky-600 transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern-grid opacity-10"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">
                    Fitur <span class="text-gradient">Unggulan</span>
                </h2>
                <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                    Nikmati berbagai fitur canggih yang memudahkan Anda dalam mengelola sampah dan mendapatkan keuntungan maksimal
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card group">
                    <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Pencatatan Digital</h3>
                    <p class="text-slate-600 mb-4">Catat semua transaksi sampah Anda secara digital dengan sistem yang akurat dan transparan.</p>
                    <a href="#" class="text-sky-600 font-semibold hover:text-sky-700 transition-colors duration-200">Pelajari Lebih Lanjut →</a>
                </div>
                
                <!-- Feature 2 -->
                <div class="feature-card group">
                    <div class="w-14 h-14 bg-gradient-secondary rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Konversi Poin</h3>
                    <p class="text-slate-600 mb-4">Tukar poin yang terkumpul menjadi uang tunai atau produk menarik lainnya.</p>
                    <a href="#" class="text-sky-600 font-semibold hover:text-sky-700 transition-colors duration-200">Pelajari Lebih Lanjut →</a>
                </div>
                
                <!-- Feature 3 -->
                <div class="feature-card group">
                    <div class="w-14 h-14 bg-gradient-accent rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Jadwal Pickup</h3>
                    <p class="text-slate-600 mb-4">Atur jadwal pengambilan sampah sesuai kebutuhan Anda dengan sistem yang fleksibel.</p>
                    <a href="#" class="text-sky-600 font-semibold hover:text-sky-700 transition-colors duration-200">Pelajari Lebih Lanjut →</a>
                </div>
                
                <!-- Feature 4 -->
                <div class="feature-card group">
                    <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Laporan Dampak</h3>
                    <p class="text-slate-600 mb-4">Lihat dampak positif kontribusi Anda terhadap lingkungan melalui laporan yang detail.</p>
                    <a href="#" class="text-sky-600 font-semibold hover:text-sky-700 transition-colors duration-200">Pelajari Lebih Lanjut →</a>
                </div>
                
                <!-- Feature 5 -->
                <div class="feature-card group">
                    <div class="w-14 h-14 bg-gradient-secondary rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Edukasi Lingkungan</h3>
                    <p class="text-slate-600 mb-4">Akses berbagai materi edukasi tentang pengelolaan sampah dan pelestarian lingkungan.</p>
                    <a href="#" class="text-sky-600 font-semibold hover:text-sky-700 transition-colors duration-200">Pelajari Lebih Lanjut →</a>
                </div>
                
                <!-- Feature 6 -->
                <div class="feature-card group">
                    <div class="w-14 h-14 bg-gradient-accent rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">Komunitas</h3>
                    <p class="text-slate-600 mb-4">Bergabung dengan komunitas peduli lingkungan dan berbagi pengalaman dengan sesama.</p>
                    <a href="#" class="text-sky-600 font-semibold hover:text-sky-700 transition-colors duration-200">Pelajari Lebih Lanjut →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gradient-to-br from-slate-50 to-blue-50 relative overflow-hidden">
        <div class="absolute top-20 right-10 w-64 h-64 bg-sky-200 rounded-full mix-blend-multiply filter blur-xl opacity-40 animate-float"></div>
        <div class="absolute bottom-20 left-10 w-64 h-64 bg-cyan-200 rounded-full mix-blend-multiply filter blur-xl opacity-40 animate-float-reverse"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6">
                        Tentang <span class="text-gradient">Bank Sampah Digital</span>
                    </h2>
                    <p class="text-lg text-slate-600 mb-6">
                        Bank Sampah Digital adalah platform inovatif yang mengubah cara masyarakat memandang dan mengelola sampah. Kami percaya bahwa setiap sampah memiliki nilai ekonomi yang dapat dimanfaatkan untuk kesejahteraan masyarakat dan kelestarian lingkungan.
                    </p>
                    <p class="text-lg text-slate-600 mb-8">
                        Dengan teknologi digital terdepan, kami memudahkan proses pencatatan, pengumpulan, dan konversi sampah menjadi nilai ekonomi yang nyata. Mari bersama-sama menciptakan lingkungan yang lebih bersih dan berkelanjutan.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-gradient-primary rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-slate-800 mb-1">Terpercaya</h3>
                            <p class="text-sm text-slate-600">Sistem yang aman dan transparan</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="w-12 h-12 bg-gradient-secondary rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-slate-800 mb-1">Inovatif</h3>
                            <p class="text-sm text-slate-600">Teknologi terdepan untuk solusi terbaik</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="w-12 h-12 bg-gradient-accent rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-slate-800 mb-1">Peduli Lingkungan</h3>
                            <p class="text-sm text-slate-600">Komitmen untuk bumi yang lebih hijau</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="w-12 h-12 bg-gradient-primary rounded-xl flex items-center justify-center mx-auto mb-3">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-slate-800 mb-1">Komunitas</h3>
                            <p class="text-sm text-slate-600">Membangun gerakan bersama</p>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="glass-effect bg-white/30 p-8 rounded-3xl shadow-2xl border border-white/30">
                        <div class="bg-gradient-to-br from-sky-400 to-cyan-500 p-6 rounded-2xl text-white text-center mb-6">
                            <svg class="w-16 h-16 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-xl font-bold mb-2">Dampak Positif</h3>
                            <p class="text-sky-100">Setiap kontribusi Anda menciptakan dampak positif untuk lingkungan</p>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-slate-700 font-medium">Mengurangi limbah ke TPA</span>
                            </div>
                            
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-slate-700 font-medium">Meningkatkan ekonomi masyarakat</span>
                            </div>
                            
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-slate-700 font-medium">Menciptakan lingkungan bersih</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern-dots opacity-10"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">
                    Hubungi <span class="text-gradient">Kami</span>
                </h2>
                <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                    Siap memulai perjalanan menuju lingkungan yang lebih bersih? Hubungi kami sekarang dan bergabunglah dengan gerakan Bank Sampah Digital!
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Info -->
                <div class="space-y-8">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-gradient-primary rounded-xl flex items-center justify-center shadow-glow flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 mb-2">Telepon</h3>
                            <p class="text-slate-600">+62 812-3456-7890</p>
                            <p class="text-slate-600">+62 821-9876-5432</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-gradient-secondary rounded-xl flex items-center justify-center shadow-glow-cyan flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 mb-2">Email</h3>
                            <p class="text-slate-600">info@banksampah.com</p>
                            <p class="text-slate-600">support@banksampah.com</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-gradient-accent rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 mb-2">Alamat</h3>
                            <p class="text-slate-600">Jl. Lingkungan Hijau No. 123</p>
                            <p class="text-slate-600">Jakarta Selatan, 12345</p>
                        </div>
                    </div>
                    
                    <!-- Social Media -->
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-4">Ikuti Kami</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-gradient-primary rounded-lg flex items-center justify-center hover:shadow-glow transition-all duration-300">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gradient-secondary rounded-lg flex items-center justify-center hover:shadow-glow-cyan transition-all duration-300">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gradient-accent rounded-lg flex items-center justify-center hover:shadow-lg transition-all duration-300">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="glass-effect bg-white/80 p-8 rounded-3xl shadow-2xl border border-white/20">
                    <h3 class="text-2xl font-bold text-slate-800 mb-6">Kirim Pesan</h3>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nama</label>
                                <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-sky-500 focus:ring focus:ring-sky-200 transition-all duration-300 outline-none" placeholder="Nama Anda">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-sky-500 focus:ring focus:ring-sky-200 transition-all duration-300 outline-none" placeholder="email@example.com">
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-slate-700 mb-2">Subjek</label>
                            <input type="text" id="subject" name="subject" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-sky-500 focus:ring focus:ring-sky-200 transition-all duration-300 outline-none" placeholder="Subjek pesan">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-slate-700 mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-sky-500 focus:ring focus:ring-sky-200 transition-all duration-300 outline-none" placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-slate-800 to-slate-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="lg:col-span-2">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-primary rounded-xl flex items-center justify-center shadow-glow">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                        <span class="ml-3 text-2xl font-bold text-gradient">Bank Sampah Digital</span>
                    </div>
                    <p class="text-slate-300 mb-6 max-w-md leading-relaxed">
                        Platform digital yang mengubah cara kita memandang sampah. Bersama-sama kita ciptakan lingkungan yang lebih bersih dan berkelanjutan untuk generasi mendatang.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-slate-700 rounded-lg flex items-center justify-center hover:bg-gradient-primary hover:shadow-glow transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-700 rounded-lg flex items-center justify-center hover:bg-gradient-secondary hover:shadow-glow-cyan transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-700 rounded-lg flex items-center justify-center hover:bg-gradient-accent hover:shadow-lg transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-700 rounded-lg flex items-center justify-center hover:bg-gradient-primary hover:shadow-glow transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.2.3c-6.6 0-12 5.4-12 12 0 5.3 3.4 9.8 8.2 11.4.6.1.8-.3.8-.6v-2.2c-3.3.7-4-1.6-4-1.6-.5-1.4-1.3-1.8-1.3-1.8-1.1-.7.1-.7.1-.7 1.2.1 1.8 1.2 1.8 1.2 1 1.8 2.8 1.3 3.5 1 .1-.8.4-1.3.7-1.6-2.7-.3-5.5-1.3-5.5-6 0-1.3.5-2.4 1.2-3.2-.1-.3-.5-1.5.1-3.2 0 0 1-.3 3.3 1.2 1-.3 2-.4 3-.4s2 .1 3 .4c2.3-1.5 3.3-1.2 3.3-1.2.6 1.7.2 2.9.1 3.2.8.8 1.2 1.9 1.2 3.2 0 4.6-2.8 5.6-5.5 5.9.4.4.8 1.1.8 2.2v3.3c0 .3.2.7.8.6 4.8-1.6 8.2-6.1 8.2-11.4 0-6.6-5.4-12-12-12z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-bold mb-6 text-gradient">Layanan</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300">Pengumpulan Sampah</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300">Layanan Jemput</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300">Tukar Poin</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300">Edukasi Lingkungan</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-bold mb-6 text-gradient">Kontak</h3>
                    <ul class="space-y-3">
                        <li class="text-slate-300">+62 812-3456-7890</li>
                        <li class="text-slate-300">info@banksampah.com</li>
                        <li class="text-slate-300">Jl. Lingkungan Hijau No. 123<br>Jakarta Selatan, 12345</li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-slate-700 mt-12 pt-8 text-center">
                <p class="text-slate-400">&copy; 2024 Bank Sampah Digital. Semua hak dilindungi. Dibuat dengan ❤️ untuk lingkungan yang lebih baik.</p>
            </div>
        </div>
    </footer>

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
                        counter.textContent = Math.floor(current);
                        setTimeout(updateCounter, 20);
                    } else {
                        counter.textContent = target;
                    }
                };
                
                updateCounter();
            });
        }

        // Intersection Observer for animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate elements when they come into view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in-up');
                        observer.unobserve(entry.target);
                        
                        // If it's a counter section, start the animation
                        if (entry.target.querySelector('.counter')) {
                            animateCounters();
                        }
                    }
                });
            }, {
                threshold: 0.1
            });
            
            // Observe all sections
            document.querySelectorAll('section').forEach(section => {
                observer.observe(section);
            });
            
            // Observe feature cards
            document.querySelectorAll('.feature-card').forEach(card => {
                observer.observe(card);
            });
            
            // Smooth scrolling for anchor links
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
            
            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('nav');
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-white/90');
                    navbar.classList.remove('bg-white/80');
                } else {
                    navbar.classList.add('bg-white/80');
                    navbar.classList.remove('bg-white/90');
                }
            });
        });
    </script>
</body>
</html>