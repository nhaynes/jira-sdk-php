<?php

namespace JiraSdk\Model;

class WorkflowsWithTransitionRulesDetails
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
     * The list of workflows with transition rules to delete.
     *
     * @var WorkflowTransitionRulesDetails[]
     */
    protected $workflows;
    /**
     * The list of workflows with transition rules to delete.
     *
     * @return WorkflowTransitionRulesDetails[]
     */
    public function getWorkflows(): array
    {
        return $this->workflows;
    }
    /**
     * The list of workflows with transition rules to delete.
     *
     * @param WorkflowTransitionRulesDetails[] $workflows
     *
     * @return self
     */
    public function setWorkflows(array $workflows): self
    {
        $this->initialized['workflows'] = true;
        $this->workflows = $workflows;
        return $this;
    }
}
