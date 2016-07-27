<?php


namespace Seat\Ts3\Http\Controllers;


use App\Ts3;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Seat\Ts3\Models\TeamspeakSetting;
use Seat\Ts3\Helpers;

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
    
    public function postSettings(Request $request)
    {
        $tssettings = TeamspeakSetting::first();
        
        if (!count($tssettings)) {
            $tssettings = new TeamspeakSetting;
        }
        
        $tssettings->admin = $request->input('admin');
        $tssettings->tshost = $request->input('tshost');
        $tssettings->tsuser = $request->input('tsuser');
        $tssettings->tspass = $request->input('tspass');
        $tssettings->tsport = $request->input('tsport');
        $tssettings->tscport = $request->input('tscport');
        
        $tssettings->save();
        return redirect()->back()
            ->with('success', 'Teamspeak settings updated');
        
    }
    
    public function testSettings()
    {
        
        //try {
        //    $tsserver = new TeamSpeak3Adapater;
        //    return redirect()->back()
        //    ->with('success', 'Teamspeak Server online!');
        //} catch (TeamSpeak3_Exception $e) {
        //    return redirect()->back()
        //    ->with('failure', 'No Teamspeak connection made.');
        //}
        
        return 'Test page';
        
        
    }
    
}