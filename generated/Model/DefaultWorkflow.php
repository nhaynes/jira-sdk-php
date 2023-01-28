<?php

namespace JiraSdk\Model;

class DefaultWorkflow
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
     * The name of the workflow to set as the default workflow.
     *
     * @var string
     */
    protected $workflow;
    /**
     * Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new default workflow. Defaults to `false`.
     *
     * @var bool
     */
    protected $updateDraftIfNeeded;
    /**
     * The name of the workflow to set as the default workflow.
     *
     * @return string
     */
    public function getWorkflow(): string
    {
        return $this->workflow;
    }
    /**
     * The name of the workflow to set as the default workflow.
     *
     * @param string $workflow
     *
     * @return self
     */
    public function setWorkflow(string $workflow): self
    {
        $this->initialized['workflow'] = true;
        $this->workflow = $workflow;
        return $this;
    }
    /**
     * Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new default workflow. Defaults to `false`.
     *
     * @return bool
     */
    public function getUpdateDraftIfNeeded(): bool
    {
        return $this->updateDraftIfNeeded;
    }
    /**
     * Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new default workflow. Defaults to `false`.
     *
     * @param bool $updateDraftIfNeeded
     *
     * @return self
     */
    public function setUpdateDraftIfNeeded(bool $updateDraftIfNeeded): self
    {
        $this->initialized['updateDraftIfNeeded'] = true;
        $this->updateDraftIfNeeded = $updateDraftIfNeeded;
        return $this;
    }
}
