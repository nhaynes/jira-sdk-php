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

class AttachmentArchiveImpl
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setEntries(array $entries): self
    {
        $this->initialized['entries'] = true;
        $this->entries = $entries;

        return $this;
    }

    /**
     * The number of items in the archive.
     */
    public function getTotalEntryCount(): int
    {
        return $this->totalEntryCount;
    }

    /**
     * The number of items in the archive.
     */
    public function setTotalEntryCount(int $totalEntryCount): self
    {
        $this->initialized['totalEntryCount'] = true;
        $this->totalEntryCount = $totalEntryCount;

        return $this;
    }
}
