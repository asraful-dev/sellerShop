<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\ChekoutSetting;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;


class AdminUserListController extends Controller
{

    /*=================== User List Show Methoed ===================*/
    public function userList()
    {
        $users = User::orderBy('name', 'asc')->get();
        return view('admin.users.index', compact('users'));
    }
    
    /*=================== Active User List Show Methoed ===================*/
    public function activeuserList()
    {
        $users = User::where('role','user')->where('resell_status',1)->latest()->get();
        return view('admin.users.active_index', compact('users'));
    }

    /*=================== Admin User Edit Methoed ===================*/
    public function userEdit($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.edit', compact('user'));
    }

    /*=================== Admin User Update Methoed ===================*/
    public function userUpdate(Request $request, $id){

       $userupdate = User::findOrFail($id);

       $request->validate([
        'name' => 'string',
        'email'=> 'email',
        'fund_wallet'=> 'required',
        'email'=> 'email',
       ]);

       if (!Hash::check($request->old_password, $userupdate->password)) {
                
            $notification = array(
                'message' => "Old Password Doesn't Match!!.",
                'alert-type' => 'error'
            );
            return redirect()->route('admin.user.index')->with($notification);
        }

        // Update The new password

       $userupdate = $userupdate->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'country' => $request->country,
            'fund_wallet' => $request->fund_wallet,
            'main_wallet' => $request->main_wallet,
            'password' => Hash::make($request->new_password),
            'show_password' => $request->new_password
       ]);

       if($userupdate){
            $notification = array(
                'message' => 'User Updated Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.user.index')->with($notification);
       }else{
            $notification = array(
                'message' => 'User Updated Successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
       }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Password::min(6)],
            
        ]);

        $refer_id = User::where('phone', $request->refer_by)->first();

        if ($refer_id == null) {
            $notification = array(
                'message' => 'Please provide valid phone!.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else {
            $refer_id = $refer_id->id;


            $details =  User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'refer_by' => $refer_id,
                'role' => 'user',
                'show_password' => $request->password,
                'country' => $request->country,
                'phone' => $request->phone,
            ]);

            // Mail::to($request->email)->send(new newUserMailLayout($details));

            $ChekoutSetting = ChekoutSetting::where('status',1)->where('title','rigister_offer_amount')->first();
            
            if($ChekoutSetting == true){
                $user = User::where('id',$details->id)->first();
                $amount = $user->fund_wallet+100;
                $user->fund_wallet = $amount;
                $user->save();
            }


            $notification = array(
                'message' => 'User Register Successfully.',
                'alert-type' => 'success'
            );

            // event(new Registered($user));

            // Auth::login($user);
        
            return redirect()->route('admin.user.index')->with($notification);
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
        User::where('id', $id)->delete();
        $notification = array(
            'message' => 'User Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->route('admin.user.index')->with($notification);
    }
}
