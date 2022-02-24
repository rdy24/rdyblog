@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h3>{{ $post->title }}</h3>
      <h6>By. <a href="/posts?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a>
        In
        <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name
          }}</a>
      </h6>
      @if ($post->image)
      <div style="max-height: 400px; overflow: hidden;">
        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="img-fluid mt-3">
      </div>
      @else
      <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-3"
        alt="{{ $post->category->name }}">
      @endif
      <div class="mt-3">
        {!! $post->body !!}
      </div>
      <a href="/posts" class="text-decoration-none pb-5">back</a>
    </div>
  </div>
</div>
@endsection