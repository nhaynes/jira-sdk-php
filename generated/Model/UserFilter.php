<?php

namespace JiraSdk\Model;

class UserFilter extends \ArrayObject
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
     * Whether the filter is enabled.
     *
     * @var bool
     */
    protected $enabled;
    /**
     * User groups autocomplete suggestion users must belong to. If not provided, the default values are used. A maximum of 10 groups can be provided.
     *
     * @var string[]
     */
    protected $groups;
    /**
     * Roles that autocomplete suggestion users must belong to. If not provided, the default values are used. A maximum of 10 roles can be provided.
     *
     * @var int[]
     */
    protected $roleIds;
    /**
     * Whether the filter is enabled.
     *
     * @return bool
     */
    public function getEnabled(): bool
    {
        return $this->enabled;
    }
    /**
     * Whether the filter is enabled.
     *
     * @param bool $enabled
     *
     * @return self
     */
    public function setEnabled(bool $enabled): self
    {
        $this->initialized['enabled'] = true;
        $this->enabled = $enabled;
        return $this;
    }
    /**
     * User groups autocomplete suggestion users must belong to. If not provided, the default values are used. A maximum of 10 groups can be provided.
     *
     * @return string[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }
    /**
     * User groups autocomplete suggestion users must belong to. If not provided, the default values are used. A maximum of 10 groups can be provided.
     *
     * @param string[] $groups
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
     * Roles that autocomplete suggestion users must belong to. If not provided, the default values are used. A maximum of 10 roles can be provided.
     *
     * @return int[]
     */
    public function getRoleIds(): array
    {
        return $this->roleIds;
    }
    /**
     * Roles that autocomplete suggestion users must belong to. If not provided, the default values are used. A maximum of 10 roles can be provided.
     *
     * @param int[] $roleIds
     *
     * @return self
     */
    public function setRoleIds(array $roleIds): self
    {
        $this->initialized['roleIds'] = true;
        $this->roleIds = $roleIds;
        return $this;
    }
}
