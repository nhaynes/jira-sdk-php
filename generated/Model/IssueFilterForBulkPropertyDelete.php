<?php

namespace JiraSdk\Model;

class IssueFilterForBulkPropertyDelete
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
     * List of issues to perform the bulk delete operation on.
     *
     * @var int[]
     */
    protected $entityIds;
    /**
     * The value of properties to perform the bulk operation on.
     *
     * @var mixed
     */
    protected $currentValue;
    /**
     * List of issues to perform the bulk delete operation on.
     *
     * @return int[]
     */
    public function getEntityIds(): array
    {
        return $this->entityIds;
    }
    /**
     * List of issues to perform the bulk delete operation on.
     *
     * @param int[] $entityIds
     *
     * @return self
     */
    public function setEntityIds(array $entityIds): self
    {
        $this->initialized['entityIds'] = true;
        $this->entityIds = $entityIds;
        return $this;
    }
    /**
     * The value of properties to perform the bulk operation on.
     *
     * @return mixed
     */
    public function getCurrentValue()
    {
        return $this->currentValue;
    }
    /**
     * The value of properties to perform the bulk operation on.
     *
     * @param mixed $currentValue
     *
     * @return self
     */
    public function setCurrentValue($currentValue): self
    {
        $this->initialized['currentValue'] = true;
        $this->currentValue = $currentValue;
        return $this;
    }
}
