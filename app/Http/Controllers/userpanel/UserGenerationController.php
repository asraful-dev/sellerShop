<?php

namespace App\Http\Controllers\userpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Generation;
use Auth;

class UserGenerationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $current_user = Auth::user()->id;
        $generations = Generation::where('to_id', $current_user)->where('purpose',1)->get();
        // dd($generations);
        // $generations = Generation::all();
        
        return view('userpanel.user.generation.index', compact('generations'));
    }

    public function productindex()
    {
       
        $current_user = Auth::user()->id;
        $generations = Generation::where('to_id', $current_user)->where('purpose',2)->get();
        // dd($generations);
        // $generations = Generation::all();
        
        return view('userpanel.user.generation.product_index', compact('generations'));
    }

    //  user reffrel show //
    public function refferelIndex(Request $request)
    {
        //  dd($request->id);
        $current_user = Auth::user()->id;
        
        $request_id = $_SERVER["QUERY_STRING"];
        if ($request_id) {
            $id = $request->id;
        } else {
            $id = Auth::user()->id;
        }
        
       $refferel_users = User::where('refer_by', $id)->get();
  
        // dd($refferel_users);
        
        return view('userpanel.user.generation.refferel_index', compact('refferel_users'));
        // return view('frontend.referral.refeferel_index', compact('refferel_users'));
    }
    
    public function refferelSingleIndex($id)
    {
        $single_all_user = User::where('refer_by', $id)->get();
        // dd($single_all_user);
        return view('userpanel.user.generation.refferel_single_index');
        // return view('frontend.referral.refeferel_index', compact('refferel_users'));
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
