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


class AdminRankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ranks = User::where('role','user')
        ->orderBy('id','ASC')->latest()->get();
        // dd($deposite_product);
        return view('admin.rank.create', compact('ranks'));
    }
    public function smart_create()
    {
        $ranks = User::where('role','user')->orderBy('id','ASC')->latest()->get();
        // dd($deposite_product);
        return view('admin.rank.smart_create', compact('ranks'));
    }
    public function ambassador_create()
    {
        $ranks = User::where('role','user')->orderBy('id','ASC')->latest()->get();
        // dd($deposite_product);
        return view('admin.rank.ambassador_create', compact('ranks'));
    }
    public function brand_create()
    {
        $ranks = User::where('role','user')->orderBy('id','ASC')->latest()->get();
        // dd($deposite_product);
        return view('admin.rank.brand_create', compact('ranks'));
    }
    public function crown_create()
    {
        $ranks = User::where('role','user')->orderBy('id','ASC')->latest()->get();
        // dd($deposite_product);
        return view('admin.rank.crown_create', compact('ranks'));
    }
    public function executive_create()
    {
        $ranks = User::where('role','user')->orderBy('id','ASC')->latest()->get();
        // dd($deposite_product);
        return view('admin.rank.executive_create', compact('ranks'));
    }

    public function smart_store(Request $request)
    {
        $users = User::where('role','user')->where('smart_seller_status',1)->latest()->get();
        $total_amount = $request->amount;
        foreach($users as $user){
            $rank_commission = $total_amount * 1;
            // dd($rank_commission);
            /* ===================== start monthly check condition ================= */
            $lastDayofMonth = \Carbon\Carbon::now()->endOfMonth()->toDateString();
            // $lastDayofMonth = \Carbon\Carbon::now()->toDateString();
            // dd($lastDayofMonth);
            if($lastDayofMonth != \Carbon\Carbon::now()->toDateString()){
                $notification = array(
                    'message' => 'You can smart commission only last day of the month !',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }else{
                $user->smart_seller_amount = $user->smart_seller_amount + $rank_commission;
                $user->save();
            }
            /* ===================== end monthly check condition ================= */
        }

        $notification = array(
            'message' => 'Rank  Smart Commission Added Successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function ambassador_store(Request $request)
    {
        $users = User::where('role','user')->where('smart_seller_status',2)->latest()->get();
        $total_amount = $request->amount;
        foreach($users as $user){
            $rank_commission = $total_amount / 100 * 10;
            // dd($rank_commission);

            /* ===================== start monthly check condition ================= */
            $lastDayofMonth = \Carbon\Carbon::now()->endOfMonth()->toDateString();
            // $lastDayofMonth = \Carbon\Carbon::now()->toDateString();
            // dd($lastDayofMonth);
            if($lastDayofMonth != \Carbon\Carbon::now()->toDateString()){
                $notification = array(
                    'message' => 'You can smart commission only last day of the month !',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }else{
                $user->smart_seller_amount = $user->smart_seller_amount + $rank_commission;
                $user->save();
            }
            /* ===================== end monthly check condition ================= */
        }

        $notification = array(
            'message' => 'Rank  Ambassador Commission Added Successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function brand_store(Request $request)
    {
        $users = User::where('role','user')->where('smart_seller_status',3)->latest()->get();
        $total_amount = $request->amount;
        foreach($users as $user){
            $rank_commission = $total_amount / 100 * 8;
            // dd($rank_commission);
            /* ===================== start monthly check condition ================= */
            $lastDayofMonth = \Carbon\Carbon::now()->endOfMonth()->toDateString();
            // $lastDayofMonth = \Carbon\Carbon::now()->toDateString();
            // dd($lastDayofMonth);
            if($lastDayofMonth != \Carbon\Carbon::now()->toDateString()){
                $notification = array(
                    'message' => 'You can smart commission only last day of the month !',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }else{
                $user->smart_seller_amount = $user->smart_seller_amount + $rank_commission;
                $user->save();
            }
            /* ===================== end monthly check condition ================= */
        }

        $notification = array(
            'message' => 'Rank  Brand Commission Added Successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function crown_store(Request $request)
    {
        $users = User::where('role','user')->where('smart_seller_status',4)->latest()->get();
        $total_amount = $request->amount;
        foreach($users as $user){
            $rank_commission = $total_amount / 100 * 5;
            // dd($rank_commission);
            /* ===================== start monthly check condition ================= */
            $lastDayofMonth = \Carbon\Carbon::now()->endOfMonth()->toDateString();
            // $lastDayofMonth = \Carbon\Carbon::now()->toDateString();
            // dd($lastDayofMonth);
            if($lastDayofMonth != \Carbon\Carbon::now()->toDateString()){
                $notification = array(
                    'message' => 'You can smart commission only last day of the month !',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }else{
                $user->smart_seller_amount = $user->smart_seller_amount + $rank_commission;
                $user->save();
            }
            /* ===================== end monthly check condition ================= */
        }

        $notification = array(
            'message' => 'Rank  Crown Commission Added Successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function executive_store(Request $request)
    {
        $users = User::where('role','user')->where('smart_seller_status',5)->latest()->get();
        $total_amount = $request->amount;
        foreach($users as $user){
            $rank_commission = $total_amount / 100 * 5;
            // dd($rank_commission);
            /* ===================== start monthly check condition ================= */
            $lastDayofMonth = \Carbon\Carbon::now()->endOfMonth()->toDateString();
            // $lastDayofMonth = \Carbon\Carbon::now()->toDateString();
            // dd($lastDayofMonth);
            if($lastDayofMonth != \Carbon\Carbon::now()->toDateString()){
                $notification = array(
                    'message' => 'You can smart commission only last day of the month !',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }else{
                $user->smart_seller_amount = $user->smart_seller_amount + $rank_commission;
                $user->save();
            }
            /* ===================== end monthly check condition ================= */
        }

        $notification = array(
            'message' => 'Rank  Executive Commission Added Successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $rank_user= User::where('id', $id)->first();
        // dd($rank);
        $total_amount = 100000;

        if($rank_user->smart_seller_status == 2){
            $rank_commission = $total_amount / 100 * 10;
            // dd($rank_commission);
            $rank_user->smart_seller_amount = $rank_user->smart_seller_amount + $rank_commission;
            $rank_user->save();
            
        }elseif($rank_user->smart_seller_status == 3){
            $rank_commission = $total_amount / 100 * 8;
            $rank_user->smart_seller_amount = $rank_user->smart_seller_amount + $rank_commission;
            $rank_user->save();
            // dd($rank_commission);
        }elseif($rank_user->smart_seller_status == 4){
            $rank_commission = $total_amount / 100 * 5;
            $rank_user->smart_seller_amount = $rank_user->smart_seller_amount + $rank_commission;
            $rank_user->save();
            // dd($rank_commission);
        }elseif($rank_user->smart_seller_status == 5){
            $rank_commission = $total_amount / 100 * 5;
            $rank_user->smart_seller_amount = $rank_user->smart_seller_amount + $rank_commission;
            $rank_user->save();
            // dd($rank_commission);
        }

        $notification = array(
            'message' => 'Rank Commission Added Successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);


        // $monthly = Carbon::parse($deposite_product['created_at'])->addDays(30)->format('Y-m-d');
        // $monthly = Carbon::parse($deposite_product['created_at'])->format('Y-m-d');
        // dd($monthly);

        /* ======================= Start Commission User ======================= */
        // $amount = $deposite_product->amount;
        // $user = User::where('id', $deposite_product->user_id)->first();
        // // dd($user);

        // /* ================ before 30 Days Commission User Stock bonus  ================ */
        // if($monthly == date('Y-m-d', time())){
        //     // return 'ok';
        //     /* ============== All Deposite Taka Commission User Check  ============== */ 
        //     if($amount == 10000){
        //         $commission = $amount / 100 * 3;
        //         $user->stock_deposite_bonus = $user->stock_deposite_bonus + $commission;
        //         $user->save();
        //     }elseif($amount == 25000){
        //         $commission = $amount / 100 * 3;
        //         $user->stock_deposite_bonus = $user->stock_deposite_bonus + $commission;
        //         $user->save();
        //     }elseif($amount == 50000){
        //         $commission = $amount / 100 * 3.5;
        //         $user->stock_deposite_bonus = $user->stock_deposite_bonus + $commission;
        //         $user->save();
        //     }elseif($amount == 1000000){
        //         $commission = $amount / 100 * 4;
        //         $user->stock_deposite_bonus = $user->stock_deposite_bonus + $commission;
        //         $user->save();
        //     }elseif($amount == 1500000){
        //         $commission = $amount / 100 * 4.5;
        //         $user->stock_deposite_bonus = $user->stock_deposite_bonus + $commission;
        //         $user->save();
        //     }elseif($amount == 2000000){
        //         $commission = $amount / 100 * 5;
        //         $user->stock_deposite_bonus = $user->stock_deposite_bonus + $commission;
        //         $user->save();
        //     }elseif($amount == 5000000){
        //         // return 'ok';
        //         $commission = $amount / 100 * 5.5;
        //         $user->stock_deposite_bonus = $user->stock_deposite_bonus + $commission;
        //         $user->save();
        //     }
            /* ============== All Deposite Taka  Commission User Check  ============== */

            // $deposite_product->update([
            //     'status' => 5,
            // ]);

        // }else{
        //     $notification = array(
        //         'message' => 'Deposite amount before 30days user stock commisson added!',
        //         'alert-type' => 'error'
        //     );
        //     return back()->with($notification);
        // }

        // $notification = array(
        //     'message' => 'User Product Stock Commission Added Successfully.',
        //     'alert-type' => 'success'
        // );

        // return back()->with($notification);

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
