@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>

                <div class="panel-body">

                    {{--Loop To Display All Posts --}}
                    @foreach($posts as $post)
                        <h1> <a href="{{route('home.post', $post->id)}}">{{$post->title}} </a></h1> 
                        <h2> Author : {{$post->user->name}}    <br> <small>  Post Created : {{$post->created_at->diffForHumans()}} </small> </h2>
                        <br>

                        <img width="100%" height="300px" src="{{$post->photo->file}}">
                        <p id="body"> {{$post->body}} </p>
                        
                        <br>
                        <p> Click the post title for comments. </p>
                        <br>
                        <br>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #body{
        word-break:break-all;
        max-width:500px;
        margin-left:50px;
        font-size:16px;
    }

    img{
        border:1px solid black;
    }
</style>

@endsection
