<!-- app/views/endpoints/create.blade.php -->

@extends('layouts.reptapp')

@section('content') 

<div class="container">

<nav class="navbar navbar-inverse">
	 
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('endpoints') }}">View Endpoints</a></li>
		<li><a href="{{ URL::to('endpoints/create') }}">Create Endpoint</a>
	</ul>

</nav>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'endpoints')) }}

	<div class="form-group">
		{{ Form::label('category', 'Category') }}
		{{ Form::text('category', Input::old('category'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('active', 'Active') }}
		{{ Form::text('active', Input::old('active'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Create the Endpoint!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
@endsection