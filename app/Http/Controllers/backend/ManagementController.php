<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Managment;
use Illuminate\Support\Carbon;
use Image;
use Session;


class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.management.create');
    } // End Index Mathod
    public function index()
    {
        $managements = Managment::all();
        return view('admin.management.index',compact('managements'));
    } // End Index Mathod

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[
            'photo'=>'required'
        ]);

        if($request->hasfile('photo')){
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/banner/'.$name_gen);
            $photo = 'upload/banner/'.$name_gen;
        }else{
            $photo = $request->photo;
        }

       $management = new Managment;

        if($request->status == Null){
            $request->status = 0;
        }

        $management->position = $request->position;
        $management->name = $request->name;
        $management->designation = $request->designation;
        $management->number = $request->number;
        $management->experience = $request->experience;
        $management->photo = $photo;
        $management->created_at = Carbon::now();
        $management->save();



        Session::flash('success','Management Inserted Successfully');
        return redirect()->route('management.index');
    } // End Store Mathod

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

       $management = Managment::find($id);
    return view('admin.management.edit', compact('management'));
    } // End Edit Mathod

    public function view($id)
    {
        $management = Managment::find($id);
        return view('admin.management.view',compact('management'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
       $management = Managment::find($id);

        if($request->hasfile('photo')){
            try {
                if(file_exists($management->photo)){
                    unlink($management->photo);
                }
            } catch (Exception $e) {

            }
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/banner/'.$name_gen);
            $photo = 'upload/banner/'.$name_gen;
        }else{
            $photo = $management->photo;
        }


        if($request->status == Null){
            $request->status = 0;
        }
        $management->position = $request->position;
        $management->name = $request->name;
        $management->designation = $request->designation;
        $management->number = $request->number;
        $management->experience = $request->experience;

        $management->updated_at = Carbon::now();

        $management->save();

        Session::flash('success','Management Updated Successfully');
        return redirect()->route('management.index');

    } // End Update Mathod

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $management = Managment::findOrFail($id);

        try {
            if(file_exists($management->photo)){
                unlink($management->photo);
            }
        } catch (Exception $e) {

        }

        $management->delete();

        $notification = array(
            'message' => 'Management Delete Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);


    } // End destroy Mathod


    public function active($id){

        $management = Managment::find($id);
        $management->status = 1;
        $management->save();

        Session::flash('success','Management Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $management = Managment::find($id);
        $management->status = 0;
        $management->save();

        $notification = array(
            'message' => 'Management Disabled Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
