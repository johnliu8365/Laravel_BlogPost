@extends('layouts.admin')

@section('content')
    <h1>Users</h1>

    <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Function</th>
      </tr>
    </thead>
    <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="50" src="{{$user->photo ? $user->photo->file : ''}}" alt="{{$user->photo ? $user->photo->id : 'No Photo'}}"></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>
                        {{$user->is_active == 1 ? 'Active' : 'No Active'}}
                    </td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td><button onclick="location.href='{{ route('admin.users.edit', $user->id) }}'" class='btn btn-primary'>EDIT</button></td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
@stop