<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Route;

// Frontend
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/urun/{slug}', [HomeController::class, 'product'])->name('product.detail');

// Contact & FAQ
Route::get('/iletisim', [ContactController::class, 'index'])->name('contact');
Route::post('/iletisim', [ContactController::class, 'store'])->name('contact.store');
Route::get('/sss', function () { return view('faq'); })->name('faq');

// Cart
Route::get('/sepet', [CartController::class, 'index'])->name('cart.index');
Route::post('/sepet/ekle', [CartController::class, 'add'])->name('cart.add');
Route::post('/sepet/guncelle', [CartController::class, 'update'])->name('cart.update');
Route::post('/sepet/kaldir', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/sepet/sayi', [CartController::class, 'count'])->name('cart.count');

// Checkout
Route::get('/odeme', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/odeme', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/siparis/{orderNumber}', [CheckoutController::class, 'confirmation'])->name('order.confirmation');

// Admin
Route::get('/admin/giris', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/giris', [AdminController::class, 'login'])->name('admin.login.post');
Route::post('/admin/cikis', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(AdminAuth::class)->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/siparisler', [AdminController::class, 'orders'])->name('orders');
    Route::get('/siparisler/{order}', [AdminController::class, 'orderDetail'])->name('order.detail');
    Route::put('/siparisler/{order}/durum', [AdminController::class, 'updateOrderStatus'])->name('order.status');
    Route::get('/urunler', [AdminController::class, 'products'])->name('products');
    Route::get('/urunler/ekle', [AdminController::class, 'createProduct'])->name('product.create');
    Route::post('/urunler', [AdminController::class, 'storeProduct'])->name('product.store');
    Route::get('/urunler/{product}/duzenle', [AdminController::class, 'editProduct'])->name('product.edit');
    Route::put('/urunler/{product}', [AdminController::class, 'updateProduct'])->name('product.update');
    Route::delete('/urunler/{product}', [AdminController::class, 'deleteProduct'])->name('product.delete');
    Route::get('/mesajlar', [AdminController::class, 'messages'])->name('messages');
    Route::get('/mesajlar/{id}', [AdminController::class, 'messageDetail'])->name('message.detail');
    Route::delete('/mesajlar/{id}', [AdminController::class, 'deleteMessage'])->name('message.delete');
});
