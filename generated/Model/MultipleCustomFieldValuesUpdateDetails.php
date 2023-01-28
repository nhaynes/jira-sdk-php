<?php

namespace JiraSdk\Model;

class MultipleCustomFieldValuesUpdateDetails
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
     *
     *
     * @var MultipleCustomFieldValuesUpdate[]
     */
    protected $updates;
    /**
     *
     *
     * @return MultipleCustomFieldValuesUpdate[]
     */
    public function getUpdates(): array
    {
        return $this->updates;
    }
    /**
     *
     *
     * @param MultipleCustomFieldValuesUpdate[] $updates
     *
     * @return self
     */
    public function setUpdates(array $updates): self
    {
        $this->initialized['updates'] = true;
        $this->updates = $updates;
        return $this;
    }
}
