<?php

namespace JiraSdk\Model;

class ProjectIssueTypeHierarchy
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
     * The ID of the project.
     *
     * @var int
     */
    protected $projectId;
    /**
     * Details of an issue type hierarchy level.
     *
     * @var ProjectIssueTypesHierarchyLevel[]
     */
    protected $hierarchy;
    /**
     * The ID of the project.
     *
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }
    /**
     * The ID of the project.
     *
     * @param int $projectId
     *
     * @return self
     */
    public function setProjectId(int $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;
        return $this;
    }
    /**
     * Details of an issue type hierarchy level.
     *
     * @return ProjectIssueTypesHierarchyLevel[]
     */
    public function getHierarchy(): array
    {
        return $this->hierarchy;
    }
    /**
     * Details of an issue type hierarchy level.
     *
     * @param ProjectIssueTypesHierarchyLevel[] $hierarchy
     *
     * @return self
     */
    public function setHierarchy(array $hierarchy): self
    {
        $this->initialized['hierarchy'] = true;
        $this->hierarchy = $hierarchy;
        return $this;
    }
}
