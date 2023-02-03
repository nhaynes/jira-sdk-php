<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Model;

class JiraExpressionValidationError
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The text line in which the error occurred.
     *
     * @var int
     */
    protected $line;
    /**
     * The text column in which the error occurred.
     *
     * @var int
     */
    protected $column;
    /**
     * The part of the expression in which the error occurred.
     *
     * @var string
     */
    protected $expression;
    /**
     * Details about the error.
     *
     * @var string
     */
    protected $message;
    /**
     * The error type.
     *
     * @var string
     */
    protected $type;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The text line in which the error occurred.
     */
    public function getLine(): int
    {
        return $this->line;
    }

    /**
     * The text line in which the error occurred.
     */
    public function setLine(int $line): self
    {
        $this->initialized['line'] = true;
        $this->line = $line;

        return $this;
    }

    /**
     * The text column in which the error occurred.
     */
    public function getColumn(): int
    {
        return $this->column;
    }

    /**
     * The text column in which the error occurred.
     */
    public function setColumn(int $column): self
    {
        $this->initialized['column'] = true;
        $this->column = $column;

        return $this;
    }

    /**
     * The part of the expression in which the error occurred.
     */
    public function getExpression(): string
    {
        return $this->expression;
    }

    /**
     * The part of the expression in which the error occurred.
     */
    public function setExpression(string $expression): self
    {
        $this->initialized['expression'] = true;
        $this->expression = $expression;

        return $this;
    }

    /**
     * Details about the error.
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Details about the error.
     */
    public function setMessage(string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;

        return $this;
    }

    /**
     * The error type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The error type.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }
}
