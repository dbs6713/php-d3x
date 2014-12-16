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
        'classes' => [
            'Common\\Domain\\DomainEntityInterface'                                  => $project_dir.'/src/Common/Domain/DomainEntityInterface.php',
            'Common\\Domain\\DomainValueObjectInterface'                             => $project_dir.'/src/Common/Domain/DomainValueObjectInterface.php',
            'Common\\Domain\\Factory\\FactoryInterface'                              => $project_dir.'/src/Common/Domain/Factory/FactoryInterface.php',
            'Common\\Domain\\Repository\\RepositoryInterface'                        => $project_dir.'/src/Common/Domain/Repository/RepositoryInterface.php',
            'Common\\Domain\\Repository\\AbstractRepository'                         => $project_dir.'/src/Common/Domain/Repository/AbstractRepository.php',
            'Common\\Domain\\Event\\Event'                                           => $project_dir.'/src/Common/Domain/Event/Event.php',
            'Common\\Domain\\Event\\EventFactory'                                    => $project_dir.'/src/Common/Domain/Event/EventFactory.php',
            'Common\\Domain\\Event\\EventRepository'                                 => $project_dir.'/src/Common/Domain/Event/EventRepository.php',
            'Common\\Domain\\Incident\\Incident'                                     => $project_dir.'/src/Common/Domain/Incident/Incident.php',
            'Common\\Domain\\Incident\\IncidentFactory'                              => $project_dir.'/src/Common/Domain/Incident/IncidentFactory.php',
            'Common\\Domain\\Incident\\IncidentRepository'                           => $project_dir.'/src/Common/Domain/Incident/IncidentRepository.php',
            'Common\\Infrastructure\\DataGateway\\DataGatewayInterface'              => $project_dir.'/src/Common/Infrastructure/DataGateway/DataGatewayInterface.php',
            'Common\\Infrastructure\\DataGateway\\DataGatewayFactory'                => $project_dir.'/src/Common/Infrastructure/DataGateway/DataGatewayFactory.php',
            'Common\\Infrastructure\\DataGateway\\Persistence\\PersistenceInterface' => $project_dir.'/src/Common/Infrastructure/DataGateway/Persistence/PersistenceInterface.php',
            'Common\\Infrastructure\\DataGateway\\Persistence\\InMemory'             => $project_dir.'/src/Common/Infrastructure/DataGateway/Persistence/InMemory.php',
            'Common\\Infrastructure\\DataGateway\\Persistence\\Sqlite'               => $project_dir.'/src/Common/Infrastructure/DataGateway/Persistence/Sqlite.php',
            'Common\\Infrastructure\\DataGateway\\Persistence\\TableDataGateway'     => $project_dir.'/src/Common/Infrastructure/DataGateway/Persistence/TableDataGateway.php',
        ]
    ],
    'databases' => [
        'default' => [
            'adapter'   => 'sqlite',
            'host'      => 'localhost',
            'username'  => '',
            'password'  => '',
            'dbname'    => 'main',
            'file'      => $project_dir.'db/d3x-dv1.sqlite'
        ],
        'backup' => [
            'adapter'   => 'Mysql',
            'host'      => 'localhost',
            'username'  => 'emssvc',
            'password'  => 'vQq4vWWEq737',
            'dbname'    => 'EMSDV1'
        ]
    ]
];
