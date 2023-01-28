<?php

namespace JiraSdk\Model;

class IssueTypeSchemeMapping
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
     * The ID of the issue type scheme.
     *
     * @var string
     */
    protected $issueTypeSchemeId;
    /**
     * The ID of the issue type.
     *
     * @var string
     */
    protected $issueTypeId;
    /**
     * The ID of the issue type scheme.
     *
     * @return string
     */
    public function getIssueTypeSchemeId(): string
    {
        return $this->issueTypeSchemeId;
    }
    /**
     * The ID of the issue type scheme.
     *
     * @param string $issueTypeSchemeId
     *
     * @return self
     */
    public function setIssueTypeSchemeId(string $issueTypeSchemeId): self
    {
        $this->initialized['issueTypeSchemeId'] = true;
        $this->issueTypeSchemeId = $issueTypeSchemeId;
        return $this;
    }
    /**
     * The ID of the issue type.
     *
     * @return string
     */
    public function getIssueTypeId(): string
    {
        return $this->issueTypeId;
    }
    /**
     * The ID of the issue type.
     *
     * @param string $issueTypeId
     *
     * @return self
     */
    public function setIssueTypeId(string $issueTypeId): self
    {
        $this->initialized['issueTypeId'] = true;
        $this->issueTypeId = $issueTypeId;
        return $this;
    }
}
