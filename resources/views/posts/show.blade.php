@extends('layouts.app')

@section('content')
  <a href="/posts" class="btn btn-outline-dark mb-3">Go Back</a>
  <h1>{{$post->title}}</h1>
  <div class="">
    <!-- those two !! parse HTML code, which is needed if we use laravel-ckeditor -->
    {!!$post->body!!}
  </div>
  <hr>
  <small>Written on {{$post->created_at}}</small>
  <hr>
  <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark">Edit</a>

  <!-- delete -->
  {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
  {!!Form::close()!!}
@endsection
