<?php

namespace ZendTest\Romans\Hydrator\Strategy;

use PHPUnit\Framework\TestCase;
use Zend\Hydrator\Strategy\StrategyInterface;
use Zend\Romans\Hydrator\Strategy\IntToRoman as IntToRomanStrategy;

/**
 * Int to Roman Test
 */
class IntToRomanTest extends TestCase
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->strategy = new IntToRomanStrategy();
    }

    /**
     * Test Instance Of
     */
    public function testInstanceOf()
    {
        $this->assertInstanceOf(StrategyInterface::class, $this->strategy);
    }
}
