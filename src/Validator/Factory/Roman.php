<?php

namespace Zend\Romans\Validator\Factory;

use Interop\Container\ContainerInterface;
use Romans\Filter\RomanToInt as RomanToIntFilter;
use Zend\Romans\Validator\Roman as RomanValidator;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Roman Validator Factory
 */
class Roman implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $config = null)
    {
        unset($requestedName, $config); // PHPCS

        return new RomanValidator(
            $container->get(RomanToIntFilter::class)
        );
    }
}
