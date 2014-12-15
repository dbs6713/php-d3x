<?php

$project_dir = realpath(__DIR__.'/../../');

$config = [
    'application' => [
        'dir' => [
            'src'               => $project_dir.'/src',
            'common'            => $project_dir.'/src/Common',
            'domain'            => $project_dir.'/src/Common/Domain',
            'event'             => $project_dir.'/src/Common/Domain/Event',
            'incident'          => $project_dir.'/src/Common/Domain/Incident',
            'factory'           => $project_dir.'/src/Common/Domain/Factory',
            'infrastructure'    => $project_dir.'/src/Common/Infrastructure',
            'datagateway'       => $project_dir.'/src/Common/Infrastructure/Datagateway',
            'persistence'       => $project_dir.'/src/Common/Infrastructure/Datagateway/Persistence',
        ],
        'namespaces' => [
        ]
    ],
    'databases' => [
        'default' => [
            'adapter'   => 'mysql',
            'host'      => 'localhost',
            'username'  => 'emssvc',
            'password'  => 'vQq4vWWEq737',
            'dbname'    => 'EMSDV1'
        ],
        'backup' => [
            'adapter'   => 'sqlite',
            'host'      => 'localhost',
            'username'  => 'emssvc',
            'password'  => 'vQq4vWWEq737',
            'dbname'    => 'EMSDV1'
        ]
    ]
];