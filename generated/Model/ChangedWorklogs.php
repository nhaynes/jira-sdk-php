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

class ChangedWorklogs
{
    /**
     * @var array
     */
    protected $initialized = [];
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
     * @var bool
     */
    protected $lastPage;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setValues(array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;

        return $this;
    }

    /**
     * The datetime of the first worklog item in the list.
     */
    public function getSince(): int
    {
        return $this->since;
    }

    /**
     * The datetime of the first worklog item in the list.
     */
    public function setSince(int $since): self
    {
        $this->initialized['since'] = true;
        $this->since = $since;

        return $this;
    }

    /**
     * The datetime of the last worklog item in the list.
     */
    public function getUntil(): int
    {
        return $this->until;
    }

    /**
     * The datetime of the last worklog item in the list.
     */
    public function setUntil(int $until): self
    {
        $this->initialized['until'] = true;
        $this->until = $until;

        return $this;
    }

    /**
     * The URL of this changed worklogs list.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of this changed worklogs list.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The URL of the next list of changed worklogs.
     */
    public function getNextPage(): string
    {
        return $this->nextPage;
    }

    /**
     * The URL of the next list of changed worklogs.
     */
    public function setNextPage(string $nextPage): self
    {
        $this->initialized['nextPage'] = true;
        $this->nextPage = $nextPage;

        return $this;
    }

    public function getLastPage(): bool
    {
        return $this->lastPage;
    }

    public function setLastPage(bool $lastPage): self
    {
        $this->initialized['lastPage'] = true;
        $this->lastPage = $lastPage;

        return $this;
    }
}
