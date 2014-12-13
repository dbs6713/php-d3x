<?php
use Codeception\Util\Autoload;


define('SRC_DIR', 'src');
define('COMMON_DIR', 'src/Common');
define('DOMAIN_DIR', 'src/Common/Domain');
define('EVENT_DIR', 'src/Common/Domain/Event');
define('INCIDENT_DIR', 'src/Common/Domain/Incident');
define('FACTORY_DIR', 'src/Common/Domain/Factory');
define('INFRASTRUCTURE_DIR', 'src/Common/Infrastructure');
define('DATAGATEWAY_DIR', 'src/Common/Infrastructure/DataGateway');
define('PERSISTENCE_DIR', 'src/Common/Infrastructure/DataGateway/Persistence');

Autoload::register(
    'Common\\Domain',
    'DomainEntityInterface',
    DOMAIN_DIR
);

Autoload::register(
    'Common\\Domain',
    'DomainValueObjectInterface',
    DOMAIN_DIR
);

Autoload::register(
    'Common\\Domain\\Factory',
    'FactoryInterface',
    FACTORY_DIR
);

Autoload::register(
    'Common\\Domain\\Event',
    'EventFactory',
    EVENT_DIR
);

Autoload::register(
    'Common\\Domain\\Event',
    'Event',
    EVENT_DIR
);

Autoload::register(
    'Common\\Domain\\Incident',
    'IncidentFactory',
    INCIDENT_DIR
);

Autoload::register(
    'Common\\Domain\\Incident',
    'Incident',
    INCIDENT_DIR
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
