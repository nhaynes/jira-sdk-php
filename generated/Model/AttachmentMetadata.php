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

class AttachmentMetadata
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
     * The URL of the attachment metadata details.
     *
     * @var string
     */
    protected $self;
    /**
     * The name of the attachment file.
     *
     * @var string
     */
    protected $filename;
    /**
     * Details of the user who attached the file.
     *
     * @var AttachmentMetadataAuthor
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
     * Additional properties of the attachment.
     *
     * @var mixed[]
     */
    protected $properties;
    /**
     * The URL of the attachment.
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
     * The URL of the attachment metadata details.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the attachment metadata details.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The name of the attachment file.
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * The name of the attachment file.
     */
    public function setFilename(string $filename): self
    {
        $this->initialized['filename'] = true;
        $this->filename = $filename;

        return $this;
    }

    /**
     * Details of the user who attached the file.
     */
    public function getAuthor(): AttachmentMetadataAuthor
    {
        return $this->author;
    }

    /**
     * Details of the user who attached the file.
     */
    public function setAuthor(AttachmentMetadataAuthor $author): self
    {
        $this->initialized['author'] = true;
        $this->author = $author;

        return $this;
    }

    /**
     * The datetime the attachment was created.
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * The datetime the attachment was created.
     */
    public function setCreated(\DateTime $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    /**
     * The size of the attachment.
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * The size of the attachment.
     */
    public function setSize(int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * The MIME type of the attachment.
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * The MIME type of the attachment.
     */
    public function setMimeType(string $mimeType): self
    {
        $this->initialized['mimeType'] = true;
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * Additional properties of the attachment.
     *
     * @return mixed[]
     */
    public function getProperties(): iterable
    {
        return $this->properties;
    }

    /**
     * Additional properties of the attachment.
     *
     * @param mixed[] $properties
     */
    public function setProperties(iterable $properties): self
    {
        $this->initialized['properties'] = true;
        $this->properties = $properties;

        return $this;
    }

    /**
     * The URL of the attachment.
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * The URL of the attachment.
     */
    public function setContent(string $content): self
    {
        $this->initialized['content'] = true;
        $this->content = $content;

        return $this;
    }

    /**
     * The URL of a thumbnail representing the attachment.
     */
    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    /**
     * The URL of a thumbnail representing the attachment.
     */
    public function setThumbnail(string $thumbnail): self
    {
        $this->initialized['thumbnail'] = true;
        $this->thumbnail = $thumbnail;

        return $this;
    }
}
