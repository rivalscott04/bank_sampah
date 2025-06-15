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
                        <h1 class="text-4xl font-bold text-gradient mb-3">Edit Kategori</h1>
                        <p class="text-xl text-slate-600">Perbarui data kategori</p>
                        <p class="text-sm text-slate-500 mt-2">Lengkapi form di bawah untuk memperbarui kategori</p>
                    </div>
                    <div class="hidden md:block">
                        <div
                            class="w-24 h-24 bg-gradient-eco rounded-full flex items-center justify-center shadow-glow animate-pulse">
                            <svg class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div
                class="glass-effect backdrop-blur-lg bg-white/80 shadow-2xl rounded-3xl border border-white/20 animate-fade-in-up animation-delay-200">
                <div class="px-8 py-8">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Category Name Field -->
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-bold text-slate-700">
                                Nama Kategori
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" name="name" id="name"
                                    value="{{ old('name', $category->name) }}"
                                    class="w-full pl-4 pr-4 py-3 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white/90 backdrop-blur-sm @error('name') border-red-300 @enderror"
                                    placeholder="Masukkan nama kategori">
                            </div>
                            @error('name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-slate-500 mt-1">Nama kategori harus unik dan belum pernah digunakan</p>
                        </div>

                        <!-- Current Info Display -->
                        <div class="bg-blue-50 border border-blue-200 rounded-2xl p-4">
                            <h3 class="text-sm font-semibold text-blue-800 mb-2">Informasi Saat Ini:</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                                <div>
                                    <span class="text-blue-600 font-medium">Nama Kategori:</span>
                                    <p class="text-blue-800">{{ $category->name }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                            <a href="{{ route('admin.categories') }}"
                                class="inline-flex items-center px-6 py-3 border border-slate-300 text-sm font-semibold rounded-2xl text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-all duration-300 shadow-lg hover:shadow-xl">
                                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Kembali
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-8 py-3 border border-transparent text-sm font-semibold rounded-2xl text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 cursor-pointer">
                                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Perbarui Kategori
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
