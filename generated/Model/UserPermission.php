<?php

namespace JiraSdk\Model;

class UserPermission extends \ArrayObject
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
     * The ID of the permission. Either `id` or `key` must be specified. Use [Get all permissions](#api-rest-api-3-permissions-get) to get the list of permissions.
     *
     * @var string
     */
    protected $id;
    /**
     * The key of the permission. Either `id` or `key` must be specified. Use [Get all permissions](#api-rest-api-3-permissions-get) to get the list of permissions.
     *
     * @var string
     */
    protected $key;
    /**
     * The name of the permission.
     *
     * @var string
     */
    protected $name;
    /**
     * The type of the permission.
     *
     * @var string
     */
    protected $type;
    /**
     * The description of the permission.
     *
     * @var string
     */
    protected $description;
    /**
     * Whether the permission is available to the user in the queried context.
     *
     * @var bool
     */
    protected $havePermission;
    /**
     * Indicate whether the permission key is deprecated. Note that deprecated keys cannot be used in the `permissions parameter of Get my permissions. Deprecated keys are not returned by Get all permissions.`
     *
     * @var bool
     */
    protected $deprecatedKey;
    /**
     * The ID of the permission. Either `id` or `key` must be specified. Use [Get all permissions](#api-rest-api-3-permissions-get) to get the list of permissions.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the permission. Either `id` or `key` must be specified. Use [Get all permissions](#api-rest-api-3-permissions-get) to get the list of permissions.
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * The key of the permission. Either `id` or `key` must be specified. Use [Get all permissions](#api-rest-api-3-permissions-get) to get the list of permissions.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * The key of the permission. Either `id` or `key` must be specified. Use [Get all permissions](#api-rest-api-3-permissions-get) to get the list of permissions.
     *
     * @param string $key
     *
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * The name of the permission.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the permission.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The type of the permission.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * The type of the permission.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * The description of the permission.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the permission.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * Whether the permission is available to the user in the queried context.
     *
     * @return bool
     */
    public function getHavePermission(): bool
    {
        return $this->havePermission;
    }
    /**
     * Whether the permission is available to the user in the queried context.
     *
     * @param bool $havePermission
     *
     * @return self
     */
    public function setHavePermission(bool $havePermission): self
    {
        $this->initialized['havePermission'] = true;
        $this->havePermission = $havePermission;
        return $this;
    }
    /**
     * Indicate whether the permission key is deprecated. Note that deprecated keys cannot be used in the `permissions parameter of Get my permissions. Deprecated keys are not returned by Get all permissions.`
     *
     * @return bool
     */
    public function getDeprecatedKey(): bool
    {
        return $this->deprecatedKey;
    }
    /**
     * Indicate whether the permission key is deprecated. Note that deprecated keys cannot be used in the `permissions parameter of Get my permissions. Deprecated keys are not returned by Get all permissions.`
     *
     * @param bool $deprecatedKey
     *
     * @return self
     */
    public function setDeprecatedKey(bool $deprecatedKey): self
    {
        $this->initialized['deprecatedKey'] = true;
        $this->deprecatedKey = $deprecatedKey;
        return $this;
    }
}
