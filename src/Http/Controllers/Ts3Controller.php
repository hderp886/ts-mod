<?php


namespace Seat\Ts3\Http\Controllers;


use App\Ts3;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Seat\Ts3\Models\TeamspeakSetting;
use Seat\Ts3\Helpers;
use Seat\Services\Settings\Profile;
use Pheal\Pheal;

class Ts3Controller extends Controller
{
    public function getControls()
    {
        
        $tssettings = TeamspeakSetting::first();
        
        $tssettings->tspass = rawurlencode($tssettings->tspass);
        
        return view('teamspeak::teamspeak', compact('tssettings'));
        
    }
    
    public function postControls()
    {
        
        $tsserver = new \Seat\Ts3\Helpers\TeamSpeak3Adapater;
        $pheal = new Pheal();
        
        // requests /server/ServerStatus.xml.aspx
        $response = $pheal->serverScope->ServerStatus();
        
        
        return redirect()->back()
            ->with('message',   $response->onlinePlayers . 'Pheal connected');
        
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
        
        try {
            $tsserver = new \Seat\Ts3\Helpers\TeamSpeak3Adapater;
            $outcome ='success';
            $message ='Teamspeak Server online!';
        } catch (\TeamSpeak3_Exception $e) {
            echo 'Message: ' .$e->getMessage();
        } finally {
            if (!isset($outcome)) {
                $outcome ='error';
            }
            if (!isset($message)) {
                $message ='No Teamspeak connection made. Check your settings. Check the log file for details.';
            }
            return redirect()->back()
            ->with($outcome, $message);
        }
        
    }
    
}