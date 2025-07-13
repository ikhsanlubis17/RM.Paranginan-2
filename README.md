# Website Resmi Rumah Makan Pondok Paranginan 2

Website resmi untuk promosi, menampilkan galeri dan menu makanan, serta menyediakan sistem keranjang belanja untuk Rumah Makan Pondok Paranginan 2.

## 🍽️ Fitur Utama

### Untuk Pengunjung Umum
- **Landing Page** yang menarik dengan hero section dan menu favorit
- **Daftar Menu** makanan lengkap dengan kategori, harga, dan deskripsi
- **Galeri Foto** suasana restoran dan makanan dengan detail view
- **Lokasi** dengan Google Maps embed
- **Sistem Keranjang** untuk menambahkan menu ke cart
- **Sistem Favorit** untuk menyimpan menu favorit
- **Login & Register** untuk user biasa

### Untuk User Terdaftar
- **Dashboard User** dengan informasi restoran
- **Keranjang Belanja** dengan fitur add, update, dan remove
- **Menu Favorit** untuk menyimpan menu kesukaan
- **Profil User** dengan fitur edit
- **WhatsApp Integration** untuk pemesanan langsung

### Untuk Admin
- **Dashboard Admin** dengan statistik dan quick actions
- **CRUD Menu** makanan (upload gambar, harga, deskripsi, kategori)
- **CRUD Galeri** foto (upload & hapus)
- **CRUD Kategori** untuk mengelompokkan menu
- **Manajemen User** untuk mengelola pengguna
- **Middleware Admin** untuk keamanan akses

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 12
- **Frontend**: Blade Template Engine
- **CSS Framework**: Tailwind CSS
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
│   ├── Events/
│   │   ├── OrderCreated.php
│   │   └── OrderStatusUpdated.php
│   ├── Helpers.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   └── UserController.php
│   │   │   ├── Auth/
│   │   │   │   ├── AuthenticatedSessionController.php
│   │   │   │   ├── ConfirmablePasswordController.php
│   │   │   │   ├── EmailVerificationNotificationController.php
│   │   │   │   ├── EmailVerificationPromptController.php
│   │   │   │   ├── NewPasswordController.php
│   │   │   │   ├── PasswordController.php
│   │   │   │   ├── PasswordResetLinkController.php
│   │   │   │   ├── RegisteredUserController.php
│   │   │   │   └── VerifyEmailController.php
│   │   │   ├── CartController.php
│   │   │   ├── CategoryController.php
│   │   │   ├── Controller.php
│   │   │   ├── FavoriteController.php
│   │   │   ├── GalleryController.php
│   │   │   ├── HomeController.php
│   │   │   ├── MenuController.php
│   │   │   └── ProfileController.php
│   │   ├── Middleware/
│   │   │   └── IsAdmin.php
│   │   └── Requests/
│   │       ├── Admin/
│   │       │   └── UserRequest.php
│   │       ├── Auth/
│   │       │   └── LoginRequest.php
│   │       └── ProfileUpdateRequest.php
│   ├── Models/
│   │   ├── Category.php
│   │   ├── Favorite.php
│   │   ├── Gallery.php
│   │   ├── Menu.php
│   │   └── User.php
│   ├── Providers/
│   │   └── AppServiceProvider.php
│   └── View/
│       └── Components/
│           ├── AppLayout.php
│           └── GuestLayout.php
├── database/
│   ├── factories/
│   │   └── UserFactory.php
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   ├── 2025_07_11_212317_add_is_admin_to_users_table.php
│   │   ├── 2025_07_11_212436_create_menus_table.php
│   │   ├── 2025_07_11_212438_create_galleries_table.php
│   │   ├── 2025_07_11_215245_add_order_count_to_menus_table.php
│   │   ├── 2025_07_11_224031_add_description_to_galleries_table.php
│   │   ├── 2025_07_11_225353_create_orders_table.php
│   │   ├── 2025_07_11_232538_add_user_id_to_orders_table.php
│   │   ├── 2025_07_12_184508_create_favorites_table.php
│   │   ├── 2025_07_12_201308_create_categories_table.php
│   │   └── 2025_07_12_201312_add_category_id_to_menus_table.php
│   └── seeders/
│       ├── CategorySeeder.php
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── admin/
│       │   └── users/
│       │       ├── create.blade.php
│       │       ├── edit.blade.php
│       │       ├── index.blade.php
│       │       └── show.blade.php
│       ├── auth/
│       │   ├── confirm-password.blade.php
│       │   ├── forgot-password.blade.php
│       │   ├── login.blade.php
│       │   ├── register.blade.php
│       │   ├── reset-password.blade.php
│       │   └── verify-email.blade.php
│       ├── cart.blade.php
│       ├── components/
│       │   ├── application-logo.blade.php
│       │   ├── auth-layout.blade.php
│       │   ├── auth-session-status.blade.php
│       │   ├── danger-button.blade.php
│       │   ├── dropdown-link.blade.php
│       │   ├── dropdown.blade.php
│       │   ├── input-error.blade.php
│       │   ├── input-label.blade.php
│       │   ├── modal.blade.php
│       │   ├── nav-link.blade.php
│       │   ├── primary-button.blade.php
│       │   ├── responsive-nav-link.blade.php
│       │   ├── secondary-button.blade.php
│       │   └── text-input.blade.php
│       ├── contact.blade.php
│       ├── dashboard/
│       │   ├── admin/
│       │   │   ├── category/
│       │   │   │   ├── create.blade.php
│       │   │   │   ├── edit.blade.php
│       │   │   │   └── index.blade.php
│       │   │   ├── gallery/
│       │   │   │   ├── create.blade.php
│       │   │   │   ├── edit.blade.php
│       │   │   │   └── index.blade.php
│       │   │   ├── index.blade.php
│       │   │   ├── menu/
│       │   │   │   ├── create.blade.php
│       │   │   │   ├── edit.blade.php
│       │   │   │   └── index.blade.php
│       │   │   └── orders/
│       │   │       └── index.blade.php
│       │   └── user/
│       │       ├── index.blade.php
│       │       └── orders/
│       │           └── index.blade.php
│       ├── dashboard.blade.php
│       ├── favorite/
│       │   └── index.blade.php
│       ├── favorite-mine.blade.php
│       ├── gallery/
│       │   └── show.blade.php
│       ├── gallery.blade.php
│       ├── home.blade.php
│       ├── layouts/
│       │   ├── app.blade.php
│       │   ├── footer.blade.php
│       │   ├── guest.blade.php
│       │   └── navigation.blade.php
│       ├── menu/
│       │   └── show.blade.php
│       ├── menu.blade.php
│       ├── order/
│       │   └── create.blade.php
│       ├── profile/
│       │   ├── edit.blade.php
│       │   └── partials/
│       │       ├── delete-user-form.blade.php
│       │       ├── update-password-form.blade.php
│       │       └── update-profile-information-form.blade.php
│       └── welcome.blade.php
└── routes/
    ├── auth.php
    ├── console.php
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
2. **Menu** (`/menu`) - Daftar lengkap menu makanan dengan kategori
3. **Detail Menu** (`/menu/{id}`) - Detail menu dengan fitur order
4. **Galeri** (`/gallery`) - Galeri foto restoran dan makanan
5. **Detail Galeri** (`/gallery/{id}`) - Detail foto galeri
6. **Kontak** (`/contact`) - Informasi kontak dan lokasi

### Halaman User (Login Required)
1. **Dashboard User** (`/dashboard`) - Dashboard untuk user biasa
2. **Keranjang** (`/cart`) - Keranjang belanja
3. **Favorit Saya** (`/favorit-saya`) - Menu favorit user
4. **Profil** (`/profile`) - Edit profil user

### Halaman Admin (Admin Only)
1. **Dashboard Admin** (`/admin`) - Dashboard untuk admin
2. **Manajemen Menu** (`/admin/menu`) - CRUD menu makanan
3. **Manajemen Galeri** (`/admin/gallery`) - CRUD galeri foto
4. **Manajemen Kategori** (`/admin/categories`) - CRUD kategori menu
5. **Manajemen User** (`/admin/users`) - CRUD user

## 🔐 Keamanan

- **Middleware Admin**: Hanya admin yang bisa akses halaman admin
- **File Upload Validation**: Validasi tipe dan ukuran file gambar
- **CSRF Protection**: Laravel CSRF protection aktif
- **Authentication**: Laravel Breeze authentication
- **Authorization**: Role-based access control (Admin/User)

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

## 🛒 Fitur Keranjang

- **Add to Cart**: Menambahkan menu ke keranjang
- **Update Quantity**: Mengubah jumlah item di keranjang
- **Remove Item**: Menghapus item dari keranjang
- **WhatsApp Integration**: Kirim pesanan via WhatsApp
- **Session-based**: Keranjang tersimpan dalam session

## ❤️ Fitur Favorit

- **Toggle Favorite**: Menambah/menghapus dari favorit
- **My Favorites**: Halaman khusus menu favorit user
- **Favorite Count**: Menampilkan jumlah favorit per menu
- **User-specific**: Favorit terikat dengan user yang login

## 🏷️ Fitur Kategori

- **Menu Categories**: Pengelompokan menu berdasarkan kategori
- **Category Filter**: Filter menu berdasarkan kategori
- **Admin Management**: CRUD kategori menu
- **Category Display**: Menampilkan kategori di menu

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
- **Email**: lubis163774@gmail.com
- **WhatsApp**: +62 852-4850-7938

## 📄 License

Proyek ini dibuat untuk Rumah Makan Pondok Paranginan 2. Semua hak cipta dilindungi.

---

**Dibuat dengan ❤️ menggunakan Laravel 12**
