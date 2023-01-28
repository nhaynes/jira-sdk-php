<?php

namespace JiraSdk\Model;

class BulkPermissionsRequestBean
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
     * Project permissions with associated projects and issues to look up.
     *
     * @var BulkProjectPermissions[]
     */
    protected $projectPermissions;
    /**
     * Global permissions to look up.
     *
     * @var string[]
     */
    protected $globalPermissions;
    /**
     * The account ID of a user.
     *
     * @var string
     */
    protected $accountId;
    /**
     * Project permissions with associated projects and issues to look up.
     *
     * @return BulkProjectPermissions[]
     */
    public function getProjectPermissions(): array
    {
        return $this->projectPermissions;
    }
    /**
     * Project permissions with associated projects and issues to look up.
     *
     * @param BulkProjectPermissions[] $projectPermissions
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
     * Global permissions to look up.
     *
     * @return string[]
     */
    public function getGlobalPermissions(): array
    {
        return $this->globalPermissions;
    }
    /**
     * Global permissions to look up.
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
    /**
     * The account ID of a user.
     *
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }
    /**
     * The account ID of a user.
     *
     * @param string $accountId
     *
     * @return self
     */
    public function setAccountId(string $accountId): self
    {
        $this->initialized['accountId'] = true;
        $this->accountId = $accountId;
        return $this;
    }
}
