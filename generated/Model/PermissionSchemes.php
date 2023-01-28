<?php

namespace JiraSdk\Model;

class PermissionSchemes
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
     * Permission schemes list.
     *
     * @var PermissionScheme[]
     */
    protected $permissionSchemes;
    /**
     * Permission schemes list.
     *
     * @return PermissionScheme[]
     */
    public function getPermissionSchemes(): array
    {
        return $this->permissionSchemes;
    }
    /**
     * Permission schemes list.
     *
     * @param PermissionScheme[] $permissionSchemes
     *
     * @return self
     */
    public function setPermissionSchemes(array $permissionSchemes): self
    {
        $this->initialized['permissionSchemes'] = true;
        $this->permissionSchemes = $permissionSchemes;
        return $this;
    }
}
