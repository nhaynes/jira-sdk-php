<?php

namespace JiraSdk\Model;

class VersionUsageInCustomField
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
     * The name of the custom field.
     *
     * @var string
     */
    protected $fieldName;
    /**
     * The ID of the custom field.
     *
     * @var int
     */
    protected $customFieldId;
    /**
     * Count of the issues where the custom field contains the version.
     *
     * @var int
     */
    protected $issueCountWithVersionInCustomField;
    /**
     * The name of the custom field.
     *
     * @return string
     */
    public function getFieldName(): string
    {
        return $this->fieldName;
    }
    /**
     * The name of the custom field.
     *
     * @param string $fieldName
     *
     * @return self
     */
    public function setFieldName(string $fieldName): self
    {
        $this->initialized['fieldName'] = true;
        $this->fieldName = $fieldName;
        return $this;
    }
    /**
     * The ID of the custom field.
     *
     * @return int
     */
    public function getCustomFieldId(): int
    {
        return $this->customFieldId;
    }
    /**
     * The ID of the custom field.
     *
     * @param int $customFieldId
     *
     * @return self
     */
    public function setCustomFieldId(int $customFieldId): self
    {
        $this->initialized['customFieldId'] = true;
        $this->customFieldId = $customFieldId;
        return $this;
    }
    /**
     * Count of the issues where the custom field contains the version.
     *
     * @return int
     */
    public function getIssueCountWithVersionInCustomField(): int
    {
        return $this->issueCountWithVersionInCustomField;
    }
    /**
     * Count of the issues where the custom field contains the version.
     *
     * @param int $issueCountWithVersionInCustomField
     *
     * @return self
     */
    public function setIssueCountWithVersionInCustomField(int $issueCountWithVersionInCustomField): self
    {
        $this->initialized['issueCountWithVersionInCustomField'] = true;
        $this->issueCountWithVersionInCustomField = $issueCountWithVersionInCustomField;
        return $this;
    }
}
