<?php
/**
 * File name: EventFactory.php
 *
 * Project: d3x
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Common\Domain\Events
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   $Revision$
 * @link      https:/ems.ldschurch.org
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Common\Domain\Event;

use Common\Domain\Factory\FactoryInterface;


/**
 * Class EventFactory
 *
 * @category  PHP
 * @package   Common\Domain\Events
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   Release: 0.1
 * @link      https:/ems.ldschurch.org
 */
class EventFactory implements FactoryInterface
{

    /**
     * Function create
     *
     * @return mixed
     *
     * @access public
     */
    public function create()
    {
        return new Event();
    }
}
