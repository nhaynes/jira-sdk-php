<?php

namespace JiraSdk\Model;

class JQLQueryWithUnknownUsers
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
     * The original query, for reference
     *
     * @var string
     */
    protected $originalQuery;
    /**
     * The converted query, with accountIDs instead of user identifiers, or 'unknown' for users that could not be found
     *
     * @var string
     */
    protected $convertedQuery;
    /**
     * The original query, for reference
     *
     * @return string
     */
    public function getOriginalQuery(): string
    {
        return $this->originalQuery;
    }
    /**
     * The original query, for reference
     *
     * @param string $originalQuery
     *
     * @return self
     */
    public function setOriginalQuery(string $originalQuery): self
    {
        $this->initialized['originalQuery'] = true;
        $this->originalQuery = $originalQuery;
        return $this;
    }
    /**
     * The converted query, with accountIDs instead of user identifiers, or 'unknown' for users that could not be found
     *
     * @return string
     */
    public function getConvertedQuery(): string
    {
        return $this->convertedQuery;
    }
    /**
     * The converted query, with accountIDs instead of user identifiers, or 'unknown' for users that could not be found
     *
     * @param string $convertedQuery
     *
     * @return self
     */
    public function setConvertedQuery(string $convertedQuery): self
    {
        $this->initialized['convertedQuery'] = true;
        $this->convertedQuery = $convertedQuery;
        return $this;
    }
}
