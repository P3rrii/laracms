@extends('layouts.app')

   @section('content')

      <center>
         <h1> Create Users </h1>

            {!! Form::open(['method'=>'POST', 'action'=> 'AdminUsersController@store','files'=>true]) !!}
               <div>
                  {!! Form::label('name', 'Name:') !!}
                  {!! Form::text('name') !!}
               </div>

               <div>
                  {!! Form::label('email', 'Email:') !!}
                  {!! Form::text('email') !!}
               </div>

               <div>
                  {!! Form::label('role_id', 'Role:') !!}
                  {!! Form::select('role_id',[''=>'Choose Options'] + $roles, null) !!}
               </div>

               <div>
                  {!! Form::label('is_active', 'Status:') !!}
                  {!! Form::select('is_active',array(1 => 'Active', 0=> 'Not Active'),0) !!}
               </div>

               <div>
                  {!! Form::label('photo_id', 'Photo:') !!}
                  {!! Form::file('photo_id',null) !!}
               </div>

               <div>
                  {!! Form::label('password', 'Password:') !!}
                  {!! Form::password('password') !!}
               </div>

               <div>
                  {!! Form::submit('Create User') !!}
               </div>

            {!! Form::close() !!}
          
         @include('includes.form')
    
         <a href="{{route('admin.users.index')}}"> All Users </a>
         
      </center>

   @endsection

<style>
    h1{
        border:2px solid black;
        width:50%;
    }

    *{
       font-family:geneva;
    }
    
</style>