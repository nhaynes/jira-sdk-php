<?php

namespace JiraSdk\Model;

class WorkflowTransitionRulesUpdateErrors
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
     * A list of workflows.
     *
     * @var WorkflowTransitionRulesUpdateErrorDetails[]
     */
    protected $updateResults;
    /**
     * A list of workflows.
     *
     * @return WorkflowTransitionRulesUpdateErrorDetails[]
     */
    public function getUpdateResults(): array
    {
        return $this->updateResults;
    }
    /**
     * A list of workflows.
     *
     * @param WorkflowTransitionRulesUpdateErrorDetails[] $updateResults
     *
     * @return self
     */
    public function setUpdateResults(array $updateResults): self
    {
        $this->initialized['updateResults'] = true;
        $this->updateResults = $updateResults;
        return $this;
    }
}
