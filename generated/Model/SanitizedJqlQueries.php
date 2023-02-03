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

class SanitizedJqlQueries
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of sanitized JQL queries.
     *
     * @var SanitizedJqlQuery[]
     */
    protected $queries;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of sanitized JQL queries.
     *
     * @return SanitizedJqlQuery[]
     */
    public function getQueries(): array
    {
        return $this->queries;
    }

    /**
     * The list of sanitized JQL queries.
     *
     * @param SanitizedJqlQuery[] $queries
     */
    public function setQueries(array $queries): self
    {
        $this->initialized['queries'] = true;
        $this->queries = $queries;

        return $this;
    }
}
