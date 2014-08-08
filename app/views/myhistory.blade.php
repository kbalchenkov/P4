@extends('_master')

@section('title')
    Your Hairz Results
@stop 

@section('content')
    <h1>Here is your history</h1>

	<a class="btn btn-large btn-primary" type="button" href='/loggedin'>Get More Hair Cut Ideas</a><br><br>


	@foreach ($historys as $history)
	
	

	{{ $history->url_name; }}<br>
	
	

	
   
	@endforeach






	<br>

		
@stop
