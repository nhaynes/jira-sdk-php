<?php

namespace JiraSdk\Model;

class AttachmentArchiveEntry
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
     * @var string
     */
    protected $name;
    /**
     *
     *
     * @var int
     */
    protected $size;
    /**
     *
     *
     * @var string
     */
    protected $mediaType;
    /**
     *
     *
     * @var int
     */
    protected $entryIndex;
    /**
     *
     *
     * @var string
     */
    protected $abbreviatedName;
    /**
     *
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     *
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }
    /**
     *
     *
     * @param int $size
     *
     * @return self
     */
    public function setSize(int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getMediaType(): string
    {
        return $this->mediaType;
    }
    /**
     *
     *
     * @param string $mediaType
     *
     * @return self
     */
    public function setMediaType(string $mediaType): self
    {
        $this->initialized['mediaType'] = true;
        $this->mediaType = $mediaType;
        return $this;
    }
    /**
     *
     *
     * @return int
     */
    public function getEntryIndex(): int
    {
        return $this->entryIndex;
    }
    /**
     *
     *
     * @param int $entryIndex
     *
     * @return self
     */
    public function setEntryIndex(int $entryIndex): self
    {
        $this->initialized['entryIndex'] = true;
        $this->entryIndex = $entryIndex;
        return $this;
    }
    /**
     *
     *
     * @return string
     */
    public function getAbbreviatedName(): string
    {
        return $this->abbreviatedName;
    }
    /**
     *
     *
     * @param string $abbreviatedName
     *
     * @return self
     */
    public function setAbbreviatedName(string $abbreviatedName): self
    {
        $this->initialized['abbreviatedName'] = true;
        $this->abbreviatedName = $abbreviatedName;
        return $this;
    }
}
