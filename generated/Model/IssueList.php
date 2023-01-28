<?php

namespace JiraSdk\Model;

class IssueList
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
     * The list of issue IDs.
     *
     * @var string[]
     */
    protected $issueIds;
    /**
     * The list of issue IDs.
     *
     * @return string[]
     */
    public function getIssueIds(): array
    {
        return $this->issueIds;
    }
    /**
     * The list of issue IDs.
     *
     * @param string[] $issueIds
     *
     * @return self
     */
    public function setIssueIds(array $issueIds): self
    {
        $this->initialized['issueIds'] = true;
        $this->issueIds = $issueIds;
        return $this;
    }
}
