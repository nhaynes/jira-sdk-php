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

class PermissionGrants
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setPermissions(array $permissions): self
    {
        $this->initialized['permissions'] = true;
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * Expand options that include additional permission grant details in the response.
     */
    public function getExpand(): string
    {
        return $this->expand;
    }

    /**
     * Expand options that include additional permission grant details in the response.
     */
    public function setExpand(string $expand): self
    {
        $this->initialized['expand'] = true;
        $this->expand = $expand;

        return $this;
    }
}
