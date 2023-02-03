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

class ActorsMap
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The user account ID of the user to add.
     *
     * @var string[]
     */
    protected $user;
    /**
     * The name of the group to add. This parameter cannot be used with the `groupId` parameter. As a group's name can change, use of `groupId` is recommended.
     *
     * @var string[]
     */
    protected $group;
    /**
     * The ID of the group to add. This parameter cannot be used with the `group` parameter.
     *
     * @var string[]
     */
    protected $groupId;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The user account ID of the user to add.
     *
     * @return string[]
     */
    public function getUser(): array
    {
        return $this->user;
    }

    /**
     * The user account ID of the user to add.
     *
     * @param string[] $user
     */
    public function setUser(array $user): self
    {
        $this->initialized['user'] = true;
        $this->user = $user;

        return $this;
    }

    /**
     * The name of the group to add. This parameter cannot be used with the `groupId` parameter. As a group's name can change, use of `groupId` is recommended.
     *
     * @return string[]
     */
    public function getGroup(): array
    {
        return $this->group;
    }

    /**
     * The name of the group to add. This parameter cannot be used with the `groupId` parameter. As a group's name can change, use of `groupId` is recommended.
     *
     * @param string[] $group
     */
    public function setGroup(array $group): self
    {
        $this->initialized['group'] = true;
        $this->group = $group;

        return $this;
    }

    /**
     * The ID of the group to add. This parameter cannot be used with the `group` parameter.
     *
     * @return string[]
     */
    public function getGroupId(): array
    {
        return $this->groupId;
    }

    /**
     * The ID of the group to add. This parameter cannot be used with the `group` parameter.
     *
     * @param string[] $groupId
     */
    public function setGroupId(array $groupId): self
    {
        $this->initialized['groupId'] = true;
        $this->groupId = $groupId;

        return $this;
    }
}
