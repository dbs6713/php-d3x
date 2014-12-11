<?php
/**
 * File name: InMemory.php
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


/**
 * Class InMemory
 *
 * @category  PHP
 * @package   Common\Infrastructure\DataGateway\Persistence
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   Release: 0.1
 * @link      https:/ems.ldschurch.org
 */
class InMemory implements PersistenceInterface
{
    /**
     * @var array $_storage
     * @access private
     */
    private $_storage;

    /**
     * Function __constructor
     */
    public function __construct()
    {
        $this->_storage = [];
    }

    /**
     * Function __destructor
     */
    public function __destruct()
    {
        unset($this->_storage);
    }

    /**
     * Function count Returns the total data elements persisted.
     *
     * @return int
     *
     * @access public
     */
    public function count()
    {
        return count($this->_storage);
    }

    /**
     * Function delete Delete data from the storage mechanism.
     *
     * @param mixed $id Identifier used to locate data.
     *
     * @return mixed
     *
     * @access public
     */
    public function delete($id)
    {
        $beforeCount = $this->count();

        unset($this->_storage[$id]);

        return $this->count() === ($beforeCount - 1);
    }

    /**
     * Function deleteAll
     *
     * @return mixed
     *
     * @access public
     */
    public function deleteAll()
    {
        $this->_storage = [];

        return empty($this->_storage);
    }

    /**
     * Function persist Stores the data to the storage mechanism.
     *
     * @param mixed $data Data to be persisted.
     *
     * @return bool
     *
     * @access public
     */
    public function persist($data)
    {
        $this->_storage[] = $data;

        return $this->_storage[ $this->count() - 1 ] === $data;
    }

    /**
     * Function retrieve Retrieve data from the storage mechanism.
     *
     * @param mixed $id Identifier used to locate data.
     *
     * @return mixed
     *
     * @access public
     */
    public function retrieve($id)
    {
        return $this->_storage[$id];
    }

    /**
     * Function retrieveAll Retrieves all the data from storage mechanism.
     *
     * @return mixed
     *
     * @access public
     */
    public function retrieveAll()
    {
        return $this->_storage;
    }
}
