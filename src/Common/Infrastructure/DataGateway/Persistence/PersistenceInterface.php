<?php
/**
 * File name: PersistenceInterface.php
 *
 * Project: d3x
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Common\Infrastructure\DataGateway\Persistence
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   $Revision$
 * @link      https:/ems.ldschurch.org
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Common\Infrastructure\DataGateway\Persistence;


interface PersistenceInterface 
{
    /**
     * Function count Returns the total data elements persisted.
     *
     * @return int
     *
     * @access public
     */
    public function count();

    /**
     * Function delete Delete data from the storage mechanism.
     *
     * @param mixed $id Identifier used to locate data.
     *
     * @return mixed
     *
     * @access public
     */
    public function delete($id);

    /**
     * Function deleteAll
     *
     * @return mixed
     *
     * @access public
     */
    public function deleteAll();

    /**
     * Function persist Stores the data to the storage mechanism.
     *
     * @param mixed $data Data to be persisted.
     *
     * @return bool
     *
     * @access public
     */
    public function persist($data);

    /**
     * Function retrieve Retrieve data from the storage mechanism.
     *
     * @param mixed $id Identifier used to locate data.
     *
     * @return mixed
     *
     * @access public
     */
    public function retrieve($id);

    /**
     * Function retrieveAll Retrieves all the data from storage mechanism.
     *
     * @return mixed
     *
     * @access public
     */
    public function retrieveAll();

} 
