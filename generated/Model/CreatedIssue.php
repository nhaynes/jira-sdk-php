<?php

namespace JiraSdk\Model;

class CreatedIssue
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
    /**
     * The ID of the created issue or subtask.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the created issue or subtask.
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
     * The key of the created issue or subtask.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The key of the created issue or subtask.
     *
     * @param string $key
     *
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * The URL of the created issue or subtask.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of the created issue or subtask.
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
     * The response code and messages related to any requested transition.
     *
     * @return CreatedIssueTransition
     */
    public function getTransition(): CreatedIssueTransition
    {
        return $this->transition;
    }
    /**
     * The response code and messages related to any requested transition.
     *
     * @param CreatedIssueTransition $transition
     *
     * @return self
     */
    public function setTransition(CreatedIssueTransition $transition): self
    {
        $this->initialized['transition'] = true;
        $this->transition = $transition;
        return $this;
    }
    /**
     * The response code and messages related to any requested watchers.
     *
     * @return CreatedIssueWatchers
     */
    public function getWatchers(): CreatedIssueWatchers
    {
        return $this->watchers;
    }
    /**
     * The response code and messages related to any requested watchers.
     *
     * @param CreatedIssueWatchers $watchers
     *
     * @return self
     */
    public function setWatchers(CreatedIssueWatchers $watchers): self
    {
        $this->initialized['watchers'] = true;
        $this->watchers = $watchers;
        return $this;
    }
}
