@extends('layouts.app')

    @section('content') 

        <center>
            <h1> Replies </h1>
    
        @if(count($replies)>0)
            <table>
                <thead>
                    <tr>
                        <th> Id </th>
                        <th> Author </th>
                        <th> Email </th>
                        <th> Body </th>
                        <th> Post </th>
                        <th> Approve Reply </th>
                        <th> Delete Reply </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($replies as $reply)
                        <tr>
                            <td> {{$reply->id}} </td>
                            <td> {{$reply->author}} </td>
                            <td> {{$reply->email}} </td>
                            <td> {{str_limit($reply->body,20)}} </td>
                            <td> <a href="{{route('home.post', $reply->comment->post->id)}}"> View Comment </td>
                            <td> 
                                @if($reply->is_active == 1)
                                    {!! Form::open(['method'=>'PATCH','action'=> ['CommentRepliesController@update', $reply->id]]) !!}
                
                                        <input type="hidden" name="is_active" value="0">
                                        {!! Form::submit('Unapprove') !!}
            
                                    {!! Form::close() !!}
                
                                @else
                                    {!! Form::open(['method'=>'PATCH','action'=> ['CommentRepliesController@update', $reply->id]]) !!}
                
                                        <input type="hidden" name="is_active" value="1">
                                        {!! Form::submit('Approve') !!}
                                    
                                    {!! Form::close() !!}
                                @endif
                            </td>

                            <td>
                                {!! Form::open(['method'=>'DELETE','action'=> ['CommentRepliesController@destroy', $reply->id]]) !!}
                
                                    {!! Form::submit('Delete') !!}
                
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            @else 
                <h1> There Are No Comments For This Post! </h1>
            @endif

    </center>

    @endsection

    <style>
        table{
            border:2px solid black;
            width:90%;
        }
    
        th{
            border-bottom:2.0px solid black;
            border-right:2.0px solid black;
            border-top:1.0px solid grey;
            border-left:1.0px solid grey;
        }
    
        td{
            margin-right:100px;
        }
    
        h1{
            border:2px solid black;
            width:50%;
        }
    
        h2{
            background-color:black;
            color:white;
            width:20%;
            border:1px solid grey;
            border-radius:4px;
        }
       
        *{
            font-family:geneva;
        }
    
    </style>
