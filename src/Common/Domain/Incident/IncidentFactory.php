<?php
/**
 * File name: IncidentFactory.php
 *
 * Project: d3x
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Common\Domain\Incident
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   $Revision$
 * @link      https:/ems.ldschurch.org
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Common\Domain\Incident;

use Common\Domain\Factory\FactoryInterface;

/**
 * Class IncidentFactory
 *
 * @category  PHP
 * @package   Common\Domain\Incident
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   Release: 0.1
 * @link      https:/ems.ldschurch.org
 */
class IncidentFactory implements FactoryInterface
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
        return new Incident();
    }
}
