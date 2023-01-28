<?php

namespace JiraSdk\Model;

class ConvertedJQLQueries
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * The list of converted query strings with account IDs in place of user identifiers.
     *
     * @var string[]
     */
    protected $queryStrings;
    /**
     * List of queries containing user information that could not be mapped to an existing user
     *
     * @var JQLQueryWithUnknownUsers[]
     */
    protected $queriesWithUnknownUsers;
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
     *
     * @return self
     */
    public function setQueryStrings(array $queryStrings): self
    {
        $this->initialized['queryStrings'] = true;
        $this->queryStrings = $queryStrings;
        return $this;
    }
    /**
     * List of queries containing user information that could not be mapped to an existing user
     *
     * @return JQLQueryWithUnknownUsers[]
     */
    public function getQueriesWithUnknownUsers(): array
    {
        return $this->queriesWithUnknownUsers;
    }
    /**
     * List of queries containing user information that could not be mapped to an existing user
     *
     * @param JQLQueryWithUnknownUsers[] $queriesWithUnknownUsers
     *
     * @return self
     */
    public function setQueriesWithUnknownUsers(array $queriesWithUnknownUsers): self
    {
        $this->initialized['queriesWithUnknownUsers'] = true;
        $this->queriesWithUnknownUsers = $queriesWithUnknownUsers;
        return $this;
    }
}
