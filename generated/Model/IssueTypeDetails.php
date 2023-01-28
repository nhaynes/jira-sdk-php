<?php

namespace JiraSdk\Model;

class IssueTypeDetails
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
     * The URL of these issue type details.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the issue type.
     *
     * @var string
     */
    protected $id;
    /**
     * The description of the issue type.
     *
     * @var string
     */
    protected $description;
    /**
     * The URL of the issue type's avatar.
     *
     * @var string
     */
    protected $iconUrl;
    /**
     * The name of the issue type.
     *
     * @var string
     */
    protected $name;
    /**
     * Whether this issue type is used to create subtasks.
     *
     * @var bool
     */
    protected $subtask;
    /**
     * The ID of the issue type's avatar.
     *
     * @var int
     */
    protected $avatarId;
    /**
     * Unique ID for next-gen projects.
     *
     * @var string
     */
    protected $entityId;
    /**
     * Hierarchy level of the issue type.
     *
     * @var int
     */
    protected $hierarchyLevel;
    /**
     * Details of the next-gen projects the issue type is available in.
     *
     * @var IssueTypeDetailsScope
     */
    protected $scope;
    /**
     * The URL of these issue type details.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of these issue type details.
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
     * The ID of the issue type.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the issue type.
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
     * The description of the issue type.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the issue type.
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
     * The URL of the issue type's avatar.
     *
     * @return string
     */
    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }
    /**
     * The URL of the issue type's avatar.
     *
     * @param string $iconUrl
     *
     * @return self
     */
    public function setIconUrl(string $iconUrl): self
    {
        $this->initialized['iconUrl'] = true;
        $this->iconUrl = $iconUrl;
        return $this;
    }
    /**
     * The name of the issue type.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the issue type.
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
     * Whether this issue type is used to create subtasks.
     *
     * @return bool
     */
    public function getSubtask(): bool
    {
        return $this->subtask;
    }
    /**
     * Whether this issue type is used to create subtasks.
     *
     * @param bool $subtask
     *
     * @return self
     */
    public function setSubtask(bool $subtask): self
    {
        $this->initialized['subtask'] = true;
        $this->subtask = $subtask;
        return $this;
    }
    /**
     * The ID of the issue type's avatar.
     *
     * @return int
     */
    public function getAvatarId(): int
    {
        return $this->avatarId;
    }
    /**
     * The ID of the issue type's avatar.
     *
     * @param int $avatarId
     *
     * @return self
     */
    public function setAvatarId(int $avatarId): self
    {
        $this->initialized['avatarId'] = true;
        $this->avatarId = $avatarId;
        return $this;
    }
    /**
     * Unique ID for next-gen projects.
     *
     * @return string
     */
    public function getEntityId(): string
    {
        return $this->entityId;
    }
    /**
     * Unique ID for next-gen projects.
     *
     * @param string $entityId
     *
     * @return self
     */
    public function setEntityId(string $entityId): self
    {
        $this->initialized['entityId'] = true;
        $this->entityId = $entityId;
        return $this;
    }
    /**
     * Hierarchy level of the issue type.
     *
     * @return int
     */
    public function getHierarchyLevel(): int
    {
        return $this->hierarchyLevel;
    }
    /**
     * Hierarchy level of the issue type.
     *
     * @param int $hierarchyLevel
     *
     * @return self
     */
    public function setHierarchyLevel(int $hierarchyLevel): self
    {
        $this->initialized['hierarchyLevel'] = true;
        $this->hierarchyLevel = $hierarchyLevel;
        return $this;
    }
    /**
     * Details of the next-gen projects the issue type is available in.
     *
     * @return IssueTypeDetailsScope
     */
    public function getScope(): IssueTypeDetailsScope
    {
        return $this->scope;
    }
    /**
     * Details of the next-gen projects the issue type is available in.
     *
     * @param IssueTypeDetailsScope $scope
     *
     * @return self
     */
    public function setScope(IssueTypeDetailsScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;
        return $this;
    }
}
