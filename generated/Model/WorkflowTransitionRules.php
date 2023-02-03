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

class WorkflowTransitionRules
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Properties that identify a workflow.
     *
     * @var WorkflowId
     */
    protected $workflowId;
    /**
     * The list of post functions within the workflow.
     *
     * @var ConnectWorkflowTransitionRule[]
     */
    protected $postFunctions;
    /**
     * The list of conditions within the workflow.
     *
     * @var ConnectWorkflowTransitionRule[]
     */
    protected $conditions;
    /**
     * The list of validators within the workflow.
     *
     * @var ConnectWorkflowTransitionRule[]
     */
    protected $validators;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Properties that identify a workflow.
     */
    public function getWorkflowId(): WorkflowId
    {
        return $this->workflowId;
    }

    /**
     * Properties that identify a workflow.
     */
    public function setWorkflowId(WorkflowId $workflowId): self
    {
        $this->initialized['workflowId'] = true;
        $this->workflowId = $workflowId;

        return $this;
    }

    /**
     * The list of post functions within the workflow.
     *
     * @return ConnectWorkflowTransitionRule[]
     */
    public function getPostFunctions(): array
    {
        return $this->postFunctions;
    }

    /**
     * The list of post functions within the workflow.
     *
     * @param ConnectWorkflowTransitionRule[] $postFunctions
     */
    public function setPostFunctions(array $postFunctions): self
    {
        $this->initialized['postFunctions'] = true;
        $this->postFunctions = $postFunctions;

        return $this;
    }

    /**
     * The list of conditions within the workflow.
     *
     * @return ConnectWorkflowTransitionRule[]
     */
    public function getConditions(): array
    {
        return $this->conditions;
    }

    /**
     * The list of conditions within the workflow.
     *
     * @param ConnectWorkflowTransitionRule[] $conditions
     */
    public function setConditions(array $conditions): self
    {
        $this->initialized['conditions'] = true;
        $this->conditions = $conditions;

        return $this;
    }

    /**
     * The list of validators within the workflow.
     *
     * @return ConnectWorkflowTransitionRule[]
     */
    public function getValidators(): array
    {
        return $this->validators;
    }

    /**
     * The list of validators within the workflow.
     *
     * @param ConnectWorkflowTransitionRule[] $validators
     */
    public function setValidators(array $validators): self
    {
        $this->initialized['validators'] = true;
        $this->validators = $validators;

        return $this;
    }
}
