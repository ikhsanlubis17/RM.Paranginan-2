<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0 bg-gradient-to-r from-orange-50 to-amber-50 p-6 rounded-2xl shadow-lg">
            <div class="animate-fade-in">
                <h2 class="text-2xl font-bold bg-gradient-to-r from-orange-600 to-amber-600 bg-clip-text text-transparent">
                    <i class="fas fa-utensils mr-3"></i>
                    {{ __('Manajemen Menu') }}
                </h2>
                <p class="text-gray-600 mt-1">Kelola dan atur menu makanan Pondok Paranginan 2</p>
            </div>
            <div class="animate-fade-in-up" style="animation-delay: 0.2s;">
                <a href="{{ route('admin.menu.create') }}" class="btn-primary bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i>Tambah Menu
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 animate-slide-down">
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-xl shadow-sm">
                        <div class="flex items-center">
                            <div class="bg-emerald-500 rounded-full p-1 mr-3">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 overflow-hidden animate-fade-in-up" style="animation-delay: 0.3s;">
                @if($menus->count() > 0)
                    <!-- Header Stats -->
                    <div class="bg-gradient-to-r from-orange-500 to-amber-500 p-6">
                        <div class="flex items-center justify-between">
                            <div class="text-white">
                                <h3 class="text-xl font-bold">Total Menu</h3>
                                <p class="text-orange-100">{{ $menus->count() }} menu tersedia</p>
                            </div>
                            <div class="bg-white/20 rounded-full p-4">
                                <i class="fas fa-utensils text-3xl text-white"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Desktop Table View -->
                    <div class="hidden lg:block">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-image mr-2"></i>Gambar
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-utensils mr-2"></i>Nama Menu
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-tags mr-2"></i>Kategori
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-align-left mr-2"></i>Deskripsi
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-money-bill-wave mr-2"></i>Harga
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                            <i class="fas fa-cogs mr-2"></i>Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @foreach($menus as $index => $menu)
                                        <tr class="menu-row hover:bg-gradient-to-r hover:from-orange-50 hover:to-amber-50 transition-all duration-300 animate-fade-in-up" style="animation-delay: {{ 0.1 * ($index + 1) }}s;">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="relative group">
                                                    @if($menu->image)
                                                        <img src="{{ asset('storage/' . $menu->image) }}" 
                                                             alt="{{ $menu->name }}" 
                                                             class="h-16 w-16 object-cover rounded-xl shadow-md group-hover:shadow-lg transition-all duration-300 transform group-hover:scale-105">
                                                    @else
                                                        <div class="h-16 w-16 bg-gradient-to-br from-gray-200 to-gray-300 rounded-xl flex items-center justify-center shadow-md group-hover:shadow-lg transition-all duration-300 transform group-hover:scale-105">
                                                            <i class="fas fa-image text-gray-500"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm font-semibold text-gray-900">{{ $menu->name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($menu->category)
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-teal-100 to-teal-200 text-teal-800 shadow-sm">
                                                        <i class="fas fa-tag mr-1"></i>
                                                        {{ $menu->category->name }}
                                                    </span>
                                                @else
                                                    <span class="text-gray-400 text-sm italic">Tidak ada kategori</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 max-w-xs">
                                                <div class="text-sm text-gray-700 leading-relaxed">
                                                    {{ Str::limit($menu->description, 100) }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-lg font-bold bg-gradient-to-r from-orange-600 to-amber-600 bg-clip-text text-transparent">
                                                    Rp {{ number_format($menu->price, 0, ',', '.') }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.menu.edit', $menu) }}" 
                                                       class="action-btn bg-blue-100 hover:bg-blue-200 text-blue-600 px-3 py-2 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-sm hover:shadow-md">
                                                        <i class="fas fa-edit mr-1"></i>Edit
                                                    </a>
                                                    <form action="{{ route('admin.menu.destroy', $menu) }}" 
                                                          method="POST" 
                                                          class="delete-form inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="action-btn bg-red-100 hover:bg-red-200 text-red-600 px-3 py-2 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-sm hover:shadow-md">
                                                            <i class="fas fa-trash mr-1"></i>Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Mobile Card View -->
                    <div class="lg:hidden p-4 space-y-4">
                        @foreach($menus as $index => $menu)
                            <div class="menu-card bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02] border border-gray-100 animate-fade-in-up" style="animation-delay: {{ 0.1 * ($index + 1) }}s;">
                                <div class="p-4">
                                    <div class="flex items-start space-x-4">
                                        <!-- Image -->
                                        <div class="flex-shrink-0">
                                            @if($menu->image)
                                                <img src="{{ asset('storage/' . $menu->image) }}" 
                                                     alt="{{ $menu->name }}" 
                                                     class="h-20 w-20 object-cover rounded-xl shadow-md">
                                            @else
                                                <div class="h-20 w-20 bg-gradient-to-br from-gray-200 to-gray-300 rounded-xl flex items-center justify-center shadow-md">
                                                    <i class="fas fa-image text-gray-500"></i>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <!-- Content -->
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $menu->name }}</h3>
                                            
                                            <!-- Category -->
                                            <div class="mb-2">
                                                @if($menu->category)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gradient-to-r from-teal-100 to-teal-200 text-teal-800">
                                                        <i class="fas fa-tag mr-1"></i>
                                                        {{ $menu->category->name }}
                                                    </span>
                                                @else
                                                    <span class="text-gray-400 text-sm italic">Tidak ada kategori</span>
                                                @endif
                                            </div>
                                            
                                            <!-- Description -->
                                            <p class="text-sm text-gray-600 mb-3 leading-relaxed">
                                                {{ Str::limit($menu->description, 80) }}
                                            </p>
                                            
                                            <!-- Price -->
                                            <div class="mb-3">
                                                <span class="text-lg font-bold bg-gradient-to-r from-orange-600 to-amber-600 bg-clip-text text-transparent">
                                                    Rp {{ number_format($menu->price, 0, ',', '.') }}
                                                </span>
                                            </div>
                                            
                                            <!-- Actions -->
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.menu.edit', $menu) }}" 
                                                   class="flex-1 bg-blue-100 hover:bg-blue-200 text-blue-600 px-3 py-2 rounded-lg transition-all duration-300 text-center text-sm font-medium">
                                                    <i class="fas fa-edit mr-1"></i>Edit
                                                </a>
                                                <form action="{{ route('admin.menu.destroy', $menu) }}" 
                                                      method="POST" 
                                                      class="delete-form flex-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-full bg-red-100 hover:bg-red-200 text-red-600 px-3 py-2 rounded-lg transition-all duration-300 text-sm font-medium">
                                                        <i class="fas fa-trash mr-1"></i>Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-16 animate-fade-in-up">
                        <div class="bg-gradient-to-br from-orange-100 to-amber-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-utensils text-4xl text-orange-500"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Belum Ada Menu</h3>
                        <p class="text-gray-600 mb-8 max-w-md mx-auto">Mulai dengan menambahkan menu pertama Anda untuk menarik lebih banyak pelanggan.</p>
                        <a href="{{ route('admin.menu.create') }}" class="btn-primary bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl inline-flex items-center">
                            <i class="fas fa-plus mr-2"></i>Tambah Menu Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes fadeInUp {
            from { 
                opacity: 0;
                transform: translateY(30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideDown {
            from { 
                opacity: 0;
                transform: translateY(-20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out;
            animation-fill-mode: both;
        }
        
        .animate-slide-down {
            animation: slideDown 0.6s ease-out;
        }
        
        .menu-row:hover {
            transform: translateY(-2px);
        }
        
        .menu-card:hover {
            transform: translateY(-4px) scale(1.02);
        }
        
        .action-btn:hover {
            transform: translateY(-1px) scale(1.05);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        /* Responsive table improvements */
        @media (max-width: 1024px) {
            .menu-row td {
                padding: 12px 16px;
            }
        }
        
        /* Mobile optimizations */
        @media (max-width: 768px) {
            .menu-card {
                margin-bottom: 16px;
            }
            
            .action-btn {
                padding: 8px 12px;
                font-size: 14px;
            }
        }
        
        /* Smooth scrolling for mobile */
        @media (max-width: 640px) {
            .overflow-x-auto {
                scrollbar-width: thin;
                scrollbar-color: #f59e0b #f3f4f6;
            }
            
            .overflow-x-auto::-webkit-scrollbar {
                height: 4px;
            }
            
            .overflow-x-auto::-webkit-scrollbar-track {
                background: #f3f4f6;
            }
            
            .overflow-x-auto::-webkit-scrollbar-thumb {
                background: #f59e0b;
                border-radius: 2px;
            }
        }
    </style>
</x-app-layout>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Add loading state to buttons
    const actionButtons = document.querySelectorAll('.action-btn');
    actionButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (!this.closest('.delete-form')) {
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Loading...';
            }
        });
    });

    // Enhanced delete confirmation with SweetAlert
    document.querySelectorAll('.delete-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data menu yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'swal-popup-custom',
                    title: 'swal-title-custom',
                    content: 'swal-content-custom',
                    confirmButton: 'swal-confirm-custom',
                    cancelButton: 'swal-cancel-custom'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    const button = form.querySelector('button[type="submit"]');
                    button.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Menghapus...';
                    button.disabled = true;
                    
                    // Submit form
                    form.submit();
                }
            });
        });
    });
    
    // Add smooth scroll behavior
    document.documentElement.style.scrollBehavior = 'smooth';
    
    // Add intersection observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    document.querySelectorAll('.menu-row, .menu-card').forEach(el => {
        observer.observe(el);
    });
});
</script>

<style>
/* Custom SweetAlert styles */
.swal-popup-custom {
    border-radius: 1rem !important;
    padding: 2rem !important;
}

.swal-title-custom {
    font-size: 1.5rem !important;
    font-weight: 700 !important;
    color: #374151 !important;
}

.swal-content-custom {
    font-size: 1rem !important;
    color: #6b7280 !important;
}

.swal-confirm-custom {
    border-radius: 0.75rem !important;
    padding: 0.75rem 1.5rem !important;
    font-weight: 600 !important;
}

.swal-cancel-custom {
    border-radius: 0.75rem !important;
    padding: 0.75rem 1.5rem !important;
    font-weight: 600 !important;
}
</style>