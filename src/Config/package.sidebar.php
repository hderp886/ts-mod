<?php


return [
    'teamspeak' => [
        'name'          => 'Teamspeak',
        'icon'          => 'fa-microphone',
        'route_segment' => 'ts3',
        'entries' => [
            [
                'name'           => 'Teamspeak Settings',
                'icon'           => 'fa-cogs',
                'permission'     => 'Superuser',
                'highlight_view' => 'research',
                'route'          => 'ts3.admin'
            ],
            [
                'name'           => 'Teamspeak Access',
                'icon'           => 'fa-microphone',
                'highlight_view' => 'research',
                'route'          => 'ts3.home'
            ]
        ]
    ]
];