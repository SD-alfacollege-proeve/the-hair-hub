<?php

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
    Route::get('employees', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
});

Route::get('/store', function () {
    return Inertia::render('Store');
})->name('store');

Route::get('/privacybeleid', function () {
    return Inertia::render('Privacybeleid');
})->name('privacybeleid');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::get('/cookiebeleid', function () {
    return Inertia::render('Cookiebeleid');
})->name('cookiebeleid');

Route::get('customers', function () {
    return Inertia::render('Customers');
})->middleware(['auth', 'verified'])->name('customers');

Route::get('invoices', function () {
    return Inertia::render('Invoices');
})->middleware(['auth', 'verified'])->name('invoices');

Route::get('appointments', function () {
    return Inertia::render('Appointments');
})->middleware(['auth', 'verified'])->name('appointments');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
