@extends('_master')

@section('title')
    Your Hairz Results
@stop 

@section('content')
    <h1>Here are your choises</h1>

	<br>

<?php print_r($images); ?>
	
	@foreach ($images as $image)
	
	
	{{ HTML::image($image) }}
	
   
	@endforeach





	
	<br>
	<br>
	<br>
	<a class="btn btn-large btn-primary" type="button" href='/loggedin'>Run Another One!</a>
	<br>
	<br>

		
@stop
