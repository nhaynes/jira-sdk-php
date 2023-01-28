<?php

namespace JiraSdk\Model;

class Dashboard
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
     *
     *
     * @var string
     */
    protected $description;
    /**
     * The ID of the dashboard.
     *
     * @var string
     */
    protected $id;
    /**
     * Whether the dashboard is selected as a favorite by the user.
     *
     * @var bool
     */
    protected $isFavourite;
    /**
     * The name of the dashboard.
     *
     * @var string
     */
    protected $name;
    /**
     * The owner of the dashboard.
     *
     * @var DashboardOwner
     */
    protected $owner;
    /**
     * The number of users who have this dashboard as a favorite.
     *
     * @var int
     */
    protected $popularity;
    /**
     * The rank of this dashboard.
     *
     * @var int
     */
    protected $rank;
    /**
     * The URL of these dashboard details.
     *
     * @var string
     */
    protected $self;
    /**
     * The details of any view share permissions for the dashboard.
     *
     * @var SharePermission[]
     */
    protected $sharePermissions;
    /**
     * The details of any edit share permissions for the dashboard.
     *
     * @var SharePermission[]
     */
    protected $editPermissions;
    /**
     * The automatic refresh interval for the dashboard in milliseconds.
     *
     * @var int
     */
    protected $automaticRefreshMs;
    /**
     * The URL of the dashboard.
     *
     * @var string
     */
    protected $view;
    /**
     * Whether the current user has permission to edit the dashboard.
     *
     * @var bool
     */
    protected $isWritable;
    /**
     * Whether the current dashboard is system dashboard.
     *
     * @var bool
     */
    protected $systemDashboard;
    /**
     *
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     *
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
     * The ID of the dashboard.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    /**
     * The ID of the dashboard.
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * Whether the dashboard is selected as a favorite by the user.
     *
     * @return bool
     */
    public function getIsFavourite(): bool
    {
        return $this->isFavourite;
    }
    /**
     * Whether the dashboard is selected as a favorite by the user.
     *
     * @param bool $isFavourite
     *
     * @return self
     */
    public function setIsFavourite(bool $isFavourite): self
    {
        $this->initialized['isFavourite'] = true;
        $this->isFavourite = $isFavourite;
        return $this;
    }
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
     * The owner of the dashboard.
     *
     * @return DashboardOwner
     */
    public function getOwner(): DashboardOwner
    {
        return $this->owner;
    }
    /**
     * The owner of the dashboard.
     *
     * @param DashboardOwner $owner
     *
     * @return self
     */
    public function setOwner(DashboardOwner $owner): self
    {
        $this->initialized['owner'] = true;
        $this->owner = $owner;
        return $this;
    }
    /**
     * The number of users who have this dashboard as a favorite.
     *
     * @return int
     */
    public function getPopularity(): int
    {
        return $this->popularity;
    }
    /**
     * The number of users who have this dashboard as a favorite.
     *
     * @param int $popularity
     *
     * @return self
     */
    public function setPopularity(int $popularity): self
    {
        $this->initialized['popularity'] = true;
        $this->popularity = $popularity;
        return $this;
    }
    /**
     * The rank of this dashboard.
     *
     * @return int
     */
    public function getRank(): int
    {
        return $this->rank;
    }
    /**
     * The rank of this dashboard.
     *
     * @param int $rank
     *
     * @return self
     */
    public function setRank(int $rank): self
    {
        $this->initialized['rank'] = true;
        $this->rank = $rank;
        return $this;
    }
    /**
     * The URL of these dashboard details.
     *
     * @return string
     */
    public function getSelf(): string
    {
        return $this->self;
    }
    /**
     * The URL of these dashboard details.
     *
     * @param string $self
     *
     * @return self
     */
    public function setSelf(string $self): self
    {
        $this->initialized['self'] = true;
        $this->self = $self;
        return $this;
    }
    /**
     * The details of any view share permissions for the dashboard.
     *
     * @return SharePermission[]
     */
    public function getSharePermissions(): array
    {
        return $this->sharePermissions;
    }
    /**
     * The details of any view share permissions for the dashboard.
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
     * The details of any edit share permissions for the dashboard.
     *
     * @return SharePermission[]
     */
    public function getEditPermissions(): array
    {
        return $this->editPermissions;
    }
    /**
     * The details of any edit share permissions for the dashboard.
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
    /**
     * The automatic refresh interval for the dashboard in milliseconds.
     *
     * @return int
     */
    public function getAutomaticRefreshMs(): int
    {
        return $this->automaticRefreshMs;
    }
    /**
     * The automatic refresh interval for the dashboard in milliseconds.
     *
     * @param int $automaticRefreshMs
     *
     * @return self
     */
    public function setAutomaticRefreshMs(int $automaticRefreshMs): self
    {
        $this->initialized['automaticRefreshMs'] = true;
        $this->automaticRefreshMs = $automaticRefreshMs;
        return $this;
    }
    /**
     * The URL of the dashboard.
     *
     * @return string
     */
    public function getView(): string
    {
        return $this->view;
    }
    /**
     * The URL of the dashboard.
     *
     * @param string $view
     *
     * @return self
     */
    public function setView(string $view): self
    {
        $this->initialized['view'] = true;
        $this->view = $view;
        return $this;
    }
    /**
     * Whether the current user has permission to edit the dashboard.
     *
     * @return bool
     */
    public function getIsWritable(): bool
    {
        return $this->isWritable;
    }
    /**
     * Whether the current user has permission to edit the dashboard.
     *
     * @param bool $isWritable
     *
     * @return self
     */
    public function setIsWritable(bool $isWritable): self
    {
        $this->initialized['isWritable'] = true;
        $this->isWritable = $isWritable;
        return $this;
    }
    /**
     * Whether the current dashboard is system dashboard.
     *
     * @return bool
     */
    public function getSystemDashboard(): bool
    {
        return $this->systemDashboard;
    }
    /**
     * Whether the current dashboard is system dashboard.
     *
     * @param bool $systemDashboard
     *
     * @return self
     */
    public function setSystemDashboard(bool $systemDashboard): self
    {
        $this->initialized['systemDashboard'] = true;
        $this->systemDashboard = $systemDashboard;
        return $this;
    }
}
