<?php

namespace Zend\Romans\Validator;

use Romans\Filter\RomanToInt;
use Romans\Lexer\Exception as LexerException;
use Romans\Parser\Exception as ParserException;
use Zend\Validator\AbstractValidator;

/**
 * Roman Validator
 */
class Roman extends AbstractValidator
{
    const INVALID_TYPE  = 'invalidType';
    const UNKNOWN_TOKEN = 'unknownToken';
    const INVALID_ROMAN = 'invalidRoman';

    /**
     * {@inheritdoc}
     */
    protected $messageTemplates = [
        self::INVALID_TYPE  => 'Invalid type; must be "string"',
        self::UNKNOWN_TOKEN => 'Unknown token "%token%" at position %position%',
        self::INVALID_ROMAN => 'Invalid Roman number "%value%"',
    ];

    /**
     * {@inheritdoc}
     */
    protected $messageVariables = [
        'token'    => 'token',
        'position' => 'position',
    ];

    /**
     * Token for Message Variables
     * @type string
     */
    protected $token = '';

    /**
     * Position for Message Variables
     * @type int
     */
    protected $position = 0;

    /**
     * Set Token for Message Variables
     *
     * @param  string $token Token Value
     * @return self   Fluent Interface
     */
    protected function setToken(string $token) : self
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Get Token for Message Variable
     *
     * @return string Token Value
     */
    protected function getToken() : string
    {
        return $this->token;
    }

    /**
     * Set Position for Message Variables
     *
     * @param  int  $position Position Value
     * @return self Fluent Interface
     */
    protected function setPosition(int $position) : self
    {
        $this->position = $position;
        return $this;
    }

    /**
     * Get Position for Message Variables
     *
     * @return int Position Value
     */
    protected function getPosition() : int
    {
        return $this->position;
    }

    /**
     * Mark Validator with Error
     *
     * @param  string      $error    Error Constant
     * @param  string|null $token    Token
     * @param  int|null    $position Position
     * @return self        Fluent Interface
     */
    protected function markWithError(string $error, $token, $position) : self
    {
        if (isset($token)) {
            $this->setToken($token);
        }

        if (isset($position)) {
            $this->setPosition($position);
        }

        $this->error($error);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isValid($value)
    {
        $this->setValue($value);

        if (! is_string($value)) {
            $this->error(self::INVALID_TYPE);
            return false;
        }

        $result = false;

        try {
            $result = ((new RomanToInt())->filter($value) >= 0);
        } catch (LexerException $e) {
            $this->markWithError(self::UNKNOWN_TOKEN, $e->getToken(), $e->getPosition());
        } catch (ParserException $e) {
            $this->markWithError(self::INVALID_ROMAN, $e->getToken(), $e->getPosition());
        }

        return $result;
    }
}
