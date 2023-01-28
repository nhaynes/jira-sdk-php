<?php

namespace JiraSdk\Model;

class StatusScope
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
     * The scope of the status. `GLOBAL` for company-managed projects and `PROJECT` for team-managed projects.
     *
     * @var string
     */
    protected $type;
    /**
     * Project ID details.
     *
     * @var ProjectId
     */
    protected $project;
    /**
     * The scope of the status. `GLOBAL` for company-managed projects and `PROJECT` for team-managed projects.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * The scope of the status. `GLOBAL` for company-managed projects and `PROJECT` for team-managed projects.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * Project ID details.
     *
     * @return ProjectId
     */
    public function getProject(): ProjectId
    {
        return $this->project;
    }
    /**
     * Project ID details.
     *
     * @param ProjectId $project
     *
     * @return self
     */
    public function setProject(ProjectId $project): self
    {
        $this->initialized['project'] = true;
        $this->project = $project;
        return $this;
    }
}
