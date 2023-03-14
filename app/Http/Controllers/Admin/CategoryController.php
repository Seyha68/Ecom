<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {


//  validating the name field.
         $request->validate(
            [
                'name'=>'required',
                'description'=>'required',
                'img'=>'required',
                'sell_price'=>'required',
                'origin_price'=>'required',
            ]);
            $category = new Category;
            $category->name=$request->get('name');
            $category->description=$request->get('description');
            $category->sell_price=$request->get('sell_price');
            $category->origin_price=$request->get('origin_price');
            if($request->hasFile('img'))
             {
                $file = $request->file('img');
                $exe = $file->getClientOriginalExtension();
                $filename = time().'.'.$exe;

                $file->move('uploads/category/',$filename);
                $category->img = $filename;
            }
            $category->status = $request->status == true ? '1':'0';
            $category->save();

        return  redirect('admin/category')->with('message','Add Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $category = Category::orderBy('id','DESC')->paginate(10);
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest  $request, $id)
    {
        $request->validate(
            [
                'name'=>'required',
                'description'=>'required',
                // 'img'=>'required',
                'sell_price'=>'required',
                'origin_price'=>'required',
            ]);
            $category = Category::find($id);
            $category->name =  $request->get('name');
            $category->description =  $request->get('description');
            $category->sell_price=$request->get('sell_price');
            $category->origin_price=$request->get('origin_price');
        //     if($request->hasFile('img'))
        //     {
        //        $file = $request->file('img');
        //        $exe = date('YmdHis') . "." . $file->getClientOriginalExtension();
        //        $filename = time().'.'.$exe;

        //        $file->move('uploads/category/',$filename);
        //        $category->img = $filename;
        //    }
            if($request->hasFile('img'))
             {
                $path = 'uploads/category/'.$category->img;
                if(File::exists($path)){
                    File::delete($path);
                }
                $file = $request->file('img');
                $exe = $file->getClientOriginalExtension();
                $filename = time().'.'.$exe;

                $file->move('uploads/category/',$filename);
                $category->img = $filename;
            }
            $category->status = $request->status == true ? '1':'0';
            $category->save();
        return  redirect('admin/category')->with('message','Update Category  successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category = Category::find($id);
        $path = 'uploads/category/'.$category->img;
                if(File::exists($path)){
                    File::delete($path);
                }
                $category->delete();
        return  redirect('admin/category')->with('message','Deleted Category  successfully.');
    }
}
