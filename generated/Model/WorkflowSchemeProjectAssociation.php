<?php

namespace JiraSdk\Model;

class WorkflowSchemeProjectAssociation
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
     * The ID of the workflow scheme. If the workflow scheme ID is `null`, the operation assigns the default workflow scheme.
     *
     * @var string
     */
    protected $workflowSchemeId;
    /**
     * The ID of the project.
     *
     * @var string
     */
    protected $projectId;
    /**
     * The ID of the workflow scheme. If the workflow scheme ID is `null`, the operation assigns the default workflow scheme.
     *
     * @return string
     */
    public function getWorkflowSchemeId(): string
    {
        return $this->workflowSchemeId;
    }
    /**
     * The ID of the workflow scheme. If the workflow scheme ID is `null`, the operation assigns the default workflow scheme.
     *
     * @param string $workflowSchemeId
     *
     * @return self
     */
    public function setWorkflowSchemeId(string $workflowSchemeId): self
    {
        $this->initialized['workflowSchemeId'] = true;
        $this->workflowSchemeId = $workflowSchemeId;
        return $this;
    }
    /**
     * The ID of the project.
     *
     * @return string
     */
    public function getProjectId(): string
    {
        return $this->projectId;
    }
    /**
     * The ID of the project.
     *
     * @param string $projectId
     *
     * @return self
     */
    public function setProjectId(string $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;
        return $this;
    }
}
