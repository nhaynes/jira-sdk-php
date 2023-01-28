<?php

namespace JiraSdk\Model;

class FoundGroups
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
     * Header text indicating the number of groups in the response and the total number of groups found in the search.
     *
     * @var string
     */
    protected $header;
    /**
     * The total number of groups found in the search.
     *
     * @var int
     */
    protected $total;
    /**
     *
     *
     * @var FoundGroup[]
     */
    protected $groups;
    /**
     * Header text indicating the number of groups in the response and the total number of groups found in the search.
     *
     * @return string
     */
    public function getHeader(): string
    {
        return $this->header;
    }
    /**
     * Header text indicating the number of groups in the response and the total number of groups found in the search.
     *
     * @param string $header
     *
     * @return self
     */
    public function setHeader(string $header): self
    {
        $this->initialized['header'] = true;
        $this->header = $header;
        return $this;
    }
    /**
     * The total number of groups found in the search.
     *
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }
    /**
     * The total number of groups found in the search.
     *
     * @param int $total
     *
     * @return self
     */
    public function setTotal(int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
    /**
     *
     *
     * @return FoundGroup[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }
    /**
     *
     *
     * @param FoundGroup[] $groups
     *
     * @return self
     */
    public function setGroups(array $groups): self
    {
        $this->initialized['groups'] = true;
        $this->groups = $groups;
        return $this;
    }
}
