<?php

use Illuminate\Database\Seeder;

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