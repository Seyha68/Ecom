{{--  
@extends('layouts.app')

@section('title','Product')

@section('content')


<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4" style="font-size: 50px; font-weight: 600; color:rgb(15, 15, 15);">Product</h4>
            </div>
            @forelse ($products as $product)
            <div class=" col-md-3">
                <div class="product-card">
                        <div class="product-card-img">
                            <img src="{{ asset('uploads/products/' .$product->image) }} " class="w-100" alt="Laptop">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{ $product->brand_name  }}</p>
                            <h5 class="product-name">
                               <a href="">
                                    {{ $product->prod_name }}
                               </a>
                            </h5>
                            <span class="original-price">Price: ${{ $product->original_price }}</span>
                            <div>
                                <span class="selling-price" style="font-size: 20px; font-weight: 600; color:rgb(15, 15, 15);">Selling Price: ${{ $product->selling_price }}</span>
                            </div>
                        </div>

                        <div class="mt-3 border">
                            <a href="" class="btn btn1">Add To Cart</a>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                            {{--  <a href="{{ route('product.show',$product_id) }}" class="btn btn1"> View </a>  
                        </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <h5>No Category Available</h5>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection  --}}
