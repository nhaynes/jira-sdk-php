<?php

namespace JiraSdk\Model;

class AuditRecords
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
     * The number of audit items skipped before the first item in this list.
     *
     * @var int
     */
    protected $offset;
    /**
     * The requested or default limit on the number of audit items to be returned.
     *
     * @var int
     */
    protected $limit;
    /**
     * The total number of audit items returned.
     *
     * @var int
     */
    protected $total;
    /**
     * The list of audit items.
     *
     * @var AuditRecordBean[]
     */
    protected $records;
    /**
     * The number of audit items skipped before the first item in this list.
     *
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }
    /**
     * The number of audit items skipped before the first item in this list.
     *
     * @param int $offset
     *
     * @return self
     */
    public function setOffset(int $offset): self
    {
        $this->initialized['offset'] = true;
        $this->offset = $offset;
        return $this;
    }
    /**
     * The requested or default limit on the number of audit items to be returned.
     *
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }
    /**
     * The requested or default limit on the number of audit items to be returned.
     *
     * @param int $limit
     *
     * @return self
     */
    public function setLimit(int $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;
        return $this;
    }
    /**
     * The total number of audit items returned.
     *
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }
    /**
     * The total number of audit items returned.
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
     * The list of audit items.
     *
     * @return AuditRecordBean[]
     */
    public function getRecords(): array
    {
        return $this->records;
    }
    /**
     * The list of audit items.
     *
     * @param AuditRecordBean[] $records
     *
     * @return self
     */
    public function setRecords(array $records): self
    {
        $this->initialized['records'] = true;
        $this->records = $records;
        return $this;
    }
}
