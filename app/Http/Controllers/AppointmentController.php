<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Inertia\Inertia;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Mail\SendAppointmentConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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
    public function storeAppointment(StoreAppointmentRequest $request)
    {
        $appointment = new Appointment();
        $appointment->customer_name = $request->customer_name;
        $appointment->email = $request->email;
        $appointment->phone_number = $request->phone_number;
        $appointment->user_id = $request->user_id;
        $appointment->treatment_id = $request->treatment_id;
        $appointment->appointment_date = Carbon::createFromFormat('Y-m-d H:i', $request->date . ' ' . $request->time);
    
        $appointment->save();
        //Mail::to($appointment->email)->send(new SendAppointmentConfirmationMail($request));
        
        $message = "afspraak van  is succesvol aangemaakt. U krijgt een bevestigingsemail"; 
        return response()->json([
            "redirect" => true,
            "message" => $message
        ]);

    
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $appointment = Appointment::with("treatment")->find($id);
        return Inertia::render("appointments/view", [$appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
{
    [$date, $time] = explode(" ", $appointment->appointment_date);
    return Inertia::render('Afspraakbewerken', [
        'appointment' => [
            'id' => $appointment->id,
            'customer_name' => $appointment->customer_name,
            'email' => $appointment->email,
            'phone_number' => $appointment->phone_number,
            "date" => $date,
            "time" => $time, 
            'behandeling' => $appointment->behandeling,
            'producten' => $appointment->producten ?? [],
        ]
    ]);
}
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        dd($appointment);
        $appointment->customer_name = $request->customer_name;
        $appointment->email = $request->email;
        $appointment->phone_number = $request->phone_number;
        $appointment->treatment_id = $request->treatment_id;
        $appointment->appointment_date = Carbon::createFromFormat('Y-m-d H:i', $request->date . ' ' . $request->time);

        $appointment->update();

        return redirect()->route("/appointments")->with("succes", "afspraak gewijzigd");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $message = "De afspraak van " . $appointment->customer_name . "om " . $appointment->appointment_date . " is succesvol verwijderd"; 
        $appointment = Appointment::all()->findOrFail($appointment);
        $appointment->delete();
        
        return response()->json([
            "redirect" => "http://localhost/afspraak",
            "message" => $message
        ]);
    }
}
