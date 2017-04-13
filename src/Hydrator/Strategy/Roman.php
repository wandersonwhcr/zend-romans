<?php

namespace Zend\Romans\Hydrator\Strategy;

use Zend\Hydrator\Strategy\StrategyInterface;
use Zend\Romans\Filter\IntToRoman as IntToRomanFilter;
use Zend\Romans\Filter\RomanToInt as RomanToIntFilter;

/**
 * Roman Number Hydrator Strategy
 */
class Roman implements StrategyInterface
{
    /**
     * IntToRoman Filter
     * @type IntToRomanFilter
     */
    private $intToRomanFilter;

    /**
     * RomanToInt Filter
     * @type RomanToIntFilter
     */
    private $romanToIntFilter;

    /**
     * Default Constructor
     */
    public function __construct()
    {
        $this
            ->setIntToRomanFilter(new IntToRomanFilter())
            ->setRomanToIntFilter(new RomanToIntFilter());
    }

    /**
     * Set IntToRoman Filter
     *
     * @param  IntToRomanFilter $intToRomanFilter IntToRoman Filter Object
     * @return self             Fluent Interface
     */
    public function setIntToRomanFilter(IntToRomanFilter $intToRomanFilter) : self
    {
        $this->intToRomanFilter = $intToRomanFilter;
        return $this;
    }

    /**
     * Get IntToRoman Filter
     *
     * @return IntToRomanFilter IntToRoman Filter Object
     */
    public function getIntToRomanFilter() : IntToRomanFilter
    {
        return $this->intToRomanFilter;
    }

    /**
     * Set RomanToInt Filter
     *
     * @param  RomanToIntFilter $romanToIntFilter RomanToInt Filter Object
     * @return self             Fluent Interface
     */
    public function setRomanToIntFilter(RomanToIntFilter $romanToIntFilter) : self
    {
        $this->romanToIntFilter = $romanToIntFilter;
        return $this;
    }

    /**
     * Get RomanToInt Filter
     *
     * @return RomanToIntFilter RomanToInt Filter Object
     */
    public function getRomanToIntFilter() : RomanToIntFilter
    {
        return $this->romanToIntFilter;
    }

    /**
     * {@inheritdoc}
     */
    public function hydrate($value)
    {
        return $this->getIntToRomanFilter()->filter($value);
    }

    /**
     * {@inheritdoc}
     */
    public function extract($value)
    {
        return $this->getRomanToIntFilter()->filter($value);
    }
}
