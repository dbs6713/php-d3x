<?php

use Common\Domain\Incident\IncidentFactory;
use Codeception\TestCase\Test;

class IncidentFactoryTest extends Test
{

    /**
     * @var \Common\Domain\Incident\IncidentFactory
     */
    private $_harness;

    protected function _before()
    {
        $this->_harness = new IncidentFactory();
    }

    protected function _after()
    {
        unset($this->_harness);
    }

    public function testIncidentFactoryInstance()
    {
            $expected = 'Common\Domain\Incident\IncidentFactory';

            $this->assertInstanceOf($expected, $this->_harness);
    }

    public function testIncidentFactory()
    {
        $event = $this->_harness->create();

        $this->assertInstanceOf(
            'Common\Domain\DomainEntityInterface',
            $event
        );
    }
}
