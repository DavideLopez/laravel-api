@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    @if($post->cover)
      <div class="col-12">
        {{-- {{ $post->cover }} --}}
        <img src="{{ asset('storage/'.$post->cover) }}" width="500" alt=""> 
      </div>
    @endif
    <div class="col-8">
      <h1>{{ $post->title }}</h1>
      <p>{{ $post->slug }}</p>
      <ul class="d-flex gap-2">
        <li>{{ $post->created_at }}</li>
        <li>{{ $post->updated_at }}</li>
      </ul>
    </div>
    <div class="col-4 text-left d-flex justify-content-end align-items-center">
      <a href="{{ route('admin.posts.edit',$post) }}" type="button" class="btn btn-primary btn-sm">Modifica</a>
      <form action="{{ route('admin.posts.destroy',$post) }}" method="POST">
      
        @csrf
        @method('DELETE')

        <input type="submit" value="ELIMINA" class="btn btn-danger btn-sm">
      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12">
      <p>
        {!! $post->content !!}
      </p>
      @if ($post->category)
       <h3>{{ $post->category->name }}</h3>
      @endif
    </div>
  </div>
</div>

@endsection