<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Superfeedr;
use App\Grouptype;
use App\Endpoint;
use App\Detail;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

 


class SuperfeedrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function reload()
    {

        $client = new \GuzzleHttp\Client();    
        $res    = $client->request('GET', env('SUPERFEEDR_GET_URL'), [        
            'auth' => [ env('SUPERFEEDR_ID'),  env('SUPERFEEDR_PASSWORD')]
        ]);
                
        $array = json_decode($res->getBody()->getContents(),true);  

        Superfeedr::truncate();
        
        $length = count($array);

            for ($i = 0; $i < $length; $i++) {

                $strformat = $array[$i]["subscription"]["format"] ?: 'atom';
                $strendpoint          = $array[$i]["subscription"]["endpoint"];
                $strtitle             = $array[$i]["subscription"]["feed"]["title"];
                $strurl               = $array[$i]["subscription"]["feed"]["url"];

                $superfeedr = Superfeedr::create (array(
                    
                                
                                "format"        =>  $strformat  ,                                     
                                "endpoint"      =>  $strendpoint,                        
                                "title"         =>  $strtitle ,
                                "url"           =>  $strurl       
                                
                                
                ));

            }    

            Grouptype::truncate();

            $tarray = DB::select("select distinct feed, substr(endpoint,locate('?',endpoint)+6,length(endpoint)-locate('?',endpoint)+1) as 'type' from superfeedrs a, details b where a.title = b.feed;");
            
            foreach($tarray as $r){                

                $grouptype = Grouptype::create (array(
                    
                                
                    "title"         =>  $r->feed  ,                                     
                    "type"          =>  $r->type                       
                       
                    
                    
                ));
            }
                        
            $superfeedrall = Superfeedr::all();
                        
            return view('superfeedr.list')->with( 'rssall', $superfeedrall );


    } 
    public function index()
    {

        $client = new \GuzzleHttp\Client();    
        $res    = $client->request('GET', env('SUPERFEEDR_GET_URL'), [        
            'auth' => [ env('SUPERFEEDR_ID'),  env('SUPERFEEDR_PASSWORD')]
        ]);
                
        $array = json_decode($res->getBody()->getContents(),true);  

        Superfeedr::truncate();
        
        $length = count($array);

            for ($i = 0; $i < $length; $i++) {

                $strformat = $array[$i]["subscription"]["format"] ?: 'atom';
                $strendpoint          = $array[$i]["subscription"]["endpoint"];
                $strtitle             = $array[$i]["subscription"]["feed"]["title"];
                $strurl               = $array[$i]["subscription"]["feed"]["url"];

                $superfeedr = Superfeedr::create (array(
                    
                                
                                "format"        =>  $strformat  ,                                     
                                "endpoint"      =>  $strendpoint,                        
                                "title"         =>  $strtitle ,
                                "url"           =>  $strurl      
                                
                                
                ));

            }    

            return $this->reload();

            $superfeedrall = Superfeedr::all();
            
            return view('superfeedr.list')->with( 'rssall', $superfeedrall );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Endpoint::where ('active','A')->orderBy('created_at', 'desc')->pluck('category','category');       

        return View('superfeedr.create')
            ->with('type', $type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {

        $client = new \GuzzleHttp\Client();

        $group = env('SUPERFEEDR_POST_URL1') .  Input::get('url') . env('SUPERFEEDR_POST_URL2') . Input::get('type');

        $res    = $client->request('post', $group, [        
            'auth' => [ env('SUPERFEEDR_ID'),  env('SUPERFEEDR_PASSWORD')]
        ]);


        return $this->reload();
        
       

        /*

        

        $res    = $client->request('post', env('SUPERFEEDR_POST_URL'), [        
            'auth' => [ env('SUPERFEEDR_  ID'),  env('SUPERFEEDR_PASSWORD')]
        ]);

        $res    = $client->request('GET', env('SUPERFEEDR_GET_URL'), [        
            'auth' => [ env('SUPERFEEDR_ID'),  env('SUPERFEEDR_PASSWORD')]
        ]);
              
       
       $array = json_decode($res->getBody()->getContents(),true) ;  

       */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $superfeedr = Superfeedr::find($id);         

        $client = new \GuzzleHttp\Client();

        //$group = env('SUPERFEEDR_POST_REMOVE1') .  $superfeedr->url . env('SUPERFEEDR_POST_REMOVE2') . $superfeedr->url; 
        $group = env('SUPERFEEDR_POST_REMOVE1') .  $superfeedr->url; 

        //dd($group);

        $res    = $client->request('post', $group, [        
            'auth' => [ env('SUPERFEEDR_ID'),  env('SUPERFEEDR_PASSWORD')]
        ]);

        //dd($res);


        return $this->reload();
        //dd(env('SUPERFEEDR_POST_REMOVE1').  $superfeedr->url . env('SUPERFEEDR_POST_REMOVE2') );

         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
