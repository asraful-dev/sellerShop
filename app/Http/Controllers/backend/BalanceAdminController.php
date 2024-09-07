<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BalanceRequest;
use App\Models\ApprovedBalanceRequest;
use App\Models\Config;
use App\Models\User;
use App\Models\NotificationBalanceRequest;
use App\Models\BalanceRequestNotify;
use App\Models\DeleteBalanceRequestNotify;
use Auth;

class BalanceAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $balanceRequests = BalanceRequest::Where('rejected_by', '=', NULL)
                                ->whereNull("approved_by")
                                ->orderBy('id', 'desc')
                                ->get();
                                // dd($balanceRequests);
        return view('admin.balance_request.index', compact('balanceRequests'));
    }

    /* ============== Balance Request Approved ============= */
    public function approved($id){

        $balanceRequest = BalanceRequest::where('id', $id)->first();
        // dd($balanceRequest);
        $approve = ApprovedBalanceRequest::create([
            'user_id' => $balanceRequest->user_id,
            'sender_number' => $balanceRequest->sender_number,
            'gateway' => $balanceRequest->gateway,
            'amount'  => $balanceRequest->amount,
            'wallet_address' => $balanceRequest->wallet_address,
            'trx_id' => $balanceRequest->transaction_id,
        ]);

        if($approve)
        {   
            $balanceRequest->update([
                'status' => 1,
                'approved_by' => Auth::user()->name,
            ]);

            $current_user = User::where('id', $balanceRequest->user_id)->first();
            
            if($balanceRequest->gateway == "USD"){
                $value = 115;
            }else{
                $value = 1;
            }

            $addAmount = $balanceRequest->amount * $value;
            $current_user->fund_wallet = $current_user->fund_wallet + $addAmount;
            $current_user->save();

            BalanceRequestNotify::create([
                'user_id' => $id,
                'sender_number' => $balanceRequest->sender_number,
                'amount' => $balanceRequest->amount,
                'wallet_address' => $balanceRequest->wallet_address,
                'trx_id' => $balanceRequest->transaction_id,
            ]);

            $notification = array(
                'message' => 'Request is Accepted !',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }

        $notification = array(
            'message' => 'Something went wrong !',
            'alert-type' => 'error'
        );
        return back()->with($notification);

    }

    /* ============== Balance Request Reject ============= */
    public function reject($id){

        $balanceRequest = BalanceRequest::where('id', $id)->first();
        $reject = DeleteBalanceRequestNotify::create([
            'user_id' => $id,
            'sender_number' => $balanceRequest->sender_number,
            'amount' => $balanceRequest->amount,
            'wallet_address' => $balanceRequest->wallet_address,
            'trx_id' => $balanceRequest->transaction_id,
        ]);
        if($reject){
            $balanceRequest->update([
                'status' => 2,
                'rejected_by' => Auth::user()->name,
            ]);

            $notification = array(
                'message' => 'Request is Rejected Successfully !',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Something went wrong !',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

    }

    /* ============== Wallet Index ============= */
    public function walletIndex()
    {
        $configData = Config::find(1);
        return view('admin.wallet.index', compact('configData'));
    }

    /* ============== Wallet Update ============= */
    public function walletUpdate(Request $request, $id){
        $configData = Config::find($id);
        $configData->usd_wallet = $request->usd_wallet;
        $configData->bkash_wallet = $request->bkash_wallet;
        $configData->nagad_wallet = $request->nagad_wallet;
        $configData->rocket_wallet = $request->rocket_wallet;
        $configData->update();

        $notification = array(
            'message' => 'Wallet Updated Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
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
    public function imageShow($id)
    {
        $imageShow = BalanceRequest::find($id);
        return view('admin.balance_request.show', compact('imageShow'));
    }

    /* =========== Start Admin  Approved Request ========= */
    public function adminAllApprovedRequest()
    {
        $approved_reports = ApprovedBalanceRequest::all();
        return view('admin.balance_request.approve_show_list', compact('approved_reports'));
    }
    /* =========== End Admin  Approved Request =========== */

    /* =========== Start Admin  Rejected Request ========= */
    public function adminAllRejectedRequest()
    {   
        $reject_reports = DeleteBalanceRequestNotify::all();
        return view('admin.balance_request.reject_show_list', compact('reject_reports'));
    }
    /* =========== End Admin  Rejected Request ========= */

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
