@extends('layouts.app')

   @section('content')

      <center>
         <h1> Edit User </h1>

         <img height="50px"; width="50px" src="{{$user->photo ? $user->photo->file : 'No Photo'}}" alt="">

         {!! Form::model($user,['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $user->id],'files'=>true]) !!}
         
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
               {!! Form::select('role_id', $roles, null) !!}
            </div>

            <div>
               {!! Form::label('is_active', 'Status:') !!}
               {!! Form::select('is_active',array(1 => 'Active', 0=> 'Not Active'), $user->is_active) !!}
            </div>

            <div>
               {!! Form::label('photo_id', 'Photo:') !!}
               {!! Form::file('photo_id', null)!!}
            </div>

            <div>
               {!! Form::label('password', 'Password:') !!}
               {!! Form::password('password') !!}
            </div>

            <div>
               {!! Form::submit('Edit User') !!}
            </div>
         
         {!! Form::close() !!}
         
         
         {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminUsersController@destroy', $user->id ]]) !!}
            {!! Form::submit('Delete User')!!}
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