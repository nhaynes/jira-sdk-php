<?php

namespace JiraSdk\Model;

class PermissionGrants
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
     * Permission grants list.
     *
     * @var PermissionGrant[]
     */
    protected $permissions;
    /**
     * Expand options that include additional permission grant details in the response.
     *
     * @var string
     */
    protected $expand;
    /**
     * Permission grants list.
     *
     * @return PermissionGrant[]
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }
    /**
     * Permission grants list.
     *
     * @param PermissionGrant[] $permissions
     *
     * @return self
     */
    public function setPermissions(array $permissions): self
    {
        $this->initialized['permissions'] = true;
        $this->permissions = $permissions;
        return $this;
    }
    /**
     * Expand options that include additional permission grant details in the response.
     *
     * @return string
     */
    public function getExpand(): string
    {
        return $this->expand;
    }
    /**
     * Expand options that include additional permission grant details in the response.
     *
     * @param string $expand
     *
     * @return self
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;
        return $this;
    }
}
