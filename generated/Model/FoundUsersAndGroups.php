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

class FoundUsersAndGroups
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The list of users found in a search, including header text (Showing X of Y matching users) and total of matched users.
     *
     * @var FoundUsers
     */
    protected $users;
    /**
     * The list of groups found in a search, including header text (Showing X of Y matching groups) and total of matched groups.
     *
     * @var FoundGroups
     */
    protected $groups;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The list of users found in a search, including header text (Showing X of Y matching users) and total of matched users.
     */
    public function getUsers(): FoundUsers
    {
        return $this->users;
    }

    /**
     * The list of users found in a search, including header text (Showing X of Y matching users) and total of matched users.
     */
    public function setUsers(FoundUsers $users): self
    {
        $this->initialized['users'] = true;
        $this->users = $users;

        return $this;
    }

    /**
     * The list of groups found in a search, including header text (Showing X of Y matching groups) and total of matched groups.
     */
    public function getGroups(): FoundGroups
    {
        return $this->groups;
    }

    /**
     * The list of groups found in a search, including header text (Showing X of Y matching groups) and total of matched groups.
     */
    public function setGroups(FoundGroups $groups): self
    {
        $this->initialized['groups'] = true;
        $this->groups = $groups;

        return $this;
    }
}
