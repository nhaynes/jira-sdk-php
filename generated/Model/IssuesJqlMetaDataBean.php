<?php

namespace JiraSdk\Model;

class IssuesJqlMetaDataBean
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
     * The index of the first issue.
     *
     * @var int
     */
    protected $startAt;
    /**
     * The maximum number of issues that could be loaded in this evaluation.
     *
     * @var int
     */
    protected $maxResults;
    /**
     * The number of issues that were loaded in this evaluation.
     *
     * @var int
     */
    protected $count;
    /**
     * The total number of issues the JQL returned.
     *
     * @var int
     */
    protected $totalCount;
    /**
     * Any warnings related to the JQL query. Present only if the validation mode was set to `warn`.
     *
     * @var string[]
     */
    protected $validationWarnings;
    /**
     * The index of the first issue.
     *
     * @return int
     */
    public function getStartAt(): int
    {
        return $this->startAt;
    }
    /**
     * The index of the first issue.
     *
     * @param int $startAt
     *
     * @return self
     */
    public function setStartAt(int $startAt): self
    {
        $this->initialized['startAt'] = true;
        $this->startAt = $startAt;
        return $this;
    }
    /**
     * The maximum number of issues that could be loaded in this evaluation.
     *
     * @return int
     */
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }
    /**
     * The maximum number of issues that could be loaded in this evaluation.
     *
     * @param int $maxResults
     *
     * @return self
     */
    public function setMaxResults(int $maxResults): self
    {
        $this->initialized['maxResults'] = true;
        $this->maxResults = $maxResults;
        return $this;
    }
    /**
     * The number of issues that were loaded in this evaluation.
     *
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }
    /**
     * The number of issues that were loaded in this evaluation.
     *
     * @param int $count
     *
     * @return self
     */
    public function setCount(int $count): self
    {
        $this->initialized['count'] = true;
        $this->count = $count;
        return $this;
    }
    /**
     * The total number of issues the JQL returned.
     *
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }
    /**
     * The total number of issues the JQL returned.
     *
     * @param int $totalCount
     *
     * @return self
     */
    public function setTotalCount(int $totalCount): self
    {
        $this->initialized['totalCount'] = true;
        $this->totalCount = $totalCount;
        return $this;
    }
    /**
     * Any warnings related to the JQL query. Present only if the validation mode was set to `warn`.
     *
     * @return string[]
     */
    public function getValidationWarnings(): array
    {
        return $this->validationWarnings;
    }
    /**
     * Any warnings related to the JQL query. Present only if the validation mode was set to `warn`.
     *
     * @param string[] $validationWarnings
     *
     * @return self
     */
    public function setValidationWarnings(array $validationWarnings): self
    {
        $this->initialized['validationWarnings'] = true;
        $this->validationWarnings = $validationWarnings;
        return $this;
    }
}
