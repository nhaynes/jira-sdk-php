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

class ConvertedJQLQueries
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of converted query strings with account IDs in place of user identifiers.
     *
     * @var string[]
     */
    protected $queryStrings;
    /**
     * List of queries containing user information that could not be mapped to an existing user.
     *
     * @var JQLQueryWithUnknownUsers[]
     */
    protected $queriesWithUnknownUsers;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of converted query strings with account IDs in place of user identifiers.
     *
     * @return string[]
     */
    public function getQueryStrings(): array
    {
        return $this->queryStrings;
    }

    /**
     * The list of converted query strings with account IDs in place of user identifiers.
     *
     * @param string[] $queryStrings
     */
    public function setQueryStrings(array $queryStrings): self
    {
        $this->initialized['queryStrings'] = true;
        $this->queryStrings = $queryStrings;

        return $this;
    }

    /**
     * List of queries containing user information that could not be mapped to an existing user.
     *
     * @return JQLQueryWithUnknownUsers[]
     */
    public function getQueriesWithUnknownUsers(): array
    {
        return $this->queriesWithUnknownUsers;
    }

    /**
     * List of queries containing user information that could not be mapped to an existing user.
     *
     * @param JQLQueryWithUnknownUsers[] $queriesWithUnknownUsers
     */
    public function setQueriesWithUnknownUsers(array $queriesWithUnknownUsers): self
    {
        $this->initialized['queriesWithUnknownUsers'] = true;
        $this->queriesWithUnknownUsers = $queriesWithUnknownUsers;

        return $this;
    }
}
