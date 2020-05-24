@extends('layouts.app')

    @section('content')
        <center>
            <h1> Media </h1>

            @if($photos)

                <table>
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> Created At </th>
                            <th> Delete Media </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($photos as $photo)

                            <tr>
                                <td> {{$photo->id}} </td>
                                <td><img height="50px" width="50px" src="{{$photo->file}}" </td>
                                <td> {{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date'}} </td>
                                <td> 

                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
                                {!! Form::submit('Delete') !!}
                                {!! Form::close() !!}
                            </tr>
        
                    @endforeach
                </tbody>
            </table>
        @endif  
    </center>
@endsection

<style>
    table{
        border:2px solid black;
        width:25%;
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
        width:25%;
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