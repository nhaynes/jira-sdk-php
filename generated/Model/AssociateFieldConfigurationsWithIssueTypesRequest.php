<?php

namespace JiraSdk\Model;

class AssociateFieldConfigurationsWithIssueTypesRequest
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
     * Field configuration to issue type mappings.
     *
     * @var FieldConfigurationToIssueTypeMapping[]
     */
    protected $mappings;
    /**
     * Field configuration to issue type mappings.
     *
     * @return FieldConfigurationToIssueTypeMapping[]
     */
    public function getMappings(): array
    {
        return $this->mappings;
    }
    /**
     * Field configuration to issue type mappings.
     *
     * @param FieldConfigurationToIssueTypeMapping[] $mappings
     *
     * @return self
     */
    public function setMappings(array $mappings): self
    {
        $this->initialized['mappings'] = true;
        $this->mappings = $mappings;
        return $this;
    }
}
