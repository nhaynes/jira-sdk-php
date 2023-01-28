<?php

namespace JiraSdk\Model;

class IssueEntityPropertiesForMultiUpdate
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
     * The ID of the issue.
     *
     * @var int
     */
    protected $issueID;
    /**
     * Entity properties to set on the issue. The maximum length of an issue property value is 32768 characters.
     *
     * @var JsonNode[]
     */
    protected $properties;
    /**
     * The ID of the issue.
     *
     * @return int
     */
    public function getIssueID(): int
    {
        return $this->issueID;
    }
    /**
     * The ID of the issue.
     *
     * @param int $issueID
     *
     * @return self
     */
    public function setIssueID(int $issueID): self
    {
        $this->initialized['issueID'] = true;
        $this->issueID = $issueID;
        return $this;
    }
    /**
     * Entity properties to set on the issue. The maximum length of an issue property value is 32768 characters.
     *
     * @return JsonNode[]
     */
    public function getProperties(): iterable
    {
        return $this->properties;
    }
    /**
     * Entity properties to set on the issue. The maximum length of an issue property value is 32768 characters.
     *
     * @param JsonNode[] $properties
     *
     * @return self
     */
    public function setProperties(iterable $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;
        return $this;
    }
}
