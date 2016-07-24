<?php

namespace Seat\Ts3\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TeamspeakAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('teamspeaksettings')->insert([
            'admin' => str_random(10),
            'tsuser' => str_random(10),
            'tshost' => str_random(10),
            'tspass' => str_random(10),
            'tsport' => str_random(10),
            'tscport' => str_random(10),
        ]);
    }
}