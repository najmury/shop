<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'home'])->name('home');
Route::get('/shop', [LandingController::class, 'shop'])->name('shop');
Route::get('/categories', [LandingController::class, 'categories'])->name('categories');
Route::get('/category/{slug}', [LandingController::class, 'category'])->name('category');
Route::get('/promo', [LandingController::class, 'promo'])->name('promo');
Route::get('/contact', [LandingController::class, 'contact'])->name('contact');
Route::get('/about', [LandingController::class, 'about'])->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');

//kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');

//produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/show/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.delete');

Route::get('/laporan', function () {
    return view('laporan');
})->name('laporan');

Route::get('/pesanan', function () {
    return view('pesanan');
})->name('pesanan');

Route::get('/profile', function () {
    return view('profile');
});

// routes/web.php
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('regis.store');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
