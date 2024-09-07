<?php

namespace App\Http\Controllers\userpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\BalanceRequest;
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

class BalanceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view('userpanel.user.balance_request.index');
    }
    
    // usd request //
    public function usd()
    {
        return view('userpanel.user.balance_request.usd_index');
    }

    // bkash request //
    public function bkash()
    {
        return view('userpanel.user.balance_request.bkash_index');
    }

    // flexiload request //
    public function flexiload()
    {
        return view('userpanel.user.balance_request.flexiload_index');
    }

    /* =============== flexiloadStore ============== */
    public function flexiloadStore(Request $request){
    

        $request->validate([
            'amount' => ['required'],
            'type' => ['required'],
        ]);

        $user = Auth::user()->id;
        $user = User::where('id',$user)->first();

        if($request->amount <= $user->main_wallet){
            if($request->amount <= '19'){
                $notification = array(
                    'message' => 'You can make a minimum payment of 20 taka.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            else{
                $amount = $request->amount;
                $number = $request->number;
                $user_id = Auth::user()->id;
    
                // Type = prepaid = 1, postpaid = 2
                if($request->type == '1'){
                    $url = "http://bmtelbd.com/sendapi/request";
                    $type = 1;
                }
                if($request->type == '2'){
                    $url = "http://bmtelbd.com/sendapi/request";
                    $type = 2;
                }
                
                $uniqid = uniqid();
                $post = array(
                    'user' => '8801316017328',
                    'key' => '33OFKTH85SU637D9DJTY9ZT621QQ05OBXH7V98266750N4573G',
                    'amount' => $amount,
                    'number' => $number,
                    'service' => '64',
                    'type' => $type,
                    'id' => $uniqid
                );
    
                $headers = ['api-band: flexisoftwarebd'];  
                $header  = array($flapi_key='key', $flapi_userid='osman');
                $header2 = array('band-key: flexisoftwarebd',);
                $mheader = array_merge($header2, $header); 
                $ch = curl_init($url);
                // dd($ch);
                curl_setopt($ch, CURLOPT_HTTPHEADER,$mheader);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_HOST']);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
                $result = curl_exec($ch);
                // dd($result);
                
                curl_close($ch);
                $result = json_decode($result);
                // return $result;
                // dd($result);

                $main_wallet = $user->main_wallet;
                $user->main_wallet = $main_wallet - $amount;
                $user->save();
    
                if($result == true){
                    $notification = array(
                      'message' => 'Your mobile recharge has completed successfully.',
                        'alert-type' =>'success'
                    );
                    return redirect()->back()->with($notification);
                }else{
                    $notification = array(
                     'message' => 'Something went wrong.',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
    
                // $notification = array(
                //     'message' => 'Mobile Recharge Successfully.',
                //     'alert-type' => 'success'
                // );
                // return redirect()->back()->with($notification);
    
            }
        }else{
            $notification = array(
                'message' => 'Your account does not have enough amount!',
                'alert-type' => 'error'
            );
            return redirect()->route('buy.package.create')->with($notification);

        }
    
    }

    

    // nagad request //
    public function nagad()
    {
        return view('userpanel.user.balance_request.nagad_index');
    }

    // rocket request //
    public function rocket()
    {
        return view('userpanel.user.balance_request.rocket_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::all();
        // dd($packages);
        return view('userpanel.user.package.index', compact('packages'));
    }


    // buy package ajax //
    public function buyPackageAjax($id){

        $package = Package::where('id', $id)->first();
        return response()->json($package);

    }

    // // user refer commision count //
    // public function referCommissionCount($refer_id, $amount){

    //     $data = Commission::where('id', 1)->first();
        
    //     // 1st refer
    //     $refer1_commission = $amount / 100 * $data->refer1;
    //     $user = User::where('id', $refer_id)->first();
    //     $user1 = User::where('id', $user->refer_by)->first();
    //     // dd($user1);
        
    //     if($user1 == true){
            
    //         // sold package amount sum //
    //         $deposite1 = $this->deposite($user1->id);
    //         // dd ($deposite1);
    
    //         // count reffer by function (deposite1)
    //         $deposite_count1 = $this->depositeCount($user1->id);
    //         // dd($deposite_count1);
    
    //         //  total deposite  show //
    //         $totalDeposite1 = $this->totalDeposite($user1->id);
    //         // dd($totalDeposite1);
    
    //         // 1st refer  //
    //         // if($deposite1 >= 200 && $deposite1 < 300 ){
    //         //     // total deposite count 1 //
    //         //     if($deposite_count1 >= 2 &&  $deposite_count1 < 5){
    //         //         //  total deposite 1 //
    //         //         if($totalDeposite1 >= 300 && $totalDeposite1 < 5000){
    //                     $refer1_commission = $amount / 100 * $data->refer1;
    //                     // dd($refer1_commission);
    //                     $user1->main_wallet = $user1->main_wallet + $refer1_commission;
    //                     $user1->save();
    
    //                     $this->transaction(time(), $refer1_commission, 2, 2, $refer_id, $user1->id);
    
    //                     $this->generation($refer_id, $user1->id, 1, time(), 1, $refer1_commission, $amount);
    //         //         } // end if
    
    //         //     } // end if
    
    //         // } // end if
            
    //     }else{
    //         return back();
    //     }

    



    //     $user2 = User::where('id', $user1->id)->first();
        
    //     $user2 = User::where('id', $user2->refer_by)->first();
    //     // dd($user2);
        
    //     if($user2 == true ){
            
    //         $deposite2 = $this->deposite($user2->id);
    //         // dd($deposite2);
    //         $deposite_count2 = $this->depositeCount($user2->id);
    
    //         //  total deposite 2 show //
    //         $totalDeposite2 = $this->totalDeposite($user2->id);
    
    //         // 2nd refer  //
    //         if($deposite2 >= 200 && $deposite2 < 300 ){
    //             // total deposite 2 count //
    //             if($deposite_count2 >= 2 && $deposite_count2 < 5){
    //                 //  total deposite 2 //
    //                 if($totalDeposite2 >= 300 && $totalDeposite2 < 5000){
    //                     $refer2_commission = $amount / 100 * $data->refer1;
    //                     $user2->main_wallet = $user2->main_wallet + $refer2_commission;
    //                     $user2->save();
                
    //                     $this->transaction(time(), $refer2_commission, 2, 2, $refer_id, $user2->id);
                
    //                     $this->generation($refer_id, $user2->id, 1, time(), 2, $refer2_commission, $amount);
    //                 }// end if
    
    //             } // end if
    
    //         } // end if
            
    //     }else{
    //         return back();
    //     }
        
        

    //     $user3 = User::where('id', $user2->id)->first();
        
    //     $user3 = User::where('id', $user3->refer_by)->first();
    //     // dd($user3);
        
    //     if($user3 == true){
            
    //         $deposite3 = $this->deposite($user3->id);
    //         $deposite_count3 = $this->depositeCount($user3->id);
    
    //         //  total deposite 3 show //
    //         $totalDeposite3 = $this->totalDeposite($user3->id);
    
    //         // 3rd refer  //
    //         if($deposite3 >= 200 && $deposite3 <= 300 ){
    //             // total depostie count 3 //
    //             if($deposite_count3 >= 2 && $deposite_count3 <= 5){
    //                 //  total deposite 3 //
    //                 if($totalDeposite3 >= 300 && $totalDeposite3 < 5000){
    //                     $refer3_commission = $amount / 100 * $data->refer1;
    //                     $user3->main_wallet = $user3->main_wallet + $refer3_commission;
    //                     $user3->save();
    
    //                     $this->transaction(time(), $refer3_commission, 2, 2, $refer_id, $user3->id);
    
    //                     $this->generation($refer_id, $user3->id, 1, time(), 2, $refer3_commission, $amount);
    //                 } // end if
    
    //             } // end if
    
    //         } // end if
    //     }else{
    //         return back();
    //     }



       

    //     $user_refer_by = $user3->refer_by;
    //     $user4 = User::where('id', $user_refer_by)->first();
    //     // dd($user4);
        
    //     if($user4 == true){
            
    //         $deposite4 = $this->deposite($user4->id);
    //         // dd($deposite4);
    //         $deposite_count4 = $this->depositeCount($user4->id);
    
    //         //  total deposite 4 show //
    //         $totalDeposite4 = $this->totalDeposite($user4->id);
    
    //         // 4th refer  //
    //         if($deposite4 >= 200 && $deposite4 <= 300 ){
    //             // total deposite count 4 //
    //             if($deposite_count4 >= 2 && $deposite_count4 <= 5){
    //                 //  total deposite 4 //
    //                 if($totalDeposite4 >= 300 && $totalDeposite4 < 5000){
    //                     $refer4_commission = $amount / 100 * $data->refer1;
    //                     $user4->main_wallet = $user4->main_wallet + $refer4_commission;
    //                     $user4->save();
    
    //                     $this->transaction(time(), $refer4_commission, 2, 2, $refer_id, $user4->id);
    
    //                     $this->generation($refer_id, $user4->id, 1, time(), 2, $refer4_commission, $amount);
    //                 } // end if
    
    //             } // end if
    
    //         } // end if
            
    //     }else{
    //         return back();
    //     }




    //     $user_refer_by = $user4->refer_by;
    //     $user5 = User::where('id', $user_refer_by)->first();
    //     // dd($user5);

    //     if($user5 == true){

    //         $deposite5 = $this->deposite($user5->id);
    //         $deposite_count5 = $this->depositeCount($user5->id);

    //         //  total deposite 5 show //
    //         $totalDeposite5 = $this->totalDeposite($user5->id);

    //         // 5th refer  //
    //         if($deposite5 >= 200 && $deposite5 <= 300 ){
    //             // total depostite count 5 //
    //             if($deposite_count5 >= 2 && $deposite_count5 <= 5){
    //                 //  total deposite 4 //
    //                 if($totalDeposite5 >= 300 && $totalDeposite5 < 5000){
    //                     $refer5_commission = $amount / 100 * $data->refer1;
    //                     $user4->main_wallet = $user4->main_wallet + $refer5_commission;
    //                     $user4->save();

    //                     $this->transaction(time(), $refer5_commission, 2, 2, $refer_id, $user5);

    //                     $this->generation($refer_id, $user5, 1, time(), 2, $refer5_commission, $amount);
    //                 } // end if

    //             } // end if

    //         } // end if
    //     }else{
    //         $notification = array(
    //             'message' => 'Something went wrong !',
    //             'alert-type' => 'success'
    //         );
    //         return back()->with($notification);
    //     }




    //     // 6th refer
    //     $refer6_id = User::where('id', $user5->id)->first()->refer_by;
    //     // dd($refer6_id);
    //     if($refer6_id == true){
    //         $refer6_commission = $amount / 100 * $data->refer6;
    //         $user6 = User::where('id', $refer6_id)->first();
    //         $user6->main_wallet = $user6->main_wallet + $refer6_commission;
    //         $user6->save();

    //         $this->transaction(time(), $refer6_commission, 2, 2, Auth::user()->id, $refer6_id);

    //         $this->generation(Auth::user()->id, $refer6_id, 1, time(), 2, $refer6_commission, $amount);
    //     }else{
    //         return back();
    //     }

    //     // 7th refer
    //     $refer7_id = User::where('id', $user6->id)->first()->refer_by;
    //     if($refer7_id == true){
    //         $refer7_commission = $amount / 100 * $data->refer7;
    //         $user7 = User::where('id', $refer7_id)->first();
    //         $user7->main_wallet = $user7->main_wallet + $refer7_commission;
    //         $user7->save();

    //         $this->transaction(time(), $refer7_commission, 2, 2, Auth::user()->id, $refer7_id);

    //         $this->generation(Auth::user()->id, $refer7_id, 1, time(), 2, $refer7_commission, $amount);
    //     }else{
    //         return back();
    //     }

    //     // 8th refer
    //     $refer8_id = User::where('id', $user7->id)->first()->refer_by;
    //     if($refer8_id == true){
    //         $refer8_commission = $amount / 100 * $data->refer8;
    //         $user8 = User::where('id', $refer8_id)->first();
    //         $user8->main_wallet = $user8->main_wallet + $refer8_commission;
    //         $user8->save();

    //         $this->transaction(time(), $refer8_commission, 2, 2, Auth::user()->id, $refer8_id);

    //         $this->generation(Auth::user()->id, $refer8_id, 1, time(), 2, $refer8_commission, $amount);
    //     }else{
    //         return back();
    //     }

    //     // 9th refer
    //     $refer9_id = User::where('id', $user8->id)->first()->refer_by;
    //     if($refer9_id == true){
    //         $refer9_commission = $amount / 100 * $data->refer9;
    //         $user9 = User::where('id', $refer9_id)->first();
    //         $user9->main_wallet = $user9->main_wallet + $refer9_commission;
    //         $user9->save();

    //         $this->transaction(time(), $refer9_commission, 2, 2, Auth::user()->id, $refer9_id);

    //         $this->generation(Auth::user()->id, $refer9_id, 1, time(), 2, $refer9_commission, $amount);
    //     }else{
    //         return back();
    //     }

    //     // 10th refer
    //     $refer10_id = User::where('id', $user9->id)->first()->refer_by;
    //     if($refer10_id == true){
    //         $refer10_commission = $amount / 100 * $data->refer10;
    //         $user10 = User::where('id', $refer10_id)->first();
    //         $user10->main_wallet = $user10->main_wallet + $refer10_commission;
    //         $user10->save();

    //         $this->transaction(time(), $refer10_commission, 2, 2, Auth::user()->id, $refer10_id);

    //         $this->generation(Auth::user()->id, $refer10_id, 1, time(), 2, $refer10_commission, $amount);
    //     }else{
    //         return back();
    //     }

    //     // 11th refer
    //     $refer11_id = User::where('id', $user10->id)->first()->refer_by;
    //     // dd($refer11_id);
    //     if($refer11_id == true){
    //         $refer11_commission = $amount / 100 * $data->refer11;
    //         $user11 = User::where('id', $refer11_id)->first();
    //         $user11->main_wallet = $user11->main_wallet + $refer11_commission;
    //         $user11->save();

    //         $this->transaction(time(), $refer11_commission, 2, 2, Auth::user()->id, $refer11_id);

    //         $this->generation(Auth::user()->id, $refer11_id, 1, time(), 2, $refer11_commission, $amount);
    //     }else{
    //         return back();
    //     }

    //     // 12th refer
    //     $refer12_id = User::where('id', $user11->id)->first()->refer_by;
    //     if($refer12_id != NULL){
    //         $refer12_commission = $amount / 100 * $data->refer12;
    //         $user12 = User::where('id', $refer12_id)->first();
    //         $user12->main_wallet = $user12->main_wallet + $refer12_commission;
    //         $user12->save();

    //         $this->transaction(time(), $refer12_commission, 2, 2, Auth::user()->id, $refer12_id);

    //         $this->generation(Auth::user()->id, $refer12_id, 1, time(), 2, $refer12_commission, $amount);
    //     }else{
    //         return back();
    //     }

    //     // 13th refer
    //     $refer13_id = User::where('id', $user12->id)->first()->refer_by;
    //     if($refer13_id != NULL){
    //         $refer13_commission = $amount / 100 * $data->refer13;
    //         $user13 = User::where('id', $refer13_id)->first();
    //         $user13->main_wallet = $user13->main_wallet + $refer13_commission;
    //         $user13->save();

    //         $this->transaction(time(), $refer13_commission, 2, 2, Auth::user()->id, $refer13_id);

    //         $this->generation(Auth::user()->id, $refer13_id, 1, time(), 2, $refer13_commission, $amount);
    //     }else{
    //         return back();
    //     }

    //     // 14th refer
    //     $refer14_id = User::where('id', $user13->id)->first()->refer_by;
    //     if($refer14_id != NULL){
    //         $refer14_commission = $amount / 100 * $data->refer14;
    //         $user14 = User::where('id', $refer14_id)->first();
    //         $user14->main_wallet = $user14->main_wallet + $refer14_commission;
    //         $user14->save();

    //         $this->transaction(time(), $refer14_commission, 2, 2, Auth::user()->id, $refer14_id);

    //         $this->generation(Auth::user()->id, $refer14_id, 1, time(), 2, $refer14_commission, $amount);
    //     }else{
    //         return back();
    //     }

    //     // 15th refer
    //     $refer15_id = User::where('id', $user14->id)->first()->refer_by;
    //     if($refer15_id != NULL){
    //         $refer15_commission = $amount / 100 * $data->refer15;
    //         $user15 = User::where('id', $refer15_id)->first();
    //         $user15->main_wallet = $user15->main_wallet + $refer15_commission;
    //         $user15->save();

    //         $this->transaction(time(), $refer15_commission, 2, 2, Auth::user()->id, $refer15_id);

    //         $this->generation(Auth::user()->id, $refer15_id, 1, time(), 2, $refer15_commission, $amount);
    //     }else{
    //         return back();
    //     }

    //     // 16th refer
    //     $refer16_id = User::where('id', $user15->id)->first()->refer_by;
    //     if($refer16_id != NULL){
    //         $refer16_commission = $amount / 100 * $data->refer16;
    //         $user16 = User::where('id', $refer16_id)->first();
    //         $user16->main_wallet = $user16->main_wallet + $refer16_commission;
    //         $user16->save();

    //         $this->transaction(time(), $refer16_commission, 2, 2, Auth::user()->id, $refer16_id);

    //         $this->generation(Auth::user()->id, $refer16_id, 1, time(), 2, $refer16_commission, $amount);
    //     }else{
    //         return back();
    //     }

    //     // 17th refer
    //     $refer17_id = User::where('id', $user16->id)->first()->refer_by;
    //     if($refer17_id != NULL){
    //         $refer17_commission = $amount / 100 * $data->refer17;
    //         $user17 = User::where('id', $refer17_id)->first();
    //         $user17->main_wallet = $user17->main_wallet + $refer17_commission;
    //         $user17->save();

    //         $this->transaction(time(), $refer17_commission, 2, 2, Auth::user()->id, $refer17_id);

    //         $this->generation(Auth::user()->id, $refer17_id, 1, time(), 2, $refer17_commission, $amount);
    //     }else{
    //         return back();
    //     }

    //     // 18th refer
    //     $refer18_id = User::where('id', $user17->id)->first()->refer_by;
    //     if($refer18_id != NULL){
    //         $refer18_commission = $amount / 100 * $data->refer18;
    //         $user18 = User::where('id', $refer18_id)->first();
    //         $user18->main_wallet = $user18->main_wallet + $refer18_commission;
    //         $user18->save();

    //         $this->transaction(time(), $refer18_commission, 2, 2, Auth::user()->id, $refer18_id);

    //         $this->generation(Auth::user()->id, $refer18_id, 1, time(), 2, $refer18_commission, $amount);
    //     }else{
    //         return back();
    //     }

    //     // 19th refer
    //     $refer19_id = User::where('id', $user18->id)->first()->refer_by;
    //     if($refer19_id != NULL){
    //         $refer19_commission = $amount / 100 * $data->refer19;
    //         $user19 = User::where('id', $refer19_id)->first();
    //         $user19->main_wallet = $user19->main_wallet + $refer19_commission;
    //         $user19->save();

    //         $this->transaction(time(), $refer19_commission, 2, 2, Auth::user()->id, $refer19_id);

    //         $this->generation(Auth::user()->id, $refer19_id, 1, time(), 2, $refer19_commission, $amount);
    //     }else{
    //         return back();
    //     }

    //     // 20th refer
    //     $refer20_id = User::where('id', $user19->id)->first()->refer_by;
    //     if($refer20_id != NULL){
    //         $refer20_commission = $amount / 100 * $data->refer20;
    //         $user20 = User::where('id', $refer20_id)->first();
    //         $user20->main_wallet = $user18->main_wallet + $refer20_commission;
    //         $user20->save();
 
    //         $this->transaction(time(), $refer20_commission, 2, 2, Auth::user()->id, $refer20_id);
 
    //         $this->generation(Auth::user()->id, $refer20_id, 1, time(), 2, $refer20_commission, $amount);
    //     }else{
    //         return back();
    //     }
    // }


    //  reusable func for filter referer commission
    // refer commission systeam //
    public function referCommission($refer_id, $amount , $package_id){

        if ($package_id == 5) {
            
        }else{

            $data = Commission::where('id', 1)->first();
            
            // 1st refer
            // $refer_id = Auth::user()->refer_by;
            $refer1_commission = $amount / 100 * $data->refer1;
            $user1 = User::where('id', $refer_id)->first();
            // dd($user1);
            
            if($user1 == true){
                $user1->main_wallet = $user1->main_wallet + $refer1_commission;
                $user1->refer_bonus = $user1->refer_bonus + $refer1_commission;
                $user1->save();
        
                $this->transaction(time(), $refer1_commission, 2, 2, Auth::user()->id, $refer_id);
        
                $this->generation(Auth::user()->id, $refer_id, 1, time(), 1, $refer1_commission, $amount);
            }else{
                return back();
            }

        }
    
    
        

        // 2nd refer
        $refer2_id = User::where('id',$user1->id)->first()->refer_by;
        // dd($refer2_id);
        if($refer2_id != NULL){
            $refer2_commission = $amount / 100 * $data->refer2;
            $user2 = User::where('id', $refer2_id)->first();
            // dd($user2);
            $user2->main_wallet = $user2->main_wallet + $refer2_commission;
            $user2->refer_bonus = $user2->refer_bonus + $refer2_commission;
            $user2->save();
    
            $this->transaction(time(), $refer2_commission, 2, 2, Auth::user()->id, $refer2_id);
    
            $this->generation(Auth::user()->id, $refer2_id, 1, time(), 2, $refer2_commission, $amount);
        }else{
          return back();
        }


        // 3rd refer
        $refer3_id = User::where('id', $user2->id)->first()->refer_by;
        // dd($refer3_id);
        if($refer3_id != NULL){
            $refer3_commission = $amount / 100 * $data->refer3;
            $user3 = User::where('id', $refer3_id)->first();
            $user3->main_wallet = $user3->main_wallet + $refer3_commission;
            $user3->refer_bonus = $user3->refer_bonus + $refer3_commission;
            $user3->save();

            $this->transaction(time(), $refer3_commission, 2, 2, Auth::user()->id, $refer3_id);

            $this->generation(Auth::user()->id, $refer3_id, 1, time(), 3, $refer3_commission, $amount);
        }else{
            return back();
         }

        // 4th refer
        $refer4_id = User::where('id', $user3->id)->first()->refer_by;
        // dd($refer4_id);
        if($refer4_id != NULL){
            $refer4_commission = $amount / 100 * $data->refer4;
            $user4 = User::where('id', $refer4_id)->first();
            $user4->main_wallet = $user4->main_wallet + $refer4_commission;
            $user4->refer_bonus = $user4->refer_bonus + $refer4_commission;
            $user4->save();

            $this->transaction(time(), $refer4_commission, 2, 2, Auth::user()->id, $refer4_id);

            $this->generation(Auth::user()->id, $refer4_id, 1, time(), 4, $refer4_commission, $amount);
        }else{
            return back();
         }

         // 5th refer
        $refer5_id = User::where('id', $user4->id)->first()->refer_by;
        if($refer5_id != NULL){
            $refer5_commission = $amount / 100 * $data->refer5;
            $user5 = User::where('id', $refer5_id)->first();
            $user5->main_wallet = $user5->main_wallet + $refer5_commission;
            $user5->refer_bonus = $user5->refer_bonus + $refer5_commission;
            $user5->save();

            $this->transaction(time(), $refer5_commission, 2, 2, Auth::user()->id, $refer5_id);

            $this->generation(Auth::user()->id, $refer5_id, 1, time(), 5, $refer5_commission, $amount);
        }else{
            return back();
        }

         // 6th refer
        $refer6_id = User::where('id', $user5->id)->first()->refer_by;
        if($refer6_id != NULL){
            $refer6_commission = $amount / 100 * $data->refer6;
            $user6 = User::where('id', $refer6_id)->first();
            $user6->main_wallet = $user6->main_wallet + $refer6_commission;
            $user6->refer_bonus = $user6->refer_bonus + $refer6_commission;
            $user6->save();

            $this->transaction(time(), $refer6_commission, 2, 2, Auth::user()->id, $refer6_id);

            $this->generation(Auth::user()->id, $refer6_id, 1, time(), 6, $refer6_commission, $amount);
        }else{
            return back();
         }

        // 7th refer
        $refer7_id = User::where('id', $user6->id)->first()->refer_by;
        if($refer7_id != NULL){
            $refer7_commission = $amount / 100 * $data->refer7;
            $user7 = User::where('id', $refer7_id)->first();
            $user7->main_wallet = $user7->main_wallet + $refer7_commission;
            $user7->refer_bonus = $user7->refer_bonus + $refer7_commission;
            $user7->save();

            $this->transaction(time(), $refer7_commission, 2, 2, Auth::user()->id, $refer7_id);

            $this->generation(Auth::user()->id, $refer7_id, 1, time(), 7, $refer7_commission, $amount);
        }else{
            return back();
         }

        // 8th refer
        $refer8_id = User::where('id', $user7->id)->first()->refer_by;
        if($refer8_id != NULL){
            $refer8_commission = $amount / 100 * $data->refer8;
            $user8 = User::where('id', $refer8_id)->first();
            $user8->main_wallet = $user8->main_wallet + $refer8_commission;
            $user8->refer_bonus = $user8->refer_bonus + $refer8_commission;
            $user8->save();

            $this->transaction(time(), $refer8_commission, 2, 2, Auth::user()->id, $refer8_id);

            $this->generation(Auth::user()->id, $refer8_id, 1, time(), 8, $refer8_commission, $amount);
        }else{
            return back();
         }

        // 9th refer
        $refer9_id = User::where('id', $user8->id)->first()->refer_by;
        // dd($refer9_id);
        if($refer9_id != NULL){
            $refer9_commission = $amount / 100 * $data->refer9;
            $user9 = User::where('id', $refer9_id)->first();
            $user9->main_wallet = $user9->main_wallet + $refer9_commission;
            $user9->refer_bonus = $user9->refer_bonus + $refer9_commission;
            $user9->save();

            $this->transaction(time(), $refer9_commission, 2, 2, Auth::user()->id, $refer9_id);

            $this->generation(Auth::user()->id, $refer9_id, 1, time(), 9, $refer9_commission, $amount);
        }else{
            return back();
         }

        // 10th refer
        $refer10_id = User::where('id', $user9->id)->first()->refer_by;
        if($refer10_id != NULL){
            $refer10_commission = $amount / 100 * $data->refer10;
            $user10 = User::where('id', $refer10_id)->first();
            $user10->main_wallet = $user10->main_wallet + $refer10_commission;
            $user10->refer_bonus = $user10->refer_bonus + $refer10_commission;
            $user10->save();

            $this->transaction(time(), $refer10_commission, 2, 2, Auth::user()->id, $refer10_id);

            $this->generation(Auth::user()->id, $refer10_id, 1, time(), 10, $refer10_commission, $amount);
        }else{
            return back();
        }

//         // 11th refer
//         $refer11_id = User::where('id', $user10->id)->first()->refer_by;
//         if($refer11_id != NULL){
//             $refer11_commission = $amount / 100 * $data->refer11;
//             $user11 = User::where('id', $refer11_id)->first();
//             $user11->main_wallet = $user11->main_wallet + $refer11_commission;
//             $user11->save();

//             $this->transaction(time(), $refer11_commission, 2, 2, Auth::user()->id, $refer11_id);

//             $this->generation(Auth::user()->id, $refer11_id, 1, time(), 2, $refer11_commission, $amount);
//         }else{
//             return back();
//         }

//         // 12th refer
//         $refer12_id = User::where('id', $user11->id)->first()->refer_by;
//         if($refer12_id != NULL){
//             $refer12_commission = $amount / 100 * $data->refer12;
//             $user12 = User::where('id', $refer12_id)->first();
//             $user12->main_wallet = $user12->main_wallet + $refer12_commission;
//             $user12->save();

//             $this->transaction(time(), $refer12_commission, 2, 2, Auth::user()->id, $refer12_id);

//             $this->generation(Auth::user()->id, $refer12_id, 1, time(), 2, $refer12_commission, $amount);
//         }else{
//             return back();
//         }

//         // 13th refer
//         $refer13_id = User::where('id', $user12->id)->first()->refer_by;
//         if($refer13_id != NULL){
//             $refer13_commission = $amount / 100 * $data->refer13;
//             $user13 = User::where('id', $refer13_id)->first();
//             $user13->main_wallet = $user13->main_wallet + $refer13_commission;
//             $user13->save();

//             $this->transaction(time(), $refer13_commission, 2, 2, Auth::user()->id, $refer13_id);

//             $this->generation(Auth::user()->id, $refer13_id, 1, time(), 2, $refer13_commission, $amount);
//         }else{
//             return back();
//         }

//         // 14th refer
//         $refer14_id = User::where('id', $user13->id)->first()->refer_by;
//         if($refer14_id != NULL){
//             $refer14_commission = $amount / 100 * $data->refer14;
//             $user14 = User::where('id', $refer14_id)->first();
//             $user14->main_wallet = $user14->main_wallet + $refer14_commission;
//             $user14->save();

//             $this->transaction(time(), $refer14_commission, 2, 2, Auth::user()->id, $refer14_id);

//             $this->generation(Auth::user()->id, $refer14_id, 1, time(), 2, $refer14_commission, $amount);
//         }else{
//             return back();
//         }

//         // 15th refer
//         $refer15_id = User::where('id', $user14->id)->first()->refer_by;
//         if($refer15_id != NULL){
//             $refer15_commission = $amount / 100 * $data->refer15;
//             $user15 = User::where('id', $refer15_id)->first();
//             $user15->main_wallet = $user15->main_wallet + $refer15_commission;
//             $user15->save();

//             $this->transaction(time(), $refer15_commission, 2, 2, Auth::user()->id, $refer15_id);

//             $this->generation(Auth::user()->id, $refer15_id, 1, time(), 2, $refer15_commission, $amount);
//         }else{
//             return back();
//         }

//         // 16th refer
//         $refer16_id = User::where('id', $user15->id)->first()->refer_by;
//         if($refer16_id != NULL){
//             $refer16_commission = $amount / 100 * $data->refer16;
//             $user16 = User::where('id', $refer16_id)->first();
//             $user16->main_wallet = $user16->main_wallet + $refer16_commission;
//             $user16->save();

//             $this->transaction(time(), $refer16_commission, 2, 2, Auth::user()->id, $refer16_id);

//             $this->generation(Auth::user()->id, $refer16_id, 1, time(), 2, $refer16_commission, $amount);
//         }else{
//             return back();
//         }

//         // 17th refer
//         $refer17_id = User::where('id', $user16->id)->first()->refer_by;
//         if($refer17_id != NULL){
//             $refer17_commission = $amount / 100 * $data->refer17;
//             $user17 = User::where('id', $refer17_id)->first();
//             $user17->main_wallet = $user17->main_wallet + $refer17_commission;
//             $user17->save();

//             $this->transaction(time(), $refer17_commission, 2, 2, Auth::user()->id, $refer17_id);

//             $this->generation(Auth::user()->id, $refer17_id, 1, time(), 2, $refer17_commission, $amount);
//         }else{
//             return back();
//         }

//         // 18th refer
//         $refer18_id = User::where('id', $user17->id)->first()->refer_by;
//         if($refer18_id != NULL){
//             $refer18_commission = $amount / 100 * $data->refer18;
//             $user18 = User::where('id', $refer18_id)->first();
//             $user18->main_wallet = $user18->main_wallet + $refer18_commission;
//             $user18->save();

//             $this->transaction(time(), $refer18_commission, 2, 2, Auth::user()->id, $refer18_id);

//             $this->generation(Auth::user()->id, $refer18_id, 1, time(), 2, $refer18_commission, $amount);
//         }else{
//             return back();
//         }

//         // 19th refer
//         $refer19_id = User::where('id', $user18->id)->first()->refer_by;
//         if($refer19_id != NULL){
//             $refer19_commission = $amount / 100 * $data->refer19;
//             $user19 = User::where('id', $refer19_id)->first();
//             $user19->main_wallet = $user19->main_wallet + $refer19_commission;
//             $user19->save();

//             $this->transaction(time(), $refer19_commission, 2, 2, Auth::user()->id, $refer19_id);

//             $this->generation(Auth::user()->id, $refer19_id, 1, time(), 2, $refer19_commission, $amount);
//         }else{
//             return back();
//         }

//         // 20th refer
//         $refer20_id = User::where('id', $user19->id)->first()->refer_by;
//         if($refer20_id != NULL){
//             $refer20_commission = $amount / 100 * $data->refer20;
//             $user20 = User::where('id', $refer20_id)->first();
//             $user20->main_wallet = $user18->main_wallet + $refer20_commission;
//             $user20->save();
 
//             $this->transaction(time(), $refer20_commission, 2, 2, Auth::user()->id, $refer20_id);
 
//             $this->generation(Auth::user()->id, $refer20_id, 1, time(), 2, $refer20_commission, $amount);
//         }else{
//             return back();
//         }

        
        
    }

    // buy package user //
    public function buyPackageUser(Request $request,$id){

    

        $current_user = Auth::user()->id;
        $user = User::where('id', $current_user)->first();
        // dd($user);

        $package = Package::where('id', $request->id)->first();
        // dd($package);
        
        
        // start order package buy grand point added //
        // $order_point = Order::where('user_id',$current_user)->first();
        // // dd($orders_user_point);
        
        // if(empty($order_point)){
        //     $notification = array(
        //     'message' => 'Please first Buy This Product',
        //         'alert-type' => 'error'
        //     );
            
        //     return back()->with($notification);
        //     // return redirect()->route('home')->with($notification);
        // }else{
            
        //     $order_point->grand_point += $package->package_point;; 
        //     $order_point->save();
        //     // end order package buy grand point added //
            
        // }
        
         

        // package amount first //
        if ($package->id == 5) {
            $packageAmount = $_POST['package_amount'];
        }else{
            $packageAmount = $package->amount;
        }
        
        // start agent commission added now //
        $id = Auth::user()->id;
        
        $div_id = Auth::user()->division_id;
        $dis_id = Auth::user()->district_id;
        $upa_id = Auth::user()->upazilla_id;
        
        $agent1 = User::where('agent_type', 'agent')
                    ->where('division_id',$div_id)->first();
                    
        // dd($agent1);
                    
        $agent2 = User::where('agent_type', 'agent')
                    ->where('district_id',$dis_id)->first();
        // dd($agent2);
                    
        $agent3 = User::where('agent_type', 'agent')
                    ->where('upazilla_id',$upa_id)->first();
        // dd($agent3);

        if($agent1){

            if ($package->id == 1) {
                // return 'hi';
            
                $packageAmount = $package->amount;
                $division_commision = $packageAmount / 100 * 0.5;
                // dd($division_commision);

                $agent1->division_commission = $agent1->division_commission+$division_commision;
                $agent1->save();
                // return 'done';
            }

            // $this->transaction(time(), $agent_commission, 2, 2, Auth::user()->id, $agent->id);
            // $this->generation(Auth::user()->id, $agent->id, 1, time(), 2, $agent_commission, $packageAmount);
        }
        
        if($agent2){

            if ($package->id == 1) {
                // return 'hi';
                $packageAmount = $package->amount;
                $district_commision = $packageAmount / 100 * 1.2;
                // dd($district_commision);
               
                $agent2->district_commission = $agent2->district_commission+$district_commision;
                $agent2->save();
                 
                // return 'done';
            }

            // $this->transaction(time(), $agent_commission, 2, 2, Auth::user()->id, $agent->id);
            // $this->generation(Auth::user()->id, $agent->id, 1, time(), 2, $agent_commission, $packageAmount);
        }
        
        if($agent3){

            if ($package->id == 1) {
                
                $packageAmount = $package->amount;
                $upazila_commision = $packageAmount / 100 * 1.6;
                // dd($upazila_commision);
                
                
                $agent3->upazila_commission = $agent3->upazila_commission+$upazila_commision;
                $agent3->save(); 
                
                // return 'hi';

            }

            // $this->transaction(time(), $agent_commission, 2, 2, Auth::user()->id, $agent->id);
            // $this->generation(Auth::user()->id, $agent->id, 1, time(), 2, $agent_commission, $packageAmount);
        }
        // end agent commission added now //
      
        // dd($packageAmount);

        if($packageAmount <= $user->fund_wallet){

       // update admin wallet when user buy a package
        $amount = $user->fund_wallet - $packageAmount;
        $user->fund_wallet = $amount;
        $user->save();

        $pushData = SoldPackage::create([
            'user_id' => Auth::user()->id,
            'package_id' => $package->id,
            'package_point' => $package->package_point,
            'package_name' => $package->name,
            'amount' => $packageAmount,
        ]);

        // 1st position 
        $myUplinevalid_refer_count = 0;
        $myupline_refer_users = User::where('refer_by', Auth::user()->refer_by)->get();
        $refer_id = Auth::user()->refer_by;
        $user1 = User::where('id', $refer_id)->first();
        foreach($myupline_refer_users as $myupline_refer_user){
            $sold_count = SoldPackage::where('user_id', $myupline_refer_user->id)->get()->count();

            if($sold_count > 0){
                $myUplinevalid_refer_count++;
            }
        }


        if( $myUplinevalid_refer_count >= 15){
            // return 'Hello World';
            $refer_id = Auth::user()->refer_by;
            $user1 = User::where('id', $refer_id)->first();
            $user1->smart_seller_status = 1;
            $user1->save();

            $myUplinevalid_refer_count1 = 0;
            $myupline_refer_users1 = User::where('id', $user1->refer_by)->get();
            $user2 = User::where('id', $user1->refer_by)->first();
            foreach($myupline_refer_users1 as $myupline_refer_user){
                $sold_count = SoldPackage::where('user_id', $myupline_refer_user->id)->get()->count();
                // dd($sold_count);
    
                if($sold_count > 0){
                    $myUplinevalid_refer_count1++;
                }
            }

            if( $myUplinevalid_refer_count1 >= 15){
                $user2->smart_seller_status = 2;
                $user2->save();
            }
           

            if(empty($user2->refer_by)){

            }else{

                $myUplinevalid_refer_count2 = 0;
                $myupline_refer_users2 = User::where('id', $user2->refer_by)->get();
                $user3 = User::where('id', $user2->refer_by)->first();
                foreach($myupline_refer_users2 as $myupline_refer_user){
                    $sold_count = SoldPackage::where('user_id', $myupline_refer_user->id)->get()->count();
                    // dd($sold_count);
        
                    if($sold_count > 0){
                        $myUplinevalid_refer_count2++;
                    }
                }

                if( $myUplinevalid_refer_count2 >= 15){
                    $user3->smart_seller_status = 3;
                    $user3->save();
                }

                
            }

            if(empty($user3->refer_by)){

            }else{
                $myUplinevalid_refer_count3 = 0;
                $myupline_refer_users3 = User::where('id', $user3->refer_by)->get();
                $user4 = User::where('id', $user3->refer_by)->first();
                foreach($myupline_refer_users3 as $myupline_refer_user){
                    $sold_count = SoldPackage::where('user_id', $myupline_refer_user->id)->get()->count();
                    // dd($sold_count);
        
                    if($sold_count > 0){
                        $myUplinevalid_refer_count3++;
                    }
                }

                if( $myUplinevalid_refer_count3 >= 15){
                    $user4->smart_seller_status = 4;
                    $user4->save();
                }
            }

            if(empty($user4->refer_by)){

            }else{
                $myUplinevalid_refer_count4 = 0;
                $myupline_refer_users4 = User::where('id', $user4->refer_by)->get();
                $user5 = User::where('id', $user4->refer_by)->first();
                foreach($myupline_refer_users4 as $myupline_refer_user){
                    $sold_count = SoldPackage::where('user_id', $myupline_refer_user->id)->get()->count();
                    // dd($sold_count);
        
                    if($sold_count > 0){
                        $myUplinevalid_refer_count4++;
                    }
                }

                if( $myUplinevalid_refer_count4 >= 15){
                    $user5->smart_seller_status = 5;
                    $user5->save();
                }

            }
        }

        // // 2nd position 
        // $myUplinevalid_refer_count1 = 0;
        // $myupline_refer_users1 = User::where('refer_by', $user1->refer_by)->get();
        // // dd($myupline_refer_users1);
        // $user2 = User::where('id', $user1->refer_by)->first();

        // if($myupline_refer_users1 == null){

        // }else{
        //     foreach($myupline_refer_users1 as $myupline_refer_user){
        //         $sold_count = SoldPackage::where('user_id', $myupline_refer_user->id)->get()->count();
                
    
        //         if($sold_count > 0){
        //             $myUplinevalid_refer_count1++;
        //         }
        //     }

        //     // dd($myUplinevalid_refer_count1);
    
        //     if( $myUplinevalid_refer_count1 >= 3){
        //         // return 'Hello World';
        //         $user2 = User::where('id', $user1->refer_by)->first();
        //         $user2->smart_seller_status = 2;
        //         $user2->save();
        //     }
        // }

        // return 'done';



        // // 3rd position 
        // if(empty($user2->refer_by)){

        // }else{
        //     $myUplinevalid_refer_count2 = 0;
        //     $myupline_refer_users2 = User::where('refer_by', $user2->refer_by)->get();
        //     $user3 = User::where('id', $user2->refer_by)->first();
        //     // dd($user3);
        //     foreach($myupline_refer_users2 as $myupline_refer_user){
        //         $sold_count = SoldPackage::where('user_id', $myupline_refer_user->id)->get()->count();
    
        //         if($sold_count > 0){
        //             $myUplinevalid_refer_count2++;
        //         }
        //     }
    
        //     if( $myUplinevalid_refer_count2 >= 3){
        //         // return 'Hello World';
        //         $user3 = User::where('id', $user2->refer_by)->first();
        //         $user3->smart_seller_status = 3;
        //         $user3->save();
        //     }
        // }

        

        // // 4th position 
        // if(empty($user3->refer_by)){

        // }else{
        //     $myUplinevalid_refer_count3 = 0;
        //     $myupline_refer_users3 = User::where('refer_by', $user3->refer_by)->get();
        //     $user4 = User::where('id', $user3->refer_by)->first();
        //     // dd($user3);
        //     foreach($myupline_refer_users3 as $myupline_refer_user){
        //         $sold_count = SoldPackage::where('user_id', $myupline_refer_user->id)->get()->count();
    
        //         if($sold_count > 0){
        //             $myUplinevalid_refer_count3++;
        //         }
        //     }
    
        //     if( $myUplinevalid_refer_count3 >= 3){
        //         // return 'Hello World';
        //         $user4 = User::where('id', $user3->refer_by)->first();
        //         $user4->smart_seller_status = 4;
        //         $user4->save();
        //     }
        // }

        // // 5th position
        // if(empty($user4->refer_by)){

        // }else{
        //     $myUplinevalid_refer_count4 = 0;
        //     $myupline_refer_users4 = User::where('refer_by', $user4->refer_by)->get();
        //     $user5 = User::where('id', $user4->refer_by)->first();
        //     // dd($user3);
        //     foreach($myupline_refer_users4 as $myupline_refer_user){
        //         $sold_count = SoldPackage::where('user_id', $myupline_refer_user->id)->get()->count();
    
        //         if($sold_count > 0){
        //             $myUplinevalid_refer_count4++;
        //         }
        //     }
    
        //     if( $myUplinevalid_refer_count4 >= 3){
        //         // return 'Hello World';
        //         $user5 = User::where('id', $user4->refer_by)->first();
        //         $user5->smart_seller_status = 5;
        //         $user5->save();
        //     }
        // }


        // return 'done';



        /* ================== Start All Rank ================== */
        // $refer_id = Auth::user()->refer_by;
        // // $user1 = User::where('refer_by', $refer_id)->first();
        // $user1 = User::where('id', $refer_id)->first();
        // $user1_count = User::where('refer_by', $refer_id)->count();
        // dd($user1_count);

        // /* ====== 1st Rank ======*/
        // if($user1_count >= 15){
        //     // return 'hi';

        //     $smart_selllers_gets = User::where('id', $user1->id)->get();
        //     $smart_seller_count = 0;

        //     foreach($smart_selllers_gets as $smart_selllers_get){
        //         $smart_selllers_package = SoldPackage::where('user_id', $smart_selllers_get->id)->count();

        //         if($smart_selllers_package > 0){
        //             $smart_seller_count++;
        //         }
        //         // echo $buy_package.'<br>';
        //     }

        //     if($smart_seller_count >= 15){
        //         // return 'hlw';
        //         $user1 = User::where('id', $refer_id)->first();
        //         $user1->smart_seller_status = 1;
        //         $user1->save();
        //     }
        //     // return 'done';


        //     $refer2_id = User::where('id', $user1->id)->first()->refer_by;
        //     if($refer2_id == true){
        //         $ambassador_seller_gets = User::where('id', $user1->id)->get();
        //         $ambassador_seller_count = 0;
        //         foreach($ambassador_seller_gets as $ambassador_seller_get){
        //             $ambassador_selllers_package = SoldPackage::where('user_id', $ambassador_seller_get->id)->count();
    
        //             if($ambassador_selllers_package > 0){
        //                 $ambassador_seller_count++;
        //             }
        //             // echo $buy_package.'<br>';
        //         }
    
        //         if($ambassador_seller_count >= 15){
        //             $user2 = User::where('id', $refer2_id)->first();
        //             $user2->smart_seller_status = 2;
        //             $user2->save();
        //         }
        //     }

        //     $refer3_id = User::where('id', $user2->id)->first()->refer_by;
        //     if($refer3_id != NULL){
        //         $user3 = User::where('id', $refer3_id)->first();
        //         $user3->smart_seller_status = 3;
        //         $user3->save();
        //     }
        //     // if($refer3_id == true){
                
        //     // }

        //     $refer4_id = User::where('id', $user3->id)->first()->refer_by;
            
        //     if($refer4_id == NULL){
                
        //     }else{
        //         $user4 = User::where('id', $refer4_id)->first();
        //         $user4->smart_seller_status = 4;
        //         $user4->save();

        //         $refer5_id = User::where('id', $user4->id)->first()->refer_by;
        //         if($refer5_id !=  NULL){
        //             $user5 = User::where('id', $refer5_id)->first();
        //             $user5->save();
        //         }
        //     }

            

        // }

        // return 'done';
        /* ================== End All Rank ==================== */

        // dd($pushData);

        $this->transaction($pushData->created_at, $package->amount, 1, 1, null, Auth::user()->id );
        
        /* ============== refer commission systeam ============== */
        $refer_id = Auth::user()->refer_by;
        $user_id = Auth::user()->id;
        $amount = $packageAmount / 100 * 25;
        $user = User::where('id', $refer_id)->first();
        $user->main_wallet = $user->main_wallet + $amount;
        $user->refer_bonus = $user->refer_bonus + $amount;
        $user->save();

        // $user_id = Auth::user()->id;
        // $amount = $packageAmount / 100 * 25;
        // $user = User::where('id', $user_id)->first();
        // $user->main_wallet = $user->main_wallet + $amount;
        // $user->refer_bonus = $user->refer_bonus + $amount;
        // $user->save();

        $admin =  User::where('role', 'admin')->first();
        $amount = $packageAmount / 100 * 50;
        $admin->main_wallet = $admin->main_wallet + $amount;
        $admin->save();
        /* ============== refer commission systeam ============== */

        $packageAmount = $packageAmount / 100 * 25;
        // return 'done';

        $refer_id = $user->refer_by;
        
        $this->referCommission($refer_id, $packageAmount,$package->id);

        // $this->referCommissionCount(Auth::user()->id, $packageAmount);
    
        if($pushData){
            // dd($pushData);
            $notification = array(
                'message' => 'Buy Package Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            return redirect()->back();
        }

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
        $request->validate([
            'amount' => 'required',
            'sender_number' => 'required',
            'wallet_address' => 'required',
            'transaction_id' => 'required',
            'screenshot' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $data = BalanceRequest::create([
            'user_id' => $request->user_id,
            'sender_number' => $request->sender_number,  
            'gateway' => $request->gateway,
            'amount' => $request->amount,
            'wallet_address' => $request->wallet_address,
            'transaction_id' => $request->transaction_id,
            'screenshot' => $request->screenshot,
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
            return redirect()->route('user.balance.request.list')->with($notification);
        }else{
            $notification = array(
                'message' => 'Something goes wrong!',
                'alert-type' => 'error'
            );
            return redirect()->route('balance.request.index')->with($notification);
        }
    }


    // user balance request show //
    public function balanceList()
    {
        $current_user = Auth::user()->id;
        $balanceRequests = BalanceRequest::where('user_id', $current_user)->latest()->get();
        return view('userpanel.user.balance_request.balance_request_list', compact('balanceRequests'));
    }

    // user buy package report  show //
    public function buyPackageReport()
    {
        $current_user = Auth::user()->id;
        $buypackageReport = SoldPackage::where('user_id', $current_user)->latest()->get();

        // dd($buypackageReport);

        return view('userpanel.user.package.buy_package_list', compact('buypackageReport'));
    }

    // user roc report  show //
    public function roc()
    {
        $current_user = Auth::user()->id;
        $rocReport = Transaction::where('user_id', $current_user)->where('purpose', 8)->latest()->get();
        // dd($rocReport);

        return view('userpanel.user.roc.roc_report', compact('rocReport'));
    }

    public function rocDelete($id)
    {
        $rocReport = Transaction::findOrFail($id);
        $rocReport->delete();

        $notification = array(
            'message' => 'Roc Report Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    }

    // user buy package report cron //
    public function buyPackageReportShow()
    {

            // dd($current_user);
            $current_saturday = 'Saturday';
            // dd($current_saturday);
            $current_sunday = 'Sunday';

            $saturday = date('l');
            // dd($saturday);
            $sunday = Carbon::tomorrow()->format('l');
            // dd($sunday);
            
            if($saturday != $current_saturday || $sunday != $current_sunday){

                $buypackageReportShow = SoldPackage::all();
                foreach ($buypackageReportShow as $key => $report) {

                    $day_payment = $report->day_payment + 1;
                    $packageAmount = $report->amount / 100 * 0.22 ;
                    // dd($packageAmount);
                    $user_id = $report->user_id;
                    // dd($user_id);
                    $user = User::where('id', $report->user_id)->first();

                    // dd($user);

                    if ($user != null) {
                        $user->roc += $packageAmount;
                        $user->roc_day = $user->roc_day + 1;
                        $user->updated_at = Carbon::now();
                        $user->save();

                        $this->transactionpackage(time(), $report->amount, 8, 5, null, $report->user_id);
                      
                    }

                }

            }else{

                $notification = array(
                    'message' => 'Something goes wrong!',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }



            $first_level = User::where('refer_by', Auth::user()->id);
            $first_count[] = $first_level->count();
            $first_total = [];
            $second_total = [];

            if ($first_level->count() >= 1) {
                foreach ($first_level->get() as $user) {
                    $first_total[] = $user->packages->sum('amount');

                    $second_level = User::where('refer_by', $user->id);
                    if ($second_level->count() >= 1) {
                        $second_count[] = $second_level->count();
                        foreach ($second_level->get() as $user2) {
                            $second_total[] = $user2->packages->sum('amount');

                            $third_level = User::where('refer_by', $user2->id);
                            if ($third_level->count() >= 1) {
                                $third_count[] = $third_level->count();
                                foreach ($third_level->get() as $user3) {
                                    $third_total[] = $user3->packages->sum('amount');

                                    $forth_level = User::where('refer_by', $user3->id);
                                    if ($forth_level->count() >= 1) {
                                        $forth_count[] = $forth_level->count();
                                        foreach ($forth_level->get() as $user4) {
                                            $forth_total[] = $user4->packages->sum('amount');

                                            $fifth_level = User::where('refer_by', $user4->id);
                                            if ($fifth_level->count() >= 1) {
                                                $fifth_count[] = $fifth_level->count();
                                                foreach ($fifth_level->get() as $user5) {
                                                    $fifth_total[] = $user5->packages->sum('amount');

                                                    $sixth_level = User::where('refer_by', $user5->id);
                                                    if ($sixth_level->count() >= 1) {
                                                        $sixth_count[] = $sixth_level->count();
                                                        foreach ($sixth_level->get() as $user6) {
                                                            $sixth_total[] = $user6->packages->sum('amount');

                                                            $seventh_level = User::where('refer_by', $user6->id);
                                                            if ($seventh_level->count() >= 1) {
                                                                $seventh_count[] = $seventh_level->count();
                                                                foreach ($seventh_level->get() as $user7) {
                                                                    $seventh_total[] = $user7->packages->sum('amount');

                                                                    $eight_level = User::where('refer_by', $user7->id);
                                                                    if ($eight_level->count() >= 1) {
                                                                        $eight_count[] = $eight_level->count();
                                                                        foreach ($eight_level->get() as $user8) {
                                                                            $eight_total[] = $user8->packages->sum('amount');

                                                                            $nineth_level = User::where('refer_by', $user8->id);
                                                                            if ($nineth_level->count() >= 1) {
                                                                                $nineth_count[] = $nineth_level->count();
                                                                                foreach ($nineth_level->get() as $user9) {
                                                                                    $nineth_total[] = $user9->packages->sum('amount');

                                                                                    $tenth_level = User::where('refer_by', $user9->id);
                                                                                    if ($tenth_level->count() >= 1) {
                                                                                        $tenth_count[] = $tenth_level->count() ?? 0;
                                                                                        foreach ($tenth_level->get() as $user10) {
                                                                                            $tenth_total[] = $user10->packages->sum('amount');
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $first_total = $first_total ?? [0];
            $first_total_sum = array_sum($first_total);
            $first_count = $first_count ?? [0];
            $first_count_sum = array_sum($first_count);

            $second_total = $second_total ?? [0];
            $second_total_sum = array_sum($second_total);
            $second_count = $second_count ?? [0];
            $second_count_sum = array_sum($second_count);

            $third_total = $third_total ?? [0];
            $third_total_sum = array_sum($third_total);
            $third_count = $third_count ?? [0];
            $third_count_sum = array_sum($third_count);

            $forth_total = $forth_total ?? [0];
            $forth_total_sum = array_sum($forth_total);
            $forth_count = $forth_count ?? [0];
            $forth_count_sum = array_sum($forth_count);

            $fifth_total = $fifth_total ?? [0];
            $fifth_total_sum = array_sum($fifth_total);
            $fifth_count = $fifth_count ?? [0];
            $fifth_count_sum = array_sum($fifth_count);

            $sixth_total = $sixth_total ?? [0];
            $sixth_total_sum = array_sum($sixth_total);
            $sixth_count = $sixth_count ?? [0];
            $sixth_count_sum = array_sum($sixth_count);

            $seventh_total = $seventh_total ?? [0];
            $seventh_total_sum = array_sum($seventh_total);
            $seventh_count = $seventh_count ?? [0];
            $seventh_count_sum = array_sum($seventh_count);

            $eight_total = $eight_total ?? [0];
            $eight_total_sum = array_sum($eight_total);
            $eight_count = $eight_count ?? [0];
            $eight_count_sum = array_sum($eight_count);

            $nineth_total = $nineth_total ?? [0];
            $nineth_total_sum = array_sum($nineth_total);
            $nineth_count = $nineth_count ?? [0];
            $nineth_count_sum = array_sum($nineth_count);

            $tenth_total = $tenth_total ?? [0];
            $tenth_total_sum = array_sum($tenth_total);
            $tenth_count = $tenth_count ?? [0];
            $tenth_count_sum = array_sum($tenth_count);

            $myScore = $first_total_sum + $second_total_sum + $third_total_sum + $forth_total_sum + $fifth_total_sum + $sixth_total_sum + $seventh_total_sum + $eight_total_sum + $nineth_total_sum + $tenth_total_sum;


            // dd($myScore);

            $notification = array(
                'message' => 'Success Done!',
                'alert-type' => 'success'
            );

            return view('userpanel.user.package.package_all_user', compact('buypackageReportShow', 'first_level',
            'first_count_sum',
            'first_total_sum',
            'second_total_sum',
            'second_count_sum',
            'third_total_sum',
            'third_count_sum',
            'forth_total_sum',
            'forth_count_sum',
            'fifth_total_sum',
            'fifth_count_sum',
            'sixth_total_sum',
            'sixth_count_sum',
            'seventh_total_sum',
            'seventh_count_sum',
            'eight_total_sum',
            'eight_count_sum',
            'nineth_total_sum',
            'nineth_count_sum',
            'tenth_total_sum',
            'tenth_count_sum',
            'myScore'))->with($notification);
        


    }



    /* ============== Start User Buy Package Transction Store =========== */
    public function transactionpackage($out, $amount, $purpose, $status, $from_id, $user_id){

        Transaction::create([
            'user_id' => $user_id,
            'from_id' => $from_id,
            'out' =>  $out,
            'purpose' => $purpose,
            'status' => $status,
            'amount' => $amount,
        ]);

    }
    /* ============== End User Buy Package Transction Store =========== */

    // deposite //
    public function deposite($user_id)
    {   
        // dd($user_id);
        $buy_package = SoldPackage::where('user_id', $user_id)->sum('amount');
        return $buy_package;
    }

    // deposite //
    public function depositeCount($user_id)
    {   
        // dd($user_id);
        $referby = User::where('refer_by', $user_id)->count('refer_by');
        // dd($referby);

        return $referby;
    } 


    // total deposite //
    public function totalDeposite($user_id)
    {   

        $first_level = User::where('refer_by', $user_id);
        $first_count[] = $first_level->count();
        $first_total = [];
        $second_total = [];

        $myScore = [];

        if ($first_level->count() >= 1) {
            foreach ($first_level->get() as $user) {
                $first_total[] = $user->packages->sum('amount');

                $second_level = User::where('refer_by', $user->id);
                if ($second_level->count() >= 1) {
                    $second_count[] = $second_level->count();
                    foreach ($second_level->get() as $user2) {
                        $second_total[] = $user2->packages->sum('amount');

                        $third_level = User::where('refer_by', $user2->id);
                        if ($third_level->count() >= 1) {
                            $third_count[] = $third_level->count();
                            foreach ($third_level->get() as $user3) {
                                $third_total[] = $user3->packages->sum('amount');

                                $forth_level = User::where('refer_by', $user3->id);
                                if ($forth_level->count() >= 1) {
                                    $forth_count[] = $forth_level->count();
                                    foreach ($forth_level->get() as $user4) {
                                        $forth_total[] = $user4->packages->sum('amount');

                                        $fifth_level = User::where('refer_by', $user4->id);
                                        if ($fifth_level->count() >= 1) {
                                            $fifth_count[] = $fifth_level->count();
                                            foreach ($fifth_level->get() as $user5) {
                                                $fifth_total[] = $user5->packages->sum('amount');

                                                $sixth_level = User::where('refer_by', $user5->id);
                                                if ($sixth_level->count() >= 1) {
                                                    $sixth_count[] = $sixth_level->count();
                                                    foreach ($sixth_level->get() as $user6) {
                                                        $sixth_total[] = $user6->packages->sum('amount');

                                                        $seventh_level = User::where('refer_by', $user6->id);
                                                        if ($seventh_level->count() >= 1) {
                                                            $seventh_count[] = $seventh_level->count();
                                                            foreach ($seventh_level->get() as $user7) {
                                                                $seventh_total[] = $user7->packages->sum('amount');

                                                                $eight_level = User::where('refer_by', $user7->id);
                                                                if ($eight_level->count() >= 1) {
                                                                    $eight_count[] = $eight_level->count();
                                                                    foreach ($eight_level->get() as $user8) {
                                                                        $eight_total[] = $user8->packages->sum('amount');

                                                                        $nineth_level = User::where('refer_by', $user8->id);
                                                                        if ($nineth_level->count() >= 1) {
                                                                            $nineth_count[] = $nineth_level->count();
                                                                            foreach ($nineth_level->get() as $user9) {
                                                                                $nineth_total[] = $user9->packages->sum('amount');

                                                                                $tenth_level = User::where('refer_by', $user9->id);
                                                                                if ($tenth_level->count() >= 1) {
                                                                                    $tenth_count[] = $tenth_level->count() ?? 0;
                                                                                    foreach ($tenth_level->get() as $user10) {
                                                                                        $tenth_total[] = $user10->packages->sum('amount');
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $first_total = $first_total ?? [0];
        $first_total_sum = array_sum($first_total);
        $first_count = $first_count ?? [0];
        $first_count_sum = array_sum($first_count);

        $second_total = $second_total ?? [0];
        $second_total_sum = array_sum($second_total);
        $second_count = $second_count ?? [0];
        $second_count_sum = array_sum($second_count);

        $third_total = $third_total ?? [0];
        $third_total_sum = array_sum($third_total);
        $third_count = $third_count ?? [0];
        $third_count_sum = array_sum($third_count);

        $forth_total = $forth_total ?? [0];
        $forth_total_sum = array_sum($forth_total);
        $forth_count = $forth_count ?? [0];
        $forth_count_sum = array_sum($forth_count);

        $fifth_total = $fifth_total ?? [0];
        $fifth_total_sum = array_sum($fifth_total);
        $fifth_count = $fifth_count ?? [0];
        $fifth_count_sum = array_sum($fifth_count);

        $sixth_total = $sixth_total ?? [0];
        $sixth_total_sum = array_sum($sixth_total);
        $sixth_count = $sixth_count ?? [0];
        $sixth_count_sum = array_sum($sixth_count);

        $seventh_total = $seventh_total ?? [0];
        $seventh_total_sum = array_sum($seventh_total);
        $seventh_count = $seventh_count ?? [0];
        $seventh_count_sum = array_sum($seventh_count);

        $eight_total = $eight_total ?? [0];
        $eight_total_sum = array_sum($eight_total);
        $eight_count = $eight_count ?? [0];
        $eight_count_sum = array_sum($eight_count);

        $nineth_total = $nineth_total ?? [0];
        $nineth_total_sum = array_sum($nineth_total);
        $nineth_count = $nineth_count ?? [0];
        $nineth_count_sum = array_sum($nineth_count);

        $tenth_total = $tenth_total ?? [0];
        $tenth_total_sum = array_sum($tenth_total);
        $tenth_count = $tenth_count ?? [0];
        $tenth_count_sum = array_sum($tenth_count);

        $myScore = $first_total_sum + $second_total_sum + $third_total_sum + $forth_total_sum + $fifth_total_sum + $sixth_total_sum + $seventh_total_sum + $eight_total_sum + $nineth_total_sum + $tenth_total_sum;

        return $myScore;
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
