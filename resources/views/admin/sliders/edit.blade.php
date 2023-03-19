
@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Slider
            </h1>
            <a  href=" {{ url('admin/sliders') }}" class="btn btn-primary text-white float-end">BACK</a>
            </div>
            <div class="card-body">

                {{--  Form Create  --}}
                <form action="{{route('sliders.update',$sliders->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class=" col-md-6 mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $sliders->title }}">
                            @error('title') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" col-md-6 mb-3">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="{{ $sliders->description }}">
                            @error('description') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" >
                            <img src="{{ asset('uploads/sliders/'.$sliders->image) }}" alt="" width="250px" height="150px" >
                            @error('image') <span class="text-danger">{{ $message }}</span>@enderror
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

