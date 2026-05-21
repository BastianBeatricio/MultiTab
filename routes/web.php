<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect('/utama'); });
Route::get('/utama', function () { return view('utama'); });
Route::get('/tugas', function () { return view('tugas'); });
Route::get('/pengaturan', function () { return view('pengaturan'); });
Route::get('/kontak', function () { return view('kontak'); });