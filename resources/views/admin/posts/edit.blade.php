@extends('layouts.admin')

@section('content')
    <h1>Edit Posts</h1>


    <div class="col-sm-3">
        <img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="{{$post->photo ? $post->photo->id : 'No Photo'}}" class="img-responsive img-rounded">
    </div>


    <div class="col-sm-9">
        {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
        
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', [''=>'Choose Category'] + $categories, null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('body', 'Description:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
        </div>
        
        {!! Form::close() !!}

        @include('includes.form_error')

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
        
        <div class="form-group">
            {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
        </div>
        
        {!! Form::close() !!}
    </div>
    
@stop