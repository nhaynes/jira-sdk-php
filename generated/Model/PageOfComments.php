<?php

namespace JiraSdk\Model;

class PageOfComments extends \ArrayObject
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
     * The index of the first item returned.
     *
     * @var int
     */
    protected $startAt;
    /**
     * The maximum number of items that could be returned.
     *
     * @var int
     */
    protected $maxResults;
    /**
     * The number of items returned.
     *
     * @var int
     */
    protected $total;
    /**
     * The list of comments.
     *
     * @var Comment[]
     */
    protected $comments;
    /**
     * The index of the first item returned.
     *
     * @return int
     */
    public function getStartAt(): int
    {
        return $this->startAt;
    }
    /**
     * The index of the first item returned.
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
     * The number of items returned.
     *
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }
    /**
     * The number of items returned.
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
     * The list of comments.
     *
     * @return Comment[]
     */
    public function getComments(): array
    {
        return $this->comments;
    }
    /**
     * The list of comments.
     *
     * @param Comment[] $comments
     *
     * @return self
     */
    public function setComments(array $comments): self
    {
        $this->initialized['comments'] = true;
        $this->comments = $comments;
        return $this;
    }
}
