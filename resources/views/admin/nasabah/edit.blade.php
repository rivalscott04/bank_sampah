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
                        <h1 class="text-4xl font-bold text-gradient mb-3">Edit Nasabah</h1>
                        <p class="text-xl text-slate-600">Perbarui data nasabah</p>
                        <p class="text-sm text-slate-500 mt-2">Ubah informasi nasabah {{ $user->name }}</p>
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
                    <form action="{{ route('admin.nasabah.update', $user->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Name Field -->
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-bold text-slate-700">
                                Nama Lengkap
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
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
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
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
                                <span class="text-slate-500">(Kosongkan jika tidak ingin mengubah)</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input type="password" name="password" id="password"
                                    class="w-full pl-12 pr-4 py-3 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white/90 backdrop-blur-sm @error('password') border-red-300 @enderror"
                                    placeholder="Masukkan password baru (minimal 8 karakter)">
                            </div>
                            @error('password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengubah password. Jika diisi,
                                password harus minimal 8 karakter</p>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="space-y-2">
                            <label for="password_confirmation" class="block text-sm font-bold text-slate-700">
                                Konfirmasi Password
                                <span class="text-slate-500">(Hanya jika mengubah password)</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="w-full pl-12 pr-4 py-3 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-white/90 backdrop-blur-sm"
                                    placeholder="Konfirmasi password baru">
                            </div>
                            <p class="text-xs text-slate-500 mt-1">Ulangi password baru untuk konfirmasi</p>
                        </div>

                        <!-- Current Data Info -->
                        <div class="bg-blue-50 border border-blue-200 rounded-2xl p-4">
                            <h3 class="text-sm font-semibold text-blue-800 mb-2">Informasi Data Saat Ini:</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm">
                                <div class="text-blue-700">
                                    <span class="font-medium">Nama:</span> {{ $user->name }}
                                </div>
                                <div class="text-blue-700">
                                    <span class="font-medium">Email:</span> {{ $user->email }}
                                </div>
                                <div class="text-blue-700">
                                    <span class="font-medium">Dibuat:</span>
                                    {{ $user->created_at->format('d/m/Y H:i') }}
                                </div>
                                <div class="text-blue-700">
                                    <span class="font-medium">Terakhir diupdate:</span>
                                    {{ $user->updated_at->format('d/m/Y H:i') }}
                                </div>
                            </div>
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
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    Update Nasabah
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
            document.getElementById('name').value = '{{ $user->name }}';
            document.getElementById('email').value = '{{ $user->email }}';
            document.getElementById('password').value = '';
            document.getElementById('password_confirmation').value = '';

            // Hapus error states
            const errorInputs = document.querySelectorAll('.border-red-300');
            errorInputs.forEach(input => {
                input.classList.remove('border-red-300');
            });
        }
    </script>
@endsection
