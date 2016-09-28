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
use TeamSpeak3\TeamSpeak3;
use Seat\Web\Models\User;
use Seat\Ts3\Models\TeamspeakUser;
use Auth;

class Ts3Controller extends Controller
{
    public function getControls()
    {
        
        $tssettings = TeamspeakSetting::first();
        $userId = Auth::id();
        $tsuser = TeamspeakUser::where('user_id', $userId)
            ->first();
        
        $pheal = new Pheal();
        
        // Get char ID
        $APIcharacterID = $pheal->eveScope->CharacterID(array("names" => setting('main_character_name')));
        
        // Store char ID
        foreach($APIcharacterID->characters  as $character) {
				$characterID = $character->characterID;
			}
        $fetch = $pheal->eveScope->CharacterInfo(array('characterID' => $characterID));
        $fetchCorporationID = $fetch->corporationID;
        $allianceID = $tssettings->allianceid;
        $fetchAllianceID = $fetch->allianceID;
        
        $allianceArr=explode(",",$allianceID);
        $allowed = '';
        
        foreach ($allianceArr as $allianceArrCode) {
            if ($fetchCorporationID == $allianceArrCode or $fetchAllianceID == $allianceArrCode) {
                $allowed = '1';
            }
            
        }
        
        
        $corp = $pheal->corpScope->CorporationSheet(array('corporationID' => $fetchCorporationID));
        $corpTicker = $corp->ticker;
        
        return view('teamspeak::teamspeak', compact('tssettings','tsuser','corpTicker', 'allowed'));
        
    }
    
    public function postControls()
    {
        
        $tsserver = new \Seat\Ts3\Helpers\TeamSpeak3Adapater;
        $tssettings = TeamspeakSetting::first();
        $pheal = new Pheal();
        
        // Get char ID
        $APIcharacterID = $pheal->eveScope->CharacterID(array("names" => setting('main_character_name')));
        
        // Store char ID
        foreach($APIcharacterID->characters  as $character) {
				$characterID = $character->characterID;
			}
        
        // Check Character exists
        if ($characterID == 0) {
            return redirect()->back()
                ->with('error', 'Error: According to the CCP API server, the character does not exist.');
        }
        
        // Character exists, fetch details
        $fetch = $pheal->eveScope->CharacterInfo(array('characterID' => $characterID));
        
        if ($fetch) {
            $fetchCorporation = $fetch->corporation;
            $fetchCorporationID = $fetch->corporationID;
            $fetchAlliance = $fetch->alliance;
            $fetchAllianceID = $fetch->allianceID;
        } else {
            return redirect()->back()
                ->with('error', 'Could not fetch character details from the API. It may be down. Try again later.');
        }
        
            
        // Check character belongs to the alliance
        $allianceID = $tssettings->allianceid;
        
        $allianceArr=explode(",",$allianceID);
        $allowed = '';
        
        foreach ($allianceArr as $allianceArrCode) {
            if ($fetchCorporationID == $allianceArrCode or $fetchAllianceID == $allianceArrCode) {
                $allowed = '1';
            }
            
        }
        
        
        if ($allowed != '1') {
            return redirect()->back()
                ->with('error', 'Error: This character is not a corp/alliance member. Set your main character to an active member.');
        } 
                
        // Get corp ticker
        $corp = $pheal->corpScope->CorporationSheet(array('corporationID' => $fetchCorporationID));
        if ($corp) {
            $corpTicker = $corp->ticker;
        } else {
           return redirect()->back()
                ->with('error', 'Could not fetch corp ticker from the API. It may be down. Try again later.');
        }
        
                
        // Create the user's name
        $spacer = $tssettings->tsdivider;
        if ($spacer !== "") {
            $nickname = $corpTicker." ".$spacer." ". setting('main_character_name');
        } else {
            $nickname = $corpTicker." ". setting('main_character_name');
        }
                
        // Teamspeak 3 only allows nicknames of up to 30 characters
        $nickname = substr($nickname, 0, 30);
                
        // Set alliance group
        $usergroup = $tssettings->defaultgroup;
        
        // Attempt to find the user
        $tsClient = $tsserver->ts3->clientGetByName($nickname);
        
        if ($tsClient) {
            $tsDatabaseID = $tsClient->client_database_id;
            $tsUniqueID = $tsClient->client_unique_identifier;
        } else {
           return redirect()->back()
                ->with('error', 'Could not find you on the server, your nickname should be exactly '.$nickname.'.');
        }
        
        // Set servergroup
        try {
            $tsClient->addServerGroup($usergroup);
            $setServerGroup = "true";
            if($corpTicker == $tssettings->$noodlTicker) {//"N0ODL") {
                $client->setChannelGroup($tssettings->$noodlCID, $tssettings->$noodlCGID);
            } else {
                $client->setChannelGroup($tssettings->$s4uceCID, $tssettings->$s4uceCGID);
            }
        } catch (\TeamSpeak3_Exception $e) {
            //
        } finally {
            if (!isset($setServerGroup)) {
                return redirect()->back()
                    ->with('error', 'Could not add server group. Either the group doesn\'t exist, or you are already a member');
            }
        }
        
        // Save user to the database
        $userId = Auth::id();
        
        $tsuser = TeamspeakUser::where('user_id', $userId)
                ->first();
        
        if (!count($tsuser)) {
                $tsuser = new TeamspeakUser;
                $tsuser->user_id = $userId;
            }
        
        $tsuser->teamspeak_database_id = $tsDatabaseID;
        $tsuser->teamspeak_unique_id = $tsUniqueID;
        
        if ($tsuser->save()) {
            return redirect()->back()
                ->with('success', 'User saved');
        } else {
            $tsClient->remServerGroup($usergroup);
            return redirect()->back()
                ->with('error', 'Could not save the user to the database');
        }
        
        
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
        $tssettings->allianceid = $request->input('allianceid');
        $tssettings->tsdivider = $request->input('tsdivider');
        $tssettings->defaultgroup = $request->input('defaultgroup');
        
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

    public function applyAllChannelGroups() {
        $tsserver = new \Seat\Ts3\Helpers\TeamSpeak3Adapater;
        $tssettings = TeamspeakSetting::first();
        $usergroup = $tssettings->defaultgroup;
        $clients = $tsserver->serverGroupClientList($usergroup);
        foreach ($clients as $client) {
            $corpTicker = substr($client["client_nickname"], 0, strpos($client["client_nickname"], " |"));
            if($corpTicker == $tssettings->$noodlTicker) {//"N0ODL") {
                $client->setChannelGroup($tssettings->$noodlCID, $tssettings->$noodlCGID);
            } else {
                $client->setChannelGroup($tssettings->$s4uceCID, $tssettings->$s4uceCGID);
            }
        }
    }
    
}