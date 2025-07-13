# Website Resmi Rumah Makan Pondok Paranginan 2

Website resmi untuk promosi, menampilkan galeri dan menu makanan, serta menyediakan tombol pemesanan via WhatsApp untuk Rumah Makan Pondok Paranginan 2.

## 🍽️ Fitur Utama

### Untuk Pengunjung Umum
- **Landing Page** yang menarik dengan hero section dan fitur-fitur unggulan
- **Daftar Menu** makanan lengkap dengan harga dan deskripsi
- **Galeri Foto** suasana restoran dan makanan
- **Lokasi** dengan Google Maps embed
- **Tombol WhatsApp** "Pesan Sekarang" untuk pemesanan langsung
- **Login & Register** untuk user biasa

### Untuk Admin
- **Dashboard Admin** dengan statistik dan quick actions
- **CRUD Menu** makanan (upload gambar, harga, deskripsi)
- **CRUD Galeri** foto (upload & hapus)
- **Middleware Admin** untuk keamanan akses
- **Logout** admin

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 12
- **Frontend**: Blade Template Engine
- **CSS Framework**: Tailwind CSS (CDN)
- **Icons**: Font Awesome
- **Database**: MySQL/SQLite
- **File Storage**: Laravel Storage

## 📋 Persyaratan Sistem

- PHP 8.2 atau lebih tinggi
- Composer
- Node.js & NPM (untuk asset compilation)
- Database (MySQL/SQLite)

## 🚀 Instalasi

1. **Clone repository**
   ```bash
   git clone <repository-url>
   cd rmparanginan2
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database di .env**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=rmparanginan2
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run migrations dan seeder**
   ```bash
   php artisan migrate
   php artisan db:seed
   php artisan storage:link
   ```

6. **Compile assets (opsional)**
   ```bash
   npm run dev
   ```

7. **Jalankan server**
   ```bash
   php artisan serve
   ```

## 👤 Akun Default

### Admin
- **Email**: admin@paranginan.test
- **Password**: password

### User Biasa
- **Email**: test@example.com
- **Password**: password

## 📁 Struktur Proyek

```
rmparanginan2/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php
│   │   │   ├── MenuController.php
│   │   │   └── GalleryController.php
│   │   └── Middleware/
│   │       └── IsAdmin.php
│   └── Models/
│       ├── Menu.php
│       └── Gallery.php
├── database/
│   ├── migrations/
│   │   ├── create_users_table.php
│   │   ├── add_is_admin_to_users_table.php
│   │   ├── create_menus_table.php
│   │   └── create_galleries_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php
│       │   ├── navigation.blade.php
│       │   └── footer.blade.php
│       ├── home.blade.php
│       ├── menu.blade.php
│       ├── gallery.blade.php
│       ├── contact.blade.php
│       └── dashboard/
│           ├── admin/
│           │   ├── index.blade.php
│           │   ├── menu/
│           │   │   ├── index.blade.php
│           │   │   ├── create.blade.php
│           │   │   └── edit.blade.php
│           │   └── gallery/
│           │       ├── index.blade.php
│           │       ├── create.blade.php
│           │       └── edit.blade.php
│           └── user/
│               └── index.blade.php
└── routes/
    └── web.php
```

## 🔧 Konfigurasi

### WhatsApp Number
Ubah nomor WhatsApp di file-file view:
- `resources/views/home.blade.php`
- `resources/views/menu.blade.php`
- `resources/views/gallery.blade.php`
- `resources/views/contact.blade.php`

Ganti `6281234567890` dengan nomor WhatsApp yang sebenarnya.

### Google Maps
Ubah URL Google Maps embed di `resources/views/contact.blade.php` dengan koordinat lokasi yang sebenarnya.

### Storage Configuration
Pastikan folder storage sudah ter-link ke public:
```bash
php artisan storage:link
```

## 📱 Halaman Website

### Halaman Publik
1. **Beranda** (`/`) - Landing page dengan hero section dan menu favorit
2. **Menu** (`/menu`) - Daftar lengkap menu makanan
3. **Galeri** (`/gallery`) - Galeri foto restoran dan makanan
4. **Kontak** (`/contact`) - Informasi kontak dan lokasi

### Halaman Admin
1. **Dashboard Admin** (`/dashboard`) - Dashboard untuk admin
2. **Manajemen Menu** (`/admin/menu`) - CRUD menu makanan
3. **Manajemen Galeri** (`/admin/gallery`) - CRUD galeri foto

### Halaman User
1. **Dashboard User** (`/dashboard`) - Dashboard untuk user biasa

## 🔐 Keamanan

- **Middleware Admin**: Hanya admin yang bisa akses halaman admin
- **File Upload Validation**: Validasi tipe dan ukuran file gambar
- **CSRF Protection**: Laravel CSRF protection aktif
- **Authentication**: Laravel Breeze authentication

## 📸 Upload Gambar

### Menu Images
- **Path**: `storage/app/public/uploads/menu/`
- **Format**: JPG, JPEG, PNG
- **Max Size**: 2MB
- **Display**: `asset('storage/uploads/menu/filename.jpg')`

### Gallery Images
- **Path**: `storage/app/public/uploads/gallery/`
- **Format**: JPG, JPEG, PNG
- **Max Size**: 2MB
- **Display**: `asset('storage/uploads/gallery/filename.jpg')`

## 🎨 Customization

### Warna Theme
Website menggunakan warna orange sebagai primary color. Untuk mengubah warna, edit class Tailwind di file-file view.

### Logo dan Branding
- Ganti icon Font Awesome di navigation
- Update nama restoran di semua halaman
- Sesuaikan informasi kontak

## 🚀 Deployment

1. **Production Environment**
   ```bash
   composer install --optimize-autoloader --no-dev
   npm run build
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

2. **File Permissions**
   ```bash
   chmod -R 755 storage bootstrap/cache
   ```

3. **Environment Variables**
   - Set `APP_ENV=production`
   - Set `APP_DEBUG=false`
   - Configure database credentials

## 📞 Support

Untuk bantuan dan dukungan teknis, silakan hubungi:
- **Email**: support@paranginan.test
- **WhatsApp**: +62 812-3456-7890

## 📄 License

Proyek ini dibuat untuk Rumah Makan Pondok Paranginan 2. Semua hak cipta dilindungi.

---

**Dibuat dengan ❤️ menggunakan Laravel 12**

   DB_DATABASE=rmparanginan2
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run migrations dan seeder**
   ```bash
   php artisan migrate
   php artisan db:seed
   php artisan storage:link
   ```

6. **Compile assets (opsional)**
   ```bash
   npm run dev
   ```

7. **Jalankan server**
   ```bash
   php artisan serve
   ```

## 👤 Akun Default

### Admin
- **Email**: admin@paranginan.test
- **Password**: password

### User Biasa
- **Email**: test@example.com
- **Password**: password

## 📁 Struktur Proyek

```
rmparanginan2/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php
│   │   │   ├── MenuController.php
│   │   │   └── GalleryController.php
│   │   └── Middleware/
│   │       └── IsAdmin.php
│   └── Models/
│       ├── Menu.php
│       └── Gallery.php
├── database/
│   ├── migrations/
│   │   ├── create_users_table.php
│   │   ├── add_is_admin_to_users_table.php
│   │   ├── create_menus_table.php
│   │   └── create_galleries_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php
│       │   ├── navigation.blade.php
│       │   └── footer.blade.php
│       ├── home.blade.php
│       ├── menu.blade.php
│       ├── gallery.blade.php
│       ├── contact.blade.php
│       └── dashboard/
│           ├── admin/
│           │   ├── index.blade.php
│           │   ├── menu/
│           │   │   ├── index.blade.php
│           │   │   ├── create.blade.php
│           │   │   └── edit.blade.php
│           │   └── gallery/
│           │       ├── index.blade.php
│           │       ├── create.blade.php
│           │       └── edit.blade.php
│           └── user/
│               └── index.blade.php
└── routes/
    └── web.php
```

## 🔧 Konfigurasi

### WhatsApp Number
Ubah nomor WhatsApp di file-file view:
- `resources/views/home.blade.php`
- `resources/views/menu.blade.php`
- `resources/views/gallery.blade.php`
- `resources/views/contact.blade.php`

Ganti `6281234567890` dengan nomor WhatsApp yang sebenarnya.

### Google Maps
Ubah URL Google Maps embed di `resources/views/contact.blade.php` dengan koordinat lokasi yang sebenarnya.

### Storage Configuration
Pastikan folder storage sudah ter-link ke public:
```bash
php artisan storage:link
```

## 📱 Halaman Website

### Halaman Publik
1. **Beranda** (`/`) - Landing page dengan hero section dan menu favorit
2. **Menu** (`/menu`) - Daftar lengkap menu makanan
3. **Galeri** (`/gallery`) - Galeri foto restoran dan makanan
4. **Kontak** (`/contact`) - Informasi kontak dan lokasi

### Halaman Admin
1. **Dashboard Admin** (`/dashboard`) - Dashboard untuk admin
2. **Manajemen Menu** (`/admin/menu`) - CRUD menu makanan
3. **Manajemen Galeri** (`/admin/gallery`) - CRUD galeri foto

### Halaman User
1. **Dashboard User** (`/dashboard`) - Dashboard untuk user biasa

## 🔐 Keamanan

- **Middleware Admin**: Hanya admin yang bisa akses halaman admin
- **File Upload Validation**: Validasi tipe dan ukuran file gambar
- **CSRF Protection**: Laravel CSRF protection aktif
- **Authentication**: Laravel Breeze authentication

## 📸 Upload Gambar

### Menu Images
- **Path**: `storage/app/public/uploads/menu/`
- **Format**: JPG, JPEG, PNG
- **Max Size**: 2MB
- **Display**: `asset('storage/uploads/menu/filename.jpg')`

### Gallery Images
- **Path**: `storage/app/public/uploads/gallery/`
- **Format**: JPG, JPEG, PNG
- **Max Size**: 2MB
- **Display**: `asset('storage/uploads/gallery/filename.jpg')`

## 🎨 Customization

### Warna Theme
Website menggunakan warna orange sebagai primary color. Untuk mengubah warna, edit class Tailwind di file-file view.

### Logo dan Branding
- Ganti icon Font Awesome di navigation
- Update nama restoran di semua halaman
- Sesuaikan informasi kontak

## 🚀 Deployment

1. **Production Environment**
   ```bash
   composer install --optimize-autoloader --no-dev
   npm run build
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

2. **File Permissions**
   ```bash
   chmod -R 755 storage bootstrap/cache
   ```

3. **Environment Variables**
   - Set `APP_ENV=production`
   - Set `APP_DEBUG=false`
   - Configure database credentials

## 📞 Support

Untuk bantuan dan dukungan teknis, silakan hubungi:
- **Email**: support@paranginan.test
- **WhatsApp**: +62 812-3456-7890

## 📄 License

Proyek ini dibuat untuk Rumah Makan Pondok Paranginan 2. Semua hak cipta dilindungi.

---

**Dibuat dengan ❤️ menggunakan Laravel 12**
