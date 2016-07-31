<?php


return [
    'teamspeak' => [
        'name'          => 'Teamspeak',
        'icon'          => 'fa-microphone',
        'route_segment' => 'ts3',
        'entries' => [
            [
                'name'           => 'Teamspeak Access',
                'icon'           => 'fa-microphone',
                'route'          => 'ts3.home'
            ]
        ]
    ],
    'teamspeakadmin' => [
        'name'          => 'Teamspeak Admin',
        'icon'          => 'fa-microphone',
        'permission'     => 'Superuser',
        'route_segment' => 'ts3',
        'entries' => [
            [
                'name'           => 'Server Settings',
                'icon'           => 'fa-cogs',
                'route'          => 'ts3.admin'
            ]
        ]
    ]
];