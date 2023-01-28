<?php

namespace JiraSdk\Model;

class DashboardDetails
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
     * The name of the dashboard.
     *
     * @var string
     */
    protected $name;
    /**
     * The description of the dashboard.
     *
     * @var string
     */
    protected $description;
    /**
     * The share permissions for the dashboard.
     *
     * @var SharePermission[]
     */
    protected $sharePermissions;
    /**
     * The edit permissions for the dashboard.
     *
     * @var SharePermission[]
     */
    protected $editPermissions;
    /**
     * The name of the dashboard.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the dashboard.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * The description of the dashboard.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * The description of the dashboard.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * The share permissions for the dashboard.
     *
     * @return SharePermission[]
     */
    public function getSharePermissions(): array
    {
        return $this->sharePermissions;
    }
    /**
     * The share permissions for the dashboard.
     *
     * @param SharePermission[] $sharePermissions
     *
     * @return self
     */
    public function setSharePermissions(array $sharePermissions): self
    {
        $this->initialized['sharePermissions'] = true;
        $this->sharePermissions = $sharePermissions;
        return $this;
    }
    /**
     * The edit permissions for the dashboard.
     *
     * @return SharePermission[]
     */
    public function getEditPermissions(): array
    {
        return $this->editPermissions;
    }
    /**
     * The edit permissions for the dashboard.
     *
     * @param SharePermission[] $editPermissions
     *
     * @return self
     */
    public function setEditPermissions(array $editPermissions): self
    {
        $this->initialized['editPermissions'] = true;
        $this->editPermissions = $editPermissions;
        return $this;
    }
}
