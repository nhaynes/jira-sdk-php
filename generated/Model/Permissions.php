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

class Permissions
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * List of permissions.
     *
     * @var UserPermission[]
     */
    protected $permissions;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setPermissions(iterable $permissions): self
    {
        $this->initialized['permissions'] = true;
        $this->permissions = $permissions;

        return $this;
    }
}
