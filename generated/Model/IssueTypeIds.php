<?php

namespace JiraSdk\Model;

class IssueTypeIds
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
     * The list of issue type IDs.
     *
     * @var string[]
     */
    protected $issueTypeIds;
    /**
     * The list of issue type IDs.
     *
     * @return string[]
     */
    public function getIssueTypeIds(): array
    {
        return $this->issueTypeIds;
    }
    /**
     * The list of issue type IDs.
     *
     * @param string[] $issueTypeIds
     *
     * @return self
     */
    public function setIssueTypeIds(array $issueTypeIds): self
    {
        $this->initialized['issueTypeIds'] = true;
        $this->issueTypeIds = $issueTypeIds;
        return $this;
    }
}
