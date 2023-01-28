<?php

namespace JiraSdk\Model;

class NotificationRecipientsRestrictions
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
     *
     * @return self
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
     *
     * @return self
     */
    public function setPermissions(array $permissions): self
    {
        $this->initialized['permissions'] = true;
        $this->permissions = $permissions;
        return $this;
    }
}
