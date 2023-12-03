<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Homecontroller;

Route::get('/', [Homecontroller::class, 'index'])->name('index');

Route::get('kvkk', function () {
    return view('web.kvkk');
 })->name('web.kvkk');
