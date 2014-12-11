<?php
/**
 * File name: FactoryInterface.php
 *
 * Project: d3x
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Common\Domain\Factory
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   $Revision$
 * @link      https:/ems.ldschurch.org
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Common\Domain\Factory;


interface FactoryInterface 
{
    /**
     * Function create
     *
     * @return mixed
     *
     * @access public
     */
    public function create();
} 
