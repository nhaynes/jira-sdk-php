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

class PageOfStatuses
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The index of the first item returned on the page.
     */
    public function getStartAt(): int
    {
        return $this->startAt;
    }

    /**
     * The index of the first item returned on the page.
     */
    public function setStartAt(int $startAt): self
    {
        $this->initialized['startAt'] = true;
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * Number of items that satisfy the search.
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * Number of items that satisfy the search.
     */
    public function setTotal(int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;

        return $this;
    }

    /**
     * Whether this is the last page.
     */
    public function getIsLast(): bool
    {
        return $this->isLast;
    }

    /**
     * Whether this is the last page.
     */
    public function setIsLast(bool $isLast): self
    {
        $this->initialized['isLast'] = true;
        $this->isLast = $isLast;

        return $this;
    }

    /**
     * The maximum number of items that could be returned.
     */
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }

    /**
     * The maximum number of items that could be returned.
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
     */
    public function setValues(array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;

        return $this;
    }

    /**
     * The URL of this page.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of this page.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The URL of the next page of results, if any.
     */
    public function getNextPage(): string
    {
        return $this->nextPage;
    }

    /**
     * The URL of the next page of results, if any.
     */
    public function setNextPage(string $nextPage): self
    {
        $this->initialized['nextPage'] = true;
        $this->nextPage = $nextPage;

        return $this;
    }
}
