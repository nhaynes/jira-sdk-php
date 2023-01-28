<?php

namespace JiraSdk\Model;

class IssueCommentListRequestBean
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
     * The list of comment IDs. A maximum of 1000 IDs can be specified.
     *
     * @var int[]
     */
    protected $ids;
    /**
     * The list of comment IDs. A maximum of 1000 IDs can be specified.
     *
     * @return int[]
     */
    public function getIds(): array
    {
        return $this->ids;
    }
    /**
     * The list of comment IDs. A maximum of 1000 IDs can be specified.
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
