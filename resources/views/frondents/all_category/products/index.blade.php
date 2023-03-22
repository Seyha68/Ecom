
@extends('layouts.app')

@section('title','Product')

@section('content')


<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4" style="font-size: 50px; font-weight: 600; color:rgb(15, 15, 15);"> Product</h4>
            </div>
            @forelse ($products as $product)
            <div class="card" style="width: 18rem; height: 500px; margin-top:26px; margin-left:20px">
                <img src="{{ asset('uploads/products/' .$product->image) }} " class="card-img-top" style="height: 300px; margin-top:10px; object-fit: cover;" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->prod_name }}</h5>
                  {{--  <p class="card-text">{{ $product->description }}</p>  --}}
                    <p class="text-decoration-line-through">Price:${{ $product->original_price }}</p>
                    <p class="card-text">Sell price: ${{ $product->selling_price }}</p>
                    <a href="{{ route('add_to_card', $product->id) }}" class="btn btn-primary">Add Card</a>
                    <a href="{{ url('product',$product->id) }}" class="btn btn-primary">View</a>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <h5>No Category Available</h5>
            </div>
            @endforelse
        </div>
        {{  $products->links() }}
    </div>
</div>

@endsection
