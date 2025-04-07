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

Route::get('employees', function () {
    return Inertia::render('Employees');
})->middleware(['auth', 'verified'])->name('employees');

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
