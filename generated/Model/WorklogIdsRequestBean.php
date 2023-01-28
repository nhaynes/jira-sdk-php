<?php

namespace JiraSdk\Model;

class WorklogIdsRequestBean
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
     * A list of worklog IDs.
     *
     * @var int[]
     */
    protected $ids;
    /**
     * A list of worklog IDs.
     *
     * @return int[]
     */
    public function getIds(): array
    {
        return $this->ids;
    }
    /**
     * A list of worklog IDs.
     *
     * @param int[] $ids
     *
     * @return self
     */
    public function setIds(array $ids): self
    {
        $this->initialized['ids'] = true;
        $this->ids = $ids;
        return $this;
    }
}
