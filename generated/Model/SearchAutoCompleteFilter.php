<?php

namespace JiraSdk\Model;

class SearchAutoCompleteFilter
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
     * List of project IDs used to filter the visible field details returned.
     *
     * @var int[]
     */
    protected $projectIds;
    /**
     * Include collapsed fields for fields that have non-unique names.
     *
     * @var bool
     */
    protected $includeCollapsedFields = false;
    /**
     * List of project IDs used to filter the visible field details returned.
     *
     * @return int[]
     */
    public function getProjectIds(): array
    {
        return $this->projectIds;
    }
    /**
     * List of project IDs used to filter the visible field details returned.
     *
     * @param int[] $projectIds
     *
     * @return self
     */
    public function setProjectIds(array $projectIds): self
    {
        $this->initialized['projectIds'] = true;
        $this->projectIds = $projectIds;
        return $this;
    }
    /**
     * Include collapsed fields for fields that have non-unique names.
     *
     * @return bool
     */
    public function getIncludeCollapsedFields(): bool
    {
        return $this->includeCollapsedFields;
    }
    /**
     * Include collapsed fields for fields that have non-unique names.
     *
     * @param bool $includeCollapsedFields
     *
     * @return self
     */
    public function setIncludeCollapsedFields(bool $includeCollapsedFields): self
    {
        $this->initialized['includeCollapsedFields'] = true;
        $this->includeCollapsedFields = $includeCollapsedFields;
        return $this;
    }
}
