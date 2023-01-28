<?php

namespace JiraSdk\Model;

class IssueTypeWithStatus
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
     * The URL of the issue type's status details.
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
     * The name of the issue type.
     *
     * @var string
     */
    protected $name;
    /**
     * Whether this issue type represents subtasks.
     *
     * @var bool
     */
    protected $subtask;
    /**
     * List of status details for the issue type.
     *
     * @var StatusDetails[]
     */
    protected $statuses;
    /**
     * The URL of the issue type's status details.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the issue type's status details.
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
     * Whether this issue type represents subtasks.
     *
     * @return bool
     */
    public function getSubtask(): bool
    {
        return $this->subtask;
    }
    /**
     * Whether this issue type represents subtasks.
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
     * List of status details for the issue type.
     *
     * @return StatusDetails[]
     */
    public function getStatuses(): array
    {
        return $this->statuses;
    }
    /**
     * List of status details for the issue type.
     *
     * @param StatusDetails[] $statuses
     *
     * @return self
     */
    public function setStatuses(array $statuses): self
    {
        $this->initialized['statuses'] = true;
        $this->statuses = $statuses;
        return $this;
    }
}
