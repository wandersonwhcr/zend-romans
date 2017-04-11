<?php

namespace ZendTest\Romans\Filter;

use PHPUnit\Framework\TestCase;
use Zend\Filter\FilterInterface;
use Zend\Romans\Filter\IntToRoman;

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
        $this->filter = new IntToRoman();
    }

    /**
     * Test Instance Of
     */
    public function testInstanceOf()
    {
        $this->assertInstanceOf(FilterInterface::class, $this->filter);
    }
}
