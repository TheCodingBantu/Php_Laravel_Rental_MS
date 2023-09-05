<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentProcessorController;
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
    Route::get('/unit/tenant/', [UnitController::class, 'getTenantUnit'])->name('unit.getbytenant');
    Route::get('/unit', [UnitController::class, 'create'])->name('unit.create');
    Route::post('/unit', [UnitController::class, 'store'])->name('unit.store');

    // tenant
    Route::get('/tenant/all', [TenantController::class, 'show'])->name('tenant.show');
    Route::get('/tenant', [TenantController::class, 'create'])->name('tenant.create');
    Route::post('/tenant', [TenantController::class, 'store'])->name('tenant.store');

    //invoice
    Route::get('/invoice/all', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::get('/invoice', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::get('/invoice/retrieve', [InvoiceController::class, 'retrieve'])->name('invoice.retrieve');
    Route::post('/invoice', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('/invoice/pdf', [InvoiceController::class, 'pdf'])->name('invoice.pdf');

    Route::get('/payment/all', [PaymentController::class, 'show'])->name('payment.show');
    Route::get('/payment', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');

    Route::get('/processor/all', [PaymentProcessorController::class, 'show'])->name('processor.show');
    Route::get('/processor', [PaymentProcessorController::class, 'create'])->name('processor.create');
    Route::post('/processor', [PaymentProcessorController::class, 'store'])->name('processor.store');
    Route::get('/processor/retrieve', [PaymentProcessorController::class, 'retrieve'])->name('processor.retrieve');

});

require __DIR__.'/auth.php';

