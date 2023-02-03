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

class Hierarchy
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the base level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @var int
     */
    protected $baseLevelId;
    /**
     * Details about the hierarchy level.
     *
     * @var SimplifiedHierarchyLevel[]
     */
    protected $levels;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the base level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     */
    public function getBaseLevelId(): int
    {
        return $this->baseLevelId;
    }

    /**
     * The ID of the base level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     */
    public function setBaseLevelId(int $baseLevelId): self
    {
        $this->initialized['baseLevelId'] = true;
        $this->baseLevelId = $baseLevelId;

        return $this;
    }

    /**
     * Details about the hierarchy level.
     *
     * @return SimplifiedHierarchyLevel[]
     */
    public function getLevels(): array
    {
        return $this->levels;
    }

    /**
     * Details about the hierarchy level.
     *
     * @param SimplifiedHierarchyLevel[] $levels
     */
    public function setLevels(array $levels): self
    {
        $this->initialized['levels'] = true;
        $this->levels = $levels;

        return $this;
    }
}
