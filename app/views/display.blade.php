@extends('_master')

@section('title')
    Your Hairz Results
@stop 

@section('content')
    <h1>Here are your choises, check the ones you like to save it in your history</h1>

	<br>

	{{ Form::open(array('url'=>'history')) }}
	@foreach ($images as $image)
	
	

	{{ HTML::image($image, 'photo', array('class' => 'photo')); }}
	
	
	<Input type = 'Checkbox' Name ='<?PHP print $image; ?>' value ="image" >
	
   
	@endforeach





	
	<br>
	<br>
	<br>
	<a class="btn btn-large btn-primary" type="button" href='/loggedin'>Run Another One!</a>

	
	{{ Form::submit('Select and Save Your Choises!') }}
	<br>
	<br>

		
@stop
