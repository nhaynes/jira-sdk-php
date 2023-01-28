<?php

namespace JiraSdk\Model;

class JiraExpressionsAnalysis
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
     * The results of Jira expressions analysis.
     *
     * @var JiraExpressionAnalysis[]
     */
    protected $results;
    /**
     * The results of Jira expressions analysis.
     *
     * @return JiraExpressionAnalysis[]
     */
    public function getResults(): array
    {
        return $this->results;
    }
    /**
     * The results of Jira expressions analysis.
     *
     * @param JiraExpressionAnalysis[] $results
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
