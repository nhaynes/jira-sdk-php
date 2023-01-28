<?php

namespace JiraSdk\Model;

class StatusCreateRequest
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
     * Details of the statuses being created.
     *
     * @var StatusCreate[]
     */
    protected $statuses;
    /**
     * The scope of the status.
     *
     * @var StatusScope
     */
    protected $scope;
    /**
     * Details of the statuses being created.
     *
     * @return StatusCreate[]
     */
    public function getStatuses(): array
    {
        return $this->statuses;
    }
    /**
     * Details of the statuses being created.
     *
     * @param StatusCreate[] $statuses
     *
     * @return self
     */
    public function setStatuses(array $statuses): self
    {
        $this->initialized['statuses'] = true;
        $this->statuses = $statuses;
        return $this;
    }
    /**
     * The scope of the status.
     *
     * @return StatusScope
     */
    public function getScope(): StatusScope
    {
        return $this->scope;
    }
    /**
     * The scope of the status.
     *
     * @param StatusScope $scope
     *
     * @return self
     */
    public function setScope(StatusScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
}
