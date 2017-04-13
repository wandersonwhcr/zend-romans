<?php

namespace Zend\Romans\View\Helper;

use PHPUnit\Framework\TestCase;
use Zend\View\Helper\HelperInterface;

/**
 * Roman Test
 */
class RomanTest extends TestCase
{
    protected function setUp()
    {
        $this->helper = new Roman();
    }

    /**
     * Test Instance Of
     */
    public function testInstanceOf()
    {
        $this->assertInstanceOf(HelperInterface::class, $this->helper);
    }
}
