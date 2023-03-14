
@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Product
            </h1>
            <a  href=" {{ url('admin/products') }}" class="btn btn-primary text-white float-end">BACK</a>
            </div>
            <div class="card-body">

                {{--  Form Create  --}}
                <form action="{{route('products.update',$products->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class=" col-md-12 mb-3">
                            <label>Product Name</label>
                            <input type="text" name="prod_name" class="form-control" value="{{ $products->prod_name }}">
                            @error('prod_name') <span class="text-danger">{{ $message }}</span>

                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="first-name-column">Category_ID <span class="text-danger">*</span></label>
                            <select name="category_id" id="first-name-column" class="form-control">
                                @foreach ( $Categorys as $Category )
                                        <option value="{{$Category->name}}">{{$Category->name}}</option>
                                        @error('category_id') <span class="text-danger">{{ $message }}</span>@enderror
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Image</label>
                            <input type="file" name="image"  class="form-control">

                            @error('image') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <img src="{{ asset('uploads/products/'.$products->image) }}" alt="" width="250px" height="150px" >

                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="{{ $products->description }}">
                            @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Price</label>
                            <input type="text" name="original_price" class="form-control" value="{{ $products->original_price }}">
                            @error('original_price') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Selling Price</label>
                            <input type="text" name="selling_price" class="form-control" value="{{ $products->selling_price }}">
                            @error('selling_price') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Quanlity</label>
                            <input type="text" name="quanlity" class="form-control" value="{{ $products->quanlity }}">
                            @error('quanlity') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Status</label><br>
                            <input type="checkbox" name="status">
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </div>
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

