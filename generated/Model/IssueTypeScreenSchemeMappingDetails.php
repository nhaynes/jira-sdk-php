<?php

namespace JiraSdk\Model;

class IssueTypeScreenSchemeMappingDetails
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
     * The list of issue type to screen scheme mappings. A *default* entry cannot be specified because a default entry is added when an issue type screen scheme is created.
     *
     * @var IssueTypeScreenSchemeMapping[]
     */
    protected $issueTypeMappings;
    /**
     * The list of issue type to screen scheme mappings. A *default* entry cannot be specified because a default entry is added when an issue type screen scheme is created.
     *
     * @return IssueTypeScreenSchemeMapping[]
     */
    public function getIssueTypeMappings(): array
    {
        return $this->issueTypeMappings;
    }
    /**
     * The list of issue type to screen scheme mappings. A *default* entry cannot be specified because a default entry is added when an issue type screen scheme is created.
     *
     * @param IssueTypeScreenSchemeMapping[] $issueTypeMappings
     *
     * @return self
     */
    public function setIssueTypeMappings(array $issueTypeMappings): self
    {
        $this->initialized['issueTypeMappings'] = true;
        $this->issueTypeMappings = $issueTypeMappings;
        return $this;
    }
}
