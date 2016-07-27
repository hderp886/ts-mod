<?php

namespace Seat\Ts3\Helpers;

use TeamSpeak3\TeamSpeak3;
use Seat\Ts3\Models\TeamspeakSetting;

class TeamSpeak3Adapater
{
    private $ts;
    
    public function __construct()
    {
        $tssettings = TeamspeakSetting::first();
        $this->ts3 = TeamSpeak3::factory("serverquery://" . $tssettings->tsuser . ":" . $tssettings->tspass . "@" . $tssettings->tshost . ":" . $tssettings->tsport . "/?server_port=" . $tssettings->tscport);
    }

    public function writeMessage($message)
    {
        $this->ts3->message($message);
    }
}