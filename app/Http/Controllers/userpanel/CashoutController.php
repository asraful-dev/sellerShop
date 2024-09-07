<?php

namespace App\Http\Controllers\userpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cashout;
use App\Models\Transaction;
use Auth;

class CashoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('userpanel.user.cashout.index');
    }
    
    // usd cashout request //
    public function usd()
    {
        return view('userpanel.user.cashout.usd_index');
    }

    // usd cashout request //
    public function bkash()
    {
        return view('userpanel.user.cashout.bkash_index');
    }

    // nagad cashout request //
    public function nagad()
    {
        return view('userpanel.user.cashout.nagad_index');
    }

    // rocket cashout request //
    public function rocket()
    {
        return view('userpanel.user.cashout.rocket_index');
    }


    // user income statement //
    public function IncomeStatement()
    {
        $current_user = Auth::user()->id;
        $totalincome = Transaction::where('user_id', $current_user)->latest()->get();
        return view('userpanel.user.cashout.income_statement', compact('totalincome'));
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

        $userAmount = Auth::user()->main_wallet;

        if($request->amount > 0){
            // cashout amount > useramount //
            if($request->amount > $userAmount)
            {
                $notification = array(
                    'message' => 'You have not enough credit to cashout !',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }else{
                // gateway usd  3 dolar added //
                if($request->gateway == "USD"){

                $usdAmount = $request->amount + 3;

                    $cashout = Cashout::create([
                        'user_id'         => Auth::user()->id,
                        'gateway'         => $request->gateway,
                        'targetWallet'    => $request->targetWallet,
                        'amount'          => $request->amount,
                        'number'          => $request->number,
                        'status'          => 1,
                    ]);

                    $user = Auth::user();
                    $wallet = $request->targetWallet;
                    
                    if($wallet == 'main_wallet')
                    {
                        $user->main_wallet = $user->main_wallet - $request->amount;
                        $user->save();
                    }else{
                        $user->refer_bonus = $user->refer_bonus - $request->amount;
                        $user->save();
                    }
                        
                    if($cashout)
                    {
                        $notification = array(
                            'message' => 'Cashout request successfully!',
                            'alert-type' => 'success'
                        );
                        return redirect()->route('user.cashout.report')->with($notification);
                    }

            }else{

                    $cashout = Cashout::create([
                        'user_id'         => Auth::user()->id,
                        'gateway'         => $request->gateway,
                        'targetWallet'    => $request->targetWallet,
                        'amount'          => $request->amount,
                        'number'          => $request->number,
                        'status'          => 1,
                    ]);

                    $user = Auth::user();
                    $wallet = $request->targetWallet;
                    
                    if($wallet == 'main_wallet')
                    {
                        $user->main_wallet = $user->main_wallet - $request->amount;
                        $user->save();
                    }else{
                        $user->refer_bonus = $user->refer_bonus - $request->amount;
                        $user->save();
                    }
                        
                    if($cashout)
                    {
                        $notification = array(
                            'message' => 'Cashout request successfully!',
                            'alert-type' => 'success'
                        );
                        return redirect()->route('user.cashout.report')->with($notification);
                    }
                }
            }
        }else{
            $notification = array(
                'message' => 'Please valid amount.',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

    }

    /* ============= user cashout report show ============ */
    public function report()
    {
        $cashout_reports = Cashout::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('userpanel.user.cashout.report_view', compact('cashout_reports'));
    }

    /* ============= user cashout report show ============ */
    public function acceptRequest()
    {
        $cashout_reports = Cashout::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('userpanel.user.cashout.report_view', compact('cashout_reports'));
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
