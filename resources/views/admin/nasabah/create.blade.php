@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-blue-50 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div
                class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-eco rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-blob">
            </div>
            <div
                class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-primary rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-gradient-secondary rounded-full mix-blend-multiply filter blur-xl opacity-10 animate-blob animation-delay-4000">
            </div>
        </div>

        <div class="max-w-4xl mx-auto py-8 sm:px-6 lg:px-8 relative z-10">
            <!-- Header -->
            <div
                class="mb-10 glass-effect backdrop-blur-lg bg-white/80 p-8 rounded-3xl shadow-2xl border border-white/20 animate-fade-in-up">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold text-gradient mb-3">Tambah Nasabah</h1>
                        <p class="text-xl text-slate-600">Buat akun nasabah baru</p>
                        <p class="text-sm text-slate-500 mt-2">Lengkapi form di bawah untuk menambah nasabah baru</p>
                    </div>
                    <div class="hidden md:block">
                        <div
                            class="w-24 h-24 bg-gradient-eco rounded-full flex items-center justify-center shadow-glow animate-pulse">
                            <svg class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div
                class="glass-effect backdrop-blur-lg bg-white/80 shadow-2xl rounded-3xl border border-white/20 animate-fade-in-up animation-delay-200">
                <div class="px-8 py-8">
                    <form action="{{ route('admin.nasabah.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Name Field -->
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-bold text-slate-700">
                                Nama Lengkap
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="w-full pl-12 pr-4 py-3 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white/90 backdrop-blur-sm @error('name') border-red-300 @enderror"
                                    placeholder="Masukkan nama lengkap nasabah">
                            </div>
                            @error('name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-bold text-slate-700">
                                Email
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="w-full pl-12 pr-4 py-3 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white/90 backdrop-blur-sm @error('email') border-red-300 @enderror"
                                    placeholder="Masukkan alamat email">
                            </div>
                            @error('email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-bold text-slate-700">
                                Password
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input type="password" name="password" id="password"
                                    class="w-full pl-12 pr-4 py-3 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white/90 backdrop-blur-sm @error('password') border-red-300 @enderror"
                                    placeholder="Masukkan password (minimal 8 karakter)">
                            </div>
                            @error('password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-slate-500 mt-1">Password harus minimal 8 karakter</p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                            <a href="{{ route('admin.nasabah') }}"
                                class="inline-flex items-center px-6 py-3 border border-slate-300 text-sm font-semibold rounded-2xl text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-all duration-300 shadow-lg hover:shadow-xl">
                                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Kembali
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-8 py-3 border border-transparent text-sm font-semibold rounded-2xl text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Tambah Nasabah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
