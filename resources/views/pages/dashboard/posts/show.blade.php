@extends('pages.dashboard.index')

@section('title')
{{ $post->title }}
@endsection

@section('contents')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <h3>{{ $post->title }}</h3>
      <a href="{{ route('posts.index') }}" class="btn btn-primary">
        <i class="fas fa-backward text-white-50"></i> Back
      </a>
      <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-warning">
        <i class="fa fa-pencil-alt"></i> Edit
      </a>
      <form action="{{ route('posts.destroy', $post->slug) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button class="btn btn-danger">
          <i class="fa fa-trash"></i> Delete
        </button>
      </form>
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
    </div>
  </div>
</div>
@endsection