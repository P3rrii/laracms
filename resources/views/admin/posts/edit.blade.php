@extends('layouts.app')

    @section('content')
        <center>
            <h1> Edit Post </h1>

            <div> 
                <img src="{{$post->photo->file}}" width="500px" height="300px" border="2px solid black">
            </div>

            {!! Form::model($post, ['method' => 'PATCH', 'action' =>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
    
                <br>

                <div>
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null) !!}
                </div>
        
                <div>
                    {!! Form::label('category_id', 'Category') !!}
                    {!! Form::select('category_id', $categories) !!}
                </div>
            
                <div>
                    {!! Form::label('photo_id', 'Photo:') !!}
                    {!! Form::file('photo_id', null) !!}
                </div> 
            
                <div>
                    {!! Form::label('body', 'Description:') !!}
                    {!! Form::textarea('body', null,['rows'=>5]) !!}
                </div>
            
                <div>
                    {!! Form::submit('Update Post') !!}
                </div>
    
            {!! Form::close() !!}


            {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminPostsController@destroy', $post->id ]]) !!}
                {!! Form::submit('Delete Post')!!}
            {!! Form::close() !!}

            @include('includes.form')
    
        </center>
    @endsection

    <style>
        *{
            font-family:geneva;
        }
    </style>