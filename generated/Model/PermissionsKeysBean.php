<?php

namespace JiraSdk\Model;

class PermissionsKeysBean
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
     * A list of permission keys.
     *
     * @var string[]
     */
    protected $permissions;
    /**
     * A list of permission keys.
     *
     * @return string[]
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }
    /**
     * A list of permission keys.
     *
     * @param string[] $permissions
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
