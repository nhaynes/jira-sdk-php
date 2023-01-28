<?php

namespace JiraSdk\Model;

class IssueFilterForBulkPropertySet
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
     * List of issues to perform the bulk operation on.
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
     * Whether the bulk operation occurs only when the property is present on or absent from an issue.
     *
     * @var bool
     */
    protected $hasProperty;
    /**
     * List of issues to perform the bulk operation on.
     *
     * @return int[]
     */
    public function getEntityIds(): array
    {
        return $this->entityIds;
    }
    /**
     * List of issues to perform the bulk operation on.
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
    /**
     * Whether the bulk operation occurs only when the property is present on or absent from an issue.
     *
     * @return bool
     */
    public function getHasProperty(): bool
    {
        return $this->hasProperty;
    }
    /**
     * Whether the bulk operation occurs only when the property is present on or absent from an issue.
     *
     * @param bool $hasProperty
     *
     * @return self
     */
    public function setHasProperty(bool $hasProperty): self
    {
        $this->initialized['hasProperty'] = true;
        $this->hasProperty = $hasProperty;
        return $this;
    }
}
