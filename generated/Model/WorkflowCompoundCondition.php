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

class WorkflowCompoundCondition extends \ArrayObject
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
     * @var mixed[]
     */
    protected $conditions;
    /**
     * @var string
     */
    protected $nodeType;

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
     * @return mixed[]
     */
    public function getConditions(): array
    {
        return $this->conditions;
    }

    /**
     * The list of workflow conditions.
     *
     * @param mixed[] $conditions
     */
    public function setConditions(array $conditions): self
    {
        $this->initialized['conditions'] = true;
        $this->conditions = $conditions;

        return $this;
    }

    public function getNodeType(): string
    {
        return $this->nodeType;
    }

    public function setNodeType(string $nodeType): self
    {
        $this->initialized['nodeType'] = true;
        $this->nodeType = $nodeType;

        return $this;
    }
}
