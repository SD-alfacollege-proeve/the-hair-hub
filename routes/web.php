<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Landing');
})->name('home');
Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('products', function () {
    return Inertia::render('Products');
})->middleware(['auth', 'verified'])->name('products');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('employees', [EmployeeController::class, 'index'])->name('employees');
    Route::resource('appointments', AppointmentController::class);
});

Route::get('customers', function () {
    return Inertia::render('Customers');
})->middleware(['auth', 'verified'])->name('customers');

Route::get('invoices', function () {
    return Inertia::render('Invoices');
})->middleware(['auth', 'verified'])->name('invoices');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
