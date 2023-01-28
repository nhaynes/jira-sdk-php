<?php

namespace JiraSdk\Model;

class IssuesUpdateBean extends \ArrayObject
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
     * @var IssueUpdateDetails[]
     */
    protected $issueUpdates;
    /**
     *
     *
     * @return IssueUpdateDetails[]
     */
    public function getIssueUpdates(): array
    {
        return $this->issueUpdates;
    }
    /**
     *
     *
     * @param IssueUpdateDetails[] $issueUpdates
     *
     * @return self
     */
    public function setIssueUpdates(array $issueUpdates): self
    {
        $this->initialized['issueUpdates'] = true;
        $this->issueUpdates = $issueUpdates;
        return $this;
    }
}
