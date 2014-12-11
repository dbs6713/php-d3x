<?php
/**
 * Configuration for testing code under \Common
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   config.php_php
 * @author    stringhamdb <stringhamdb@ldschurch.org>
 * @copyright 2014 (c) Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve
 * @link      http://www.lds.org
 * @version   $Revision$
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

defined('COMMON_DIR') or define(
    'COMMON_DIR',
    __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR
);
defined('APP_DIR') or define('APP_DIR', COMMON_DIR . 'App' . DIRECTORY_SEPARATOR);
defined('APP_DATATYPES_DIR') or define(
    'APP_DATATYPES_DIR', APP_DIR . 'DataTypes' . DIRECTORY_SEPARATOR
);
defined('APP_INTERFACES_DIR') or define(
    'APP_INTERFACES_DIR',
    APP_DIR . 'Interfaces' . DIRECTORY_SEPARATOR
);
defined('DOMAIN_DIR') or define(
    'DOMAIN_DIR',
    COMMON_DIR . 'Domain' . DIRECTORY_SEPARATOR
);
defined('DOMAIN_EVENTS_DIR') or define(
    'DOMAIN_EVENTS_DIR', DOMAIN_DIR . 'Events' . DIRECTORY_SEPARATOR
);
defined('DOMAIN_EVENTS_ENTITIES_DIR') or define(
    'DOMAIN_EVENTS_ENTITIES_DIR', DOMAIN_EVENTS_DIR . 'Entities' . DIRECTORY_SEPARATOR
);
defined('DOMAIN_EVENTS_FACTORIES_DIR') or define(
    'DOMAIN_EVENTS_FACTORIES_DIR', DOMAIN_EVENTS_DIR . 'Interfaces' . DIRECTORY_SEPARATOR
);
defined('DOMAIN_INTERFACES_DIR') or define(
    'DOMAIN_INTERFACES_DIR', DOMAIN_DIR . 'Interfaces' . DIRECTORY_SEPARATOR
);
defined('INFRASTRUCTURE_DIR') or define(
    'INFRASTRUCTURE_DIR', COMMON_DIR . 'Infrastructure' . DIRECTORY_SEPARATOR
);
defined('INFRASTRUCTURE_DATABASE_DIR') or define(
    'INFRASTRUCTURE_DATABASE_DIR',
    INFRASTRUCTURE_DIR . 'Db' . DIRECTORY_SEPARATOR
);
defined('INFRASTRUCTURE_DATAGATEWAY_DIR') or define(
    'INFRASTRUCTURE_DATAGATEWAY_DIR',
    INFRASTRUCTURE_DIR . 'DataGateway' . DIRECTORY_SEPARATOR
);
defined('INFRASTRUCTURE_DATAGATEWAY_FACTORIES_DIR') or define(
'INFRASTRUCTURE_DATAGATEWAY_FACTORIES_DIR',
    INFRASTRUCTURE_DATAGATEWAY_DIR . 'Factories' . DIRECTORY_SEPARATOR
);
defined('INFRASTRUCTURE_DATAGATEWAY_INTERFACES_DIR') or define(
'INFRASTRUCTURE_DATAGATEWAY_INTERFACES_DIR',
    INFRASTRUCTURE_DATAGATEWAY_DIR . 'Interfaces' . DIRECTORY_SEPARATOR
);
defined('INFRASTRUCTURE_DATAGATEWAY_PERSISTENCE_DIR') or define(
'INFRASTRUCTURE_DATAGATEWAY_PERSISTENCE_DIR',
    INFRASTRUCTURE_DATAGATEWAY_DIR . 'Persistence' . DIRECTORY_SEPARATOR
);

return new \Phalcon\Config([
    'ems_db' => [
        'adapter'  => 'Mysql',
        'host'     => 'localhost',
        'dbname'   => 'EMSTS1',
        'username' => 'emssvc',
        'password' => 'vQq4vWWEq737'
    ],
    'app' => [
        'namespaces' => [
            'appDir'                                  => APP_DIR,
            'appDataTypesDir'                         => APP_DATATYPES_DIR,
            'appInterfacesDir'                        => APP_INTERFACES_DIR,
            'commonDir'                               => COMMON_DIR,
            'domainDir'                               => DOMAIN_DIR,
            'domainEventsDir'                         => DOMAIN_EVENTS_DIR,
            'domainEventsEntitiesDir'                 => DOMAIN_EVENTS_ENTITIES_DIR,
            'domainEventsFactoriesDir'                => DOMAIN_EVENTS_FACTORIES_DIR,
            'domainInterfacesDir'                     => DOMAIN_INTERFACES_DIR,
            'infrastructureDir'                       => INFRASTRUCTURE_DIR,
            'infrastructureDatabaseDir'               => INFRASTRUCTURE_DATABASE_DIR,
            'infrastructureDatagatewayDir'            => INFRASTRUCTURE_DATAGATEWAY_DIR,
            'infrastructureDatagatewayFactoriesDir'   => INFRASTRUCTURE_DATAGATEWAY_FACTORIES_DIR,
            'infrastructureDatagatewayInterfacesDir'  => INFRASTRUCTURE_DATAGATEWAY_INTERFACES_DIR,
            'infrastructureDatagatewayPersistenceDir' => INFRASTRUCTURE_DATAGATEWAY_PERSISTENCE_DIR
        ],
        'apiRawCaptureLevel' => 3,
        'loglevel'           => \Phalcon\Logger::CUSTOM
    ]
]);
