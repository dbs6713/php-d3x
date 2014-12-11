<?php
/**
 * PhpStorm
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   autoloader.php_php
 * @author    stringhamdb <stringhamdb@ldschurch.org>
 * @copyright 2014 (c) Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve
 * @link      http://www.lds.org
 * @version   $Revision$
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */ 
$autoLoader = new \Phalcon\Loader();

$autoLoader->registerNamespaces([
    'Common'                                        => $config->app->namespaces->commonDir,
    'Common\App'                                    => $config->app->namespaces->appDir,
    'Common\App\DataTypes'                          => $config->app->namespaces->appDataTypesDir,
    'Common\Domain\Events'                          => $config->app->namespaces->domainEventsDir,
    'Common\Domain\Events\Entities'                 => $config->app->namespaces->domainEventsEntitiesDir,
    'Common\Domain\Events\Factories'                => $config->app->namespaces->domainEventsFactoriesDir,
    'Common\Domain\Interfaces'                      => $config->app->namespaces->domainInterfacesDir,
    'Common\Infrastructure'                         => $config->app->namespaces->infrastructureDir,
    'Common\Infrastructure\Database'                => $config->app->namespaces->infrastructureDatabaseDir,
    'Common\Infrastructure\DataGateway'             => $config->app->namespaces->infrastructureDatagatewayDir,
    'Common\Infrastructure\DataGateway\Factories'   => $config->app->namespaces->infrastructureDatagatewayFactoriesDir,
    'Common\Infrastructure\DataGateway\Interfaces'  => $config->app->namespaces->infrastructureDatagatewayInterfacesDir,
    'Common\Infrastructure\DataGateway\Persistence' => $config->app->namespaces->infrastructureDatagatewayPersistenceDir
]);

$autoLoader->register();
