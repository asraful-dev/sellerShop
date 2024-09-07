<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SoldPackage;
use App\Models\Generation;
use Auth;
use DB;
use Session;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {


        return view('frontend.user.dashboard');
        // $user_id = Auth::User()->id;
        // // dd($current_user);
        // $referby_id_one = User::where('refer_by', $user_id)->get('id');
        // $refer_by_array_one = $referby_id_one->toArray();

        // $first_level_count = SoldPackage::whereIn('user_id', $refer_by_array_one)->sum('amount');
        // dd($first_level_count);

        // foreach($referby_id_one as $user){
        //     $second_level_count = SoldPackage::whereIn('user_id', $user)->sum('amount');
        //     dd($second_level_count);
        // }


        // return view('frontend.user.dashboard', compact('first_level_count'));

    }


    /* ==============  start user reffer convert method ============== */
    public function refferConvert(){

        $reffer_bonus = Auth::user()->refer_bonus;

        if(empty($reffer_bonus)){

            $notification = array(
                'message' => "Reffer Bonus Empty.Doesn't Contverted Reffer Bonus.!",
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }else{

            $reffer_bonus = Auth::user()->refer_bonus;

            $current_user = Auth::user()->id;

            $targetUser = User::where('id', $current_user)->first();

            $targetUser->main_wallet = $targetUser->main_wallet + $reffer_bonus;
            $targetUser->refer_bonus = 0;
            $targetUser->save();


            $notification = array(
                'message' => 'Admin Reffer Converted Successfully.!',
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }

    }
    /* ==============  end user reffer convert method ============== */

    /* ==============  start user rocconvert convert method ============== */
    public function rocConvert(){

        $roc = Auth::user()->roc;

        if(empty($roc)){

            $notification = array(
                'message' => "ROC Bonus Empty.Doesn't Contverted ROC Bonus.!",
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }else{

            $current_user = Auth::user()->id;

            $targetUser = User::where('id', $current_user)->first();

            $targetUser->main_wallet = $targetUser->main_wallet + $roc;
            $targetUser->roc = 0;
            $targetUser->save();


            $notification = array(
                'message' => 'Admin ROC Converted Successfully.!',
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }

    }
    /* ==============  end user rocconvert convert method ============== */

    /* ==============  start user genconvert convert method ============== */
    public function genConvert(){

        $current_user = Auth::User()->id;
        $generation_amount = Generation::where('from_id', $current_user)->where('purpose', 1)->sum('amount');


        if(empty($generation_amount)){
            $notification = array(
                'message' => "Generation Bonus Empty.Doesn't Contverted Generation Bonus.!",
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }else{

            $targetUser = User::where('id', $current_user)->first();

            $targetUser->main_wallet = $targetUser->main_wallet + $generation_amount;
            $targetUser->save();



            DB::table('generations')->where('from_id', $current_user)->where('purpose', 1)->delete();

            $notification = array(
                'message' => 'Admin Generation Converted Successfully.!',
                'alert-type' => 'success'
            );

            return back()->with($notification);
            }


    }
    /* ==============  end user genconvert convert method ============== */



    // generation stroe data //

    /*=================== Start Logout Methoed ===================*/
    public function UserLogout(Request $request){


        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } // end method
    /*=================== End Logout Methoed ===================*/



    public function editorHome()
    {
        return view('home',["msg"=>"I am Editor role"]);
    }

    /*=================== User Profile View Method ===================*/
    public function profileView()
    {
        return view('userpanel.user.setting.profile_view');
    }

    /*=================== User Profile Edit Method ===================*/
    public function profileEdit()
    {
        return view('userpanel.user.setting.profile_edit');
    }

    /*=================== User Profile Update Method ===================*/
    public function profileUpdate(Request $request, $id)
    {
        $adminData = User::find($id);
        // dd($adminData);

        $adminData->name = $request->name;
        $adminData->email = $request->email;
        $adminData->phone = $request->phone;
        $adminData->country = $request->country;

        // if ($request->hasFile('profile_photo')) {

        //     $profile_photo  = $request->file('profile_photo');
        //     $filename    = uniqid() . '.' . $profile_photo->extension('profile_photo');
        //     $location    = public_path('upload/user_images');

        //     $profile_photo->move($location, $filename);

        //     $adminData->profile_photo = $filename;
        // }

        if ($request->file('profile_photo')) {
            $file = $request->file('profile_photo');
            @unlink(public_path('upload/user_images/'.$data->profile_photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $adminData['profile_photo'] = $filename;
        }

        $adminData->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /*=================== User Password Change Method ===================*/
    public function UserChangePassword()
    {
        return view('userpanel.user.setting.password_change_view');
    }

    /*=================== User Password Update Method ===================*/
    // User Password Change
    public function UserUpdatePassword(Request $request){
        // Validation
        // $request->validate([
        //     'old_password' => 'required',
        //     'new_password' => 'required|confirmed'

        // ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {

            $notification = array(
                'message' => "Old Password Doesn't Match!!.",
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        // Update The new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);

        $notification = array(
            'message' => 'Password Changed Successfully.',
            'alert-type' => 'success'
        );

       return redirect()->back()->with($notification);

    } // End Mehtod

    public function blank()
    {
        $current_user = Auth::user()->id;
        $buypackageReport = SoldPackage::where('user_id', $current_user)->latest()->get();
        return view('userpanel.user.setting.blank_page', compact('buypackageReport'));
    }

    // deposite //
    public function deposite()
    {
        $buy_package = SoldPackage::where('user_id', $current_user)->sum('amount');
        return view('userpanel.user.setting.blank_page', compact('buypackageReport'));
    }


}
