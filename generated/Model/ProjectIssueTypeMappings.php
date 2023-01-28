<?php

namespace JiraSdk\Model;

class ProjectIssueTypeMappings
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
     * The project and issue type mappings.
     *
     * @var ProjectIssueTypeMapping[]
     */
    protected $mappings;
    /**
     * The project and issue type mappings.
     *
     * @return ProjectIssueTypeMapping[]
     */
    public function getMappings(): array
    {
        return $this->mappings;
    }
    /**
     * The project and issue type mappings.
     *
     * @param ProjectIssueTypeMapping[] $mappings
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
