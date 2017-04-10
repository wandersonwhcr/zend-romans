<?php

namespace Zend\Romans\Filter;

use Romans\Filter\RomanToInt as BaseRomanToInt;
use Zend\Filter\FilterInterface;

/**
 * Roman Number to Integer Filter
 */
class RomanToInt implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function filter($value)
    {
        return (new BaseRomanToInt())->filter($value);
    }
}
