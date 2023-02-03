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

class JqlQueriesToSanitize
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of JQL queries to sanitize. Must contain unique values. Maximum of 20 queries.
     *
     * @var JqlQueryToSanitize[]
     */
    protected $queries;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of JQL queries to sanitize. Must contain unique values. Maximum of 20 queries.
     *
     * @return JqlQueryToSanitize[]
     */
    public function getQueries(): array
    {
        return $this->queries;
    }

    /**
     * The list of JQL queries to sanitize. Must contain unique values. Maximum of 20 queries.
     *
     * @param JqlQueryToSanitize[] $queries
     */
    public function setQueries(array $queries): self
    {
        $this->initialized['queries'] = true;
        $this->queries = $queries;

        return $this;
    }
}
