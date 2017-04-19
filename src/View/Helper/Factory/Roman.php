<?php

namespace Zend\Romans\View\Helper\Factory;

use Interop\Container\ContainerInterface;
use Zend\Romans\Filter\IntToRoman as IntToRomanFilter;
use Zend\Romans\View\Helper\Roman as RomanViewHelper;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Roman ViewHelper Factory
 */
class Roman implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $config = null)
    {
        unset($requestedName, $config); // PHPCS

        return new RomanViewHelper(
            $container->get('FilterManager')->get(IntToRomanFilter::class)
        );
    }
}
