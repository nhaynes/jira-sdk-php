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

class Watchers
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of these issue watcher details.
     *
     * @var string
     */
    protected $self;
    /**
     * Whether the calling user is watching this issue.
     *
     * @var bool
     */
    protected $isWatching;
    /**
     * The number of users watching this issue.
     *
     * @var int
     */
    protected $watchCount;
    /**
     * Details of the users watching this issue.
     *
     * @var UserDetails[]
     */
    protected $watchers;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of these issue watcher details.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of these issue watcher details.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * Whether the calling user is watching this issue.
     */
    public function getIsWatching(): bool
    {
        return $this->isWatching;
    }

    /**
     * Whether the calling user is watching this issue.
     */
    public function setIsWatching(bool $isWatching): self
    {
        $this->initialized['isWatching'] = true;
        $this->isWatching = $isWatching;

        return $this;
    }

    /**
     * The number of users watching this issue.
     */
    public function getWatchCount(): int
    {
        return $this->watchCount;
    }

    /**
     * The number of users watching this issue.
     */
    public function setWatchCount(int $watchCount): self
    {
        $this->initialized['watchCount'] = true;
        $this->watchCount = $watchCount;

        return $this;
    }

    /**
     * Details of the users watching this issue.
     *
     * @return UserDetails[]
     */
    public function getWatchers(): array
    {
        return $this->watchers;
    }

    /**
     * Details of the users watching this issue.
     *
     * @param UserDetails[] $watchers
     */
    public function setWatchers(array $watchers): self
    {
        $this->initialized['watchers'] = true;
        $this->watchers = $watchers;

        return $this;
    }
}
