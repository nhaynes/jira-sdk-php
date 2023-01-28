<?php

namespace JiraSdk\Model;

class JiraExpressionValidationError
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
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
    /**
     * The text line in which the error occurred.
     *
     * @return int
     */
    public function getLine(): int
    {
        return $this->line;
    }
    /**
     * The text line in which the error occurred.
     *
     * @param int $line
     *
     * @return self
     */
    public function setLine(int $line): self
    {
        $this->initialized['line'] = true;
        $this->line = $line;
        return $this;
    }
    /**
     * The text column in which the error occurred.
     *
     * @return int
     */
    public function getColumn(): int
    {
        return $this->column;
    }
    /**
     * The text column in which the error occurred.
     *
     * @param int $column
     *
     * @return self
     */
    public function setColumn(int $column): self
    {
        $this->initialized['column'] = true;
        $this->column = $column;
        return $this;
    }
    /**
     * The part of the expression in which the error occurred.
     *
     * @return string
     */
    public function getExpression(): string
    {
        return $this->expression;
    }
    /**
     * The part of the expression in which the error occurred.
     *
     * @param string $expression
     *
     * @return self
     */
    public function setExpression(string $expression): self
    {
        $this->initialized['expression'] = true;
        $this->expression = $expression;
        return $this;
    }
    /**
     * Details about the error.
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
    /**
     * Details about the error.
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
    /**
     * The error type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * The error type.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
}
