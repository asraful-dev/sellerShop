<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CheckoutNotice;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CheckoutNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkouts = CheckoutNotice::latest()->get();
        return view('admin.checkoutnotice.index',compact('checkouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.checkoutnotice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    
        $checkout = new CheckoutNotice();
        $checkout->title = $request->title;
        $checkout->description = $request->description;
        $checkout->status = $request->status;
        $checkout->save();

        $notification = array(
            'message' => 'Checkout Notices Created Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('checkoutnotice.index')->with($notification);
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
        $checkout = CheckoutNotice::find($id);
        return view('admin.checkoutnotice.edit',compact('checkout'));
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
        $checkout = CheckoutNotice::find($id);
        $checkout->title = $request->title;
        $checkout->description = $request->description;
        $checkout->status = $request->status;
        $checkout->save();

        $notification = array(
            'message' => 'Checkout Notices Updated Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('checkoutnotice.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkout = CheckoutNotice::findOrFail($id);
        $checkout->delete();

        $notification = array(
            'message' => 'Checkout Notice Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id){
        $checkout = CheckoutNotice::find($id);
        $checkout->status = 1;
        $checkout->save();

        Session::flash('success','Checkout Notice Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $checkout = CheckoutNotice::find($id);
        $checkout->status = 0;
        $checkout->save();

        Session::flash('success','Checkout Notice Disabled Successfully.');
        return redirect()->back();
    }
}
