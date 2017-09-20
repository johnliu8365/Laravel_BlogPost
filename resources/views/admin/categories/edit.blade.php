@extends('layouts.admin')

@section('content')

    <h1>Update Category</h1>
    <div class="col-sm-6">
        {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
        
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
        </div>
        
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
    
        <div class="form-group">
            {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
        </div>
        
        {!! Form::close() !!}

        @include('includes.form_error')
    </div>
    

@stop