<?php

namespace App\Http\Controllers\userpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\SoldPackage;
use App\Models\Purpose;
use App\Models\User;
use App\Models\Transaction;
use Auth;

class IdUpgradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }


     // user refer commision count //
    public function referCommissionCount($refer_id, $amount){
       $data = Commission::where('id', 1)->first();
        
        // 1st refer
        $refer1_commission = $amount / 100 * $data->refer1;
        $user = User::where('id', $refer_id)->first();
        $user1 = User::where('id', $user->refer_by)->first();
        // dd($user1);

        // sold package amount sum //
        $deposite1 = $this->deposite($user1->id);
        // dd ($deposite1);

        // count reffer by function (deposite1)
        $deposite_count1 = $this->depositeCount($user1->id);
        // dd($deposite_count1);


        // 1st refer  //
        if($deposite1 >= 200 && $deposite1 < 300 ){

            if($deposite_count1 >= 2 &&  $deposite_count1 <= 5){

                // dd($deposite_count1);
                $refer1_commission = $amount / 100 * $data->refer1;
                $user1->main_wallet = $user1->main_wallet + $refer1_commission;
                $user1->save();

                $this->transaction(time(), $refer1_commission, 2, 2, $refer_id, $user1->id);

                $this->generation($refer_id, $user1->id, 1, time(), 1, $refer1_commission, $amount);
            } // end if

        } // end if

        $user2 = User::where('id', $user1->refer_by)->first();


        $deposite2 = $this->deposite($user2->id);
        // dd($deposite2);
        $deposite_count2 = $this->depositeCount($user2->id);

        // 2nd refer  //
        if($deposite2 >= 200 && $deposite2 <= 300 ){

            if($deposite_count2 >= 2 && $deposite_count2 <= 5){

                $refer2_commission = $amount / 100 * $data->refer1;
                $user2->main_wallet = $user2->main_wallet + $refer2_commission;
                $user2->save();
        
                $this->transaction(time(), $refer2_commission, 2, 2, $refer_id, $user2->id);
        
                $this->generation($refer_id, $user2->id, 1, time(), 2, $refer2_commission, $amount);


            } // end if
        } // end if

        $user3 = User::where('id', $user2->refer_by)->first();

        $deposite3 = $this->deposite($user3->id);
        $deposite_count3 = $this->depositeCount($user3->id);

        // 3rd refer  //
        if($deposite3 >= 200 && $deposite3 <= 300 ){

            if($deposite_count3 >= 2 && $deposite_count3 <= 5){

                $refer3_commission = $amount / 100 * $data->refer1;
                $user3->main_wallet = $user3->main_wallet + $refer3_commission;
                $user3->save();

                $this->transaction(time(), $refer3_commission, 2, 2, $refer_id, $user3->id);

                $this->generation($refer_id, $user3->id, 1, time(), 2, $refer3_commission, $amount);
            } // end if
        } // end if


       

        $user_refer_by = $user3->refer_by;
        $user4 = User::where('id', $user_refer_by)->first();
        // dd($user4);

        $deposite4 = $this->deposite($user4->id);
        // dd($deposite4);
        $deposite_count4 = $this->depositeCount($user4->id);

        // 4th refer  //
        if($deposite4 >= 200 && $deposite4 <= 300 ){

            if($deposite_count4 >= 2 && $deposite_count4 <= 5){

                $refer4_commission = $amount / 100 * $data->refer1;
                $user4->main_wallet = $user4->main_wallet + $refer4_commission;
                $user4->save();

                $this->transaction(time(), $refer4_commission, 2, 2, $refer_id, $user4->id);

                $this->generation($refer_id, $user4->id, 1, time(), 2, $refer4_commission, $amount);
            } // end if
        } // end if




        $user_refer_by = $user4->refer_by;
        $user5 = User::where('id', $user_refer_by)->first();

        if($user5 == true){

            $deposite5 = $this->deposite($user5->id);
            $deposite_count5 = $this->depositeCount($user5->id);

            // 5th refer  //
            if($deposite5 >= 200 && $deposite5 <= 300 ){

                if($deposite_count5 >= 2 && $deposite_count5 <= 5){

                    $refer5_commission = $amount / 100 * $data->refer1;
                    $user4->main_wallet = $user4->main_wallet + $refer5_commission;
                    $user4->save();

                    $this->transaction(time(), $refer5_commission, 2, 2, $refer_id, $user5);

                    $this->generation($refer_id, $user5, 1, time(), 2, $refer5_commission, $amount);
                } // end if
            } // end if
        }else{
            $notification = array(
                'message' => 'Something went wrong !',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }




        // 6th refer
        $refer6_id = User::where('id', $user5->id)->first()->refer_by;
        if($refer6_id != NULL){
            $refer6_commission = $amount / 100 * $data->refer6;
            $user6 = User::where('id', $refer6_id)->first();
            $user6->main_wallet = $user6->main_wallet + $refer6_commission;
            $user6->save();

            // $this->transaction(time(), $refer6_commission, 2, 2, Auth::user()->id, $refer6_id);

            // $this->generation(Auth::user()->id, $refer6_id, 1, time(), 2, $refer6_commission, $amount);
        }else{
            return back();
         }

        // 7th refer
        $refer7_id = User::where('id', $user6->id)->first()->refer_by;
        if($refer7_id != NULL){
            $refer7_commission = $amount / 100 * $data->refer7;
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
            $refer8_commission = $amount / 100 * $data->refer8;
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
            $refer9_commission = $amount / 100 * $data->refer9;
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
            $refer10_commission = $amount / 100 * $data->refer10;
            $user10 = User::where('id', $refer10_id)->first();
            $user10->main_wallet = $user10->main_wallet + $refer10_commission;
            $user10->save();

            $this->transaction(time(), $refer10_commission, 2, 2, Auth::user()->id, $refer10_id);

            $this->generation(Auth::user()->id, $refer10_id, 1, time(), 2, $refer10_commission, $amount);
        }else{
            return back();
        }

        // 11th refer
        $refer11_id = User::where('id', $user10->id)->first()->refer_by;
        if($refer11_id != NULL){
            $refer11_commission = $amount / 100 * $data->refer11;
            $user11 = User::where('id', $refer11_id)->first();
            $user11->main_wallet = $user11->main_wallet + $refer11_commission;
            $user11->save();

            $this->transaction(time(), $refer11_commission, 2, 2, Auth::user()->id, $refer11_id);

            $this->generation(Auth::user()->id, $refer11_id, 1, time(), 2, $refer11_commission, $amount);
        }else{
            return back();
        }

        // 12th refer
        $refer12_id = User::where('id', $user11->id)->first()->refer_by;
        if($refer12_id != NULL){
            $refer12_commission = $amount / 100 * $data->refer12;
            $user12 = User::where('id', $refer12_id)->first();
            $user12->main_wallet = $user12->main_wallet + $refer12_commission;
            $user12->save();

            $this->transaction(time(), $refer12_commission, 2, 2, Auth::user()->id, $refer12_id);

            $this->generation(Auth::user()->id, $refer12_id, 1, time(), 2, $refer12_commission, $amount);
        }else{
            return back();
        }

        // 13th refer
        $refer13_id = User::where('id', $user12->id)->first()->refer_by;
        if($refer13_id != NULL){
            $refer13_commission = $amount / 100 * $data->refer13;
            $user13 = User::where('id', $refer13_id)->first();
            $user13->main_wallet = $user13->main_wallet + $refer13_commission;
            $user13->save();

            $this->transaction(time(), $refer13_commission, 2, 2, Auth::user()->id, $refer13_id);

            $this->generation(Auth::user()->id, $refer13_id, 1, time(), 2, $refer13_commission, $amount);
        }else{
            return back();
        }

        // 14th refer
        $refer14_id = User::where('id', $user13->id)->first()->refer_by;
        if($refer14_id != NULL){
            $refer14_commission = $amount / 100 * $data->refer14;
            $user14 = User::where('id', $refer14_id)->first();
            $user14->main_wallet = $user14->main_wallet + $refer14_commission;
            $user14->save();

            $this->transaction(time(), $refer14_commission, 2, 2, Auth::user()->id, $refer14_id);

            $this->generation(Auth::user()->id, $refer14_id, 1, time(), 2, $refer14_commission, $amount);
        }else{
            return back();
        }

        // 15th refer
        $refer15_id = User::where('id', $user14->id)->first()->refer_by;
        if($refer15_id != NULL){
            $refer15_commission = $amount / 100 * $data->refer15;
            $user15 = User::where('id', $refer15_id)->first();
            $user15->main_wallet = $user15->main_wallet + $refer15_commission;
            $user15->save();

            $this->transaction(time(), $refer15_commission, 2, 2, Auth::user()->id, $refer15_id);

            $this->generation(Auth::user()->id, $refer15_id, 1, time(), 2, $refer15_commission, $amount);
        }else{
            return back();
        }

        // 16th refer
        $refer16_id = User::where('id', $user15->id)->first()->refer_by;
        if($refer16_id != NULL){
            $refer16_commission = $amount / 100 * $data->refer16;
            $user16 = User::where('id', $refer16_id)->first();
            $user16->main_wallet = $user16->main_wallet + $refer16_commission;
            $user16->save();

            $this->transaction(time(), $refer16_commission, 2, 2, Auth::user()->id, $refer16_id);

            $this->generation(Auth::user()->id, $refer16_id, 1, time(), 2, $refer16_commission, $amount);
        }else{
            return back();
        }

        // 17th refer
        $refer17_id = User::where('id', $user16->id)->first()->refer_by;
        if($refer17_id != NULL){
            $refer17_commission = $amount / 100 * $data->refer17;
            $user17 = User::where('id', $refer17_id)->first();
            $user17->main_wallet = $user17->main_wallet + $refer17_commission;
            $user17->save();

            $this->transaction(time(), $refer17_commission, 2, 2, Auth::user()->id, $refer17_id);

            $this->generation(Auth::user()->id, $refer17_id, 1, time(), 2, $refer17_commission, $amount);
        }else{
            return back();
        }

        // 18th refer
        $refer18_id = User::where('id', $user17->id)->first()->refer_by;
        if($refer18_id != NULL){
            $refer18_commission = $amount / 100 * $data->refer18;
            $user18 = User::where('id', $refer18_id)->first();
            $user18->main_wallet = $user18->main_wallet + $refer18_commission;
            $user18->save();

            $this->transaction(time(), $refer18_commission, 2, 2, Auth::user()->id, $refer18_id);

            $this->generation(Auth::user()->id, $refer18_id, 1, time(), 2, $refer18_commission, $amount);
        }else{
            return back();
        }

        // 19th refer
        $refer19_id = User::where('id', $user18->id)->first()->refer_by;
        if($refer19_id != NULL){
            $refer19_commission = $amount / 100 * $data->refer19;
            $user19 = User::where('id', $refer19_id)->first();
            $user19->main_wallet = $user19->main_wallet + $refer19_commission;
            $user19->save();

            $this->transaction(time(), $refer19_commission, 2, 2, Auth::user()->id, $refer19_id);

            $this->generation(Auth::user()->id, $refer19_id, 1, time(), 2, $refer19_commission, $amount);
        }else{
            return back();
        }

        // 20th refer
        $refer20_id = User::where('id', $user19->id)->first()->refer_by;
        if($refer20_id != NULL){
            $refer20_commission = $amount / 100 * $data->refer20;
            $user20 = User::where('id', $refer20_id)->first();
            $user20->main_wallet = $user18->main_wallet + $refer20_commission;
            $user20->save();
 
            $this->transaction(time(), $refer20_commission, 2, 2, Auth::user()->id, $refer20_id);
 
            $this->generation(Auth::user()->id, $refer20_id, 1, time(), 2, $refer20_commission, $amount);
        }else{
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $packages = Package::all();
        return view('userpanel.user.package.id_upgrade', compact('packages'));
    }

    // buy package ajax //
    public function buyPackageAjax($id){

        $package = Package::where('id', $id)->first();
        return response()->json($package);

    }




    // buy package user //
    public function buyPackageUser(Request $request,$id){

        $current_user = Auth::user()->id;
        $user = User::where('id', $current_user)->first();
        // dd($user);

        // package amount first //
        $packageAmount = 10;
        // dd($packageAmount);

        if($packageAmount <= $user->fund_wallet){

            // update admin wallet when user buy a package
            $amount = $user->fund_wallet - $packageAmount;
            $user->fund_wallet = $amount;
            $user->save();



            // dd($pushData);

            $this->transaction(time(), $packageAmount, 10, 1, null, Auth::user()->id );

            $user->active_status = 1;
            $user->save();
      
            $notification = array(
                'message' => 'Active Id Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('home')->with($notification);

        }else{
            $notification = array(
                'message' => 'Please Select Greater Amount',
                'alert-type' => 'error'
            );
            return redirect()->route('buy.package.create')->with($notification);
        }

    }


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
