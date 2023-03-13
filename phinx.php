<?php

return
    [
        'paths' => [
            'migrations' => './App/Database/Migrations',
            'seeds' => './App/Database/Seeds'
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_environment' => 'development',
            'development' => [
                'adapter' => 'mysql',
                'host' => 'localhost',
                'name' => 'projectmanager',
                'user' => 'root',
                'pass' => '',
                'port' => '3306',
                'charset' => 'utf8',
            ],
        ],
        'version_order' => 'creation'
    ];
