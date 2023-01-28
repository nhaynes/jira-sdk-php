<?php

namespace JiraSdk\Model;

class IssueTypeScreenSchemeMapping
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
     * The ID of the issue type or *default*. Only issue types used in classic projects are accepted. An entry for *default* must be provided and defines the mapping for all issue types without a screen scheme.
     *
     * @var string
     */
    protected $issueTypeId;
    /**
     * The ID of the screen scheme. Only screen schemes used in classic projects are accepted.
     *
     * @var string
     */
    protected $screenSchemeId;
    /**
     * The ID of the issue type or *default*. Only issue types used in classic projects are accepted. An entry for *default* must be provided and defines the mapping for all issue types without a screen scheme.
     *
     * @return string
     */
    public function getIssueTypeId(): string
    {
        return $this->issueTypeId;
    }
    /**
     * The ID of the issue type or *default*. Only issue types used in classic projects are accepted. An entry for *default* must be provided and defines the mapping for all issue types without a screen scheme.
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
    /**
     * The ID of the screen scheme. Only screen schemes used in classic projects are accepted.
     *
     * @return string
     */
    public function getScreenSchemeId(): string
    {
        return $this->screenSchemeId;
    }
    /**
     * The ID of the screen scheme. Only screen schemes used in classic projects are accepted.
     *
     * @param string $screenSchemeId
     *
     * @return self
     */
    public function setScreenSchemeId(string $screenSchemeId): self
    {
        $this->initialized['screenSchemeId'] = true;
        $this->screenSchemeId = $screenSchemeId;
        return $this;
    }
}
