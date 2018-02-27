@extends('layouts.reptapp')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 ">

            <div class="panel panel-default">

                <div class="panel-heading"> 
                    
                    {{--<p style="color:red; font-weight: bold; font-size: 18px;"><marquee behavior="scroll" direction="left"> {{ $marquee }} </marquee></p> --}}

                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Tags
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">

                            @foreach($typename as $typenames)                                 
                                <td><li role="presentation"><a role="menuitem1" tabindex="-1" href="/report/{{ $typenames->type }}"><?=str_replace_first('{',' ',$typenames->type)?></a></td></li>
                            @endforeach 
                         
                        </ul>
                    </div>
                
                </div>

                    <table width="100%" class="table table-bordered table-striped" id="maintainable">

                        @if($group == 'All')                         
                    
                            @foreach($detail as $details)                                     

                                        <tr>
                                        <td style="color:red"><b>{{$details->feed}}</b></td>
                                        <td><b><a href="{{$details->itemid}}"  target="_blank" >{{$details->title}}</a></b></td>
                                        </tr> 
                                
                            @endforeach 

                        @endif                                             
                                   
                         

                        @if( ! str_contains($group,'All')  ) 
                    
                            @foreach($detail as $details) 

                                @if($details->type == $group)                                   

                                        <tr>

                                        <td style="color:red"><b>{{$details->feed}}</b></td>
                                        <td><b><a href="{{$details->itemid}}"  target="_blank" >{{$details->title}}</a></b></td>
                                        </tr> 

                                @endif        

                                   
                                
                            @endforeach 

                        @endif    

                        


                        @if( str_contains($group,'}')  ) 

                             
                    
                            @foreach($detail as $details)     
                            
                                

                                @if( $details->feed ==  str_replace_first('}','',$group )   )   

                                        <tr>

                                        <td style="color:red"><b>{{$details->feed}}</b></td>
                                        <td><b><a href="{{$details->itemid}}"  target="_blank" >{{$details->title}}</a></b></td>
                                        </tr> 

                                @endif        

                                   
                                
                            @endforeach 

                        @endif 

                   </table>

                 
                </div>

        </div>
    </div>
</div>
@endsection
