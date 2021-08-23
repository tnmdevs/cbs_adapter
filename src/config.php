<?php

return [
    'username' => env('CBS_USERNAME', ''),
    'password' => env('CBS_PASSWORD', ''),
    'base_url' => env('CBS_BASE_URL', ''),
    'timeout' => env('CBS_TIMEOUT', 30),

    'recharge' => [
        'key' => env('CBS_RECHARGE_KEY', '')
    ]
];
