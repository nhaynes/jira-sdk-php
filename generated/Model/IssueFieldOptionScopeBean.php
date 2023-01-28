<?php

namespace JiraSdk\Model;

class IssueFieldOptionScopeBean
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
     * DEPRECATED
     *
     * @var int[]
     */
    protected $projects;
    /**
     * Defines the projects in which the option is available and the behavior of the option within each project. Specify one object per project. The behavior of the option in a project context overrides the behavior in the global context.
     *
     * @var ProjectScopeBean[]
     */
    protected $projects2;
    /**
     * Defines the behavior of the option within the global context. If this property is set, even if set to an empty object, then the option is available in all projects.
     *
     * @var IssueFieldOptionScopeBeanGlobal
     */
    protected $global;
    /**
     * DEPRECATED
     *
     * @return int[]
     */
    public function getProjects(): array
    {
        return $this->projects;
    }
    /**
     * DEPRECATED
     *
     * @param int[] $projects
     *
     * @return self
     */
    public function setProjects(array $projects): self
    {
        $this->initialized['projects'] = true;
        $this->projects = $projects;
        return $this;
    }
    /**
     * Defines the projects in which the option is available and the behavior of the option within each project. Specify one object per project. The behavior of the option in a project context overrides the behavior in the global context.
     *
     * @return ProjectScopeBean[]
     */
    public function getProjects2(): array
    {
        return $this->projects2;
    }
    /**
     * Defines the projects in which the option is available and the behavior of the option within each project. Specify one object per project. The behavior of the option in a project context overrides the behavior in the global context.
     *
     * @param ProjectScopeBean[] $projects2
     *
     * @return self
     */
    public function setProjects2(array $projects2): self
    {
        $this->initialized['projects2'] = true;
        $this->projects2 = $projects2;
        return $this;
    }
    /**
     * Defines the behavior of the option within the global context. If this property is set, even if set to an empty object, then the option is available in all projects.
     *
     * @return IssueFieldOptionScopeBeanGlobal
     */
    public function getGlobal(): IssueFieldOptionScopeBeanGlobal
    {
        return $this->global;
    }
    /**
     * Defines the behavior of the option within the global context. If this property is set, even if set to an empty object, then the option is available in all projects.
     *
     * @param IssueFieldOptionScopeBeanGlobal $global
     *
     * @return self
     */
    public function setGlobal(IssueFieldOptionScopeBeanGlobal $global): self
    {
        $this->initialized['global'] = true;
        $this->global = $global;
        return $this;
    }
}
