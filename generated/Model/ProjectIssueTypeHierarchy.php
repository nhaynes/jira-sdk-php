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

class ProjectIssueTypeHierarchy
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the project.
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * The ID of the project.
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
     */
    public function setHierarchy(array $hierarchy): self
    {
        $this->initialized['hierarchy'] = true;
        $this->hierarchy = $hierarchy;

        return $this;
    }
}
