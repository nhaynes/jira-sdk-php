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

class BulkProjectPermissions
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * List of issue IDs.
     *
     * @var int[]
     */
    protected $issues;
    /**
     * List of project IDs.
     *
     * @var int[]
     */
    protected $projects;
    /**
     * List of project permissions.
     *
     * @var string[]
     */
    protected $permissions;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * List of issue IDs.
     *
     * @return int[]
     */
    public function getIssues(): array
    {
        return $this->issues;
    }

    /**
     * List of issue IDs.
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
     * List of project IDs.
     *
     * @return int[]
     */
    public function getProjects(): array
    {
        return $this->projects;
    }

    /**
     * List of project IDs.
     *
     * @param int[] $projects
     */
    public function setProjects(array $projects): self
    {
        $this->initialized['projects'] = true;
        $this->projects = $projects;

        return $this;
    }

    /**
     * List of project permissions.
     *
     * @return string[]
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * List of project permissions.
     *
     * @param string[] $permissions
     */
    public function setPermissions(array $permissions): self
    {
        $this->initialized['permissions'] = true;
        $this->permissions = $permissions;

        return $this;
    }
}
