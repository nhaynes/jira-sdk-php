<?php

namespace JiraSdk\Model;

class FieldChangedClause extends \ArrayObject
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
     * A field used in a JQL query. See [Advanced searching - fields reference](https://confluence.atlassian.com/x/dAiiLQ) for more information about fields in JQL queries.
     *
     * @var JqlQueryField
     */
    protected $field;
    /**
     * The operator applied to the field.
     *
     * @var string
     */
    protected $operator;
    /**
     * The list of time predicates.
     *
     * @var JqlQueryClauseTimePredicate[]
     */
    protected $predicates;
    /**
     * A field used in a JQL query. See [Advanced searching - fields reference](https://confluence.atlassian.com/x/dAiiLQ) for more information about fields in JQL queries.
     *
     * @return JqlQueryField
     */
    public function getField(): JqlQueryField
    {
        return $this->field;
    }
    /**
     * A field used in a JQL query. See [Advanced searching - fields reference](https://confluence.atlassian.com/x/dAiiLQ) for more information about fields in JQL queries.
     *
     * @param JqlQueryField $field
     *
     * @return self
     */
    public function setField(JqlQueryField $field): self
    {
        $this->initialized['field'] = true;
        $this->field = $field;
        return $this;
    }
    /**
     * The operator applied to the field.
     *
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }
    /**
     * The operator applied to the field.
     *
     * @param string $operator
     *
     * @return self
     */
    public function setOperator(string $operator): self
    {
        $this->initialized['operator'] = true;
        $this->operator = $operator;
        return $this;
    }
    /**
     * The list of time predicates.
     *
     * @return JqlQueryClauseTimePredicate[]
     */
    public function getPredicates(): array
    {
        return $this->predicates;
    }
    /**
     * The list of time predicates.
     *
     * @param JqlQueryClauseTimePredicate[] $predicates
     *
     * @return self
     */
    public function setPredicates(array $predicates): self
    {
        $this->initialized['predicates'] = true;
        $this->predicates = $predicates;
        return $this;
    }
}
