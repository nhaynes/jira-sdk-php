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

class CreateWorkflowCondition
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The compound condition operator.
     *
     * @var string
     */
    protected $operator;
    /**
     * The list of workflow conditions.
     *
     * @var CreateWorkflowCondition[]
     */
    protected $conditions;
    /**
     * The type of the transition rule.
     *
     * @var string
     */
    protected $type;
    /**
     * EXPERIMENTAL. The configuration of the transition rule.
     *
     * @var mixed[]
     */
    protected $configuration;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The compound condition operator.
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * The compound condition operator.
     */
    public function setOperator(string $operator): self
    {
        $this->initialized['operator'] = true;
        $this->operator = $operator;

        return $this;
    }

    /**
     * The list of workflow conditions.
     *
     * @return CreateWorkflowCondition[]
     */
    public function getConditions(): array
    {
        return $this->conditions;
    }

    /**
     * The list of workflow conditions.
     *
     * @param CreateWorkflowCondition[] $conditions
     */
    public function setConditions(array $conditions): self
    {
        $this->initialized['conditions'] = true;
        $this->conditions = $conditions;

        return $this;
    }

    /**
     * The type of the transition rule.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of the transition rule.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * EXPERIMENTAL. The configuration of the transition rule.
     *
     * @return mixed[]
     */
    public function getConfiguration(): iterable
    {
        return $this->configuration;
    }

    /**
     * EXPERIMENTAL. The configuration of the transition rule.
     *
     * @param mixed[] $configuration
     */
    public function setConfiguration(iterable $configuration): self
    {
        $this->initialized['configuration'] = true;
        $this->configuration = $configuration;

        return $this;
    }
}
