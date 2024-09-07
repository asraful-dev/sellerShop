<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Hash;
use Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Dealer;
use App\Models\Stockiest;
use App\Models\Transaction;
use App\Models\Generation;
use App\Models\Commission;
use App\Models\BalanceRequest;
use App\Models\DepositeProduct;
use App\Models\Cashout;
use App\Models\ProductCashout;
use PDF;

class AgentListController extends Controller
{
    public function AgentDashboard(){

        return view('agent.index');

    } // End Mehtod 

    public function AgentLogin(){
        return view('agent.agent_login');
    } // End Mehtod 

    public function AgentDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Agent Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/agent/login')->with($notification);
    } // End Mehtod 

    public function AgentProfile(){

        $id = Auth::user()->id;
        $agentData = User::find($id);
        return view('agent.agent_profile_view',compact('agentData'));

    } // End Mehtod 

    public function AgentProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        // dd($data);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address; 


        if($request->hasfile('profile_image')){
            try {
                if(file_exists($data->profile_image)){
                    unlink($data->profile_image);
                }
            } catch (Exception $e) {

            }
            $image = $request->file('profile_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(100,80)->save('upload/agent/'.$name_gen);
            $save_url = 'upload/agent/'.$name_gen;
        }else{
            $save_url = $data->profile_photo;
        }

        $data->profile_photo = $save_url;
        $data->save();

        $notification = array(
            'message' => 'Agent Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Mehtod 


    public function AgentChangePassword(){
        return view('agent.agent_change_password');
    } // End Mehtod 


    public function AgentUpdatePassword(Request $request){
        // Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed', 
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password 
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("status", " Password Changed Successfully");

    } // End Mehtod 


    public function AgentRegister(Request $request) {
       
        $vuser = User::where('role','admin')->get();


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::insert([ 
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'vendor_join' => $request->vendor_join,
            'password' => Hash::make($request->password),
            'role' => 'agent',
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Agent Registered Successfully',
            'alert-type' => 'success'
        );


        // Notification::send($vuser, new VendorRegNotification($request));
        return redirect()->route('agent.login')->with($notification);
       
    }// End Mehtod 


    /* ============= Start Dealer product list show =============== */ 
    public function AgentProductList(){
        $products = Product::where('status', 1)->latest()->get();
        $categories = Category::where('status', 1)->latest()->get();
        $brands = Brand::where('status', 1)->latest()->get();
        $stockiest = User::where('role', 'stockiest')->where('active_status', 1)->latest()->get();
        return view('agent.product.product_list',compact('products','categories','brands','stockiest'));

    } // End Mehtod 
    /* ============= End Dealer product list show =============== */
    
    /* ============= Start Dealer getProduct product list show =============== */ 
    public function getProduct($id)
    {
        $product = Product::findOrFail($id);
        return json_encode($product);
    }
    /* ============= End Dealer getProduct product list show =============== */ 

    /* ============= Start filter getProduct product list show =============== */ 
    public function filter()
    {
        $products = Product::where('status', 1);
        if(isset($_GET['search_term'])){
            $products = $products->where('name_en', 'like', '%'.$_GET['search_term'].'%');
        }
        if(isset($_GET['category_id'])){
            $products = $products->where('category_id', $_GET['category_id']);
        }
        if(isset($_GET['brand_id'])){
            $products = $products->where('brand_id', $_GET['brand_id']);
        }
        $products = $products->get();
        return json_encode($products);
    }
    /* ============= End filter getProduct product list show =============== */ 


    public function posStore(Request $request)
    {
        // dd($request->all());

        $product_ids = $request->product_id;



        if(!$product_ids || count($product_ids)<=0){
            $notification = array(
                'message' => 'Add at least one product.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        //dd($request);

        $user = User::findOrFail(Auth::user()->id);

        // dd($user);

        if($request->payment_method == NULL) {
            $request->payment_method = "cash_on_delivery";
        }

        if($request->payment_status == NULL) {
            $request->payment_status = 0;
        }

        if($user->phone == NULL) {
            $user->phone = "";
        }

        if($user->email == NULL) {
            $user->email = "";
        }


        $total_point = $request->product_point;
        // dd($total_point);

        /* ============== End Product Stock Qty Decrease ============ */
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'grand_total' => $request->total,
            'grand_point' => $total_point,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
            'invoice_no' => date('Ymd-His') . rand(10, 99),
            'delivery_status' => 'pending',
            'phone' => $user->phone,
            'email' => $user->email,
            'address' => $user->address,
            'type' => 4,
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'created_at' => Carbon::now(),
            //'created_by' => Auth::guard('admin')->user()->id,
        ]);

        $total_amount = $request->total;

        // $this->salePointCommission($total_amount);
        // $this->singleCustomerCommission($total_amount);

        // order details add //
        for($i=0; $i<count($product_ids); $i++) {
            //$product = Product::find($product_ids[$i]);
            $product = Product::where('id', $product_ids[$i])->first();

            if($product->stock_qty < $request->qty[$i]) {
                $notification = array(
                    'message' => 'Stock is not available.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }

            $qty =  $request->qty[$i];
            $product_qty =  $product->stock_qty;

            /* ============== Start Product Stock Qty Decrease ============ */
            $product->stock_qty = $product_qty - $qty;
            $product->save();

            $product = Product::where('id', $product_ids[$i])->first();
            $product_point =  $product->product_point;

            OrderDetail::insert([
                'order_id' => $order->id,
                'product_id' => $product_ids[$i],
                'is_varient' => 0,
                'qty' => $request->qty[$i],
                'price' => $request->price[$i],
                'created_at' => Carbon::now(),
                'product_point' => $product_point,
            ]);
        }

        $notification = array(
            'message' => 'Your order has been placed successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
    // End Method
    // End Method 

    public function salePointCommission($total_amount){

        $point_cal_total = $total_amount / 100 * 5;
        // // start point check minimum 10 point added your point not commission added //
        $current_user = Auth::user()->id;
        $user1 = User::where('id', $current_user)->first();
        $user1->agent_commission = $user1->agent_commission + $point_cal_total;
        $user1->save();
        // dd($user);
    }

    /* ============= Start singleCustomerCommission  =============== */
    public function singleCustomerCommission($total_amount){

        $customer_total_amount = $total_amount / 100 * 2;
        $current_user = Auth::user()->id;
        $user_id = User::where('id', $current_user)->first();
        $user = $user_id->refer_by;
        $user = User::where('id', $user)->first();
        // dd($user);
        $user->main_wallet = $user->main_wallet + $customer_total_amount;
        $user->agent_refer_commission = $user->agent_refer_commission + $customer_total_amount;
        $user->save();

    }
    /* ============= End singleCustomerCommission  =============== */

    // refer commission systeam //
    public function referCommission($refer_id, $product_point){

        $data = Commission::where('id', 1)->first();
        
        $point_cal_total = $product_point / 10 * 4;
        // dd($point_cal_total);
        $refer1_commission = $point_cal_total / 100 * $data->refer1;
        // start point check minimum 10 point added your point not commission added //
        $current_user = Auth::user()->id;
        $user1 = User::where('id', $current_user)->first();
        // dd($user); 

        if($user1 != NULL){
            $user1->refer_bonus = $user1->refer_bonus + $point_cal_total;
            $user1->main_wallet = $user1->main_wallet + $point_cal_total;
            $user1->save();
    
            $this->transaction(time(), $refer1_commission, 2, 2, Auth::user()->id, $refer_id);
    
            $this->generation(Auth::user()->id, $refer_id, 1, time(), 1, $refer1_commission, $point_cal_total);
        }else{
            return back();
        }
    

        
    }


    // transaction store data //
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

    // generation store data //
    public function generation($from_id, $to_id, $purpose, $status, $refer_type, $point_cal_total, $product_point ){

        Generation::create([
            'from_id' => $from_id,
            'to_id' =>  $to_id,
            'purpose' => $purpose,
            'push_time' => $status,
            'refer_type' => $refer_type,
            'amount' => $point_cal_total,
            'package_amount' => $product_point,
        ]);

    }

    // dealer balance request //
    public function AgentBank(){
        return view('agent.balance_request.agent_bank');
    }

    public function DealerBkash(){
        return view('agent.balance_request.agent_bkash');
    }

    public function AgentNagad(){
        return view('agent.balance_request.agent_nagad');
    }
    public function AgentRocket(){
        return view('agent.balance_request.agent_rocket');
    }

    public function AgentBalanceRequestStore(Request $request){

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

        if($data){
            $notification = array(
                'message' => 'Balance Request Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('agent.balance.request.list')->with($notification);
        }else{
            $notification = array(
                'message' => 'Something goes wrong!',
                'alert-type' => 'error'
            );
            return redirect()->route('agent.balance.request.list')->with($notification);
        }
    }

    // user balance request show //
    public function AgentBalanceList()
    {
        $current_user = Auth::user()->id;
        $balanceRequests = DepositeProduct::where('user_id', $current_user)->latest()->get();
        return view('agent.balance_request.balance_request_list', compact('balanceRequests'));
    }
	
	  // user balance request show //
    public function agent_order_list()
    {
        $current_user = Auth::user()->id;
        $orders = Order::where('user_id', $current_user)->where('type',4)->latest()->get();
        return view('agent.product.order_list', compact('orders'));
    }


    /* ============= Start customerSaleOrdersShow Product list  =============== */
    public function agebtOrdersShow($id){
        $order = Order::findOrFail($id);
        return view('agent.product.show',compact('order'));
    }
    /* ============= End customerSaleOrdersShow Product list  =============== */

    /* ============= Start customerSaleOrdersInvoice Product list  =============== */
    public function agentOrdersInvoice($id){

        $order = Order::findOrFail($id);
        $pdf = PDF::loadView('agent.product.invoice_download',compact('order'))->setPaper('a4')->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
        // dd($orders);
    }
    /* ============= End customerSaleOrdersInvoice Product list  =============== */

    // Agent withdraw request //
    public function AgentWithdrawUsd(){
        return view('agent.withdraw.withdraw_usd');
    }

    public function AgentWithdrawBkash(){
        return view('agent.withdraw.withdraw_bkash');
    }

    public function AgentWithdrawNagad(){
        return view('agent.withdraw.withdraw_nagad');
    }
    public function AgentWithdrawRocket(){
        return view('agent.withdraw.withdraw_rocket');
    }

    public function AgentWithdrawRequestStore(Request $request)
    {

        $userAmount = Auth::user()->agent_commission;

        if($request->amount > 0){

            // cashout amount > useramount //
            if($request->amount > $userAmount){
                $notification = array(
                    'message' => 'You have not enough credit to cashout !',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }else{
                // gateway usd  3 dolar added //
                if($request->gateway == "USD"){

                    $amount = $request->amount;
                    $totalamount = $amount * 0.00919;
                    $payable_amount = $request->payable_amount * 0.00919;
                    // dd($totalamount);
                    // minimum 300 taka cashout //
                    if($totalamount < 2.757){
                        $notification = array(
                            'message' => 'You must have a minimum of 300 taka or you cannot withdraw !',
                            'alert-type' => 'error'
                        );
                        return back()->with($notification);
                    }else{

                        $usdAmount = $request->totalamount + 3;

                        $cashout = ProductCashout::create([
                            'user_id'         => Auth::user()->id,
                            'gateway'         => $request->gateway,
                            'targetWallet'    => $request->targetWallet,
                            'amount'          => $totalamount,
                            'withdraw_charge' => $request->withdraw_charge,
                            'payable_amount'  => $payable_amount,
                            'number'          => $request->number,
                            'status'          => 1,
                        ]);

                        $user = Auth::user();
                        $wallet = $request->targetWallet;
                        
                        if($wallet == 'main_wallet'){
                            $user->main_wallet = $user->main_wallet - $request->amount;
                            $user->save();
                        }else{
                            $user->refer_bonus = $user->refer_bonus - $request->amount;
                            $user->save();
                        }
                            
                        if($cashout){
                            $notification = array(
                                'message' => 'Cashout request successfully!',
                                'alert-type' => 'success'
                            );
                            return redirect()->route('agent.withdraw.request.list')->with($notification);
                        }
                    }

                }else{

                    // minimum 300 taka cashout //
                    if($request->amount < 1000){
                        $notification = array(
                            'message' => 'You must have a minimum of 1000 taka or you cannot withdraw !',
                            'alert-type' => 'error'
                        );
                        return back()->with($notification);

                    }else{

                        $cashout = ProductCashout::create([
                            'user_id'         => Auth::user()->id,
                            'gateway'         => $request->gateway,
                            'targetWallet'    => $request->targetWallet,
                            'amount'          => $request->amount,
                            'number'          => $request->number,
                            'status'          => 1,
                        ]);
        
                        $user = Auth::user();
                        $wallet = $request->targetWallet;
                        
                        if($wallet == 'commission_wallet'){
                            $user->agent_commission = $user->agent_commission - $request->amount;
                            $user->save();
                        }else{
                            $user->refer_bonus = $user->refer_bonus - $request->amount;
                            $user->save();
                        }
                            
                        if($cashout){
                            $notification = array(
                                'message' => 'Agent Withdraw request successfully!',
                                'alert-type' => 'success'
                            );
                            return redirect()->route('agent.withdraw.request.list')->with($notification);
                        }
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
    // user balance request show //
    public function AgentWithdrawBalanceList()
    {
        $cashout_reports = ProductCashout::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('agent.withdraw.withdraw_request_list', compact('cashout_reports'));
    }

    // dealer all notice show //
    public function AgentNotice()
    {
        return view('agent.notice.notice_list');
    }
    
}
