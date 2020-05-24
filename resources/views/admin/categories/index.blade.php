@extends('layouts.app')

    @section('content')

        <center>

            <h1> Categories </h1>

                <table>
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> Created At </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($categories)
                            @foreach($categories as $category)

                                <tr>
                                    <td> {{$category->id}} </td>
                                    <td> <a href="{{route('admin.categories.edit', $category->id)}}"> {{$category->name}} </a> </td>
                                    <td> {{$category->created_at ? $category->created_at->diffForHumans() : 'No Date'}} </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div id="form_for_creation">
                    {!! Form::open(['method'=>'POST', 'action'=> 'AdminCategoriesController@store']) !!}
  
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name') !!}

                        {!! Form::submit('Create Category') !!}
    
                    {!! Form::close() !!}
                </div> 
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
        width:25%;
    }

    th{
        border-bottom:2.0px solid black;
        border-right:2.0px solid black;
        border-top:1.0px solid grey;
        border-left:1.0px solid grey;
    }

    #form_for_creation{
        margin-top:40px;
    }

</style>