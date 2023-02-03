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

class BulkPermissionsRequestBean
{
    /**
     * @var array
     */
    protected $initialized = [];
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

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

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
     */
    public function setGlobalPermissions(array $globalPermissions): self
    {
        $this->initialized['globalPermissions'] = true;
        $this->globalPermissions = $globalPermissions;

        return $this;
    }

    /**
     * The account ID of a user.
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * The account ID of a user.
     */
    public function setAccountId(string $accountId): self
    {
        $this->initialized['accountId'] = true;
        $this->accountId = $accountId;

        return $this;
    }
}
