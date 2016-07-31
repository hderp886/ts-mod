<?php

namespace Seat\Ts3\Models;

use Illuminate\Database\Eloquent\Model;
use Seat\Web\Models\User;

class TeamspeakUser extends Model
{
    protected $table = 'teamspeakusers';
    
    protected $fillable = [
        'user_id',
        'teamspeak_database_id',
        'teamspeak_unique_id'
    ];
    protected $primaryKey = 'user_id';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

