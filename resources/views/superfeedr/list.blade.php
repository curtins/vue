@extends('layouts.reptapp')

@section('content')

<div class="container">

                <nav class="navbar navbar-inverse">
	
                                <ul class="nav navbar-nav">
                                        <li><a href="{{ URL::to('superfeedr') }}">View All Superfeedr Groups</a></li>
                                        <li><a href="{{ URL::to('superfeedr/create') }}">Create a New Superfeedr Group </a></li> 
                                </ul>
                </nav>



                <table class="table table-condensed table-bordered table-striped table-striped table-hover" >


                        <thead>
                                <tr>
                                  <th  >Feed</th>
                                  <th  >End Point</th>
                                   
                                </tr>
                        </thead>

                        <tbody>


                        @foreach ($rssall as $rss)

                        <tr>
                                <td><b>{{ $rss->url }}</b></td>
                                <td><b>{{ $rss->endpoint }}</b></td>
                                <td><a class="btn btn-small btn-info" href="{{ URL::to('superfeedr/' . $rss->id . '/edit') }}">Remove</a></td> 

                                
                                
                        </tr>

                        @endforeach

                    </tbody>
                    
                </table>
            
</div>

@endsection
