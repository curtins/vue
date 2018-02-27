<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Tabs - Vertical Tabs functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
  <script>
  
  $( document ).ready(function() {

    $('.slider').bxSlider({
      auto: true,  
      autocontrols:true,   
      controls:false,
      autoControls: false,
      stopAutoOnClick: true,
      pager: false  ,
      infiniteloop:true
      
      //slideWidth: 600
    });

  });
  $( function() {
    $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
  } );
  </script>
  <style>
  .ui-tabs-vertical { width: 65em; }
  .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 22em; }
  .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
  .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
  .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; }
  .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}

  a.navigation-link {
  padding: 0px 10px;
  word-wrap: normal;
  display: inline-block; 
}

  </style>
</head>
<body>

<div class="slider" >  

 
    @foreach ($details as $detail)     
    <li><a href="{{$detail->itemid}}"  target="_blank" >{{$detail->feed}}->{{$detail->title}}</a></li>
    @endforeach

</div>    

        <div id="tabs">        

            <ul>

              <?php $cnt=0; ?>    
              @foreach ($feeds as $feed)
              <?php $cnt=$cnt+1; ?>
              <li><a href="#tabs-<?php echo $cnt ?>">{{$feed->feed}}</a></li>     
              @endforeach   
              
            </ul>


            <?php $cnt=0; ?>    
            @foreach ($feeds as $feed)
            <?php $cnt=$cnt+1; ?><div id="tabs-<?php echo $cnt ?>"><p><strong><u>{{$feed->feed}}</u></strong></p>
                
                  @foreach ($details as $detail)     

                  
                  

                    @if ($feed->feed === $detail->feed)              

                      <p><a href="{{$detail->itemid}}"  target="_blank" >{{$detail->title}}</a></p>
                      
                    @endif

                  
                  @endforeach   

            </div>
            @endforeach     

        </div>

 
</body>
</html>