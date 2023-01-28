<?php

namespace JiraSdk\Model;

class EntityProperty
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
     * The key of the property. Required on create and update.
     *
     * @var string
     */
    protected $key;
    /**
     * The value of the property. Required on create and update.
     *
     * @var mixed
     */
    protected $value;
    /**
     * The key of the property. Required on create and update.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The key of the property. Required on create and update.
     *
     * @param string $key
     *
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * The value of the property. Required on create and update.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * The value of the property. Required on create and update.
     *
     * @param mixed $value
     *
     * @return self
     */
    public function setValue($value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
}
