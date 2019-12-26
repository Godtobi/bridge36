<?php

return [
    'user' => [
        'model' => 'App\User',
        'foreignKey' => null,
        'ownerKey' => null,
    ],
    'broadcast' => [
        'enable' => false,
        'app_name' => 'Laravel',
        'pusher' => [
            'app_id' => '888249',
            'app_key' => 'fd5641148c2e34c760d4',
            'app_secret' => 'abd8a4179e00ed357375',
            'options' => [
                'cluster' => 'eu',
                'encrypted' => true
            ]
        ],
    ],
    'oembed' => [
        'enabled' => false,
        'url' => '',
        'key' => ''
    ]
];

