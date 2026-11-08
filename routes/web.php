<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('admin.index');
});