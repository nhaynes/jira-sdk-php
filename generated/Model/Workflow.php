<?php

namespace JiraSdk\Model;

class Workflow
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
     * Properties that identify a published workflow.
     *
     * @var PublishedWorkflowId
     */
    protected $id;
    /**
     * The description of the workflow.
     *
     * @var string
     */
    protected $description;
    /**
     * The transitions of the workflow.
     *
     * @var Transition[]
     */
    protected $transitions;
    /**
     * The statuses of the workflow.
     *
     * @var WorkflowStatus[]
     */
    protected $statuses;
    /**
     * Whether this is the default workflow.
     *
     * @var bool
     */
    protected $isDefault;
    /**
     * The workflow schemes the workflow is assigned to.
     *
     * @var WorkflowSchemeIdName[]
     */
    protected $schemes;
    /**
     * The projects the workflow is assigned to, through workflow schemes.
     *
     * @var ProjectDetails[]
     */
    protected $projects;
    /**
     * Whether the workflow has a draft version.
     *
     * @var bool
     */
    protected $hasDraftWorkflow;
    /**
     * Operations allowed on a workflow
     *
     * @var WorkflowOperations
     */
    protected $operations;
    /**
     * The creation date of the workflow.
     *
     * @var \DateTime
     */
    protected $created;
    /**
     * The last edited date of the workflow.
     *
     * @var \DateTime
     */
    protected $updated;
    /**
     * Properties that identify a published workflow.
     *
     * @return PublishedWorkflowId
     */
    public function getId(): PublishedWorkflowId
    {
        return $this->id;
    }
    /**
     * Properties that identify a published workflow.
     *
     * @param PublishedWorkflowId $id
     *
     * @return self
     */
    public function setId(PublishedWorkflowId $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The description of the workflow.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the workflow.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * The transitions of the workflow.
     *
     * @return Transition[]
     */
    public function getTransitions(): array
    {
        return $this->transitions;
    }
    /**
     * The transitions of the workflow.
     *
     * @param Transition[] $transitions
     *
     * @return self
     */
    public function setTransitions(array $transitions): self
    {
        $this->initialized['transitions'] = true;
        $this->transitions = $transitions;
        return $this;
    }
    /**
     * The statuses of the workflow.
     *
     * @return WorkflowStatus[]
     */
    public function getStatuses(): array
    {
        return $this->statuses;
    }
    /**
     * The statuses of the workflow.
     *
     * @param WorkflowStatus[] $statuses
     *
     * @return self
     */
    public function setStatuses(array $statuses): self
    {
        $this->initialized['statuses'] = true;
        $this->statuses = $statuses;
        return $this;
    }
    /**
     * Whether this is the default workflow.
     *
     * @return bool
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }
    /**
     * Whether this is the default workflow.
     *
     * @param bool $isDefault
     *
     * @return self
     */
    public function setIsDefault(bool $isDefault): self
    {
        $this->initialized['isDefault'] = true;
        $this->isDefault = $isDefault;
        return $this;
    }
    /**
     * The workflow schemes the workflow is assigned to.
     *
     * @return WorkflowSchemeIdName[]
     */
    public function getSchemes(): array
    {
        return $this->schemes;
    }
    /**
     * The workflow schemes the workflow is assigned to.
     *
     * @param WorkflowSchemeIdName[] $schemes
     *
     * @return self
     */
    public function setSchemes(array $schemes): self
    {
        $this->initialized['schemes'] = true;
        $this->schemes = $schemes;
        return $this;
    }
    /**
     * The projects the workflow is assigned to, through workflow schemes.
     *
     * @return ProjectDetails[]
     */
    public function getProjects(): array
    {
        return $this->projects;
    }
    /**
     * The projects the workflow is assigned to, through workflow schemes.
     *
     * @param ProjectDetails[] $projects
     *
     * @return self
     */
    public function setProjects(array $projects): self
    {
        $this->initialized['projects'] = true;
        $this->projects = $projects;
        return $this;
    }
    /**
     * Whether the workflow has a draft version.
     *
     * @return bool
     */
    public function getHasDraftWorkflow(): bool
    {
        return $this->hasDraftWorkflow;
    }
    /**
     * Whether the workflow has a draft version.
     *
     * @param bool $hasDraftWorkflow
     *
     * @return self
     */
    public function setHasDraftWorkflow(bool $hasDraftWorkflow): self
    {
        $this->initialized['hasDraftWorkflow'] = true;
        $this->hasDraftWorkflow = $hasDraftWorkflow;
        return $this;
    }
    /**
     * Operations allowed on a workflow
     *
     * @return WorkflowOperations
     */
    public function getOperations(): WorkflowOperations
    {
        return $this->operations;
    }
    /**
     * Operations allowed on a workflow
     *
     * @param WorkflowOperations $operations
     *
     * @return self
     */
    public function setOperations(WorkflowOperations $operations): self
    {
        $this->initialized['operations'] = true;
        $this->operations = $operations;
        return $this;
    }
    /**
     * The creation date of the workflow.
     *
     * @return \DateTime
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }
    /**
     * The creation date of the workflow.
     *
     * @param \DateTime $created
     *
     * @return self
     */
    public function setCreated(\DateTime $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;
        return $this;
    }
    /**
     * The last edited date of the workflow.
     *
     * @return \DateTime
     */
    public function getUpdated(): \DateTime
    {
        return $this->updated;
    }
    /**
     * The last edited date of the workflow.
     *
     * @param \DateTime $updated
     *
     * @return self
     */
    public function setUpdated(\DateTime $updated): self
    {
        $this->initialized['updated'] = true;
        $this->updated = $updated;
        return $this;
    }
}
