@extends('_master')

@section('title')
    Welcome to Hairz
@stop 

@section('content')

<center>

<div class="well">

<h1>Sign up</h1>


{{ Form::open(array('url' => '/signup')) }}

    Email<br>
    {{ Form::text('email') }}<br><br>
	
	
	
	Gender<br>
	{{ Form::label('','',array('id'=>'','class'=>'')) }}
	{{ Form::radio('Gender','Womens',true) }} Women's
	{{ Form::radio('Gender','Mens') }} Men's<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

	{{ Form::submit('Submit') }}

{{ Form::close() }}

</div>

</center>

@stop