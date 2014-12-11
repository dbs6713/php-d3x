<?php
/**
 * File name: SqlLite.php
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
 * Class SqlLite
 *
 * @category  PHP
 * @package   Common\Infrastructure\DataGateway\Persistence
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   Release: 0.1
 * @link      https:/ems.ldschurch.org
 */
class Sqlite implements PersistenceInterface
{

    /**
     * @var  $_storage
     * @access private
     */
    private $_pdo;

    /**
     * Function __constructor
     *
     * @param \PDO $pdo PDO driver to use for SQLite interactions.
     */
    public function __construct($pdo)
    {
        $this->_pdo = $pdo;

        $this->_init();
    }

    /**
     * Function __destructor
     */
    public function __destruct()
    {
        unset($this->_pdo);
    }

    /**
     * Function _init Initializes the database for persistence.
     *
     * @access private
     */
    private function _init()
    {

        try {
            $sql = 'CREATE TABLE IF NOT EXISTS storage (
              id INTEGER PRIMARY KEY,
              data TEXT,
              dttm TEXT
            )';

            $stmt = $this->_pdo->prepare($sql);

            $resultSet = $stmt->execute();
        } catch(\Exception $e) {
            throw new \PDOException(
                __METHOD__.
                ': ('.$this->_pdo->errorCode().') '.
                $this->_pdo->errorInfo()
            );
        }

        return $resultSet;
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
        try {
            $sql = 'SELECT COUNT(*) FROM storage';

            $stmt = $this->_pdo->query($sql);

            $count = $stmt->fetch(\PDO::FETCH_NUM);

        } catch(\Exception $e) {
            throw new \PDOException(
                __METHOD__.
                ': ('.$this->_pdo->errorCode().') '.
                $this->_pdo->errorInfo()
            );
        }

        return (int)$count[0];
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
        try {
            $sql = 'DELETE FROM storage WHERE id=:id';

            $stmt = $this->_pdo->prepare($sql);

            $stmt->execute(
                [
                    ':id' => $id
                ]
            );

            $resultSet = $stmt->execute();
        } catch(\Exception $e) {
            throw new \PDOException(
                __METHOD__.
                ': ('.$this->_pdo->errorCode().') '.
                $this->_pdo->errorInfo()
            );
        }

        return $resultSet;
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
        try {
            $sql = 'DELETE FROM storage';

            $stmt = $this->_pdo->prepare($sql);

            $resultSet = $stmt->execute();
        } catch(\Exception $e) {
            throw new \PDOException(
                __METHOD__.
                ': ('.$this->_pdo->errorCode().') '.
                $this->_pdo->errorInfo()
            );
        }

        return $resultSet;
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
        try {
            $sql = 'INSERT INTO storage (data, dttm) VALUES (:data, :dttm)';

            $stmt = $this->_pdo->prepare($sql);

            $resultSet = $stmt->execute(
                [
                    ':data' => serialize($data),
                    ':dttm' => date('Y-m-d H:i:s', time())
                ]
            );

        } catch(\Exception $e) {
            throw new \PDOException(
                __METHOD__.
                ': ('.$this->_pdo->errorCode().') '.
                $this->_pdo->errorInfo()
            );
        }

        return $resultSet;
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
        try {
            $sql = 'SELECT id,data,dttm FROM storage WHERE id=:id';

            $stmt = $this->_pdo->prepare($sql);

            $stmt->execute(
                [
                    ':id' => $id
                ]
            );

            $resultSet = $stmt->fetch();

        } catch(\Exception $e) {
            throw new \PDOException(
                __METHOD__.
                ': ('.$this->_pdo->errorCode().') '.
                $this->_pdo->errorInfo()
            );
        }

        return unserialize($resultSet['data']);
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
        try {
            $sql = 'SELECT id,data,dttm FROM storage';

            $stmt = $this->_pdo->prepare($sql);

            $stmt->execute();

            $resultSet = $stmt->fetchAll();
        } catch(\Exception $e) {
            throw new \PDOException(
                __METHOD__.
                ': ('.$this->_pdo->errorCode().') '.
                $this->_pdo->errorInfo()
            );
        }

        $recordSet = [];

        foreach($resultSet as $result) {
            $newRecord = unserialize($result['data']);
            $recordSet[] = $newRecord;
        }

        return $recordSet;
    }
}
