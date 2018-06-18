@extends('layouts.app')

@section('content')
  <h1>Edit Post</h1>
  {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {{Form::label('title', 'Title')}}
      {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}

    </div>
    <div class="form-group">
      {{Form::label('body', 'Body')}}
      <!-- id tag for laravel-ckeditor -->
      {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>
    <div class="form-group">
      {{Form::file('cover_image')}}
    </div>
    <!-- update allows only PUT and PATCH request,
    and we cannot just change type of method, which is POST...
    but we can use hidden method -->
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Update', ['class' => 'btn btn-outline-dark'])}}
  {!! Form::close() !!}

@endsection
