<?php

namespace ZendTest\Romans;

use PHPUnit\Framework\TestCase;
use Zend\ModuleManager\Feature\FilterProviderInterface;
use Zend\Mvc\Application;
use Zend\Romans\Filter;
use Zend\Romans\Module;
use Zend\Romans\Validator;

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
     * Build an Application
     *
     * @return Application
     */
    protected function buildApplication() : Application
    {
        return Application::init([
            // Listeners
            'module_listener_options' => [],
            // Modules
            'modules' => [
                'Zend\Router',
                'Zend\Filter',
                'Zend\Validator',
                'Zend\Romans',
            ],
        ]);
    }

    /**
     * Test Instance Of
     */
    public function testInstanceOf()
    {
        $this->assertInstanceOf(FilterProviderInterface::class, $this->module);
    }

    /**
     * Test RomanToInt Filter
     */
    public function testRomanToIntFilter()
    {
        $manager = $this->buildApplication()->getServiceManager()->get('FilterManager');

        $identifiers = [
            Filter\RomanToInt::class,
            'RomanToInt',
            'romanToInt',
            'romantoint',
        ];

        foreach ($identifiers as $identifier) {
            $this->assertTrue($manager->has($identifier));
            $this->assertInstanceOf(Filter\RomanToInt::class, $manager->get($identifier));
        }
    }

    /**
     * Test IntToRoman Filter
     */
    public function testIntToRomanFilter()
    {
        $manager = $this->buildApplication()->getServiceManager()->get('FilterManager');

        $identifiers = [
            Filter\IntToRoman::class,
            'IntToRoman',
            'intToRoman',
            'inttoroman',
        ];

        foreach ($identifiers as $identifier) {
            $this->assertTrue($manager->has($identifier));
            $this->assertInstanceOf(Filter\IntToRoman::class, $manager->get($identifier));
        }
    }
}
