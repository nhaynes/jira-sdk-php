<?php

namespace JiraSdk\Model;

class FoundUsersAndGroups
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
    /**
     * The list of users found in a search, including header text (Showing X of Y matching users) and total of matched users.
     *
     * @return FoundUsers
     */
    public function getUsers(): FoundUsers
    {
        return $this->users;
    }
    /**
     * The list of users found in a search, including header text (Showing X of Y matching users) and total of matched users.
     *
     * @param FoundUsers $users
     *
     * @return self
     */
    public function setUsers(FoundUsers $users): self
    {
        $this->initialized['users'] = true;
        $this->users = $users;
        return $this;
    }
    /**
     * The list of groups found in a search, including header text (Showing X of Y matching groups) and total of matched groups.
     *
     * @return FoundGroups
     */
    public function getGroups(): FoundGroups
    {
        return $this->groups;
    }
    /**
     * The list of groups found in a search, including header text (Showing X of Y matching groups) and total of matched groups.
     *
     * @param FoundGroups $groups
     *
     * @return self
     */
    public function setGroups(FoundGroups $groups): self
    {
        $this->initialized['groups'] = true;
        $this->groups = $groups;
        return $this;
    }
}
