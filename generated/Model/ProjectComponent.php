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

class ProjectComponent
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of the component.
     *
     * @var string
     */
    protected $self;
    /**
     * The unique identifier for the component.
     *
     * @var string
     */
    protected $id;
    /**
     * The unique name for the component in the project. Required when creating a component. Optional when updating a component. The maximum length is 255 characters.
     *
     * @var string
     */
    protected $name;
    /**
     * The description for the component. Optional when creating or updating a component.
     *
     * @var string
     */
    protected $description;
    /**
     * The user details for the component's lead user.
     *
     * @var ProjectComponentLead
     */
    protected $lead;
    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *
     * @var string
     */
    protected $leadUserName;
    /**
     * The accountId of the component's lead user. The accountId uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *
     * @var string
     */
    protected $leadAccountId;
    /**
     * The nominal user type used to determine the assignee for issues created with this component. See `realAssigneeType` for details on how the type of the user, and hence the user, assigned to issues is determined. Can take the following values:.
     *
     *  `PROJECT_LEAD` the assignee to any issues created with this component is nominally the lead for the project the component is in.
     *  `COMPONENT_LEAD` the assignee to any issues created with this component is nominally the lead for the component.
     *  `UNASSIGNED` an assignee is not set for issues created with this component.
     *  `PROJECT_DEFAULT` the assignee to any issues created with this component is nominally the default assignee for the project that the component is in.
     *
     * Default value: `PROJECT_DEFAULT`.
     * Optional when creating or updating a component.
     *
     * @var string
     */
    protected $assigneeType;
    /**
     * The details of the user associated with `assigneeType`, if any. See `realAssignee` for details of the user assigned to issues created with this component.
     *
     * @var ProjectComponentAssignee
     */
    protected $assignee;
    /**
     * The type of the assignee that is assigned to issues created with this component, when an assignee cannot be set from the `assigneeType`. For example, `assigneeType` is set to `COMPONENT_LEAD` but no component lead is set. This property is set to one of the following values:
     *  `PROJECT_LEAD` when `assigneeType` is `PROJECT_LEAD` and the project lead has permission to be assigned issues in the project that the component is in.
     *  `COMPONENT_LEAD` when `assignee`Type is `COMPONENT_LEAD` and the component lead has permission to be assigned issues in the project that the component is in.
     *  `UNASSIGNED` when `assigneeType` is `UNASSIGNED` and Jira is configured to allow unassigned issues.
     *  `PROJECT_DEFAULT` when none of the preceding cases are true.
     *
     * @var string
     */
    protected $realAssigneeType;
    /**
     * The user assigned to issues created with this component, when `assigneeType` does not identify a valid assignee.
     *
     * @var ProjectComponentRealAssignee
     */
    protected $realAssignee;
    /**
     * Whether a user is associated with `assigneeType`. For example, if the `assigneeType` is set to `COMPONENT_LEAD` but the component lead is not set, then `false` is returned.
     *
     * @var bool
     */
    protected $isAssigneeTypeValid;
    /**
     * The key of the project the component is assigned to. Required when creating a component. Can't be updated.
     *
     * @var string
     */
    protected $project;
    /**
     * The ID of the project the component is assigned to.
     *
     * @var int
     */
    protected $projectId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of the component.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the component.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The unique identifier for the component.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The unique identifier for the component.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The unique name for the component in the project. Required when creating a component. Optional when updating a component. The maximum length is 255 characters.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The unique name for the component in the project. Required when creating a component. Optional when updating a component. The maximum length is 255 characters.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description for the component. Optional when creating or updating a component.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description for the component. Optional when creating or updating a component.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The user details for the component's lead user.
     */
    public function getLead(): ProjectComponentLead
    {
        return $this->lead;
    }

    /**
     * The user details for the component's lead user.
     */
    public function setLead(ProjectComponentLead $lead): self
    {
        $this->initialized['lead'] = true;
        $this->lead = $lead;

        return $this;
    }

    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     */
    public function getLeadUserName(): string
    {
        return $this->leadUserName;
    }

    /**
     * This property is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     */
    public function setLeadUserName(string $leadUserName): self
    {
        $this->initialized['leadUserName'] = true;
        $this->leadUserName = $leadUserName;

        return $this;
    }

    /**
     * The accountId of the component's lead user. The accountId uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     */
    public function getLeadAccountId(): string
    {
        return $this->leadAccountId;
    }

    /**
     * The accountId of the component's lead user. The accountId uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     */
    public function setLeadAccountId(string $leadAccountId): self
    {
        $this->initialized['leadAccountId'] = true;
        $this->leadAccountId = $leadAccountId;

        return $this;
    }

    /**
     * The nominal user type used to determine the assignee for issues created with this component. See `realAssigneeType` for details on how the type of the user, and hence the user, assigned to issues is determined. Can take the following values:.
     *
     *  `PROJECT_LEAD` the assignee to any issues created with this component is nominally the lead for the project the component is in.
     *  `COMPONENT_LEAD` the assignee to any issues created with this component is nominally the lead for the component.
     *  `UNASSIGNED` an assignee is not set for issues created with this component.
     *  `PROJECT_DEFAULT` the assignee to any issues created with this component is nominally the default assignee for the project that the component is in.
     *
     * Default value: `PROJECT_DEFAULT`.
     * Optional when creating or updating a component.
     */
    public function getAssigneeType(): string
    {
        return $this->assigneeType;
    }

    /**
     * The nominal user type used to determine the assignee for issues created with this component. See `realAssigneeType` for details on how the type of the user, and hence the user, assigned to issues is determined. Can take the following values:.
     *
     *  `PROJECT_LEAD` the assignee to any issues created with this component is nominally the lead for the project the component is in.
     *  `COMPONENT_LEAD` the assignee to any issues created with this component is nominally the lead for the component.
     *  `UNASSIGNED` an assignee is not set for issues created with this component.
     *  `PROJECT_DEFAULT` the assignee to any issues created with this component is nominally the default assignee for the project that the component is in.
     *
     * Default value: `PROJECT_DEFAULT`.
     * Optional when creating or updating a component.
     */
    public function setAssigneeType(string $assigneeType): self
    {
        $this->initialized['assigneeType'] = true;
        $this->assigneeType = $assigneeType;

        return $this;
    }

    /**
     * The details of the user associated with `assigneeType`, if any. See `realAssignee` for details of the user assigned to issues created with this component.
     */
    public function getAssignee(): ProjectComponentAssignee
    {
        return $this->assignee;
    }

    /**
     * The details of the user associated with `assigneeType`, if any. See `realAssignee` for details of the user assigned to issues created with this component.
     */
    public function setAssignee(ProjectComponentAssignee $assignee): self
    {
        $this->initialized['assignee'] = true;
        $this->assignee = $assignee;

        return $this;
    }

    /**
     * The type of the assignee that is assigned to issues created with this component, when an assignee cannot be set from the `assigneeType`. For example, `assigneeType` is set to `COMPONENT_LEAD` but no component lead is set. This property is set to one of the following values:
     *  `PROJECT_LEAD` when `assigneeType` is `PROJECT_LEAD` and the project lead has permission to be assigned issues in the project that the component is in.
     *  `COMPONENT_LEAD` when `assignee`Type is `COMPONENT_LEAD` and the component lead has permission to be assigned issues in the project that the component is in.
     *  `UNASSIGNED` when `assigneeType` is `UNASSIGNED` and Jira is configured to allow unassigned issues.
     *  `PROJECT_DEFAULT` when none of the preceding cases are true.
     */
    public function getRealAssigneeType(): string
    {
        return $this->realAssigneeType;
    }

    /**
     * The type of the assignee that is assigned to issues created with this component, when an assignee cannot be set from the `assigneeType`. For example, `assigneeType` is set to `COMPONENT_LEAD` but no component lead is set. This property is set to one of the following values:
     *  `PROJECT_LEAD` when `assigneeType` is `PROJECT_LEAD` and the project lead has permission to be assigned issues in the project that the component is in.
     *  `COMPONENT_LEAD` when `assignee`Type is `COMPONENT_LEAD` and the component lead has permission to be assigned issues in the project that the component is in.
     *  `UNASSIGNED` when `assigneeType` is `UNASSIGNED` and Jira is configured to allow unassigned issues.
     *  `PROJECT_DEFAULT` when none of the preceding cases are true.
     */
    public function setRealAssigneeType(string $realAssigneeType): self
    {
        $this->initialized['realAssigneeType'] = true;
        $this->realAssigneeType = $realAssigneeType;

        return $this;
    }

    /**
     * The user assigned to issues created with this component, when `assigneeType` does not identify a valid assignee.
     */
    public function getRealAssignee(): ProjectComponentRealAssignee
    {
        return $this->realAssignee;
    }

    /**
     * The user assigned to issues created with this component, when `assigneeType` does not identify a valid assignee.
     */
    public function setRealAssignee(ProjectComponentRealAssignee $realAssignee): self
    {
        $this->initialized['realAssignee'] = true;
        $this->realAssignee = $realAssignee;

        return $this;
    }

    /**
     * Whether a user is associated with `assigneeType`. For example, if the `assigneeType` is set to `COMPONENT_LEAD` but the component lead is not set, then `false` is returned.
     */
    public function getIsAssigneeTypeValid(): bool
    {
        return $this->isAssigneeTypeValid;
    }

    /**
     * Whether a user is associated with `assigneeType`. For example, if the `assigneeType` is set to `COMPONENT_LEAD` but the component lead is not set, then `false` is returned.
     */
    public function setIsAssigneeTypeValid(bool $isAssigneeTypeValid): self
    {
        $this->initialized['isAssigneeTypeValid'] = true;
        $this->isAssigneeTypeValid = $isAssigneeTypeValid;

        return $this;
    }

    /**
     * The key of the project the component is assigned to. Required when creating a component. Can't be updated.
     */
    public function getProject(): string
    {
        return $this->project;
    }

    /**
     * The key of the project the component is assigned to. Required when creating a component. Can't be updated.
     */
    public function setProject(string $project): self
    {
        $this->initialized['project'] = true;
        $this->project = $project;

        return $this;
    }

    /**
     * The ID of the project the component is assigned to.
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * The ID of the project the component is assigned to.
     */
    public function setProjectId(int $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;

        return $this;
    }
}
