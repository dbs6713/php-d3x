<?php

use Common\Infrastructure\DataGateway\DataGatewayFactory;
use Codeception\TestCase\Test;

class DataGatewayFactoryTest extends Test
{

    /**
     * @var \Common\Infrastructure\DataGateway\DataGatewayFactory
     */
    private $_harness;

    protected function _before()
    {
        $this->_harness = new DataGatewayFactory();
    }

    protected function _after()
    {
        unset($this->_harness);
    }

    public function testDataGatewayFactoryInstance()
    {
            $expected = 'Common\Infrastructure\DataGateway\DataGatewayFactory';

            $this->assertInstanceOf($expected, $this->_harness);
    }

    public function testDataGatewayFactoryInMemory()
    {
        $data1    = ['data1'];
        $data2    = ['data2'];
        $expected = [$data1, $data2];

        $persistence = $this->_harness->createInMemoryPersistence();

        $this->assertInstanceOf(
            'Common\Infrastructure\DataGateway\Persistence\PersistenceInterface',
            $persistence
        );

        $this->assertTrue($persistence->persist($data1));

        $this->assertTrue($persistence->persist($data2));

        $this->assertEquals(2, $persistence->count());

        $this->assertEquals($data1, $persistence->retrieve(0));

        $this->assertEquals($data2, $persistence->retrieve(1));

        $this->assertEquals($expected, $persistence->retrieveAll());

        $this->assertTrue($persistence->delete(1));

        $this->assertEquals(1, $persistence->count());

        $this->assertTrue($persistence->deleteAll());

        $this->assertEquals(0, $persistence->count());
    }

    public function testDataGatewayFactorySqlLiteMemory()
    {
        $data1    = ['data1'];
        $data2    = ['data2'];
        $expected = [$data1, $data2];

        $persistence = $this->_harness->createSqliteMemoryPersistence();

        $this->assertInstanceOf(
            'Common\Infrastructure\DataGateway\Persistence\PersistenceInterface',
            $persistence
        );

        $this->assertTrue($persistence->persist($data1));

        $this->assertTrue($persistence->persist($data2));

        $this->assertEquals(2, $persistence->count());

        $this->assertEquals($data1, $persistence->retrieve(1));

        $this->assertEquals($data2, $persistence->retrieve(2));

        $this->assertEquals($expected, $persistence->retrieveAll());

        $this->assertTrue($persistence->delete(1));

        $this->assertEquals(1, $persistence->count());

        $this->assertTrue($persistence->deleteAll());

        $this->assertEquals(0, $persistence->count());
    }

    public function testDataGatewayFactorySqlLiteFile()
    {
        $data1    = ['data1'];
        $data2    = ['data2'];
        $expected = [$data1, $data2];

        $persistence = $this->_harness->createSqliteFilePersistence(
           __DIR__.'/../../../_data/d3x-tst.sqlite'
        );

        $this->assertInstanceOf(
           'Common\Infrastructure\DataGateway\Persistence\PersistenceInterface',
           $persistence
        );

        $this->assertTrue($persistence->persist($data1));

        $this->assertTrue($persistence->persist($data2));

        $this->assertEquals(2, $persistence->count());

        $this->assertEquals($data1, $persistence->retrieve(1));

        $this->assertEquals($data2, $persistence->retrieve(2));

        $this->assertEquals($expected, $persistence->retrieveAll());

        $this->assertTrue($persistence->delete(1));

        $this->assertEquals(1, $persistence->count());

        $this->assertTrue($persistence->deleteAll());

        $this->assertEquals(0, $persistence->count());
    }

    public function testDataGatewayFactorySqliteTable()
    {
        $tableDataGateway = $this->_harness->createSqliteTableDataGateway(
            __DIR__.'/../../../_data/d3x-tst.sqlite',
            'storage'
        );

        $this->assertInstanceOf(
            'Common\Infrastructure\DataGateway\Persistence\PersistenceInterface',
            $tableDataGateway
        );

        $expectedBefore = [
            ':data' => 'THAR BE DATA HAR!',
            ':dttm' => date('Y-m-d H:i:s', time())
        ];

        $expectedAfter = [
            ':id'   => 1,
            ':data' => 'THAR BE DATA HAR!',
            ':dttm' => date('Y-m-d H:i:s', time())
        ];

        $this->assertTrue($tableDataGateway->persist($expectedBefore));

        $actual = $tableDataGateway->retrieveAll();

        $this->assertEquals(1, $tableDataGateway->count());

        $this->assertEquals(1, count($actual));

        $this->assertEquals($expectedAfter, $actual[0]);

        $this->assertTrue($tableDataGateway->deleteAll());

        $this->setExpectedException('PDOException');

        $this->_harness->createSqliteTableDataGateway(
            __DIR__.'/../../../_data/d3x-tst.sqlite'
        );

        $this->_harness->createSqliteTableDataGateway(
            __DIR__.'/../../../_data/d3x-tst.sqlite',
            'foo'
        );
    }
}
