<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/pages', 'PagesController@index');
Route::get('/pages/{id}', 'PagesController@singlePage');
Route::get('/detail/{id}', 'PagesController@showDetail');
Route::get('produk/list', 'PagesController@produkList');
Route::get('/produk-kategori/{id}', 'PagesController@byKategori')->name('produk.kategori');

//Login,Register,Logout User
Route::get('/login', 'UserController@login');
Route::post('/login/action', 'UserController@loginAction');
Route::get('/register', 'UserController@register');
Route::post('/register/action', 'UserController@registerPost');
Route::get('/logout', 'UserController@Userlogout');
//Login,Logout Employee
Route::get('/login/employee', 'UserController@loginEmployee');
Route::post('/login/employee/action', 'UserController@loginEmployeeAction');
Route::get('/logout/employee', 'UserController@Employeelogout');


Route::get('/', 'PagesController@index');
Route::get('/produklist', 'PagesController@produk');
Route::get('/cari','PagesController@cari');
Route::get('/keranjang/cart', 'PagesController@keranjang' );
Route::get('/keranjang/cart/plus', 'PagesController@plusProduk');
Route::get('/keranjang/cart/minus', 'PagesController@minusProduk');
Route::get('/checkout/{notaId}', 'PagesController@checkout');
Route::get('/profil', 'PagesController@profil');
Route::get('/editprofil', 'PagesController@editprofil');
Route::post('/profil/edit', 'PagesController@editprofilsave');
Route::get('/invoice/preview/{notaId}', 'PagesController@invoicepreview');
Route::get('/dashboard', 'DashboardController@index');

Route::post('/produk/api/search', 'PagesController@apiSearchProduk');

Route::get('/user/employee', 'UserController@indexEmployee');
Route::get('/user/employee/add', 'UserController@employeeAdd');
Route::post('/user/employee/add/save', 'UserController@employeeAddSave');
Route::get('/user/employee/edit/{id}', 'UserController@employeeEdit');
Route::post('/user/employee/edit/save', 'UserController@employeeEditSave');
Route::get('/user/customer', 'UserController@indexDataCustomer');


Route::get('/produk', 'ProdukController@index');
Route::get('/produk/add', 'ProdukController@produkAdd');
Route::post('/produk/add/save', 'ProdukController@produkAddSave');
Route::get('/produk/edit/{id}', 'ProdukController@produkEdit');
Route::post('/produk/edit/save', 'ProdukController@produkEditSave');
Route::get('/produk/detail/{id}', 'ProdukController@produkDetail');
Route::post('/produk/api/search_produk', 'ProdukController@apiSearchProduk');
//Route::get('/produk/delete/{id}', 'ProdukController@produkDelete');

//MULTIPLE UPLOAD FORM
Route::get('/produk/gambar/form/{nama}', 'ProdukController@gambarUploadForm');
Route::post('/produk/gambar/action', 'ProdukController@gambarUploadAction');
Route::post('/produk/gambar/delete', 'ProdukController@gambarDelete');
Route::get('/produk/gambar/edit/delete/{id}', 'ProdukController@gambarEditDelete');
//////////////

Route::get('/kategori', 'KategoriController@index');
Route::get('/kategori/add', 'KategoriController@kategoriAdd');
Route::post('/kategori/add/save', 'KategoriController@kategoriAddSave');
Route::get('/kategori/edit/{id}', 'KategoriController@kategoriEdit');
Route::post('/kategori/edit/save', 'KategoriController@kategoriEditSave');
Route::get('/kategori/delete/{id}', 'KategoriController@kategoriDelete');

Route::get('/supplier', 'SupplierController@index');
Route::get('/supplier/add', 'SupplierController@supplierAdd');
Route::post('/supplier/add/save', 'SupplierController@supplierAddSave');
Route::get('/supplier/edit/{id}', 'SupplierController@supplierEdit');
Route::post('/supplier/edit/save', 'SupplierController@supplierEditSave');
Route::get('/supplier/delete/{id}', 'SupplierController@supplierDelete');

//restok
Route::get('/transaksi', 'TransaksiController@ListProduk');
// Route::get('/transaksi/api/search-product', 'TransaksiController@apiSearch');
Route::get('/transaksi/cart', 'TransaksiController@cart');
Route::get('/transaksi/cart/plus', 'TransaksiController@plusProduk');
Route::get('/transaksi/cart/minus', 'TransaksiController@minusProduk');
Route::get('/transaksi/cart/checkout/{notaId}', 'TransaksiController@checkout');

//laporan
Route::get('/api/laporan/laporanTransaksi', 'ApiLaporanController@getLaporanTransaksi');
Route::get('/laporan', 'LaporanController@index');

//invoice admin
Route::get('/invoice/admin/{notaId}', 'InvoiceController@indexAdmin');
Route::get('/invoice/admin/preview/{notaId}', 'InvoiceController@previewPdfAdmin');
Route::get('/invoice/admin/print/{notaId}', 'InvoiceController@printPdfAdmin');
