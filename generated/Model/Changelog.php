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

class Changelog
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the changelog.
     *
     * @var string
     */
    protected $id;
    /**
     * The user who made the change.
     *
     * @var ChangelogAuthor
     */
    protected $author;
    /**
     * The date on which the change took place.
     *
     * @var \DateTime
     */
    protected $created;
    /**
     * The list of items changed.
     *
     * @var ChangeDetails[]
     */
    protected $items;
    /**
     * The history metadata associated with the changed.
     *
     * @var ChangelogHistoryMetadata
     */
    protected $historyMetadata;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the changelog.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the changelog.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The user who made the change.
     */
    public function getAuthor(): ChangelogAuthor
    {
        return $this->author;
    }

    /**
     * The user who made the change.
     */
    public function setAuthor(ChangelogAuthor $author): self
    {
        $this->initialized['author'] = true;
        $this->author = $author;

        return $this;
    }

    /**
     * The date on which the change took place.
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * The date on which the change took place.
     */
    public function setCreated(\DateTime $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    /**
     * The list of items changed.
     *
     * @return ChangeDetails[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * The list of items changed.
     *
     * @param ChangeDetails[] $items
     */
    public function setItems(array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;

        return $this;
    }

    /**
     * The history metadata associated with the changed.
     */
    public function getHistoryMetadata(): ChangelogHistoryMetadata
    {
        return $this->historyMetadata;
    }

    /**
     * The history metadata associated with the changed.
     */
    public function setHistoryMetadata(ChangelogHistoryMetadata $historyMetadata): self
    {
        $this->initialized['historyMetadata'] = true;
        $this->historyMetadata = $historyMetadata;

        return $this;
    }
}
