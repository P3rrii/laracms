@extends('layouts.app')

    @section('content')

        <center>
            <h1> All Users List </h1>
            <h2> Welcome : {{Auth::user()->name}} </div> </h2>

            @if(Session::has('deleted_user'))
                <h5> Deleted User </h5>
            @endif

            <table>
                <thead>
                    <tr>
                        <th> Id </th>
                        <th> Photo </th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Role </th>
                        <th> Active </th>
                        <th> Created </th>
                        <th> Updated </th>
                    </tr>
                </thead>

                <tbody>
                    @if($users)
                        @foreach($users as $user)
                            <tr>
                                <td> {{$user->id}} </td>
                                <td> <img height="50px"; width="50px" src="{{$user->photo ? $user->photo->file : 'No Photo'}}" alt=""></td>
                                <td> <a href="{{route('admin.users.edit', $user->id)}}"> {{$user->name}} </a> </td>
                                <td> {{$user->email}} </td>
                                <td> {{$user->role->name}} </td>
                                <td> {{$user->is_active == 1 ? 'Active' : 'Not Active'}} </td>
                                <td> {{$user->created_at->diffForHumans()}} </td>
                                <td> {{$user->updated_at->diffForHumans()}} </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <div id="buttonforcreate"> <a href="{{route('admin.users.create')}}"> Create Users </a> </div>

        </center>

    @endsection 

<style>
    table{
        border:2px solid black;
        width:75%;
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