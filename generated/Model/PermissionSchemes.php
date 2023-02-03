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

class PermissionSchemes
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * Permission schemes list.
     *
     * @var PermissionScheme[]
     */
    protected $permissionSchemes;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setPermissionSchemes(array $permissionSchemes): self
    {
        $this->initialized['permissionSchemes'] = true;
        $this->permissionSchemes = $permissionSchemes;

        return $this;
    }
}
