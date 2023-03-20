
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
            {{--  <div class="card-header">
                <h1>Category</h1>
                <a class="btn btn-primary float-end" href=" {{ url('admin/category/create') }}">Add Category</a>
            </div>  --}}
              <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col"> Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->cont_name }}</td>
                            <td>{{ $contact->email }}</td>
                             <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger delete-confirm" type="submit" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">Delete</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{--  <div class="d-flex justify-content-center">
                    {!! $contacts->links() !!}
                </div>  --}}
            </div>
        </div>
    </div>
</div>

@endsection
