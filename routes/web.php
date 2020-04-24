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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pages', 'PagesController@index');
Route::get('/pages/{id}', 'PagesController@singlePage');
Route::get('/detail', 'PagesController@showDetail');
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
Route::get('/cari','PagesController@cari');
Route::get('/keranjang', 'PagesController@keranjang');
Route::get('/checkout', 'PagesController@checkout');
Route::get('/profil', 'PagesController@profil');
Route::get('/editprofil', 'PagesController@editprofil');
Route::post('/profil/edit', 'PagesController@editprofilsave');
// Route::get('/invoice', 'PagesController@invoice');
Route::get('/invoice/preview', 'PagesController@invoicepreview');

Route::get('/dashboard', 'DashboardController@index');



Route::get('/user/employee', 'UserController@indexEmployee');
Route::get('/user/employee/add', 'UserController@employeeAdd');
Route::post('/user/employee/add/save', 'UserController@employeeAddSave');
Route::get('/user/employee/edit/{id}', 'UserController@employeeEdit');
Route::post('/user/employee/edit/save', 'UserController@employeeEditSave');

Route::get('/produk', 'ProdukController@index');
Route::get('/produk/add', 'ProdukController@produkAdd');
Route::post('/produk/add/save', 'ProdukController@produkAddSave');
Route::get('/produk/edit/{id}', 'ProdukController@produkEdit');
Route::post('/produk/edit/save', 'ProdukController@produkEditSave');
Route::get('/produk/detail/{id}', 'ProdukController@produkDetail');
//Route::get('/produk/delete/{id}', 'ProdukController@produkDelete');

//MULTIPLE UPLOAD FORM
Route::get('/produk/gambar/form/{nama}', 'ProdukController@gambarUploadForm');
Route::post('/produk/gambar/action', 'ProdukController@gambarUploadAction');
Route::post('/produk/gambar/delete', 'ProdukController@gambarDelete');
Route::post('/produk/gambar/edit/delete', 'ProdukController@gambarEditDelete');
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
