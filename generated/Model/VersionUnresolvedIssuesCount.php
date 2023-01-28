<?php

namespace JiraSdk\Model;

class VersionUnresolvedIssuesCount
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
     * The URL of these count details.
     *
     * @var string
     */
    protected $self;
    /**
     * Count of unresolved issues.
     *
     * @var int
     */
    protected $issuesUnresolvedCount;
    /**
     * Count of issues.
     *
     * @var int
     */
    protected $issuesCount;
    /**
     * The URL of these count details.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of these count details.
     *
     * @param string $self
     *
     * @return self
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;
        return $this;
    }
    /**
     * Count of unresolved issues.
     *
     * @return int
     */
    public function getIssuesUnresolvedCount(): int
    {
        return $this->issuesUnresolvedCount;
    }
    /**
     * Count of unresolved issues.
     *
     * @param int $issuesUnresolvedCount
     *
     * @return self
     */
    public function setIssuesUnresolvedCount(int $issuesUnresolvedCount): self
    {
        $this->initialized['issuesUnresolvedCount'] = true;
        $this->issuesUnresolvedCount = $issuesUnresolvedCount;
        return $this;
    }
    /**
     * Count of issues.
     *
     * @return int
     */
    public function getIssuesCount(): int
    {
        return $this->issuesCount;
    }
    /**
     * Count of issues.
     *
     * @param int $issuesCount
     *
     * @return self
     */
    public function setIssuesCount(int $issuesCount): self
    {
        $this->initialized['issuesCount'] = true;
        $this->issuesCount = $issuesCount;
        return $this;
    }
}
