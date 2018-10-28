<?php
return [
    'mysql' => [
        'host_type' => 'mysql:host',
        'host'      => '127.0.0.1',
        'dbname'    => 'framework_test',
        'user'      => \Core\Environment::Get('DB_USER', 'fm_user', true),
        'pass'      => \Core\Environment::Get('DB_PASS', '12345', true)
    ]
];