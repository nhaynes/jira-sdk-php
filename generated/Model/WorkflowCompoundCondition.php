<?php

namespace JiraSdk\Model;

class WorkflowCompoundCondition extends \ArrayObject
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
     * The compound condition operator.
     *
     * @var string
     */
    protected $operator;
    /**
     * The list of workflow conditions.
     *
     * @var mixed[]
     */
    protected $conditions;
    /**
     *
     *
     * @var string
     */
    protected $nodeType;
    /**
     * The compound condition operator.
     *
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }
    /**
     * The compound condition operator.
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
     * The list of workflow conditions.
     *
     * @return mixed[]
     */
    public function getConditions(): array
    {
        return $this->conditions;
    }
    /**
     * The list of workflow conditions.
     *
     * @param mixed[] $conditions
     *
     * @return self
     */
    public function setConditions(array $conditions): self
    {
        $this->initialized['conditions'] = true;
        $this->conditions = $conditions;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getNodeType(): string
    {
        return $this->nodeType;
    }
    /**
     *
     *
     * @param string $nodeType
     *
     * @return self
     */
    public function setNodeType(string $nodeType): self
    {
        $this->initialized['nodeType'] = true;
        $this->nodeType = $nodeType;
        return $this;
    }
}
