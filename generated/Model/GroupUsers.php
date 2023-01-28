<?php

namespace JiraSdk\Model;

class GroupUsers extends \ArrayObject
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
     * The number of items on the page.
     *
     * @var int
     */
    protected $size;
    /**
     * The list of items.
     *
     * @var UserDetails[]
     */
    protected $items;
    /**
     * The maximum number of results that could be on the page.
     *
     * @var int
     */
    protected $maxResults;
    /**
     * The index of the first item returned on the page.
     *
     * @var int
     */
    protected $startIndex;
    /**
     * The index of the last item returned on the page.
     *
     * @var int
     */
    protected $endIndex;
    /**
     * The number of items on the page.
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }
    /**
     * The number of items on the page.
     *
     * @param int $size
     *
     * @return self
     */
    public function setSize(int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;
        return $this;
    }
    /**
     * The list of items.
     *
     * @return UserDetails[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
    /**
     * The list of items.
     *
     * @param UserDetails[] $items
     *
     * @return self
     */
    public function setItems(array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;
        return $this;
    }
    /**
     * The maximum number of results that could be on the page.
     *
     * @return int
     */
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }
    /**
     * The maximum number of results that could be on the page.
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
     * The index of the first item returned on the page.
     *
     * @return int
     */
    public function getStartIndex(): int
    {
        return $this->startIndex;
    }
    /**
     * The index of the first item returned on the page.
     *
     * @param int $startIndex
     *
     * @return self
     */
    public function setStartIndex(int $startIndex): self
    {
        $this->initialized['startIndex'] = true;
        $this->startIndex = $startIndex;
        return $this;
    }
    /**
     * The index of the last item returned on the page.
     *
     * @return int
     */
    public function getEndIndex(): int
    {
        return $this->endIndex;
    }
    /**
     * The index of the last item returned on the page.
     *
     * @param int $endIndex
     *
     * @return self
     */
    public function setEndIndex(int $endIndex): self
    {
        $this->initialized['endIndex'] = true;
        $this->endIndex = $endIndex;
        return $this;
    }
}
