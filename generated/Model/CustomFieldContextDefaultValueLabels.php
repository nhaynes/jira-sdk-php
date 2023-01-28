<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueLabels extends \ArrayObject
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
     * The default labels value.
     *
     * @var string[]
     */
    protected $labels;
    /**
     *
     *
     * @var string
     */
    protected $type;
    /**
     * The default labels value.
     *
     * @return string[]
     */
    public function getLabels(): array
    {
        return $this->labels;
    }
    /**
     * The default labels value.
     *
     * @param string[] $labels
     *
     * @return self
     */
    public function setLabels(array $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     *
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
