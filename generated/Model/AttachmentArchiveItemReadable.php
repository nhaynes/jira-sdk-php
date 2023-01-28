<?php

namespace JiraSdk\Model;

class AttachmentArchiveItemReadable
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
     * The path of the archive item.
     *
     * @var string
     */
    protected $path;
    /**
     * The position of the item within the archive.
     *
     * @var int
     */
    protected $index;
    /**
     * The size of the archive item.
     *
     * @var string
     */
    protected $size;
    /**
     * The MIME type of the archive item.
     *
     * @var string
     */
    protected $mediaType;
    /**
     * The label for the archive item.
     *
     * @var string
     */
    protected $label;
    /**
     * The path of the archive item.
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }
    /**
     * The path of the archive item.
     *
     * @param string $path
     *
     * @return self
     */
    public function setPath(string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;
        return $this;
    }
    /**
     * The position of the item within the archive.
     *
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }
    /**
     * The position of the item within the archive.
     *
     * @param int $index
     *
     * @return self
     */
    public function setIndex(int $index): self
    {
        $this->initialized['index'] = true;
        $this->index = $index;
        return $this;
    }
    /**
     * The size of the archive item.
     *
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }
    /**
     * The size of the archive item.
     *
     * @param string $size
     *
     * @return self
     */
    public function setSize(string $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;
        return $this;
    }
    /**
     * The MIME type of the archive item.
     *
     * @return string
     */
    public function getMediaType(): string
    {
        return $this->mediaType;
    }
    /**
     * The MIME type of the archive item.
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
     * The label for the archive item.
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }
    /**
     * The label for the archive item.
     *
     * @param string $label
     *
     * @return self
     */
    public function setLabel(string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;
        return $this;
    }
}
