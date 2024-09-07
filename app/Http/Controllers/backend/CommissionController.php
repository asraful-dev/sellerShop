<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commission;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commission = Commission::find(1);
        return view('admin.commission.index',compact('commission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        // dd($request->all());
        $request->validate([
            'refer1' => 'required',
            'refer2' => 'required',
            'refer3' => 'required',
            'refer4' => 'required',
            'refer5' => 'required',
            'refer6' => 'required',
            'refer7' => 'required',
            'refer8' => 'required',
            'refer9' => 'required',
            'refer10' => 'required',
            'refer11' => 'required',
            'refer12' => 'required',
            'refer13' => 'required',
            'refer14' => 'required',
            'refer15' => 'required',
            'refer16' => 'required',
            'refer17' => 'required',
            'refer18' => 'required',
            'refer19' => 'required',
            'refer20' => 'required',
        ]);

        $data = Commission::find($id);
        $data->update([
            'refer1' => $request->refer1,
            'refer2' => $request->refer2,
            'refer3' => $request->refer3,
            'refer4' => $request->refer4,
            'refer5' => $request->refer5,
            'refer6' => $request->refer6,
            'refer7' => $request->refer7,
            'refer8' => $request->refer8,
            'refer9' => $request->refer9,
            'refer10' => $request->refer10,
            'refer11' => $request->refer11,
            'refer12' => $request->refer12,
            'refer13' => $request->refer13,
            'refer14' => $request->refer14,
            'refer15' => $request->refer15,
            'refer16' => $request->refer16,
            'refer17' => $request->refer17,
            'refer18' => $request->refer17,
            'refer19' => $request->refer18,
            'refer20' => $request->refer19,
            'refer20' => $request->refer20,
        ]);

        $notification = array(
            'message' => 'Commission Updated Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
