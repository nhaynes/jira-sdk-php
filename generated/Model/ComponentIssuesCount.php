<?php

namespace JiraSdk\Model;

class ComponentIssuesCount
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
     * The URL for this count of issues for a component.
     *
     * @var string
     */
    protected $self;
    /**
     * The count of issues assigned to a component.
     *
     * @var int
     */
    protected $issueCount;
    /**
     * The URL for this count of issues for a component.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL for this count of issues for a component.
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
     * The count of issues assigned to a component.
     *
     * @return int
     */
    public function getIssueCount(): int
    {
        return $this->issueCount;
    }
    /**
     * The count of issues assigned to a component.
     *
     * @param int $issueCount
     *
     * @return self
     */
    public function setIssueCount(int $issueCount): self
    {
        $this->initialized['issueCount'] = true;
        $this->issueCount = $issueCount;
        return $this;
    }
}
