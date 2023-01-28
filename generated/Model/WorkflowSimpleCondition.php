<?php

namespace JiraSdk\Model;

class WorkflowSimpleCondition extends \ArrayObject
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
     *
     *
     * @var string
     */
    protected $nodeType;
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
