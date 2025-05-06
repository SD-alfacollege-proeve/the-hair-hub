<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Inertia\Inertia;
use App\Http\Requests\StoreAppointmentRequest;
use App\Mail\SendAppointmentConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

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
        $appointment->treatment_id = $request->treatment_id;
        $appointment->datetime = $request->date . ' ' . $request->time;

        
        $appointment->save();
        Mail::to($appointment->email)->send(new SendAppointmentConfirmationMail($request));
        
        return redirect()->with("message", "Afspraak is gemaakt!");

    
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
        $appointment = Appointment::all()->find($appointment);
        return Inertia::render("/appointments/edit", [$appointment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->customer_name = $request->customer_name;
        $appointment->email = $request->email;
        $appointment->phone_number = $request->phone_number;
        $appointment->treatment_id = $request->treatment_id;
        $appointment->datetime = $request->date . ' ' . $request->time;

        $appointment->update();

        return redirect()->route("/appointments")->with("succes", "afspraak gewijzigd");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $id)
    {
        $appointment = Appointment::all()->findOrFail($id);
        $appointment->delete();
        
        return response()->json(['redirect' => '/afspraken']);
    }
}
