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

class PagedListUserDetailsApplicationUser
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The number of items on the page.
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * The number of items on the page.
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
     */
    public function setItems(array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;

        return $this;
    }

    /**
     * The maximum number of results that could be on the page.
     */
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }

    /**
     * The maximum number of results that could be on the page.
     */
    public function setMaxResults(int $maxResults): self
    {
        $this->initialized['maxResults'] = true;
        $this->maxResults = $maxResults;

        return $this;
    }

    /**
     * The index of the first item returned on the page.
     */
    public function getStartIndex(): int
    {
        return $this->startIndex;
    }

    /**
     * The index of the first item returned on the page.
     */
    public function setStartIndex(int $startIndex): self
    {
        $this->initialized['startIndex'] = true;
        $this->startIndex = $startIndex;

        return $this;
    }

    /**
     * The index of the last item returned on the page.
     */
    public function getEndIndex(): int
    {
        return $this->endIndex;
    }

    /**
     * The index of the last item returned on the page.
     */
    public function setEndIndex(int $endIndex): self
    {
        $this->initialized['endIndex'] = true;
        $this->endIndex = $endIndex;

        return $this;
    }
}
