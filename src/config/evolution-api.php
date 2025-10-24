<?php

return [
    'base_url' => env('EVOLUTION_API_BASE_URL', 'https://sub.domain.com'),
    'global_api_key' => env('GLOBAL_API_KEY', ''),

    'default_integration' => 'WHATSAPP-BAILEYS',

    'timeout' => 30,
    'retry_times' => 3,
    'retry_sleep' => 100,
];
