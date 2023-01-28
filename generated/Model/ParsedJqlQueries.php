<?php

namespace JiraSdk\Model;

class ParsedJqlQueries
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
     * A list of parsed JQL queries.
     *
     * @var ParsedJqlQuery[]
     */
    protected $queries;
    /**
     * A list of parsed JQL queries.
     *
     * @return ParsedJqlQuery[]
     */
    public function getQueries(): array
    {
        return $this->queries;
    }
    /**
     * A list of parsed JQL queries.
     *
     * @param ParsedJqlQuery[] $queries
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
