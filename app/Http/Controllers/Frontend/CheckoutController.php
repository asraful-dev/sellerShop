<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\SmsTemplate;
use App\Utility\SmsUtility;
use App\Utility\SendSMSUtility;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\ProductStock;
use App\Models\DateBinaryCalculation;
use Mail;
use App\Mail\OrderMail;
use App\Models\Generation;
use App\Models\Commission;
use App\Models\Transaction;

use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderNotification;

class CheckoutController extends Controller
{
	/* ========= Start Checkout Index Method ============ */
    public function index()
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }

        $carts = Cart::content();
        // dd($carts);

        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return view('frontend.checkout.index',compact('carts','cartQty','cartTotal'));
    } // end method
    /* ========= End Checkout Index Method ============ */

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


    /* ============= Start Payment Method ============== */
    public function payment(Request $request){
        // dd($request->all());
        // dd($request->payment_option);
        if($request->payment_option == 'cash_on_delivery'){
            $checkout = new CheckoutController;
            return $checkout->store($request);
        }

        $payment_method = $request->payment_option;
        $total_amount = Cart::total();
        $last_order = Order::orderBy('id','DESC')->first();
        $order_id = $last_order->id+1;
        $invoice_no = date('YmdHi').$order_id;
        Session::put('invoice_no', $invoice_no);

        if($request->payment_option == 'cash_on_delivery'){
            return redirect()->route('checkout.store');
        }else{
            Session::put('payment_method', $request->payment_option);
            Session::put('payment_type', 'cart_payment');
            Session::put('payment_amount', $total_amount);
            if($request->payment_option == 'nagad'){
                return 'Nagad Payment Getway Coming Soon...' ;
                // $nagad = new NagadController;
                // return $nagad->getSession();
            }else if($request->payment_option == 'bkash'){
                // $bkash = new BkashController;
                // return $bkash->pay();
                return 'Bkash Payment Getway Coming Soon...' ;
            }elseif ($request->payment_option == 'sslcommerz') {
                // $sslcommerz = new PublicSslCommerzPaymentController;
                // return $sslcommerz->index($request);
                return 'SSL Commerze Payment Getway Coming Soon...' ;
            }elseif($payment_method =='aamarpay'){
                // $aamarpay = new AamarpayController;
                // return $aamarpay->index();
                return 'Amarpay Payment Getway Coming Soon...' ;
            }
        }

        return view('frontend.checkout.payment', compact('payment_method', 'total_amount', 'invoice_no'));
    }
    /* ============= End Payment Method ============== */
    
    // refer commission systeam //
    public function referCommission($refer_id, $amount){

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

            $user1->save();
    
            $this->transaction(time(), $refer1_commission, 2, 2, Auth::user()->id, $refer_id);
    
            $this->generation(Auth::user()->id, $refer_id, 1, time(), 1, $refer1_commission, $amount);
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
            $user2->save();
    
            $this->transaction(time(), $refer2_commission, 2, 2, Auth::user()->id, $refer2_id);
    
            $this->generation(Auth::user()->id, $refer2_id, 1, time(), 2, $refer2_commission, $amount);
        }else{
          return back();
        }

        
        // 3rd refer
        $refer3_id = User::where('id', $user2->id)->first()->refer_by;
        if($refer3_id != NULL){
            $refer3_commission = $amount / 100 * 8;
            $user3 = User::where('id', $refer3_id)->first();
            $user3->main_wallet = $user3->main_wallet + $refer3_commission;
            $user3->save();

            $this->transaction(time(), $refer3_commission, 2, 2, Auth::user()->id, $refer3_id);

            $this->generation(Auth::user()->id, $refer3_id, 1, time(), 2, $refer3_commission, $amount);
        }else{
            return back();
         }

        // 4th refer
        $refer4_id = User::where('id', $user3->id)->first()->refer_by;
        if($refer4_id != NULL){
            $refer4_commission = $amount / 100 * 5;
            $user4 = User::where('id', $refer4_id)->first();
            $user4->main_wallet = $user4->main_wallet + $refer4_commission;
            $user4->save();

            $this->transaction(time(), $refer4_commission, 2, 2, Auth::user()->id, $refer4_id);

            $this->generation(Auth::user()->id, $refer4_id, 1, time(), 2, $refer4_commission, $amount);
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
            $user5->save();

            $this->transaction(time(), $refer5_commission, 2, 2, Auth::user()->id, $refer5_id);

            $this->generation(Auth::user()->id, $refer5_id, 1, time(), 2, $refer5_commission, $amount);
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
            $user6->save();

            $this->transaction(time(), $refer6_commission, 2, 2, Auth::user()->id, $refer6_id);

            $this->generation(Auth::user()->id, $refer6_id, 1, time(), 2, $refer6_commission, $amount);
        }else{
            return back();
        }

         // 7th refer
         $refer7_id = User::where('id', $user6->id)->first()->refer_by;
         if($refer7_id != NULL){
             $refer7_commission = $amount / 100 * 2;
             $user7 = User::where('id', $refer7_id)->first();
             $user7->main_wallet = $user7->main_wallet + $refer7_commission;
             $user7->save();
 
             $this->transaction(time(), $refer7_commission, 2, 2, Auth::user()->id, $refer7_id);
 
             $this->generation(Auth::user()->id, $refer7_id, 1, time(), 2, $refer7_commission, $amount);
         }else{
             return back();
          }
 
         // 8th refer
         $refer8_id = User::where('id', $user7->id)->first()->refer_by;
         if($refer8_id != NULL){
             $refer8_commission = $amount / 100 * 1;
             $user8 = User::where('id', $refer8_id)->first();
             $user8->main_wallet = $user8->main_wallet + $refer8_commission;
             $user8->save();
 
             $this->transaction(time(), $refer8_commission, 2, 2, Auth::user()->id, $refer8_id);
 
             $this->generation(Auth::user()->id, $refer8_id, 1, time(), 2, $refer8_commission, $amount);
         }else{
             return back();
          }
 
         // 9th refer
         $refer9_id = User::where('id', $user8->id)->first()->refer_by;
         if($refer9_id != NULL){
             $refer9_commission = $amount / 100 * 1;
             $user9 = User::where('id', $refer9_id)->first();
             $user9->main_wallet = $user9->main_wallet + $refer9_commission;
             $user9->save();
 
             $this->transaction(time(), $refer9_commission, 2, 2, Auth::user()->id, $refer9_id);
 
             $this->generation(Auth::user()->id, $refer9_id, 1, time(), 2, $refer9_commission, $amount);
        }else{
            return back();
        }
 
        // 10th refer
        $refer10_id = User::where('id', $user9->id)->first()->refer_by;
        if($refer10_id != NULL){
            $refer10_commission = $amount / 100 * 1;
            $user10 = User::where('id', $refer10_id)->first();
            $user10->main_wallet = $user10->main_wallet + $refer10_commission;
            $user10->save();
 
            $this->transaction(time(), $refer10_commission, 2, 2, Auth::user()->id, $refer10_id);
 
            $this->generation(Auth::user()->id, $refer10_id, 1, time(), 2, $refer10_commission, $amount);
        }else{
             return back();
         }

        
    }

    /* ============= Start Checkout Store Method ============== */
    public function store(Request $request)
    {
        // if (Auth::user()->username == 'admin') {
        //     $order_id ='1001000';
        //     $date = date('d-m-Y');
        //     $order_data = Order::with('order_details')->where('id', 209)->first();
            
        //     $payment_method ='bcash';
        //     return view('frontend.checkout.message',compact('order_id','date','payment_method','order_data'));
        // }
        $shipping_charge = 0;
        $subtotal = 0;
        // dd($request->all());
        $carts = Cart::content();
        // dd($carts);

        if($carts->isEmpty()){
            $notification = array(
                'message' => 'Your cart is empty.',
                'alert-type' => 'error'
            );
            return redirect()->route('home')->with($notification);
        }

        // dd($request->all());

        if(Auth::check()){
            $user_id = Auth::id();
            $type = 1;
        }else{
            $user_id = 1;
            $type = 2;
        }

        if($request->payment_option == 'cash_on_delivery'){
            $payment_status = 0;
        }else{
            $payment_status = 1;
        }

        $user = User::where('role','admin')->get();

        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }

        foreach($carts as $cart){

            // shipping grand total check //
            if($request->shipping_order_total == null){
                $subtotal += $total_amount;
                $shipping_order_total = $total_amount;
            }else{
                $subtotal += $request->shipping_order_total;
                $shipping_order_total = $request->shipping_order_total;
            }

            // shipping cost total check //
            if($request->shipping_order_total == null){
                $ship_charge = 0;
            }else{
                $ship_charge = $request->ship_charge;
                $shipping_charge += $request->ship_charge;
            }


            // order add //
            $order = Order::create([
                'user_id' => $user_id,
                'product_id' => $cart->id,
                'grand_total' => $shipping_order_total,
                'grand_point' => $cart->options->ppoint,
                'shipping_cost' => $ship_charge,
                'transaction_no' => $request->transaction_no,
                'payment_no' => $request->payment_no,
                'payment_method' => $request->payment_option,
                'payment_status' => $payment_status,
                'invoice_no' => date('Ymd-His') . rand(10, 99),
                'delivery_status' => 'pending',
                'phone' => $request->phone,
                'email' => $request->email,
                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'upazilla_id' => $request->upazilla_id,
                'union_id' => $request->union_id,
                'address' => $request->address,
                'post_code' => $request->post_code,
                'type' => $type,
                'resell_type' => $request->resell_type,
                'created_by' => Auth::user()->id ?? '0',
                'invoice_no' =>  date('Ymd-His') . rand(10, 99),
                'order_date' => Carbon::now()->format('d F Y'),
                'order_month' => Carbon::now()->format('F'),
                'order_year' => Carbon::now()->format('Y'),
                'created_at' => Carbon::now(),
            ]);
            
            $refer_id = Auth::user()->refer_by;
            // dd($refer_id);
            // dd($product_point);
            
            
            $placement_count = User::where('left_placement', Auth::user()->id)->count();
            
            
            // $this->referCommission($refer_id, $shipping_order_total);
            

            if ($request->hasFile('screenshot')) {

                $screenshot  = $request->file('screenshot');
                $filename    = uniqid() . '.' . $screenshot->extension('screenshot');
                $location    = public_path('upload/screenshot');
    
                $screenshot->move($location, $filename);
    
                $order->screenshot = $filename;
                $order->save();
            }
        } // End Foreach


        $invoice = Order::findOrFail($order->id);

        $data = [
            'invoice_no' => $invoice->invoice_no,
            'grand_total' => $shipping_order_total,
            'name' => Auth::user()->name ?? 'Null',
            'email' => $invoice->email,

        ];



        $carts = Cart::content();

        /* ==================  start send notifications ================== */
        if ($order->user_id == \App\Models\User::where('role', 'admin')->first()->id) {
            $users = User::findMany([$order->user->id, $order->user_id]);
        }else {
            $users = User::findMany([$order->user->id, $order->user_id, \App\Models\User::where('role', 'admin')->first()->id]);
        }

        $order_notification = [
            'order_code' => $invoice->invoice_no,
            'order_id' => $order->id,
            'user_id' => $order->user_id,
            'status' => $order->delivery_status,

        ];

        // $user = User::first();
        Notification::send($users, new OrderNotification($order_notification));

        /* ==================  end send notifications ================== */

        // foreach($carts as $cart){

        //     OrderDetail::insert([
        //         'order_id' => $order->id,
        //         'user_id' => $user_id,
        //         'invoice_no' =>  date('Ymd-His') . rand(10, 99),
        //         'order_date' => Carbon::now()->format('d F Y'),
        //         'order_month' => Carbon::now()->format('F'),
        //         'order_year' => Carbon::now()->format('Y'),
        //         'product_sales_quantity' => $order->id,
        //         'product_id' => $cart->id,
        //         'is_varient' => 1,
        //         'color' => $cart->options->color,
        //         'size' => $cart->options->size,
        //         'product_point' => $cart->options->ppoint,
        //         'qty' => $cart->qty,
        //         'price' => $cart->price,
        //         'tax' => $cart->tax,
        //         'created_at' =>Carbon::now(),
        //     ]);


        // } // End Foreach

        // order details add //
        foreach ($carts as $cart) {
            $product = Product::find($cart->id);

            if($cart->options->is_varient == 1){
                // shipping cost total check //
                if($request->shipping_order_total == null){
                    $ship_charge = 0;
                }else{
                    $ship_charge = $request->ship_charge;
                }
                OrderDetail::insert([
                    'user_id' => $user_id,
                    'invoice_no' =>  date('Ymd-His') . rand(10, 99),
                    'order_date' => Carbon::now()->format('d F Y'),
                    'order_month' => Carbon::now()->format('F'),
                    'order_year' => Carbon::now()->format('Y'),
                    'order_id' => $order->id,
                    'product_sales_quantity' => $order->id,
                    'product_id' => $cart->id,
                    'is_varient' => 1,
                    'color' => $cart->options->color,
                    'size' => $cart->options->size,
                    'qty' => $cart->qty,
                    'price' => $cart->price,
                    'shipping_cost' => $ship_charge,
                    'tax' => $cart->tax,
                    'created_at' => Carbon::now(),
                ]);

                /* ============= start product stock calculation  ============= */
                    $product->stock_qty = $product->stock_qty - $cart->qty;
                    $product->save();
                /* ============= end product stock calculation  ============= */

                // // stock calculation //
                // $stock = ProductStock::where('varient', $cart->options->varient)->first();
                // // dd($cart);
                // if($stock){
                //     // dd($stock);
                //     $stock->qty = $stock->qty - $cart->qty;
                //     $stock->save();
                // }

            }else{
                OrderDetail::insert([
                    'user_id' => $user_id,
                    'invoice_no' =>  date('Ymd-His') . rand(10, 99),
                    'order_date' => Carbon::now()->format('d F Y'),
                    'order_month' => Carbon::now()->format('F'),
                    'order_year' => Carbon::now()->format('Y'),
                    'order_id' => $order->id,
                    'product_sales_quantity' => $order->id,
                    'product_id' => $cart->id,
                    'is_varient' => 0,
                    'qty' => $cart->qty,
                    'price' => $cart->price,
                    'shipping_cost' => $ship_charge,
                    'tax' => $cart->tax,
                    'created_at' => Carbon::now(),
                ]);

                /* ============= start product stock calculation  ============= */
                if($cart->options->is_varient == 0){
                    $product->stock_qty = $product->stock_qty - $cart->qty;
                    $product->save();
                }
                /* ============= end product stock calculation  ============= */
            }

        }

        if (Session::has('coupon')) {
           Session::forget('coupon');
        }

        $fund_wallet = Auth::user()->fund_wallet;

        $current_user = Auth::user()->id;
        $user = User::where('id', $current_user)->first();

        // if($total_amount > Auth::user()->fund_wallet){
        //     $notification = array(
        //         'message' => 'You have not enough credit to fund wallet! .',
        //         'alert-type' => 'error'
        //     );
        //     return redirect()->back()->with($notification);
        // }else{
        //     // start user fund wallet decrement //
        //     $amount = $user->fund_wallet - $total_amount;
        //     $user->fund_wallet = $amount;
        //     $user->save();
        //     // end user fund wallet decrement //
        // }

        //  start fund wallet increment //
        // $fund_wallet = Auth::user()->fund_wallet;
        // $current_user = Auth::user()->id;
        // $user = User::where('id', $current_user)->first();
        // $amount = $user->fund_wallet+100;
        // $user->fund_wallet = $amount;
        // $user->save();
        //  end fund wallet increment //

        /* ============= Start Resell Product With User Id Active ============= */
        $current_user = Auth::user()->id;
        $order_amount = Order::where('user_id', $current_user)->where('resell_type',2)->sum('grand_total');
        if($order_amount >= 1250){
            $user = User::where('id', $current_user)->first();
            $user->resell_status = 1;
            $user->save();
        }
        /* ============= End Resell Product With User Id Active ============= */


        Cart::destroy();

        $order_id = $order->id;
        $order_data = Order::where('id', $order_id)->first();

        // $notification = array(
        //     'message' => 'Your Order Successfully.',
        //     'alert-type' => 'success'
        // );
        // return redirect()->back()->with($notification);
       
        return view('frontend.checkout.message',compact('order_data'));
    }
    /* ============= End Checkout Store Method ============== */

    /* ============= Start Show Method ============== */
    public function show($id)
    {
        $order = Order::where('invoice_no', $id)->first();

        $notification = array(
            'message' => 'Your Order Successfully.',
            'alert-type' => 'success'
        );

        return view('frontend.order.order_confirmed', compact('order'))->with($notification);
    }
    /* ============= End Show Method ============== */
    
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
    public function generation($from_id, $to_id, $purpose, $status, $refer_type, $amount){

        Generation::create([
            'from_id' => $from_id,
            'to_id' =>  $to_id,
            'purpose' => $purpose,
            'push_time' => $status,
            'refer_type' => $refer_type,
            'amount' => $amount,
        ]);

    }


}
