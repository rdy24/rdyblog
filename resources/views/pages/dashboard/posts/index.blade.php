@extends('pages.dashboard.index')

@section('title')
My Posts
@endsection

@section('contents')
<!-- Page Heading -->

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">My Posts</h1>
    <a href="{{ route('posts.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Post
    </a>
  </div>

  @if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
  @endif

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Kategori</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($posts as $post)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
              <td>
                <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-info">
                  <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-warning">
                  <i class="fa fa-pencil-alt"></i>
                </a>
                <form action="{{ route('posts.destroy', $post->slug) }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger" onclick="return confirm('Apakah anda Yakin?')">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>

              </td>
            </tr>
            @empty
            <td colspan="4" class="text-center">
              Data Kosong
            </td>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@endsection