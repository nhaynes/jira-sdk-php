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

class Votes
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The URL of these issue vote details.
     *
     * @var string
     */
    protected $self;
    /**
     * The number of votes on the issue.
     *
     * @var int
     */
    protected $votes;
    /**
     * Whether the user making this request has voted on the issue.
     *
     * @var bool
     */
    protected $hasVoted;
    /**
     * List of the users who have voted on this issue. An empty list is returned when the calling user doesn't have the *View voters and watchers* project permission.
     *
     * @var User[]
     */
    protected $voters;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The URL of these issue vote details.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of these issue vote details.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The number of votes on the issue.
     */
    public function getVotes(): int
    {
        return $this->votes;
    }

    /**
     * The number of votes on the issue.
     */
    public function setVotes(int $votes): self
    {
        $this->initialized['votes'] = true;
        $this->votes = $votes;

        return $this;
    }

    /**
     * Whether the user making this request has voted on the issue.
     */
    public function getHasVoted(): bool
    {
        return $this->hasVoted;
    }

    /**
     * Whether the user making this request has voted on the issue.
     */
    public function setHasVoted(bool $hasVoted): self
    {
        $this->initialized['hasVoted'] = true;
        $this->hasVoted = $hasVoted;

        return $this;
    }

    /**
     * List of the users who have voted on this issue. An empty list is returned when the calling user doesn't have the *View voters and watchers* project permission.
     *
     * @return User[]
     */
    public function getVoters(): array
    {
        return $this->voters;
    }

    /**
     * List of the users who have voted on this issue. An empty list is returned when the calling user doesn't have the *View voters and watchers* project permission.
     *
     * @param User[] $voters
     */
    public function setVoters(array $voters): self
    {
        $this->initialized['voters'] = true;
        $this->voters = $voters;

        return $this;
    }
}
