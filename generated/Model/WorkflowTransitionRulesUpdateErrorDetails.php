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

class WorkflowTransitionRulesUpdateErrorDetails
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
     * A list of transition rule update errors, indexed by the transition rule ID. Any transition rule that appears here wasn't updated.
     *
     * @var string[][]
     */
    protected $ruleUpdateErrors;
    /**
     * The list of errors that specify why the workflow update failed. The workflow was not updated if the list contains any entries.
     *
     * @var string[]
     */
    protected $updateErrors;

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
     * A list of transition rule update errors, indexed by the transition rule ID. Any transition rule that appears here wasn't updated.
     *
     * @return string[][]
     */
    public function getRuleUpdateErrors(): iterable
    {
        return $this->ruleUpdateErrors;
    }

    /**
     * A list of transition rule update errors, indexed by the transition rule ID. Any transition rule that appears here wasn't updated.
     *
     * @param string[][] $ruleUpdateErrors
     */
    public function setRuleUpdateErrors(iterable $ruleUpdateErrors): self
    {
        $this->initialized['ruleUpdateErrors'] = true;
        $this->ruleUpdateErrors = $ruleUpdateErrors;

        return $this;
    }

    /**
     * The list of errors that specify why the workflow update failed. The workflow was not updated if the list contains any entries.
     *
     * @return string[]
     */
    public function getUpdateErrors(): array
    {
        return $this->updateErrors;
    }

    /**
     * The list of errors that specify why the workflow update failed. The workflow was not updated if the list contains any entries.
     *
     * @param string[] $updateErrors
     */
    public function setUpdateErrors(array $updateErrors): self
    {
        $this->initialized['updateErrors'] = true;
        $this->updateErrors = $updateErrors;

        return $this;
    }
}
