@extends('layouts.app')

    @section('content')

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
                                <th> View Replies </th>
                                <th> Approve Comment </th>
                                <th> Delete Comment </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td> {{$comment->id}} </td>
                                    <td> {{$comment->author}} </td>
                                    <td> {{$comment->email}} </td>
                                    <td> {{str_limit($comment->body,30)}} </td>
                                    <td> <a href="{{route('home.post', $comment->post->id)}}"> View Post </td>
                                    <td> <a href="{{route('admin.comment.replies.show',$comment->id)}}" </a> View Replies </td>
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

                    @else
                        <h1> No Comments </h1>
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