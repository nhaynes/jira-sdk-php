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

class WorkflowTransitionRulesDetails
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
     * The list of connect workflow rule IDs.
     *
     * @var string[]
     */
    protected $workflowRuleIds;

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
     * The list of connect workflow rule IDs.
     *
     * @return string[]
     */
    public function getWorkflowRuleIds(): array
    {
        return $this->workflowRuleIds;
    }

    /**
     * The list of connect workflow rule IDs.
     *
     * @param string[] $workflowRuleIds
     */
    public function setWorkflowRuleIds(array $workflowRuleIds): self
    {
        $this->initialized['workflowRuleIds'] = true;
        $this->workflowRuleIds = $workflowRuleIds;

        return $this;
    }
}
