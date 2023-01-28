<?php

namespace JiraSdk\Model;

class RuleConfiguration
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
     * Configuration of the rule, as it is stored by the Connect app on the rule configuration page.
     *
     * @var string
     */
    protected $value;
    /**
     * EXPERIMENTAL: Whether the rule is disabled.
     *
     * @var bool
     */
    protected $disabled = false;
    /**
     * EXPERIMENTAL: A tag used to filter rules in [Get workflow transition rule configurations](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-rules/#api-rest-api-3-workflow-rule-config-get).
     *
     * @var string
     */
    protected $tag;
    /**
     * Configuration of the rule, as it is stored by the Connect app on the rule configuration page.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
    /**
     * Configuration of the rule, as it is stored by the Connect app on the rule configuration page.
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
     * EXPERIMENTAL: Whether the rule is disabled.
     *
     * @return bool
     */
    public function getDisabled(): bool
    {
        return $this->disabled;
    }
    /**
     * EXPERIMENTAL: Whether the rule is disabled.
     *
     * @param bool $disabled
     *
     * @return self
     */
    public function setDisabled(bool $disabled): self
    {
        $this->initialized['disabled'] = true;
        $this->disabled = $disabled;
        return $this;
    }
    /**
     * EXPERIMENTAL: A tag used to filter rules in [Get workflow transition rule configurations](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-rules/#api-rest-api-3-workflow-rule-config-get).
     *
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }
    /**
     * EXPERIMENTAL: A tag used to filter rules in [Get workflow transition rule configurations](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-rules/#api-rest-api-3-workflow-rule-config-get).
     *
     * @param string $tag
     *
     * @return self
     */
    public function setTag(string $tag): self
    {
        $this->initialized['tag'] = true;
        $this->tag = $tag;
        return $this;
    }
}
