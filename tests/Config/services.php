<?php
/**
 * PhpStorm
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   services.php_php
 * @author    stringhamdb <stringhamdb@ldschurch.org>
 * @copyright 2014 (c) Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve
 * @link      http://www.lds.org
 * @version   $Revision$
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */ 

$di['logger'] = function() use ($config) {
    $appLogger = new \Common\Infrastructure\Services\NullLogger();

    return $appLogger;
};
