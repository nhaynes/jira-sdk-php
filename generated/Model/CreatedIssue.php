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

class CreatedIssue
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The ID of the created issue or subtask.
     *
     * @var string
     */
    protected $id;
    /**
     * The key of the created issue or subtask.
     *
     * @var string
     */
    protected $key;
    /**
     * The URL of the created issue or subtask.
     *
     * @var string
     */
    protected $self;
    /**
     * The response code and messages related to any requested transition.
     *
     * @var CreatedIssueTransition
     */
    protected $transition;
    /**
     * The response code and messages related to any requested watchers.
     *
     * @var CreatedIssueWatchers
     */
    protected $watchers;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the created issue or subtask.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the created issue or subtask.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The key of the created issue or subtask.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the created issue or subtask.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The URL of the created issue or subtask.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the created issue or subtask.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The response code and messages related to any requested transition.
     */
    public function getTransition(): CreatedIssueTransition
    {
        return $this->transition;
    }

    /**
     * The response code and messages related to any requested transition.
     */
    public function setTransition(CreatedIssueTransition $transition): self
    {
        $this->initialized['transition'] = true;
        $this->transition = $transition;

        return $this;
    }

    /**
     * The response code and messages related to any requested watchers.
     */
    public function getWatchers(): CreatedIssueWatchers
    {
        return $this->watchers;
    }

    /**
     * The response code and messages related to any requested watchers.
     */
    public function setWatchers(CreatedIssueWatchers $watchers): self
    {
        $this->initialized['watchers'] = true;
        $this->watchers = $watchers;

        return $this;
    }
}
