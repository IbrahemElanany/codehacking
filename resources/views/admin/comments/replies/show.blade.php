
@extends('layouts.admin')

@section('content')

    <h1>replies</h1>

    @if(count($replies)>0)

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>reply</th>
                <th>Settings</th>
            </tr>
            </thead>
            <tbody>
            @if($replies)
                @foreach($replies as $reply)

                    <tr>
                        <td>{{$reply->id}}</td>
                        <td>{{$reply->author}}</td>
                        <td>{{$reply->email}}</td>
                        <td>{{$reply->body}}</td>
                        <td><a target="_blank" href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>
                        <td>
                            @if($reply->is_active == 1)
                                {!! Form::model($reply,['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                                <div class="form-group">
                                    <input type="hidden" name="is_active" value="0">
                                    {!! Form::submit('Un-Approve',['class'=>'btn btn-success']) !!}
                                </div>
                                {!! Form::close() !!}
                            @else
                                {!! Form::model($reply,['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                                <div class="form-group">
                                    <input type="hidden" name="is_active" value="1">
                                    {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                                </div>
                                {!! Form::close() !!}
                            @endif

                        </td>

                        <td>
                            {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}

                        </td>





                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>

    @else
        <h1 class="text-center">No replies</h1>
    @endif

@stop
