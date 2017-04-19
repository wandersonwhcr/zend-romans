<?php

namespace Zend\Romans\Filter\Factory;

use Interop\Container\ContainerInterface;
use Romans\Filter as RomansFilter;
use Zend\Romans\Filter\RomanToInt as RomanToIntFilter;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * RomanToInt Filter Factory
 */
class RomanToInt implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $config = null)
    {
        return new RomanToIntFilter(
            $container->get(RomansFilter\RomanToInt::class)
        );
    }
}
