<?php

namespace JiraSdk\Model;

class IssueTypeToContextMapping
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
     * The ID of the context.
     *
     * @var string
     */
    protected $contextId;
    /**
     * The ID of the issue type.
     *
     * @var string
     */
    protected $issueTypeId;
    /**
     * Whether the context is mapped to any issue type.
     *
     * @var bool
     */
    protected $isAnyIssueType;
    /**
     * The ID of the context.
     *
     * @return string
     */
    public function getContextId(): string
    {
        return $this->contextId;
    }
    /**
     * The ID of the context.
     *
     * @param string $contextId
     *
     * @return self
     */
    public function setContextId(string $contextId): self
    {
        $this->initialized['contextId'] = true;
        $this->contextId = $contextId;
        return $this;
    }
    /**
     * The ID of the issue type.
     *
     * @return string
     */
    public function getIssueTypeId(): string
    {
        return $this->issueTypeId;
    }
    /**
     * The ID of the issue type.
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
     * Whether the context is mapped to any issue type.
     *
     * @return bool
     */
    public function getIsAnyIssueType(): bool
    {
        return $this->isAnyIssueType;
    }
    /**
     * Whether the context is mapped to any issue type.
     *
     * @param bool $isAnyIssueType
     *
     * @return self
     */
    public function setIsAnyIssueType(bool $isAnyIssueType): self
    {
        $this->initialized['isAnyIssueType'] = true;
        $this->isAnyIssueType = $isAnyIssueType;
        return $this;
    }
}
