<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepositeProduct;
use App\Models\ApprovedDepositeRequest;
use App\Models\Config;
use App\Models\User;
use App\Models\DeleteDepositeRequestNotify;
use Auth;
use Carbon\Carbon;


class DepositeAdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $balanceRequests = DepositeProduct::Where('rejected_by', '=', NULL)
                                ->whereNull("approved_by")
                                ->orderBy('id', 'desc')
                                ->get();
                                // dd($balanceRequests);
        return view('admin.deposite_request.index', compact('balanceRequests'));
    }

    /* ============== Balance Request Approved ============= */
    public function approved($id){

        $balanceRequest = DepositeProduct::where('id', $id)->first();
        // dd($balanceRequest);
        $approve = ApprovedDepositeRequest::create([
            'user_id' => $balanceRequest->user_id,
            'sender_number' => $balanceRequest->sender_number,
            'gateway' => $balanceRequest->gateway,
            'amount'  => $balanceRequest->amount,
            'wallet_address' => $balanceRequest->wallet_address,
            'trx_id' => $balanceRequest->transaction_id,
            'bank_name' => $balanceRequest->bank_name,
            'account_name' => $balanceRequest->account_name,
            'branch_name' => $balanceRequest->branch_name,
            'holder_name' => $balanceRequest->holder_name,
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
            $current_user->deposite_amount = $current_user->deposite_amount + $addAmount;
            $current_user->save();

            // BalanceRequestNotify::create([
            //     'user_id' => $id,
            //     'sender_number' => $balanceRequest->sender_number,
            //     'amount' => $balanceRequest->amount,
            //     'wallet_address' => $balanceRequest->wallet_address,
            //     'trx_id' => $balanceRequest->transaction_id,
            // ]);

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

        $balanceRequest = DepositeProduct::where('id', $id)->first();
        $reject = DeleteDepositeRequestNotify::create([
            'user_id' => $id,
            'sender_number' => $balanceRequest->sender_number,
            'amount' => $balanceRequest->amount,
            'wallet_address' => $balanceRequest->wallet_address,
            'trx_id' => $balanceRequest->transaction_id,
            'bank_name' => $balanceRequest->bank_name,
            'account_name' => $balanceRequest->account_name,
            'branch_name' => $balanceRequest->branch_name,
            'holder_name' => $balanceRequest->holder_name,
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deposite_product = DepositeProduct::where('status',0)->latest()->get();
        // dd($deposite_product);
        return view('admin.deposite_request.create', compact('deposite_product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        // dd($id);
        $deposite_product = DepositeProduct::where('id', $id)->first();
        // dd($deposite_product);

        $monthly = Carbon::parse($deposite_product['created_at'])->addDays(30)->format('Y-m-d');
        // $monthly = Carbon::parse($deposite_product['created_at'])->format('Y-m-d');
        // dd($monthly);

        /* ======================= Start Commission User ======================= */
        $amount = $deposite_product->amount;
        $user = User::where('id', $deposite_product->user_id)->first();
        // dd($user);

        /* ================ before 30 Days Commission User Stock bonus  ================ */
        if($monthly == date('Y-m-d', time())){
            // return 'ok';
            /* ============== All Deposite Taka Commission User Check  ============== */ 
            if($amount == 10000){
                $commission = $amount / 100 * 3;
                $user->stock_deposite_bonus = $user->stock_deposite_bonus + $commission;
                $user->save();
            }elseif($amount == 25000){
                $commission = $amount / 100 * 3;
                $user->stock_deposite_bonus = $user->stock_deposite_bonus + $commission;
                $user->save();
            }elseif($amount == 50000){
                $commission = $amount / 100 * 3.5;
                $user->stock_deposite_bonus = $user->stock_deposite_bonus + $commission;
                $user->save();
            }elseif($amount == 1000000){
                $commission = $amount / 100 * 4;
                $user->stock_deposite_bonus = $user->stock_deposite_bonus + $commission;
                $user->save();
            }elseif($amount == 1500000){
                $commission = $amount / 100 * 4.5;
                $user->stock_deposite_bonus = $user->stock_deposite_bonus + $commission;
                $user->save();
            }elseif($amount == 2000000){
                $commission = $amount / 100 * 5;
                $user->stock_deposite_bonus = $user->stock_deposite_bonus + $commission;
                $user->save();
            }elseif($amount == 5000000){
                // return 'ok';
                $commission = $amount / 100 * 5.5;
                $user->stock_deposite_bonus = $user->stock_deposite_bonus + $commission;
                $user->save();
            }
            /* ============== All Deposite Taka  Commission User Check  ============== */

            // $deposite_product->update([
            //     'status' => 5,
            // ]);

        }else{
            $notification = array(
                'message' => 'Deposite amount before 30days user stock commisson added!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        $notification = array(
            'message' => 'User Product Stock Commission Added Successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);

        /* ======================= End Commission User ========================= */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageShow($id)
    {
        $imageShow = DepositeProduct::find($id);
        return view('admin.deposite_request.show', compact('imageShow'));
    }

    /* =========== Start Admin  Approved Request ========= */
    public function adminAllApprovedRequest()
    {
        $approved_reports = ApprovedDepositeRequest::all();
        return view('admin.deposite_request.approve_show_list', compact('approved_reports'));
    }
    /* =========== End Admin  Approved Request =========== */

    /* =========== Start Admin  Rejected Request ========= */
    public function adminAllRejectedRequest()
    {   
        $reject_reports = DeleteDepositeRequestNotify::all();
        return view('admin.deposite_request.reject_show_list', compact('reject_reports'));
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
