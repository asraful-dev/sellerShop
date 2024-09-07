<?php

namespace App\Http\Controllers\userpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Auth;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userpanel.user.transfer.create');
    }


    // user main/fund amount show  ajax //
    public function transferAjax($id){

        $current_user = Auth::user()->id;

        $package = User::where('id', $current_user)->first();
        return response()->json($package);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->package);
        $targetUser = User::where('username', $request->username)->first();
        // dd($targetUser);
        if($request->package == "fund_wallet")
        {
            if($request->package_amount > Auth::user()->fund_wallet)
            {
                $notification = array(
                    'message' => 'Please provide less amount form your wallet.',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
                
            }else{
                
                $targetUser->fund_wallet = $targetUser->fund_wallet + $request->package_amount;
                $targetUser->save();
                Auth::user()->fund_wallet = Auth::user()->fund_wallet - $request->package_amount;
                Auth::user()->save();
        
                $this->transaction(time(), $request->package_amount, 6, 4, Auth::user()->id, $targetUser->id);

                $notification = array(
                    'message' => 'You have successfully transfer your wallet.',
                    'alert-type' => 'success'
                );
                return back()->with($notification);
            }

        }
        else
        {
            
            if($request->package_amount > Auth::user()->main_wallet)
            {
                $notification = array(
                    'message' => 'Please provide less amount form your wallet.',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }else{
                $targetUser->main_wallet = $targetUser->main_wallet + $request->package_amount;
                $targetUser->save();
                Auth::user()->main_wallet = Auth::user()->main_wallet - $request->package_amount;
                Auth::user()->save();
        
                $this->transaction(time(), $request->package_amount, 6, 4, Auth::user()->id, $targetUser->id);

                $notification = array(
                    'message' => 'You have successfully transfer your wallet.',
                    'alert-type' => 'success'
                );

                return back()->with($notification);
            }
            
        }


    }


    // reusable function for tracking transaction history
    public function transaction($out, $amount, $purpose, $status, $from_id, $user_id)
    {

        Transaction::create([
            'user_id' => $user_id,
            'from_id' => $from_id,
            'out' =>  $out,
            'purpose' => $purpose,
            'status' => $status,
            'amount' => $amount,
        ]);

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

    // user transfer send history method // 
    public function send()
    {
        $current_user = Auth::User()->id;
        $transferHistories = Transaction::where('purpose',6)->where('from_id', $current_user)->orderBy('id', 'DESC')->get();
        // dd($transferHistories);
        return view('userpanel.user.transfer.send_history', compact('transferHistories'));
    }

    // user transfer recieve history method // 
    public function recieve()
    {
        $current_user = Auth::User()->id;
        $transferHistories = Transaction::where('purpose', 6)->where('user_id', $current_user)->orderBy('id', 'DESC')->get();
        return view('userpanel.user.transfer.recieve_history', compact('transferHistories'));
    }
    public function recieve_roi()
    {
        $current_user = Auth::User()->id;
        $transferHistories = Transaction::where('purpose', 9)->where('user_id', $current_user)->orderBy('id', 'DESC')->get();
        return view('userpanel.user.transfer.recieve_history', compact('transferHistories'));
    }
    public function resell_roi()
    {
        $current_user = Auth::User()->id;
        $transferHistories = Transaction::where('purpose', 10)->where('user_id', $current_user)->orderBy('id', 'DESC')->get();
        return view('userpanel.user.transfer.recieve_history', compact('transferHistories'));
    }
    public function purchase_roi()
    {
        $current_user = Auth::User()->id;
        $transferHistories = Transaction::where('purpose', 9)->where('user_id', $current_user)->orderBy('id', 'DESC')->get();
        return view('userpanel.user.transfer.recieve_history', compact('transferHistories'));
    }
}
