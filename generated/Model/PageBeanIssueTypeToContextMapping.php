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

class PageBeanIssueTypeToContextMapping
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of the page.
     *
     * @var string
     */
    protected $self;
    /**
     * If there is another page of results, the URL of the next page.
     *
     * @var string
     */
    protected $nextPage;
    /**
     * The maximum number of items that could be returned.
     *
     * @var int
     */
    protected $maxResults;
    /**
     * The index of the first item returned.
     *
     * @var int
     */
    protected $startAt;
    /**
     * The number of items returned.
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
     * The list of items.
     *
     * @var IssueTypeToContextMapping[]
     */
    protected $values;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of the page.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the page.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * If there is another page of results, the URL of the next page.
     */
    public function getNextPage(): string
    {
        return $this->nextPage;
    }

    /**
     * If there is another page of results, the URL of the next page.
     */
    public function setNextPage(string $nextPage): self
    {
        $this->initialized['nextPage'] = true;
        $this->nextPage = $nextPage;

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
     * The index of the first item returned.
     */
    public function getStartAt(): int
    {
        return $this->startAt;
    }

    /**
     * The index of the first item returned.
     */
    public function setStartAt(int $startAt): self
    {
        $this->initialized['startAt'] = true;
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * The number of items returned.
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * The number of items returned.
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
     * The list of items.
     *
     * @return IssueTypeToContextMapping[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * The list of items.
     *
     * @param IssueTypeToContextMapping[] $values
     */
    public function setValues(array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;

        return $this;
    }
}
