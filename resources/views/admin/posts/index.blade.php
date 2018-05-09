@extends('layouts.admin')



@section('content')



    <h1>Posts</h1>

    @if(Session::has('deleted_post'))

        <div class="alert alert-danger">{{session('deleted_post')}}</div>

    @endif

    @if(Session::has('created_post'))

        <div class="alert alert-success">{{session('created_post')}}</div>

    @endif

    @if(Session::has('updated_post'))

        <div class="alert alert-success">{{session('updated_post')}}</div>

    @endif

    <table class="table table-hover">
       <thead>
         <tr>
           <th>Post Id</th>
           <th>Photo</th>
           <th>Owner</th>
           <th>Category</th>
           <th>Title</th>
           <th>Content</th>
           <th>Live View</th>
           <th>Comments View</th>
           <th>Created</th>
           <th>Updated</th>

         </tr>
       </thead>
       <tbody>
            @if($posts)
                @foreach($posts as $post)
                     <tr>
                         <td>{{$SrNum++}}</td>
                       <td><img height="50"  src="{{$post->photo ? $post->photo->file : $post->placeholder()}}" alt=""></td>
                       <td><a href="{{route('admin.posts.edit',$post->id)}}">{{str_limit($post->user->name,15)}}</a></td>
                       <td>{{$post->category ? str_limit($post->category->name,15) : 'Un Categorized'}}</td>
                       <td>{{str_limit($post->title,20)}}</td>
                       <td>{{str_limit($post->body,30)}}</td>
                       <td><a target="_blank" href="{{route('home.post',$post->id)}}">View Post</a></td>
                       <td><a href="{{route('admin.comments.show',$post->id)}}">View comments</a></td>
                       <td>{{$post->created_at->diffForHumans()}}</td>
                       <td>{{$post->updated_at->diffForHumans()}}</td>
                     </tr>
                @endforeach

            @endif
      </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>


@stop




