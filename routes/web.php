<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContractModelController;
use App\Http\Controllers\ContractController;

// Route principale
Route::get('/', function () {
    return view('welcome');
});

// Routes d'authentification
Auth::routes();

// Route pour la page d'accueil
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route de ressource pour BoxController
Route::resource('boxes', BoxController::class);

// Route de ressource pour LocataireController
Route::resource('tenants', TenantController::class);

// Route de ressource pour ContractModelController
Route::resource('contract_models', ContractModelController::class);

// Route de ressource pour ContractController
Route::resource('contracts', ContractController::class);
