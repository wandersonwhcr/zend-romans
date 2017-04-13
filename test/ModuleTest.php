<?php

namespace ZendTest\Romans;

use PHPUnit\Framework\TestCase;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Romans\Module;

/**
 * Module Test
 */
class ModuleTest extends TestCase
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->module = new Module();
    }

    /**
     * Test Instance Of
     */
    public function testInstanceOf()
    {
        $this->assertInstanceOf(ConfigProviderInterface::class, $this->module);
    }
}
