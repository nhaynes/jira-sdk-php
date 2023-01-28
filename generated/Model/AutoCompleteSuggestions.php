<?php

namespace JiraSdk\Model;

class AutoCompleteSuggestions
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
     * The list of suggested item.
     *
     * @var AutoCompleteSuggestion[]
     */
    protected $results;
    /**
     * The list of suggested item.
     *
     * @return AutoCompleteSuggestion[]
     */
    public function getResults(): array
    {
        return $this->results;
    }
    /**
     * The list of suggested item.
     *
     * @param AutoCompleteSuggestion[] $results
     *
     * @return self
     */
    public function setResults(array $results): self
    {
        $this->initialized['results'] = true;
        $this->results = $results;
        return $this;
    }
}
