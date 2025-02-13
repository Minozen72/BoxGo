<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\LocataireController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FactureController;

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

// Route personnalisée pour la facture d'une box
Route::get('boxes/{box}/facture', [BoxController::class, 'facture'])->name('boxes.facture');

// Route de ressource pour BoxController
Route::resource('boxes', BoxController::class);

// Route pour afficher la vue 'meslocataires'
Route::get('/meslocataires', [LocataireController::class, 'index'])->name('meslocataires');

// Route de ressource pour LocataireController
Route::resource('locataires', LocataireController::class);

// Route pour afficher la vue 'factures'
Route::get('/factures', [FactureController::class, 'index'])->name('factures');


// Route pour afficher la vue 'impots'
Route::get('/impots', function () {
    return view('impots');
})->name('impots');
