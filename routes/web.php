<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use Carbon\Carbon;
use App\Header;
use App\Detail; 
use App\User;
use App\Mail\DailySummary;
use App\Mail\OrderShipped; 
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use MySportsFeeds\MySportsFeeds;


Route::get('/baseball', function () {   

    $login = 'curtins';
    $password = 'April1955#';
    $url = 'https://api.mysportsfeeds.com/v1.2/pull/mlb/2018-regular/scoreboard.json?fordate=20180616';
     

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$login:$password"); 
    $data = curl_exec($ch);
    curl_close($ch);  
    //echo($json); 


    $array = json_decode($data,true); 

    //print_r ($array);

    $strfeed = $array['latestupdates']['lastUpdateOn'];

    dd($strfeed);

     


        //echo ($json->latestupdates);    //for//each ($json as $key => $value) {
    //    echo "{$key} => {$value} ";
    //    print_r($arr);
    //   }

    //echo   count($json['feedentry']);
    //var_dump($json);
    //$strfeed = $json['latestupdates']['feedentry']['feed'][0]['Name'];

    //"code"      => $json['status']['code'],       

    //$strtitle = $json['latestupdates']['lastUpdatedOn'];   
    
     //echo($strtitle);
     //$strtitle = $json['latestupdates']['lastUpdatedOn']; 

    // echo  

    // echo $json[0]["feed"]; // Access Array data

    
     
});




 

Route::get('/headers', function () {   

    $headers = Header::all();  
    return view('headers',compact('headers'));
     
});

Route::get('report/{group?}', 'DetailController@getFeeds')->named('feedname');

Route::get('tabreport', 'DetailController@tabReports');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/superfeedrlist', 'SuperfeedrController@GetSuperfeedrList');

Route::get('/superfeedradd', 'SuperfeedrController@AddSuperfeedrRSS');

Route::get('/superfeedraddxml', 'SuperfeedrController@GetSuperfeedrXML');

Route::resource('endpoints', 'EndPointController');

Route::resource('superfeedr', 'SuperfeedrController');

 




 

Route::get('/guzzle', function () {

    

    $client = new GuzzleHttp\Client();

    //$res    = $client->request('GET', 'https://push.superfeedr.com?hub.mode=list', [        
    //        'auth' => ['curtins', '32a1c1934dfa7073a0a02f85a2c3924c']
    //]);

    $res    = $client->request('GET', env('SUPERFEEDR_GET_URL'), [        
        'auth' => [ env('SUPERFEEDR_ID'),  env('SUPERFEEDR_PASSWORD')]
    ]);
    

   $res->getStatusCode();

   $res->getHeader('content-type');
    // 'application/json; charset=utf8'
   //dd($res->getBody()->getContents());
   $array = json_decode($res->getBody()->getContents(),true);
    // {"type":"User"...'

    //dd($res->getBody()->getContents());

    //dd($array);
        
         



        //curl https://push.superfeedr.com/
        //-G
        //-u demo:demo
        //-d'hub.mode=list'
        //-d'page=2'


        //curl https://push.superfeedr.com/ -G -u curtins:32a1c1934dfa7073a0a02f85a2c3924c -d'hub.mode=list' -d'page=2'






    
    
    // Create a client and provide a base URL
    //$client = new Client('https://api.github.com');


    //$request = $client->get('/user');
    //$request->setAuth('stephencurtin@hotmail.com', 'April1955#');
    //echo $request->getUrl();
     
    
    //$request = $client->get('https://push.superfeedr.com/', [
    //    'headers' => [
    //        'Authorization' => '32a1c1934dfa7073a0a02f85a2c3924c',
    //        'Accept'        => 'application/json',

    //    ]
    




    //$client = new Client('http://baseurl.com/api/v1');

    //$client = new Client();

    //$request->setAuth('curtins', '32a1c1934dfa7073a0a02f85a2c3924c');

    //$response = $request->send();

    //echo $response->getBody();
    // >>> {"type":"User", ...
    
    //echo $response->getHeader('Content-Length');
    // >>> 792
    
    //$data = $response->json();
    //echo $data['type'];

    //dd($data);






    




    /*
    
    $client = new \GuzzleHttp\Client();

    $request = $client->get('https://push.superfeedr.com/', [
        'headers' => [
            'Authorization' => '32a1c1934dfa7073a0a02f85a2c3924c',
            'Accept'        => 'application/json',

        ],

    $response = $request->send();
    $returned = ($response->getBody());

    dd($returned);
   
         
    ]);

   
    
    // You need to parse the response body
    // This will parse it into an array
    
     

  
    /*
    curl https://push.superfeedr.com/
    -G
    -u demo:demo
    -d'hub.mode=list'
    -d'page=2'
    

    $request = $client->get('https://push.superfeedr.com/');
    $request->setAuth('curtins', '32a1c1934dfa7073a0a02f85a2c3924c');
    $response->getBody();
    $data = $response->json();
     */    
    
    
}); 

Route::get('/send', 'DetailController@sendEmail');

//Route::get('/send', function () {

    

  //$detail = \App\Detail::get();  

  //$groupname = DB::select("select feed ,feedoriginal  from details  group by feed, feedoriginal order by feed; ");


  



  //select feed, count(*) as 'cnt' from details group by feed order by 1;

  //dd($detail);
     
  

   // return $this->from('example@example.com')
   // ->view('emails.orders.shipped');

   // return $this->markdown('emails.daily_superfeedr');
    
   //$detail = DB::select("select feed, count(*) as 'cnt' from details group by feed order by 1;");
   //\Mail::to('tvlover2447@yahoo.com')->send(new OrderShipped($detail));
   // dd('Mail Send Successfully');
   


//}); 
