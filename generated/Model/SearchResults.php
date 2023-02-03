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

class SearchResults
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Expand options that include additional search result details in the response.
     *
     * @var string
     */
    protected $expand;
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
     * The list of issues found by the search.
     *
     * @var IssueBean[]
     */
    protected $issues;
    /**
     * Any warnings related to the JQL query.
     *
     * @var string[]
     */
    protected $warningMessages;
    /**
     * The ID and name of each field in the search results.
     *
     * @var string[]
     */
    protected $names;
    /**
     * The schema describing the field types in the search results.
     *
     * @var JsonTypeBean[]
     */
    protected $schema;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Expand options that include additional search result details in the response.
     */
    public function getExpand(): string
    {
        return $this->expand;
    }

    /**
     * Expand options that include additional search result details in the response.
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;

        return $this;
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
     * The list of issues found by the search.
     *
     * @return IssueBean[]
     */
    public function getIssues(): array
    {
        return $this->issues;
    }

    /**
     * The list of issues found by the search.
     *
     * @param IssueBean[] $issues
     */
    public function setIssues(array $issues): self
    {
        $this->initialized['issues'] = true;
        $this->issues = $issues;

        return $this;
    }

    /**
     * Any warnings related to the JQL query.
     *
     * @return string[]
     */
    public function getWarningMessages(): array
    {
        return $this->warningMessages;
    }

    /**
     * Any warnings related to the JQL query.
     *
     * @param string[] $warningMessages
     */
    public function setWarningMessages(array $warningMessages): self
    {
        $this->initialized['warningMessages'] = true;
        $this->warningMessages = $warningMessages;

        return $this;
    }

    /**
     * The ID and name of each field in the search results.
     *
     * @return string[]
     */
    public function getNames(): iterable
    {
        return $this->names;
    }

    /**
     * The ID and name of each field in the search results.
     *
     * @param string[] $names
     */
    public function setNames(iterable $names): self
    {
        $this->initialized['names'] = true;
        $this->names = $names;

        return $this;
    }

    /**
     * The schema describing the field types in the search results.
     *
     * @return JsonTypeBean[]
     */
    public function getSchema(): iterable
    {
        return $this->schema;
    }

    /**
     * The schema describing the field types in the search results.
     *
     * @param JsonTypeBean[] $schema
     */
    public function setSchema(iterable $schema): self
    {
        $this->initialized['schema'] = true;
        $this->schema = $schema;

        return $this;
    }
}
