<?php

namespace JiraSdk\Model;

class PublishDraftWorkflowScheme
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
     * Mappings of statuses to new statuses for issue types.
     *
     * @var StatusMapping[]
     */
    protected $statusMappings;
    /**
     * Mappings of statuses to new statuses for issue types.
     *
     * @return StatusMapping[]
     */
    public function getStatusMappings(): array
    {
        return $this->statusMappings;
    }
    /**
     * Mappings of statuses to new statuses for issue types.
     *
     * @param StatusMapping[] $statusMappings
     *
     * @return self
     */
    public function setStatusMappings(array $statusMappings): self
    {
        $this->initialized['statusMappings'] = true;
        $this->statusMappings = $statusMappings;
        return $this;
    }
}
