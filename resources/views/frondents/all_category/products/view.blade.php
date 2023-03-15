
@extends('layouts.app')

@section('title','View Product')

@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">

            <div class="col-md-5 mt-3">
                <div class="bg-white border">
                    <img src="{{ asset('uploads/products/' .$products->image) }}" class="w-100" alt="Img">
                </div>
            </div>
            <div class="col-md-7 mt-3">
                <div class="product-view">
                    <h4 class="product-name">

                        {{ $products->prod_name }}
                        {{--  <label class="label-stock bg-success">In Stock</label>  --}}
                    </h4>
                    <hr>
                    <p class="product-path">
                        Home / Category / Product / HP Laptop
                    </p>
                    <div>
                        <span class="selling-price ">Selling Price: ${{ $products->selling_price }}</span>
                        <span class="original-price line-through">${{ $products->original_price }}</span>
                    </div>
                    <div class="mt-2">
                        <div class="input-group">
                            <span class="btn btn1"><i class="fa fa-minus"></i></span>
                            <input type="number" value="{{ $products->quanlity }}" class="input-quantity" />
                            <span class="btn btn1"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('add_to_card', $products->id) }}" class="btn btn-primary"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                        {{--  <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a>  --}}
                    </div>
                    <div class="mt-3">
                        <h5 class="mb-0"> Description</h5>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ty'
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
