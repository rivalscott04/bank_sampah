@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <!-- Success Message -->
            @if (session('success'))
                <div id="successAlert"
                    class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                    <button onclick="closeSuccessAlert()"
                        class="text-green-400 hover:text-green-600 transition-colors duration-200 cursor-pointer">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif

            <!-- Error Message -->
            @if (session('error'))
                <div id="errorAlert"
                    class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                        </div>
                    </div>
                    <button onclick="closeErrorAlert()"
                        class="text-red-400 hover:text-red-600 transition-colors duration-200 cursor-pointer">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-slate-900">Data Kategori Sampah</h1>
                        <p class="text-slate-600 mt-1">Kelola kategori sampah bank sampah</p>
                    </div>
                    <a href="{{ route('admin.categories.create') }}"
                        class="bg-gradient-primary text-white px-6 py-3 rounded-lg hover:shadow-glow transition-all duration-200 flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span>Tambah Kategori</span>
                    </a>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full table-auto divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    Nama Kategori
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    Jumlah Sampah
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    Dibuat
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200">
                            @forelse ($categories as $index => $category)
                                <tr class="hover:bg-slate-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                                        {{ $categories->firstItem() + $index }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-gradient-to-r from-emerald-500 to-teal-500 flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-slate-900">{{ $category->name }}</div>
                                                <div class="text-sm text-slate-500">ID: {{ $category->id }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-blue-500 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                                </path>
                                            </svg>
                                            <span class="text-sm font-medium text-slate-900">
                                                {{ $category->wastes_count }} item
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                        {{ $category->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                class="text-emerald-600 hover:text-emerald-900 transition-colors duration-200"
                                                title="Edit Kategori">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <button onclick="confirmDelete({{ $category->id }})"
                                                class="text-red-600 hover:text-red-900 transition-colors duration-200 cursor-pointer"
                                                title="Hapus Kategori">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 text-slate-400 mb-4" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                </path>
                                            </svg>
                                            <h3 class="text-lg font-medium text-slate-900 mb-2">Belum ada kategori sampah
                                            </h3>
                                            <p class="text-slate-500 mb-4">Mulai tambahkan kategori untuk mengelola jenis
                                                sampah</p>
                                            <a href="{{ route('admin.categories.create') }}"
                                                class="bg-gradient-primary text-white px-4 py-2 rounded-lg hover:shadow-glow transition-all duration-200">
                                                Tambah Kategori Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($categories->hasPages())
                    <div class="bg-slate-50 px-6 py-3 border-t border-slate-200">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-slate-700">
                                Menampilkan {{ $categories->firstItem() }} - {{ $categories->lastItem() }} dari
                                {{ $categories->total() }} kategori
                            </div>
                            <div class="flex items-center space-x-2">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-md w-mx-4">
            <div class="flex items-center mb-4">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.268 16.5c-.77.833.192 2.5 1.732 2.5z">
                        </path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-slate-900">Konfirmasi Hapus</h3>
                </div>
            </div>
            <p class="text-sm text-slate-500 mb-6">
                Apakah Anda yakin ingin menghapus kategori ini? Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="flex justify-end space-x-3">
                <button onclick="closeDeleteModal()"
                    class="px-4 py-2 text-sm font-medium text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors duration-200">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors duration-200">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(categoryId) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');

            form.action = `/admin/categories/${categoryId}`;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Close modal when clicking outside
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // Success alert functions
        function closeSuccessAlert() {
            const alert = document.getElementById('successAlert');
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';
            setTimeout(() => {
                alert.remove();
            }, 300);
        }

        // Error alert functions
        function closeErrorAlert() {
            const alert = document.getElementById('errorAlert');
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';
            setTimeout(() => {
                alert.remove();
            }, 300);
        }

        // Auto-hide success message after 5 seconds
        @if (session('success'))
            setTimeout(() => {
                const alert = document.getElementById('successAlert');
                if (alert) {
                    closeSuccessAlert();
                }
            }, 5000);
        @endif

        // Auto-hide error message after 7 seconds
        @if (session('error'))
            setTimeout(() => {
                const alert = document.getElementById('errorAlert');
                if (alert) {
                    closeErrorAlert();
                }
            }, 7000);
        @endif
    </script>
@endsection
