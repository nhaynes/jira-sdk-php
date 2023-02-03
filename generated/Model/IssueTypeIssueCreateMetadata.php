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

class IssueTypeIssueCreateMetadata
{
    /**
     * @var array
     */
    protected $initialized = [];
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
     * @var IssueTypeIssueCreateMetadataScope
     */
    protected $scope;
    /**
     * Expand options that include additional issue type metadata details in the response.
     *
     * @var string
     */
    protected $expand;
    /**
     * List of the fields available when creating an issue for the issue type.
     *
     * @var FieldMetadata[]
     */
    protected $fields;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of these issue type details.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of these issue type details.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The ID of the issue type.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the issue type.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The description of the issue type.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the issue type.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The URL of the issue type's avatar.
     */
    public function getIconUrl(): string
    {
        return $this->iconUrl;
    }

    /**
     * The URL of the issue type's avatar.
     */
    public function setIconUrl(string $iconUrl): self
    {
        $this->initialized['iconUrl'] = true;
        $this->iconUrl = $iconUrl;

        return $this;
    }

    /**
     * The name of the issue type.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the issue type.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Whether this issue type is used to create subtasks.
     */
    public function getSubtask(): bool
    {
        return $this->subtask;
    }

    /**
     * Whether this issue type is used to create subtasks.
     */
    public function setSubtask(bool $subtask): self
    {
        $this->initialized['subtask'] = true;
        $this->subtask = $subtask;

        return $this;
    }

    /**
     * The ID of the issue type's avatar.
     */
    public function getAvatarId(): int
    {
        return $this->avatarId;
    }

    /**
     * The ID of the issue type's avatar.
     */
    public function setAvatarId(int $avatarId): self
    {
        $this->initialized['avatarId'] = true;
        $this->avatarId = $avatarId;

        return $this;
    }

    /**
     * Unique ID for next-gen projects.
     */
    public function getEntityId(): string
    {
        return $this->entityId;
    }

    /**
     * Unique ID for next-gen projects.
     */
    public function setEntityId(string $entityId): self
    {
        $this->initialized['entityId'] = true;
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * Hierarchy level of the issue type.
     */
    public function getHierarchyLevel(): int
    {
        return $this->hierarchyLevel;
    }

    /**
     * Hierarchy level of the issue type.
     */
    public function setHierarchyLevel(int $hierarchyLevel): self
    {
        $this->initialized['hierarchyLevel'] = true;
        $this->hierarchyLevel = $hierarchyLevel;

        return $this;
    }

    /**
     * Details of the next-gen projects the issue type is available in.
     */
    public function getScope(): IssueTypeIssueCreateMetadataScope
    {
        return $this->scope;
    }

    /**
     * Details of the next-gen projects the issue type is available in.
     */
    public function setScope(IssueTypeIssueCreateMetadataScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    /**
     * Expand options that include additional issue type metadata details in the response.
     */
    public function getExpand(): string
    {
        return $this->expand;
    }

    /**
     * Expand options that include additional issue type metadata details in the response.
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;

        return $this;
    }

    /**
     * List of the fields available when creating an issue for the issue type.
     *
     * @return FieldMetadata[]
     */
    public function getFields(): iterable
    {
        return $this->fields;
    }

    /**
     * List of the fields available when creating an issue for the issue type.
     *
     * @param FieldMetadata[] $fields
     */
    public function setFields(iterable $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;

        return $this;
    }
}
