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

class DashboardDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The name of the dashboard.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the dashboard.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The description of the dashboard.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * The description of the dashboard.
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
     */
    public function setEditPermissions(array $editPermissions): self
    {
        $this->initialized['editPermissions'] = true;
        $this->editPermissions = $editPermissions;

        return $this;
    }
}
