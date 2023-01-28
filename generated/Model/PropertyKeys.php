<?php

namespace JiraSdk\Model;

class PropertyKeys
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
     * Property key details.
     *
     * @var PropertyKey[]
     */
    protected $keys;
    /**
     * Property key details.
     *
     * @return PropertyKey[]
     */
    public function getKeys(): array
    {
        return $this->keys;
    }
    /**
     * Property key details.
     *
     * @param PropertyKey[] $keys
     *
     * @return self
     */
    public function setKeys(array $keys): self
    {
        $this->initialized['keys'] = true;
        $this->keys = $keys;
        return $this;
    }
}
