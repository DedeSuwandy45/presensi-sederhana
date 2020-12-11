<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
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
    route::get('/Home',[Homecontroller::class,'index'])->name('Home');
});

Route::group(['middleware' => ['auth','ceklevel:karyawan']], function () {
    route::post('/simpan-masuk',[PresensiController::class,'store'])->name('simpan-masuk');
    route::get('/presensi-masuk',[PresensiController::class,'index'])->name('presensi-masuk');
});
