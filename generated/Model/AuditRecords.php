<?php

declare(strict_types=1);

/*
 * This file is part of the Jira SDK PHP project.
 *
 * (c) Nick Haynes (https://github.com/nhaynes)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JiraSdk\Api\Model;

class AuditRecords
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The number of audit items skipped before the first item in this list.
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * The number of audit items skipped before the first item in this list.
     */
    public function setOffset(int $offset): self
    {
        $this->initialized['offset'] = true;
        $this->offset = $offset;

        return $this;
    }

    /**
     * The requested or default limit on the number of audit items to be returned.
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * The requested or default limit on the number of audit items to be returned.
     */
    public function setLimit(int $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;

        return $this;
    }

    /**
     * The total number of audit items returned.
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * The total number of audit items returned.
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
     */
    public function setRecords(array $records): self
    {
        $this->initialized['records'] = true;
        $this->records = $records;

        return $this;
    }
}
