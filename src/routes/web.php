<?php

use Illuminate\Support\Facades\Route;

# Add this route to the web.php file

Route::get('/dashboard', function () {
    return view('layout-package::pages.dashboard');
})->name('dashboard.index');

Route::get('/users', function () {
    return view('layout-package::pages.users');
})->name('users.index');