@extends('_master')

@section('title')
    Welcome to Hairz
@stop 

@section('content')

<center>

<h1>Women's Hair Styles</h1>


<P>Select what type of heirstyle you had in mind, and our generator will generate it for you</p>


</center>
<div class="form-inline">

{{ Form::open(array('url'=>'loggedinw')) }}

<!-- checkbox -->

{{ Form::label('womensshorthairstyles','Womens Short Hair',array('id'=>'','class'=>'')) }}
{{ Form::checkbox('womensshorthairstyles','1',false) }} Select<br><br>

{{ Form::label('womensshortcurlyhairstyles','Womens Short Curly Hair',array('id'=>'','class'=>'')) }}
{{ Form::checkbox('womensshortcurlyhairstyles','1',false) }} Select<br><br>

{{ Form::label('womenslonghairstyles','Womens Long Hair',array('id'=>'','class'=>'')) }}
{{ Form::checkbox('womenslonghairstyles','1',false) }} Select<br><br>

{{ Form::label('womensblackbraidedhairstyles','Womens Black Braided Hair',array('id'=>'','class'=>'')) }}
{{ Form::checkbox('womensblackbraidedhairstyles','1',false) }} Select<br><br>

{{ Form::label('womenssummerhairstyles','Womens Summer Hair',array('id'=>'','class'=>'')) }}
{{ Form::checkbox('womenssummerhairstyles','1',false) }} Select<br><br>

{{ Form::label('womensprofessionalhairstyles','Womens Professional Hair',array('id'=>'','class'=>'')) }}
{{ Form::checkbox('womensprofessionalhairstyles','1',false) }} Select<br><br>

{{ Form::label('womensweddinghairstyles','Womens Wedding Hair',array('id'=>'','class'=>'')) }}
{{ Form::checkbox('womensweddinghairstyles','1',false) }} Select<br><br>


{{ Form::submit('Go!') }}

{{ Form::close() }}

</div>

@stop