@extends('layouts.app')

    @section('content')

        <center>
            <h1> Create Post </h1>

            <div>
                {!! Form::open(['method' => 'POST', 'action' =>'AdminPostsController@store', 'files'=>true]) !!}

                    <div>
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', null) !!}
                    </div>

                    <div>
                        {!! Form::label('category_id', 'Category') !!}
                        {!! Form::select('category_id', [''=>'Choose Categories'] + $categories) !!}
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
                        {!! Form::submit('Create Post') !!}    
                    </div>

                {!! Form::close() !!}
            </div>

            @include('includes.form')

        </center>
        
    @endsection