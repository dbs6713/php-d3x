<?php
/**
 * Bootstrapper for testing code under /Common
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   boostrap.php_php
 * @author    stringhamdb <stringhamdb@ldschurch.org>
 * @copyright 2014 (c) Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve
 * @link      http://www.lds.org
 * @version   $Revision$
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */ 

$config = include __DIR__.DIRECTORY_SEPARATOR.'config.php';

$di = new \Phalcon\DI\FactoryDefault();

/**
 * Put the configuration in the Phalcon dependency injector
 */
$di->set('config', $config);

/**
 * Read the services
 */
include __DIR__.DIRECTORY_SEPARATOR.'services.php';

/**
 * Return the application
 */
return new Phalcon\Mvc\Micro($di);
