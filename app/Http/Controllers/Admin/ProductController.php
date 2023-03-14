<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Categorys = Category::get()->all();
        $products = Product::orderBy('id','DESC')->paginate(10);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categorys = Category::get()->all();
        $brands = Brand::all();

        return view('admin.products.create',compact('Categorys','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd( $request);
        $request->validate(
            [
                'prod_name'=>'required',
                'description'=>'required',
                'category_id'=>'required',
                'image'=>'required',
                // 'status'=>'required',
                'original_price'=>'required',
                'selling_price'=>'required',
                'quanlity'=>'required',

            ]);
            $products = new Product;
            $products->prod_name=$request->get('prod_name');
            $products->description=$request->get('description');
            $products->category_id=$request->get('category_id');
            // $products->image=$request('image');
            $products->original_price=$request->get('original_price');
            $products->selling_price=$request->get('selling_price');
            $products->quanlity=$request->get('quanlity');

            if($request->hasFile('image'))
             {
                $file = $request->file('image');
                $exe = $file->getClientOriginalExtension();
                $filename = time().'.'.$exe;

                $file->move('uploads/products/',$filename);
                $products->image = $filename;
            }
            $products->status = $request->status == true ? '1':'0';
            $products->save();
            //   dd($products);
            return  redirect('admin/products')->with('message','Add products successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $Categorys = Category::get()->all();
        $products = Product::find($id);
        return view('admin.products.edit',compact('products','Categorys'));
    //     $brands = Brand::all();
    //     $Categorys = Category::get()->all();
    //    $products = Product::where('status','0')->findOrFail($id);
    //    return view('admin.products.edit',compact('products','Categorys','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'prod_name'=>'required',
                'description'=>'required',
                'category_id'=>'required',
                'image'=>'required',
                // 'status'=>'required',
                'original_price'=>'required',
                'selling_price'=>'required',
                'quanlity'=>'required',

            ]);
            $products =  Product::find($id);
            $products->prod_name=$request->get('prod_name');
            $products->description=$request->get('description');
            $products->category_id=$request->get('category_id');
            // $products->image=$request[('image')];
            $products->original_price=$request->get('original_price');
            $products->selling_price=$request->get('selling_price');
            $products->quanlity=$request->get('quanlity');

            if($request->hasFile('image'))
            {
               $file = $request->file('image');
               $exe = $file->getClientOriginalExtension();
               $filename = time().'.'.$exe;

               $file->move('uploads/products/',$filename);
               $products->image = $filename;
           }
           $products->status = $request->status == true ? '1':'0';
           $products->save();

           return  redirect('admin/products')->with('message','Update product successfully.');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $products = Product::find($id);
        $path = 'uploads/brands/'.$products->image;
                if(File::exists($path)){
                    File::delete($path);
                }
                $products->delete();
        return  redirect('admin/products')->with('message','Deleted product successfully.');
    // $pimage = ProductImage::findOrFail($id);
    // // $path = 'uploads/products/'.$pimage->image;
    //         if(File::exists('uploads/products/',$pimage->image)){
    //             File::delete('uploads/products/',$pimage->image);
    //         }
    //         $pimage->delete();

    //         return  redirect('admin/products')->with('message','Deleted brands successfully.');
    }

}
