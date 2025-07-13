<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
        <div class="py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header Section -->
                <div class="mb-8 animate-fade-in">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                                Dashboard Admin
                            </h1>
                            <p class="text-gray-600 mt-2">Selamat datang kembali, {{ Auth::user()->name }}!</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-white/60 backdrop-blur-sm rounded-full px-4 py-2 shadow-sm">
                                <span class="text-sm font-medium text-gray-700">{{ now()->format('l, d F Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alert Messages -->
                @if(session('success'))
                    <div class="mb-6 animate-slide-down">
                        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-xl shadow-sm">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-emerald-500 mr-3"></i>
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 animate-slide-down">
                        <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl shadow-sm">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                                {{ session('error') }}
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Welcome Card -->
                <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-6">
                            <div class="flex items-center">
                                <div class="bg-white/20 rounded-full p-3 mr-4">
                                    <i class="fas fa-crown text-2xl text-white"></i>
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold text-white">Selamat Datang, {{ Auth::user()->name }}!</h2>
                                    <p class="text-blue-100 mt-1">Kelola menu, kategori, galeri, dan user Pondok Paranginan 2 dari sini.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
                    <div class="stat-card animate-fade-in-up" style="animation-delay: 0.2s;">
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600 mb-1">Total Menu</p>
                                        <p class="text-3xl font-bold text-gray-900 group-hover:text-orange-600 transition-colors duration-300">{{ \App\Models\Menu::count() }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-orange-400 to-orange-600 p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <i class="fas fa-utensils text-2xl text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="h-1 bg-gradient-to-r from-orange-400 to-orange-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                        </div>
                    </div>

                    <div class="stat-card animate-fade-in-up" style="animation-delay: 0.3s;">
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600 mb-1">Total Kategori</p>
                                        <p class="text-3xl font-bold text-gray-900 group-hover:text-teal-600 transition-colors duration-300">{{ \App\Models\Category::count() }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-teal-400 to-teal-600 p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <i class="fas fa-tags text-2xl text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="h-1 bg-gradient-to-r from-teal-400 to-teal-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                        </div>
                    </div>

                    <div class="stat-card animate-fade-in-up" style="animation-delay: 0.4s;">
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600 mb-1">Total Galeri</p>
                                        <p class="text-3xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">{{ \App\Models\Gallery::count() }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-blue-400 to-blue-600 p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <i class="fas fa-images text-2xl text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="h-1 bg-gradient-to-r from-blue-400 to-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                        </div>
                    </div>

                    <div class="stat-card animate-fade-in-up" style="animation-delay: 0.5s;">
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600 mb-1">Total User</p>
                                        <p class="text-3xl font-bold text-gray-900 group-hover:text-emerald-600 transition-colors duration-300">{{ \App\Models\User::count() }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-emerald-400 to-emerald-600 p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <i class="fas fa-users text-2xl text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="h-1 bg-gradient-to-r from-emerald-400 to-emerald-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                        </div>
                    </div>

                    <div class="stat-card animate-fade-in-up" style="animation-delay: 0.6s;">
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600 mb-1">Admin</p>
                                        <p class="text-3xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors duration-300">{{ \App\Models\User::where('is_admin', true)->count() }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-purple-400 to-purple-600 p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <i class="fas fa-user-shield text-2xl text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="h-1 bg-gradient-to-r from-purple-400 to-purple-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Management Sections -->
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
                    <!-- Menu Management -->
                    <div class="management-card animate-fade-in-up" style="animation-delay: 0.7s;">
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center">
                                        <div class="bg-gradient-to-br from-orange-400 to-orange-600 p-3 rounded-xl shadow-lg mr-3">
                                            <i class="fas fa-utensils text-white text-lg"></i>
                                        </div>
                                        <h3 class="text-lg font-semibold text-gray-900">Manajemen Menu</h3>
                                    </div>
                                </div>
                                
                                <div class="space-y-4">
                                    <div class="bg-gradient-to-r from-orange-50 to-orange-100 p-4 rounded-xl border border-orange-200">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="font-semibold text-orange-800">Menu Aktif</p>
                                                <p class="text-sm text-orange-600">{{ \App\Models\Menu::count() }} menu tersedia</p>
                                            </div>
                                            <div class="bg-orange-200 rounded-full p-2">
                                                <i class="fas fa-utensils text-orange-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-col space-y-2">
                                        <a href="{{ route('admin.menu.create') }}" class="btn-primary bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white px-4 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl text-center">
                                            <i class="fas fa-plus mr-2"></i>Tambah Menu
                                        </a>
                                        <a href="{{ route('admin.menu.index') }}" class="btn-secondary bg-white hover:bg-orange-50 text-orange-600 border border-orange-200 px-4 py-3 rounded-xl font-semibold transition-all duration-300 hover:border-orange-300 text-center">
                                            <i class="fas fa-cog mr-2"></i>Kelola Menu
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Category Management -->
                    <div class="management-card animate-fade-in-up" style="animation-delay: 0.8s;">
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center">
                                        <div class="bg-gradient-to-br from-teal-400 to-teal-600 p-3 rounded-xl shadow-lg mr-3">
                                            <i class="fas fa-tags text-white text-lg"></i>
                                        </div>
                                        <h3 class="text-lg font-semibold text-gray-900">Manajemen Kategori</h3>
                                    </div>
                                </div>
                                
                                <div class="space-y-4">
                                    <div class="bg-gradient-to-r from-teal-50 to-teal-100 p-4 rounded-xl border border-teal-200">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="font-semibold text-teal-800">Kategori Aktif</p>
                                                <p class="text-sm text-teal-600">{{ \App\Models\Category::count() }} kategori tersedia</p>
                                            </div>
                                            <div class="bg-teal-200 rounded-full p-2">
                                                <i class="fas fa-tags text-teal-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-col space-y-2">
                                        <a href="{{ route('admin.categories.create') }}" class="btn-primary bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 text-white px-4 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl text-center">
                                            <i class="fas fa-plus mr-2"></i>Tambah Kategori
                                        </a>
                                        <a href="{{ route('admin.categories.index') }}" class="btn-secondary bg-white hover:bg-teal-50 text-teal-600 border border-teal-200 px-4 py-3 rounded-xl font-semibold transition-all duration-300 hover:border-teal-300 text-center">
                                            <i class="fas fa-cog mr-2"></i>Kelola Kategori
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Gallery Management -->
                    <div class="management-card animate-fade-in-up" style="animation-delay: 0.9s;">
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center">
                                        <div class="bg-gradient-to-br from-blue-400 to-blue-600 p-3 rounded-xl shadow-lg mr-3">
                                            <i class="fas fa-images text-white text-lg"></i>
                                        </div>
                                        <h3 class="text-lg font-semibold text-gray-900">Manajemen Galeri</h3>
                                    </div>
                                </div>
                                
                                <div class="space-y-4">
                                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-4 rounded-xl border border-blue-200">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="font-semibold text-blue-800">Foto Galeri</p>
                                                <p class="text-sm text-blue-600">{{ \App\Models\Gallery::count() }} foto tersedia</p>
                                            </div>
                                            <div class="bg-blue-200 rounded-full p-2">
                                                <i class="fas fa-images text-blue-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-col space-y-2">
                                        <a href="{{ route('admin.gallery.create') }}" class="btn-primary bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl text-center">
                                            <i class="fas fa-plus mr-2"></i>Tambah Foto
                                        </a>
                                        <a href="{{ route('admin.gallery.index') }}" class="btn-secondary bg-white hover:bg-blue-50 text-blue-600 border border-blue-200 px-4 py-3 rounded-xl font-semibold transition-all duration-300 hover:border-blue-300 text-center">
                                            <i class="fas fa-cog mr-2"></i>Kelola Galeri
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- User Management -->
                    <div class="management-card animate-fade-in-up" style="animation-delay: 1.0s;">
                        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center">
                                        <div class="bg-gradient-to-br from-purple-400 to-purple-600 p-3 rounded-xl shadow-lg mr-3">
                                            <i class="fas fa-users text-white text-lg"></i>
                                        </div>
                                        <h3 class="text-lg font-semibold text-gray-900">Manajemen User</h3>
                                    </div>
                                </div>
                                
                                <div class="space-y-4">
                                    <div class="bg-gradient-to-r from-purple-50 to-purple-100 p-4 rounded-xl border border-purple-200">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="font-semibold text-purple-800">Total User</p>
                                                <p class="text-sm text-purple-600">{{ \App\Models\User::count() }} user terdaftar</p>
                                            </div>
                                            <div class="bg-purple-200 rounded-full p-2">
                                                <i class="fas fa-users text-purple-700"></i>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-col space-y-2">
                                        <a href="{{ route('admin.users.create') }}" class="btn-primary bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white px-4 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl text-center">
                                            <i class="fas fa-plus mr-2"></i>Tambah User
                                        </a>
                                        <a href="{{ route('admin.users.index') }}" class="btn-secondary bg-white hover:bg-purple-50 text-purple-600 border border-purple-200 px-4 py-3 rounded-xl font-semibold transition-all duration-300 hover:border-purple-300 text-center">
                                            <i class="fas fa-cog mr-2"></i>Kelola User
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="animate-fade-in-up" style="animation-delay: 1.1s;">
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-emerald-500 to-teal-600 p-6">
                            <h3 class="text-2xl font-bold text-white flex items-center">
                                <i class="fas fa-bolt mr-3"></i>
                                Aksi Cepat
                            </h3>
                            <p class="text-emerald-100 mt-2">Akses cepat ke fungsi-fungsi utama sistem</p>
                        </div>
                        
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                                <a href="{{ route('admin.menu.create') }}" class="quick-action-card group bg-gradient-to-br from-orange-50 to-orange-100 p-4 rounded-xl border border-orange-200 hover:from-orange-100 hover:to-orange-200 transition-all duration-300 hover:shadow-lg transform hover:scale-105">
                                    <div class="flex items-center">
                                        <div class="bg-orange-500 rounded-full p-3 mr-4 group-hover:bg-orange-600 transition-colors duration-300">
                                            <i class="fas fa-plus-circle text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-orange-800">Tambah Menu Baru</p>
                                            <p class="text-sm text-orange-600">Tambah menu makanan baru</p>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="{{ route('admin.categories.create') }}" class="quick-action-card group bg-gradient-to-br from-teal-50 to-teal-100 p-4 rounded-xl border border-teal-200 hover:from-teal-100 hover:to-teal-200 transition-all duration-300 hover:shadow-lg transform hover:scale-105">
                                    <div class="flex items-center">
                                        <div class="bg-teal-500 rounded-full p-3 mr-4 group-hover:bg-teal-600 transition-colors duration-300">
                                            <i class="fas fa-tag text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-teal-800">Tambah Kategori</p>
                                            <p class="text-sm text-teal-600">Buat kategori menu baru</p>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="{{ route('admin.gallery.create') }}" class="quick-action-card group bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-xl border border-blue-200 hover:from-blue-100 hover:to-blue-200 transition-all duration-300 hover:shadow-lg transform hover:scale-105">
                                    <div class="flex items-center">
                                        <div class="bg-blue-500 rounded-full p-3 mr-4 group-hover:bg-blue-600 transition-colors duration-300">
                                            <i class="fas fa-upload text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-blue-800">Upload Foto</p>
                                            <p class="text-sm text-blue-600">Tambah foto ke galeri</p>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="{{ route('admin.users.create') }}" class="quick-action-card group bg-gradient-to-br from-purple-50 to-purple-100 p-4 rounded-xl border border-purple-200 hover:from-purple-100 hover:to-purple-200 transition-all duration-300 hover:shadow-lg transform hover:scale-105">
                                    <div class="flex items-center">
                                        <div class="bg-purple-500 rounded-full p-3 mr-4 group-hover:bg-purple-600 transition-colors duration-300">
                                            <i class="fas fa-user-plus text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-purple-800">Tambah User</p>
                                            <p class="text-sm text-purple-600">Tambah user atau admin baru</p>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="{{ route('home') }}" class="quick-action-card group bg-gradient-to-br from-emerald-50 to-emerald-100 p-4 rounded-xl border border-emerald-200 hover:from-emerald-100 hover:to-emerald-200 transition-all duration-300 hover:shadow-lg transform hover:scale-105">
                                    <div class="flex items-center">
                                        <div class="bg-emerald-500 rounded-full p-3 mr-4 group-hover:bg-emerald-600 transition-colors duration-300">
                                            <i class="fas fa-eye text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-emerald-800">Lihat Website</p>
                                            <p class="text-sm text-emerald-600">Preview website</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
                transform: translateY(20px);
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
        
        .stat-card:hover {
            transform: translateY(-4px);
        }
        
        .management-card:hover {
            transform: translateY(-2px);
        }
        
        .quick-action-card:hover {
            transform: translateY(-2px) scale(1.02);
        }
        
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .btn-secondary:hover {
            transform: translateY(-1px);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .grid-cols-1.md\\:grid-cols-2.lg\\:grid-cols-5 {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 640px) {
            .grid-cols-1.md\\:grid-cols-2.lg\\:grid-cols-5 {
                grid-template-columns: 1fr;
            }
        }
    </style>
</x-app-layout>