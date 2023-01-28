<?php

namespace JiraSdk\Model;

class UiModificationContextDetails
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
     * The ID of the UI modification context.
     *
     * @var string
     */
    protected $id;
    /**
     * The project ID of the context.
     *
     * @var string
     */
    protected $projectId;
    /**
     * The issue type ID of the context.
     *
     * @var string
     */
    protected $issueTypeId;
    /**
     * The view type of the context. Only `GIC` (Global Issue Create) is supported.
     *
     * @var string
     */
    protected $viewType;
    /**
     * Whether a context is available. For example, when a project is deleted the context becomes unavailable.
     *
     * @var bool
     */
    protected $isAvailable;
    /**
     * The ID of the UI modification context.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the UI modification context.
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
     * The project ID of the context.
     *
     * @return string
     */
    public function getProjectId(): string
    {
        return $this->projectId;
    }
    /**
     * The project ID of the context.
     *
     * @param string $projectId
     *
     * @return self
     */
    public function setProjectId(string $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;
        return $this;
    }
    /**
     * The issue type ID of the context.
     *
     * @return string
     */
    public function getIssueTypeId(): string
    {
        return $this->issueTypeId;
    }
    /**
     * The issue type ID of the context.
     *
     * @param string $issueTypeId
     *
     * @return self
     */
    public function setIssueTypeId(string $issueTypeId): self
    {
        $this->initialized['issueTypeId'] = true;
        $this->issueTypeId = $issueTypeId;
        return $this;
    }
    /**
     * The view type of the context. Only `GIC` (Global Issue Create) is supported.
     *
     * @return string
     */
    public function getViewType(): string
    {
        return $this->viewType;
    }
    /**
     * The view type of the context. Only `GIC` (Global Issue Create) is supported.
     *
     * @param string $viewType
     *
     * @return self
     */
    public function setViewType(string $viewType): self
    {
        $this->initialized['viewType'] = true;
        $this->viewType = $viewType;
        return $this;
    }
    /**
     * Whether a context is available. For example, when a project is deleted the context becomes unavailable.
     *
     * @return bool
     */
    public function getIsAvailable(): bool
    {
        return $this->isAvailable;
    }
    /**
     * Whether a context is available. For example, when a project is deleted the context becomes unavailable.
     *
     * @param bool $isAvailable
     *
     * @return self
     */
    public function setIsAvailable(bool $isAvailable): self
    {
        $this->initialized['isAvailable'] = true;
        $this->isAvailable = $isAvailable;
        return $this;
    }
}
