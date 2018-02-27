@extends('layouts.reptapp')

@section('content')

<div class="container">

<nav class="navbar navbar-inverse">
	
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('endpoints') }}">View All Endpoints</a></li>
		<li><a href="{{ URL::to('endpoints/create') }}">Create a Endpoint</a> 
	</ul>
</nav>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div> 
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Category</td>
			<td>Active</td>
		</tr>
	</thead>
	<tbody>
	@foreach($categories as $key => $value)
		<tr>
			<td>{{ $value->category}}</td>
			<td>{{ $value->active }}</td>
		 

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the endpoint (uses the destroy method DESTROY /endpoints/{id} -->
				<!-- we will add this later since its a little more complicated than the first two buttons -->
				{{ Form::open(array('url' => 'endpoints/' . $value->id, 'class' => 'pull-right')) }}
				 
				
				{{ Form::close() }}

				<!-- show the endpoint (uses the show method found at GET /endpoints/{id} -->
				<!--<a class="btn btn-small btn-success" href="{{ URL::to('endpoints/' . $value->id) }}">Show this Endpoint</a> -->

				<!-- edit this endpoint (uses the edit method found at GET /endpoints/{id}/edit -->
			
				<a class="btn btn-small btn-info" href="{{ URL::to('endpoints/' . $value->id . '/edit') }}">Edit</a>


			</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>

@endsection
 