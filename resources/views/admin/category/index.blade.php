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
                <h1>Category</h1>
                <a class="btn btn-primary float-end" href=" {{ url('admin/category/create') }}">Add Category</a>
            </div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Discription</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Original Price</th>
                            <th scope="col">Selling Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td><img src="{{ asset('uploads/category/' . $item->img) }} " width="100px"></td>
                            {{--  <td>{{ $item->img }}</td>  --}}
                            <td>{{ $item->status == '1' ? 'Hidden':'visible'}}</td>
                            <td>{{ $item->origin_price }}</td>
                            <td>{{ $item->sell_price }}</td>
                            <td>
                                <form action="{{ url('admin/category/destroy', $item->id) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('DELETE')
                                <a href="{{ url('admin/category/edit', $item->id) }}" class="btn btn-info">Edit</i></a>
                                  <button class="btn btn-danger delete-confirm" type="submit" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">Delete</button>
                                {{--  <a href="" class="btn btn-secondary">View</a>  --}}
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $category->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
