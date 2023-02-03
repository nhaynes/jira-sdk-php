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

class NotificationRestrict extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * List of group memberships required to receive the notification.
     *
     * @var GroupName[]
     */
    protected $groups;
    /**
     * List of groupId memberships required to receive the notification.
     *
     * @var string[]
     */
    protected $groupIds;
    /**
     * List of permissions required to receive the notification.
     *
     * @var RestrictedPermission[]
     */
    protected $permissions;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * List of group memberships required to receive the notification.
     *
     * @return GroupName[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * List of group memberships required to receive the notification.
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
     * List of groupId memberships required to receive the notification.
     *
     * @return string[]
     */
    public function getGroupIds(): array
    {
        return $this->groupIds;
    }

    /**
     * List of groupId memberships required to receive the notification.
     *
     * @param string[] $groupIds
     */
    public function setGroupIds(array $groupIds): self
    {
        $this->initialized['groupIds'] = true;
        $this->groupIds = $groupIds;

        return $this;
    }

    /**
     * List of permissions required to receive the notification.
     *
     * @return RestrictedPermission[]
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * List of permissions required to receive the notification.
     *
     * @param RestrictedPermission[] $permissions
     */
    public function setPermissions(array $permissions): self
    {
        $this->initialized['permissions'] = true;
        $this->permissions = $permissions;

        return $this;
    }
}
