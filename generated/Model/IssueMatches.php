<?php

namespace JiraSdk\Model;

class IssueMatches
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
     *
     *
     * @var IssueMatchesForJQL[]
     */
    protected $matches;
    /**
     *
     *
     * @return IssueMatchesForJQL[]
     */
    public function getMatches(): array
    {
        return $this->matches;
    }
    /**
     *
     *
     * @param IssueMatchesForJQL[] $matches
     *
     * @return self
     */
    public function setMatches(array $matches): self
    {
        $this->initialized['matches'] = true;
        $this->matches = $matches;
        return $this;
    }
}
