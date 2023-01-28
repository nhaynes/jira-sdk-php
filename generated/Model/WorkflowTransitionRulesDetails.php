<?php

namespace JiraSdk\Model;

class WorkflowTransitionRulesDetails
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
    /**
     * Properties that identify a workflow.
     *
     * @return WorkflowId
     */
    public function getWorkflowId(): WorkflowId
    {
        return $this->workflowId;
    }
    /**
     * Properties that identify a workflow.
     *
     * @param WorkflowId $workflowId
     *
     * @return self
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
     *
     * @return self
     */
    public function setWorkflowRuleIds(array $workflowRuleIds): self
    {
        $this->initialized['workflowRuleIds'] = true;
        $this->workflowRuleIds = $workflowRuleIds;
        return $this;
    }
}
