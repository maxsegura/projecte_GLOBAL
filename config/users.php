<?php
return [
    'default_user' => [
        'name' => env('DEFAULT_USER_NAME', 'Default User'),
        'email' => env('DEFAULT_USER_EMAIL', 'default@videosapp.com'),
        'password' => env('DEFAULT_USER_PASSWORD', 'password'),
    ],
    'professor' => [
        'name' => env('PROFESSOR_NAME', 'Professor'),
        'email' => env('PROFESSOR_EMAIL', 'professor@videosapp.com'),
        'password' => env('PROFESSOR_PASSWORD', 'password'),
    ],
];
