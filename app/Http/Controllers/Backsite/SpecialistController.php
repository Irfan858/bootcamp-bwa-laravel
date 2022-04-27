<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

//Use library
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//Request
use App\Http\Requests\Specialist\StoreSpecialistRequest;
use App\Http\Requests\Specialist\UpdateSpecialistRequest;

//Use Everything Here
use Gate;
use Auth;

//Use Model Here
use App\Models\MasterData\Specialist;

class SpecialistController extends Controller
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
        abort_if(Gate::denies('specialist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //Use Data From Specialist Table
        $specialist = Specialist::orderBy('created_at', 'desc')->get();

        return view('pages.backsite.master-data.specialist.index', compact('specialist'));
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
    public function store(StoreSpecialistRequest $request)
    {
        //get all data from frontsite
        $data = $request->all();

         // re format before push to table
         $data['price'] = str_replace(',', '', $data['price']);
         $data['price'] = str_replace('IDR ', '', $data['price']);

        //store to database
        $specialist = Specialist::create($data);

        alert()->success('Success Message', 'Successfully Added New Specialist');
        return redirect()->route('backsite.specialist.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist)
    {
        //use Gate
        abort_if(Gate::denies('specialist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.master-data.specialist.show', compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialist $specialist)
    {
        //use Gate
        abort_if(Gate::denies('specialist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.master-data.specialist.edit', compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialistRequest $request, Specialist $specialist)
    {
         // get all request from frontsite
       $data = $request($data);

       $data['price'] = str_replace(',', '', $data['price']);
       $data['price'] = str_replace('IDR ', '', $data['price']);

       //update to database
       $specialist->update($data);

         alert()->success('Success Message', 'Successfully Added New Specialist');
         return redirect()->route('backsite.specialist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {
        //use Gate
        abort_if(Gate::denies('specialist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialist->delete();

        alert()->success('Success Message', 'Successfully deleted specialist');

        return back();
    }
}
