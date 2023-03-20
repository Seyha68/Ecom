
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
                <h1>Product</h1>
                <a class="btn btn-primary float-end" href="{{ route('products.create') }}">Add Products</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Selling Price</th>
                            <th scope="col">Quanlity</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as  $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category_id }}</td>
                            <td>{{ $product->prod_name }}</td>
                            <td><img src="{{ asset('uploads/products/' . $product->image) }} " width="100px"></td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->original_price }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->quanlity }}</td>
                            <td>{{ $product->status == '1' ? 'Active':'Inactive'}}</td>
                            <td>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('DELETE')
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</i></a>
                                  <button class="btn btn-danger delete-confirm" type="submit" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">Delete</button>
                                 <a href="" class="btn btn-secondary">View</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
