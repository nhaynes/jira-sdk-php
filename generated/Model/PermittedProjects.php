<?php

namespace JiraSdk\Model;

class PermittedProjects
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
     * A list of projects.
     *
     * @var ProjectIdentifierBean[]
     */
    protected $projects;
    /**
     * A list of projects.
     *
     * @return ProjectIdentifierBean[]
     */
    public function getProjects(): array
    {
        return $this->projects;
    }
    /**
     * A list of projects.
     *
     * @param ProjectIdentifierBean[] $projects
     *
     * @return self
     */
    public function setProjects(array $projects): self
    {
        $this->initialized['projects'] = true;
        $this->projects = $projects;
        return $this;
    }
}
