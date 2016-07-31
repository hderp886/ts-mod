<?php

namespace Seat\Ts3\Models;

use Illuminate\Database\Eloquent\Model;

class TeamspeakSetting extends Model
{
    protected $table = 'teamspeaksettings';
    
    protected $fillable = [
        'id',
        'admin',
        'tshost',
        'tsuser',
        'tspass',
        'tsport',
        'tscport',
        'allianceid',
        'tsdivider',
        'defaultgroup'
    ];
    protected $primaryKey = 'id';
}

