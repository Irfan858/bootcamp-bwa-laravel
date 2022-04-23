<?php

namespace App\Http\Controllers\Backsite;
use App\Http\Controllers\Controller;

//Use library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//Request

//Use Everything Here
Use Gate;
use Auth;

//Use Model Here
use App\Models\User;

//Operational
use App\Models\Operational\Appointment;
use App\Models\Operational\Transaction;
use App\Models\Operational\Doctor;

//Master Data
use App\Model\MasterData\Specialist;
use App\Model\MasterData\Consultation;
use App\Model\MasterData\ConfigPayment;

class HospitalPatientController extends Controller
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
        //use Gate
        abort_if(Gate::denies('hospital_patient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // For Table Grid
        $hospital_patient = User::whereHas('detail_user', function(Builder $query){
            $query->where('type_user_id', 3); // Only Load Patient Or id 3 In Type User Table
        })->orderBy('created_at', 'desc')->get();

        return view('pages.backsite.operational.doctor.index', compact('hospital_patient'));
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
    public function show($id)
    {
        return abort(404);
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
