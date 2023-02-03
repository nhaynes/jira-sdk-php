<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Model;

class SimpleListWrapperApplicationRole
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var int
     */
    protected $size;
    /**
     * @var ApplicationRole[]
     */
    protected $items;
    /**
     * @var mixed
     */
    protected $pagingCallback;
    /**
     * @var mixed
     */
    protected $callback;
    /**
     * @var int
     */
    protected $maxResults;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * @return ApplicationRole[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param ApplicationRole[] $items
     */
    public function setItems(array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPagingCallback()
    {
        return $this->pagingCallback;
    }

    /**
     * @param mixed $pagingCallback
     */
    public function setPagingCallback($pagingCallback): self
    {
        $this->initialized['pagingCallback'] = true;
        $this->pagingCallback = $pagingCallback;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @param mixed $callback
     */
    public function setCallback($callback): self
    {
        $this->initialized['callback'] = true;
        $this->callback = $callback;

        return $this;
    }

    public function getMaxResults(): int
    {
        return $this->maxResults;
    }

    public function setMaxResults(int $maxResults): self
    {
        $this->initialized['maxResults'] = true;
        $this->maxResults = $maxResults;

        return $this;
    }
}
