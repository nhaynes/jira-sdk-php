<?php

namespace JiraSdk\Model;

class JQLPersonalDataMigrationRequest
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
     * A list of queries with user identifiers. Maximum of 100 queries.
     *
     * @var string[]
     */
    protected $queryStrings;
    /**
     * A list of queries with user identifiers. Maximum of 100 queries.
     *
     * @return string[]
     */
    public function getQueryStrings(): array
    {
        return $this->queryStrings;
    }
    /**
     * A list of queries with user identifiers. Maximum of 100 queries.
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
}
