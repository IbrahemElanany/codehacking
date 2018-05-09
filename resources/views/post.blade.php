@extends('layouts.blog-post')



@section('content')





    <h2>
        <a href="#">{{$post->title}}</a>
    </h2>
    <p class="lead">
        by <a href="index.php">{{$post->user->name}}</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <img class="img-responsive"  src="{{$post->photo ? $post->photo->file : $post->placeholder()}}" alt="">

    <hr>

    <p>{!! $post->body !!}</p>


    <hr>




    <!-- Blog Comments -->




        <!-- Comments Form -->
    @if(Session::has('comment_message'))

        <div class="alert alert-success">{{session('comment_message')}}</div>

    @endif

    <div class="well">
        <h4>Leave a Comment:</h4>


        {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}
        <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="form-group">
                {!! Form::label('body','Comment :') !!}
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create Comment',['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>




    <hr>

    <!-- Posted Comments -->

@if(count($comments)>0)
    @foreach($comments as $comment)
        @if($comment->is_active == 1)
    <div class="media">
        <a class="pull-left" href="#">
            <img height="64" class="media-object img-rounded" src="{{$comment->photo}}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            {{$comment->body}}


            @if(count($comment->replies) > 0)
        <!-- Nested Comment -->
                @foreach($comment->replies as $reply)

                    @if($reply->is_active == 1)
                    <div id="nested-comment" class="media">
                        <a class="pull-left" href="#">
                            <img height="64"  class="media-object" src="{{$reply->photo}}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                            </h4>
                            {{$reply->body}}
                        </div>
                    </div>
                @endif
            @endforeach
                @endif
                    <div class="comment-reply-container">

                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                        <div class="comment-reply col-sm-11">

                            {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            <div class="form-group">
                                {!! Form::label('body','Reply :') !!}
                                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>'1']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>

    </div>




        @endif

    @endforeach

@endif

@stop

@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function(){
            $(this).next().slideToggle("slow");
        });

    </script>



@stop

{{--Another comment system--}}

{{--<div id="disqus_thread"></div>--}}
{{--<script>--}}

    {{--/**--}}
     {{--*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.--}}
     {{--*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/--}}
    {{--/*--}}
    {{--var disqus_config = function () {--}}
    {{--this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable--}}
    {{--this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable--}}
    {{--};--}}
    {{--*/--}}
    {{--(function() { // DON'T EDIT BELOW THIS LINE--}}
        {{--var d = document, s = d.createElement('script');--}}
        {{--s.src = 'https://codehacking-jr2prlfb8h.disqus.com/embed.js';--}}
        {{--s.setAttribute('data-timestamp', +new Date());--}}
        {{--(d.head || d.body).appendChild(s);--}}
    {{--})();--}}
{{--</script>--}}
{{--<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>--}}

{{--<script id="dsq-count-scr" src="//codehacking-jr2prlfb8h.disqus.com/count.js" async></script>--}}