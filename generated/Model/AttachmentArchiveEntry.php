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

class AttachmentArchiveEntry
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * @var int
     */
    protected $entryIndex;
    /**
     * @var string
     */
    protected $abbreviatedName;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $size;
    /**
     * @var string
     */
    protected $mediaType;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    public function getEntryIndex(): int
    {
        return $this->entryIndex;
    }

    public function setEntryIndex(int $entryIndex): self
    {
        $this->initialized['entryIndex'] = true;
        $this->entryIndex = $entryIndex;

        return $this;
    }

    public function getAbbreviatedName(): string
    {
        return $this->abbreviatedName;
    }

    public function setAbbreviatedName(string $abbreviatedName): self
    {
        $this->initialized['abbreviatedName'] = true;
        $this->abbreviatedName = $abbreviatedName;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    public function setMediaType(string $mediaType): self
    {
        $this->initialized['mediaType'] = true;
        $this->mediaType = $mediaType;

        return $this;
    }
}
