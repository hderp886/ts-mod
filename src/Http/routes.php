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
    * View admin settings
    */
    Route::get('/admin/', [
        'as' => 'ts3.admin',
        'uses' => 'Ts3Controller@getSettings'
    ]);
    
    /**
    * Update admin settings
    */
    Route::post('/admin/', [
        'as' => 'ts3.admin.post',
        'uses' => 'Ts3Controller@postSettings'
    ]);
    
    
});

?>  