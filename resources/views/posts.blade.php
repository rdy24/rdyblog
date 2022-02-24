@extends('layouts.main')

@section('content')

<h1 class="text-center mb-3">{{ $title }}</h1>
<div class="row justify-content-center">
  <div class="col-md-6">
    <form action="/posts">
      @if (request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      @if (request('user'))
      <input type="hidden" name="user" value="{{ request('user') }}">
      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
        <button class="btn btn-warning text-white" type="submit" id="button-addon2">Search</button>
      </div>
    </form>
  </div>
</div>

@if ($posts->count() > 0)
<div class="card my-3">
  @if ($posts[0]->image)
  <div style="max-height: 400px; overflow: hidden;">
    <img src="{{ asset('storage/'.$posts[0]->image) }}" alt="{{ $posts[0]->title }}" class="img-fluid">
  </div>
  @else
  <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
    alt="{{ $posts[0]->category->name }}">
  @endif
  <div class="card-body text-center">
    <h3 class="card-title mb-1">{{ $posts[0]->title }}</h3>
    <small class="text-muted">By. <a href="/posts?user={{ $posts[0]->user->username }}" class="text-decoration-none">{{
        $posts[0]->user->name
        }}</a> In <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{
        $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</small>
    <p class="card-text">{{ $posts[0]->excerpt }}</p>
    <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read More</a>
  </div>
</div>

<div class="container">
  <div class="row">
    @foreach ($posts->skip(1) as $post)
    <div class="col-md-4">
      <div class="card mb-3">
        <a href="/posts?category={{ $post->category->slug }}"
          class="text-decoration-none position-absolute bg-dark text-white px-3 py-2">{{
          $post->category->name }}</a>
        @if ($post->image)
        <div style="max-height: 400px; overflow: hidden;">
          <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="img-fluid">
        </div>
        @else
        <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top"
          alt="{{ $post->category->name }}">
        @endif
        <div class="card-body">
          <h3 class="card-title">{{ $post->title }}</h3>
          <small class="text-muted">By. <a href="/posts?user={{ $post->user->username }}"
              class="text-decoration-none">{{
              $post->user->name
              }}</a> {{ $post->created_at->diffForHumans() }}</small>
          <p class="card-text">{{ $post->excerpt }}</p>
          <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@else
<p class="text-center fs-4 fw-bold">No Post Found</p>
@endif

{{ $posts->links() }}

@endsection