<?php
/**
 * File name: DataGatewayFactory.php
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

use Common\Infrastructure\DataGateway\Persistence\TableDataGateway;
use PDO;
use Common\Domain\Factory\FactoryInterface;
use Common\Infrastructure\DataGateway\Persistence\InMemory;
use Common\Infrastructure\DataGateway\Persistence\Sqlite;
use Symfony\Component\Console\Helper\Table;

/**
 * Class DataGatewayFactory
 *
 * @category  PHP
 * @package   Common\Infrastructure\DataGateway
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   Release: 0.1
 * @link      https:/ems.ldschurch.org
 */
class DataGatewayFactory implements FactoryInterface
{
    /**
     * Function create Returns the default DataGateway persistence mechanism.
     *
     * @return \Common\Infrastructure\DataGateway\Persistence\InMemory
     *
     * @access public
     */
    public function create()
    {
        return new InMemory();
    }

    /**
     * Function createInMemoryPersistence Returns InMemory persistence specifically.
     *
     * @return \Common\Infrastructure\DataGateway\Persistence\InMemory
     *
     * @access public
     */
    public function createInMemoryPersistence()
    {
        return new InMemory();
    }

    /**
     * Function createSqlLiteMemoryPersistence
     *
     * @return \Common\Infrastructure\DataGateway\Persistence\Sqlite
     *
     * @access public
     */
    public function createSqliteMemoryPersistence()
    {
        $driver = 'sqlite::memory:';

        return new Sqlite($this->createSqlitePdo($driver));
    }

    /**
     * Function createSqlLiteFilePersistence
     *
     * @param string $filePath
     *
     * @return \Common\Infrastructure\DataGateway\Persistence\Sqlite
     *
     * @access   public
     */
    public function createSqliteFilePersistence($filePath = 'd3x.sqlite')
    {
        $driver = 'sqlite:'.$filePath;

        return new Sqlite($this->createSqlitePdo($driver));
    }

    /**
     * Function createSqliteTableDataGateway
     *
     * @param string $filePath  Directory/filename to the SQLite file.
     * @param string $tableName Name of the table this DataGateway refers to.
     *
     * @return \Common\Infrastructure\DataGateway\Persistence\TableDataGateway
     *
     * @access public
     */
    public function createSqliteTableDataGateway(
        $filePath = 'd3x.sqlite',
        $tableName = ''
    ) {
        if ($tableName === '') {
            throw new \PDOException(
                __METHOD__.': '.
                'TableDataGateway pattern requires a table name, not passed in.'
            );
        }

        $driver = 'sqlite:'.$filePath;

        $pdo = $this->createSqlitePdo($driver);

        return new TableDataGateway($pdo, $tableName);
    }

    /**
     * Function createSqlitePdo
     *
     * @param $driver
     *
     * @return \PDO
     *
     * @access public
     */
    private function createSqlitePdo($driver)
    {
        try {
            $pdo = new PDO($driver);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            throw new \PDOException(
                __METHOD__.
                ': ('.$e->getCode().') '.
                $e->getMessage()
            );
        }

        return $pdo;
    }
}
