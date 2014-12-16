<?php
/**
 * File name: TableDataGateway.php
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
 * Class TableDataGateway
 *
 * @category  PHP
 * @package   Common\Infrastructure\DataGateway\Persistence
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   Release: 0.1
 * @link      https:/ems.ldschurch.org
 */
class TableDataGateway implements PersistenceInterface
{

    /**
     * @var string $_tableName
     * @access private
     */
    private $_tableName;

    /**
     * @var string $_columnsString String version of ALL the columns: "x, y, z,".
     * @access private
     */
    private $_columnsString;

    /**
     * @var string $_columnsInsertString String version of insertable columns: "x, z"
     * @access private
     */
    private $_columnsInsertString;

    /**
     * @var string $_columnAliases String version of column aliases: ":x, :z".
     * @access private
     */
    private $_columnAliases;

    /**
     * @var \PDO $_pdo
     * @access private
     */
    private $_pdo;

    /**
     * Function __construct
     *
     * @param \PDO   $pdo       Standard PHP PDO object
     * @param string $tableName Name of the table this class refers to.
     */
    public function __construct($pdo, $tableName)
    {
        $this->_pdo = $pdo;

        $this->_tableName = $tableName;

        $this->getColumnMetaData();
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
            $sql = 'SELECT COUNT(*) FROM '.$this->_tableName;
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
            $sql = 'DELETE FROM '.$this->_tableName.'WHERE id=:id';

            $stmt = $this->_pdo->prepare($sql);

            $stmt->execute([':id' => $id]);

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
            $sql = 'DELETE FROM '.$this->_tableName;
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
        $sql = 'INSERT INTO '.$this->_tableName.
            ' ('.$this->_columnsInsertString.') VALUES'.
            ' ('.$this->_columnAliases.')';

        try {
            $stmt = $this->_pdo->prepare($sql);
            $resultSet = $stmt->execute($data);
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
        // TODO: Implement retrieve() method.
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
        $sql = 'SELECT '.$this->_columnsString.' FROM '.$this->_tableName;

        try {
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
            $record = $this->parseResultRow($result);
            if ($record !== false) {
                $recordSet[] = $record;
            }
        }

        return $recordSet;
    }

    /**
     * Function parseResultRow
     *
     * @param array $result An array containing a row from the SQL result set.
     *
     * @return bool
     *
     * @access public
     */
    private function parseResultRow($result)
    {
        $record = [];
        foreach($result as $key => $value) {
            if (strpos($this->_columnsString, $key) !== false) {
                $record[':'.$key] = $value;
            }
        }
        if (empty($record)) {
            return false;
        }

        return $record;
    }

    /**
     * Function getColumnMetaData
     *
     * @access public
     */
    private function getColumnMetaData()
    {
        /**
         * @var \PDOStatement
         */
        $stmt = $this->_pdo->query('PRAGMA table_info('.$this->_tableName.')');

        $resultSet = $stmt->fetchAll();

        $columnsAll    = [];
        $columnsInsert = [];

        foreach($resultSet as $column) {
            $columnsAll[] = $column['name'];
            if ($column['pk'] === '0') {
                $columnsInsert[] = $column['name'];
            }
        }

        $this->_columnsString = implode(', ', $columnsAll);
        $this->_columnsInsertString = implode(', ', $columnsInsert);
        $this->_columnAliases  = ':'.implode(', :', $columnsInsert);
    }
}
