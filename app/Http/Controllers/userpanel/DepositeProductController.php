<?php

namespace App\Http\Controllers\userpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\DepositeProduct;
use App\Models\Package;
use App\Models\SoldPackage;
use Auth;
use App\Models\Transaction;
use App\Models\Generation;
use App\Models\User;
use App\Models\Commission;
use App\Models\Order;
use DB;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Notification;
use App\Notifications\ProductStockNotification;

class DepositeProductController extends Controller
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

    // bkash request //
    public function bkash()
    {
        return view('userpanel.user.deposite_product.bkash_index');
    }
 
     // nagad request //
    public function nagad()
    {
        return view('userpanel.user.deposite_product.nagad_index');
    }
 
    // rocket request //
    public function bank()
    {
        return view('userpanel.user.deposite_product.bank_index');
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
        $request->validate([
            'amount' => 'required',
            'screenshot' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $data = DepositeProduct::create([
            'user_id' => $request->user_id,
            'sender_number' => $request->sender_number,  
            'gateway' => $request->gateway,
            'amount' => $request->amount,
            'wallet_address' => $request->wallet_address,
            'transaction_id' => $request->transaction_id,
            'screenshot' => $request->screenshot,
            'bank_name' => $request->bank_name,
            'account_name' => $request->account_name,
            'branch_name' => $request->branch_name,
            'holder_name' => $request->holder_name,
        ]);

        if ($request->hasFile('screenshot')) {

            $screenshot  = $request->file('screenshot');
            $filename    = uniqid() . '.' . $screenshot->extension('screenshot');
            $location    = public_path('upload/screenshot');

            $screenshot->move($location, $filename);

            $data->screenshot = $filename;
            $data->save();
        }

        // return response()->json($data);

        /* ==================  start send notifications ================== */
        if ($data->user_id == \App\Models\User::where('role', 'admin')->first()->id) {
            $users = User::findMany([$data->user_id, $data->user_id]);
        }else {
            $users = User::findMany([$data->user_id, $data->user_id, \App\Models\User::where('role', 'admin')->first()->id]);
        }

        $monthly = Carbon::parse($data['created_at'])->addDays(30)->format('Y-m-d');
        
        $product_stock_notification = [
            'user_id' => $data->user_id,
            'amount' => $data->amount,
            'gateway' => $data->gateway,
            'created_at' => $data->created_at->addDays(30)->format('Y-m-d'),
        ];

        // $user = User::first();
        Notification::send($users, new ProductStockNotification($product_stock_notification));

        /* ==================  end send notifications ================== */

        if($data){
            $notification = array(
                'message' => 'DepositeProduct Request Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('user.deposite.request.list')->with($notification);
        }else{
            $notification = array(
                'message' => 'Something goes wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    // user balance request show //
    public function depositeList()
    {
        $current_user = Auth::user()->id;
        $depositeRequests = DepositeProduct::where('user_id', $current_user)->latest()->get();
        return view('userpanel.user.deposite_product.deposite_request_list', compact('depositeRequests'));
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
