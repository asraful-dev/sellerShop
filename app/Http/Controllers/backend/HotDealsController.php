<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotDealsSlider;
use Illuminate\Support\Carbon;
use Image;
use Session;

class HotDealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = HotDealsSlider::latest()->get();
        return view('admin.hot_deals_slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hot_deals_slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'slider_img' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if($request->hasfile('slider_img')){
            $image = $request->slider_img;
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;
        }else{
            $save_url = '';
        }

        $slider = new HotDealsSlider();

        if($request->status == Null){
            $request->status = 0;
        }
        $slider->status = $request->status;
        $slider->slider_img = $save_url;
        $slider->created_at = Carbon::now();

        $slider->save();

        Session::flash('success','Slider Inserted Successfully');
        return redirect()->route('hot_deals_slider.index');
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
        $slider = HotDealsSlider::find($id);
        return view('admin.hot_deals_slider.edit',compact('slider'));
    }
    public function view($id)
    {
        $slider = HotDealsSlider::find($id);
        return view('admin.hot_deals_slider.view',compact('slider'));
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
        $slider = HotDealsSlider::find($id);

        if($request->hasfile('slider_img')){
            try {
                if(file_exists($slider->slider_img)){
                    unlink($slider->slider_img);
                }
            } catch (Exception $e) {

            }
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/slider/'.$name_gen);
            $slider_img = 'upload/slider/'.$name_gen;
        }else{
            $slider_img = $slider->slider_img;
        }

       if($request->status == Null){
            $request->status = 0;
        }
        $slider->status = $request->status;

        $slider->slider_img = $slider_img;

        $slider->updated_at = Carbon::now();

        $slider->save();

        Session::flash('success','Slider Updated Successfully');
        return redirect()->route('hot_deals_slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $slider = HotDealsSlider::findOrFail($id);

        try {
            if(file_exists($slider->slider_img)){
                unlink($slider->slider_img);
            }
        } catch (Exception $e) {

        }

        $slider->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


    public function active($id){
        $slider = HotDealsSlider::find($id);
        $slider->status = 1;
        $slider->save();

        Session::flash('success','Slider Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $slider = HotDealsSlider::find($id);
        $slider->status = 0;
        $slider->save();

        Session::flash('success','Slider Disabled Successfully.');
        return redirect()->back();
    }
}
