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

class IssueTypeSchemeProjects
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Details of an issue type scheme.
     */
    public function getIssueTypeScheme(): IssueTypeSchemeProjectsIssueTypeScheme
    {
        return $this->issueTypeScheme;
    }

    /**
     * Details of an issue type scheme.
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
     */
    public function setProjectIds(array $projectIds): self
    {
        $this->initialized['projectIds'] = true;
        $this->projectIds = $projectIds;

        return $this;
    }
}
