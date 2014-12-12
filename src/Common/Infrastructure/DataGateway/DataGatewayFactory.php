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

use PDO;
use Common\Domain\Factory\FactoryInterface;
use Common\Infrastructure\DataGateway\Persistence\InMemory;
use Common\Infrastructure\DataGateway\Persistence\Sqlite;

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
    public function createSqlLiteMemoryPersistence()
    {
        try {
            $driver = 'sqlite::memory:';

            $pdo = new PDO($driver);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            throw new \PDOException(
                __METHOD__.
                ': ('.$e->getCode().') '.
                $e->getMessage()
            );
        }

        return new Sqlite($pdo);
    }

    /**
     * Function createSqlLiteFilePersistence
     *
     * @return \Common\Infrastructure\DataGateway\Persistence\Sqlite
     *
     * @access public
     */
    public function createSqlLiteFilePersistence()
    {
        try {
            $driver = 'sqlite:../db/d3x-tst.sqlite';

            $pdo = new PDO($driver);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Exception $e) {
            throw new \PDOException(
                __METHOD__.
                ': ('.$e->getCode().') '.
                $e->getMessage()
            );
        }

        return new Sqlite($pdo);
    }
}
