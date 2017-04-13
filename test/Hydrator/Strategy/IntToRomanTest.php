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

    /**
     * Test Extract
     */
    public function testExtract()
    {
        $this->assertSame(1, $this->strategy->extract('I'));
        $this->assertSame(5, $this->strategy->extract('V'));
        $this->assertSame(10, $this->strategy->extract('X'));
    }

    /**
     * Test Hydrate
     */
    public function testHydrate()
    {
        $this->assertSame('I', $this->strategy->hydrate(1));
        $this->assertSame('V', $this->strategy->hydrate(5));
        $this->assertSame('X', $this->strategy->hydrate(10));
    }
}
