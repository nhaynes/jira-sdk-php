<?php

namespace JiraSdk\Model;

class CustomFieldConfigurations
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
     * The list of custom field configuration details.
     *
     * @var ContextualConfiguration[]
     */
    protected $configurations;
    /**
     * The list of custom field configuration details.
     *
     * @return ContextualConfiguration[]
     */
    public function getConfigurations(): array
    {
        return $this->configurations;
    }
    /**
     * The list of custom field configuration details.
     *
     * @param ContextualConfiguration[] $configurations
     *
     * @return self
     */
    public function setConfigurations(array $configurations): self
    {
        $this->initialized['configurations'] = true;
        $this->configurations = $configurations;
        return $this;
    }
}
