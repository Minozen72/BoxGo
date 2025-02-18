<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContractModelController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\TaxController;

// Route principale
Route::get('/', function () {
    return view('welcome');
});

// Routes d'authentification
Auth::routes();


Route::middleware('auth')->group(function () {

    
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

    // Route pour les factures
    Route::get('/bills/payment', [BillController::class, 'payment'])->name('bills.payment');
    Route::post('/bills/generate-monthly', [BillController::class, 'generateMonthlyBills'])->name('bills.generate-monthly');
    Route::resource('bills', BillController::class);

    // Routes pour la gestion des impôts
    Route::get('/taxes', [TaxController::class, 'index'])->name('taxes.index');
    Route::post('/taxes/calculate', [TaxController::class, 'calculate'])->name('taxes.calculate');


});

