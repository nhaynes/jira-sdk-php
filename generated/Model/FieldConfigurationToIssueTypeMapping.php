<?php

namespace JiraSdk\Model;

class FieldConfigurationToIssueTypeMapping
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
     * The ID of the issue type or *default*. When set to *default* this field configuration issue type item applies to all issue types without a field configuration. An issue type can be included only once in a request.
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
    /**
     * The ID of the issue type or *default*. When set to *default* this field configuration issue type item applies to all issue types without a field configuration. An issue type can be included only once in a request.
     *
     * @return string
     */
    public function getIssueTypeId(): string
    {
        return $this->issueTypeId;
    }
    /**
     * The ID of the issue type or *default*. When set to *default* this field configuration issue type item applies to all issue types without a field configuration. An issue type can be included only once in a request.
     *
     * @param string $issueTypeId
     *
     * @return self
     */
    public function setIssueTypeId(string $issueTypeId): self
    {
        $this->initialized['issueTypeId'] = true;
        $this->issueTypeId = $issueTypeId;
        return $this;
    }
    /**
     * The ID of the field configuration.
     *
     * @return string
     */
    public function getFieldConfigurationId(): string
    {
        return $this->fieldConfigurationId;
    }
    /**
     * The ID of the field configuration.
     *
     * @param string $fieldConfigurationId
     *
     * @return self
     */
    public function setFieldConfigurationId(string $fieldConfigurationId): self
    {
        $this->initialized['fieldConfigurationId'] = true;
        $this->fieldConfigurationId = $fieldConfigurationId;
        return $this;
    }
}
