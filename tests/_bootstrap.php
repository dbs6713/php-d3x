<?php
use Codeception\Util\Autoload;

define('SRC_DIR', '../src');
define('COMMON_DIR', '../src/Common');
define('DOMAIN_DIR', '../src/Common/Domain');
define('FACTORY_DIR', '../src/Common/Domain/Factory');
define('INFRASTRUCTURE_DIR', '../src/Common/Infrastructure');
define('DATAGATEWAY_DIR', '../src/Common/Infrastructure/DataGateway');
define('PERSISTENCE_DIR', '../src/Common/Infrastructure/DataGateway/Persistence');

Autoload::register(
    'Common\\Domain\\Factory',
    'FactoryInterface',
    FACTORY_DIR
);

AutoLoad::register(
    'Common\\Infrastructure\\DataGateway',
    'DataGatewayFactory',
    DATAGATEWAY_DIR
);

AutoLoad::register(
    'Common\\Infrastructure\\DataGateway\\Persistence',
    'PersistenceInterface',
    PERSISTENCE_DIR
);

AutoLoad::register(
    'Common\\Infrastructure\\DataGateway\\Persistence',
    'InMemory',
    PERSISTENCE_DIR
);

AutoLoad::register(
    'Common\\Infrastructure\\DataGateway\\Persistence',
    'Sqlite',
    PERSISTENCE_DIR
);
