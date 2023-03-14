@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Brands
            </h1>
            <a  href=" {{ url('admin/brands') }}" class="btn btn-primary text-white float-end">BACK</a>
            </div>
            <div class="card-body">

                {{--  Form Create  --}}
                <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class=" col-md-6 mb-3">
                            <label>Brands Name</label>
                            <input type="text" name="brand_name" class="form-control">
                            @error('brand_name') <span class="text-danger">{{ $message }}</span>

                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="first-name-column">Category_ID <span class="text-danger">*</span></label>
                            <select name="category_id" id="first-name-column" class="form-control">
                                @foreach ( $Categorys as $Category )
                                        <option value="{{$Category->name}}">{{$Category->name}}</option>
                                        @error('category_id') <span class="text-danger">{{ $message }}</span>@enderror
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">

                            @error('image') <span class="text-danger">{{ $message }}</span>@enderror
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
