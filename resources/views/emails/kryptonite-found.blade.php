<!DOCTYPE html>
<html lang="en">
<head>
  <title>Daily Superfeedr Activity</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<br>

<div class="container">

            <div class="table-responsive">     
                 
                <table class=".table .table-bordered">

                    <thead>
                    <tr>
                        <th>Feed</th>
                        <th>Title#</th>        
                    </tr>
                    </thead>

                    <tbody>


                    @foreach($detail as $details) 

                                    

                        <tr>

                        <td style="color:red"><b>{{$details->feed}}</b></td>
                        <td><b><a href="{{$details->itemid}}"  target="_blank" >{{$details->title}}</a></b></td>

                        </tr> 

                                    
                                
                    @endforeach 





                       
                    
                    </tbody>
                </table>

            </div>
  </div>
   
   
 

</body>
</html>

