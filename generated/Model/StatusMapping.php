<?php

namespace JiraSdk\Model;

class StatusMapping
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
     * The ID of the issue type.
     *
     * @var string
     */
    protected $issueTypeId;
    /**
     * The ID of the status.
     *
     * @var string
     */
    protected $statusId;
    /**
     * The ID of the new status.
     *
     * @var string
     */
    protected $newStatusId;
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
     * The ID of the status.
     *
     * @return string
     */
    public function getStatusId(): string
    {
        return $this->statusId;
    }
    /**
     * The ID of the status.
     *
     * @param string $statusId
     *
     * @return self
     */
    public function setStatusId(string $statusId): self
    {
        $this->initialized['statusId'] = true;
        $this->statusId = $statusId;
        return $this;
    }
    /**
     * The ID of the new status.
     *
     * @return string
     */
    public function getNewStatusId(): string
    {
        return $this->newStatusId;
    }
    /**
     * The ID of the new status.
     *
     * @param string $newStatusId
     *
     * @return self
     */
    public function setNewStatusId(string $newStatusId): self
    {
        $this->initialized['newStatusId'] = true;
        $this->newStatusId = $newStatusId;
        return $this;
    }
}
