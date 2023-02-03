<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Model;

class Workflow
{
    /**
     * @var array
     */
    protected $initialized = [];
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
     * Operations allowed on a workflow.
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Properties that identify a published workflow.
     */
    public function getId(): PublishedWorkflowId
    {
        return $this->id;
    }

    /**
     * Properties that identify a published workflow.
     */
    public function setId(PublishedWorkflowId $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The description of the workflow.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the workflow.
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
     */
    public function setStatuses(array $statuses): self
    {
        $this->initialized['statuses'] = true;
        $this->statuses = $statuses;

        return $this;
    }

    /**
     * Whether this is the default workflow.
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }

    /**
     * Whether this is the default workflow.
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
     */
    public function setProjects(array $projects): self
    {
        $this->initialized['projects'] = true;
        $this->projects = $projects;

        return $this;
    }

    /**
     * Whether the workflow has a draft version.
     */
    public function getHasDraftWorkflow(): bool
    {
        return $this->hasDraftWorkflow;
    }

    /**
     * Whether the workflow has a draft version.
     */
    public function setHasDraftWorkflow(bool $hasDraftWorkflow): self
    {
        $this->initialized['hasDraftWorkflow'] = true;
        $this->hasDraftWorkflow = $hasDraftWorkflow;

        return $this;
    }

    /**
     * Operations allowed on a workflow.
     */
    public function getOperations(): WorkflowOperations
    {
        return $this->operations;
    }

    /**
     * Operations allowed on a workflow.
     */
    public function setOperations(WorkflowOperations $operations): self
    {
        $this->initialized['operations'] = true;
        $this->operations = $operations;

        return $this;
    }

    /**
     * The creation date of the workflow.
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * The creation date of the workflow.
     */
    public function setCreated(\DateTime $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    /**
     * The last edited date of the workflow.
     */
    public function getUpdated(): \DateTime
    {
        return $this->updated;
    }

    /**
     * The last edited date of the workflow.
     */
    public function setUpdated(\DateTime $updated): self
    {
        $this->initialized['updated'] = true;
        $this->updated = $updated;

        return $this;
    }
}
