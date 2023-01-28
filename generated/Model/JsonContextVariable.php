<?php

namespace JiraSdk\Model;

class JsonContextVariable extends CustomContextVariable
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
     * A JSON object containing custom content.
     *
     * @var mixed[]
     */
    protected $value;
    /**
     * A JSON object containing custom content.
     *
     * @return mixed[]
     */
    public function getValue(): iterable
    {
        return $this->value;
    }
    /**
     * A JSON object containing custom content.
     *
     * @param mixed[] $value
     *
     * @return self
     */
    public function setValue(iterable $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
}
