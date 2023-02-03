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

class BulkPermissionGrants
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * List of project permissions and the projects and issues those permissions provide access to.
     *
     * @var BulkProjectPermissionGrants[]
     */
    protected $projectPermissions;
    /**
     * List of permissions granted to the user.
     *
     * @var string[]
     */
    protected $globalPermissions;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * List of project permissions and the projects and issues those permissions provide access to.
     *
     * @return BulkProjectPermissionGrants[]
     */
    public function getProjectPermissions(): array
    {
        return $this->projectPermissions;
    }

    /**
     * List of project permissions and the projects and issues those permissions provide access to.
     *
     * @param BulkProjectPermissionGrants[] $projectPermissions
     */
    public function setProjectPermissions(array $projectPermissions): self
    {
        $this->initialized['projectPermissions'] = true;
        $this->projectPermissions = $projectPermissions;

        return $this;
    }

    /**
     * List of permissions granted to the user.
     *
     * @return string[]
     */
    public function getGlobalPermissions(): array
    {
        return $this->globalPermissions;
    }

    /**
     * List of permissions granted to the user.
     *
     * @param string[] $globalPermissions
     */
    public function setGlobalPermissions(array $globalPermissions): self
    {
        $this->initialized['globalPermissions'] = true;
        $this->globalPermissions = $globalPermissions;

        return $this;
    }
}
