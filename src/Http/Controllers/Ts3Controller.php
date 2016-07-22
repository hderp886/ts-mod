<?php


namespace Seat\Ts3\Http\Controllers;


use App\Ts3;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Ts3Controller extends Controller
{
    public function getControls()
    {
        //return view('controls');
        return 'Hello World';
    }
    
    public function getSettings()
    {
        $tssettings = Teamspeaksetting::first();
        
        return view('teamspeak::teamspeaksettings', compact('tssettings'));
    }
    
}