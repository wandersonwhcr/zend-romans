<?php

namespace Zend\Romans\Hydrator\Strategy\Factory;

use Interop\Container\ContainerInterface;
use Zend\Romans\Filter\IntToRoman as IntToRomanFilter;
use Zend\Romans\Filter\RomanToInt as RomanToIntFilter;
use Zend\Romans\Hydrator\Strategy\Roman as RomanStrategy;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Roman Hydrator Strategy Factory
 */
class Roman implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $config = null)
    {
        unset($requestedName, $config); // PHPCS

        return new RomanStrategy(
            $container->get('FilterManager')->get(IntToRomanFilter::class),
            $container->get('FilterManager')->get(RomanToIntFilter::class)
        );
    }
}
