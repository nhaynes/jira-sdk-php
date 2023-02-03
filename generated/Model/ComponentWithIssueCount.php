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

class ComponentWithIssueCount
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Count of issues for the component.
     *
     * @var int
     */
    protected $issueCount;
    /**
     * The user assigned to issues created with this component, when `assigneeType` does not identify a valid assignee.
     *
     * @var ComponentWithIssueCountRealAssignee
     */
    protected $realAssignee;
    /**
     * Whether a user is associated with `assigneeType`. For example, if the `assigneeType` is set to `COMPONENT_LEAD` but the component lead is not set, then `false` is returned.
     *
     * @var bool
     */
    protected $isAssigneeTypeValid;
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
     * The name for the component.
     *
     * @var string
     */
    protected $name;
    /**
     * The unique identifier for the component.
     *
     * @var string
     */
    protected $id;
    /**
     * The description for the component.
     *
     * @var string
     */
    protected $description;
    /**
     * The details of the user associated with `assigneeType`, if any. See `realAssignee` for details of the user assigned to issues created with this component.
     *
     * @var ComponentWithIssueCountAssignee
     */
    protected $assignee;
    /**
     * Not used.
     *
     * @var int
     */
    protected $projectId;
    /**
     * The key of the project to which the component is assigned.
     *
     * @var string
     */
    protected $project;
    /**
     * The user details for the component's lead user.
     *
     * @var ComponentWithIssueCountLead
     */
    protected $lead;
    /**
     * The nominal user type used to determine the assignee for issues created with this component. See `realAssigneeType` for details on how the type of the user, and hence the user, assigned to issues is determined. Takes the following values:
     *  `PROJECT_LEAD` the assignee to any issues created with this component is nominally the lead for the project the component is in.
     *  `COMPONENT_LEAD` the assignee to any issues created with this component is nominally the lead for the component.
     *  `UNASSIGNED` an assignee is not set for issues created with this component.
     *  `PROJECT_DEFAULT` the assignee to any issues created with this component is nominally the default assignee for the project that the component is in.
     *
     * @var string
     */
    protected $assigneeType;
    /**
     * The URL for this count of the issues contained in the component.
     *
     * @var string
     */
    protected $self;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Count of issues for the component.
     */
    public function getIssueCount(): int
    {
        return $this->issueCount;
    }

    /**
     * Count of issues for the component.
     */
    public function setIssueCount(int $issueCount): self
    {
        $this->initialized['issueCount'] = true;
        $this->issueCount = $issueCount;

        return $this;
    }

    /**
     * The user assigned to issues created with this component, when `assigneeType` does not identify a valid assignee.
     */
    public function getRealAssignee(): ComponentWithIssueCountRealAssignee
    {
        return $this->realAssignee;
    }

    /**
     * The user assigned to issues created with this component, when `assigneeType` does not identify a valid assignee.
     */
    public function setRealAssignee(ComponentWithIssueCountRealAssignee $realAssignee): self
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
     * The name for the component.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name for the component.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

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
     * The description for the component.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description for the component.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The details of the user associated with `assigneeType`, if any. See `realAssignee` for details of the user assigned to issues created with this component.
     */
    public function getAssignee(): ComponentWithIssueCountAssignee
    {
        return $this->assignee;
    }

    /**
     * The details of the user associated with `assigneeType`, if any. See `realAssignee` for details of the user assigned to issues created with this component.
     */
    public function setAssignee(ComponentWithIssueCountAssignee $assignee): self
    {
        $this->initialized['assignee'] = true;
        $this->assignee = $assignee;

        return $this;
    }

    /**
     * Not used.
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * Not used.
     */
    public function setProjectId(int $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * The key of the project to which the component is assigned.
     */
    public function getProject(): string
    {
        return $this->project;
    }

    /**
     * The key of the project to which the component is assigned.
     */
    public function setProject(string $project): self
    {
        $this->initialized['project'] = true;
        $this->project = $project;

        return $this;
    }

    /**
     * The user details for the component's lead user.
     */
    public function getLead(): ComponentWithIssueCountLead
    {
        return $this->lead;
    }

    /**
     * The user details for the component's lead user.
     */
    public function setLead(ComponentWithIssueCountLead $lead): self
    {
        $this->initialized['lead'] = true;
        $this->lead = $lead;

        return $this;
    }

    /**
     * The nominal user type used to determine the assignee for issues created with this component. See `realAssigneeType` for details on how the type of the user, and hence the user, assigned to issues is determined. Takes the following values:
     *  `PROJECT_LEAD` the assignee to any issues created with this component is nominally the lead for the project the component is in.
     *  `COMPONENT_LEAD` the assignee to any issues created with this component is nominally the lead for the component.
     *  `UNASSIGNED` an assignee is not set for issues created with this component.
     *  `PROJECT_DEFAULT` the assignee to any issues created with this component is nominally the default assignee for the project that the component is in.
     */
    public function getAssigneeType(): string
    {
        return $this->assigneeType;
    }

    /**
     * The nominal user type used to determine the assignee for issues created with this component. See `realAssigneeType` for details on how the type of the user, and hence the user, assigned to issues is determined. Takes the following values:
     *  `PROJECT_LEAD` the assignee to any issues created with this component is nominally the lead for the project the component is in.
     *  `COMPONENT_LEAD` the assignee to any issues created with this component is nominally the lead for the component.
     *  `UNASSIGNED` an assignee is not set for issues created with this component.
     *  `PROJECT_DEFAULT` the assignee to any issues created with this component is nominally the default assignee for the project that the component is in.
     */
    public function setAssigneeType(string $assigneeType): self
    {
        $this->initialized['assigneeType'] = true;
        $this->assigneeType = $assigneeType;

        return $this;
    }

    /**
     * The URL for this count of the issues contained in the component.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL for this count of the issues contained in the component.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }
}
