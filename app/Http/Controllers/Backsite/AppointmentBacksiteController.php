<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

//Use library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//Use Everything Here
//Use Gate
use Auth;

//Use Model Here
use App\Model\Operational\Appointment;
use App\Model\Operational\Doctor;
use App\Model\MasterData\Specialist;

class AppointmentBacksiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //For Table Grid
        $appointment = Appointment::orderBy('created_at'. 'desc')->get();

        //For Select To
        $doctor = Doctor::orderBy('name', 'asc')->get();
        $specialist = Specialist::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.appointment.index', compact('appointment', 'specialist', 'doctor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('pages.backsite.operational.appointment.index', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }

}
