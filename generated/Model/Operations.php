<?php

namespace JiraSdk\Model;

class Operations extends \ArrayObject
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
     * Details of the link groups defining issue operations.
     *
     * @var LinkGroup[]
     */
    protected $linkGroups;
    /**
     * Details of the link groups defining issue operations.
     *
     * @return LinkGroup[]
     */
    public function getLinkGroups(): array
    {
        return $this->linkGroups;
    }
    /**
     * Details of the link groups defining issue operations.
     *
     * @param LinkGroup[] $linkGroups
     *
     * @return self
     */
    public function setLinkGroups(array $linkGroups): self
    {
        $this->initialized['linkGroups'] = true;
        $this->linkGroups = $linkGroups;
        return $this;
    }
}
