<?php


return [
    'teamspeak' => [
        'name'          => 'Teamspeak',
        'icon'          => 'fa-slack',
        'route_segment' => 'ts3',
        'entries' => [
            [
                'name'           => 'Teamspeak Settings',
                'icon'           => 'fa-cogs',
                'permission'     => 'Superuser',
                'highlight_view' => 'research',
                'route'          => 'ts3.admin'
            ]
        ]
    ]
];