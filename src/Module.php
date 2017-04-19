<?php

namespace Zend\Romans;

use Zend\ModuleManager\Feature\FilterProviderInterface;
use Zend\ModuleManager\Feature\ValidatorProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use Zend\Romans\Filter;
use Zend\Romans\Validator;
use Zend\Romans\View\Helper as ViewHelper;

/**
 * Romans Module
 */
class Module implements FilterProviderInterface, ValidatorProviderInterface, ViewHelperProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getFilterConfig()
    {
        return [
            'invokables' => [
                Filter\RomanToInt::class => Filter\RomanToInt::class,
                Filter\IntToRoman::class => Filter\IntToRoman::class,
            ],
            'aliases' => [
                'RomanToInt' => Filter\RomanToInt::class,
                'romanToInt' => Filter\RomanToInt::class,
                'romantoint' => Filter\RomanToInt::class,
                'IntToRoman' => Filter\IntToRoman::class,
                'intToRoman' => Filter\IntToRoman::class,
                'inttoroman' => Filter\IntToRoman::class,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getValidatorConfig()
    {
        return [
            'invokables' => [
                Validator\Roman::class => Validator\Roman::class,
            ],
            'aliases' => [
                'Roman' => Validator\Roman::class,
                'roman' => Validator\Roman::class,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getViewHelperConfig()
    {
        return [
            'factories' => [
                ViewHelper\Roman::class => ViewHelper\Factory\Roman::class,
            ],
            'aliases' => [
                'Roman' => ViewHelper\Roman::class,
                'roman' => ViewHelper\Roman::class,
            ],
        ];
    }
}
