<?php

namespace Zend\Romans\Validator;

use Zend\Validator\ValidatorInterface;

/**
 * Roman Validator
 */
class Roman implements ValidatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function isValid($value)
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getMessages()
    {
        return [];
    }
}
