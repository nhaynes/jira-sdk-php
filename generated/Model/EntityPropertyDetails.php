<?php

namespace JiraSdk\Model;

class EntityPropertyDetails extends \ArrayObject
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
     * The entity property ID.
     *
     * @var float
     */
    protected $entityId;
    /**
     * The entity property key.
     *
     * @var string
     */
    protected $key;
    /**
     * The new value of the entity property.
     *
     * @var string
     */
    protected $value;
    /**
     * The entity property ID.
     *
     * @return float
     */
    public function getEntityId(): float
    {
        return $this->entityId;
    }
    /**
     * The entity property ID.
     *
     * @param float $entityId
     *
     * @return self
     */
    public function setEntityId(float $entityId): self
    {
        $this->initialized['entityId'] = true;
        $this->entityId = $entityId;
        return $this;
    }
    /**
     * The entity property key.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The entity property key.
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
     * The new value of the entity property.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
    /**
     * The new value of the entity property.
     *
     * @param string $value
     *
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
}
