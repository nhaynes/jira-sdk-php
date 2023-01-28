<?php

namespace JiraSdk\Model;

class ProjectIssueSecurityLevels
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
     * Issue level security items list.
     *
     * @var SecurityLevel[]
     */
    protected $levels;
    /**
     * Issue level security items list.
     *
     * @return SecurityLevel[]
     */
    public function getLevels(): array
    {
        return $this->levels;
    }
    /**
     * Issue level security items list.
     *
     * @param SecurityLevel[] $levels
     *
     * @return self
     */
    public function setLevels(array $levels): self
    {
        $this->initialized['levels'] = true;
        $this->levels = $levels;
        return $this;
    }
}
