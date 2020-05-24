@extends('layouts.app')

    @section('content')
        <center>
            <h1> Posts </h1>
            <h2> Welcome : {{Auth::user()->name}} </div> </h2>

            <table>
                <thead>
                    <tr>
                        <th> Id </th>
                        <th> Owner </th>
                        <th> Category </th>
                        <th> Photo </th>
                        <th> Title(Click To Edit)</th>
                        <th> Body </th>
                        <th> Go To Post </th>
                        <th> Go To Posts Comments </th>
                        <th> Created </th>
                        <th> Updated </th>
                    </tr>
                </thead>
                <tbody>
                    @if($posts)
                        @foreach($posts as $post)
                
                            <tr>
                                <td> {{$post->id}} </td>
                                <td> {{$post->user->name}} </td>
                                <td> {{$post->category ? $post->category->name : 'Uncategorized'}} </td>
                                <td> <img height="50px"; width="50px" src="{{$post->photo ? $post->photo->file : 'No Photo'}}" alt=""></td>
                                <td> <a href="{{route('admin.posts.edit', $post->id)}}"> {{$post->title}}  </a> </td>
                                <td> {{str_limit($post->body,20)}} </td>
                                <td> <a href="{{route('home.post', $post->id)}}"> View Post </td>
                                <td> <a href="{{route('admin.comments.show', $post->id)}}"> View Comments </td>
                                <td> {{$post->created_at->diffForhumans()}} </td>
                                <td> {{$post->updated_at->diffForhumans()}} </td>
                            </tr>
            
                        @endforeach
                    @endif
                </tbody>
            </table>
    
            <div id="buttonforcreate"> <a href="{{route('admin.posts.create')}}"> Create Posts </a> </div>

        </center>
    
    @endsection

        <style>
            table{
                border:2px solid black;
            }
        
            th{
                border-bottom:2.0px solid black;
                border-right:2.0px solid black;
                border-top:1.0px solid grey;
                border-left:1.0px solid grey;
        
            }
        
            h1{
                border:2px solid black;
                width:50%;
            }
        
            h2{
                color:white;
                width:20%;
                border:1px solid grey;
                border-radius:4px;
            }
        
            #buttonforcreate{
        
                color:white;
                width:10%;
                border-radius:4px;
                margin-top:10px;
                border:1px solid black;
                height:20px;
            }

            *{
                font-family:geneva;
            }
        
        </style>