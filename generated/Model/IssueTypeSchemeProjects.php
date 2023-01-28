<?php

namespace JiraSdk\Model;

class IssueTypeSchemeProjects
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
     * Details of an issue type scheme.
     *
     * @var IssueTypeSchemeProjectsIssueTypeScheme
     */
    protected $issueTypeScheme;
    /**
     * The IDs of the projects using the issue type scheme.
     *
     * @var string[]
     */
    protected $projectIds;
    /**
     * Details of an issue type scheme.
     *
     * @return IssueTypeSchemeProjectsIssueTypeScheme
     */
    public function getIssueTypeScheme(): IssueTypeSchemeProjectsIssueTypeScheme
    {
        return $this->issueTypeScheme;
    }
    /**
     * Details of an issue type scheme.
     *
     * @param IssueTypeSchemeProjectsIssueTypeScheme $issueTypeScheme
     *
     * @return self
     */
    public function setIssueTypeScheme(IssueTypeSchemeProjectsIssueTypeScheme $issueTypeScheme): self
    {
        $this->initialized['issueTypeScheme'] = true;
        $this->issueTypeScheme = $issueTypeScheme;
        return $this;
    }
    /**
     * The IDs of the projects using the issue type scheme.
     *
     * @return string[]
     */
    public function getProjectIds(): array
    {
        return $this->projectIds;
    }
    /**
     * The IDs of the projects using the issue type scheme.
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
