@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Post Movie</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-8">
    <a href="/dashboard/admin/create" class="btn btn-primary mb-3">Create new Post</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Movie</th>
        <th scope="col">Name</th>
        <th scope="col">Genre</th>
        <th scope="col">Rating</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->category->name}}</td>
        <td>
          <a href="/admin/index/{{$post->slug}}" class="badge bg-info"><span data-feather="eye"></span></a>
          <a href="/admin/index/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span> </a>
          <form action="/admin/index/{{ $post->slug}}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are You sure?')"><span data-feather="x-circle"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
