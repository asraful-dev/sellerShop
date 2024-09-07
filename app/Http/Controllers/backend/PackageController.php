<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Orders;
use Image;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return view('admin.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.package.create');
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
            'name'  => 'required',
            'amount'  => 'required',
            'day'  => 'required',
            'percentage'  => 'required',
        ]);

        // $package = Package::create([
        //     'name' => $request->name,
        //     'amount' => $request->amount,
        //     'day' => $request->day,
        //     'percentage' => $request->percentage,
        // ]);

        if($request->hasfile('icon')){
            $image = $request->file('icon');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(700,400)->save('upload/icon/'.$name_gen);
            $icon = 'upload/icon/'.$name_gen;
        }else{
            $icon = $request->icon;
        }

        $package = new Package;

        $package->name = $request->name;
        $package->amount = $request->amount;
        $package->day = $request->day;
        $package->percentage = $request->percentage;
        $package->package_point = $request->package_point;

        $package->icon = $icon;
        $package->save();

        $notification = array(
            'message' => 'Package Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('package.list')->with($notification);

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
        $package = Package::findOrFail($id);
        return view('admin.package.edit', compact('package'));

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

        $package = Package::findOrFail($id);

        if($request->hasfile('icon')){
            try {
                if(file_exists($package->icon)){
                    unlink($package->icon);
                }
            } catch (Exception $e) {

            }
            
            $image = $request->file('icon');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(700,400)->save('upload/icon/'.$name_gen);
            $icon = 'upload/icon/'.$name_gen;
        }else{
            $icon = $package->icon;

        }

        $package->name = $request->name;
        $package->amount = $request->amount;
        $package->day = $request->day;
        $package->percentage = $request->percentage;
        $package->package_point = $request->package_point;

        $package->icon = $icon;

        $package->save();

        $notification = array(
            'message' => 'Package Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('package.list')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $icon = $package->icon;
        unlink($icon);

        $package->delete();

        $notification = array(
            'message' => 'Package Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
