<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{gallery}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/menu/{menu}', [App\Http\Controllers\MenuController::class, 'show'])->name('menu.show');

// Admin routes
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function() { return view('dashboard.admin.index'); })->name('dashboard');
    // Menu management
    Route::resource('menu', MenuController::class);
    
    // Gallery management
    Route::resource('gallery', GalleryController::class);
    
    // Category management
    Route::resource('categories', CategoryController::class);
    
    // User management
    Route::resource('users', UserController::class);
});

// User profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Cart routes
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{menuId}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{menuId}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{menuId}', [CartController::class, 'remove'])->name('cart.remove');
});
Route::get('/cart/whatsapp', [CartController::class, 'whatsappLink'])->name('cart.whatsapp');

// Favorite routes
Route::post('/favorite/toggle', [App\Http\Controllers\FavoriteController::class, 'toggle'])->middleware('auth')->name('favorite.toggle');
Route::get('/favorit-saya', [App\Http\Controllers\FavoriteController::class, 'myFavorites'])->middleware('auth')->name('favorite.index');

require __DIR__.'/auth.php';
