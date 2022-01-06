<?php

use App\Http\Controllers\GajiController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengajuanPangkatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\{Route, Auth};

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

    // Landing
    Route::view('/', 'landing');

    // Dashboard
    Route::view('/dashboard', 'layouts.dashboard')->middleware('auth')->name('dashboard');

    // Kelola Pengguna
    Route::resource('kelolapengguna', UserController::class)->middleware('admin');
    Route::put('resetpassword/{id}', [ResetController::class, 'store'])->middleware('admin')->name('reset-password');

    // Golongan
    Route::resource('golongan', GolonganController::class)->middleware('admin');
    Route::get('golongan-downloadPDF', [GolonganController::class, 'downloadPDF'])->middleware('admin')->name('golongan.download');
    Route::get('golongan-cetakPDF', [GolonganController::class, 'cetakPDF'])->middleware('admin')->name('golongan.cetak');

    // Jabatan
    Route::resource('jabatan', JabatanController::class)->middleware('admin');
    Route::get('jabatan-downloadPDF', [JabatanController::class, 'downloadPDF'])->middleware('admin')->name('jabatan.download');
    Route::get('jabatan-cetakPDF', [JabatanController::class, 'cetakPDF'])->middleware('admin')->name('jabatan.cetak');

    // Pegawai
    Route::resource('pegawai', PegawaiController::class)->middleware('auth');
    // Cetak PDF Data Pegawai
    Route::get('pegawai-downloadPDF', [PegawaiController::class, 'downloadPDF'])->middleware('admin')->name('download');
    Route::get('pegawai-cetakPDF', [PegawaiController::class, 'cetakPDF'])->middleware('admin')->name('cetak');

    //Pegawai gURU
    Route::get('pegawai-guru', [PegawaiController::class, 'tambah'])->name('tambah');
    Route::post('pegawai-guru', [PegawaiController::class, 'buat'])->name('buat');
    Route::get('history-guru/{user:id}', [PegawaiController::class, 'history'])->name('history-pegawai');

    // Gaji
    Route::resource('gaji', GajiController::class);

    // Pengajuan Pangkat
    Route::resource('pengajuanpangkat', PengajuanPangkatController::class)->middleware('auth');

    // Pengajuan Pangkat
    Route::get('history/{user:id}', [PengajuanPangkatController::class, 'history'])->name('history');
    Route::put('confirm/{id}', [PengajuanPangkatController::class, 'confirm'])->middleware('admin')->name('pengajuanpangkat.confirm');

    // Profile
    Route::get('profile/{user:username}', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/{user:username}', [ProfileController::class, 'update'])->name('profile.update');

    //Update Password
    Route::get('password/{user:username}', [UpdatePasswordController::class, 'index'])->name('password');
    Route::put('password-update/{user:username}', [UpdatePasswordController::class, 'update'])->name('updatepassword');




// Route::get('/', function () {
//     return view('landing');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
