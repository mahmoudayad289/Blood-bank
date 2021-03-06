<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = User::paginate(10);


        return view('users.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $request->validated();

        $request->merge(['password' => bcrypt($request->password)]);



        $record =   User::create($request->all());

        $record->roles()->attach($request->role_list);

        flash('تمت العمليه بنجاح')->success();

        return redirect(route('users.index'));
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::findOrFail($id);

        return view('users.edit', compact('model'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $record = User::findOrFail($id);


        $record->update($request->all());

        $record->roles()->sync($request->role_list);

        flash('تمت العمليه بنجاح')->success();

        return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = User::findOrFail($id);

        $record->delete();

        flash('تمت العمليه بنجاح')->success();

        return redirect(route('users.index'));

    }

    public function changePass()
    {
        return view('users.changepass');

    }

    public function changePassSave(Request $request)
    {
        $request->validate([
            'old-password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user();

        if (Hash::check($request->input('old-password'), $user->password)) {

            $user->password = bcrypt($request->password);

            $user->save();


            flash('تمت العمليه بنجاح')->success();

            return redirect(route('users.index'));

        } {

        flash('خطا في البيانات')->success();

    }

    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
        return redirect('/login');
    }
}
