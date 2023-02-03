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

class ProjectRoleGroup
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The display name of the group.
     *
     * @var string
     */
    protected $displayName;
    /**
     * The name of the group. As a group's name can change, use of `groupId` is recommended to identify the group.
     *
     * @var string
     */
    protected $name;
    /**
     * The ID of the group.
     *
     * @var string
     */
    protected $groupId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The display name of the group.
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * The display name of the group.
     */
    public function setDisplayName(string $displayName): self
    {
        $this->initialized['displayName'] = true;
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * The name of the group. As a group's name can change, use of `groupId` is recommended to identify the group.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the group. As a group's name can change, use of `groupId` is recommended to identify the group.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The ID of the group.
     */
    public function getGroupId(): string
    {
        return $this->groupId;
    }

    /**
     * The ID of the group.
     */
    public function setGroupId(string $groupId): self
    {
        $this->initialized['groupId'] = true;
        $this->groupId = $groupId;

        return $this;
    }
}
