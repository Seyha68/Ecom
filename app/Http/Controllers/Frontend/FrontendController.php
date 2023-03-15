<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::get()->all();
        $products = Product::paginate(8);
        $categorys = Category::paginate(2);
        return view('frondents.index',compact('sliders','products','categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::paginate(8);
        return view('frondents.all_category.products.index',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Addcard(Request $request,$id)
    {
        if(Auth::check())
        {


            $products = Product::find($id);
            $card = session()->get('card',[]);
            if(isset($card[$id])){
                $card[$id]['qty']++;
            }else{
                $card[$id] = [
                    "prod_name"=>$products->prod_name,
                    "image"=>$products->image,
                    "selling_price"=>$products->selling_price,
                    "qty"=>1
                ];
            }
            session()->put('card',$card);
            return redirect()->back()->with('message','Add to card Successful!');
        }else{
            return redirect('login')->with('message','Go to login Bro');
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
        $products = Product::find($id);
        return view('frondents.all_category.products.view',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Showcard()
    {
        return view('frondents.card');
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
    public function delete($id)
    {
        // dd($id);
        $card = session()->get('card');

        if (isset($card[$id])) {
            unset($card[$id]);
            session()->put('card', $card);
        }
        return redirect('/')->with('message','Deleted card Successful!');
    }

}
