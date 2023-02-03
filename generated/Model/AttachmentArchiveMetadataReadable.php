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

class AttachmentArchiveMetadataReadable
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the attachment.
     *
     * @var int
     */
    protected $id;
    /**
     * The name of the archive file.
     *
     * @var string
     */
    protected $name;
    /**
     * The list of the items included in the archive.
     *
     * @var AttachmentArchiveItemReadable[]
     */
    protected $entries;
    /**
     * The number of items included in the archive.
     *
     * @var int
     */
    protected $totalEntryCount;
    /**
     * The MIME type of the attachment.
     *
     * @var string
     */
    protected $mediaType;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the attachment.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The ID of the attachment.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The name of the archive file.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the archive file.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The list of the items included in the archive.
     *
     * @return AttachmentArchiveItemReadable[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * The list of the items included in the archive.
     *
     * @param AttachmentArchiveItemReadable[] $entries
     */
    public function setEntries(array $entries): self
    {
        $this->initialized['entries'] = true;
        $this->entries = $entries;

        return $this;
    }

    /**
     * The number of items included in the archive.
     */
    public function getTotalEntryCount(): int
    {
        return $this->totalEntryCount;
    }

    /**
     * The number of items included in the archive.
     */
    public function setTotalEntryCount(int $totalEntryCount): self
    {
        $this->initialized['totalEntryCount'] = true;
        $this->totalEntryCount = $totalEntryCount;

        return $this;
    }

    /**
     * The MIME type of the attachment.
     */
    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    /**
     * The MIME type of the attachment.
     */
    public function setMediaType(string $mediaType): self
    {
        $this->initialized['mediaType'] = true;
        $this->mediaType = $mediaType;

        return $this;
    }
}
