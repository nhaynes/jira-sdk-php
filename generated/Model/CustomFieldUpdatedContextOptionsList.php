<?php

namespace JiraSdk\Model;

class CustomFieldUpdatedContextOptionsList
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
     * The updated custom field options.
     *
     * @var CustomFieldOptionUpdate[]
     */
    protected $options;
    /**
     * The updated custom field options.
     *
     * @return CustomFieldOptionUpdate[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }
    /**
     * The updated custom field options.
     *
     * @param CustomFieldOptionUpdate[] $options
     *
     * @return self
     */
    public function setOptions(array $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;
        return $this;
    }
}
