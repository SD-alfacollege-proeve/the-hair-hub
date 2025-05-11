<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Requests\StoreContactRequest;
use App\Models\Appointment;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Carbon\Carbon;




Route::get('/', function () {
    return Inertia::render('Landing');
})->name('home');
Route::get('dashboard', function () {
    $appointments = Appointment::latest()->limit(5)->get();
    return Inertia::render('Dashboard', [
        "appointments" => $appointments
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('products', [ProductController::class, "index"])->name("products");

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('employees', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
});

Route::get('/store', function () {
    return Inertia::render('Store');
})->name('store');


Route::get('/afspraakbewerken', function () {
    return Inertia::render('Afspraakbewerken');
})->name('afspraakbewerken');


Route::get('/klantafspraak', function () {
    return Inertia::render('Klantafspraak');
})->name('klantafspraak');

Route::get('/privacybeleid', function () {
    return Inertia::render('Privacybeleid');
})->name('privacybeleid');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::post("/contact/store", function(StoreContactRequest $request){
    DB::table("contact")->insert([
        "name" => $request->name,
        "email" => $request->email,
        "message" => $request->message,
        "created_at" => Carbon::now(),
        "updated_at" => Carbon::now() 
    ]);
    
    return redirect()->back();
});

Route::get('/cookiebeleid', function () {
    return Inertia::render('Cookiebeleid');
})->name('cookiebeleid');

Route::get('/maak-afspraak', function () {
    return Inertia::render('Afspraken');
})->name('afspraken');

Route::get('customers', function () {
    return Inertia::render('Customers');
})->middleware(['auth', 'verified'])->name('customers');

Route::get('invoices', function () {
    return Inertia::render('Invoices');
})->middleware(['auth', 'verified'])->name('invoices');

Route::get('/afspraken', [AppointmentController::class, "index"])->middleware(["auth", "verified"]);
Route::delete("/afspraken/delete/{appointment}", [AppointmentController::class, "destroy"])->middleware(["auth", "verified"])->name("afspraken.delete");
Route::post("/afspraken/create", [AppointmentController::class, "storeAppointment"]);
Route::get("/afspraken/edit/{appointment}", [AppointmentController::class, "edit"]);
Route::put("/afspraken/update/{appointment}", [AppointmentController::class, "update"]);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
