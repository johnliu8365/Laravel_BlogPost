@extends('layouts.blog-post')

@section('content')

    
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : ''}}" alt="{{$post->photo ? $post->photo->id : 'No Photo'}}">

    <hr>

    <!-- Post Content -->
    <p>{!! $post->body !!}</p>
    <hr>

    <!-- Blog Comments -->

    @if(Auth::check())

    <!-- Comments Form -->
    
    @if(Session::has('comment_message'))

        {{session('comment_message')}}
    
    @endif

    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
        
        <input type="hidden" name="post_id" value="{{$post->id}}">

        <div class="form-group">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
        </div>
        
        {!! Form::close() !!}

    </div>
    @endif

    <hr>

    <!-- Posted Comments -->

@if(count($comments) > 0)

    @foreach($comments as $comment)

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            {{$comment->body}}
            <!-- Nested Comment -->
            @foreach($comment->replies as $reply)

                @if($reply->is_active == 1)
                <div id="nested-comment" class="media nested-comment">
                    <a class="pull-left" href="#">
                        <img height="64" class="media-object" src="{{$reply->photo ? $reply->photo : 'http://placehold.it/64x64'}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$reply->author}}
                            <small>{{$reply->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$reply->body}}
                    </div>
                </div>
                @endif
            <!-- End Nested Comment -->

            @endforeach

            {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
            
            <div class="form-group">
                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>2]) !!}
            </div>
            
            <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            </div>
            
            {!! Form::close() !!}

        </div>
    </div>

    @endforeach

@endif

@stop