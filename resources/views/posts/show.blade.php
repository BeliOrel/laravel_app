@extends('layouts.app')

@section('content')
  <a href="/posts" class="btn btn-outline-dark mb-3">Go Back</a>
  <h1>{{$post->title}}</h1>
  <img class="mb-3" style="width: 100%;" src="/storage/cover_images/{{$post->cover_image}}" alt="">
  <div class="">
    <!-- those two !! parse HTML code, which is needed if we use laravel-ckeditor -->
    {!!$post->body!!}
  </div>
  <hr>
  <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
  <hr>
  @if (!Auth::guest())
    @if (Auth::user()->id == $post->user_id)
      <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark">Edit</a>

      <!-- delete -->
      {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
      {!!Form::close()!!}
    @endif
  @endif
@endsection
