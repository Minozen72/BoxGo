<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Routes d'authentification
Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mesbox', function () {
    return view('mesbox');
})->name('mesbox');

Route::get('/meslocataires', function () {
    return view('meslocataires');
})->name('meslocataires');

Route::get('/impots', function () {
    return view('impots');
})->name('impots');