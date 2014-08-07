<!DOCTYPE html>
<html>
<head>


{{ HTML::style('css/style.css') }}
{{ HTML::style('css/bootstrap.min.css') }}

    <title>@yield('title', 'My Web Site');</title>

    <meta charset='utf-8'>

    @yield('head')

</head>
<body>
    
	
@if(Session::get('flash_message'))
    <img class='flash-message'>{{ Session::get('flash_message') }}</img>
@endif
	
	
@if(Auth::check())
    <a href='/logout'>Log out {{ Auth::user()->email; }}</a>
@else 
    <a href='/signup'>Sign up</a> or <a href='/login'>Log in</a>
@endif







@yield('content')









</body>
</html>