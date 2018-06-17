@extends('layouts.app')

@section('content')
  <a href="/posts" class="btn btn-primary mb-3">Go Back</a>
  <h1>{{$post->title}}</h1>
  <div class="">
    {{$post->body}}
  </div>
  <hr>
  <small>Written on {{$post->created_at}}</small>
@endsection
