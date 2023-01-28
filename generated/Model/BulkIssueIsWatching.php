<?php

namespace JiraSdk\Model;

class BulkIssueIsWatching
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
     * The map of issue ID to boolean watch status.
     *
     * @var bool[]
     */
    protected $issuesIsWatching;
    /**
     * The map of issue ID to boolean watch status.
     *
     * @return bool[]
     */
    public function getIssuesIsWatching(): iterable
    {
        return $this->issuesIsWatching;
    }
    /**
     * The map of issue ID to boolean watch status.
     *
     * @param bool[] $issuesIsWatching
     *
     * @return self
     */
    public function setIssuesIsWatching(iterable $issuesIsWatching): self
    {
        $this->initialized['issuesIsWatching'] = true;
        $this->issuesIsWatching = $issuesIsWatching;
        return $this;
    }
}
