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

class IssuesJqlMetaDataBean
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The index of the first issue.
     *
     * @var int
     */
    protected $startAt;
    /**
     * The maximum number of issues that could be loaded in this evaluation.
     *
     * @var int
     */
    protected $maxResults;
    /**
     * The number of issues that were loaded in this evaluation.
     *
     * @var int
     */
    protected $count;
    /**
     * The total number of issues the JQL returned.
     *
     * @var int
     */
    protected $totalCount;
    /**
     * Any warnings related to the JQL query. Present only if the validation mode was set to `warn`.
     *
     * @var string[]
     */
    protected $validationWarnings;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The index of the first issue.
     */
    public function getStartAt(): int
    {
        return $this->startAt;
    }

    /**
     * The index of the first issue.
     */
    public function setStartAt(int $startAt): self
    {
        $this->initialized['startAt'] = true;
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * The maximum number of issues that could be loaded in this evaluation.
     */
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }

    /**
     * The maximum number of issues that could be loaded in this evaluation.
     */
    public function setMaxResults(int $maxResults): self
    {
        $this->initialized['maxResults'] = true;
        $this->maxResults = $maxResults;

        return $this;
    }

    /**
     * The number of issues that were loaded in this evaluation.
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * The number of issues that were loaded in this evaluation.
     */
    public function setCount(int $count): self
    {
        $this->initialized['count'] = true;
        $this->count = $count;

        return $this;
    }

    /**
     * The total number of issues the JQL returned.
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * The total number of issues the JQL returned.
     */
    public function setTotalCount(int $totalCount): self
    {
        $this->initialized['totalCount'] = true;
        $this->totalCount = $totalCount;

        return $this;
    }

    /**
     * Any warnings related to the JQL query. Present only if the validation mode was set to `warn`.
     *
     * @return string[]
     */
    public function getValidationWarnings(): array
    {
        return $this->validationWarnings;
    }

    /**
     * Any warnings related to the JQL query. Present only if the validation mode was set to `warn`.
     *
     * @param string[] $validationWarnings
     */
    public function setValidationWarnings(array $validationWarnings): self
    {
        $this->initialized['validationWarnings'] = true;
        $this->validationWarnings = $validationWarnings;

        return $this;
    }
}
