@extends('_master')

@section('title')
    Welcome to Hairz
@stop 

@section('content')

<center>

<div class="well">

<h1>Log in</h1>

{{ Form::open(array('url' => '/login')) }}

    Email<br>
    {{ Form::text('email') }}<br><br>
	

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}

</div>

</center>

@stop





