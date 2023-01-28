<?php

namespace JiraSdk\Model;

class WorkflowSchemeAssociations
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
     * The list of projects that use the workflow scheme.
     *
     * @var string[]
     */
    protected $projectIds;
    /**
     * The workflow scheme.
     *
     * @var WorkflowSchemeAssociationsWorkflowScheme
     */
    protected $workflowScheme;
    /**
     * The list of projects that use the workflow scheme.
     *
     * @return string[]
     */
    public function getProjectIds(): array
    {
        return $this->projectIds;
    }
    /**
     * The list of projects that use the workflow scheme.
     *
     * @param string[] $projectIds
     *
     * @return self
     */
    public function setProjectIds(array $projectIds): self
    {
        $this->initialized['projectIds'] = true;
        $this->projectIds = $projectIds;
        return $this;
    }
    /**
     * The workflow scheme.
     *
     * @return WorkflowSchemeAssociationsWorkflowScheme
     */
    public function getWorkflowScheme(): WorkflowSchemeAssociationsWorkflowScheme
    {
        return $this->workflowScheme;
    }
    /**
     * The workflow scheme.
     *
     * @param WorkflowSchemeAssociationsWorkflowScheme $workflowScheme
     *
     * @return self
     */
    public function setWorkflowScheme(WorkflowSchemeAssociationsWorkflowScheme $workflowScheme): self
    {
        $this->initialized['workflowScheme'] = true;
        $this->workflowScheme = $workflowScheme;
        return $this;
    }
}
