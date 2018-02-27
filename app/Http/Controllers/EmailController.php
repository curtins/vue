<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Mail;
use App\Mail\Summary;

class EmailController extends Controller
{
    public function sendDailySuperfeedrReport(){


        //Mail::to('stephencurtin@hotmail.com')->send(new Summary);
        Mail::to('tvlover2447@yahoo.com')->send(new DailySummary);
        
        //return redirect()->home();
    }


         
    
}
