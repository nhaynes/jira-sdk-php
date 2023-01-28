<?php

namespace JiraSdk\Model;

class BulkPermissionGrants
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
     *
     * @return self
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
     *
     * @return self
     */
    public function setGlobalPermissions(array $globalPermissions): self
    {
        $this->initialized['globalPermissions'] = true;
        $this->globalPermissions = $globalPermissions;
        return $this;
    }
}
