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

class PageOfWorklogs extends \ArrayObject
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
     * List of worklogs.
     *
     * @var Worklog[]
     */
    protected $worklogs;

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
     * List of worklogs.
     *
     * @return Worklog[]
     */
    public function getWorklogs(): array
    {
        return $this->worklogs;
    }

    /**
     * List of worklogs.
     *
     * @param Worklog[] $worklogs
     */
    public function setWorklogs(array $worklogs): self
    {
        $this->initialized['worklogs'] = true;
        $this->worklogs = $worklogs;

        return $this;
    }
}
