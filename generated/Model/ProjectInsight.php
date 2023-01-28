<?php

namespace JiraSdk\Model;

class ProjectInsight
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
     * Total issue count.
     *
     * @var int
     */
    protected $totalIssueCount;
    /**
     * The last issue update time.
     *
     * @var \DateTime
     */
    protected $lastIssueUpdateTime;
    /**
     * Total issue count.
     *
     * @return int
     */
    public function getTotalIssueCount(): int
    {
        return $this->totalIssueCount;
    }
    /**
     * Total issue count.
     *
     * @param int $totalIssueCount
     *
     * @return self
     */
    public function setTotalIssueCount(int $totalIssueCount): self
    {
        $this->initialized['totalIssueCount'] = true;
        $this->totalIssueCount = $totalIssueCount;
        return $this;
    }
    /**
     * The last issue update time.
     *
     * @return \DateTime
     */
    public function getLastIssueUpdateTime(): \DateTime
    {
        return $this->lastIssueUpdateTime;
    }
    /**
     * The last issue update time.
     *
     * @param \DateTime $lastIssueUpdateTime
     *
     * @return self
     */
    public function setLastIssueUpdateTime(\DateTime $lastIssueUpdateTime): self
    {
        $this->initialized['lastIssueUpdateTime'] = true;
        $this->lastIssueUpdateTime = $lastIssueUpdateTime;
        return $this;
    }
}
