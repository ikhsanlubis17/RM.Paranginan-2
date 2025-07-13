<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8 animate-fade-in">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg">
                            <i class="fas fa-users text-white text-lg"></i>
                        </div>
                        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                            Manajemen User
                        </h2>
                    </div>
                    <a href="{{ route('admin.users.create') }}" 
                       class="group relative bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center space-x-2">
                        <i class="fas fa-plus transition-transform duration-300 group-hover:rotate-90"></i>
                        <span>Tambah User Baru</span>
                    </a>
                </div>
            </div>

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
                    <!-- Stats Section -->
                    <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="stats-card bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-xl border border-blue-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-blue-600 font-medium">Total Users</p>
                                    <p class="text-2xl font-bold text-blue-800">{{ $users->total() }}</p>
                                </div>
                                <div class="p-3 bg-blue-200 rounded-lg">
                                    <i class="fas fa-users text-blue-600"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="stats-card bg-gradient-to-br from-red-50 to-red-100 p-4 rounded-xl border border-red-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-red-600 font-medium">Admin Users</p>
                                    <p class="text-2xl font-bold text-red-800">{{ $users->where('is_admin', true)->count() }}</p>
                                </div>
                                <div class="p-3 bg-red-200 rounded-lg">
                                    <i class="fas fa-user-shield text-red-600"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="stats-card bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-xl border border-green-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-green-600 font-medium">Regular Users</p>
                                    <p class="text-2xl font-bold text-green-800">{{ $users->where('is_admin', false)->count() }}</p>
                                </div>
                                <div class="p-3 bg-green-200 rounded-lg">
                                    <i class="fas fa-user text-green-600"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Desktop Table View -->
                    <div class="hidden lg:block">
                        <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-user text-gray-500"></i>
                                                <span>User</span>
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-envelope text-gray-500"></i>
                                                <span>Email</span>
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-shield-alt text-gray-500"></i>
                                                <span>Role</span>
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-calendar-alt text-gray-500"></i>
                                                <span>Tanggal Daftar</span>
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
                                    @forelse($users as $index => $user)
                                        <tr class="table-row hover:bg-gray-50 transition-colors duration-200" style="animation-delay: {{ $index * 100 }}ms;">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center space-x-3">
                                                    <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center">
                                                        <span class="text-indigo-600 font-semibold text-sm">{{ substr($user->name, 0, 2) }}</span>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-semibold text-gray-900">{{ $user->name }}</div>
                                                        <div class="text-xs text-gray-500">{{ $user->is_admin ? 'Administrator' : 'Regular User' }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($user->is_admin)
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                        <i class="fas fa-shield-alt mr-1"></i>
                                                        Admin
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                        <i class="fas fa-user mr-1"></i>
                                                        User
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $user->created_at->format('d/m/Y') }}</div>
                                                <div class="text-xs text-gray-500">{{ $user->created_at->format('H:i') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex items-center space-x-2">
                                                    <a href="{{ route('admin.users.show', $user->id) }}" 
                                                       class="group inline-flex items-center space-x-1 text-blue-600 hover:text-blue-800 transition-colors duration-200 px-2 py-1 rounded">
                                                        <i class="fas fa-eye text-xs transition-transform duration-200 group-hover:scale-110"></i>
                                                        <span>Detail</span>
                                                    </a>
                                                    <a href="{{ route('admin.users.edit', $user->id) }}" 
                                                       class="group inline-flex items-center space-x-1 text-indigo-600 hover:text-indigo-800 transition-colors duration-200 px-2 py-1 rounded">
                                                        <i class="fas fa-edit text-xs transition-transform duration-200 group-hover:scale-110"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    @if($user->id !== auth()->id())
                                                        <form action="{{ route('admin.users.destroy', $user->id) }}" 
                                                              method="POST" 
                                                              class="delete-form inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="group inline-flex items-center space-x-1 text-red-600 hover:text-red-800 transition-colors duration-200 px-2 py-1 rounded">
                                                                <i class="fas fa-trash text-xs transition-transform duration-200 group-hover:scale-110"></i>
                                                                <span>Hapus</span>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <span class="inline-flex items-center space-x-1 text-gray-400 px-2 py-1 rounded">
                                                            <i class="fas fa-lock text-xs"></i>
                                                            <span>Diri Sendiri</span>
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-12 text-center">
                                                <div class="flex flex-col items-center">
                                                    <i class="fas fa-users text-4xl text-gray-400 mb-4"></i>
                                                    <p class="text-gray-500 text-lg">Tidak ada user ditemukan</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Mobile Card View -->
                    <div class="lg:hidden space-y-4">
                        @forelse($users as $index => $user)
                            <div class="mobile-card bg-white border border-gray-200 rounded-xl p-4 shadow-sm hover:shadow-md transition-all duration-300" style="animation-delay: {{ $index * 100 }}ms;">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center">
                                            <span class="text-indigo-600 font-semibold">{{ substr($user->name, 0, 2) }}</span>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900">{{ $user->name }}</h3>
                                            <p class="text-sm text-gray-500">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                    @if($user->is_admin)
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <i class="fas fa-shield-alt mr-1"></i>
                                            Admin
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-user mr-1"></i>
                                            User
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="mb-4">
                                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                                        <i class="fas fa-calendar-alt text-gray-400"></i>
                                        <span>Daftar: {{ $user->created_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                </div>
                                
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.users.show', $user->id) }}" 
                                       class="flex-1 bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 text-center">
                                        <i class="fas fa-eye mr-1"></i>
                                        Detail
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" 
                                       class="flex-1 bg-indigo-50 text-indigo-600 hover:bg-indigo-100 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 text-center">
                                        <i class="fas fa-edit mr-1"></i>
                                        Edit
                                    </a>
                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" 
                                              method="POST" 
                                              class="delete-form flex-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full bg-red-50 text-red-600 hover:bg-red-100 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                                <i class="fas fa-trash mr-1"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    @else
                                        <div class="flex-1 bg-gray-50 text-gray-400 px-3 py-2 rounded-lg text-sm font-medium text-center">
                                            <i class="fas fa-lock mr-1"></i>
                                            Diri Sendiri
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <i class="fas fa-users text-4xl text-gray-400 mb-4"></i>
                                <p class="text-gray-500 text-lg">Tidak ada user ditemukan</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($users->hasPages())
                        <div class="mt-8 flex justify-center">
                            <div class="pagination-wrapper">
                                {{ $users->links() }}
                            </div>
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

        .mobile-card {
            animation: fade-in-up 0.5s ease-out forwards;
            opacity: 0;
        }

        .stats-card {
            animation: fade-in-up 0.5s ease-out forwards;
            opacity: 0;
        }

        .flash-message {
            animation: slide-down 0.5s ease-out;
        }

        /* Custom scrollbar */
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

        /* Hover effects */
        .table-row:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .mobile-card:hover {
            transform: translateY(-2px);
        }

        .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        /* Button hover animations */
        .group:hover .fas {
            animation: pulse 0.6s ease-in-out;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        /* Pagination styling */
        .pagination-wrapper nav {
            display: flex;
            justify-content: center;
        }

        .pagination-wrapper .pagination {
            display: flex;
            gap: 0.5rem;
        }

        .pagination-wrapper .page-link {
            @apply px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 transition-colors duration-200;
        }

        .pagination-wrapper .page-item.active .page-link {
            @apply bg-indigo-600 text-white border-indigo-600;
        }
    </style>
</x-app-layout>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Animate elements on load
    const animatedElements = document.querySelectorAll('.table-row, .mobile-card, .stats-card');
    animatedElements.forEach((element, index) => {
        setTimeout(() => {
            element.style.opacity = '1';
        }, index * 100);
    });

    // Enhanced delete confirmation
    document.querySelectorAll('.delete-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "User yang dihapus tidak bisa dikembalikan!",
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
                    popup: 'animate__animated animate__zoomIn'
                },
                hideClass: {
                    popup: 'animate__animated animate__zoomOut'
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