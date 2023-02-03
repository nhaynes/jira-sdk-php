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

class ParsedJqlQuery
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The JQL query that was parsed and validated.
     *
     * @var string
     */
    protected $query;
    /**
     * The syntax tree of the query. Empty if the query was invalid.
     *
     * @var ParsedJqlQueryStructure
     */
    protected $structure;
    /**
     * The list of syntax or validation errors.
     *
     * @var string[]
     */
    protected $errors;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The JQL query that was parsed and validated.
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * The JQL query that was parsed and validated.
     */
    public function setQuery(string $query): self
    {
        $this->initialized['query'] = true;
        $this->query = $query;

        return $this;
    }

    /**
     * The syntax tree of the query. Empty if the query was invalid.
     */
    public function getStructure(): ParsedJqlQueryStructure
    {
        return $this->structure;
    }

    /**
     * The syntax tree of the query. Empty if the query was invalid.
     */
    public function setStructure(ParsedJqlQueryStructure $structure): self
    {
        $this->initialized['structure'] = true;
        $this->structure = $structure;

        return $this;
    }

    /**
     * The list of syntax or validation errors.
     *
     * @return string[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * The list of syntax or validation errors.
     *
     * @param string[] $errors
     */
    public function setErrors(array $errors): self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;

        return $this;
    }
}
