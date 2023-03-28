<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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


Route::get('/', [PageController::class, 'index']);

Route::get('/login', [LoginController::class, 'login']);
Route::post('/auth', [LoginController::class, 'auth']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

//Route User
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/simpan', [UserController::class, 'simpan']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update', [UserController::class, 'update']);
Route::get('/user/hapus/{id}', [\App\Http\Controllers\UserController::class, 'hapus']);

//Route Kelas
Route::get('/kelas', [\App\Http\Controllers\KelasController::class, 'index']);
Route::get('/kelas/tambah', [\App\Http\Controllers\KelasController::class, 'tambah']);
Route::post('/kelas/simpan', [\App\Http\Controllers\KelasController::class, 'simpan']);
Route::get('/kelas/edit/{id}', [\App\Http\Controllers\KelasController::class, 'edit']);
Route::post('/kelas/update', [\App\Http\Controllers\KelasController::class, 'update']);
Route::get('/kelas/hapus/{id}', [\App\Http\Controllers\KelasController::class, 'hapus']);

//Route Spp
Route::get('/spp', [\App\Http\Controllers\SppController::class, 'index']);
Route::get('/spp/tambah', [\App\Http\Controllers\SppController::class, 'tambah']);
Route::post('/spp/simpan', [\App\Http\Controllers\SppController::class, 'simpan']);
Route::get('/spp/edit/{id}', [\App\Http\Controllers\SppController::class, 'edit']);
Route::post('/spp/update', [\App\Http\Controllers\SppController::class, 'update']);
Route::get('/spp/hapus/{id}', [\App\Http\Controllers\SppController::class, 'hapus']);

//Route siswa
Route::get('/siswa', [\App\Http\Controllers\SiswaController::class, 'index']);
Route::get('/siswa/tambah', [\App\Http\Controllers\SiswaController::class, 'tambah']);
Route::post('/siswa/simpan', [\App\Http\Controllers\SiswaController::class, 'simpan']);
Route::get('/siswa/edit/{id}', [\App\Http\Controllers\SiswaController::class, 'edit']);
Route::post('/siswa/update', [\App\Http\Controllers\SiswaController::class, 'update']);
Route::get('/siswa/hapus/{id}', [\App\Http\Controllers\SiswaController::class, 'hapus']);

//Route Pembayaran
Route::get('/pembayaran', [\App\Http\Controllers\PembayaranController::class, 'index']);
Route::get('/pembayaran/transaksi', [\App\Http\Controllers\PembayaranController::class, 'transaksi']);
Route::get('/pembayaran/tambah', [\App\Http\Controllers\PembayaranController::class, 'tambah']);
Route::post('/pembayaran/simpan', [\App\Http\Controllers\PembayaranController::class, 'simpan']);
Route::get('/pembayaran/edit/{id}', [\App\Http\Controllers\PembayaranController::class, 'edit']);
Route::post('/pembayaran/update', [\App\Http\Controllers\PembayaranController::class, 'update']);
Route::get('/pembayaran/hapus/{id}', [\App\Http\Controllers\PembayaranController::class, 'hapus']);
