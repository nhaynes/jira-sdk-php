<?php

namespace JiraSdk\Model;

class Project
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
     * Expand options that include additional project details in the response.
     *
     * @var string
     */
    protected $expand;
    /**
     * The URL of the project details.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the project.
     *
     * @var string
     */
    protected $id;
    /**
     * The key of the project.
     *
     * @var string
     */
    protected $key;
    /**
     * A brief description of the project.
     *
     * @var string
     */
    protected $description;
    /**
     * The username of the project lead.
     *
     * @var ProjectLead
     */
    protected $lead;
    /**
     * List of the components contained in the project.
     *
     * @var ProjectComponent[]
     */
    protected $components;
    /**
     * List of the issue types available in the project.
     *
     * @var IssueTypeDetails[]
     */
    protected $issueTypes;
    /**
     * A link to information about this project, such as project documentation.
     *
     * @var string
     */
    protected $url;
    /**
     * An email address associated with the project.
     *
     * @var string
     */
    protected $email;
    /**
     * The default assignee when creating issues for this project.
     *
     * @var string
     */
    protected $assigneeType;
    /**
     * The versions defined in the project. For more information, see [Create version](#api-rest-api-3-version-post).
     *
     * @var Version[]
     */
    protected $versions;
    /**
     * The name of the project.
     *
     * @var string
     */
    protected $name;
    /**
     * The name and self URL for each role defined in the project. For more information, see [Create project role](#api-rest-api-3-role-post).
     *
     * @var string[]
     */
    protected $roles;
    /**
     * The URLs of the project's avatars.
     *
     * @var ProjectAvatarUrls
     */
    protected $avatarUrls;
    /**
     * The category the project belongs to.
     *
     * @var ProjectProjectCategory
     */
    protected $projectCategory;
    /**
     * The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes) of the project.
     *
     * @var string
     */
    protected $projectTypeKey;
    /**
     * Whether the project is simplified.
     *
     * @var bool
     */
    protected $simplified;
    /**
     * The type of the project.
     *
     * @var string
     */
    protected $style;
    /**
     * Whether the project is selected as a favorite.
     *
     * @var bool
     */
    protected $favourite;
    /**
     * Whether the project is private.
     *
     * @var bool
     */
    protected $isPrivate;
    /**
     * The issue type hierarchy for the project.
     *
     * @var ProjectIssueTypeHierarchy
     */
    protected $issueTypeHierarchy;
    /**
     * User permissions on the project
     *
     * @var ProjectPermissions
     */
    protected $permissions;
    /**
     * Map of project properties
     *
     * @var mixed[]
     */
    protected $properties;
    /**
     * Unique ID for next-gen projects.
     *
     * @var string
     */
    protected $uuid;
    /**
     * Insights about the project.
     *
     * @var ProjectInsight
     */
    protected $insight;
    /**
     * Whether the project is marked as deleted.
     *
     * @var bool
     */
    protected $deleted;
    /**
     * The date when the project is deleted permanently.
     *
     * @var \DateTime
     */
    protected $retentionTillDate;
    /**
     * The date when the project was marked as deleted.
     *
     * @var \DateTime
     */
    protected $deletedDate;
    /**
     * The user who marked the project as deleted.
     *
     * @var ProjectDeletedBy
     */
    protected $deletedBy;
    /**
     * Whether the project is archived.
     *
     * @var bool
     */
    protected $archived;
    /**
     * The date when the project was archived.
     *
     * @var \DateTime
     */
    protected $archivedDate;
    /**
     * The user who archived the project.
     *
     * @var ProjectArchivedBy
     */
    protected $archivedBy;
    /**
     * The project landing page info.
     *
     * @var ProjectLandingPageInfo
     */
    protected $landingPageInfo;
    /**
     * Expand options that include additional project details in the response.
     *
     * @return string
     */
    public function getExpand(): string
    {
        return $this->expand;
    }
    /**
     * Expand options that include additional project details in the response.
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
    /**
     * The URL of the project details.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the project details.
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
     * The ID of the project.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the project.
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The key of the project.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The key of the project.
     *
     * @param string $key
     *
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * A brief description of the project.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * A brief description of the project.
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
     * The username of the project lead.
     *
     * @return ProjectLead
     */
    public function getLead(): ProjectLead
    {
        return $this->lead;
    }
    /**
     * The username of the project lead.
     *
     * @param ProjectLead $lead
     *
     * @return self
     */
    public function setLead(ProjectLead $lead): self
    {
        $this->initialized['lead'] = true;
        $this->lead = $lead;
        return $this;
    }
    /**
     * List of the components contained in the project.
     *
     * @return ProjectComponent[]
     */
    public function getComponents(): array
    {
        return $this->components;
    }
    /**
     * List of the components contained in the project.
     *
     * @param ProjectComponent[] $components
     *
     * @return self
     */
    public function setComponents(array $components): self
    {
        $this->initialized['components'] = true;
        $this->components = $components;
        return $this;
    }
    /**
     * List of the issue types available in the project.
     *
     * @return IssueTypeDetails[]
     */
    public function getIssueTypes(): array
    {
        return $this->issueTypes;
    }
    /**
     * List of the issue types available in the project.
     *
     * @param IssueTypeDetails[] $issueTypes
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
     * A link to information about this project, such as project documentation.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
    /**
     * A link to information about this project, such as project documentation.
     *
     * @param string $url
     *
     * @return self
     */
    public function setUrl(string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
    /**
     * An email address associated with the project.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    /**
     * An email address associated with the project.
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;
        return $this;
    }
    /**
     * The default assignee when creating issues for this project.
     *
     * @return string
     */
    public function getAssigneeType(): string
    {
        return $this->assigneeType;
    }
    /**
     * The default assignee when creating issues for this project.
     *
     * @param string $assigneeType
     *
     * @return self
     */
    public function setAssigneeType(string $assigneeType): self
    {
        $this->initialized['assigneeType'] = true;
        $this->assigneeType = $assigneeType;
        return $this;
    }
    /**
     * The versions defined in the project. For more information, see [Create version](#api-rest-api-3-version-post).
     *
     * @return Version[]
     */
    public function getVersions(): array
    {
        return $this->versions;
    }
    /**
     * The versions defined in the project. For more information, see [Create version](#api-rest-api-3-version-post).
     *
     * @param Version[] $versions
     *
     * @return self
     */
    public function setVersions(array $versions): self
    {
        $this->initialized['versions'] = true;
        $this->versions = $versions;
        return $this;
    }
    /**
     * The name of the project.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the project.
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
     * The name and self URL for each role defined in the project. For more information, see [Create project role](#api-rest-api-3-role-post).
     *
     * @return string[]
     */
    public function getRoles(): iterable
    {
        return $this->roles;
    }
    /**
     * The name and self URL for each role defined in the project. For more information, see [Create project role](#api-rest-api-3-role-post).
     *
     * @param string[] $roles
     *
     * @return self
     */
    public function setRoles(iterable $roles): self
    {
        $this->initialized['roles'] = true;
        $this->roles = $roles;
        return $this;
    }
    /**
     * The URLs of the project's avatars.
     *
     * @return ProjectAvatarUrls
     */
    public function getAvatarUrls(): ProjectAvatarUrls
    {
        return $this->avatarUrls;
    }
    /**
     * The URLs of the project's avatars.
     *
     * @param ProjectAvatarUrls $avatarUrls
     *
     * @return self
     */
    public function setAvatarUrls(ProjectAvatarUrls $avatarUrls): self
    {
        $this->initialized['avatarUrls'] = true;
        $this->avatarUrls = $avatarUrls;
        return $this;
    }
    /**
     * The category the project belongs to.
     *
     * @return ProjectProjectCategory
     */
    public function getProjectCategory(): ProjectProjectCategory
    {
        return $this->projectCategory;
    }
    /**
     * The category the project belongs to.
     *
     * @param ProjectProjectCategory $projectCategory
     *
     * @return self
     */
    public function setProjectCategory(ProjectProjectCategory $projectCategory): self
    {
        $this->initialized['projectCategory'] = true;
        $this->projectCategory = $projectCategory;
        return $this;
    }
    /**
     * The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes) of the project.
     *
     * @return string
     */
    public function getProjectTypeKey(): string
    {
        return $this->projectTypeKey;
    }
    /**
     * The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes) of the project.
     *
     * @param string $projectTypeKey
     *
     * @return self
     */
    public function setProjectTypeKey(string $projectTypeKey): self
    {
        $this->initialized['projectTypeKey'] = true;
        $this->projectTypeKey = $projectTypeKey;
        return $this;
    }
    /**
     * Whether the project is simplified.
     *
     * @return bool
     */
    public function getSimplified(): bool
    {
        return $this->simplified;
    }
    /**
     * Whether the project is simplified.
     *
     * @param bool $simplified
     *
     * @return self
     */
    public function setSimplified(bool $simplified): self
    {
        $this->initialized['simplified'] = true;
        $this->simplified = $simplified;
        return $this;
    }
    /**
     * The type of the project.
     *
     * @return string
     */
    public function getStyle(): string
    {
        return $this->style;
    }
    /**
     * The type of the project.
     *
     * @param string $style
     *
     * @return self
     */
    public function setStyle(string $style): self
    {
        $this->initialized['style'] = true;
        $this->style = $style;
        return $this;
    }
    /**
     * Whether the project is selected as a favorite.
     *
     * @return bool
     */
    public function getFavourite(): bool
    {
        return $this->favourite;
    }
    /**
     * Whether the project is selected as a favorite.
     *
     * @param bool $favourite
     *
     * @return self
     */
    public function setFavourite(bool $favourite): self
    {
        $this->initialized['favourite'] = true;
        $this->favourite = $favourite;
        return $this;
    }
    /**
     * Whether the project is private.
     *
     * @return bool
     */
    public function getIsPrivate(): bool
    {
        return $this->isPrivate;
    }
    /**
     * Whether the project is private.
     *
     * @param bool $isPrivate
     *
     * @return self
     */
    public function setIsPrivate(bool $isPrivate): self
    {
        $this->initialized['isPrivate'] = true;
        $this->isPrivate = $isPrivate;
        return $this;
    }
    /**
     * The issue type hierarchy for the project.
     *
     * @return ProjectIssueTypeHierarchy
     */
    public function getIssueTypeHierarchy(): ProjectIssueTypeHierarchy
    {
        return $this->issueTypeHierarchy;
    }
    /**
     * The issue type hierarchy for the project.
     *
     * @param ProjectIssueTypeHierarchy $issueTypeHierarchy
     *
     * @return self
     */
    public function setIssueTypeHierarchy(ProjectIssueTypeHierarchy $issueTypeHierarchy): self
    {
        $this->initialized['issueTypeHierarchy'] = true;
        $this->issueTypeHierarchy = $issueTypeHierarchy;
        return $this;
    }
    /**
     * User permissions on the project
     *
     * @return ProjectPermissions
     */
    public function getPermissions(): ProjectPermissions
    {
        return $this->permissions;
    }
    /**
     * User permissions on the project
     *
     * @param ProjectPermissions $permissions
     *
     * @return self
     */
    public function setPermissions(ProjectPermissions $permissions): self
    {
        $this->initialized['permissions'] = true;
        $this->permissions = $permissions;
        return $this;
    }
    /**
     * Map of project properties
     *
     * @return mixed[]
     */
    public function getProperties(): iterable
    {
        return $this->properties;
    }
    /**
     * Map of project properties
     *
     * @param mixed[] $properties
     *
     * @return self
     */
    public function setProperties(iterable $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;
        return $this;
    }
    /**
     * Unique ID for next-gen projects.
     *
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }
    /**
     * Unique ID for next-gen projects.
     *
     * @param string $uuid
     *
     * @return self
     */
    public function setUuid(string $uuid): self
    {
        $this->initialized['uuid'] = true;
        $this->uuid = $uuid;
        return $this;
    }
    /**
     * Insights about the project.
     *
     * @return ProjectInsight
     */
    public function getInsight(): ProjectInsight
    {
        return $this->insight;
    }
    /**
     * Insights about the project.
     *
     * @param ProjectInsight $insight
     *
     * @return self
     */
    public function setInsight(ProjectInsight $insight): self
    {
        $this->initialized['insight'] = true;
        $this->insight = $insight;
        return $this;
    }
    /**
     * Whether the project is marked as deleted.
     *
     * @return bool
     */
    public function getDeleted(): bool
    {
        return $this->deleted;
    }
    /**
     * Whether the project is marked as deleted.
     *
     * @param bool $deleted
     *
     * @return self
     */
    public function setDeleted(bool $deleted): self
    {
        $this->initialized['deleted'] = true;
        $this->deleted = $deleted;
        return $this;
    }
    /**
     * The date when the project is deleted permanently.
     *
     * @return \DateTime
     */
    public function getRetentionTillDate(): \DateTime
    {
        return $this->retentionTillDate;
    }
    /**
     * The date when the project is deleted permanently.
     *
     * @param \DateTime $retentionTillDate
     *
     * @return self
     */
    public function setRetentionTillDate(\DateTime $retentionTillDate): self
    {
        $this->initialized['retentionTillDate'] = true;
        $this->retentionTillDate = $retentionTillDate;
        return $this;
    }
    /**
     * The date when the project was marked as deleted.
     *
     * @return \DateTime
     */
    public function getDeletedDate(): \DateTime
    {
        return $this->deletedDate;
    }
    /**
     * The date when the project was marked as deleted.
     *
     * @param \DateTime $deletedDate
     *
     * @return self
     */
    public function setDeletedDate(\DateTime $deletedDate): self
    {
        $this->initialized['deletedDate'] = true;
        $this->deletedDate = $deletedDate;
        return $this;
    }
    /**
     * The user who marked the project as deleted.
     *
     * @return ProjectDeletedBy
     */
    public function getDeletedBy(): ProjectDeletedBy
    {
        return $this->deletedBy;
    }
    /**
     * The user who marked the project as deleted.
     *
     * @param ProjectDeletedBy $deletedBy
     *
     * @return self
     */
    public function setDeletedBy(ProjectDeletedBy $deletedBy): self
    {
        $this->initialized['deletedBy'] = true;
        $this->deletedBy = $deletedBy;
        return $this;
    }
    /**
     * Whether the project is archived.
     *
     * @return bool
     */
    public function getArchived(): bool
    {
        return $this->archived;
    }
    /**
     * Whether the project is archived.
     *
     * @param bool $archived
     *
     * @return self
     */
    public function setArchived(bool $archived): self
    {
        $this->initialized['archived'] = true;
        $this->archived = $archived;
        return $this;
    }
    /**
     * The date when the project was archived.
     *
     * @return \DateTime
     */
    public function getArchivedDate(): \DateTime
    {
        return $this->archivedDate;
    }
    /**
     * The date when the project was archived.
     *
     * @param \DateTime $archivedDate
     *
     * @return self
     */
    public function setArchivedDate(\DateTime $archivedDate): self
    {
        $this->initialized['archivedDate'] = true;
        $this->archivedDate = $archivedDate;
        return $this;
    }
    /**
     * The user who archived the project.
     *
     * @return ProjectArchivedBy
     */
    public function getArchivedBy(): ProjectArchivedBy
    {
        return $this->archivedBy;
    }
    /**
     * The user who archived the project.
     *
     * @param ProjectArchivedBy $archivedBy
     *
     * @return self
     */
    public function setArchivedBy(ProjectArchivedBy $archivedBy): self
    {
        $this->initialized['archivedBy'] = true;
        $this->archivedBy = $archivedBy;
        return $this;
    }
    /**
     * The project landing page info.
     *
     * @return ProjectLandingPageInfo
     */
    public function getLandingPageInfo(): ProjectLandingPageInfo
    {
        return $this->landingPageInfo;
    }
    /**
     * The project landing page info.
     *
     * @param ProjectLandingPageInfo $landingPageInfo
     *
     * @return self
     */
    public function setLandingPageInfo(ProjectLandingPageInfo $landingPageInfo): self
    {
        $this->initialized['landingPageInfo'] = true;
        $this->landingPageInfo = $landingPageInfo;
        return $this;
    }
}
