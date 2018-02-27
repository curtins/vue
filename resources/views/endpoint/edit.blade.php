<!-- app/views/endpoints/create.blade.php -->

@extends('layouts.reptapp')

@section('content') 

<h1><b>Edit {{ $endpoint->category }}</b></h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($endpoint, array('action' => array('EndPointController@update', $endpoint->id), 'method' => 'PUT')) }}

	

	<div class="form-group">
		{{ Form::label('active', 'Active') }}
		{{ Form::text('active', null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

 

@endsection