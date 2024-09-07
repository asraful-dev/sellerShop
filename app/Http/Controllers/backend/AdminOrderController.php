<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\Commission;
use App\Models\Transaction;
use App\Models\Generation;
use App\Models\Product;
use PDF;
use Auth;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = $request->date;
        $delivery_status = null;
        $payment_status = null;

        //dd($request);

        if($request->delivery_status != null && $request->payment_status != null && $date != null){

            $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('delivery_status', $request->delivery_status)->where('payment_status', $request->payment_status)->where('type',1);

            $delivery_status = $request->delivery_status;
            $payment_status = $request->payment_status;

        }else if($request->delivery_status == null && $request->payment_status == null && $date == null){
            $orders = Order::orderBy('id', 'desc')->where('type',1);
        }else{
            if($request->delivery_status == null){
                if($request->payment_status != null && $date != null){
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('payment_status', $request->payment_status)->where('type',1);
                    $payment_status = $request->payment_status;
                }else if($request->payment_status == null && $date != null){
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('type',1);
                }else{
                    $orders = Order::where('payment_status', $request->payment_status)->where('type',1);
                    $payment_status = $request->payment_status;
                }
            }else if($request->payment_status == null){
                if($request->delivery_status != null && $date != null){
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('delivery_status', $request->delivery_status)->where('type',1);
                    $delivery_status = $request->delivery_status;
                }else if($request->delivery_status == null && $date != null){
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('type',1);
                }else{
                    $orders = Order::where('delivery_status', $request->delivery_status)->where('type',1);
                    $delivery_status = $request->delivery_status;
                }
            }else if($request->date == null){
                if($request->delivery_status != null && $request->payment_status != null){
                    $orders = Order::where('delivery_status', $request->delivery_status)->where('payment_status', $request->payment_status)->where('type',1);
                    $delivery_status = $request->delivery_status;
                    $payment_status = $request->payment_status;
                }else if($request->delivery_status == null && $request->payment_status != null){
                    $orders = Order::where('payment_status', $request->payment_status)->where('type',1);
                    $payment_status = $request->payment_status;
                }else{
                    $orders = Order::where('delivery_status', $request->delivery_status)->where('type',1);
                    $delivery_status = $request->delivery_status;
                }
            }
        }

        $orders = $orders->paginate(500);
        return view('admin.sales.all_orders.index', compact('orders', 'delivery_status', 'date','payment_status'));
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
        $order = Order::findOrFail($id);
        return view('admin.sales.all_orders.show', compact('order'));
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
        $order = Order::findOrFail($id);

        $order->division_id = $request->division_id;
        $order->district_id = $request->district_id;
        $order->upazilla_id = $request->upazilla_id;
        $order->union_id    = $request->union_id;
        $order->payment_method = $request->payment_method;

        OrderDetail::where('id', $id)->update([
            'shipping_cost' => $request->shipping_cost,
            'shipping_type' => $request->shipping_type
        ]);

        $order->save();

        $notification = array(
            'message' => "Admin Orders Information Updated Successfully.!",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        $notification = array(
            'message' => 'Order Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    /*================= Start update_payment_status Methoed ================*/
    public function update_payment_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);

        $order->payment_status = $request->status;
        $order->save();

        // dd($order);

        return response()->json(['success'=> 'Payment status has been updated']);

    }

    // refer commission systeam //
    public function referCommission($refer_id, $amount,$user_id){

        $data = Commission::where('id', 1)->first();
        
        // 1st refer
        // $refer_id = Auth::user()->refer_by;
        // dd($refer_id);
        $refer1_commission = $amount / 100 * 15;
        // dd($refer1_commission);
        $user1 = User::where('id', $refer_id)->first();
        // dd($user1);

        // start point check minimum 10 point added your point not commission added //
        $current_user = Auth::user()->id;
        // $user = User::where('id', $current_user)->first();
    

        if($user1 != NULL){
            $user1->main_wallet = $user1->main_wallet + $refer1_commission;
            $user1->roc_resell = $user1->roc_resell + $refer1_commission;
            $user1->save();
    
            $this->transaction(time(), $refer1_commission, 2, 2, $user_id, $refer_id);
    
            $this->generation($user_id, $refer_id, 2, time(), 1, $refer1_commission, $amount);
        }else{
            return back();
        }
       

        // 2nd refer
        $refer2_id = User::where('id', $user1->id)->first()->refer_by;
        // dd($refer2_id);
        if($refer2_id != NULL){
            $refer2_commission = $amount / 100 * 10;
            // dd($refer2_commission);
            $user2 = User::where('id', $refer2_id)->first();
            // $user2->refer_bonus = $user2->refer_bonus + $refer2_commission;
            $user2->main_wallet = $user2->main_wallet + $refer2_commission;
            $user2->roc_resell = $user2->roc_resell + $refer2_commission;
            $user2->save();
    
            $this->transaction(time(), $refer2_commission, 2, 2, $user_id, $refer2_id);
    
            $this->generation($user_id, $refer2_id, 2, time(), 2, $refer2_commission, $amount);
        }else{
          return back();
        }

        
        // 3rd refer
        $refer3_id = User::where('id', $user2->id)->first()->refer_by;
        if($refer3_id != NULL){
            $refer3_commission = $amount / 100 * 8;
            $user3 = User::where('id', $refer3_id)->first();
            $user3->main_wallet = $user3->main_wallet + $refer3_commission;
            $user3->roc_resell = $user3->roc_resell + $refer3_commission;
            $user3->save();

            $this->transaction(time(), $refer3_commission, 2, 2, $user_id, $refer3_id);

            $this->generation($user_id, $refer3_id, 2, time(), 3, $refer3_commission, $amount);
        }else{
            return back();
         }

        // 4th refer
        $refer4_id = User::where('id', $user3->id)->first()->refer_by;
        if($refer4_id != NULL){
            $refer4_commission = $amount / 100 * 5;
            $user4 = User::where('id', $refer4_id)->first();
            $user4->main_wallet = $user4->main_wallet + $refer4_commission;
            $user4->roc_resell = $user4->roc_resell + $refer4_commission;
            $user4->save();

            $this->transaction(time(), $refer4_commission, 2, 2, $user_id, $refer4_id);

            $this->generation($user_id, $refer4_id, 2, time(), 4, $refer4_commission, $amount);
        }else{
            return back();
         }

        // 5th refer
        $refer5_id = User::where('id', $user4->id)->first()->refer_by;
        if($refer5_id != NULL){
            $refer5_commission = $amount / 100 * 4;
            $user5 = User::where('id', $refer5_id)->first();
            $user5->refer_bonus = $user5->refer_bonus + $refer5_commission;
            $user5->main_wallet = $user5->main_wallet + $refer5_commission;
            $user5->roc_resell = $user5->roc_resell + $refer5_commission;
            $user5->save();

            $this->transaction(time(), $refer5_commission, 2, 2, $user_id, $refer5_id);

            $this->generation($user_id, $refer5_id, 2, time(), 5, $refer5_commission, $amount);
        }else{
            return back();
        }

        // 6th refer
        $refer6_id = User::where('id', $user5->id)->first()->refer_by;
        if($refer6_id != NULL){
            $refer6_commission = $amount / 100 * 3;
            $user6 = User::where('id', $refer6_id)->first();
            $user6->refer_bonus = $user6->refer_bonus + $refer6_commission;
            $user6->main_wallet = $user6->main_wallet + $refer6_commission;
            $user6->roc_resell = $user6->roc_resell + $refer6_commission;
            $user6->save();

            $this->transaction(time(), $refer6_commission, 2, 2, $user_id, $refer6_id);

            $this->generation($user_id, $refer6_id, 2, time(), 6, $refer6_commission, $amount);
        }else{
            return back();
        }

         // 7th refer
         $refer7_id = User::where('id', $user6->id)->first()->refer_by;
         if($refer7_id != NULL){
             $refer7_commission = $amount / 100 * 2;
             $user7 = User::where('id', $refer7_id)->first();
             $user7->main_wallet = $user7->main_wallet + $refer7_commission;
             $user7->roc_resell = $user7->roc_resell + $refer7_commission;
             $user7->save();
 
             $this->transaction(time(), $refer7_commission, 2, 2, $user_id, $refer7_id);
 
             $this->generation($user_id, $refer7_id, 2, time(), 7, $refer7_commission, $amount);
         }else{
             return back();
          }
 
         // 8th refer
         $refer8_id = User::where('id', $user7->id)->first()->refer_by;
         if($refer8_id != NULL){
             $refer8_commission = $amount / 100 * 1;
             $user8 = User::where('id', $refer8_id)->first();
             $user8->main_wallet = $user8->main_wallet + $refer8_commission;
             $user8->roc_resell = $user8->roc_resell + $refer8_commission;
             $user8->save();
 
             $this->transaction(time(), $refer8_commission, 2, 2, $user_id, $refer8_id);
 
             $this->generation($user_id, $refer8_id, 2, time(), 8, $refer8_commission, $amount);
         }else{
             return back();
          }
 
         // 9th refer
         $refer9_id = User::where('id', $user8->id)->first()->refer_by;
         if($refer9_id != NULL){
             $refer9_commission = $amount / 100 * 1;
             $user9 = User::where('id', $refer9_id)->first();
             $user9->main_wallet = $user9->main_wallet + $refer9_commission;
             $user9->roc_resell = $user9->roc_resell + $refer9_commission;
             $user9->save();
 
             $this->transaction(time(), $refer9_commission, 2, 2, $user_id, $refer9_id);
 
             $this->generation($user_id, $refer9_id, 2, time(), 9, $refer9_commission, $amount);
        }else{
            return back();
        }
 
        // 10th refer
        $refer10_id = User::where('id', $user9->id)->first()->refer_by;
        if($refer10_id != NULL){
            $refer10_commission = $amount / 100 * 1;
            $user10 = User::where('id', $refer10_id)->first();
            $user10->main_wallet = $user10->main_wallet + $refer10_commission;
            $user10->roc_resell = $user10->roc_resell + $refer10_commission;
            $user10->save();
 
            $this->transaction(time(), $refer10_commission, 2, 2, $user_id, $refer10_id);
 
            $this->generation($user_id, $refer10_id, 2, time(), 10, $refer10_commission, $amount);
        }else{
             return back();
         }

        
    }

    /*================= Start update_delivery_status Methoed ================*/
    public function update_delivery_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->delivery_status = $request->status;

        $delivery_status = $order->delivery_status;
        // dd($delivery_status);
        if($delivery_status == 'delivered'){

            $user = User::where('id', $order->user_id)->first();
            if($user->role == 'user'){
                // dd($user);
                $refer_id = $user->refer_by;
                $user_id = $user->id;
                

                /* ========= product order id check ========= */
                $product = Product::where('id', $order->product_id)->first();
                $wholesell_price = $product->wholesell_price;
                $regular_price = $product->regular_price;

                $main_amount = $regular_price - $wholesell_price;
                $profit = $main_amount-$product->discount_price;
                
                // dd($profit); 
                // $amount = $order->grand_total;
                // dd($amount);
                $define_amount = $profit / 2;
                // dd($define_amount);

                $user->main_wallet = $user->main_wallet + $define_amount;
                $user->roc_resell = $user->roc_resell + $define_amount;
                $user->save();

                // return 'hi';

                // $admin =  User::where('role', 'admin')->first();
                // $amount = $amount / 100 * 50;
                // $admin->main_wallet = $admin->main_wallet + $amount;
                // $admin->save();
                $user = User::where('id', $refer_id)->first();
                $refer_id = $user->refer_by;
                $this->referCommission($refer_id, $define_amount,$user_id);
            }

            $user = User::where('id', $order->user_id)->first();
            if($user->role == 'agent'){
                /* ============== Start Agent Commission Define ============= */
                // dd($user);
                $total_amount = $order->grand_total;
                $point_cal_total = $total_amount / 100 * 5;
                $user->agent_commission = $user->agent_commission + $point_cal_total;
                $user->save();
                /* ============== End Agent Commission Define ============= */

                /* ============== Start Agent Refer  Commission Define ============= */
                $user = User::where('id', $order->user_id)->where('role','agent')->first();
                $refer_id = $user->refer_by;
                // dd($refer_id);
                $total_amount = $order->grand_total;
                $customer_total_amount = $total_amount / 100 * 2;
                $user = User::where('id', $refer_id)->first();
                $user->agent_refer_commission = $user->agent_refer_commission + $customer_total_amount;
                $user->save();
                /* ============== End Agent Refer  Commission Define ============= */
            }

        }


        $order->save();

        return response()->json(['success'=> 'Delivery status has been updated']);

    }

    /* ============= Start invoice_download Method ============== */
    public function invoice_download($id){
        $order = Order::findOrFail($id);

        $pdf = PDF::loadView('admin.invoices.invoice',compact('order'))->setPaper('a4')->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    } // end method
    /* ============= End invoice_download Method ============== */

    /* ============= Start invoice_download Method ============== */
    public function invoice_show($id){
        $order = Order::findOrFail($id);
        return view('admin.invoices.invoice_show',compact('order'));


    } // end method
    /* ============= End invoice_download Method ============== */

    /* ============= Start getdivision Method ============== */
    public function getdivision($division_id){
    $division = District::where('division_id', $division_id)->orderBy('name_en','ASC')->get();

        return json_encode($division);
    }
    /* ============= End getdivision Method ============== */

    /* ============= Start getupazilla Method ============== */
    public function getupazilla($district_id){
        $upazilla = Upazila::where('district_id', $district_id)->orderBy('name_en','ASC')->get();

        return json_encode($upazilla);
    }
    /* ============= End getupazilla Method ============== */

    /* ============= Start getunion Method ============== */
    public function getunion($upazilla_id){
        $union = Union::where('upazilla_id', $upazilla_id)->orderBy('name_en','ASC')->get();

        return json_encode($union);
    }
    /* ============= End getunion Method ============== */

    /* ============= Start ReturnRequest Method ============== */
    public function ReturnRequest(){

        $orders = Order::where('return_order',1)->orderBy('id','DESC')->get();
        return view('admin.return_order.return_request',compact('orders'));

    } // End Method
    /* ============= End ReturnRequest Method ============== */

    /* ============= Start ReturnRequestApproved Method ============== */
    public function ReturnRequestApproved($order_id){

        Order::where('id',$order_id)->update(['return_order' => 2]);

        $notification = array(
            'message' => 'Return Order Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method
    /* ============= End ReturnRequestApproved Method ============== */

    /* ============= Start CompleteReturnRequest Method ============== */
    public function CompleteReturnRequest(){

        $orders = Order::where('return_order',2)->orderBy('id','DESC')->get();
        return view('admin.return_order.complete_return_request',compact('orders'));

    } // End Method
    /* ============= End CompleteReturnRequest Method ============== */

    // reusable function for tracking transaction history
    // transaction stroe data //
    public function transaction($out, $amount, $purpose, $status, $from_id, $user_id){

        Transaction::create([
            'user_id' => $user_id,
            'from_id' => $from_id,
            'out' =>  $out,
            'purpose' => $purpose,
            'status' => $status,
            'amount' => $amount,
        ]);

    }

    // generation stroe data //
    public function generation($from_id, $to_id, $purpose, $status, $refer_type, $amount, $package_amount ){

        Generation::create([
            'from_id' => $from_id,
            'to_id' =>  $to_id,
            'purpose' => $purpose,
            'push_time' => $status,
            'refer_type' => $refer_type,
            'amount' => $amount,
            'package_amount' => $package_amount,
        ]);

    }
}
