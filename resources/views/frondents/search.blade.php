@extends('layouts.app')

@section('title','Home Page')

@section('content')

<div class="py-5">
    <div class="container cont">
        @if(session('message'))
        <h2 class="alert alert-success">{{ session('message') }}
        </h2>
        @endif
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4" style="font-size: 50px; font-weight: 600; color:rgb(15, 15, 15);">Search Result</h4>
            </div>
            @forelse ($searching as $search)
            <div class="card" style="width: 18rem; height: 500px; margin-top:26px; margin-left:20px">
                <img src="{{ asset('uploads/products/' .$search->image) }} " class="card-img-top" style="height: 300px; margin-top:10px; object-fit: cover;" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $search->prod_name }}</h5>
                  <p class="card-text text-decoration-line-through">${{ $search->original_price }}</p>
                  <p>Sell Price:${{ $search->selling_price }}</p>
                  <a href="{{ route('add_to_card', $search->id) }}" class="btn btn-primary">Add Card</a>
                  <a href="{{ url('search',$search->id) }}" class="btn btn-primary">View</a>
                </div>

            </div>

            @empty
            <div class="col-md-12">
                <h5>No Category Available</h5>
            </div>
            @endforelse
        </div>
        {{  $searching->links() }}
    </div>
</div>
@endsection
