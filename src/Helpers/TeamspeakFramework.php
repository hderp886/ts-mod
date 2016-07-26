<?php

namespace Seat\Ts3\Helpers;

use TeamSpeak3\TeamSpeak3;
use Seat\Ts3\Models\TeamspeakSetting;

class TeamSpeak3Adapater
{
    private $ts;
    
    $tssettings = TeamspeakSetting::first();
    
    public __construct()
    {
        $this->ts3 = TeamSpeak3::factory("serverquery://" . $tssettings->tsuser . ":" . $tssettings->tspass . "@" . $tssettings->tshost . ":" . $tssettings->tsport . "/?server_port=" . $tssettings->tscport);
    }

    public writeMessage($message)
    {
        $this->ts3->message($message);
    }
}