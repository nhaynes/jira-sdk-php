<?php

namespace JiraSdk\Model;

class SharePermissionInputBean
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
     * The type of the share permission.Specify the type as follows:
     *  `user` Share with a user.
     *  `group` Share with a group. Specify `groupname` as well.
     *  `project` Share with a project. Specify `projectId` as well.
     *  `projectRole` Share with a project role in a project. Specify `projectId` and `projectRoleId` as well.
     *  `global` Share globally, including anonymous users. If set, this type overrides all existing share permissions and must be deleted before any non-global share permissions is set.
     *  `authenticated` Share with all logged-in users. This shows as `loggedin` in the response. If set, this type overrides all existing share permissions and must be deleted before any non-global share permissions is set.
     *
     * @var string
     */
    protected $type;
    /**
     * The ID of the project to share the filter with. Set `type` to `project`.
     *
     * @var string
     */
    protected $projectId;
    /**
     * The name of the group to share the filter with. Set `type` to `group`. Please note that the name of a group is mutable, to reliably identify a group use `groupId`.
     *
     * @var string
     */
    protected $groupname;
    /**
     * The ID of the project role to share the filter with. Set `type` to `projectRole` and the `projectId` for the project that the role is in.
     *
     * @var string
     */
    protected $projectRoleId;
    /**
     * The user account ID that the filter is shared with. For a request, specify the `accountId` property for the user.
     *
     * @var string
     */
    protected $accountId;
    /**
     * The rights for the share permission.
     *
     * @var int
     */
    protected $rights;
    /**
     * The ID of the group, which uniquely identifies the group across all Atlassian products.For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*. Cannot be provided with `groupname`.
     *
     * @var string
     */
    protected $groupId;
    /**
     * The type of the share permission.Specify the type as follows:
     *  `user` Share with a user.
     *  `group` Share with a group. Specify `groupname` as well.
     *  `project` Share with a project. Specify `projectId` as well.
     *  `projectRole` Share with a project role in a project. Specify `projectId` and `projectRoleId` as well.
     *  `global` Share globally, including anonymous users. If set, this type overrides all existing share permissions and must be deleted before any non-global share permissions is set.
     *  `authenticated` Share with all logged-in users. This shows as `loggedin` in the response. If set, this type overrides all existing share permissions and must be deleted before any non-global share permissions is set.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
    /**
     * The type of the share permission.Specify the type as follows:
     *  `user` Share with a user.
     *  `group` Share with a group. Specify `groupname` as well.
     *  `project` Share with a project. Specify `projectId` as well.
     *  `projectRole` Share with a project role in a project. Specify `projectId` and `projectRoleId` as well.
     *  `global` Share globally, including anonymous users. If set, this type overrides all existing share permissions and must be deleted before any non-global share permissions is set.
     *  `authenticated` Share with all logged-in users. This shows as `loggedin` in the response. If set, this type overrides all existing share permissions and must be deleted before any non-global share permissions is set.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * The ID of the project to share the filter with. Set `type` to `project`.
     *
     * @return string
     */
    public function getProjectId(): string
    {
        return $this->projectId;
    }
    /**
     * The ID of the project to share the filter with. Set `type` to `project`.
     *
     * @param string $projectId
     *
     * @return self
     */
    public function setProjectId(string $projectId): self
    {
        $this->initialized['projectId'] = true;
        $this->projectId = $projectId;
        return $this;
    }
    /**
     * The name of the group to share the filter with. Set `type` to `group`. Please note that the name of a group is mutable, to reliably identify a group use `groupId`.
     *
     * @return string
     */
    public function getGroupname(): string
    {
        return $this->groupname;
    }
    /**
     * The name of the group to share the filter with. Set `type` to `group`. Please note that the name of a group is mutable, to reliably identify a group use `groupId`.
     *
     * @param string $groupname
     *
     * @return self
     */
    public function setGroupname(string $groupname): self
    {
        $this->initialized['groupname'] = true;
        $this->groupname = $groupname;
        return $this;
    }
    /**
     * The ID of the project role to share the filter with. Set `type` to `projectRole` and the `projectId` for the project that the role is in.
     *
     * @return string
     */
    public function getProjectRoleId(): string
    {
        return $this->projectRoleId;
    }
    /**
     * The ID of the project role to share the filter with. Set `type` to `projectRole` and the `projectId` for the project that the role is in.
     *
     * @param string $projectRoleId
     *
     * @return self
     */
    public function setProjectRoleId(string $projectRoleId): self
    {
        $this->initialized['projectRoleId'] = true;
        $this->projectRoleId = $projectRoleId;
        return $this;
    }
    /**
     * The user account ID that the filter is shared with. For a request, specify the `accountId` property for the user.
     *
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }
    /**
     * The user account ID that the filter is shared with. For a request, specify the `accountId` property for the user.
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
    /**
     * The rights for the share permission.
     *
     * @return int
     */
    public function getRights(): int
    {
        return $this->rights;
    }
    /**
     * The rights for the share permission.
     *
     * @param int $rights
     *
     * @return self
     */
    public function setRights(int $rights): self
    {
        $this->initialized['rights'] = true;
        $this->rights = $rights;
        return $this;
    }
    /**
     * The ID of the group, which uniquely identifies the group across all Atlassian products.For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*. Cannot be provided with `groupname`.
     *
     * @return string
     */
    public function getGroupId(): string
    {
        return $this->groupId;
    }
    /**
     * The ID of the group, which uniquely identifies the group across all Atlassian products.For example, *952d12c3-5b5b-4d04-bb32-44d383afc4b2*. Cannot be provided with `groupname`.
     *
     * @param string $groupId
     *
     * @return self
     */
    public function setGroupId(string $groupId): self
    {
        $this->initialized['groupId'] = true;
        $this->groupId = $groupId;
        return $this;
    }
}
