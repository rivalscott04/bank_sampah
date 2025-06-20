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
                        <h1 class="text-3xl font-bold text-slate-900">Kelola Permintaan Penjemputan</h1>
                        <p class="text-slate-600 mt-1">Kelola dan update status permintaan penjemputan sampah</p>
                    </div>

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
                                    Nasabah
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    Jenis Sampah
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    Tanggal Permintaan
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    Estimasi Berat
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    Alamat
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200">
                            @forelse ($pickupRequests as $index => $request)
                                <tr class="hover:bg-slate-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                                        {{ $pickupRequests->firstItem() + $index }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-500 flex items-center justify-center">
                                                    <span class="text-white font-medium text-sm">
                                                        {{ strtoupper(substr($request->user->name, 0, 2)) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-slate-900">{{ $request->user->name }}
                                                </div>
                                                <div class="text-sm text-slate-500">{{ $request->user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-gradient-to-r from-green-500 to-emerald-500 flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-slate-900">{{ $request->waste->name }}
                                                </div>
                                                <div class="text-sm text-slate-500">{{ $request->waste->category->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                                        {{ $request->date_request->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-blue-500 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                                                </path>
                                            </svg>
                                            <span class="text-sm font-medium text-slate-900">
                                                {{ number_format($request->estimated_weight, 2) }} KG
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-slate-900 max-w-xs truncate"
                                            title="{{ $request->address }}">
                                            {{ $request->address }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form onchange="updateStatus({{ $request->id }}, this)" class="inline-block">
                                            @csrf
                                            <select name="status"
                                                class="text-xs font-medium rounded-full px-3 py-2 border-0 focus:ring-2 focus:ring-blue-500 cursor-pointer
                                                @if ($request->status === 'pending') bg-yellow-100 text-yellow-800
                                                @elseif($request->status === 'dijemput') bg-blue-100 text-blue-800
                                                @elseif($request->status === 'selesai') bg-green-100 text-green-800 @endif">
                                                <option value="pending"
                                                    {{ $request->status === 'pending' ? 'selected' : '' }}>
                                                    Menunggu
                                                </option>
                                                <option value="dijemput"
                                                    {{ $request->status === 'dijemput' ? 'selected' : '' }}>
                                                    Dijemput
                                                </option>
                                                <option value="selesai"
                                                    {{ $request->status === 'selesai' ? 'selected' : '' }}>
                                                    Selesai
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <button onclick="viewDetails({{ $request->id }})"
                                                class="text-blue-600 hover:text-blue-900 transition-colors duration-200"
                                                title="Lihat Detail">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                            </button>
                                            @if ($request->status === 'selesai')
                                                <button onclick="showCompleteModal({{ $request->id }})"
                                                    class="text-emerald-600 hover:text-emerald-900 transition-colors duration-200"
                                                    title="Input Berat Aktual">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-12 h-12 text-slate-400 mb-4" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v8m4-8v8m-8-4h16l-2-9H6l-2 9z">
                                                </path>
                                            </svg>
                                            <h3 class="text-lg font-medium text-slate-900 mb-2">Belum ada permintaan
                                                penjemputan</h3>
                                            <p class="text-slate-500">Permintaan penjemputan dari nasabah akan muncul di
                                                sini</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($pickupRequests->hasPages())
                    <div class="bg-slate-50 px-6 py-3 border-t border-slate-200">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-slate-700">
                                Menampilkan {{ $pickupRequests->firstItem() }} - {{ $pickupRequests->lastItem() }} dari
                                {{ $pickupRequests->total() }} permintaan
                            </div>
                            <div class="flex items-center space-x-2">
                                {{ $pickupRequests->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Complete Modal for Actual Weight Input -->
    <div id="completeModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-md w-mx-4">
            <div class="flex items-center mb-4">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-slate-900">Input Berat Aktual</h3>
                </div>
            </div>
            <form id="completeForm" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="actual_weight" class="block text-sm font-medium text-slate-700 mb-2">
                        Berat Aktual (KG)
                    </label>
                    <input type="number" id="actual_weight" name="actual_weight" step="0.01" min="0.1"
                        class="w-full border border-slate-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan berat aktual" required>
                </div>
                <input type="hidden" name="status" value="selesai">
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeCompleteModal()"
                        class="px-4 py-2 text-sm font-medium text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors duration-200">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors duration-200">
                        Selesaikan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function updateStatus(requestId, form) {
            const status = form.status.value;

            if (status === 'selesai') {
                showCompleteModal(requestId);
                return;
            }

            // Create a temporary form for status update
            const tempForm = document.createElement('form');
            tempForm.method = 'POST';
            tempForm.action = `/admin/pickup-requests/${requestId}/status`;

            const csrfField = document.createElement('input');
            csrfField.type = 'hidden';
            csrfField.name = '_token';
            csrfField.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'PUT';

            const statusField = document.createElement('input');
            statusField.type = 'hidden';
            statusField.name = 'status';
            statusField.value = status;

            tempForm.appendChild(csrfField);
            tempForm.appendChild(methodField);
            tempForm.appendChild(statusField);

            document.body.appendChild(tempForm);
            tempForm.submit();
        }

        function showCompleteModal(requestId) {
            const modal = document.getElementById('completeModal');
            const form = document.getElementById('completeForm');

            form.action = `/admin/pickup-requests/${requestId}/status`;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeCompleteModal() {
            const modal = document.getElementById('completeModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');

            // Reset form
            document.getElementById('actual_weight').value = '';
        }

        function viewDetails(requestId) {
            // Implement view details functionality
            window.location.href = `/admin/pickup-requests/${requestId}`;
        }

        function filterByStatus(status) {
            const url = new URL(window.location);
            if (status) {
                url.searchParams.set('status', status);
            } else {
                url.searchParams.delete('status');
            }
            window.location.href = url.toString();
        }

        // Close modal when clicking outside
        document.getElementById('completeModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeCompleteModal();
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
