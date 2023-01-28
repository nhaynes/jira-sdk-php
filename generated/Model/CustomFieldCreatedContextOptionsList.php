<?php

namespace JiraSdk\Model;

class CustomFieldCreatedContextOptionsList
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
     * The created custom field options.
     *
     * @var CustomFieldContextOption[]
     */
    protected $options;
    /**
     * The created custom field options.
     *
     * @return CustomFieldContextOption[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }
    /**
     * The created custom field options.
     *
     * @param CustomFieldContextOption[] $options
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
