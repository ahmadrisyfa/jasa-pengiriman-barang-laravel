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
//     return view('index');
// });

//frontend
Route::get('/',[App\Http\Controllers\FrontendController::class,'index']);
Route::get('/ketentuan',[App\Http\Controllers\FrontendController::class,'ketentuan_barang']);
Route::get('/pengiriman',[App\Http\Controllers\FrontendController::class,'pengiriman']);
Route::get('/waktu',[App\Http\Controllers\FrontendController::class,'waktu']);
Route::get('/persyaratan',[App\Http\Controllers\FrontendController::class,'persyaratan']);

Route::group(['middleware' =>'auth'], function(){

Route::get('/profile',[App\Http\Controllers\FrontendController::class,'profile']);
Route::post('/profile/create',[App\Http\Controllers\FrontendController::class,'profile_create']);
Route::get('/kirim_barang',[App\Http\Controllers\FrontendController::class,'kirim_barang']);
Route::post('/kirim_barang',[App\Http\Controllers\FrontendController::class,'kirim_barang_create']);
Route::get('/daftar_kurir',[App\Http\Controllers\FrontendController::class,'daftar_kurir']);
Route::post('/daftar_kurir/create',[App\Http\Controllers\FrontendController::class,'daftar_kurir_create']);
Route::get('/edit_profil_kurir',[App\Http\Controllers\FrontendController::class,'edit_profil_kurir']);
Route::post('/daftar_kurir/update/',[App\Http\Controllers\FrontendController::class,'update_profil_kurir']);
Route::get('/daftar_pesanan_kurir',[App\Http\Controllers\FrontendController::class,'daftar_pesanan_kurir']);
Route::get('/daftar_pesanan_kurir_edit/{id}',[App\Http\Controllers\FrontendController::class,'daftar_pesanan_kurir_edit']);
Route::post('/daftar_pesanan_kurir_update/{id}',[App\Http\Controllers\FrontendController::class,'daftar_pesanan_kurir_update']);

Route::get('/riwayat_kirim',[App\Http\Controllers\FrontendController::class,'riwayat_kirim']);
Route::get('/riwayat_kirim/{id}',[App\Http\Controllers\FrontendController::class,'riwayat_kirim_detail']);
Route::get('/riwayat_kirim/cetak/{id}',[App\Http\Controllers\FrontendController::class,'cetak']);



});
//login
Route::get('/login',[App\Http\Controllers\LoginController::class,'index'])->middleware('guest')->name('login');        
Route::post('/login',[App\Http\Controllers\LoginController::class,'authenticate']);
Route::get('/logout',[App\Http\Controllers\LoginController::class,'logout']); 

//register
Route::get('/register',[App\Http\Controllers\RegisterController::class,'index'])->middleware('guest');        
Route::post('/register',[App\Http\Controllers\RegisterController::class,'store']);

Route::group(['middleware' =>'AdminMiddleware'], function(){
//backend
Route::get('/admin/dashboard',[App\Http\Controllers\BackendController::class,'dashboard'])->middleware('auth');

//daftar_kurir
Route::get('/admin/daftar_kurir',[App\Http\Controllers\DaftarKurirController::class,'daftar_kurir']);
Route::get('/admin/daftar_kurir/create',[App\Http\Controllers\DaftarKurirController::class,'create']);
Route::post('/admin/daftar_kurir/store',[App\Http\Controllers\DaftarKurirController::class,'store']);
Route::get('/admin/daftar_kurir/edit/{id}',[App\Http\Controllers\DaftarKurirController::class,'edit']);
Route::post('/admin/daftar_kurir/update/{id}',[App\Http\Controllers\DaftarKurirController::class,'update']);
Route::get('/admin/daftar_kurir/destroy/{id}',[App\Http\Controllers\DaftarKurirController::class,'destroy']);

//barang
Route::get('/admin/barang',[App\Http\Controllers\BarangController::class,'barang']);
Route::get('/admin/barang/create',[App\Http\Controllers\BarangController::class,'create']);
Route::post('/admin/barang/store',[App\Http\Controllers\BarangController::class,'store']);
Route::get('/admin/barang/edit/{id}',[App\Http\Controllers\BarangController::class,'edit']);
Route::post('/admin/barang/update/{id}',[App\Http\Controllers\BarangController::class,'update']);
Route::get('/admin/barang/destroy/{id}',[App\Http\Controllers\BarangController::class,'destroy']);

//pemesan
Route::get('/admin/pemesan',[App\Http\Controllers\PemesanController::class,'pemesan']);
Route::get('/admin/pemesan/create',[App\Http\Controllers\PemesanController::class,'create']);
Route::post('/admin/pemesan/store',[App\Http\Controllers\PemesanController::class,'store']);
Route::get('/admin/pemesan/edit/{id}',[App\Http\Controllers\PemesanController::class,'edit']);
Route::post('/admin/pemesan/update/{id}',[App\Http\Controllers\PemesanController::class,'update']);
Route::get('/admin/pemesan/destroy/{id}',[App\Http\Controllers\PemesanController::class,'destroy']);

//User
Route::get('/admin/User',[App\Http\Controllers\UserController::class,'User']);
Route::get('/admin/User/create',[App\Http\Controllers\UserController::class,'create']);
Route::post('/admin/User/store',[App\Http\Controllers\UserController::class,'store']);
Route::get('/admin/User/edit/{id}',[App\Http\Controllers\UserController::class,'edit']);
Route::post('/admin/User/update/{id}',[App\Http\Controllers\UserController::class,'update']);
Route::get('/admin/User/destroy/{id}',[App\Http\Controllers\UserController::class,'destroy']);

});