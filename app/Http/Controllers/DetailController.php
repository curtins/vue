<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use App\Mail\OrderShipped;
 

class DetailController extends Controller
{

    public function tabReports()
    {

        $feeds = DB::select("select feed , count(*) as 'cnt' from details group by feed   order by 1 desc");
        $details = Detail::all()->sortByDesc('created_at');

        return view('reporttab')
        ->with('feeds', $feeds) 
        ->with('details', $details);

    }

    public function getFeeds($group = 'All')
    {
    
        $detail = Detail::all()->sortByDesc('created_at');
    
        $marquee=""; 
    
        $feeds = DB::select("select feed , count(*) as 'cnt'  from details group by feed   order by 1 desc");

        //<td><b><a href="{{$details->itemid}}"  target="_blank" >{{$details->title}}</a></b></td>

        foreach ($feeds as $feed)
        {
            $marquee = $marquee . "<a href=" . $feed->feed . "target='_blank' >" . $feed->feed . "</a>";
        }
        //dd($marquee);
    
        //$groupname = DB::select("select feed ,concat('}',feedoriginal) as   from details  group by feed, feedoriginal order by feed; ");

        //$groupname = DB::select("select feed ,concat('}',feed) as  feedoriginal from details group by feed, feedoriginal order by feed; ");

        $groupname = DB::select("select feed ,concat('}',feed) as  feedurl from details group by feed, feedurl order by feed; ");


        $typename  = DB::select("select type from details  group by type order by type; ");

        dd($detail);
    
        return view('reports')
        ->with('detail', $detail)
        ->with('marquee',  $marquee)
        ->with('groupname', $groupname)
        ->with('typename', $typename)
        ->with('group', $group);
    }

    public function sendEmail()
    {

        $detail = DB::select("select feed, count(*) as 'cnt' from details group by feed order by 1;");
        
        
        
          //select feed, count(*) as 'cnt' from details group by feed order by 1;
        
          //dd($detail);
             
        \Mail::to('tvlover2447@yahoo.com')->send(new OrderShipped($detail));


        return 0; 
    }   
}
