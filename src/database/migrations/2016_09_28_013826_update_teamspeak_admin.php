<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class UpdateTeamspeakAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teamspeaksettings', function (Blueprint $table) {
            $table->string('noodlTicker');
            $table->string('noodlCID');
            $table->string('noodlCGID');
            $table->string('s4uceCID');
            $table->string('s4uceCGID');
            
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teamspeaksettings');
    }
}