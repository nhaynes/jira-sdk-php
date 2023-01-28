<?php

namespace JiraSdk\Model;

class ProjectIssueTypes
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
     * Project ID details.
     *
     * @var ProjectId
     */
    protected $project;
    /**
     * IDs of the issue types
     *
     * @var string[]
     */
    protected $issueTypes;
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
    /**
     * IDs of the issue types
     *
     * @return string[]
     */
    public function getIssueTypes(): array
    {
        return $this->issueTypes;
    }
    /**
     * IDs of the issue types
     *
     * @param string[] $issueTypes
     *
     * @return self
     */
    public function setIssueTypes(array $issueTypes): self
    {
        $this->initialized['issueTypes'] = true;
        $this->issueTypes = $issueTypes;
        return $this;
    }
}
