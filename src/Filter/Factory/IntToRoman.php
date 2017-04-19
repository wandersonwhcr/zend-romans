<?php

namespace Zend\Romans\Filter\Factory;

use Interop\Container\ContainerInterface;
use Romans\Filter as RomansFilter;
use Zend\Romans\Filter\IntToRoman as IntToRomanFilter;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * IntToRoman Filter Factory
 */
class IntToRoman implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $config = null)
    {
        unset($requestedName, $config); // PHPCS

        return new IntToRomanFilter(
            $container->get(RomansFilter\IntToRoman::class)
        );
    }
}
