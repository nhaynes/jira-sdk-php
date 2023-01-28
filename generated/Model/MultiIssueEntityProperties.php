<?php

namespace JiraSdk\Model;

class MultiIssueEntityProperties
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
     * A list of issue IDs and their respective properties.
     *
     * @var IssueEntityPropertiesForMultiUpdate[]
     */
    protected $issues;
    /**
     * A list of issue IDs and their respective properties.
     *
     * @return IssueEntityPropertiesForMultiUpdate[]
     */
    public function getIssues(): array
    {
        return $this->issues;
    }
    /**
     * A list of issue IDs and their respective properties.
     *
     * @param IssueEntityPropertiesForMultiUpdate[] $issues
     *
     * @return self
     */
    public function setIssues(array $issues): self
    {
        $this->initialized['issues'] = true;
        $this->issues = $issues;
        return $this;
    }
}
