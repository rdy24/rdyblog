@extends('pages.dashboard.index')

@section('title')
All Category
@endsection

@section('contents')
<!-- Page Heading -->

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
    <a href="{{ route('categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-plus fa-sm text-white-50"></i> Tambah kategori
    </a>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Category Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($categories as $category)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>
              <td>
                <a href="{{ route('categories.edit', $category->slug) }}" class="btn btn-info">
                  <i class="fa fa-pencil-alt"></i>
                </a>
                <form action="{{ route('categories.destroy', $category->slug) }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger" onclick="return confirm('Apakah anda Yakin?')">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>

              </td>
            </tr>
            @empty
            <td colspan="3" class="text-center">
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