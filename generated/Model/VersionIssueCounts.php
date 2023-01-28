<?php

namespace JiraSdk\Model;

class VersionIssueCounts
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
     * The URL of these count details.
     *
     * @var string
     */
    protected $self;
    /**
     * Count of issues where the `fixVersion` is set to the version.
     *
     * @var int
     */
    protected $issuesFixedCount;
    /**
     * Count of issues where the `affectedVersion` is set to the version.
     *
     * @var int
     */
    protected $issuesAffectedCount;
    /**
     * Count of issues where a version custom field is set to the version.
     *
     * @var int
     */
    protected $issueCountWithCustomFieldsShowingVersion;
    /**
     * List of custom fields using the version.
     *
     * @var VersionUsageInCustomField[]
     */
    protected $customFieldUsage;
    /**
     * The URL of these count details.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of these count details.
     *
     * @param string $self
     *
     * @return self
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;
        return $this;
    }
    /**
     * Count of issues where the `fixVersion` is set to the version.
     *
     * @return int
     */
    public function getIssuesFixedCount(): int
    {
        return $this->issuesFixedCount;
    }
    /**
     * Count of issues where the `fixVersion` is set to the version.
     *
     * @param int $issuesFixedCount
     *
     * @return self
     */
    public function setIssuesFixedCount(int $issuesFixedCount): self
    {
        $this->initialized['issuesFixedCount'] = true;
        $this->issuesFixedCount = $issuesFixedCount;
        return $this;
    }
    /**
     * Count of issues where the `affectedVersion` is set to the version.
     *
     * @return int
     */
    public function getIssuesAffectedCount(): int
    {
        return $this->issuesAffectedCount;
    }
    /**
     * Count of issues where the `affectedVersion` is set to the version.
     *
     * @param int $issuesAffectedCount
     *
     * @return self
     */
    public function setIssuesAffectedCount(int $issuesAffectedCount): self
    {
        $this->initialized['issuesAffectedCount'] = true;
        $this->issuesAffectedCount = $issuesAffectedCount;
        return $this;
    }
    /**
     * Count of issues where a version custom field is set to the version.
     *
     * @return int
     */
    public function getIssueCountWithCustomFieldsShowingVersion(): int
    {
        return $this->issueCountWithCustomFieldsShowingVersion;
    }
    /**
     * Count of issues where a version custom field is set to the version.
     *
     * @param int $issueCountWithCustomFieldsShowingVersion
     *
     * @return self
     */
    public function setIssueCountWithCustomFieldsShowingVersion(int $issueCountWithCustomFieldsShowingVersion): self
    {
        $this->initialized['issueCountWithCustomFieldsShowingVersion'] = true;
        $this->issueCountWithCustomFieldsShowingVersion = $issueCountWithCustomFieldsShowingVersion;
        return $this;
    }
    /**
     * List of custom fields using the version.
     *
     * @return VersionUsageInCustomField[]
     */
    public function getCustomFieldUsage(): array
    {
        return $this->customFieldUsage;
    }
    /**
     * List of custom fields using the version.
     *
     * @param VersionUsageInCustomField[] $customFieldUsage
     *
     * @return self
     */
    public function setCustomFieldUsage(array $customFieldUsage): self
    {
        $this->initialized['customFieldUsage'] = true;
        $this->customFieldUsage = $customFieldUsage;
        return $this;
    }
}
