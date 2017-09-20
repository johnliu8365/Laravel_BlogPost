@extends('layouts.admin')

@section('content')

    <h1>Category</h1>
    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
        
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>
        
        {!! Form::close() !!}
    </div>

    <div class="col-sm-6">
        <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Function</th>
        </tr>
        </thead>
        <tbody>
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                        <td>{{$category->updated_at->diffForHumans()}}</td>
                        <td><button onclick="location.href='{{ route('admin.categories.edit', $category->id) }}'" class='btn btn-primary'>EDIT</button></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
  </div>

@stop