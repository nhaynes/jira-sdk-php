<?php

namespace JiraSdk\Model;

class AttachmentArchive
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
     *
     *
     * @var AttachmentArchiveEntry[]
     */
    protected $entries;
    /**
     *
     *
     * @var bool
     */
    protected $moreAvailable;
    /**
     *
     *
     * @var int
     */
    protected $totalNumberOfEntriesAvailable;
    /**
     *
     *
     * @var int
     */
    protected $totalEntryCount;
    /**
     *
     *
     * @return AttachmentArchiveEntry[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }
    /**
     *
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
     *
     *
     * @return bool
     */
    public function getMoreAvailable(): bool
    {
        return $this->moreAvailable;
    }
    /**
     *
     *
     * @param bool $moreAvailable
     *
     * @return self
     */
    public function setMoreAvailable(bool $moreAvailable): self
    {
        $this->initialized['moreAvailable'] = true;
        $this->moreAvailable = $moreAvailable;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getTotalNumberOfEntriesAvailable(): int
    {
        return $this->totalNumberOfEntriesAvailable;
    }
    /**
     *
     *
     * @param int $totalNumberOfEntriesAvailable
     *
     * @return self
     */
    public function setTotalNumberOfEntriesAvailable(int $totalNumberOfEntriesAvailable): self
    {
        $this->initialized['totalNumberOfEntriesAvailable'] = true;
        $this->totalNumberOfEntriesAvailable = $totalNumberOfEntriesAvailable;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getTotalEntryCount(): int
    {
        return $this->totalEntryCount;
    }
    /**
     *
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
