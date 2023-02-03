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

class PageOfDashboards
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
     * The maximum number of results that could be on the page.
     *
     * @var int
     */
    protected $maxResults;
    /**
     * The number of results on the page.
     *
     * @var int
     */
    protected $total;
    /**
     * The URL of the previous page of results, if any.
     *
     * @var string
     */
    protected $prev;
    /**
     * The URL of the next page of results, if any.
     *
     * @var string
     */
    protected $next;
    /**
     * List of dashboards.
     *
     * @var Dashboard[]
     */
    protected $dashboards;

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
     * The number of results on the page.
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * The number of results on the page.
     */
    public function setTotal(int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;

        return $this;
    }

    /**
     * The URL of the previous page of results, if any.
     */
    public function getPrev(): string
    {
        return $this->prev;
    }

    /**
     * The URL of the previous page of results, if any.
     */
    public function setPrev(string $prev): self
    {
        $this->initialized['prev'] = true;
        $this->prev = $prev;

        return $this;
    }

    /**
     * The URL of the next page of results, if any.
     */
    public function getNext(): string
    {
        return $this->next;
    }

    /**
     * The URL of the next page of results, if any.
     */
    public function setNext(string $next): self
    {
        $this->initialized['next'] = true;
        $this->next = $next;

        return $this;
    }

    /**
     * List of dashboards.
     *
     * @return Dashboard[]
     */
    public function getDashboards(): array
    {
        return $this->dashboards;
    }

    /**
     * List of dashboards.
     *
     * @param Dashboard[] $dashboards
     */
    public function setDashboards(array $dashboards): self
    {
        $this->initialized['dashboards'] = true;
        $this->dashboards = $dashboards;

        return $this;
    }
}
