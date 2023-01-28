<?php

namespace JiraSdk\Model;

class JexpIssuesJql extends \ArrayObject
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
     * The JQL query.
     *
     * @var string
     */
    protected $query;
    /**
     * The index of the first issue to return from the JQL query.
     *
     * @var int
     */
    protected $startAt;
    /**
     * The maximum number of issues to return from the JQL query. Inspect `meta.issues.jql.maxResults` in the response to ensure the maximum value has not been exceeded.
     *
     * @var int
     */
    protected $maxResults;
    /**
     * Determines how to validate the JQL query and treat the validation results.
     *
     * @var string
     */
    protected $validation = 'strict';
    /**
     * The JQL query.
     *
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }
    /**
     * The JQL query.
     *
     * @param string $query
     *
     * @return self
     */
    public function setQuery(string $query): self
    {
        $this->initialized['query'] = true;
        $this->query = $query;
        return $this;
    }
    /**
     * The index of the first issue to return from the JQL query.
     *
     * @return int
     */
    public function getStartAt(): int
    {
        return $this->startAt;
    }
    /**
     * The index of the first issue to return from the JQL query.
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
     * The maximum number of issues to return from the JQL query. Inspect `meta.issues.jql.maxResults` in the response to ensure the maximum value has not been exceeded.
     *
     * @return int
     */
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }
    /**
     * The maximum number of issues to return from the JQL query. Inspect `meta.issues.jql.maxResults` in the response to ensure the maximum value has not been exceeded.
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
     * Determines how to validate the JQL query and treat the validation results.
     *
     * @return string
     */
    public function getValidation(): string
    {
        return $this->validation;
    }
    /**
     * Determines how to validate the JQL query and treat the validation results.
     *
     * @param string $validation
     *
     * @return self
     */
    public function setValidation(string $validation): self
    {
        $this->initialized['validation'] = true;
        $this->validation = $validation;
        return $this;
    }
}
