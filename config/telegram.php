<?php

return [
    'bot_token' => env('TELEGRAM_BOT_TOKEN', '6868288442:AAGB3aQgcHkm8gNpIQ7iGooiRfXBI9Tq1xU'),

    'async_requests' => env('TELEGRAM_ASYNC_REQUESTS', false),

    'http_client_handler' => null, // You can set this to a custom HTTP client handler if needed

    'commands' => [
        // Add your custom bot commands here
    ],

    'default' => [
        'timeout' => env('TELEGRAM_TIMEOUT', 30), // Default timeout for requests
        'base_uri' => 'https://api.telegram.org', // Base URI for the Telegram API
    ],
];