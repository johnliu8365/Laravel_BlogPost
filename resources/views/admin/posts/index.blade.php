@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>

    <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Category</th>
        <th>Photo</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Function</th>
      </tr>
    </thead>
    <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : ''}}</td>
                    <td><img height="50" src="{{$post->photo ? $post->photo->file : ''}}" alt="{{$post->photo ? $post->photo->id : 'No Photo'}}"></td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body, 20)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td><button onclick="location.href='{{ route('admin.posts.edit', $post->id) }}'" class='btn btn-primary'>EDIT</button></td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
    
@stop