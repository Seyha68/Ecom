<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id','DESC')->paginate(10);
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $slider  Slider::get
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title'=>'required',
                'image'=>'required',
                'description'=>'required',


            ]);
            $sliders = new Slider;
            $sliders->title=$request[('title')];
            $sliders->image=$request[('image')];
            $sliders->description=$request[('description')];

            if($request->hasFile('image'))
             {
                $file = $request->file('image');
                $exe = $file->getClientOriginalExtension();
                $filename = time().'.'.$exe;

                $file->move('uploads/sliders/',$filename);
                $sliders->image = $filename;
            }
            $sliders->save();
            return redirect('admin/sliders')->with('message','Add slider Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliders = Slider::find($id);
       return view('admin.sliders.edit',compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate(
            [
                'title'=>'required',
                // 'image'=>'required',
                'description'=>'required',


            ]);
            $sliders = Slider::find($id);
            $sliders->title=$request[('title')];
            $sliders->image=$request[('image')];
            $sliders->description=$request[('description')];

            if($request->hasFile('image'))
             {
                $file = $request->file('image');
                $exe = $file->getClientOriginalExtension();
                $filename = time().'.'.$exe;

                $file->move('uploads/sliders/',$filename);
                $sliders->image = $filename;
            }
            $sliders->save();
            return redirect('admin/sliders')->with('message','Update slider Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliders = Slider::find($id);
        $path = 'uploads/sliders/'.$sliders->image;
                if(File::exists($path)){
                    File::delete($path);
                }
                $sliders->delete();
        return  redirect('admin/sliders')->with('message','Deleted slider successfully.');
    }
}
