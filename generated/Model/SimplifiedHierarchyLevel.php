<?php

namespace JiraSdk\Model;

class SimplifiedHierarchyLevel
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
     * The ID of the hierarchy level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @var int
     */
    protected $id;
    /**
     * The name of this hierarchy level.
     *
     * @var string
     */
    protected $name;
    /**
     * The ID of the level above this one in the hierarchy. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @var int
     */
    protected $aboveLevelId;
    /**
     * The ID of the level below this one in the hierarchy. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @var int
     */
    protected $belowLevelId;
    /**
     * The ID of the project configuration. This property is deprecated, see [Change oticen: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @var int
     */
    protected $projectConfigurationId;
    /**
     * The level of this item in the hierarchy.
     *
     * @var int
     */
    protected $level;
    /**
     * The issue types available in this hierarchy level.
     *
     * @var int[]
     */
    protected $issueTypeIds;
    /**
     * The external UUID of the hierarchy level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @var string
     */
    protected $externalUuid;
    /**
     *
     *
     * @var int
     */
    protected $hierarchyLevelNumber;
    /**
     * The ID of the hierarchy level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the hierarchy level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The name of this hierarchy level.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of this hierarchy level.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The ID of the level above this one in the hierarchy. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @return int
     */
    public function getAboveLevelId(): int
    {
        return $this->aboveLevelId;
    }
    /**
     * The ID of the level above this one in the hierarchy. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @param int $aboveLevelId
     *
     * @return self
     */
    public function setAboveLevelId(int $aboveLevelId): self
    {
        $this->initialized['aboveLevelId'] = true;
        $this->aboveLevelId = $aboveLevelId;
        return $this;
    }
    /**
     * The ID of the level below this one in the hierarchy. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @return int
     */
    public function getBelowLevelId(): int
    {
        return $this->belowLevelId;
    }
    /**
     * The ID of the level below this one in the hierarchy. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @param int $belowLevelId
     *
     * @return self
     */
    public function setBelowLevelId(int $belowLevelId): self
    {
        $this->initialized['belowLevelId'] = true;
        $this->belowLevelId = $belowLevelId;
        return $this;
    }
    /**
     * The ID of the project configuration. This property is deprecated, see [Change oticen: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @return int
     */
    public function getProjectConfigurationId(): int
    {
        return $this->projectConfigurationId;
    }
    /**
     * The ID of the project configuration. This property is deprecated, see [Change oticen: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @param int $projectConfigurationId
     *
     * @return self
     */
    public function setProjectConfigurationId(int $projectConfigurationId): self
    {
        $this->initialized['projectConfigurationId'] = true;
        $this->projectConfigurationId = $projectConfigurationId;
        return $this;
    }
    /**
     * The level of this item in the hierarchy.
     *
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }
    /**
     * The level of this item in the hierarchy.
     *
     * @param int $level
     *
     * @return self
     */
    public function setLevel(int $level): self
    {
        $this->initialized['level'] = true;
        $this->level = $level;
        return $this;
    }
    /**
     * The issue types available in this hierarchy level.
     *
     * @return int[]
     */
    public function getIssueTypeIds(): array
    {
        return $this->issueTypeIds;
    }
    /**
     * The issue types available in this hierarchy level.
     *
     * @param int[] $issueTypeIds
     *
     * @return self
     */
    public function setIssueTypeIds(array $issueTypeIds): self
    {
        $this->initialized['issueTypeIds'] = true;
        $this->issueTypeIds = $issueTypeIds;
        return $this;
    }
    /**
     * The external UUID of the hierarchy level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @return string
     */
    public function getExternalUuid(): string
    {
        return $this->externalUuid;
    }
    /**
     * The external UUID of the hierarchy level. This property is deprecated, see [Change notice: Removing hierarchy level IDs from next-gen APIs](https://developer.atlassian.com/cloud/jira/platform/change-notice-removing-hierarchy-level-ids-from-next-gen-apis/).
     *
     * @param string $externalUuid
     *
     * @return self
     */
    public function setExternalUuid(string $externalUuid): self
    {
        $this->initialized['externalUuid'] = true;
        $this->externalUuid = $externalUuid;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getHierarchyLevelNumber(): int
    {
        return $this->hierarchyLevelNumber;
    }
    /**
     *
     *
     * @param int $hierarchyLevelNumber
     *
     * @return self
     */
    public function setHierarchyLevelNumber(int $hierarchyLevelNumber): self
    {
        $this->initialized['hierarchyLevelNumber'] = true;
        $this->hierarchyLevelNumber = $hierarchyLevelNumber;
        return $this;
    }
}
