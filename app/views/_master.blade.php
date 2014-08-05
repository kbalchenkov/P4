<!DOCTYPE html>
<html>
<head>

    <title>@yield('title', 'My Web Site');</title>

    <meta charset='utf-8'>

    @yield('head')

</head>
<body>

@if(Auth::check())
    <a href='/logout'>Log out {{ Auth::user()->email; }}</a>
@else 
    <a href='/signup'>Sign up</a> or <a href='/login'>Log in</a>
@endif




    @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif


@yield('content')









</body>
</html>