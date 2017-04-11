<?php

namespace Zend\Romans\Filter;

use Romans\Filter\IntToRoman as BaseIntToRoman;
use Zend\Filter\FilterInterface;

/**
 * Integer to Roman Number Filter
 */
class IntToRoman implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function filter($value)
    {
        return (new BaseIntToRoman())->filter($value);
    }
}
