<?php

namespace JiraSdk\Model;

class BulkProjectPermissions
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
     *
     * @return self
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
     *
     * @return self
     */
    public function setPermissions(array $permissions): self
    {
        $this->initialized['permissions'] = true;
        $this->permissions = $permissions;
        return $this;
    }
}
