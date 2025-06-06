<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('admin/Eigenaaresse', [
            'users' => \App\Models\User::all(),
            'workshifts' => \App\Models\WorkShift::all(),
            'workshiftsCount' => \App\Models\WorkShift::count(),
            'appointments' => \App\Models\Appointment::all(),
            'usersCount' => \App\Models\User::count(),
            'lastFiveAppointments' => \App\Models\Appointment::orderBy('created_at', 'desc')->take(5)->get(),
            'lastFiveAppointmentsCount' => \App\Models\Appointment::orderBy('created_at', 'desc')->take(5)->count(),
        ]);

        /**
         * testrapport
         * realisatie document maken
         * 
         * reflectie verslag finale
         * 
         * laatste vijf afspraken als props naar het dashboard sturen
         * vanaf controller sinds componement te veel werk is
         * 
         * workshiftscontroller
         * Uren pagina
         * 
         * pak alle users waar role employee is
         * 
         * een eigenaaresse admin pagina met alle requirements. zie foto in camerarol
         */
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
