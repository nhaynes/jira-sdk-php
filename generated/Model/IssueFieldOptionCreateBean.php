<?php

namespace JiraSdk\Model;

class IssueFieldOptionCreateBean extends \ArrayObject
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
     * The option's name, which is displayed in Jira.
     *
     * @var string
     */
    protected $value;
    /**
     * The properties of the option as arbitrary key-value pairs. These properties can be searched using JQL, if the extractions (see https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/) are defined in the descriptor for the issue field module.
     *
     * @var mixed[]
     */
    protected $properties;
    /**
     * Details of the projects the option is available in.
     *
     * @var IssueFieldOptionConfiguration
     */
    protected $config;
    /**
     * The option's name, which is displayed in Jira.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
    /**
     * The option's name, which is displayed in Jira.
     *
     * @param string $value
     *
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
    /**
     * The properties of the option as arbitrary key-value pairs. These properties can be searched using JQL, if the extractions (see https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/) are defined in the descriptor for the issue field module.
     *
     * @return mixed[]
     */
    public function getProperties(): iterable
    {
        return $this->properties;
    }
    /**
     * The properties of the option as arbitrary key-value pairs. These properties can be searched using JQL, if the extractions (see https://developer.atlassian.com/cloud/jira/platform/modules/issue-field-option-property-index/) are defined in the descriptor for the issue field module.
     *
     * @param mixed[] $properties
     *
     * @return self
     */
    public function setProperties(iterable $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;
        return $this;
    }
    /**
     * Details of the projects the option is available in.
     *
     * @return IssueFieldOptionConfiguration
     */
    public function getConfig(): IssueFieldOptionConfiguration
    {
        return $this->config;
    }
    /**
     * Details of the projects the option is available in.
     *
     * @param IssueFieldOptionConfiguration $config
     *
     * @return self
     */
    public function setConfig(IssueFieldOptionConfiguration $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;
        return $this;
    }
}
