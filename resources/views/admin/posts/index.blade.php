@extends('layouts.admin')



@section('content')



    <h1>Posts</h1>

    <table class="table table-hover">
       <thead>
         <tr>
           <th>Post Id</th>
           <th>Photo</th>
           <th>Owner</th>
           <th>Category</th>
           <th>Title</th>
           <th>Content</th>
           <th>Created</th>
           <th>Updated</th>

         </tr>
       </thead>
       <tbody>
            @if($posts)
                @foreach($posts as $post)
                     <tr>
                         <td>{{$SrNum++}}</td>
                       <td><img height="50"  src="{{$post->photo ? $post->photo->file : '/images/holder.jpg'}}" alt="placeholder"></td>
                       <td>{{$post->user->name}}</td>
                       <td>{{$post->category ? $post->category->name : 'Un Categorized'}}</td>
                       <td>{{$post->title}}</td>
                       <td>{{$post->body}}</td>
                       <td>{{$post->created_at->diffForHumans()}}</td>
                       <td>{{$post->updated_at->diffForHumans()}}</td>
                     </tr>
                @endforeach

            @endif
      </tbody>
    </table>


@stop




