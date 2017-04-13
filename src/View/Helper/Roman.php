<?php

namespace Zend\Romans\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * Roman Helper
 */
class Roman extends AbstractHelper
{
    /**
     * Invoke Support
     */
    public function __invoke(string $value)
    {
        return 'N';
    }
}
