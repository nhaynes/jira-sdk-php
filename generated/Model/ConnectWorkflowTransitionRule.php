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

class ConnectWorkflowTransitionRule
{
    /**
     * @var array
     */
    protected $initialized = [];
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
     * @var ConnectWorkflowTransitionRuleTransition
     */
    protected $transition;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the transition rule.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the transition rule.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The key of the rule, as defined in the Connect app descriptor.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the rule, as defined in the Connect app descriptor.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * A rule configuration.
     */
    public function getConfiguration(): RuleConfiguration
    {
        return $this->configuration;
    }

    /**
     * A rule configuration.
     */
    public function setConfiguration(RuleConfiguration $configuration): self
    {
        $this->initialized['configuration'] = true;
        $this->configuration = $configuration;

        return $this;
    }

    public function getTransition(): ConnectWorkflowTransitionRuleTransition
    {
        return $this->transition;
    }

    public function setTransition(ConnectWorkflowTransitionRuleTransition $transition): self
    {
        $this->initialized['transition'] = true;
        $this->transition = $transition;

        return $this;
    }
}
