<?php

namespace JiraSdk\Model;

class SanitizedJqlQueries
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
     * The list of sanitized JQL queries.
     *
     * @var SanitizedJqlQuery[]
     */
    protected $queries;
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
     *
     * @return self
     */
    public function setQueries(array $queries): self
    {
        $this->initialized['queries'] = true;
        $this->queries = $queries;
        return $this;
    }
}
