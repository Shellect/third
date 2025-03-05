<?php

return [
    'driver' => 'pdo_mysql',
    'host' => 'mysql',
    'dbname' => 'mydatabase',
    'user' => 'myuser',
    'password' => 'mypassword',
    'charset' => 'utf8',
    'default_table_options' => [
        'charset' => 'utf8',
        'collate' => 'utf8_unicode_ci',
    ],
    'useSavepoints' => false,
];
