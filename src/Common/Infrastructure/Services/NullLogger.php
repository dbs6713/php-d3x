<?php
/**
 * File name: NullLogger.php
 *
 * Project: d3x
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Common\Infrastructure\Services
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   $Revision$
 * @link      https:/ems.ldschurch.org
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Common\Infrastructure\Services;


/**
 * Class NullLogger
 *
 * @category  PHP
 * @package   Common\Infrastructure\Services
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   Release: 0.1
 * @link      https:/ems.ldschurch.org
 */
class NullLogger extends \Phalcon\Logger\Adapter
{

    protected function logInternal($message, $type, $time, $context)
    {
        // TODO: Implement logInternal() method.
    }

    /**
     * Returns the internal formatter
     *
     * @return \Phalcon\Logger\FormatterInterface
     */
    public function getFormatter()
    {
        // TODO: Implement getFormatter() method.
    }

    /**
     * Closes the logger
     *
     * @return boolean
     */
    public function close()
    {
        // TODO: Implement close() method.
    }
} 
