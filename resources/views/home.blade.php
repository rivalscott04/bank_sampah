@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-green-600 to-green-800 text-white py-16 mb-8 rounded-lg">
    <div class="text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">Bank Sampah Digital</h1>
        <p class="text-xl md:text-2xl mb-8">Kelola sampah Anda dengan mudah dan dapatkan poin reward!</p>
        @guest
            <div class="space-x-4">
                <a href="{{ route('register') }}" class="bg-white text-green-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                    Daftar Sekarang
                </a>
                <a href="{{ route('login') }}" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-600 transition duration-300">
                    Masuk
                </a>
            </div>
        @else
            <a href="{{ route('dashboard') }}" class="bg-white text-green-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                Ke Dashboard
            </a>
        @endguest
    </div>
</div>

<!-- Features Section -->
<div class="grid md:grid-cols-3 gap-8 mb-12">
    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
            </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Tukar Sampah Jadi Poin</h3>
        <p class="text-gray-600">Kumpulkan sampah dan tukarkan dengan poin yang bisa digunakan untuk berbagai keperluan.</p>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-6 0h6m-6 0a1 1 0 00-1 1v10a1 1 0 001 1h6a1 1 0 001-1V8a1 1 0 00-1-1"></path>
            </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Layanan Jemput</h3>
        <p class="text-gray-600">Kami akan menjemput sampah Anda langsung ke rumah sesuai jadwal yang telah ditentukan.</p>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Ramah Lingkungan</h3>
        <p class="text-gray-600">Berkontribusi dalam menjaga lingkungan dengan mendaur ulang sampah secara bertanggung jawab.</p>
    </div>
</div>

<!-- Waste Types Section -->
@if($wastes->count() > 0)
<div class="mb-12">
    <h2 class="text-3xl font-bold text-center mb-8">Jenis Sampah yang Kami Terima</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($wastes as $waste)
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold">{{ $waste->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $waste->category->name }}</p>
                </div>
                <span class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 rounded">
                    Rp {{ number_format($waste->price_per_kg, 0, ',', '.') }}/kg
                </span>
            </div>
        </div>
        @endforeach
    </div>
    
    @guest
    <div class="text-center mt-8">
        <p class="text-gray-600 mb-4">Ingin melihat daftar lengkap dan mulai mengumpulkan poin?</p>
        <a href="{{ route('register') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300">
            Daftar Sekarang
        </a>
    </div>
    @endguest
</div>
@endif

<!-- How It Works Section -->
<div class="bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-3xl font-bold text-center mb-8">Cara Kerja</h2>
    <div class="grid md:grid-cols-4 gap-6">
        <div class="text-center">
            <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="text-green-600 font-bold text-xl">1</span>
            </div>
            <h3 class="font-semibold mb-2">Daftar</h3>
            <p class="text-sm text-gray-600">Buat akun dan lengkapi profil Anda</p>
        </div>
        
        <div class="text-center">
            <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="text-green-600 font-bold text-xl">2</span>
            </div>
            <h3 class="font-semibold mb-2">Kumpulkan</h3>
            <p class="text-sm text-gray-600">Kumpulkan sampah sesuai kategori yang tersedia</p>
        </div>
        
        <div class="text-center">
            <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="text-green-600 font-bold text-xl">3</span>
            </div>
            <h3 class="font-semibold mb-2">Request Jemput</h3>
            <p class="text-sm text-gray-600">Ajukan permintaan penjemputan sampah</p>
        </div>
        
        <div class="text-center">
            <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="text-green-600 font-bold text-xl">4</span>
            </div>
            <h3 class="font-semibold mb-2">Dapatkan Poin</h3>
            <p class="text-sm text-gray-600">Terima poin setelah sampah berhasil dijemput</p>
        </div>
    </div>
</div>
@endsection