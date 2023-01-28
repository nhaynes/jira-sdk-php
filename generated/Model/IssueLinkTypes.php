<?php

namespace JiraSdk\Model;

class IssueLinkTypes
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
     * The issue link type bean.
     *
     * @var IssueLinkType[]
     */
    protected $issueLinkTypes;
    /**
     * The issue link type bean.
     *
     * @return IssueLinkType[]
     */
    public function getIssueLinkTypes(): array
    {
        return $this->issueLinkTypes;
    }
    /**
     * The issue link type bean.
     *
     * @param IssueLinkType[] $issueLinkTypes
     *
     * @return self
     */
    public function setIssueLinkTypes(array $issueLinkTypes): self
    {
        $this->initialized['issueLinkTypes'] = true;
        $this->issueLinkTypes = $issueLinkTypes;
        return $this;
    }
}
