<?php

namespace JiraSdk\Model;

class WorkflowRulesSearch extends \ArrayObject
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
     * The list of workflow rule IDs.
     *
     * @var string[]
     */
    protected $ruleIds;
    /**
     * Use expand to include additional information in the response. This parameter accepts `transition` which, for each rule, returns information about the transition the rule is assigned to.
     *
     * @var string
     */
    protected $expand;
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
     * The list of workflow rule IDs.
     *
     * @return string[]
     */
    public function getRuleIds(): array
    {
        return $this->ruleIds;
    }
    /**
     * The list of workflow rule IDs.
     *
     * @param string[] $ruleIds
     *
     * @return self
     */
    public function setRuleIds(array $ruleIds): self
    {
        $this->initialized['ruleIds'] = true;
        $this->ruleIds = $ruleIds;
        return $this;
    }
    /**
     * Use expand to include additional information in the response. This parameter accepts `transition` which, for each rule, returns information about the transition the rule is assigned to.
     *
     * @return string
     */
    public function getExpand(): string
    {
        return $this->expand;
    }
    /**
     * Use expand to include additional information in the response. This parameter accepts `transition` which, for each rule, returns information about the transition the rule is assigned to.
     *
     * @param string $expand
     *
     * @return self
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;
        return $this;
    }
}
