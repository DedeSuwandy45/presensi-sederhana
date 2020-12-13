<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresensiController;



Route::get('/', function () {
    return view('welcome');
});


route::get('/registrasi',[LoginController::class,'registrasi'])->name('registrasi');
route::post('/simpanregistrasi',[LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');
route::get('/Login',[LoginController::class,'halamanlogin'])->name('Login');
route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
route::get('/Logout',[LoginController::class,'logout'])->name('Logout');

Route::group(['middleware' => ['auth','ceklevel:admin,karyawan']], function () {
    route::get('/Home',[HomeController::class,'index'])->name('Home');    
});

Route::group(['middleware' => ['auth','ceklevel:karyawan']], function () {
    route::post('/simpan-masuk',[PresensiController::class,'store'])->name('simpan-masuk');
    route::get('/presensi-masuk',[PresensiController::class,'index'])->name('presensi-masuk');    
    route::get('/presensi-keluar',[PresensiController::class,'keluar'])->name('presensi-keluar');   
    Route::post('/ubah-presensi',[PresensiController::class,'presensipulang'])->name('ubah-presensi');
});
