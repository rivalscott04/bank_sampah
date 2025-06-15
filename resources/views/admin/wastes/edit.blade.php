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
                        <h1 class="text-4xl font-bold text-gradient mb-3">Edit Sampah</h1>
                        <p class="text-xl text-slate-600">Ubah data sampah: {{ $waste->name }}</p>
                        <p class="text-sm text-slate-500 mt-2">Perbarui informasi jenis sampah yang sudah ada</p>
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
                    <form action="{{ route('admin.wastes.update', $waste->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Name Field -->
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-bold text-slate-700">
                                Nama Sampah
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                </div>
                                <input type="text" name="name" id="name" value="{{ old('name', $waste->name) }}"
                                    class="w-full pl-12 pr-4 py-3 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white/90 backdrop-blur-sm @error('name') border-red-300 @enderror"
                                    placeholder="Masukkan nama sampah">
                            </div>
                            @error('name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category Field -->
                        <div class="space-y-2">
                            <label for="category_id" class="block text-sm font-bold text-slate-700">
                                Kategori Sampah
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                                <select name="category_id" id="category_id"
                                    class="w-full pl-12 pr-4 py-3 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white/90 backdrop-blur-sm @error('category_id') border-red-300 @enderror appearance-none">
                                    <option value="">Pilih Kategori Sampah</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $waste->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
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
                            @error('category_id')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price per KG Field -->
                        <div class="space-y-2">
                            <label for="price_per_kg" class="block text-sm font-bold text-slate-700">
                                Harga per KG
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <span class="text-slate-400 text-sm font-medium">Rp</span>
                                </div>
                                <input type="number" name="price_per_kg" id="price_per_kg"
                                    value="{{ old('price_per_kg', $waste->price_per_kg) }}"
                                    class="w-full pl-12 pr-4 py-3 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white/90 backdrop-blur-sm @error('price_per_kg') border-red-300 @enderror relative z-0"
                                    placeholder="0" min="0" step="0.01">
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none z-10">
                                    <span class="text-slate-400 text-sm">/kg</span>
                                </div>
                            </div>
                            @error('price_per_kg')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-slate-500 mt-1">Masukkan harga dalam Rupiah per kilogram</p>
                        </div>

                        <!-- Current Info Display -->
                        <div class="bg-blue-50 border border-blue-200 rounded-2xl p-4">
                            <h3 class="text-sm font-semibold text-blue-800 mb-2">Informasi Saat Ini:</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                                <div>
                                    <span class="text-blue-600 font-medium">Nama:</span>
                                    <p class="text-blue-800">{{ $waste->name }}</p>
                                </div>
                                <div>
                                    <span class="text-blue-600 font-medium">Kategori:</span>
                                    <p class="text-blue-800">{{ $waste->category->name ?? 'Tidak ada kategori' }}</p>
                                </div>
                                <div>
                                    <span class="text-blue-600 font-medium">Harga:</span>
                                    <p class="text-blue-800">Rp {{ number_format($waste->price_per_kg, 0, ',', '.') }}/kg
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                            <a href="{{ route('admin.wastes') }}"
                                class="inline-flex items-center px-6 py-3 border border-slate-300 text-sm font-semibold rounded-2xl text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-all duration-300 shadow-lg hover:shadow-xl">
                                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Batal
                            </a>
                            <div class="flex space-x-3">
                                <button type="button" onclick="resetForm()"
                                    class="inline-flex items-center px-6 py-3 border border-yellow-300 text-sm font-semibold rounded-2xl text-yellow-700 bg-yellow-50 hover:bg-yellow-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-300 shadow-lg hover:shadow-xl">
                                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                    Reset
                                </button>
                                <button type="submit"
                                    class="inline-flex items-center px-8 py-3 border border-transparent text-sm font-semibold rounded-2xl text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 cursor-pointer">
                                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        function resetForm() {
            // Reset form ke nilai awal dari database
            document.getElementById('name').value = '{{ $waste->name }}';
            document.getElementById('category_id').value = '{{ $waste->category_id }}';
            document.getElementById('price_per_kg').value = '{{ $waste->price_per_kg }}';

            // Remove error classes if any
            document.querySelectorAll('.border-red-300').forEach(el => {
                el.classList.remove('border-red-300');
                el.classList.add('border-slate-200');
            });

            // Hide error messages
            document.querySelectorAll('.text-red-600').forEach(el => {
                el.style.display = 'none';
            });
        }
    </script>
@endsection
