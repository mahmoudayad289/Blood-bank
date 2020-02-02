<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonationFormRequest;
use App\Models\DonationRequest;
use foo\bar;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = DonationRequest::orderBy('created_at','desc')->paginate(10);


        return view('donations.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonationFormRequest $request)
    {
        $request->validated();


        DonationRequest::create($request->all());

        flash('تمت العمليه بنجاح')->success();


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = DonationRequest::findOrFail($id);

        return view('donations.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonationFormRequest $request, $id)
    {
        $request->validated();

        $record = DonationRequest::findOrFail($id);

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
        $record = DonationRequest::findOrFail($id);

        $record->delete();


        flash('تمت العمليه بنجاح')->success();


        return back();


    }
}
