<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cashout;

class AdminCashoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashouts = Cashout::latest()->get();
        return view('admin.cashout.report_view', compact('cashouts'));

    }

    /* ========== start admin approved request ========== */
    public function acceptRequest($id)
    {
        $cashout = Cashout::find($id);
        $cashout->status = 2;
        $approved = $cashout->save();

        if($approved){

            $notification = array(
                'message' => 'Request is Accepted !',
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }

    }
    /* ========== end admin approved request ========== */

    /* ========== start admin cancel request ========== */
    public function cancelRequest($id){
        $cashout = Cashout::find($id);
        $cashout->status = 3;

        $error = $cashout->save();

        if($error){
            $notification = array(
                'message' => 'Request is Cancel !',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
    }
    /* ========== end admin cancel request ========== */

    /* ========== Start admin cashoutAcceptList request ========== */
    public function cashoutAcceptList()
    {
        $acceptLists = Cashout::where('status', 2)->orderBy('id', 'desc')->get();
        return view('admin.cashout.accept_report_view', compact('acceptLists'));
    }
    /* ========== End admin cashoutAcceptList request ========== */

    /* ========== Start admin cashoutRejectList request ========== */
    public function cashoutRejectList()
    {
        $rejectLists = Cashout::where('status', 3)->orderBy('id', 'desc')->get();
        return view('admin.cashout.reject_report_view', compact('rejectLists'));
    }
    /* ========== End admin cashoutRejectList request ========== */



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
        //
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
