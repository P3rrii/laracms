@extends('layouts.app')

    @section('content')
    {{-- THIS PAGE IS ACCESSABLE BY GOING TO POSTS AND CLICKING THE GO TO POSTS COMMENTS IT DISPLAYS ALL COMMENTS FROM A SINGLE POST --}}
        <center>
            <h1> Comments </h1>
        
            @if(count($comments)>0)
                <table>
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Author </th>
                            <th> Email </th>
                            <th> Body </th>
                            <th> Post </th>
                            <th> Un/Approve Comment </th>
                            <th> Delete Comment </th>
                        </tr>
                    </thead>
    
                    <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td> {{$comment->id}} </td>
                                    <td> {{$comment->author}} </td>
                                    <td> {{$comment->email}} </td>
                                    <td> {{str_limit($comment->body,20)}} </td>
                                    <td> <a href="{{route('home.post', $comment->post->id)}}"> View Post </td>
                                    <td> 
    
                                        @if($comment->is_active == 1)
                                            {!! Form::open(['method'=>'PATCH','action'=> ['PostCommentController@update', $comment->id]]) !!}
                        
                                                <input type="hidden" name="is_active" value="0">
                                                {!! Form::submit('Unapprove') !!}
                        
                                            {!! Form::close() !!}
                        
                                        @else
                                            {!! Form::open(['method'=>'PATCH','action'=> ['PostCommentController@update', $comment->id]]) !!}
                        
                                                <input type="hidden" name="is_active" value="1">
                                                {!! Form::submit('Approve') !!}
                                            
                                            {!! Form::close() !!}
                        
                                        @endif

                                    </td>
                        
                
                                    <td>
                                        {!! Form::open(['method'=>'DELETE','action'=> ['PostCommentController@destroy', $comment->id]]) !!}
                        
                                                {!! Form::submit('Delete') !!}
                        
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                    </tbody>
                            
                        @else 
                            <h1> There Are No Replies For This Post! </h1>
                        @endif
        </center>
    @endsection

    <style>
        *{
            font-family: geneva;
        }
    
        h1{
            border:2px solid black;
            width:25%;
        }
    
        table{
            border:2px solid black;
            width:80%;
        }
    
        th{
            border-bottom:2.0px solid black;
            border-right:2.0px solid black;
            border-top:1.0px solid grey;
            border-left:1.0px solid grey;
        }
    
    
    </style>