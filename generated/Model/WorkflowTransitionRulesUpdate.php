<?php

namespace JiraSdk\Model;

class WorkflowTransitionRulesUpdate
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
     * The list of workflows with transition rules to update.
     *
     * @var WorkflowTransitionRules[]
     */
    protected $workflows;
    /**
     * The list of workflows with transition rules to update.
     *
     * @return WorkflowTransitionRules[]
     */
    public function getWorkflows(): array
    {
        return $this->workflows;
    }
    /**
     * The list of workflows with transition rules to update.
     *
     * @param WorkflowTransitionRules[] $workflows
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
