<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\ProdukPromoController;
use App\Http\Controllers\AlamatPengirimanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Homepage 
Route::get('/cari', [HomepageController::class, 'cari']);
Route::get('/', [HomepageController::class, 'index']);
Route::get('/about', [HomepageController::class, 'about']);
Route::get('/kontak', [HomepageController::class, 'kontak']);
Route::get('/kategori', [HomepageController::class, 'kategori']);
Route::get('/kategori/{slug}', [HomepageController::class, 'produkperkategori']);
Route::get('/produk', [HomepageController::class, 'produk']);
Route::get('/produk/{slug}', [HomepageController::class, 'produkdetail']);
Route::get('/Kategori/{kategori:slug_kategori}', [HomepageController::class, 'kategori']);



//Dashboard
Route::group(['prefix' => 'admin','middleware' => 'admin'], function() {
  Route::get('/', [DashboardController::class, 'index']);
  Route::get('/cari', [DashboardController::class, 'cari']);

  Route::get('kategori/checkSlug', [KategoriController::class, 'checkSlug']);
  // route kategori
  Route::resource('kategori', KategoriController::class);
  // route produk
  Route::resource('produk', ProdukController::class);
  // route customer
  Route::resource('customer', CustomerController::class);
  // setting profil
  Route::get('setting', [UserController::class, 'setting']);
  // form laporan
  Route::get('laporan', [LaporanController::class, 'index']);
  // proses laporan
  Route::get('proseslaporan', [LaporanController::class, 'proses']);
  // image
  Route::get('image', [ImageController::class, 'index']);
  // simpan image
  Route::post('image', [ImageController::class, 'store']);
  // hapus image by id
  Route::delete('image/{id}', [ImageController::class, 'destroy']);
  // upload image kategori
  Route::post('imagekategori', [KategoriController::class, 'uploadimage']);
  // hapus image kategori
  Route::delete('imagekategori/{id}', [KategoriController::class, 'deleteimage']);
  // upload image produk
  Route::post('produkimage', [ProdukController::class, 'uploadimage']);
  // hapus image produk
  Route::delete('produkimage/{id}', [ProdukController::class, 'deleteimage']);
  // produk promo
  Route::resource('promo', ProdukPromoController::class);
  // load async produk
  Route::get('loadprodukasync/{id}', [ProdukController::class, 'loadasync']);
});
// shopping cart
Route::group(['middleware' => 'auth'], function() {
  // wishlist
  Route::resource('wishlist', WishlistController::class);
  // cart
  Route::resource('cart', CartController::class);
  Route::patch('kosongkan/{id}', [CartController::class, 'kosongkan']);
  // cart detail
  Route::resource('cartdetail', CartDetailController::class);
  // alamat pengiriman
  Route::resource('alamatpengiriman', AlamatPengirimanController::class);
  // checkout
  Route::get('checkout', [CartController::class, 'checkout']);
  // route transaksi
  Route::resource('transaksi', TransaksiController::class);
  // profil
  Route::get('profil', [UserController::class, 'index']);
  // route transaksi
  Route::resource('/review', ReviewController::class);

});


Auth::routes();

Route::get('/home', function() {
  return redirect('/login');
});
