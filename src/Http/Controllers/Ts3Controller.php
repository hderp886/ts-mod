<?php


namespace Seat\Ts3\Http\Controllers;

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
        return view('teamspeaksettings');
    }
    
}