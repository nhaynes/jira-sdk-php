<?php

namespace JiraSdk\Model;

class CreateWorkflowTransitionRulesDetailsConditions extends \ArrayObject
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
     * @var CreateWorkflowCondition[]
     */
    protected $conditions;
    /**
     * The type of the transition rule.
     *
     * @var string
     */
    protected $type;
    /**
     * EXPERIMENTAL. The configuration of the transition rule.
     *
     * @var mixed[]
     */
    protected $configuration;
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
     * @return CreateWorkflowCondition[]
     */
    public function getConditions(): array
    {
        return $this->conditions;
    }
    /**
     * The list of workflow conditions.
     *
     * @param CreateWorkflowCondition[] $conditions
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
     * The type of the transition rule.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * The type of the transition rule.
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
     * EXPERIMENTAL. The configuration of the transition rule.
     *
     * @return mixed[]
     */
    public function getConfiguration(): iterable
    {
        return $this->configuration;
    }
    /**
     * EXPERIMENTAL. The configuration of the transition rule.
     *
     * @param mixed[] $configuration
     *
     * @return self
     */
    public function setConfiguration(iterable $configuration): self
    {
        $this->initialized['configuration'] = true;
        $this->configuration = $configuration;
        return $this;
    }
}
