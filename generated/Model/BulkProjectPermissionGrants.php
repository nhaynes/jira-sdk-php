<?php

namespace JiraSdk\Model;

class BulkProjectPermissionGrants
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
     * A project permission,
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
    /**
     * A project permission,
     *
     * @return string
     */
    public function getPermission(): string
    {
        return $this->permission;
    }
    /**
     * A project permission,
     *
     * @param string $permission
     *
     * @return self
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
     *
     * @return self
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
     *
     * @return self
     */
    public function setProjects(array $projects): self
    {
        $this->initialized['projects'] = true;
        $this->projects = $projects;
        return $this;
    }
}
