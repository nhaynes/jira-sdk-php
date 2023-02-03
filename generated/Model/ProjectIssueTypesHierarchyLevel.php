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

class ProjectIssueTypesHierarchyLevel
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the issue type hierarchy level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @var string
     */
    protected $entityId;
    /**
     * The level of the issue type hierarchy level.
     *
     * @var int
     */
    protected $level;
    /**
     * The name of the issue type hierarchy level.
     *
     * @var string
     */
    protected $name;
    /**
     * The list of issue types in the hierarchy level.
     *
     * @var IssueTypeInfo[]
     */
    protected $issueTypes;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the issue type hierarchy level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     */
    public function getEntityId(): string
    {
        return $this->entityId;
    }

    /**
     * The ID of the issue type hierarchy level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     */
    public function setEntityId(string $entityId): self
    {
        $this->initialized['entityId'] = true;
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * The level of the issue type hierarchy level.
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * The level of the issue type hierarchy level.
     */
    public function setLevel(int $level): self
    {
        $this->initialized['level'] = true;
        $this->level = $level;

        return $this;
    }

    /**
     * The name of the issue type hierarchy level.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the issue type hierarchy level.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The list of issue types in the hierarchy level.
     *
     * @return IssueTypeInfo[]
     */
    public function getIssueTypes(): array
    {
        return $this->issueTypes;
    }

    /**
     * The list of issue types in the hierarchy level.
     *
     * @param IssueTypeInfo[] $issueTypes
     */
    public function setIssueTypes(array $issueTypes): self
    {
        $this->initialized['issueTypes'] = true;
        $this->issueTypes = $issueTypes;

        return $this;
    }
}
