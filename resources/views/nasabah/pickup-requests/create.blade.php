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
                        <h1 class="text-4xl font-bold text-gradient mb-3">Permintaan Jemput Sampah</h1>
                        <p class="text-xl text-slate-600">Ajukan permintaan penjemputan sampah</p>
                        <p class="text-sm text-slate-500 mt-2">Lengkapi form di bawah untuk mengajukan permintaan jemput
                            sampah</p>
                    </div>
                    <div class="hidden md:block">
                        <div
                            class="w-24 h-24 bg-gradient-eco rounded-full flex items-center justify-center shadow-glow animate-pulse">
                            <svg class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div
                class="glass-effect backdrop-blur-lg bg-white/80 shadow-2xl rounded-3xl border border-white/20 animate-fade-in-up animation-delay-200">
                <div class="px-8 py-8">
                    <form action="{{ route('nasabah.pickup-requests.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Waste Type Field -->
                        <div class="space-y-2">
                            <label for="waste_id" class="block text-sm font-bold text-slate-700">
                                Jenis Sampah
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </div>
                                <select name="waste_id" id="waste_id"
                                    class="w-full pl-12 pr-4 py-3 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white/90 backdrop-blur-sm @error('waste_id') border-red-300 @enderror appearance-none">
                                    <option value="">Pilih Jenis Sampah</option>
                                    @foreach ($wastes as $waste)
                                        <option value="{{ $waste->id }}"
                                            {{ old('waste_id') == $waste->id ? 'selected' : '' }}>
                                            {{ $waste->name }} - {{ $waste->category->name }} (Rp
                                            {{ number_format($waste->price_per_kg, 0, ',', '.') }}/kg)
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            @error('waste_id')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Address Field -->
                        <div class="space-y-2">
                            <label for="address" class="block text-sm font-bold text-slate-700">
                                Alamat Penjemputan
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute top-[0.9rem] left-0 pl-4 flex items-start pointer-events-none z-10">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <textarea name="address" id="address" rows="4"
                                    class="w-full pl-12 pr-4 py-3 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white/90 backdrop-blur-sm @error('address') border-red-300 @enderror resize-none"
                                    placeholder="Masukkan alamat lengkap untuk penjemputan sampah">{{ old('address') }}</textarea>
                            </div>
                            @error('address')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-slate-500 mt-1">Maksimal 500 karakter</p>
                        </div>

                        <!-- Date Request Field -->
                        <div class="space-y-2">
                            <label for="date_request" class="block text-sm font-bold text-slate-700">
                                Tanggal Penjemputan
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="date" name="date_request" id="date_request"
                                    value="{{ old('date_request') }}"
                                    class="w-full pl-12 pr-4 py-3 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white/90 backdrop-blur-sm @error('date_request') border-red-300 @enderror"
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                            </div>
                            @error('date_request')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-slate-500 mt-1">Pilih tanggal minimal H+1 dari hari ini</p>
                        </div>

                        <!-- Estimated Weight Field -->
                        <div class="space-y-2">
                            <label for="estimated_weight" class="block text-sm font-bold text-slate-700">
                                Perkiraan Berat Sampah
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                    </svg>
                                </div>
                                <input type="number" name="estimated_weight" id="estimated_weight"
                                    value="{{ old('estimated_weight') }}"
                                    class="w-full pl-12 pr-4 py-3 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white/90 backdrop-blur-sm @error('estimated_weight') border-red-300 @enderror relative z-0"
                                    placeholder="0.0" min="0.1" step="0.1">
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none z-10">
                                    <span class="text-slate-400 text-sm">kg</span>
                                </div>
                            </div>
                            @error('estimated_weight')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-slate-500 mt-1">Masukkan perkiraan berat dalam kilogram (minimal 0,1 kg)
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                            <a href="{{ route('nasabah.pickup-requests') }}"
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
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                                Kirim Permintaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
