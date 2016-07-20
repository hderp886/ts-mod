<?php

Route::group([
    'namespace' => 'Seat\Ts3\Http\Controllers',
    'prefix' => 'teamspeak'
], function(){
        
    Route::get('/', [
        'as' => 'ts3.home',
        'uses' => 'Ts3Controller@getControls'
    ]);
    
});

?>  