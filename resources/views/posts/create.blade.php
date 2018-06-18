@extends('layouts.app')

@section('content')
  <h1>Create New Post</h1>
  {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {{Form::label('title', 'Title')}}
      <!-- this is a create form so we don't need a value,
      we can add css style with class variable -->
      {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}

    </div>
    <div class="form-group">
      {{Form::label('body', 'Body')}}
      <!-- id tag for laravel-ckeditor -->
      {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>
    <div class="form-group">
      {{Form::file('cover_image')}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-outline-dark'])}}
  {!! Form::close() !!}

@endsection
