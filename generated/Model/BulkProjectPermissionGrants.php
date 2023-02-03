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

class BulkProjectPermissionGrants
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * A project permission,.
     *
     * @var string
     */
    protected $permission;
    /**
     * IDs of the issues the user has the permission for.
     *
     * @var int[]
     */
    protected $issues;
    /**
     * IDs of the projects the user has the permission for.
     *
     * @var int[]
     */
    protected $projects;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * A project permission,.
     */
    public function getPermission(): string
    {
        return $this->permission;
    }

    /**
     * A project permission,.
     */
    public function setPermission(string $permission): self
    {
        $this->initialized['permission'] = true;
        $this->permission = $permission;

        return $this;
    }

    /**
     * IDs of the issues the user has the permission for.
     *
     * @return int[]
     */
    public function getIssues(): array
    {
        return $this->issues;
    }

    /**
     * IDs of the issues the user has the permission for.
     *
     * @param int[] $issues
     */
    public function setIssues(array $issues): self
    {
        $this->initialized['issues'] = true;
        $this->issues = $issues;

        return $this;
    }

    /**
     * IDs of the projects the user has the permission for.
     *
     * @return int[]
     */
    public function getProjects(): array
    {
        return $this->projects;
    }

    /**
     * IDs of the projects the user has the permission for.
     *
     * @param int[] $projects
     */
    public function setProjects(array $projects): self
    {
        $this->initialized['projects'] = true;
        $this->projects = $projects;

        return $this;
    }
}
