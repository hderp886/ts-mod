<?php

namespace Seat\Ts3\Models;

use Illuminate\Database\Eloquent\Model;

class TeamspeakSetting extends Model
{
        protected $fillable = [
        'id',
        'admin',
        'tshost',
        'tsuser',
        'tspass',
        'tsport',
        'tscport'
    ];
    protected $primaryKey = 'id';
}

