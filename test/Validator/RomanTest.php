<?php

namespace ZendTest\Romans\Validator;

use PHPUnit\Framework\TestCase;
use Zend\Romans\Validator\Roman;
use Zend\Validator\ValidatorInterface;

/**
 * Roman Test
 */
class RomanTest extends TestCase
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->validator = new Roman();
    }

    /**
     * Test Instance Of
     */
    public function testInstanceOf()
    {
        $this->assertInstanceOf(ValidatorInterface::class, $this->validator);
    }

    /**
     * Test Is Valid
     */
    public function testIsValid()
    {
        $this->assertTrue($this->validator->isValid('I'));
        $this->assertTrue($this->validator->isValid('V'));
        $this->assertTrue($this->validator->isValid('X'));
    }
}
