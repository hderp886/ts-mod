<?php


namespace Seat\Ts3\Http\Controllers;


use App\Ts3;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Seat\Ts3\Models\TeamspeakSetting;

class Ts3Controller extends Controller
{
    public function getControls()
    {
        //return view('controls');
        return 'Hello World';
    }
    
    public function getSettings()
    {
        $tssettings = TeamspeakSetting::first();
        
        return view('teamspeak::teamspeaksettings', compact('tssettings'));
    }
    
}