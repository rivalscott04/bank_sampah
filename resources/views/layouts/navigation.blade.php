<nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-lg border-b border-white/20 shadow-sm" x-data="{ open: false, userDropdown: false }">
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
        
        .shadow-glow {
            box-shadow: 0 0 20px rgba(14, 165, 233, 0.3);
        }
        
        .shadow-glow-cyan {
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.3);
        }
        
        .btn-primary {
            background: var(--gradient-primary);
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            box-shadow: 0 0 20px rgba(14, 165, 233, 0.3);
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: white;
            color: #0ea5e9;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            border: 2px solid #e0f2fe;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            border-color: #0ea5e9;
            background: #f0f9ff;
            transform: translateY(-2px);
        }
    </style>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo and Brand -->
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 bg-gradient-primary rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </div>
                        <div class="hidden sm:block">
                            <h1 class="text-xl font-bold text-gradient">Bank Sampah</h1>
                            <p class="text-xs text-slate-500 -mt-1">Digital Platform</p>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden md:ml-10 md:flex md:space-x-2">
                    <a href="{{ route('home') }}" class="group relative px-4 py-2 rounded-xl text-sm font-medium transition-all duration-500 transform {{ request()->routeIs('home') ? 'bg-gradient-primary text-white shadow-glow scale-105' : 'text-slate-600 hover:text-sky-600 hover:bg-sky-50 hover:scale-105 hover:shadow-lg' }}">
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 transition-all duration-300 group-hover:scale-110 {{ request()->routeIs('home') ? 'text-white' : 'text-sky-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span class="relative">
                                Beranda
                                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-primary transition-all duration-300 group-hover:w-full {{ request()->routeIs('home') ? 'w-full' : '' }}"></span>
                            </span>
                        </div>
                        <div class="absolute inset-0 rounded-xl bg-gradient-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                    </a>
                    
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="group relative px-4 py-2 rounded-xl text-sm font-medium transition-all duration-500 transform {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-primary text-white shadow-glow scale-105' : 'text-slate-600 hover:text-cyan-600 hover:bg-cyan-50 hover:scale-105 hover:shadow-lg' }}">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 transition-all duration-300 group-hover:scale-110 group-hover:rotate-3 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-cyan-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                    <span class="relative">
                                        Dashboard Admin
                                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-secondary transition-all duration-300 group-hover:w-full {{ request()->routeIs('admin.dashboard') ? 'w-full' : '' }}"></span>
                                    </span>
                                </div>
                                <div class="absolute inset-0 rounded-xl bg-gradient-secondary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                            </a>
                        @else
                            <a href="{{ route('nasabah.dashboard') }}" class="group relative px-4 py-2 rounded-xl text-sm font-medium transition-all duration-500 transform {{ request()->routeIs('nasabah.dashboard') ? 'bg-gradient-primary text-white shadow-glow scale-105' : 'text-slate-600 hover:text-emerald-600 hover:bg-emerald-50 hover:scale-105 hover:shadow-lg' }}">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 transition-all duration-300 group-hover:scale-110 {{ request()->routeIs('nasabah.dashboard') ? 'text-white' : 'text-emerald-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span class="relative">
                                        Dashboard
                                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-accent transition-all duration-300 group-hover:w-full {{ request()->routeIs('nasabah.dashboard') ? 'w-full' : '' }}"></span>
                                    </span>
                                </div>
                                <div class="absolute inset-0 rounded-xl bg-gradient-accent/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Right Side -->
            <div class="flex items-center space-x-4">
                @auth
                    <!-- Notifications -->
                    <button class="group relative p-3 text-slate-600 hover:text-slate-900 hover:bg-slate-100 rounded-xl transition-all duration-300 transform hover:scale-110">
                        <svg class="w-5 h-5 transition-all duration-300 group-hover:scale-110 group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM11 19H6.5A2.5 2.5 0 014 16.5v-9A2.5 2.5 0 016.5 5h11A2.5 2.5 0 0120 7.5v3.5"></path>
                        </svg>
                        <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-gradient-to-r from-red-400 to-pink-500 rounded-full animate-pulse shadow-lg"></span>
                        <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-gradient-to-r from-red-400 to-pink-500 rounded-full animate-ping"></span>
                    </button>

                    <!-- User Dropdown -->
                    <div class="relative" @click.away="userDropdown = false">
                        <button @click="userDropdown = !userDropdown" class="group flex items-center space-x-3 p-2 rounded-xl hover:bg-slate-100 transition-all duration-300 transform hover:scale-105">
                            <div class="w-8 h-8 bg-gradient-primary rounded-full flex items-center justify-center transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg">
                                <span class="text-white text-sm font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <div class="hidden sm:block text-left">
                                <p class="text-sm font-medium text-slate-900 group-hover:text-slate-700 transition-colors duration-300">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-slate-500 capitalize group-hover:text-slate-600 transition-colors duration-300">{{ Auth::user()->role }}</p>
                            </div>
                            <svg class="w-4 h-4 text-slate-600 transition-all duration-300 group-hover:text-slate-800" :class="{'rotate-180 scale-110': userDropdown}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="userDropdown" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="transform opacity-0 scale-95 translate-y-2"
                             x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
                             x-transition:leave-end="transform opacity-0 scale-95 translate-y-2"
                             class="absolute right-0 mt-3 w-64 bg-white rounded-2xl shadow-2xl border border-slate-200/50 py-2 z-50 backdrop-blur-sm">
                            
                            <div class="px-4 py-4 border-b border-slate-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-primary rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-slate-900">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-slate-500">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="#" class="group flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-300 transform hover:scale-105 mx-2 rounded-xl">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors duration-300">
                                    <svg class="w-4 h-4 text-blue-600 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <span class="group-hover:text-blue-700 transition-colors duration-300">Profil Saya</span>
                            </a>
                            
                            <a href="#" class="group flex items-center px-4 py-3 text-sm text-slate-700 hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-300 transform hover:scale-105 mx-2 rounded-xl">
                                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-200 transition-colors duration-300">
                                    <svg class="w-4 h-4 text-purple-600 group-hover:scale-110 group-hover:rotate-12 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <span class="group-hover:text-purple-700 transition-colors duration-300">Pengaturan</span>
                            </a>
                            
                            <div class="border-t border-slate-100 mt-2 pt-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="group flex items-center w-full px-4 py-3 text-sm text-red-600 hover:bg-gradient-to-r hover:from-red-50 hover:to-pink-50 transition-all duration-300 transform hover:scale-105 mx-2 rounded-xl">
                                        <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-red-200 transition-colors duration-300">
                                            <svg class="w-4 h-4 text-red-600 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                        </div>
                                        <span class="group-hover:text-red-700 transition-colors duration-300">Keluar</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Guest Actions -->
                    <div class="hidden sm:flex sm:items-center sm:space-x-3">
                        <a href="{{ route('login') }}" class="group relative px-6 py-2 text-sm font-medium text-slate-700 hover:text-sky-600 transition-all duration-300 transform hover:scale-105">
                            <span class="relative z-10 flex items-center space-x-2">
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                <span>Masuk</span>
                            </span>
                            <div class="absolute inset-0 rounded-xl bg-sky-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                        <a href="{{ route('register') }}" class="btn-primary text-sm group relative overflow-hidden">
                            <span class="relative z-10 flex items-center space-x-2">
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                <span>Daftar Nasabah</span>
                            </span>
                            <div class="absolute inset-0 bg-gradient-secondary opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                    </div>
                @endauth

                <!-- Mobile menu button -->
                <button @click="open = !open" class="md:hidden p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-all duration-300">
                    <svg class="w-6 h-6" :class="{'hidden': open, 'block': !open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="w-6 h-6" :class="{'block': open, 'hidden': !open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="transform opacity-0 translate-y-4"
         x-transition:enter-end="transform opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="transform opacity-100 translate-y-0"
         x-transition:leave-end="transform opacity-0 translate-y-4"
         class="md:hidden bg-white border-t border-slate-200 shadow-lg">
        <div class="px-4 py-6 space-y-3">
            <a href="{{ route('home') }}" class="group flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('home') ? 'bg-gradient-primary text-white shadow-glow' : 'text-slate-600 hover:bg-gradient-to-r hover:from-sky-50 hover:to-blue-50' }} transition-all duration-300 transform hover:scale-105">
                <div class="w-8 h-8 {{ request()->routeIs('home') ? 'bg-white/20' : 'bg-sky-100 group-hover:bg-sky-200' }} rounded-lg flex items-center justify-center transition-colors duration-300">
                    <svg class="w-5 h-5 {{ request()->routeIs('home') ? 'text-white' : 'text-sky-600' }} group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
                <span class="font-medium {{ request()->routeIs('home') ? 'text-white' : 'group-hover:text-sky-700' }} transition-colors duration-300">Beranda</span>
            </a>
            
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="group flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-primary text-white shadow-glow' : 'text-slate-600 hover:bg-gradient-to-r hover:from-cyan-50 hover:to-blue-50' }} transition-all duration-300 transform hover:scale-105">
                        <div class="w-8 h-8 {{ request()->routeIs('admin.dashboard') ? 'bg-white/20' : 'bg-cyan-100 group-hover:bg-cyan-200' }} rounded-lg flex items-center justify-center transition-colors duration-300">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-cyan-600' }} group-hover:scale-110 group-hover:rotate-3 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <span class="font-medium {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'group-hover:text-cyan-700' }} transition-colors duration-300">Dashboard Admin</span>
                    </a>
                @else
                    <a href="{{ route('nasabah.dashboard') }}" class="group flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('nasabah.dashboard') ? 'bg-gradient-primary text-white shadow-glow' : 'text-slate-600 hover:bg-gradient-to-r hover:from-emerald-50 hover:to-green-50' }} transition-all duration-300 transform hover:scale-105">
                        <div class="w-8 h-8 {{ request()->routeIs('nasabah.dashboard') ? 'bg-white/20' : 'bg-emerald-100 group-hover:bg-emerald-200' }} rounded-lg flex items-center justify-center transition-colors duration-300">
                            <svg class="w-5 h-5 {{ request()->routeIs('nasabah.dashboard') ? 'text-white' : 'text-emerald-600' }} group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <span class="font-medium {{ request()->routeIs('nasabah.dashboard') ? 'text-white' : 'group-hover:text-emerald-700' }} transition-colors duration-300">Dashboard</span>
                    </a>
                @endif
                
                <div class="border-t border-slate-200 pt-4 mt-4">
                    <div class="flex items-center space-x-3 px-4 py-3 bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl mx-2">
                        <div class="w-12 h-12 bg-gradient-primary rounded-full flex items-center justify-center shadow-lg">
                            <span class="text-white font-semibold text-lg">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <p class="font-medium text-slate-900">{{ Auth::user()->name }}</p>
                            <p class="text-sm text-slate-500 capitalize">{{ Auth::user()->role }}</p>
                        </div>
                    </div>
                    
                    <a href="#" class="group flex items-center space-x-3 px-4 py-3 text-slate-600 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 rounded-xl transition-all duration-300 transform hover:scale-105 mx-2 mt-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-200 transition-colors duration-300">
                            <svg class="w-5 h-5 text-blue-600 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <span class="group-hover:text-blue-700 transition-colors duration-300">Profil Saya</span>
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="group flex items-center space-x-3 w-full px-4 py-3 text-red-600 hover:bg-gradient-to-r hover:from-red-50 hover:to-pink-50 rounded-xl transition-all duration-300 transform hover:scale-105 mx-2 mt-2">
                            <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center group-hover:bg-red-200 transition-colors duration-300">
                                <svg class="w-5 h-5 text-red-600 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                            </div>
                            <span class="group-hover:text-red-700 transition-colors duration-300">Keluar</span>
                        </button>
                    </form>
                </div>
            @else
                <div class="border-t border-slate-200 pt-4 mt-4 space-y-3">
                    <a href="{{ route('login') }}" class="group block px-6 py-4 text-center text-slate-700 hover:text-sky-600 hover:bg-gradient-to-r hover:from-sky-50 hover:to-blue-50 rounded-xl transition-all duration-300 transform hover:scale-105 mx-2">
                        <div class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5 text-slate-500 group-hover:text-sky-600 group-hover:scale-110 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            <span class="font-medium group-hover:text-sky-600 transition-colors duration-300">Masuk</span>
                        </div>
                    </a>
                    <a href="{{ route('register') }}" class="btn-primary group block text-center rounded-xl mx-2 overflow-hidden relative">
                        <div class="flex items-center justify-center space-x-2 relative z-10">
                            <svg class="w-5 h-5 group-hover:scale-110 group-hover:rotate-12 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            <span class="font-medium">Daftar Nasabah</span>
                        </div>
                        <div class="absolute inset-0 bg-gradient-secondary opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>