<?php
/**
 * File name: DataGatewayInterface.php
 *
 * Project: d3x
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Common\Infrastructure\DataGateway
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   $Revision$
 * @link      https:/ems.ldschurch.org
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Common\Infrastructure\DataGateway;


interface DataGatewayInterface 
{
    /**
     * Function count How many data elements are there?
     *
     * @return mixed
     *
     * @access public
     */
    public function count();

    /**
     * Function persist Store the data contained in $data.
     *
     * @param [] $data An associative array of data to be persisted.
     *
     * @return mixed
     *
     * @access public
     */
    public function persist($data);

    /**
     * Function retrieve Retrieve one specific data element.
     *
     * @param int $id Identifier of data element to retrieve.
     *
     * @return mixed
     *
     * @access public
     */
    public function retrieve($id);

    /**
     * Function retrieveAll Retrieves ALL data elements from storage.
     *
     * @return mixed
     *
     * @access public
     */
    public function retrieveAll();
} 
