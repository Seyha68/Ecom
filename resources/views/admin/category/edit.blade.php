
@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Category
            </h1>
            <a  href=" {{ url('admin/category') }}" class="btn btn-primary text-white float-end">BACK</a>
            </div>
            <div class="card-body">

                {{--  Form Create  --}}
                <form action="{{ url('admin/category', $category->id) }}" method="post" enctype="multipart/form-data">
                @method('patch')
                    @csrf
                    <div class="row">
                        <div class=" col-md-6 mb-3">
                            <label>Category Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                            @error('name') <span class="text-danger">{{ $message }}</span>

                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="{{ $category->description }}">
                            @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type="file" name="img" class="form-control" >
                            {{--  <img src="{{ asset('uploads/category/'.$category->img) }}" alt="" width="150px" height="100px" >  --}}
                            @error('img') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <img src="{{ asset('uploads/category/'.$category->img) }}" alt="" width="250px" height="150px" >

                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Price</label>
                            <input type="text" name="origin_price" class="form-control" value="{{ $category->origin_price }}">
                            @error('origin_price') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Selling Price</label>
                            <input type="text" name="sell_price" class="form-control" value="{{ $category->sell_price }}">
                            @error('sell_price') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Status</label><br>
                            <input type="checkbox" name="status" value="{{ $category->status =='1' ? 'hidden':'' }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{--  <script type="text/javascript">
    $('.img_file').on('change', function(){
           alert("ok");
    });
</script>  --}}
@endsection

