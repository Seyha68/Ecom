
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
                <h1>Brands</h1>
                <a class="btn btn-primary float-end" href="{{ route('brands.create') }}">Add Brands</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Category_Id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as  $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->brand_name }}</td>
                            <td>{{ $brand->category_id }}</td>
                            <td><img src="{{ asset('uploads/brands/' . $brand->image) }} " width="100px"></td>
                            <td>{{ $brand->status == '1' ? 'Active':'Inactive'}}</td>
                            <td>
                                <form action="{{ route('brands.destroy', $brand->id) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('DELETE')
                                <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-info">Edit</i></a>
                                  <button class="btn btn-danger delete-confirm" type="submit" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">Delete</button>
                                 <a href="" class="btn btn-secondary">View</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $brands->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
