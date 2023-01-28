<?php

namespace JiraSdk\Model;

class IssueTypeScreenSchemeItem
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
     * The ID of the issue type screen scheme.
     *
     * @var string
     */
    protected $issueTypeScreenSchemeId;
    /**
     * The ID of the issue type or *default*. Only issue types used in classic projects are accepted. When creating an issue screen scheme, an entry for *default* must be provided and defines the mapping for all issue types without a screen scheme. Otherwise, a *default* entry can't be provided.
     *
     * @var string
     */
    protected $issueTypeId;
    /**
     * The ID of the screen scheme.
     *
     * @var string
     */
    protected $screenSchemeId;
    /**
     * The ID of the issue type screen scheme.
     *
     * @return string
     */
    public function getIssueTypeScreenSchemeId(): string
    {
        return $this->issueTypeScreenSchemeId;
    }
    /**
     * The ID of the issue type screen scheme.
     *
     * @param string $issueTypeScreenSchemeId
     *
     * @return self
     */
    public function setIssueTypeScreenSchemeId(string $issueTypeScreenSchemeId): self
    {
        $this->initialized['issueTypeScreenSchemeId'] = true;
        $this->issueTypeScreenSchemeId = $issueTypeScreenSchemeId;
        return $this;
    }
    /**
     * The ID of the issue type or *default*. Only issue types used in classic projects are accepted. When creating an issue screen scheme, an entry for *default* must be provided and defines the mapping for all issue types without a screen scheme. Otherwise, a *default* entry can't be provided.
     *
     * @return string
     */
    public function getIssueTypeId(): string
    {
        return $this->issueTypeId;
    }
    /**
     * The ID of the issue type or *default*. Only issue types used in classic projects are accepted. When creating an issue screen scheme, an entry for *default* must be provided and defines the mapping for all issue types without a screen scheme. Otherwise, a *default* entry can't be provided.
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
     * The ID of the screen scheme.
     *
     * @return string
     */
    public function getScreenSchemeId(): string
    {
        return $this->screenSchemeId;
    }
    /**
     * The ID of the screen scheme.
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
