<?php

namespace JiraSdk\Model;

class BulkIssuePropertyUpdateRequest
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
     * The value of the property. The value must be a [valid](https://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
     *
     * @var mixed
     */
    protected $value;
    /**
     * EXPERIMENTAL. The Jira expression to calculate the value of the property. The value of the expression must be an object that can be converted to JSON, such as a number, boolean, string, list, or map. The context variables available to the expression are `issue` and `user`. Issues for which the expression returns a value whose JSON representation is longer than 32768 characters are ignored.
     *
     * @var string
     */
    protected $expression;
    /**
     * The bulk operation filter.
     *
     * @var BulkIssuePropertyUpdateRequestFilter
     */
    protected $filter;
    /**
     * The value of the property. The value must be a [valid](https://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * The value of the property. The value must be a [valid](https://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
     *
     * @param mixed $value
     *
     * @return self
     */
    public function setValue($value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * EXPERIMENTAL. The Jira expression to calculate the value of the property. The value of the expression must be an object that can be converted to JSON, such as a number, boolean, string, list, or map. The context variables available to the expression are `issue` and `user`. Issues for which the expression returns a value whose JSON representation is longer than 32768 characters are ignored.
     *
     * @return string
     */
    public function getExpression(): string
    {
        return $this->expression;
    }
    /**
     * EXPERIMENTAL. The Jira expression to calculate the value of the property. The value of the expression must be an object that can be converted to JSON, such as a number, boolean, string, list, or map. The context variables available to the expression are `issue` and `user`. Issues for which the expression returns a value whose JSON representation is longer than 32768 characters are ignored.
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
     * The bulk operation filter.
     *
     * @return BulkIssuePropertyUpdateRequestFilter
     */
    public function getFilter(): BulkIssuePropertyUpdateRequestFilter
    {
        return $this->filter;
    }
    /**
     * The bulk operation filter.
     *
     * @param BulkIssuePropertyUpdateRequestFilter $filter
     *
     * @return self
     */
    public function setFilter(BulkIssuePropertyUpdateRequestFilter $filter): self
    {
        $this->initialized['filter'] = true;
        $this->filter = $filter;
        return $this;
    }
}
