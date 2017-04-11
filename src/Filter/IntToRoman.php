<?php

namespace Zend\Romans\Filter;

use Romans\Filter\Exception as FilterException;
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
        $result = null;

        try {
            $result = (new BaseIntToRoman())->filter($value);
        } catch (FilterException $e) {
            // default value: null
        }

        return $result;
    }
}
