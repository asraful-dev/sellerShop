<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use PDF;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = User::where('agent_type','agent')->latest()->get();
        return view('admin.agent.index',compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.agent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        
        $refer_id = User::where('username', $request->refer_by)->first();
         
        if ($refer_id == null) {
            $notification = array(
                'message' => 'Please provide valid Username!.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else {
            $refer_id = $refer_id->id; 
            
            $user = new User();
            $user->username = $request->username;
            $user->refer_by = $refer_id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->show_password = $request->password;
            $user->role = 'agent';
            $user->active_status = '1';
            $user->division_id =  $request->division_id;
            $user->district_id =  $request->district_id;
            $user->upazilla_id =  $request->upazilla_id;
            
            
            
            // if($request->division_id == null){
            //     $user->division_id = '6';
            // }else{
            //     $user->division_id =  $request->division_id;
            // }
            
            // if($request->district_id == null){
            //     $user->district_id = '47';
            // }else{
            //     $user->district_id =  $request->district_id;
            // }
            
            // if($request->upazilla_id == null){
            //     $user->upazilla_id = '495';
            // }else{
            //     $user->upazilla_id =  $request->upazilla_id;
            // }
            
            $user->agent_type = 'agent';
            $user->save();
    
    
            $notification = array(
                'message' => 'Agent Inserted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }

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
        $agent = User::findOrFail($id);
        return view('admin.agent.edit',compact('agent'));
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
        $agent = User::findOrFail($id);
        $agent->username = $request->username;
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->password = Hash::make($request->password);
        
        if($request->password == null){
            $agent->show_password = $agent->show_password;
        }else{
            $agent->show_password = $request->password;
        }
        
        
        if($request->division_id == null){
            $agent->division_id = $agent->division_id;
        }else{
            $agent->division_id = $request->division_id;
        }
        
        if($request->district_id == null){
            $agent->district_id = $agent->district_id;
        }else{
            $agent->district_id = $request->district_id;
        }
        
        if($request->upazilla_id == null){
            $agent->upazilla_id = $agent->upazilla_id;
        }else{
            $agent->upazilla_id = $request->upazilla_id;
        }
        

        
        $agent->save();
    
    
        $notification = array(
            'message' => 'Agent Updated Successfully',
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
        $agent = User::findOrFail($id);
        $agent->delete();
         
        $notification = array(
            'message' => 'Agent Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    
    public function divisionAgent()
    {
        $agents = User::where('agent_type','agent')->latest()->get();
        return view('admin.agent.division_index',compact('agents'));
    }
    public function districtAgent()
    {
        $agents = User::where('agent_type','agent')->latest()->get();
        return view('admin.agent.district_index',compact('agents'));
    }
    public function upazillaAgent()
    {
        $agents = User::where('agent_type','agent')->latest()->get();
        return view('admin.agent.upazilla_index',compact('agents'));
    }

    /* ================= Agent Orders List =================== */
    public function agentOrders(Request $request)
    {
        $date = $request->date;
        $delivery_status = null;
        $payment_status = null;

        //dd($request);

        if($request->delivery_status != null && $request->payment_status != null && $date != null){

            $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('delivery_status', $request->delivery_status)->where('payment_status', $request->payment_status)->where('type',4);

            $delivery_status = $request->delivery_status;
            $payment_status = $request->payment_status;

        }else if($request->delivery_status == null && $request->payment_status == null && $date == null){
            $orders = Order::orderBy('id', 'desc')->where('type',4);
        }else{
            if($request->delivery_status == null){
                if($request->payment_status != null && $date != null){
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('payment_status', $request->payment_status)->where('type',4);
                    $payment_status = $request->payment_status;
                }else if($request->payment_status == null && $date != null){
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('type',4);
                }else{
                    $orders = Order::where('payment_status', $request->payment_status)->where('type',4);
                    $payment_status = $request->payment_status;
                }
            }else if($request->payment_status == null){
                if($request->delivery_status != null && $date != null){
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('delivery_status', $request->delivery_status)->where('type',4);
                    $delivery_status = $request->delivery_status;
                }else if($request->delivery_status == null && $date != null){
                    $orders = Order::where('created_at', '>=', date('Y-m-d', strtotime(explode(" - ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" - ", $date)[1])))->where('type',4);
                }else{
                    $orders = Order::where('delivery_status', $request->delivery_status)->where('type',4);
                    $delivery_status = $request->delivery_status;
                }
            }else if($request->date == null){
                if($request->delivery_status != null && $request->payment_status != null){
                    $orders = Order::where('delivery_status', $request->delivery_status)->where('payment_status', $request->payment_status)->where('type',4);
                    $delivery_status = $request->delivery_status;
                    $payment_status = $request->payment_status;
                }else if($request->delivery_status == null && $request->payment_status != null){
                    $orders = Order::where('payment_status', $request->payment_status)->where('type',4);
                    $payment_status = $request->payment_status;
                }else{
                    $orders = Order::where('delivery_status', $request->delivery_status)->where('type',4);
                    $delivery_status = $request->delivery_status;
                }
            }
        }

        $orders = $orders->paginate(500);
        return view('admin.agent.all_orders', compact('orders', 'delivery_status', 'date','payment_status'));
    }
    
}
