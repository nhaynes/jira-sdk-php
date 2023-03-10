<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Model;

class IssueTypeScreenSchemesProjects
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Details of an issue type screen scheme.
     */
    public function getIssueTypeScreenScheme(): IssueTypeScreenSchemesProjectsIssueTypeScreenScheme
    {
        return $this->issueTypeScreenScheme;
    }

    /**
     * Details of an issue type screen scheme.
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
     */
    public function setProjectIds(array $projectIds): self
    {
        $this->initialized['projectIds'] = true;
        $this->projectIds = $projectIds;

        return $this;
    }
}
