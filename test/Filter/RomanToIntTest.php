<?php

namespace ZendTest\Romans\Filter;

use PHPUnit\Framework\TestCase;
use Zend\Filter\FilterInterface;
use Zend\Romans\Filter\RomanToInt;

/**
 * Roman to Int Test
 */
class RomanToIntTest extends TestCase
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->filter = new RomanToInt();
    }

    /**
     * Test Instance Of
     */
    public function testInstanceOf()
    {
        $this->assertInstanceOf(FilterInterface::class, $this->filter);
    }

    /**
     * Test Filter
     */
    public function testFilter()
    {
        $this->assertSame(1, $this->filter->filter('I'));
        $this->assertSame(5, $this->filter->filter('V'));
        $this->assertSame(10, $this->filter->filter('X'));
    }
}
