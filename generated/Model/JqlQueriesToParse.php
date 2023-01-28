<?php

namespace JiraSdk\Model;

class JqlQueriesToParse
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
     * A list of queries to parse.
     *
     * @var string[]
     */
    protected $queries;
    /**
     * A list of queries to parse.
     *
     * @return string[]
     */
    public function getQueries(): array
    {
        return $this->queries;
    }
    /**
     * A list of queries to parse.
     *
     * @param string[] $queries
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
