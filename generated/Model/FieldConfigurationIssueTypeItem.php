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

class FieldConfigurationIssueTypeItem
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the field configuration scheme.
     *
     * @var string
     */
    protected $fieldConfigurationSchemeId;
    /**
     * The ID of the issue type or *default*. When set to *default* this field configuration issue type item applies to all issue types without a field configuration.
     *
     * @var string
     */
    protected $issueTypeId;
    /**
     * The ID of the field configuration.
     *
     * @var string
     */
    protected $fieldConfigurationId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the field configuration scheme.
     */
    public function getFieldConfigurationSchemeId(): string
    {
        return $this->fieldConfigurationSchemeId;
    }

    /**
     * The ID of the field configuration scheme.
     */
    public function setFieldConfigurationSchemeId(string $fieldConfigurationSchemeId): self
    {
        $this->initialized['fieldConfigurationSchemeId'] = true;
        $this->fieldConfigurationSchemeId = $fieldConfigurationSchemeId;

        return $this;
    }

    /**
     * The ID of the issue type or *default*. When set to *default* this field configuration issue type item applies to all issue types without a field configuration.
     */
    public function getIssueTypeId(): string
    {
        return $this->issueTypeId;
    }

    /**
     * The ID of the issue type or *default*. When set to *default* this field configuration issue type item applies to all issue types without a field configuration.
     */
    public function setIssueTypeId(string $issueTypeId): self
    {
        $this->initialized['issueTypeId'] = true;
        $this->issueTypeId = $issueTypeId;

        return $this;
    }

    /**
     * The ID of the field configuration.
     */
    public function getFieldConfigurationId(): string
    {
        return $this->fieldConfigurationId;
    }

    /**
     * The ID of the field configuration.
     */
    public function setFieldConfigurationId(string $fieldConfigurationId): self
    {
        $this->initialized['fieldConfigurationId'] = true;
        $this->fieldConfigurationId = $fieldConfigurationId;

        return $this;
    }
}
