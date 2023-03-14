@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Category
            </h1>
            <a  href=" {{ url('admin/category') }}" class="btn btn-primary text-white float-end">BACK</a>
            </div>
            <div class="card-body">

                {{--  Form Create  --}}
                <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class=" col-md-6 mb-3">
                            <label>Category Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span>

                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control">
                            @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type="file" name="img" class="form-control">

                            @error('img') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Price</label>
                            <input type="text" name="origin_price" class="form-control">
                            @error('origin_price') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Selling Price</label>
                            <input type="text" name="sell_price" class="form-control">
                            @error('sell_price') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Status</label><br>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary">Save Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
