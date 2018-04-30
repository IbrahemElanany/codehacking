@extends('layouts.admin')



@section('content')



    <h1>Edit Post</h1>

    <div class="row">
        @include('includes.form_error')
    </div>

    <div class="row">
        
        <div class="col-sm-4">
            <img src="{{$post->photo ? $post->photo->file : '/images/holder.jpg'}}" alt="placeholder" class="img-responsive img-rounded">
        </div>
        
        <div class="col-sm-8">
            {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title','Title :') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id','Category :') !!}
                {!! Form::select('category_id',[''=>'Choose Category'] + $categories,null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id','Photo :') !!}
                {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body','Post :') !!}
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>6]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Post',['class'=>'btn btn-primary col-sm-6']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-6']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>



@stop





