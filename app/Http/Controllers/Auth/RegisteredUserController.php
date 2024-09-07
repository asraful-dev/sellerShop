<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Mail\newUserMailLayout;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->all();
        try {
            $username = strtok($request->name, " ");
            $refer_id = User::where('username', $request->refer_by)->first();
            // $placement_id = User::where('username', $request->placement_id)->first();
            $phone = User::where('phone', $request->phone)->first();
            $placement = $request->placement;

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            if($phone){
                $notification = array(
                    'message' => 'Phone Number Already Exist!.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }

            if ($refer_id == null) {
                $notification = array(
                    'message' => 'Please provide valid Username!.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            } else {

                $refer_id = $refer_id->id;
                // dd($refer_id);


                // $placement_id = $placement_id->id;

                $details =  User::create([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'refer_by' => $refer_id,
                    // 'left_placement' => $placement_id,
                    'role' => 'user',
                    'show_password' => $request->password,
                    'country' => $request->country,
                    'phone' => $request->phone,
                    'division_id' => $request->division_id,
                    'district_id' => $request->district_id,
                    'upazilla_id' => $request->upazilla_id,
                    
                ]);
                

                // Mail::to($request->email)->send(new newUserMailLayout($details));


                $notification = array(
                    'message' => 'User Register Successfully.',
                    'alert-type' => 'success'
                );

                return redirect()->route('login')->with($notification);
            }
        } catch (\RuntimeException $e) {


            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);


            $refer_id = User::where('username', $request->refer_by)->first();
            // dd($refer_id);
            $phone = User::where('phone', $request->phone)->first();

            if($phone){
                $notification = array(
                    'message' => 'Phone Number Already Exist!.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }

            if ($refer_id == null) {
                $notification = array(
                    'message' => 'Please provide valid Username!.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            } else {

                $refer_id = $refer_id->id;
                // dd($refer_id);

                // $placement_id = $placement_id->id;

                $details =  User::create([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'refer_by' => $refer_id,
                    // 'left_placement' => $placement_id,
                    'role' => 'user',
                    'show_password' => $request->password,
                    'country' => $request->country,
                    'phone' => $request->phone,
                    'division_id' => $request->division_id,
                    'district_id' => $request->district_id,
                    'upazilla_id' => $request->upazilla_id,
                    
                ]);

                // Mail::to($request->email)->send(new newUserMailLayout($details));


                $notification = array(
                    'message' => 'User Register Successfully.',
                    'alert-type' => 'success'
                );

                return redirect()->route('login')->with($notification);

                // event(new Registered($user));

                // Auth::login($user);

                return redirect()->route('dashboard')->with($notification);
            }
        }
    }
}
