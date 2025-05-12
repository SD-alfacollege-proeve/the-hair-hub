<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Inertia\Inertia;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Mail\SendAppointmentConfirmationMail;
use App\Models\Treatment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpClient\Response\AsyncResponse;
use App\Models\User;
use Illuminate\Auth\Access\Gate;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::orderBy('created_at', 'desc')->get();
        
        return Inertia::render('admin/Afspraken', [
            'appointments' => $appointments,
        ]);
    }
    
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAppointment(StoreAppointmentRequest $request): JsonResponse
{
    $appointment = new Appointment();
    $appointment->customer_name = $request->customer_name;
    $appointment->email = $request->email;
    $appointment->phone_number = $request->phone_number;
    $appointment->user_id = $request->user_id;
    $appointment->treatment_id = $request->treatment_id;
    $appointment->appointment_date = Carbon::createFromFormat('Y-m-d H:i', $request->date . ' ' . $request->time);
    $appointment->save();

    Mail::to($appointment->email)->send(new SendAppointmentConfirmationMail($request));
    $message = "Afspraak is succesvol aangemaakt. U krijgt een bevestigingsemail. U wordt nu naar de homepagina gestuurd.";
    return response()->json([
        "redirect" => true,
        "message" => $message
    ]);
}

    /**
     * Display the specified resource.
     */
    
     public function guestChangeAppointment(){
        return Inertia::render("Afspraakbewerken");
     }
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
{
    $employees = User::role('employee')->get();
    $treatments = Treatment::all();
    [$date, $time] = explode(" ", $appointment->appointment_date);
    return Inertia::render('Afspraakbewerken', [
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
}
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->customer_name = $request->customer_name;
        $appointment->email = $request->email;
        $appointment->phone_number = $request->phone_number;
        $appointment->treatment_id = $request->treatment_id;
        $appointment->appointment_date = Carbon::createFromFormat('Y-m-d H:i', $request->date . ' ' . $request->time);

        $appointment->update();

        $message = "De afspraak van " . $appointment->customer_name . " van " . $appointment->appointment_date . " is succesvol gewijzigd";
        return response()->json([
            "redirect" => true,
            "message" => $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $message = "De afspraak van " . $appointment->customer_name . " om " . $appointment->appointment_date . " is succesvol verwijderd"; 
        $appointment = Appointment::all()->findOrFail($appointment);
        $appointment->delete();
        
        return response()->json([
            "redirect" => true,
            "message" => $message
        ]);
    }

    public function guestDeleteAppointment(Appointment $appointment)
    {
        
        $message = "Je afspraak is succesvol verwijderd"; 
        $appointment = Appointment::all()->findOrFail($appointment);
        $appointment->delete();
        
        return response()->json([
            "redirect" => true,
            "message" => $message
        ]);
    }
}
