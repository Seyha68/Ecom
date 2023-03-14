<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(10);
        return view('admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categorys = Category::get()->all();
        return view('admin.brands.create',compact('Categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->image);
        $request->validate(
            [
                'brand_name'=>'required',
                'category_id'=>'required',
                'image'=>'required',
            ]);
            $brand = new Brand;
            $brand->brand_name=$request->get('brand_name');
            $brand->category_id=$request->get('category_id');

            if($request->hasFile('image'))
             {
                $file = $request->file('image');
                $exe = $file->getClientOriginalExtension();
                $filename = time().'.'.$exe;

                $file->move('uploads/brands/',$filename);
                $brand->image = $filename;
            }
            $brand->status = $request->status == true ? '1':'0';
            $brand->save();
            return redirect('admin/brands')->with('message','Add Brands Successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show()
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $Categorys = Category::get()->all();
       $brands = Brand::find($id);
       return view('admin.brands.edit',compact('brands','Categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate(
            [
                'brand_name'=>'required',
                'category_id'=>'required',
                'image' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
            ]);
            $brand = Brand::find($id);
            $brand->brand_name=$request->get('brand_name');
            $brand->category_id=$request->get('category_id');

            if($request->hasFile('image'))
             {
                $file = $request->file('image');
                $exe = $file->getClientOriginalExtension();
                $filename = time().'.'.$exe;

                $file->move('uploads/brands/',$filename);
                $brand->image = $filename;
            }
            $brand->status = $request->status == true ? '1':'0';
            $brand->save();
            return redirect('admin/brands')->with('message','Update Brands Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $path = 'uploads/brands/'.$brand->image;
                if(File::exists($path)){
                    File::delete($path);
                }
                $brand->delete();
        return  redirect('admin/brands')->with('message','Deleted brands successfully.');
    }
}
