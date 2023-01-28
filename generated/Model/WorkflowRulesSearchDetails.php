<?php

namespace JiraSdk\Model;

class WorkflowRulesSearchDetails extends \ArrayObject
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
     * The workflow ID.
     *
     * @var string
     */
    protected $workflowEntityId;
    /**
     * List of workflow rule IDs that do not belong to the workflow or can not be found.
     *
     * @var string[]
     */
    protected $invalidRules;
    /**
     * List of valid workflow transition rules.
     *
     * @var WorkflowTransitionRules[]
     */
    protected $validRules;
    /**
     * The workflow ID.
     *
     * @return string
     */
    public function getWorkflowEntityId(): string
    {
        return $this->workflowEntityId;
    }
    /**
     * The workflow ID.
     *
     * @param string $workflowEntityId
     *
     * @return self
     */
    public function setWorkflowEntityId(string $workflowEntityId): self
    {
        $this->initialized['workflowEntityId'] = true;
        $this->workflowEntityId = $workflowEntityId;
        return $this;
    }
    /**
     * List of workflow rule IDs that do not belong to the workflow or can not be found.
     *
     * @return string[]
     */
    public function getInvalidRules(): array
    {
        return $this->invalidRules;
    }
    /**
     * List of workflow rule IDs that do not belong to the workflow or can not be found.
     *
     * @param string[] $invalidRules
     *
     * @return self
     */
    public function setInvalidRules(array $invalidRules): self
    {
        $this->initialized['invalidRules'] = true;
        $this->invalidRules = $invalidRules;
        return $this;
    }
    /**
     * List of valid workflow transition rules.
     *
     * @return WorkflowTransitionRules[]
     */
    public function getValidRules(): array
    {
        return $this->validRules;
    }
    /**
     * List of valid workflow transition rules.
     *
     * @param WorkflowTransitionRules[] $validRules
     *
     * @return self
     */
    public function setValidRules(array $validRules): self
    {
        $this->initialized['validRules'] = true;
        $this->validRules = $validRules;
        return $this;
    }
}
