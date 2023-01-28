<?php

namespace JiraSdk\Model;

class IssueTypeScreenSchemesProjects
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
     * Details of an issue type screen scheme.
     *
     * @var IssueTypeScreenSchemesProjectsIssueTypeScreenScheme
     */
    protected $issueTypeScreenScheme;
    /**
     * The IDs of the projects using the issue type screen scheme.
     *
     * @var string[]
     */
    protected $projectIds;
    /**
     * Details of an issue type screen scheme.
     *
     * @return IssueTypeScreenSchemesProjectsIssueTypeScreenScheme
     */
    public function getIssueTypeScreenScheme(): IssueTypeScreenSchemesProjectsIssueTypeScreenScheme
    {
        return $this->issueTypeScreenScheme;
    }
    /**
     * Details of an issue type screen scheme.
     *
     * @param IssueTypeScreenSchemesProjectsIssueTypeScreenScheme $issueTypeScreenScheme
     *
     * @return self
     */
    public function setIssueTypeScreenScheme(IssueTypeScreenSchemesProjectsIssueTypeScreenScheme $issueTypeScreenScheme): self
    {
        $this->initialized['issueTypeScreenScheme'] = true;
        $this->issueTypeScreenScheme = $issueTypeScreenScheme;
        return $this;
    }
    /**
     * The IDs of the projects using the issue type screen scheme.
     *
     * @return string[]
     */
    public function getProjectIds(): array
    {
        return $this->projectIds;
    }
    /**
     * The IDs of the projects using the issue type screen scheme.
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
