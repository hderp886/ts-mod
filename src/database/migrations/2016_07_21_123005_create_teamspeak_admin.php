<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamspeakAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teamspeaksettings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admin');
            $table->string('tshost');
            $table->string('tsuser');
            $table->string('tspass');
            $table->string('tsport');
            $table->string('tscport');
            $table->timestamps();
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