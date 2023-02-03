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

class JexpJqlIssues
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The JQL query.
     *
     * @var string
     */
    protected $query;
    /**
     * The index of the first issue to return from the JQL query.
     *
     * @var int
     */
    protected $startAt;
    /**
     * The maximum number of issues to return from the JQL query. Inspect `meta.issues.jql.maxResults` in the response to ensure the maximum value has not been exceeded.
     *
     * @var int
     */
    protected $maxResults;
    /**
     * Determines how to validate the JQL query and treat the validation results.
     *
     * @var string
     */
    protected $validation = 'strict';

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The JQL query.
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * The JQL query.
     */
    public function setQuery(string $query): self
    {
        $this->initialized['query'] = true;
        $this->query = $query;

        return $this;
    }

    /**
     * The index of the first issue to return from the JQL query.
     */
    public function getStartAt(): int
    {
        return $this->startAt;
    }

    /**
     * The index of the first issue to return from the JQL query.
     */
    public function setStartAt(int $startAt): self
    {
        $this->initialized['startAt'] = true;
        $this->startAt = $startAt;

        return $this;
    }

    /**
     * The maximum number of issues to return from the JQL query. Inspect `meta.issues.jql.maxResults` in the response to ensure the maximum value has not been exceeded.
     */
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }

    /**
     * The maximum number of issues to return from the JQL query. Inspect `meta.issues.jql.maxResults` in the response to ensure the maximum value has not been exceeded.
     */
    public function setMaxResults(int $maxResults): self
    {
        $this->initialized['maxResults'] = true;
        $this->maxResults = $maxResults;

        return $this;
    }

    /**
     * Determines how to validate the JQL query and treat the validation results.
     */
    public function getValidation(): string
    {
        return $this->validation;
    }

    /**
     * Determines how to validate the JQL query and treat the validation results.
     */
    public function setValidation(string $validation): self
    {
        $this->initialized['validation'] = true;
        $this->validation = $validation;

        return $this;
    }
}
