@extends('_master')

@section('title')
    Developer's Best Friend
@stop 

@section('content')
    <h1>Welcome to Hairz</h1>
	<h2>Looking for hair cut ideas? Look no further.  <h2>
	
	<p>Find ideas for your next haircut, Sign up and start browsing!</p>
	<br>

	
	
	@foreach ($images as $image)
    <p>Here are your choises {{ HTML::image($image) }}</p>
	@endforeach



	
	<br>
	<a href='/loggedin'>Sign up Now!</a>
	<br>
	<br>

		
@stop
