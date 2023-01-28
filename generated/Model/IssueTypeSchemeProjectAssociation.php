<?php

namespace JiraSdk\Model;

class IssueTypeSchemeProjectAssociation
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
     * The ID of the issue type scheme.
     *
     * @var string
     */
    protected $issueTypeSchemeId;
    /**
     * The ID of the project.
     *
     * @var string
     */
    protected $projectId;
    /**
     * The ID of the issue type scheme.
     *
     * @return string
     */
    public function getIssueTypeSchemeId(): string
    {
        return $this->issueTypeSchemeId;
    }
    /**
     * The ID of the issue type scheme.
     *
     * @param string $issueTypeSchemeId
     *
     * @return self
     */
    public function setIssueTypeSchemeId(string $issueTypeSchemeId): self
    {
        $this->initialized['issueTypeSchemeId'] = true;
        $this->issueTypeSchemeId = $issueTypeSchemeId;
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
