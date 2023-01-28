<?php

namespace JiraSdk\Model;

class IssueChangelogIds
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
     * The list of changelog IDs.
     *
     * @var int[]
     */
    protected $changelogIds;
    /**
     * The list of changelog IDs.
     *
     * @return int[]
     */
    public function getChangelogIds(): array
    {
        return $this->changelogIds;
    }
    /**
     * The list of changelog IDs.
     *
     * @param int[] $changelogIds
     *
     * @return self
     */
    public function setChangelogIds(array $changelogIds): self
    {
        $this->initialized['changelogIds'] = true;
        $this->changelogIds = $changelogIds;
        return $this;
    }
}
