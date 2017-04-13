<?php

namespace Zend\Romans;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Romans Module
 */
class Module implements ConfigProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        return [];
    }
}
