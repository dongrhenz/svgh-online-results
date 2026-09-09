<?php

return [
    'site_name' => 'SVGH Laboratory and Diagnostic Results',
    'recaptcha' => [
        // Global switch for the feature.
        'enabled' => true,
        'site_key' => '6LcXSLgUAAAAANiYzTzjTt8ura6cmEpy-2Euh9ru',
        'secret_key' => '6LcXSLgUAAAAACfW7dx8-UzHhAOQcxWewI8PulIe',
        // Local hosts can skip reCAPTCHA to keep development simple.
        'skip_on_hosts' => [
            'localhost',
            '127.0.0.1',
            'svgh-lab',
        ],
        // Add your real public domain here when you deploy.
        'production_hosts' => [
            'lab.example.com',
        ],
    ],
];
