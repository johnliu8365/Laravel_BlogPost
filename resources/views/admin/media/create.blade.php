@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css" class="css">

@stop

@section('content')
    <h1>Upload Media</h1>
    
    {!! Form::open(['method'=>'POST', 'action'=>'AdminMediaController@store', 'class'=>'dropzone']) !!}
    
    {{--  <div class="form-group">
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
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>  --}}
    
    {!! Form::close() !!}

    @include('includes.form_error')
    
@stop

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js"></script>

@stop