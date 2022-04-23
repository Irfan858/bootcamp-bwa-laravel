<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

//Use Library Here
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

//Use Request
use App\Http\Request\User\StoreUserRequest;
use App\Http\Request\User\UpdateUserRequest;

//Use Everything
use Gate;
use Auth;

//Use Model Here
use App\Models\User;
use App\Models\ManagementAccess\DetailUser;
use App\Models\ManagemenetAccess\Permission;
use App\Models\ManagementAccess\Role;
use App\Models\MasterData\TypeUser;

//third party



class UserController extends Controller
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
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::orderBy('created_at','desc')->get();
        $type_user = TypeUser::orderBy('name', 'asc')->get();
        $role = Role::all()->pluck('title', 'id');

        return view('pages.backsite.management-access.user.index', compact('user', 'type_user', 'role'));
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
    public function store(StoreUserRequest $request_user, Request $request)
    {
        //get All Request From Frontsite
        $data = $request_user->all();

        //Hash Password
        $data['password'] = Hash::make($data['password']);

        //Store to Database
        $user = User::create($data);

        //Sync Role By Users Select
        $user->role()->sync($request_user->input('role', []));

        //Save to detail user, to set type user
        $detail_user = new DetailUser;
        $detail_user->user_id = $user['id'];
        $detail_user->type_user_id = $request['type_user_id'];
        $detaul_user->save();

        alert()->success('Success Message', 'Successfully added new user');
        return redirect()->route('backsite.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //use Gate
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('role');

        return view('pages.backsite.management-access.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //use Gate
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('role');
        $type_user = TypeUser::orderBy('name', 'asc')->get();
        $role = Role::all()->pluck('title', 'id');

        return view('pages.backsite.management-access.user.edit', compact('user', 'type_user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request_user, Request $request, User $user)
    {
        //get all request from frontsite
        $data = $request_user->all();

        //update to database
        $user->update($data);

        //update role
        $user->role()->sync($request_user->input('role', []));

        //Save to detail user, to set type user
        $detail_user = DetailUser::find($user['id']);
        $detail_user->type_user_id = $request['type_user_id'];
        $detail_user->save();

        alert()->success('Success Message','Successfully updated user');
        return redirect()->route('backsite.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //use Gate
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->forceDelete();

        alert()->success('Success Message', 'Successfully deleted user');
        return back();
    }
}
