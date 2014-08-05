<h1>Men's Hair Styles</h1>


<P>Select what type of heirstyle you had in mind, and our generator will generate it for you</p>

{{ Form::open(array('url'=>'logedinm')) }}

<!-- checkbox -->
{{ Form::label('mensshorthair','Mens Short Hair',array('id'=>'','class'=>'')) }}
{{ Form::checkbox('mensshorthair','1',false) }} Select<br><br>

{{ Form::label('mensmediumlength','Mens Medium Length',array('id'=>'','class'=>'')) }}
{{ Form::checkbox('mensmediumlength','1',false) }} Select<br><br>

{{ Form::label('menslonghairstyles','Mens Long Hair',array('id'=>'','class'=>'')) }}
{{ Form::checkbox('menslonghairstyles','1',false) }} Select<br><br>

{{ Form::label('menscurlyhairstyles','Mens Curly Hair',array('id'=>'','class'=>'')) }}
{{ Form::checkbox('menscurlyhairstyles','1',false) }} Select<br><br>

{{ Form::label('mensblackandafrohairstyles','Mens Black and Afro Hair',array('id'=>'','class'=>'')) }}
{{ Form::checkbox('mensblackandafrohairstyles','1',false) }} Select<br><br>

{{ Form::label('menscelebrityhairstyles','Mens Celebrity Hair',array('id'=>'','class'=>'')) }}
{{ Form::checkbox('mensblackandafrohairstyles','1',false) }} Select<br><br>
  
{{ Form::submit('Save') }}


 
{{ Form::close() }}

