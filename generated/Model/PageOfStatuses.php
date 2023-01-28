<?php

namespace JiraSdk\Model;

class PageOfStatuses
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
     * The index of the first item returned on the page.
     *
     * @var int
     */
    protected $startAt;
    /**
     * Number of items that satisfy the search.
     *
     * @var int
     */
    protected $total;
    /**
     * Whether this is the last page.
     *
     * @var bool
     */
    protected $isLast;
    /**
     * The maximum number of items that could be returned.
     *
     * @var int
     */
    protected $maxResults;
    /**
     * The list of items.
     *
     * @var JiraStatus[]
     */
    protected $values;
    /**
     * The URL of this page.
     *
     * @var string
     */
    protected $self;
    /**
     * The URL of the next page of results, if any.
     *
     * @var string
     */
    protected $nextPage;
    /**
     * The index of the first item returned on the page.
     *
     * @return int
     */
    public function getStartAt(): int
    {
        return $this->startAt;
    }
    /**
     * The index of the first item returned on the page.
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
     * Number of items that satisfy the search.
     *
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }
    /**
     * Number of items that satisfy the search.
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
    /**
     * Whether this is the last page.
     *
     * @return bool
     */
    public function getIsLast(): bool
    {
        return $this->isLast;
    }
    /**
     * Whether this is the last page.
     *
     * @param bool $isLast
     *
     * @return self
     */
    public function setIsLast(bool $isLast): self
    {
        $this->initialized['isLast'] = true;
        $this->isLast = $isLast;
        return $this;
    }
    /**
     * The maximum number of items that could be returned.
     *
     * @return int
     */
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }
    /**
     * The maximum number of items that could be returned.
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
     * The list of items.
     *
     * @return JiraStatus[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
    /**
     * The list of items.
     *
     * @param JiraStatus[] $values
     *
     * @return self
     */
    public function setValues(array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;
        return $this;
    }
    /**
     * The URL of this page.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of this page.
     *
     * @param string $self
     *
     * @return self
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;
        return $this;
    }
    /**
     * The URL of the next page of results, if any.
     *
     * @return string
     */
    public function getNextPage(): string
    {
        return $this->nextPage;
    }
    /**
     * The URL of the next page of results, if any.
     *
     * @param string $nextPage
     *
     * @return self
     */
    public function setNextPage(string $nextPage): self
    {
        $this->initialized['nextPage'] = true;
        $this->nextPage = $nextPage;
        return $this;
    }
}
