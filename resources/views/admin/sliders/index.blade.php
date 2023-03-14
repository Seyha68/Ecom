
@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h1>Slider</h1>
                <a class="btn btn-primary float-end" href="{{ route('sliders.create') }}">Add Slider</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tiltl</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as  $slider)
                        <tr>
                            <td>{{ $slider->id }}</td>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->description }}</td>
                            <td><img src="{{ asset('uploads/sliders/' . $slider->image) }} " style="width: 80px; height:80px"></td>
                            {{--  <td>{{ $brand->status == '1' ? 'Active':'Inactive'}}</td>  --}}
                            <td>
                                <form action="{{ route('sliders.destroy', $slider->id) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('DELETE')
                                <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-info">Edit</i></a>
                                  <button class="btn btn-danger delete-confirm" type="submit" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">Delete</button>
                                 {{--  <a href="" class="btn btn-secondary">View</a>  --}}
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $sliders->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
