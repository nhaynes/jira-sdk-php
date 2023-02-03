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

class UserPermission extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
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
     * Indicate whether the permission key is deprecated. Note that deprecated keys cannot be used in the `permissions parameter of Get my permissions. Deprecated keys are not returned by Get all permissions.`.
     *
     * @var bool
     */
    protected $deprecatedKey;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the permission. Either `id` or `key` must be specified. Use [Get all permissions](#api-rest-api-3-permissions-get) to get the list of permissions.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the permission. Either `id` or `key` must be specified. Use [Get all permissions](#api-rest-api-3-permissions-get) to get the list of permissions.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The key of the permission. Either `id` or `key` must be specified. Use [Get all permissions](#api-rest-api-3-permissions-get) to get the list of permissions.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the permission. Either `id` or `key` must be specified. Use [Get all permissions](#api-rest-api-3-permissions-get) to get the list of permissions.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The name of the permission.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the permission.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The type of the permission.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of the permission.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The description of the permission.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the permission.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * Whether the permission is available to the user in the queried context.
     */
    public function getHavePermission(): bool
    {
        return $this->havePermission;
    }

    /**
     * Whether the permission is available to the user in the queried context.
     */
    public function setHavePermission(bool $havePermission): self
    {
        $this->initialized['havePermission'] = true;
        $this->havePermission = $havePermission;

        return $this;
    }

    /**
     * Indicate whether the permission key is deprecated. Note that deprecated keys cannot be used in the `permissions parameter of Get my permissions. Deprecated keys are not returned by Get all permissions.`.
     */
    public function getDeprecatedKey(): bool
    {
        return $this->deprecatedKey;
    }

    /**
     * Indicate whether the permission key is deprecated. Note that deprecated keys cannot be used in the `permissions parameter of Get my permissions. Deprecated keys are not returned by Get all permissions.`.
     */
    public function setDeprecatedKey(bool $deprecatedKey): self
    {
        $this->initialized['deprecatedKey'] = true;
        $this->deprecatedKey = $deprecatedKey;

        return $this;
    }
}
