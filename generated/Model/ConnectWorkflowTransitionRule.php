<?php

namespace JiraSdk\Model;

class ConnectWorkflowTransitionRule
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
     * The ID of the transition rule.
     *
     * @var string
     */
    protected $id;
    /**
     * The key of the rule, as defined in the Connect app descriptor.
     *
     * @var string
     */
    protected $key;
    /**
     * A rule configuration.
     *
     * @var RuleConfiguration
     */
    protected $configuration;
    /**
     *
     *
     * @var ConnectWorkflowTransitionRuleTransition
     */
    protected $transition;
    /**
     * The ID of the transition rule.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the transition rule.
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The key of the rule, as defined in the Connect app descriptor.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The key of the rule, as defined in the Connect app descriptor.
     *
     * @param string $key
     *
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * A rule configuration.
     *
     * @return RuleConfiguration
     */
    public function getConfiguration(): RuleConfiguration
    {
        return $this->configuration;
    }
    /**
     * A rule configuration.
     *
     * @param RuleConfiguration $configuration
     *
     * @return self
     */
    public function setConfiguration(RuleConfiguration $configuration): self
    {
        $this->initialized['configuration'] = true;
        $this->configuration = $configuration;
        return $this;
    }
    /**
     *
     *
     * @return ConnectWorkflowTransitionRuleTransition
     */
    public function getTransition(): ConnectWorkflowTransitionRuleTransition
    {
        return $this->transition;
    }
    /**
     *
     *
     * @param ConnectWorkflowTransitionRuleTransition $transition
     *
     * @return self
     */
    public function setTransition(ConnectWorkflowTransitionRuleTransition $transition): self
    {
        $this->initialized['transition'] = true;
        $this->transition = $transition;
        return $this;
    }
}
