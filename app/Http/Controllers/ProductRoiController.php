<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use App\Membership;
// use App\Quiz;
// use App\Voucher;
 use App\Mining;
// use App\User;
use App\Models\SoldPackage;
use App\Models\Commission;
use App\Models\Transaction;
use App\Models\Generation;
use App\Models\User;
use App\Models\Order;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductRoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $current_user = Auth::User()->id;
        $transferHistories = Transaction::where('purpose', 9)->orderBy('id', 'DESC')->get();
        return view('admin.product_roi.index',compact('transferHistories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $memberships = SoldPackage::all();
        // $memberships = "";
        return view('admin.product_roi.create',compact('memberships'));
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
        
        // return 'hi';
        
        $minning_all = Order::all();
        
        foreach($minning_all as $minning){
            
            $first_user_id = $minning->user_id;
            $amount = $minning->grand_total;

            $user = User::where('id',$minning->user_id)->first();

            if ($minning->resell_type == 2) {
                $comminssion = $amount/100*0.56;
                $user->roc_resell =  $user->roc_resell + $comminssion;
                $user->save();

                $trans = new Transaction;
                $trans->user_id = $user->id;
                $trans->purpose = 10;
                $trans->status = 2;
                $trans->amount = $comminssion;
    
                $trans->save();

            }else {
                $comminssion = $amount/100*0.140;
                $user->roi_purchase =  $user->roi_purchase + $comminssion;
                $user->save();

                $trans = new Transaction;
                $trans->user_id = $user->id;
                $trans->purpose = 10;
                $trans->status = 1;
                $trans->amount = $comminssion;
    
                $trans->save();
            }
            
           
             //dd($minning->user_id);
            
           

           

            $this->roiCommission($user->id, $comminssion);
        }

      
       








        // $validatedData = $request->validate([
        //     'title' => 'required|string|max:191',
        //     'fake1' => 'required||string|max:191',
        //     'fake2' => 'required||string|max:191',
        //     'fake3' => 'required||string|max:191',
        //     'answer' => 'required||string|max:191',
        //     'amount' => 'required|numeric|max:5000',
        //     'membership' => 'required|numeric|max:100',
        //     'hints' => 'required||string|max:191',
        // ]);


        // $quiz = new Quiz();
        // $quiz->title = $request->title;
        // $quiz->hints = $request->hints;
        // $quiz->membership_id = 1;
        // $quiz->fake_answer1 = $request->fake1;
        // $quiz->fake_answer2 = $request->fake2;
        // $quiz->fake_answer3 = $request->fake3;
        // $quiz->right_answer = $request->answer;
        // $quiz->rewards = $request->amount;
        // $quiz->membership_id = $request->membership;
        // $quiz->status = 1;
        // $quiz->save();




        // session()->flash('notify', 'Quiz Create Successful.');
        // Session::flash('type', 'success');
        // Session::flash('title', '<strong>Quiz Creation Success</strong><br>');

        return redirect()->back();

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
    public function deactivate($id)
    {
        //

        $article = Quiz::findOrFail($id);
        $article->status = 0;
        $article->save();

        session()->flash('notify', "The Quiz Successfully Marked As Deactivate!");
        Session::flash('type', 'success');
        Session::flash('title', 'Deactivated Successful!');

        return redirect()->back();

    }
    public function activate($id)
    {
        //

        $article = Quiz::findOrFail($id);
        $article->status = 1;
        $article->save();

        session()->flash('notify', "The Quiz Successfully Marked As Activate!");
        Session::flash('type', 'success');
        Session::flash('title', 'Activated Successful!');

        return redirect()->back();

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
        $article = Quiz::findOrFail($id);
        $article->delete();

        session()->flash('notify', "The Quiz Successfully Deleted Permanently!");
        Session::flash('type', 'success');
        Session::flash('title', 'Deleted Successful!');

        return redirect()->back();
    }

    public function roiCommission($user, $amount){

        // $data = Commission::where('id', 1)->first();
        
        // 1st refer
        // $user_data
        // $refer_id = Auth::user()->refer_by;

        $refer1_commission = $amount / 100 * 6;
        $user1 = User::where('id', $user)->first()->refer_by;
        $user2 = User::where('id', $user1)->first();

        
        if($user1 == true){
            $user2->main_wallet = $user2->main_wallet + $refer1_commission;
            $user2->save();
    
            $this->transaction(time(), $refer1_commission, 2, 2, $user, $user2->id);
    
            $this->generation($user, $user2->id, 1, time(), 1, $refer1_commission, $amount);
        }else{
            return back();
        }
    
    
        

        // 2nd refer
        $refer2_id = User::where('id', $user)->first()->left_placement;
        // dd($refer2_id);
        if($refer2_id != NULL){
            $refer2_commission = $amount / 100 * 5;
            $user2 = User::where('id', $refer2_id)->first();
            $user2->main_wallet = $user2->main_wallet + $refer2_commission;
            $user2->save();
    
            $this->transaction(time(), $refer2_commission, 2, 2, $user, $refer2_id);
    
            $this->generation($user, $refer2_id, 1, time(), 2, $refer2_commission, $amount);
        }else{
          return back();
        }


        // 3rd refer
        $refer3_id = User::where('id', $user2->id)->first()->refer_by;
        if($refer3_id != NULL){
            $refer3_commission = $amount / 100 * 4;
            $user3 = User::where('id', $refer3_id)->first();
            $user3->main_wallet = $user3->main_wallet + $refer3_commission;
            $user3->save();

            $this->transaction(time(), $refer3_commission, 2, 2, $user, $refer3_id);

            $this->generation($user, $refer3_id, 1, time(), 2, $refer3_commission, $amount);
        }else{
            return back();
         }

        // 4th refer
        $refer4_id = User::where('id', $user3->id)->first()->refer_by;
        if($refer4_id != NULL){
            $refer4_commission = $amount / 100 * 3;
            $user4 = User::where('id', $refer4_id)->first();
            $user4->main_wallet = $user4->main_wallet + $refer4_commission;
            $user4->save();

            $this->transaction(time(), $refer4_commission, 2, 2, $user, $refer4_id);

            $this->generation($user, $refer4_id, 1, time(), 2, $refer4_commission, $amount);
        }else{
            return back();
         }

         // 5th refer
        $refer5_id = User::where('id', $user4->id)->first()->refer_by;
        if($refer5_id != NULL){
            $refer5_commission = $amount / 100 * 2;
            $user5 = User::where('id', $refer5_id)->first();
            $user5->main_wallet = $user5->main_wallet + $refer5_commission;
            $user5->save();

            $this->transaction(time(), $refer5_commission, 2, 2, $user, $refer5_id);

            $this->generation($user, $refer5_id, 1, time(), 2, $refer5_commission, $amount);
        }else{
            return back();
        }

        //  // 6th refer
        // $refer6_id = User::where('id', $user5->id)->first()->refer_by;
        // if($refer6_id != NULL){
        //     $refer6_commission = $amount / 100 * $data->refer6;
        //     $user6 = User::where('id', $refer6_id)->first();
        //     $user6->main_wallet = $user6->main_wallet + $refer6_commission;
        //     $user6->save();

        //     $this->transaction(time(), $refer6_commission, 2, 2, Auth::user()->id, $refer6_id);

        //     $this->generation(Auth::user()->id, $refer6_id, 1, time(), 2, $refer6_commission, $amount);
        // }else{
        //     return back();
        //  }

//         // 7th refer
//         $refer7_id = User::where('id', $user6->id)->first()->refer_by;
//         if($refer7_id != NULL){
//             $refer7_commission = $amount / 100 * $data->refer7;
//             $user7 = User::where('id', $refer7_id)->first();
//             $user7->main_wallet = $user7->main_wallet + $refer7_commission;
//             $user7->save();

//             $this->transaction(time(), $refer7_commission, 2, 2, Auth::user()->id, $refer7_id);

//             $this->generation(Auth::user()->id, $refer7_id, 1, time(), 2, $refer7_commission, $amount);
//         }else{
//             return back();
//          }

//         // 8th refer
//         $refer8_id = User::where('id', $user7->id)->first()->refer_by;
//         if($refer8_id != NULL){
//             $refer8_commission = $amount / 100 * $data->refer8;
//             $user8 = User::where('id', $refer8_id)->first();
//             $user8->main_wallet = $user8->main_wallet + $refer8_commission;
//             $user8->save();

//             $this->transaction(time(), $refer8_commission, 2, 2, Auth::user()->id, $refer8_id);

//             $this->generation(Auth::user()->id, $refer8_id, 1, time(), 2, $refer8_commission, $amount);
//         }else{
//             return back();
//          }

//         // 9th refer
//         $refer9_id = User::where('id', $user8->id)->first()->refer_by;
//         if($refer9_id != NULL){
//             $refer9_commission = $amount / 100 * $data->refer9;
//             $user9 = User::where('id', $refer9_id)->first();
//             $user9->main_wallet = $user9->main_wallet + $refer9_commission;
//             $user9->save();

//             $this->transaction(time(), $refer9_commission, 2, 2, Auth::user()->id, $refer9_id);

//             $this->generation(Auth::user()->id, $refer9_id, 1, time(), 2, $refer9_commission, $amount);
//         }else{
//             return back();
//          }

//         // 10th refer
//         $refer10_id = User::where('id', $user9->id)->first()->refer_by;
//         if($refer10_id != NULL){
//             $refer10_commission = $amount / 100 * $data->refer10;
//             $user10 = User::where('id', $refer10_id)->first();
//             $user10->main_wallet = $user10->main_wallet + $refer10_commission;
//             $user10->save();

//             $this->transaction(time(), $refer10_commission, 2, 2, Auth::user()->id, $refer10_id);

//             $this->generation(Auth::user()->id, $refer10_id, 1, time(), 2, $refer10_commission, $amount);
//         }else{
//             return back();
//         }

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
