<!-- app/views/superfeedr/create.blade.php -->

@extends('layouts.reptapp')

@section('content') 

<div class="container">

<nav class="navbar navbar-inverse">
	 
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('superfeedr') }}">View Groups</a></li>
	 
	</ul>

</nav>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'superfeedr')) }}

	<div class="form-group">
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('url', 'URL') }}
		{{ Form::text('url', Input::old('url'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{!! Form::Label('type', 'Type') !!}
		{!! Form::select('type', $type, $type, ['class' => 'form-control']) !!} 
	</div>

 

	 

	{{ Form::submit('Create the Group!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
@endsection