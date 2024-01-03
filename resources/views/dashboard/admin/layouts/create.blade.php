@extends('dashboard.layouts.edit')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-zcenter pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Movie</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/store" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Nama</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="genre" class="form-label">Genre</label>
      <input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" name="genre" required value="{{ old('slug') }}">

    </div>
    <div class="mb-3">
      <label for="rating" class="form-label">Rating</label>
      <input type="text" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" required value="{{ old('rating') }}">

    </div>
   
    <button type="submit" class="btn btn-primary">Create Post</button>
  </form>
</div>

@endsection
