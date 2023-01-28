<?php

namespace JiraSdk\Model;

class JiraExpressionsComplexityBeanExpensiveOperations extends \ArrayObject
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
     * The complexity value of the current expression.
     *
     * @var int
     */
    protected $value;
    /**
     * The maximum allowed complexity. The evaluation will fail if this value is exceeded.
     *
     * @var int
     */
    protected $limit;
    /**
     * The complexity value of the current expression.
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
    /**
     * The complexity value of the current expression.
     *
     * @param int $value
     *
     * @return self
     */
    public function setValue(int $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * The maximum allowed complexity. The evaluation will fail if this value is exceeded.
     *
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }
    /**
     * The maximum allowed complexity. The evaluation will fail if this value is exceeded.
     *
     * @param int $limit
     *
     * @return self
     */
    public function setLimit(int $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;
        return $this;
    }
}
