@extends('pages.dashboard.index')

@section('title')
Tambah Post
@endsection

@section('contents')
<!-- Page Heading -->

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Post</h1>
    <a href="{{ route('posts.index') }}" class="btn btn-primary">
      <i class="fas fa-backward text-white-50"></i> Back
    </a>
  </div>

  <!-- Content Row -->

  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="{{ route('posts.store') }}" method="POST" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
            placeholder="Title" value="{{ old('title') }}">
          @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="category">Kategori</label>
          <select name="category_id" required class="form-control">
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="image" class="form-label">Post Image</label>
          <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
          <input class="form-control-file @error('image') is-invalid @enderror" type="file" id="image" name="image"
            onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <label for="body">Body</label>
        @error('body')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor input="body"></trix-editor>
        <button type="submit" class="btn btn-primary mt-3">
          Simpan
        </button>
      </form>
    </div>
  </div>

</div>
@include('layouts.partials.dashboard.script')
@endsection