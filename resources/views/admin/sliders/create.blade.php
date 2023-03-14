@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Slider
            </h1>
            <a  href=" {{ url('admin/sliders') }}" class="btn btn-primary text-white float-end">BACK</a>
            </div>
            <div class="card-body">

                {{--  Form Create  --}}
                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class=" col-md-12 mb-3">
                            <label>Brands Name</label>
                            <input type="text" name="title" class="form-control">
                            @error('title') <span class="text-danger">{{ $message }}</span>

                            @enderror
                        </div>

                        <div class=" col-md-12 mb-3">
                            <label>Brands Name</label>
                            <input type="text" name="description" class="form-control">
                            @error('description') <span class="text-danger">{{ $message }}</span>

                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">

                            @error('image') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-success">Save Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
