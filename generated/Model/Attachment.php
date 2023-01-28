<?php

namespace JiraSdk\Model;

class Attachment extends \ArrayObject
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
     * The URL of the attachment details response.
     *
     * @var string
     */
    protected $self;
    /**
     * The ID of the attachment.
     *
     * @var string
     */
    protected $id;
    /**
     * The file name of the attachment.
     *
     * @var string
     */
    protected $filename;
    /**
     * Details of the user who added the attachment.
     *
     * @var AttachmentAuthor
     */
    protected $author;
    /**
     * The datetime the attachment was created.
     *
     * @var \DateTime
     */
    protected $created;
    /**
     * The size of the attachment.
     *
     * @var int
     */
    protected $size;
    /**
     * The MIME type of the attachment.
     *
     * @var string
     */
    protected $mimeType;
    /**
     * The content of the attachment.
     *
     * @var string
     */
    protected $content;
    /**
     * The URL of a thumbnail representing the attachment.
     *
     * @var string
     */
    protected $thumbnail;
    /**
     * The URL of the attachment details response.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the attachment details response.
     *
     * @param string $self
     *
     * @return self
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;
        return $this;
    }
    /**
     * The ID of the attachment.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the attachment.
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The file name of the attachment.
     *
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }
    /**
     * The file name of the attachment.
     *
     * @param string $filename
     *
     * @return self
     */
    public function setFilename(string $filename): self
    {
        $this->initialized['filename'] = true;
        $this->filename = $filename;
        return $this;
    }
    /**
     * Details of the user who added the attachment.
     *
     * @return AttachmentAuthor
     */
    public function getAuthor(): AttachmentAuthor
    {
        return $this->author;
    }
    /**
     * Details of the user who added the attachment.
     *
     * @param AttachmentAuthor $author
     *
     * @return self
     */
    public function setAuthor(AttachmentAuthor $author): self
    {
        $this->initialized['author'] = true;
        $this->author = $author;
        return $this;
    }
    /**
     * The datetime the attachment was created.
     *
     * @return \DateTime
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }
    /**
     * The datetime the attachment was created.
     *
     * @param \DateTime $created
     *
     * @return self
     */
    public function setCreated(\DateTime $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;
        return $this;
    }
    /**
     * The size of the attachment.
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }
    /**
     * The size of the attachment.
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
     * The MIME type of the attachment.
     *
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }
    /**
     * The MIME type of the attachment.
     *
     * @param string $mimeType
     *
     * @return self
     */
    public function setMimeType(string $mimeType): self
    {
        $this->initialized['mimeType'] = true;
        $this->mimeType = $mimeType;
        return $this;
    }
    /**
     * The content of the attachment.
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
    /**
     * The content of the attachment.
     *
     * @param string $content
     *
     * @return self
     */
    public function setContent(string $content): self
    {
        $this->initialized['content'] = true;
        $this->content = $content;
        return $this;
    }
    /**
     * The URL of a thumbnail representing the attachment.
     *
     * @return string
     */
    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }
    /**
     * The URL of a thumbnail representing the attachment.
     *
     * @param string $thumbnail
     *
     * @return self
     */
    public function setThumbnail(string $thumbnail): self
    {
        $this->initialized['thumbnail'] = true;
        $this->thumbnail = $thumbnail;
        return $this;
    }
}
