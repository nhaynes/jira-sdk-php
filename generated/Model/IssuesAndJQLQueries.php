<?php

namespace JiraSdk\Model;

class IssuesAndJQLQueries
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
     * A list of JQL queries.
     *
     * @var string[]
     */
    protected $jqls;
    /**
     * A list of issue IDs.
     *
     * @var int[]
     */
    protected $issueIds;
    /**
     * A list of JQL queries.
     *
     * @return string[]
     */
    public function getJqls(): array
    {
        return $this->jqls;
    }
    /**
     * A list of JQL queries.
     *
     * @param string[] $jqls
     *
     * @return self
     */
    public function setJqls(array $jqls): self
    {
        $this->initialized['jqls'] = true;
        $this->jqls = $jqls;
        return $this;
    }
    /**
     * A list of issue IDs.
     *
     * @return int[]
     */
    public function getIssueIds(): array
    {
        return $this->issueIds;
    }
    /**
     * A list of issue IDs.
     *
     * @param int[] $issueIds
     *
     * @return self
     */
    public function setIssueIds(array $issueIds): self
    {
        $this->initialized['issueIds'] = true;
        $this->issueIds = $issueIds;
        return $this;
    }
}
