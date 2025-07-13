<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Foto Baru') }}
            </h2>
            <a href="{{ route('admin.gallery.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg font-semibold transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="space-y-6">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                    Judul Foto (Opsional)
                                </label>
                                <input type="text" 
                                       name="title" 
                                       id="title" 
                                       value="{{ old('title') }}"
                                       placeholder="Contoh: Suasana Restoran"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                @error('title')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                    Deskripsi Foto (Opsional)
                                </label>
                                <textarea name="description" id="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                    Foto <span class="text-red-500">*</span>
                                </label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                                    <input type="file" 
                                           name="image" 
                                           id="image" 
                                           accept="image/*"
                                           class="hidden"
                                           required>
                                    <label for="image" class="cursor-pointer">
                                        <i class="fas fa-cloud-upload-alt text-5xl text-gray-400 mb-4"></i>
                                        <p class="text-lg text-gray-600 mb-2">Klik untuk memilih foto</p>
                                        <p class="text-sm text-gray-500">JPG, JPEG, PNG (Max: 2MB)</p>
                                        <p class="text-xs text-gray-400 mt-1">Rekomendasi: 1200x800 pixels</p>
                                    </label>
                                </div>
                                @error('image')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div id="image-preview" class="hidden">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Preview Foto
                                </label>
                                <div class="border rounded-lg p-4">
                                    <img id="preview" src="" alt="Preview" class="w-full max-h-96 object-contain rounded-lg">
                                </div>
                            </div>

                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <h4 class="font-medium text-blue-900 mb-2">
                                    <i class="fas fa-info-circle mr-2"></i>Tips Upload Foto
                                </h4>
                                <ul class="text-sm text-blue-800 space-y-1">
                                    <li>• Gunakan foto dengan resolusi tinggi untuk hasil terbaik</li>
                                    <li>• Format yang didukung: JPG, JPEG, PNG</li>
                                    <li>• Ukuran maksimal file: 2MB</li>
                                    <li>• Foto akan ditampilkan di halaman galeri website</li>
                                </ul>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4 mt-8">
                            <a href="{{ route('admin.gallery.index') }}" 
                               class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors">
                                Batal
                            </a>
                            <button type="submit" 
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors">
                                <i class="fas fa-save mr-2"></i>Upload Foto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Image preview functionality
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('image-preview');
            // --- VALIDASI UKURAN FILE ---
            if (file && file.size > 2 * 1024 * 1024) {
                alert('Ukuran gambar maksimal 2MB. Silakan pilih file lain.');
                e.target.value = '';
                previewContainer.classList.add('hidden');
                return;
            }
            // --- END VALIDASI ---
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('hidden');
            }
        });
    </script>
</x-app-layout> 