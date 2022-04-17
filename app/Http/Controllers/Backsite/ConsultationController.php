<?php

namespace App\Http\Controllers\Backsite;

//Use library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//Request
use App\Http\Requests\Consultation\StoreConsultationRequest;
use App\Http\Requests\Consultation\UpdateConsultationRequest;

//Use Everything Here
//Use Gate
use Auth;

//Use Model Here
use App\Model\MasterData\Consutation;
use App\Model\Operational\Appointment;


class ConsultationController extends Controller
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
        $consultation = Consultation::orderBy('created_at', 'desc')->get();

        //For Select to (Use Descending Order)
        $appointment = Appointment::orderBy('created_at','desc')->get();

        return view('pages.backsite.master-data.consultation.index', compact('consultation','appointment'));
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
    public function store(Consultation $consultation)
    {
        //get all data from frontsite
        $data = $request->all();

        //store to database
        $consultation = Consultation::create($data);

        alert()->success('Success Message', 'Successfully Added New Consultation');
        return redirect()->route('backsite.consultation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        return view('pages.backsite.master-data.consultation.show', compact('consultation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        //For Select to (Use Descending Order)
        $appointment = Appointment::orderBy('created_at','desc')->get();

        return view('pages.backsite.master-data.consultation.show', compact('consultation', 'appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsultationRequest $request, Consultation $consultation)
    {
         //get all data from frontsite
         $data = $request->all();

         //update to database
         $consultation->update($data);

         alert()->success('Success Message', 'Successfully Updated Consultation');
         return redirect()->route('backsite.consultation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->forceDelete();

        alert()->success('Success Message', 'Successfully deleted Consultation');

        return back();
    }
}
