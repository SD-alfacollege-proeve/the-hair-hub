<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProductController;
use App\Http\Requests\StoreContactRequest;
use App\Mail\SendAppointmentConfirmationMail;
use App\Models\Appointment;
use App\Models\Contact;
use App\Models\Treatment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;





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

Route::group(['middleware' => ['auth']], function () {
    Route::get('employees', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('owner', \App\Http\Controllers\OwnerController::class)->except(['show']);
});

Route::get('/store', function () {
    return Inertia::render('Store');
})->name('store');


Route::get('/afspraakbewerken', function () {
    return Inertia::render('Afspraakbewerken');
})->name('afspraakbewerken');




Route::get('/afspraak/bewerken/{email}', function ($email) {
    $decodedEmail = urldecode($email);
    $appointment = Appointment::where("email", $email)->first();
    $employees = User::role('employee')->get();
    $treatments = Treatment::all();
    [$date, $time] = explode(" ", $appointment->appointment_date);
    return Inertia::render('KlantAfspraakBewerken', [
        "appointment" => [
            "id" => $appointment->id,
            "customer_name" => $appointment->customer_name,
            "email" => $appointment->email,
            "phone_number" => $appointment->phone_number,
            "date" => $date,
            "time" => $time, 
            "pickedTreatment" => Treatment::findOrFail($appointment->treatment_id),
            "pickedBarber" => User::findOrFail($appointment->user_id),
            "treatments" => $treatments,
            "employees" => $employees    
        ],
    ]);
    
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
    return Inertia::render('Afspraken', [
        "employees" => User::role('employee')->get(),
        "treatments" => Treatment::all(),
    ]);

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

Route::delete("/afspraken/klant/delete/{appointment}", [AppointmentController::class, "guestDeleteAppointment"])->middleware("guest");

Route::get("/emails", function(){
    return view("emails");
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
