<?php

namespace JiraSdk\Model;

class JiraExpressionAnalysis
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
     * The analysed expression.
     *
     * @var string
     */
    protected $expression;
    /**
     * A list of validation errors. Not included if the expression is valid.
     *
     * @var JiraExpressionValidationError[]
     */
    protected $errors;
    /**
     * Whether the expression is valid and the interpreter will evaluate it. Note that the expression may fail at runtime (for example, if it executes too many expensive operations).
     *
     * @var bool
     */
    protected $valid;
    /**
     * EXPERIMENTAL. The inferred type of the expression.
     *
     * @var string
     */
    protected $type;
    /**
     * Details about the complexity of the analysed Jira expression.
     *
     * @var JiraExpressionComplexity
     */
    protected $complexity;
    /**
     * The analysed expression.
     *
     * @return string
     */
    public function getExpression(): string
    {
        return $this->expression;
    }
    /**
     * The analysed expression.
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
     * A list of validation errors. Not included if the expression is valid.
     *
     * @return JiraExpressionValidationError[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
    /**
     * A list of validation errors. Not included if the expression is valid.
     *
     * @param JiraExpressionValidationError[] $errors
     *
     * @return self
     */
    public function setErrors(array $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
    /**
     * Whether the expression is valid and the interpreter will evaluate it. Note that the expression may fail at runtime (for example, if it executes too many expensive operations).
     *
     * @return bool
     */
    public function getValid(): bool
    {
        return $this->valid;
    }
    /**
     * Whether the expression is valid and the interpreter will evaluate it. Note that the expression may fail at runtime (for example, if it executes too many expensive operations).
     *
     * @param bool $valid
     *
     * @return self
     */
    public function setValid(bool $valid): self
    {
        $this->initialized['valid'] = true;
        $this->valid = $valid;
        return $this;
    }
    /**
     * EXPERIMENTAL. The inferred type of the expression.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * EXPERIMENTAL. The inferred type of the expression.
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
    /**
     * Details about the complexity of the analysed Jira expression.
     *
     * @return JiraExpressionComplexity
     */
    public function getComplexity(): JiraExpressionComplexity
    {
        return $this->complexity;
    }
    /**
     * Details about the complexity of the analysed Jira expression.
     *
     * @param JiraExpressionComplexity $complexity
     *
     * @return self
     */
    public function setComplexity(JiraExpressionComplexity $complexity): self
    {
        $this->initialized['complexity'] = true;
        $this->complexity = $complexity;
        return $this;
    }
}
