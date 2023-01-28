<?php

namespace JiraSdk\Model;

class CustomFieldContextDefaultValueForgeMultiStringField extends \ArrayObject
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
     * List of string values. The maximum length for a value is 254 characters.
     *
     * @var string[]
     */
    protected $values;
    /**
     *
     *
     * @var string
     */
    protected $type;
    /**
     * List of string values. The maximum length for a value is 254 characters.
     *
     * @return string[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
    /**
     * List of string values. The maximum length for a value is 254 characters.
     *
     * @param string[] $values
     *
     * @return self
     */
    public function setValues(array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;
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
