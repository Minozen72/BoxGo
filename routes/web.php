<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\LocataireController;
use Illuminate\Support\Facades\Auth;

// Route principale
Route::get('/', function () {
    return view('welcome');
});

// Routes d'authentification
Auth::routes();

// Route pour la page d'accueil
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route pour afficher la vue 'mesbox'
Route::get('/mesbox', [BoxController::class, 'index'])->name('mesbox');

// Route de ressource pour BoxController
Route::resource('boxes', BoxController::class);

// Route de ressource pour LocataireController
Route::resource('locataires', LocataireController::class);

// Route pour afficher la vue 'meslocataires'
Route::get('/meslocataires', function () {
    return view('meslocataires');
})->name('meslocataires');

// Route pour afficher la vue 'impots'
Route::get('/impots', function () {
    return view('impots');
})->name('impots');
