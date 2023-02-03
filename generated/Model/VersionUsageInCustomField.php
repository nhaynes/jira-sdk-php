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

class VersionUsageInCustomField
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the custom field.
     */
    public function getFieldName(): string
    {
        return $this->fieldName;
    }

    /**
     * The name of the custom field.
     */
    public function setFieldName(string $fieldName): self
    {
        $this->initialized['fieldName'] = true;
        $this->fieldName = $fieldName;

        return $this;
    }

    /**
     * The ID of the custom field.
     */
    public function getCustomFieldId(): int
    {
        return $this->customFieldId;
    }

    /**
     * The ID of the custom field.
     */
    public function setCustomFieldId(int $customFieldId): self
    {
        $this->initialized['customFieldId'] = true;
        $this->customFieldId = $customFieldId;

        return $this;
    }

    /**
     * Count of the issues where the custom field contains the version.
     */
    public function getIssueCountWithVersionInCustomField(): int
    {
        return $this->issueCountWithVersionInCustomField;
    }

    /**
     * Count of the issues where the custom field contains the version.
     */
    public function setIssueCountWithVersionInCustomField(int $issueCountWithVersionInCustomField): self
    {
        $this->initialized['issueCountWithVersionInCustomField'] = true;
        $this->issueCountWithVersionInCustomField = $issueCountWithVersionInCustomField;

        return $this;
    }
}
