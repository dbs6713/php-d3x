<?php

use Common\Domain\Event\EventFactory;
use Codeception\TestCase\Test;

class EventFactoryTest extends Test
{

    /**
     * @var \Common\Domain\Event\EventFactory
     */
    private $_harness;

    protected function _before()
    {
        $this->_harness = new EventFactory();
    }

    protected function _after()
    {
        unset($this->_harness);
    }

    public function testEventFactoryInstance()
    {
            $expected = 'Common\Domain\Event\EventFactory';

            $this->assertInstanceOf($expected, $this->_harness);
    }

    public function testEventFactory()
    {
        $event = $this->_harness->create();

        $this->assertInstanceOf(
            'Common\Domain\DomainEntityInterface',
            $event
        );
    }
}
