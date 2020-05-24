@extends('layouts.admin')
<center>
<h1> Upload Media </h1>

</center>


@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">

@stop

@section('content')

    {!! Form::open(['method'=>'POST','action'=>'AdminMediasController@store', 'class'=>'dropzone']) !!}

    {!! Form::close() !!}
@stop 

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"> </script>

@stop