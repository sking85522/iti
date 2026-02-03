<?php
return [
    'site_name' => 'Techelevatex',
    'site_url' => getenv('SITE_URL') ?: 'https://techelevatex.in',
    'default_language' => 'en',
    'db' => [
        'host' => getenv('DB_HOST') ?: 'localhost',
        'name' => getenv('DB_NAME') ?: 'techelevatex',
        'user' => getenv('DB_USER') ?: 'root',
        'pass' => getenv('DB_PASSWORD') ?: ''
    ]
];
