<?php

namespace JiraSdk\Model;

class WorkflowSchemeAssociationsWorkflowScheme extends \ArrayObject
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
     * The ID of the workflow scheme.
     *
     * @var int
     */
    protected $id;
    /**
     * The name of the workflow scheme. The name must be unique. The maximum length is 255 characters. Required when creating a workflow scheme.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the workflow scheme.
     *
     * @var string
     */
    protected $description;
    /**
     * The name of the default workflow for the workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*.
     *
     * @var string
     */
    protected $defaultWorkflow;
    /**
     * The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme.
     *
     * @var string[]
     */
    protected $issueTypeMappings;
    /**
     * For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira.
     *
     * @var string
     */
    protected $originalDefaultWorkflow;
    /**
     * For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme.
     *
     * @var string[]
     */
    protected $originalIssueTypeMappings;
    /**
     * Whether the workflow scheme is a draft or not.
     *
     * @var bool
     */
    protected $draft;
    /**
     * The user that last modified the draft workflow scheme. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows.
     *
     * @var WorkflowSchemeLastModifiedUser
     */
    protected $lastModifiedUser;
    /**
     * The date-time that the draft workflow scheme was last modified. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows.
     *
     * @var string
     */
    protected $lastModified;
    /**
     *
     *
     * @var string
     */
    protected $self;
    /**
    * Whether to create or update a draft workflow scheme when updating an active workflow scheme. An active workflow scheme is a workflow scheme that is used by at least one project. The following examples show how this property works:

    *  Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated. Otherwise, a draft workflow scheme is created.
    *  Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated.
    *  Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update.

    Defaults to `false`.
    *
    * @var bool
    */
    protected $updateDraftIfNeeded;
    /**
     * The issue types available in Jira.
     *
     * @var IssueTypeDetails[]
     */
    protected $issueTypes;
    /**
     * The ID of the workflow scheme.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * The ID of the workflow scheme.
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The name of the workflow scheme. The name must be unique. The maximum length is 255 characters. Required when creating a workflow scheme.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the workflow scheme. The name must be unique. The maximum length is 255 characters. Required when creating a workflow scheme.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The description of the workflow scheme.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the workflow scheme.
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
     * The name of the default workflow for the workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*.
     *
     * @return string
     */
    public function getDefaultWorkflow(): string
    {
        return $this->defaultWorkflow;
    }
    /**
     * The name of the default workflow for the workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira. If `defaultWorkflow` is not specified when creating a workflow scheme, it is set to *Jira Workflow (jira)*.
     *
     * @param string $defaultWorkflow
     *
     * @return self
     */
    public function setDefaultWorkflow(string $defaultWorkflow): self
    {
        $this->initialized['defaultWorkflow'] = true;
        $this->defaultWorkflow = $defaultWorkflow;
        return $this;
    }
    /**
     * The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme.
     *
     * @return string[]
     */
    public function getIssueTypeMappings(): iterable
    {
        return $this->issueTypeMappings;
    }
    /**
     * The issue type to workflow mappings, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme.
     *
     * @param string[] $issueTypeMappings
     *
     * @return self
     */
    public function setIssueTypeMappings(iterable $issueTypeMappings): self
    {
        $this->initialized['issueTypeMappings'] = true;
        $this->issueTypeMappings = $issueTypeMappings;
        return $this;
    }
    /**
     * For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira.
     *
     * @return string
     */
    public function getOriginalDefaultWorkflow(): string
    {
        return $this->originalDefaultWorkflow;
    }
    /**
     * For draft workflow schemes, this property is the name of the default workflow for the original workflow scheme. The default workflow has *All Unassigned Issue Types* assigned to it in Jira.
     *
     * @param string $originalDefaultWorkflow
     *
     * @return self
     */
    public function setOriginalDefaultWorkflow(string $originalDefaultWorkflow): self
    {
        $this->initialized['originalDefaultWorkflow'] = true;
        $this->originalDefaultWorkflow = $originalDefaultWorkflow;
        return $this;
    }
    /**
     * For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme.
     *
     * @return string[]
     */
    public function getOriginalIssueTypeMappings(): iterable
    {
        return $this->originalIssueTypeMappings;
    }
    /**
     * For draft workflow schemes, this property is the issue type to workflow mappings for the original workflow scheme, where each mapping is an issue type ID and workflow name pair. Note that an issue type can only be mapped to one workflow in a workflow scheme.
     *
     * @param string[] $originalIssueTypeMappings
     *
     * @return self
     */
    public function setOriginalIssueTypeMappings(iterable $originalIssueTypeMappings): self
    {
        $this->initialized['originalIssueTypeMappings'] = true;
        $this->originalIssueTypeMappings = $originalIssueTypeMappings;
        return $this;
    }
    /**
     * Whether the workflow scheme is a draft or not.
     *
     * @return bool
     */
    public function getDraft(): bool
    {
        return $this->draft;
    }
    /**
     * Whether the workflow scheme is a draft or not.
     *
     * @param bool $draft
     *
     * @return self
     */
    public function setDraft(bool $draft): self
    {
        $this->initialized['draft'] = true;
        $this->draft = $draft;
        return $this;
    }
    /**
     * The user that last modified the draft workflow scheme. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows.
     *
     * @return WorkflowSchemeLastModifiedUser
     */
    public function getLastModifiedUser(): WorkflowSchemeLastModifiedUser
    {
        return $this->lastModifiedUser;
    }
    /**
     * The user that last modified the draft workflow scheme. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows.
     *
     * @param WorkflowSchemeLastModifiedUser $lastModifiedUser
     *
     * @return self
     */
    public function setLastModifiedUser(WorkflowSchemeLastModifiedUser $lastModifiedUser): self
    {
        $this->initialized['lastModifiedUser'] = true;
        $this->lastModifiedUser = $lastModifiedUser;
        return $this;
    }
    /**
     * The date-time that the draft workflow scheme was last modified. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows.
     *
     * @return string
     */
    public function getLastModified(): string
    {
        return $this->lastModified;
    }
    /**
     * The date-time that the draft workflow scheme was last modified. A modification is a change to the issue type-project mappings only. This property does not apply to non-draft workflows.
     *
     * @param string $lastModified
     *
     * @return self
     */
    public function setLastModified(string $lastModified): self
    {
        $this->initialized['lastModified'] = true;
        $this->lastModified = $lastModified;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     *
     *
     * @param string $self
     *
     * @return self
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;
        return $this;
    }
    /**
    * Whether to create or update a draft workflow scheme when updating an active workflow scheme. An active workflow scheme is a workflow scheme that is used by at least one project. The following examples show how this property works:

    *  Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated. Otherwise, a draft workflow scheme is created.
    *  Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated.
    *  Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update.

    Defaults to `false`.
    *
    * @return bool
    */
    public function getUpdateDraftIfNeeded(): bool
    {
        return $this->updateDraftIfNeeded;
    }
    /**
    * Whether to create or update a draft workflow scheme when updating an active workflow scheme. An active workflow scheme is a workflow scheme that is used by at least one project. The following examples show how this property works:

    *  Update an active workflow scheme with `updateDraftIfNeeded` set to `true`: If a draft workflow scheme exists, it is updated. Otherwise, a draft workflow scheme is created.
    *  Update an active workflow scheme with `updateDraftIfNeeded` set to `false`: An error is returned, as active workflow schemes cannot be updated.
    *  Update an inactive workflow scheme with `updateDraftIfNeeded` set to `true`: The workflow scheme is updated, as inactive workflow schemes do not require drafts to update.

    Defaults to `false`.
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
    /**
     * The issue types available in Jira.
     *
     * @return IssueTypeDetails[]
     */
    public function getIssueTypes(): iterable
    {
        return $this->issueTypes;
    }
    /**
     * The issue types available in Jira.
     *
     * @param IssueTypeDetails[] $issueTypes
     *
     * @return self
     */
    public function setIssueTypes(iterable $issueTypes): self
    {
        $this->initialized['issueTypes'] = true;
        $this->issueTypes = $issueTypes;
        return $this;
    }
}
