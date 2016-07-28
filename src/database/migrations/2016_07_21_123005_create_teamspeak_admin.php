<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

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
            
            $table->primary('id');
        });
        
        Schema::create('teamspeakusers', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->string('teamspeak_database_id');
            $table->string('teamspeak_unique_id');
            $table->timestamps();
            
            $table->primary('user_id');
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
        Schema::drop('teamspeakusers');
    }
}