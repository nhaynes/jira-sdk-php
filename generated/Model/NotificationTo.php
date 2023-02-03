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

class NotificationTo extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Whether the notification should be sent to the issue's reporter.
     *
     * @var bool
     */
    protected $reporter;
    /**
     * Whether the notification should be sent to the issue's assignees.
     *
     * @var bool
     */
    protected $assignee;
    /**
     * Whether the notification should be sent to the issue's watchers.
     *
     * @var bool
     */
    protected $watchers;
    /**
     * Whether the notification should be sent to the issue's voters.
     *
     * @var bool
     */
    protected $voters;
    /**
     * List of users to receive the notification.
     *
     * @var UserDetails[]
     */
    protected $users;
    /**
     * List of groups to receive the notification.
     *
     * @var GroupName[]
     */
    protected $groups;
    /**
     * List of groupIds to receive the notification.
     *
     * @var string[]
     */
    protected $groupIds;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Whether the notification should be sent to the issue's reporter.
     */
    public function getReporter(): bool
    {
        return $this->reporter;
    }

    /**
     * Whether the notification should be sent to the issue's reporter.
     */
    public function setReporter(bool $reporter): self
    {
        $this->initialized['reporter'] = true;
        $this->reporter = $reporter;

        return $this;
    }

    /**
     * Whether the notification should be sent to the issue's assignees.
     */
    public function getAssignee(): bool
    {
        return $this->assignee;
    }

    /**
     * Whether the notification should be sent to the issue's assignees.
     */
    public function setAssignee(bool $assignee): self
    {
        $this->initialized['assignee'] = true;
        $this->assignee = $assignee;

        return $this;
    }

    /**
     * Whether the notification should be sent to the issue's watchers.
     */
    public function getWatchers(): bool
    {
        return $this->watchers;
    }

    /**
     * Whether the notification should be sent to the issue's watchers.
     */
    public function setWatchers(bool $watchers): self
    {
        $this->initialized['watchers'] = true;
        $this->watchers = $watchers;

        return $this;
    }

    /**
     * Whether the notification should be sent to the issue's voters.
     */
    public function getVoters(): bool
    {
        return $this->voters;
    }

    /**
     * Whether the notification should be sent to the issue's voters.
     */
    public function setVoters(bool $voters): self
    {
        $this->initialized['voters'] = true;
        $this->voters = $voters;

        return $this;
    }

    /**
     * List of users to receive the notification.
     *
     * @return UserDetails[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * List of users to receive the notification.
     *
     * @param UserDetails[] $users
     */
    public function setUsers(array $users): self
    {
        $this->initialized['users'] = true;
        $this->users = $users;

        return $this;
    }

    /**
     * List of groups to receive the notification.
     *
     * @return GroupName[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * List of groups to receive the notification.
     *
     * @param GroupName[] $groups
     */
    public function setGroups(array $groups): self
    {
        $this->initialized['groups'] = true;
        $this->groups = $groups;

        return $this;
    }

    /**
     * List of groupIds to receive the notification.
     *
     * @return string[]
     */
    public function getGroupIds(): array
    {
        return $this->groupIds;
    }

    /**
     * List of groupIds to receive the notification.
     *
     * @param string[] $groupIds
     */
    public function setGroupIds(array $groupIds): self
    {
        $this->initialized['groupIds'] = true;
        $this->groupIds = $groupIds;

        return $this;
    }
}
