<?php

namespace JiraSdk\Model;

class Permissions
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
     * List of permissions.
     *
     * @var UserPermission[]
     */
    protected $permissions;
    /**
     * List of permissions.
     *
     * @return UserPermission[]
     */
    public function getPermissions(): iterable
    {
        return $this->permissions;
    }
    /**
     * List of permissions.
     *
     * @param UserPermission[] $permissions
     *
     * @return self
     */
    public function setPermissions(iterable $permissions): self
    {
        $this->initialized['permissions'] = true;
        $this->permissions = $permissions;
        return $this;
    }
}
