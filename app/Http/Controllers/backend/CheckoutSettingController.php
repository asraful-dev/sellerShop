<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChekoutSetting;
use Illuminate\Support\Facades\Session;

class CheckoutSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkout_setting = ChekoutSetting::latest()->get();
        return view('admin.checkout_setting.index',compact('checkout_setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.checkout_setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkout = new ChekoutSetting();
        $checkout->title = $request->title;
        $checkout->amount = $request->amount;
        $checkout->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title)));
        $checkout->status = $request->status;
        $checkout->save();

        $notification = array(
            'message' => 'Checkout Setting Created Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('checkout.setting.index')->with($notification);
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
        $checkout = ChekoutSetting::find($id);
        return view('admin.checkout_setting.edit',compact('checkout'));
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
        $checkout = ChekoutSetting::find($id);
        $checkout->title = $request->title;
        $checkout->amount = $request->amount;
        $checkout->status = $request->status;
        $checkout->save();

        $notification = array(
            'message' => 'Checkout Setting Updated Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('checkout.setting.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkout = ChekoutSetting::findOrFail($id);
        $checkout->delete();

        $notification = array(
            'message' => 'Chekout Setting Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id){
        $checkout = ChekoutSetting::find($id);
        $checkout->status = 1;
        $checkout->save();

        Session::flash('success','Chekout Setting Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $checkout = ChekoutSetting::find($id);
        $checkout->status = 0;
        $checkout->save();

        Session::flash('success','Chekout Setting Disabled Successfully.');
        return redirect()->back();
    }
}
