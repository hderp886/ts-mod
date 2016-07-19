<?php

Route::group([
    'namespace' => 'Seat\Ts3\Http\Controllers',
    'prefix' => 'teamspeak'
], function(){
        
    Route::get('/', [
        'uses' => 'Ts3Controller@getControls'
    ]);
    
});

?>  