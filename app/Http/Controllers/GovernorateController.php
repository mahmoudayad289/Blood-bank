<?php

namespace App\Http\Controllers;

use App\Http\Requests\GovernoratFormRequest;
use App\Models\Governorat;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Governorat::paginate(15);

        return view('governorates.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('governorates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GovernoratFormRequest $request)
    {
         $request->validated();

        Governorat::create($request->all());


        flash('تمت العمليه بنجاح')->success();


        return  back();

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
        $model = Governorat::findOrFail($id);

            return view('governorates.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GovernoratFormRequest $request, $id)
    {

        $request->validated();

        $record  =  Governorat::findOrFail($id);

        $record->update($request->all());

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
      $record =   Governorat::findOrFail($id);

      $record->delete();

        flash('تمت العمليه بنجاح')->success();

        return back();
    }
}
