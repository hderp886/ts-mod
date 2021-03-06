<?php

Route::group([
    'namespace' => 'Seat\Ts3\Http\Controllers',
    'prefix' => 'teamspeak'
], function(){
        
    /**
    * View user page
    */
    Route::get('/', [
        'as' => 'ts3.home',
        'uses' => 'Ts3Controller@getControls'
    ]);
    
    /**
    * Set permissions
    */
    Route::post('/', [
        'as' => 'ts3.home.post',
        'uses' => 'Ts3Controller@postControls'
    ]);
    
    /**
    * View admin settings
    */
    Route::get('/admin/', [
        'as' => 'ts3.admin',
        'middleware' => 'bouncer:superuser',
        'uses' => 'Ts3Controller@getSettings'
    ]);
    
    /**
    * Update admin settings
    */
    Route::post('/admin/', [
        'as' => 'ts3.admin.post',
        'middleware' => 'bouncer:superuser',
        'uses' => 'Ts3Controller@postSettings'
    ]);
    
    /**
    * Test Connection
    */
    Route::get('/test/', [
        'as' => 'ts3.admin.test',
        'middleware' => 'bouncer:superuser',
        'uses' => 'Ts3Controller@testSettings'
    ]);
    
    
});

?>  