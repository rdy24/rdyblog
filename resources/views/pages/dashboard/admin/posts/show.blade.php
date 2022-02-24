@extends('pages.dashboard.index')

@section('title')
{{ $post->title }}
@endsection

@section('contents')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <h3>{{ $post->title }}</h3>
      <a href="{{ route('all-posts.index') }}" class="btn btn-primary">
        <i class="fas fa-backward text-white-50"></i> Back
      </a>
      <form action="{{ route('all-posts.destroy', $post->slug) }}" method="post" class="d-inline">
        @csrf
        @method('delete')
        <button class="btn btn-danger" onclick="return confirm('Apakah anda Yakin?')">
          <i class="fa fa-trash"></i>
        </button>
      </form>
      <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-3"
        alt="{{ $post->category->name }}">
      <div class="mt-3">
        {!! $post->body !!}
      </div>
    </div>
  </div>
</div>
@endsection