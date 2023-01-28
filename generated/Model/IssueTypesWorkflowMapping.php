<?php

namespace JiraSdk\Model;

class IssueTypesWorkflowMapping
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
     * The name of the workflow. Optional if updating the workflow-issue types mapping.
     *
     * @var string
     */
    protected $workflow;
    /**
     * The list of issue type IDs.
     *
     * @var string[]
     */
    protected $issueTypes;
    /**
     * Whether the workflow is the default workflow for the workflow scheme.
     *
     * @var bool
     */
    protected $defaultMapping;
    /**
     * Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new workflow-issue types mapping. Defaults to `false`.
     *
     * @var bool
     */
    protected $updateDraftIfNeeded;
    /**
     * The name of the workflow. Optional if updating the workflow-issue types mapping.
     *
     * @return string
     */
    public function getWorkflow(): string
    {
        return $this->workflow;
    }
    /**
     * The name of the workflow. Optional if updating the workflow-issue types mapping.
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
     * The list of issue type IDs.
     *
     * @return string[]
     */
    public function getIssueTypes(): array
    {
        return $this->issueTypes;
    }
    /**
     * The list of issue type IDs.
     *
     * @param string[] $issueTypes
     *
     * @return self
     */
    public function setIssueTypes(array $issueTypes): self
    {
        $this->initialized['issueTypes'] = true;
        $this->issueTypes = $issueTypes;
        return $this;
    }
    /**
     * Whether the workflow is the default workflow for the workflow scheme.
     *
     * @return bool
     */
    public function getDefaultMapping(): bool
    {
        return $this->defaultMapping;
    }
    /**
     * Whether the workflow is the default workflow for the workflow scheme.
     *
     * @param bool $defaultMapping
     *
     * @return self
     */
    public function setDefaultMapping(bool $defaultMapping): self
    {
        $this->initialized['defaultMapping'] = true;
        $this->defaultMapping = $defaultMapping;
        return $this;
    }
    /**
     * Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new workflow-issue types mapping. Defaults to `false`.
     *
     * @return bool
     */
    public function getUpdateDraftIfNeeded(): bool
    {
        return $this->updateDraftIfNeeded;
    }
    /**
     * Whether a draft workflow scheme is created or updated when updating an active workflow scheme. The draft is updated with the new workflow-issue types mapping. Defaults to `false`.
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
