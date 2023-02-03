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

class AttachmentArchive
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var bool
     */
    protected $moreAvailable;
    /**
     * @var int
     */
    protected $totalNumberOfEntriesAvailable;
    /**
     * @var int
     */
    protected $totalEntryCount;
    /**
     * @var AttachmentArchiveEntry[]
     */
    protected $entries;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getMoreAvailable(): bool
    {
        return $this->moreAvailable;
    }

    public function setMoreAvailable(bool $moreAvailable): self
    {
        $this->initialized['moreAvailable'] = true;
        $this->moreAvailable = $moreAvailable;

        return $this;
    }

    public function getTotalNumberOfEntriesAvailable(): int
    {
        return $this->totalNumberOfEntriesAvailable;
    }

    public function setTotalNumberOfEntriesAvailable(int $totalNumberOfEntriesAvailable): self
    {
        $this->initialized['totalNumberOfEntriesAvailable'] = true;
        $this->totalNumberOfEntriesAvailable = $totalNumberOfEntriesAvailable;

        return $this;
    }

    public function getTotalEntryCount(): int
    {
        return $this->totalEntryCount;
    }

    public function setTotalEntryCount(int $totalEntryCount): self
    {
        $this->initialized['totalEntryCount'] = true;
        $this->totalEntryCount = $totalEntryCount;

        return $this;
    }

    /**
     * @return AttachmentArchiveEntry[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param AttachmentArchiveEntry[] $entries
     */
    public function setEntries(array $entries): self
    {
        $this->initialized['entries'] = true;
        $this->entries = $entries;

        return $this;
    }
}
