<?php
/**
 * File name: DataMapperInterface.php
 *
 * Project: d3x
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Common\Infrastructure\DataMapper
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   $Revision$
 * @link      https:/ems.ldschurch.org
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Common\Infrastructure\DataMapper;


interface DataMapperInterface 
{
    /**
     * Function add Create an object in the repository
     *
     * @param \Common\Domain\DomainInterface $object Entity/VO to added
     *
     * @return mixed
     *
     * @access public
     */
    public function add($object);

    /**
     * Function count How many entities/VO are in the repository.
     *
     * @return int
     *
     * @access public
     */
    public function count();

    /**
     * Function delete Delete the entity/VO identified by $id
     *
     * @param mixed $id Identifier used to find the entity/VO
     *
     * @return bool
     *
     * @access public
     */
    public function delete($id);

    /**
     * Function find Locates and returns the entity/VO in the repository.
     *
     * @param mixed $id Identifier used to find the entity/VO
     *
     * @return \Common\Domain\DomainInterface $object
     *
     * @access public
     */
    public function find($id);

    /**
     * Function findAll Returns all the entities/VO's in the repository
     *
     * @return /SplFixedArray
     *
     * @access public
     */
    public function findAll();

    /**
     * Function save Updates or adds an entity/VO orin the repository.
     *
     * @param \Common\Domain\DomainInterface $object Entity/VO to added
     *
     * @return bool
     *
     * @access public
     */
    public function save($object);

    /**
     * Function update Updates an existing entity/VO in the repository.
     *
     * @param \Common\Domain\DomainInterface $object Entity/VO to update.
     *
     * @return bool
     *
     * @access public
     */
    public function update($object);
} 
