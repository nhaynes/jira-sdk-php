<?php

namespace JiraSdk\Model;

class ChangedWorklog
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
     * The ID of the worklog.
     *
     * @var int
     */
    protected $worklogId;
    /**
     * The datetime of the change.
     *
     * @var int
     */
    protected $updatedTime;
    /**
     * Details of properties associated with the change.
     *
     * @var EntityProperty[]
     */
    protected $properties;
    /**
     * The ID of the worklog.
     *
     * @return int
     */
    public function getWorklogId(): int
    {
        return $this->worklogId;
    }
    /**
     * The ID of the worklog.
     *
     * @param int $worklogId
     *
     * @return self
     */
    public function setWorklogId(int $worklogId): self
    {
        $this->initialized['worklogId'] = true;
        $this->worklogId = $worklogId;
        return $this;
    }
    /**
     * The datetime of the change.
     *
     * @return int
     */
    public function getUpdatedTime(): int
    {
        return $this->updatedTime;
    }
    /**
     * The datetime of the change.
     *
     * @param int $updatedTime
     *
     * @return self
     */
    public function setUpdatedTime(int $updatedTime): self
    {
        $this->initialized['updatedTime'] = true;
        $this->updatedTime = $updatedTime;
        return $this;
    }
    /**
     * Details of properties associated with the change.
     *
     * @return EntityProperty[]
     */
    public function getProperties(): array
    {
        return $this->properties;
    }
    /**
     * Details of properties associated with the change.
     *
     * @param EntityProperty[] $properties
     *
     * @return self
     */
    public function setProperties(array $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;
        return $this;
    }
}
