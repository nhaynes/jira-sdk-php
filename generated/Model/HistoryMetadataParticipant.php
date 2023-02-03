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

class HistoryMetadataParticipant extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the user or system associated with a history record.
     *
     * @var string
     */
    protected $id;
    /**
     * The display name of the user or system associated with a history record.
     *
     * @var string
     */
    protected $displayName;
    /**
     * The key of the display name of the user or system associated with a history record.
     *
     * @var string
     */
    protected $displayNameKey;
    /**
     * The type of the user or system associated with a history record.
     *
     * @var string
     */
    protected $type;
    /**
     * The URL to an avatar for the user or system associated with a history record.
     *
     * @var string
     */
    protected $avatarUrl;
    /**
     * The URL of the user or system associated with a history record.
     *
     * @var string
     */
    protected $url;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the user or system associated with a history record.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the user or system associated with a history record.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The display name of the user or system associated with a history record.
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * The display name of the user or system associated with a history record.
     */
    public function setDisplayName(string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * The key of the display name of the user or system associated with a history record.
     */
    public function getDisplayNameKey(): string
    {
        return $this->displayNameKey;
    }

    /**
     * The key of the display name of the user or system associated with a history record.
     */
    public function setDisplayNameKey(string $displayNameKey): self
    {
        $this->initialized['displayNameKey'] = true;
        $this->displayNameKey = $displayNameKey;

        return $this;
    }

    /**
     * The type of the user or system associated with a history record.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of the user or system associated with a history record.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The URL to an avatar for the user or system associated with a history record.
     */
    public function getAvatarUrl(): string
    {
        return $this->avatarUrl;
    }

    /**
     * The URL to an avatar for the user or system associated with a history record.
     */
    public function setAvatarUrl(string $avatarUrl): self
    {
        $this->initialized['avatarUrl'] = true;
        $this->avatarUrl = $avatarUrl;

        return $this;
    }

    /**
     * The URL of the user or system associated with a history record.
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * The URL of the user or system associated with a history record.
     */
    public function setUrl(string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;

        return $this;
    }
}
