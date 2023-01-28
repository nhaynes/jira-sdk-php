<?php

namespace JiraSdk\Model;

class PaginatedResponseComment
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
     *
     *
     * @var Comment[]
     */
    protected $results;
    /**
     *
     *
     * @var int
     */
    protected $maxResults;
    /**
     *
     *
     * @var int
     */
    protected $startAt;
    /**
     *
     *
     * @var int
     */
    protected $total;
    /**
     *
     *
     * @return Comment[]
     */
    public function getResults(): array
    {
        return $this->results;
    }
    /**
     *
     *
     * @param Comment[] $results
     *
     * @return self
     */
    public function setResults(array $results): self
    {
        $this->initialized['results'] = true;
        $this->results = $results;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }
    /**
     *
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
     *
     *
     * @return int
     */
    public function getStartAt(): int
    {
        return $this->startAt;
    }
    /**
     *
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
     *
     *
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }
    /**
     *
     *
     * @param int $total
     *
     * @return self
     */
    public function setTotal(int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
}
