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
    const UNKNOWN_TOKEN      = 'unknownToken';
    const INVALID_TOKEN_TYPE = 'invalidTokenType';
    const INVALID_ROMAN      = 'invalidRoman';

    /**
     * {@inheritdoc}
     */
    protected $messageTemplates = [
        self::UNKNOWN_TOKEN      => 'Unknown token "%value%" at position %position%',
        self::INVALID_TOKEN_TYPE => '',
        self::INVALID_ROMAN      => '',
    ];

    /**
     * {@inheritdoc}
     */
    protected $messageVariables = [
        'position' => 'position',
    ];

    /**
     * Position for Message Variables
     * @type int
     */
    protected $position = 0;

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
     * {@inheritdoc}
     */
    public function isValid($value)
    {
        $this->setValue($value);

        $result = false;

        try {
            $result = ((new RomanToInt())->filter($value) >= 0);
        } catch (LexerException $e) {
            // unknown token
            $this->setPosition(0);
            $this->error(self::UNKNOWN_TOKEN);
        } catch (ParserException $e) {
            // invalid token type
            // unknown token
            // invalid roman number
            $this->error(ParserException::class);
        }

        return $result;
    }
}
