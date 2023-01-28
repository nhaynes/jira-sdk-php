<?php

namespace JiraSdk\Model;

class UserApplicationRoles extends \ArrayObject
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
     * @var int
     */
    protected $size;
    /**
     *
     *
     * @var ApplicationRole[]
     */
    protected $items;
    /**
     *
     *
     * @var mixed
     */
    protected $pagingCallback;
    /**
     *
     *
     * @var mixed
     */
    protected $callback;
    /**
     *
     *
     * @var int
     */
    protected $maxResults;
    /**
     *
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }
    /**
     *
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
     *
     *
     * @return ApplicationRole[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
    /**
     *
     *
     * @param ApplicationRole[] $items
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
     *
     *
     * @return mixed
     */
    public function getPagingCallback()
    {
        return $this->pagingCallback;
    }
    /**
     *
     *
     * @param mixed $pagingCallback
     *
     * @return self
     */
    public function setPagingCallback($pagingCallback): self
    {
        $this->initialized['pagingCallback'] = true;
        $this->pagingCallback = $pagingCallback;
        return $this;
    }
    /**
     *
     *
     * @return mixed
     */
    public function getCallback()
    {
        return $this->callback;
    }
    /**
     *
     *
     * @param mixed $callback
     *
     * @return self
     */
    public function setCallback($callback): self
    {
        $this->initialized['callback'] = true;
        $this->callback = $callback;
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
}
