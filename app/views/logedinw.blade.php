
<h1>Womens Hair Cuts</h1>


{{ Form::open(array('url'=>'form-submit')) }}

<!-- select box -->
{{ Form::label('status','Status',array('id'=>'','class'=>'')) }}
{{ Form::select('status',array('enabled'=>'Enabled','disabled'=>'Disabled'),'enabled') }}
  
{{ Form::close() }}