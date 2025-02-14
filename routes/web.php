<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\TenantController;
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

// Route de ressource pour LocataireController
Route::resource('tenants', TenantController::class);

// Route pour afficher la vue 'factures'
Route::get('/factures', [FactureController::class, 'index'])->name('factures');

// Route de ressource pour FactureController
Route::resource('factures', FactureController::class);


// Route pour afficher la vue 'impots'
Route::get('/impots', function () {
    return view('impots');
})->name('impots');
