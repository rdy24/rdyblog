@extends('pages.dashboard.index')
@section('contents')
<!-- Page Heading -->

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
    <a href="{{ route('categories.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-backward fa-sm text-white-50"></i> Back
    </a>
  </div>

  <!-- Content Row -->
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Category name</label>
          <input type="text" class="form-control" name="name" placeholder="Category name" required
            value="{{ old('name') }}">
        </div>
        <button type="submit" class="btn btn-primary">
          Simpan
        </button>
      </form>
    </div>
  </div>

</div>
@endsection