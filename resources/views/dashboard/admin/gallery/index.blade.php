<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg">
                    <i class="fas fa-images text-white text-lg"></i>
                </div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Manajemen Galeri') }}
                </h2>
            </div>
            <a href="{{ route('admin.gallery.create') }}" 
               class="group relative bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center space-x-2">
                <i class="fas fa-plus transition-transform duration-300 group-hover:rotate-90"></i>
                <span>Tambah Foto</span>
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
                    @if($galleries->count() > 0)
                        <!-- Stats Header -->
                        <div class="mb-8 p-4 bg-gradient-to-r from-purple-50 to-blue-50 rounded-xl border border-purple-100">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-purple-100 rounded-lg">
                                        <i class="fas fa-chart-bar text-purple-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800">Total Foto</h3>
                                        <p class="text-sm text-gray-600">Koleksi foto dalam galeri</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-3xl font-bold text-purple-600">{{ $galleries->count() }}</div>
                                    <div class="text-sm text-gray-500">Foto</div>
                                </div>
                            </div>
                        </div>

                        <!-- Gallery Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach($galleries as $index => $gallery)
                                <div class="gallery-card bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group" 
                                     style="animation-delay: {{ $index * 100 }}ms;">
                                    <!-- Image Container -->
                                    <div class="relative overflow-hidden">
                                        @if($gallery->image)
                                            <div class="h-48 bg-gray-200 overflow-hidden">
                                                <img src="{{ asset('storage/' . $gallery->image) }}" 
                                                     alt="{{ $gallery->title ?? 'Galeri Foto' }}" 
                                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                            </div>
                                        @else
                                            <div class="h-48 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                                <i class="fas fa-image text-4xl text-gray-400"></i>
                                            </div>
                                        @endif
                                        
                                        <!-- Overlay -->
                                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                <button class="bg-white bg-opacity-90 hover:bg-opacity-100 text-gray-800 p-3 rounded-full transition-all duration-200 transform hover:scale-110 shadow-lg"
                                                        onclick="openImageModal('{{ asset('storage/' . $gallery->image) }}', '{{ $gallery->title ?? 'Galeri Foto' }}')">
                                                    <i class="fas fa-expand-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Card Content -->
                                    <div class="p-4">
                                        @if($gallery->title)
                                            <h3 class="font-semibold text-lg text-gray-900 mb-2 truncate">{{ $gallery->title }}</h3>
                                        @else
                                            <p class="text-gray-500 text-sm mb-2 italic">Tanpa judul</p>
                                        @endif
                                        
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center space-x-2">
                                                <i class="fas fa-calendar-alt text-gray-400 text-xs"></i>
                                                <span class="text-xs text-gray-500">
                                                    {{ $gallery->created_at->format('d M Y') }}
                                                </span>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('admin.gallery.edit', $gallery) }}" 
                                                   class="group/edit flex items-center justify-center w-8 h-8 text-blue-600 hover:text-white hover:bg-blue-600 rounded-full transition-all duration-200">
                                                    <i class="fas fa-edit text-sm transition-transform duration-200 group-hover/edit:scale-110"></i>
                                                </a>
                                                <form action="{{ route('admin.gallery.destroy', $gallery) }}" 
                                                      method="POST" 
                                                      class="delete-form inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="group/delete flex items-center justify-center w-8 h-8 text-red-600 hover:text-white hover:bg-red-600 rounded-full transition-all duration-200">
                                                        <i class="fas fa-trash text-sm transition-transform duration-200 group-hover/delete:scale-110"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-16 animate-fade-in">
                            <div class="mx-auto w-24 h-24 bg-gradient-to-br from-blue-100 to-purple-200 rounded-full flex items-center justify-center mb-6">
                                <i class="fas fa-images text-4xl text-blue-600"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">Belum Ada Foto</h3>
                            <p class="text-gray-600 mb-8 max-w-md mx-auto">
                                Mulai dengan menambahkan foto pertama ke galeri untuk mempercantik tampilan website Anda.
                            </p>
                            <a href="{{ route('admin.gallery.create') }}" 
                               class="group inline-flex items-center space-x-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                                <i class="fas fa-plus transition-transform duration-300 group-hover:rotate-90"></i>
                                <span>Tambah Foto Pertama</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 items-center justify-center p-4 transition-all duration-300 ease-out hidden">
        <div class="relative max-w-4xl max-h-full mx-auto flex flex-col items-center justify-center">
            <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white hover:text-gray-300 text-2xl z-10">
                <i class="fas fa-times"></i>
            </button>
            <img id="modalImage" src="" alt="" class="max-w-full max-h-full rounded-lg shadow-2xl transform transition-transform duration-300 scale-90">
            <div class="absolute bottom-4 left-4 text-white">
                <h3 id="modalTitle" class="text-lg font-semibold"></h3>
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

        .gallery-card {
            animation: fade-in-up 0.5s ease-out forwards;
            opacity: 0;
        }

        .flash-message {
            animation: slide-down 0.5s ease-out;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Modal animations */
        #imageModal {
            backdrop-filter: blur(4px);
            transition: all 0.3s ease;
        }

        #imageModal.show {
            animation: fade-in 0.3s ease-out;
        }

        #modalImage {
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }

        #imageModal.show #modalImage {
            transform: scale(1);
        }

        /* Responsive grid improvements */
        @media (max-width: 640px) {
            .gallery-card {
                margin-bottom: 1rem;
            }
        }

        /* Hover effects */
        .gallery-card:hover {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        /* Button hover animations */
        .group:hover .fas {
            animation: bounce 0.6s ease-in-out;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-3px);
            }
            60% {
                transform: translateY(-2px);
            }
        }
    </style>
</x-app-layout>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Animate gallery cards on load
    const galleryCards = document.querySelectorAll('.gallery-card');
    galleryCards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = '1';
        }, index * 100);
    });

    // Enhanced delete confirmation
    document.querySelectorAll('.delete-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Foto yang dihapus tidak bisa dikembalikan!",
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

// Image Modal Functions
function openImageModal(imageSrc, title) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');

    modalImage.src = imageSrc;
    modalTitle.textContent = title;

    // Tampilkan modal
    modal.classList.remove('hidden');
    modal.classList.add('flex'); // Tambahkan hanya saat dibuka

    // Animate image zoom
    setTimeout(() => {
        modalImage.classList.remove('scale-90');
        modalImage.classList.add('scale-100');
    }, 10);

    document.body.style.overflow = 'hidden'; // Disable scroll
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');

    // Revert zoom effect
    modalImage.classList.remove('scale-100');
    modalImage.classList.add('scale-90');

    modal.classList.remove('flex');

    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Re-enable scroll
    }, 300);
}

// Tutup modal jika klik di luar konten
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});

// Tutup modal dengan tombol Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});
</script>