<?php

namespace JiraSdk\Model;

class CompoundClause extends \ArrayObject
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
     * The list of nested clauses.
     *
     * @var CompoundClause[]|FieldValueClause[]|FieldWasClause[]|FieldChangedClause[]
     */
    protected $clauses;
    /**
     * The operator between the clauses.
     *
     * @var string
     */
    protected $operator;
    /**
     * The list of nested clauses.
     *
     * @return CompoundClause[]|FieldValueClause[]|FieldWasClause[]|FieldChangedClause[]
     */
    public function getClauses(): array
    {
        return $this->clauses;
    }
    /**
     * The list of nested clauses.
     *
     * @param CompoundClause[]|FieldValueClause[]|FieldWasClause[]|FieldChangedClause[] $clauses
     *
     * @return self
     */
    public function setClauses(array $clauses): self
    {
        $this->initialized['clauses'] = true;
        $this->clauses = $clauses;
        return $this;
    }
    /**
     * The operator between the clauses.
     *
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }
    /**
     * The operator between the clauses.
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
}
