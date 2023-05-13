<?php

return [
    'database' => [
        'connection' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '4306',
        'dbname' => 'scandiweb_testtask',
        'uname' => 'root',
        'password' => '',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];