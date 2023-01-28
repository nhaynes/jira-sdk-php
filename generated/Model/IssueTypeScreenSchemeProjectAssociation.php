<?php

namespace JiraSdk\Model;

class IssueTypeScreenSchemeProjectAssociation
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
     * The ID of the issue type screen scheme.
     *
     * @var string
     */
    protected $issueTypeScreenSchemeId;
    /**
     * The ID of the project.
     *
     * @var string
     */
    protected $projectId;
    /**
     * The ID of the issue type screen scheme.
     *
     * @return string
     */
    public function getIssueTypeScreenSchemeId(): string
    {
        return $this->issueTypeScreenSchemeId;
    }
    /**
     * The ID of the issue type screen scheme.
     *
     * @param string $issueTypeScreenSchemeId
     *
     * @return self
     */
    public function setIssueTypeScreenSchemeId(string $issueTypeScreenSchemeId): self
    {
        $this->initialized['issueTypeScreenSchemeId'] = true;
        $this->issueTypeScreenSchemeId = $issueTypeScreenSchemeId;
        return $this;
    }
    /**
     * The ID of the project.
     *
     * @return string
     */
    public function getProjectId(): string
    {
        return $this->projectId;
    }
    /**
     * The ID of the project.
     *
     * @param string $projectId
     *
     * @return self
     */
    public function setProjectId(string $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;
        return $this;
    }
}
