<?php

namespace JiraSdk\Model;

class JqlQueriesToSanitize
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
     * The list of JQL queries to sanitize. Must contain unique values. Maximum of 20 queries.
     *
     * @var JqlQueryToSanitize[]
     */
    protected $queries;
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
