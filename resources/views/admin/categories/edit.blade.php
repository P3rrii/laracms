@extends('layouts.app')

    @section('content')

        <center>

            <div id="form_for_edit">
                {!! Form::model($category, ['method'=>'PATCH', 'action'=> ['AdminCategoriesController@update', $category->id]]) !!}
  
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name') !!}

                    {!! Form::submit('Update Category') !!}
                
                {!! Form::close() !!}
            </div> 

            <div id="button_for_delete">
                {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminCategoriesController@destroy', $category->id]]) !!}
                    {!! Form::submit('Delete Category') !!}
                {!! Form::close() !!}
            </div>

        </center>

    @endsection

    