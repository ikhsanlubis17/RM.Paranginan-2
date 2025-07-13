<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg">
                    <i class="fas fa-tags text-white text-lg"></i>
                </div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Manajemen Kategori') }}
                </h2>
            </div>
            <a href="{{ route('admin.categories.create') }}" 
               class="group relative bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center space-x-2">
                <i class="fas fa-plus transition-transform duration-300 group-hover:rotate-90"></i>
                <span>Tambah Kategori</span>
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="flash-message bg-gradient-to-r from-green-50 to-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6 shadow-sm animate-slide-down">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-3 text-green-500"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="flash-message bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6 shadow-sm animate-slide-down">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-3 text-red-500"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <!-- Main Content Card -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 animate-fade-in">
                <div class="p-6 sm:p-8">
                    @if($categories->count() > 0)
                        <!-- Stats Header -->
                        <div class="mb-8 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-100">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-blue-100 rounded-lg">
                                        <i class="fas fa-chart-bar text-blue-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800">Total Kategori</h3>
                                        <p class="text-sm text-gray-600">Daftar semua kategori yang tersedia</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-3xl font-bold text-blue-600">{{ $categories->count() }}</div>
                                    <div class="text-sm text-gray-500">Kategori</div>
                                </div>
                            </div>
                        </div>

                        <!-- Table Container -->
                        <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-tag text-gray-500"></i>
                                                <span>Nama Kategori</span>
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-utensils text-gray-500"></i>
                                                <span>Jumlah Menu</span>
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-cogs text-gray-500"></i>
                                                <span>Aksi</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($categories as $index => $category)
                                        <tr class="table-row hover:bg-gray-50 transition-colors duration-200" style="animation-delay: {{ $index * 100 }}ms;">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center space-x-3">
                                                    <div class="p-2 bg-gradient-to-r from-orange-100 to-orange-200 rounded-lg">
                                                        <i class="fas fa-folder text-orange-600"></i>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-semibold text-gray-900">{{ $category->name }}</div>
                                                        <div class="text-xs text-gray-500">Kategori Menu</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center space-x-2">
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                        {{ $category->menus->count() }} menu
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex items-center space-x-3">
                                                    <a href="{{ route('admin.categories.edit', $category) }}" 
                                                       class="group inline-flex items-center space-x-2 text-blue-600 hover:text-blue-800 transition-colors duration-200">
                                                        <i class="fas fa-edit transition-transform duration-200 group-hover:scale-110"></i>
                                                        <span class="font-medium">Edit</span>
                                                    </a>
                                                    <form action="{{ route('admin.categories.destroy', $category) }}" 
                                                          method="POST" 
                                                          class="delete-form inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="group inline-flex items-center space-x-2 text-red-600 hover:text-red-800 transition-colors duration-200">
                                                            <i class="fas fa-trash transition-transform duration-200 group-hover:scale-110"></i>
                                                            <span class="font-medium">Hapus</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-16 animate-fade-in">
                            <div class="mx-auto w-24 h-24 bg-gradient-to-br from-orange-100 to-orange-200 rounded-full flex items-center justify-center mb-6">
                                <i class="fas fa-tags text-4xl text-orange-600"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Belum Ada Kategori</h3>
                            <p class="text-gray-600 mb-8 max-w-md mx-auto">
                                Mulai dengan menambahkan kategori pertama untuk mengorganisir menu Anda dengan lebih baik.
                            </p>
                            <a href="{{ route('admin.categories.create') }}" 
                               class="group inline-flex items-center space-x-3 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                                <i class="fas fa-plus transition-transform duration-300 group-hover:rotate-90"></i>
                                <span>Tambah Kategori Pertama</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        @keyframes slide-down {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        .animate-slide-down {
            animation: slide-down 0.5s ease-out;
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }

        .table-row {
            animation: fade-in-up 0.5s ease-out forwards;
            opacity: 0;
        }

        .flash-message {
            animation: slide-down 0.5s ease-out;
        }

        /* Custom scrollbar for table */
        .overflow-x-auto::-webkit-scrollbar {
            height: 8px;
        }

        .overflow-x-auto::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }

        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        .overflow-x-auto::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Hover effects for buttons */
        .group:hover .fas {
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        /* Mobile responsive improvements */
        @media (max-width: 640px) {
            .table-row td {
                padding: 1rem 0.5rem;
            }
            
            .table-row td:first-child {
                padding-left: 1rem;
            }
            
            .table-row td:last-child {
                padding-right: 1rem;
            }
        }
    </style>
</x-app-layout>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Animate table rows on load
    const tableRows = document.querySelectorAll('.table-row');
    tableRows.forEach((row, index) => {
        setTimeout(() => {
            row.style.opacity = '1';
        }, index * 100);
    });

    // Enhanced delete confirmation
    document.querySelectorAll('.delete-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data kategori yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg mr-2 transition-colors duration-200',
                    cancelButton: 'bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg ml-2 transition-colors duration-200'
                },
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    Swal.fire({
                        title: 'Menghapus...',
                        text: 'Mohon tunggu sebentar',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        willOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    form.submit();
                }
            });
        });
    });

    // Auto-hide flash messages after 5 seconds
    setTimeout(() => {
        const flashMessages = document.querySelectorAll('.flash-message');
        flashMessages.forEach(message => {
            message.style.opacity = '0';
            message.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                message.remove();
            }, 300);
        });
    }, 5000);
});
</script>