<?php

namespace JiraSdk\Model;

class IssueTypeSchemeID
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
}
