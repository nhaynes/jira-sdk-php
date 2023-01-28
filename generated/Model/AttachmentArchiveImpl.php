<?php

namespace JiraSdk\Model;

class AttachmentArchiveImpl
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
     * The list of the items included in the archive.
     *
     * @var AttachmentArchiveEntry[]
     */
    protected $entries;
    /**
     * The number of items in the archive.
     *
     * @var int
     */
    protected $totalEntryCount;
    /**
     * The list of the items included in the archive.
     *
     * @return AttachmentArchiveEntry[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }
    /**
     * The list of the items included in the archive.
     *
     * @param AttachmentArchiveEntry[] $entries
     *
     * @return self
     */
    public function setEntries(array $entries): self
    {
        $this->initialized['entries'] = true;
        $this->entries = $entries;
        return $this;
    }
    /**
     * The number of items in the archive.
     *
     * @return int
     */
    public function getTotalEntryCount(): int
    {
        return $this->totalEntryCount;
    }
    /**
     * The number of items in the archive.
     *
     * @param int $totalEntryCount
     *
     * @return self
     */
    public function setTotalEntryCount(int $totalEntryCount): self
    {
        $this->initialized['totalEntryCount'] = true;
        $this->totalEntryCount = $totalEntryCount;
        return $this;
    }
}
