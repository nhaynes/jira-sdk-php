<?php

namespace JiraSdk\Model;

class ListOperand extends \ArrayObject
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
     * The list of operand values.
     *
     * @var mixed[][]
     */
    protected $values;
    /**
     * The list of operand values.
     *
     * @return mixed[][]
     */
    public function getValues(): array
    {
        return $this->values;
    }
    /**
     * The list of operand values.
     *
     * @param mixed[][] $values
     *
     * @return self
     */
    public function setValues(array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;
        return $this;
    }
}
