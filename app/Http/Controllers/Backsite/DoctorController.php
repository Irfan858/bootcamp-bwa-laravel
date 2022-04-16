<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

//Use library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//Request
use App\Http\Requests\Doctor\StoreDoctorRequest;
use App\Http\Requests\Doctor\UpdateDoctorRequest;

//Use Everything Here
//Use Gate
use Auth;

//Use Model Here
use App\Model\MasterData\Doctor;
use App\Model\MasterData\Specialist;

class DoctorController extends Controller
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
        $doctor = Doctor::orderBy('created_at', 'desc')->get();

        //For Select to (Use Ascending Order)
        $specialist = Specialist::orderBy('name', 'asc')->get();


        return view('pages.backsite.operational.doctor.index', compact('doctor','specialist'));
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
    public function store(StoreDoctorRequest $request)
    {
          //get all data from frontsite
        $data = $request->all();

        //store to database
        $doctor = Doctor::create($data);

        alert()->success('Success Message', 'Successfully Added New Doctor');
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('pages.backsite.operational.doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
          //For Select to (Use Ascending Order)
          $specialist = Specialist::orderBy('name', 'asc')->get();

          return view('pages.backsite.operational.doctor.edit', compact('doctor', 'specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
         //get all data from frontsite
         $data = $request->all();

         //update to database
         $doctor->update($data);

         alert()->success('Success Message', 'Successfully Added New Specialist');
         return redirect()->route('backsite.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        alert()->success('Success Message', 'Successfully deleted Doctor');

        return back();
    }
}
