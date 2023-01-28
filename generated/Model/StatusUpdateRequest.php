<?php

namespace JiraSdk\Model;

class StatusUpdateRequest
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
     * The list of statuses that will be updated.
     *
     * @var StatusUpdate[]
     */
    protected $statuses;
    /**
     * The list of statuses that will be updated.
     *
     * @return StatusUpdate[]
     */
    public function getStatuses(): array
    {
        return $this->statuses;
    }
    /**
     * The list of statuses that will be updated.
     *
     * @param StatusUpdate[] $statuses
     *
     * @return self
     */
    public function setStatuses(array $statuses): self
    {
        $this->initialized['statuses'] = true;
        $this->statuses = $statuses;
        return $this;
    }
}
