<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('layout-package::pages.dashboard');
})->name('dashboard.index');

Route::get('/users', function () {
    return view('layout-package::pages.users');
})->name('users.index');
