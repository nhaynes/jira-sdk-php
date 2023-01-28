<?php

namespace JiraSdk\Model;

class ProjectIds
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
     * The IDs of projects.
     *
     * @var string[]
     */
    protected $projectIds;
    /**
     * The IDs of projects.
     *
     * @return string[]
     */
    public function getProjectIds(): array
    {
        return $this->projectIds;
    }
    /**
     * The IDs of projects.
     *
     * @param string[] $projectIds
     *
     * @return self
     */
    public function setProjectIds(array $projectIds): self
    {
        $this->initialized['projectIds'] = true;
        $this->projectIds = $projectIds;
        return $this;
    }
}
