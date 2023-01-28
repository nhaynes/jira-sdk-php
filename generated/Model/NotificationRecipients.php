<?php

namespace JiraSdk\Model;

class NotificationRecipients extends \ArrayObject
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
    /**
     * Whether the notification should be sent to the issue's reporter.
     *
     * @return bool
     */
    public function getReporter(): bool
    {
        return $this->reporter;
    }
    /**
     * Whether the notification should be sent to the issue's reporter.
     *
     * @param bool $reporter
     *
     * @return self
     */
    public function setReporter(bool $reporter): self
    {
        $this->initialized['reporter'] = true;
        $this->reporter = $reporter;
        return $this;
    }
    /**
     * Whether the notification should be sent to the issue's assignees.
     *
     * @return bool
     */
    public function getAssignee(): bool
    {
        return $this->assignee;
    }
    /**
     * Whether the notification should be sent to the issue's assignees.
     *
     * @param bool $assignee
     *
     * @return self
     */
    public function setAssignee(bool $assignee): self
    {
        $this->initialized['assignee'] = true;
        $this->assignee = $assignee;
        return $this;
    }
    /**
     * Whether the notification should be sent to the issue's watchers.
     *
     * @return bool
     */
    public function getWatchers(): bool
    {
        return $this->watchers;
    }
    /**
     * Whether the notification should be sent to the issue's watchers.
     *
     * @param bool $watchers
     *
     * @return self
     */
    public function setWatchers(bool $watchers): self
    {
        $this->initialized['watchers'] = true;
        $this->watchers = $watchers;
        return $this;
    }
    /**
     * Whether the notification should be sent to the issue's voters.
     *
     * @return bool
     */
    public function getVoters(): bool
    {
        return $this->voters;
    }
    /**
     * Whether the notification should be sent to the issue's voters.
     *
     * @param bool $voters
     *
     * @return self
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
     *
     * @return self
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
     *
     * @return self
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
     *
     * @return self
     */
    public function setGroupIds(array $groupIds): self
    {
        $this->initialized['groupIds'] = true;
        $this->groupIds = $groupIds;
        return $this;
    }
}
