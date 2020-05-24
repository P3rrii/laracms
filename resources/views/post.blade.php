@extends('layouts.app')

    @section('content')
        <center>
            {{-- Post Part --}}
            <h1> Post Title: {{$post->title}} </h1> 
            <h2> Author : {{$post->user->name}}    <br>  Post Created : {{$post->created_at->diffForHumans()}} </h2>
            <br>
            <img width="600px" height="300px" src="{{$post->photo->file}}">
            <p id="body"> {{$post->body}} </p>

            @if(Session::has('comment_message'))
            {{session('comment_message') }}
            @endif
            {{-- End Of Post --}}

        
        {{-- Comments Form(Checking if the user is logged in) --}}
        @if(Auth::check() && Auth::user()->is_active==1)
        {!! Form::open(['method'=>'POST','action'=>'PostCommentController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">

            {!! Form::label('body', 'Write A Comment:') !!}
            {!! Form::textarea('body',null,['rows'=>3]) !!}
        
            {!! Form::submit('Submit Comment') !!}
        {!! Form::close() !!}
        @endif
        {{-- End Of Comments Form --}}
        
        {{-- Checking if we have any comments(If we do render them) --}}
        @if(count($comments)>0)
            @foreach($comments as $comment)
                <div id="commentbox">
                    <img  height="40px" width="40px" id="comments" src="{{$comment->photo}}">
                    <h5 id="comments"> {{$comment->author}} </h5>
                    <small id="comments"> {{$comment->created_at->diffForHumans()}}</small>
                    <p id="commentbody"> {{$comment->body}} </p>
            
            {{--Checking for each comment if it has a reply and if it is active(approved by admin)--}}
            @if(count($comment->replies) > 0)
                @foreach($comment->replies as $reply)
                    @if($reply->is_active == 1)

                        <div id="replybox">
                            <img  height="25px" width="25px" src="{{$reply->photo}}">
                            <h5 id="reply""> {{$reply->author}} </h5>
                            <small id="reply"> {{$reply->created_at->diffForHumans()}} </small>
                            <p id="replybody"> {{$reply->body}} </p>
                        </div>  
                    @endif
                @endforeach
            @endif
            {{-- End Of Replies Rendering --}}
                
                {{--Checkin if the user is logged in to display replies form --}}
                @if(Auth::check() && Auth::user()->is_active==1)
                    {!! Form::open(['method'=> 'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                        <input type="hidden" name="comment_id" value="{{$comment->id}}">

                        {!! Form::label('body','Write A Reply:') !!}
                        {!! Form::textarea('body',null,['id'=>'replytextarea']) !!}
                
                        {!! Form::submit('Sent Reply') !!}
                    {!! Form::close() !!}
                @endif
                {{--End Of Replies Form --}}
                </div> {{-- Div For The Comment Box --}}
                    <br>

            {{-- End of foreach comment loop --}}
            @endforeach
                
            @else
                <h1> There Are No Comments For This Post </h2>
        @endif

        </center>
    @endsection


<style>
    *{
        font-family:geneva;
    }

    h1{
        border:2px solid black;
        width:50%;
    }

    h2{
        border:1px solid black;
        width:20em;
    }

    img{
        border:3px solid black;
    }

    #body{
        border:2px solid black;
        word-break:break-all;
        max-width:500px;
    }

    #comments{
        display:inline;
    }

    #commentbox{
        border:2px solid black;
        width:25%;
        padding-top:10px;
    }

    #commentbody{
        border:1px solid black;
        border-radius:5px;
        background-color:rgb(226, 226, 226);
        width:75%;
    }

    #replybox{
        margin-left:50px;
    }
    #reply{
        display:inline;
    }

    #replybody{
        border:0.5px solid black;
        background-color:rgb(226,226,226);
        width:75%;
    }

    #replytextarea{
        width:300px;
        max-width:300px;
        height:100px;
    }
</style>