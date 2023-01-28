<?php

namespace JiraSdk\Model;

class ChangedWorklogs
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
     * Changed worklog list.
     *
     * @var ChangedWorklog[]
     */
    protected $values;
    /**
     * The datetime of the first worklog item in the list.
     *
     * @var int
     */
    protected $since;
    /**
     * The datetime of the last worklog item in the list.
     *
     * @var int
     */
    protected $until;
    /**
     * The URL of this changed worklogs list.
     *
     * @var string
     */
    protected $self;
    /**
     * The URL of the next list of changed worklogs.
     *
     * @var string
     */
    protected $nextPage;
    /**
     *
     *
     * @var bool
     */
    protected $lastPage;
    /**
     * Changed worklog list.
     *
     * @return ChangedWorklog[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
    /**
     * Changed worklog list.
     *
     * @param ChangedWorklog[] $values
     *
     * @return self
     */
    public function setValues(array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;
        return $this;
    }
    /**
     * The datetime of the first worklog item in the list.
     *
     * @return int
     */
    public function getSince(): int
    {
        return $this->since;
    }
    /**
     * The datetime of the first worklog item in the list.
     *
     * @param int $since
     *
     * @return self
     */
    public function setSince(int $since): self
    {
        $this->initialized['since'] = true;
        $this->since = $since;
        return $this;
    }
    /**
     * The datetime of the last worklog item in the list.
     *
     * @return int
     */
    public function getUntil(): int
    {
        return $this->until;
    }
    /**
     * The datetime of the last worklog item in the list.
     *
     * @param int $until
     *
     * @return self
     */
    public function setUntil(int $until): self
    {
        $this->initialized['until'] = true;
        $this->until = $until;
        return $this;
    }
    /**
     * The URL of this changed worklogs list.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of this changed worklogs list.
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
     * The URL of the next list of changed worklogs.
     *
     * @return string
     */
    public function getNextPage(): string
    {
        return $this->nextPage;
    }
    /**
     * The URL of the next list of changed worklogs.
     *
     * @param string $nextPage
     *
     * @return self
     */
    public function setNextPage(string $nextPage): self
    {
        $this->initialized['nextPage'] = true;
        $this->nextPage = $nextPage;
        return $this;
    }
    /**
     *
     *
     * @return bool
     */
    public function getLastPage(): bool
    {
        return $this->lastPage;
    }
    /**
     *
     *
     * @param bool $lastPage
     *
     * @return self
     */
    public function setLastPage(bool $lastPage): self
    {
        $this->initialized['lastPage'] = true;
        $this->lastPage = $lastPage;
        return $this;
    }
}
