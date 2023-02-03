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

class ProjectIssueTypes
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Project ID details.
     *
     * @var ProjectId
     */
    protected $project;
    /**
     * IDs of the issue types.
     *
     * @var string[]
     */
    protected $issueTypes;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Project ID details.
     */
    public function getProject(): ProjectId
    {
        return $this->project;
    }

    /**
     * Project ID details.
     */
    public function setProject(ProjectId $project): self
    {
        $this->initialized['project'] = true;
        $this->project = $project;

        return $this;
    }

    /**
     * IDs of the issue types.
     *
     * @return string[]
     */
    public function getIssueTypes(): array
    {
        return $this->issueTypes;
    }

    /**
     * IDs of the issue types.
     *
     * @param string[] $issueTypes
     */
    public function setIssueTypes(array $issueTypes): self
    {
        $this->initialized['issueTypes'] = true;
        $this->issueTypes = $issueTypes;

        return $this;
    }
}
