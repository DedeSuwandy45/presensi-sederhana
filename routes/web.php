<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});


route::get('/Login',[LoginController::class,'halamanlogin'])->name('login');
route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
route::get('/Logout',[LoginController::class,'logout'])->name('Logout');

Route::group(['middleware' => ['auth','ceklevel:admin,karyawan']], function () {
    route::get('/Home',[Homecontroller::class,'index'])->name('Home');
});
