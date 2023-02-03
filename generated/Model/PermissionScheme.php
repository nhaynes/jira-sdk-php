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

class PermissionScheme extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The expand options available for the permission scheme.
     *
     * @var string
     */
    protected $expand;
    /**
     * The ID of the permission scheme.
     *
     * @var int
     */
    protected $id;
    /**
     * The URL of the permission scheme.
     *
     * @var string
     */
    protected $self;
    /**
     * The name of the permission scheme. Must be unique.
     *
     * @var string
     */
    protected $name;
    /**
     * A description for the permission scheme.
     *
     * @var string
     */
    protected $description;
    /**
     * The scope of the permission scheme.
     *
     * @var PermissionSchemeScope
     */
    protected $scope;
    /**
     * The permission scheme to create or update. See [About permission schemes and grants](../api-group-permission-schemes/#about-permission-schemes-and-grants) for more information.
     *
     * @var PermissionGrant[]
     */
    protected $permissions;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The expand options available for the permission scheme.
     */
    public function getExpand(): string
    {
        return $this->expand;
    }

    /**
     * The expand options available for the permission scheme.
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;

        return $this;
    }

    /**
     * The ID of the permission scheme.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The ID of the permission scheme.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The URL of the permission scheme.
     */
    public function getSelf(): string
    {
        return $this->self;
    }

    /**
     * The URL of the permission scheme.
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;

        return $this;
    }

    /**
     * The name of the permission scheme. Must be unique.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the permission scheme. Must be unique.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * A description for the permission scheme.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * A description for the permission scheme.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * The scope of the permission scheme.
     */
    public function getScope(): PermissionSchemeScope
    {
        return $this->scope;
    }

    /**
     * The scope of the permission scheme.
     */
    public function setScope(PermissionSchemeScope $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    /**
     * The permission scheme to create or update. See [About permission schemes and grants](../api-group-permission-schemes/#about-permission-schemes-and-grants) for more information.
     *
     * @return PermissionGrant[]
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * The permission scheme to create or update. See [About permission schemes and grants](../api-group-permission-schemes/#about-permission-schemes-and-grants) for more information.
     *
     * @param PermissionGrant[] $permissions
     */
    public function setPermissions(array $permissions): self
    {
        $this->initialized['permissions'] = true;
        $this->permissions = $permissions;

        return $this;
    }
}
