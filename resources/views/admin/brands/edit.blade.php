
@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Brands
            </h1>
            <a  href=" {{ url('admin/brands') }}" class="btn btn-primary text-white float-end">BACK</a>
            </div>
            <div class="card-body">

                {{--  Form Create  --}}
                <form action="{{route('brands.update',$brands->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class=" col-md-6 mb-3">
                            <label>Brand Name</label>
                            <input type="text" name="brand_name" class="form-control" value="{{ $brands->brand_name }}">
                            @error('brand_name') <span class="text-danger">{{ $message }}</span>

                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="first-name-column">Category_ID <span class="text-danger">*</span></label>
                            <select name="category_id" id="first-name-column" class="form-control">
                                @foreach ( $Categorys as $Category )
                                        <option value="{{$Category->name}}">{{$Category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" >
                            <img src="{{ asset('uploads/brands/'.$brands->image) }}" alt="" width="250px" height="150px" >
                            @error('image') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Status</label><br>
                            <input type="checkbox" name="status" value="{{ $brands->status =='1' ? 'active':'inactive' }}">
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

