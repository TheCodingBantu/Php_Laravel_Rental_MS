<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {return view('home');});
    Route::post('/addUser',[ProfileController::class,'addUser'])->name('addUser');
    Route::get('/addUser',[ProfileController::class,'addUserPage'])->name('addUserPage');
    Route::get('/users',[ProfileController::class,'allUsers'])->name('users');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Property
    Route::get('/property/all', [PropertyController::class, 'show'])->name('property.show');
    Route::get('/property', [PropertyController::class, 'create'])->name('property.create');
    Route::post('/property', [PropertyController::class, 'store'])->name('property.store');

     // locations

    Route::get('/location/all', [LocationController::class, 'show'])->name('locations.show');
    Route::get('/location', function () {return view('addlocation');})->name('location.add');
    Route::post('/location', [LocationController::class, 'store'])->name('locations.add');

    // unit
    Route::get('/unit/all', [UnitController::class, 'show'])->name('unit.show');
    Route::get('/unit', [UnitController::class, 'create'])->name('unit.create');
    Route::post('/unit', [UnitController::class, 'store'])->name('unit.store');

    // tenant
    Route::get('/tenant/all', [TenantController::class, 'show'])->name('tenant.show');
    Route::get('/tenant', [TenantController::class, 'create'])->name('tenant.create');
    Route::post('/tenant', [TenantController::class, 'store'])->name('tenant.store');

    //invoice
    Route::get('/invoice/all', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::get('/invoice', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('/invoice', [InvoiceController::class, 'store'])->name('invoice.store');


});

require __DIR__.'/auth.php';

