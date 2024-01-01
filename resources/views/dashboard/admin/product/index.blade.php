@extends('layout.app')

@selection('title', 'Home Product')

@section('contents')
    <div class="d-flex align-items-centre justify-content-between">
        <h1 class="mb-0">List Movie</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    </div>

    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Movie</th>
                <th>Genre</th>
                <th>Rate</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            
        </tbody>
    </table>

@endsection