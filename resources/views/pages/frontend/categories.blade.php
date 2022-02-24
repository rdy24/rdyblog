@extends('layouts.main')

@section('content')
<h2 class="my-3">Category</h2>

<div class="container">
  <div class="row">
    @foreach ($categories as $category)
    <div class="col-md-4">
      <div class="card bg-dark my-3">
        <a href="/posts?category={{ $category->slug }}"><img
            src="https://source.unsplash.com/500x400?{{ $category->name }}" class="card-img"
            alt="{{ $category->name }}">
          <div class="card-img-overlay p-0 d-flex align-items-center">
            <h5 class="card-title bg-dark px-3 py-2 text-center flex-fill text-white">{{ $category->name }}</h5>
          </div>
        </a>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection