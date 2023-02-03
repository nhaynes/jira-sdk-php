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

class SharePermission
{
    /**
     * @var array
     */
    protected $initialized = [];
    /**
     * The unique identifier of the share permission.
     *
     * @var int
     */
    protected $id;
    /**
     * The type of share permission:
     *  `user` Shared with a user.
     *  `group` Shared with a group. If set in a request, then specify `sharePermission.group` as well.
     *  `project` Shared with a project. If set in a request, then specify `sharePermission.project` as well.
     *  `projectRole` Share with a project role in a project. This value is not returned in responses. It is used in requests, where it needs to be specify with `projectId` and `projectRoleId`.
     *  `global` Shared globally. If set in a request, no other `sharePermission` properties need to be specified.
     *  `loggedin` Shared with all logged-in users. Note: This value is set in a request by specifying `authenticated` as the `type`.
     *  `project-unknown` Shared with a project that the user does not have access to. Cannot be set in a request.
     *
     * @var string
     */
    protected $type;
    /**
     * The project that the filter is shared with. This is similar to the project object returned by [Get project](#api-rest-api-3-project-projectIdOrKey-get) but it contains a subset of the properties, which are: `self`, `id`, `key`, `assigneeType`, `name`, `roles`, `avatarUrls`, `projectType`, `simplified`.
     * For a request, specify the `id` for the project.
     *
     * @var SharePermissionProject
     */
    protected $project;
    /**
     * The project role that the filter is shared with.
     * For a request, specify the `id` for the role. You must also specify the `project` object and `id` for the project that the role is in.
     *
     * @var SharePermissionRole
     */
    protected $role;
    /**
     * The group that the filter is shared with. For a request, specify the `groupId` or `name` property for the group. As a group's name can change, use of `groupId` is recommended.
     *
     * @var SharePermissionGroup
     */
    protected $group;
    /**
     * The user account ID that the filter is shared with. For a request, specify the `accountId` property for the user.
     *
     * @var SharePermissionUser
     */
    protected $user;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * The unique identifier of the share permission.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * The unique identifier of the share permission.
     */
    public function setId(int $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The type of share permission:
     *  `user` Shared with a user.
     *  `group` Shared with a group. If set in a request, then specify `sharePermission.group` as well.
     *  `project` Shared with a project. If set in a request, then specify `sharePermission.project` as well.
     *  `projectRole` Share with a project role in a project. This value is not returned in responses. It is used in requests, where it needs to be specify with `projectId` and `projectRoleId`.
     *  `global` Shared globally. If set in a request, no other `sharePermission` properties need to be specified.
     *  `loggedin` Shared with all logged-in users. Note: This value is set in a request by specifying `authenticated` as the `type`.
     *  `project-unknown` Shared with a project that the user does not have access to. Cannot be set in a request.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of share permission:
     *  `user` Shared with a user.
     *  `group` Shared with a group. If set in a request, then specify `sharePermission.group` as well.
     *  `project` Shared with a project. If set in a request, then specify `sharePermission.project` as well.
     *  `projectRole` Share with a project role in a project. This value is not returned in responses. It is used in requests, where it needs to be specify with `projectId` and `projectRoleId`.
     *  `global` Shared globally. If set in a request, no other `sharePermission` properties need to be specified.
     *  `loggedin` Shared with all logged-in users. Note: This value is set in a request by specifying `authenticated` as the `type`.
     *  `project-unknown` Shared with a project that the user does not have access to. Cannot be set in a request.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The project that the filter is shared with. This is similar to the project object returned by [Get project](#api-rest-api-3-project-projectIdOrKey-get) but it contains a subset of the properties, which are: `self`, `id`, `key`, `assigneeType`, `name`, `roles`, `avatarUrls`, `projectType`, `simplified`.
     * For a request, specify the `id` for the project.
     */
    public function getProject(): SharePermissionProject
    {
        return $this->project;
    }

    /**
     * The project that the filter is shared with. This is similar to the project object returned by [Get project](#api-rest-api-3-project-projectIdOrKey-get) but it contains a subset of the properties, which are: `self`, `id`, `key`, `assigneeType`, `name`, `roles`, `avatarUrls`, `projectType`, `simplified`.
     * For a request, specify the `id` for the project.
     */
    public function setProject(SharePermissionProject $project): self
    {
        $this->initialized['project'] = true;
        $this->project = $project;

        return $this;
    }

    /**
     * The project role that the filter is shared with.
     * For a request, specify the `id` for the role. You must also specify the `project` object and `id` for the project that the role is in.
     */
    public function getRole(): SharePermissionRole
    {
        return $this->role;
    }

    /**
     * The project role that the filter is shared with.
     * For a request, specify the `id` for the role. You must also specify the `project` object and `id` for the project that the role is in.
     */
    public function setRole(SharePermissionRole $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;

        return $this;
    }

    /**
     * The group that the filter is shared with. For a request, specify the `groupId` or `name` property for the group. As a group's name can change, use of `groupId` is recommended.
     */
    public function getGroup(): SharePermissionGroup
    {
        return $this->group;
    }

    /**
     * The group that the filter is shared with. For a request, specify the `groupId` or `name` property for the group. As a group's name can change, use of `groupId` is recommended.
     */
    public function setGroup(SharePermissionGroup $group): self
    {
        $this->initialized['group'] = true;
        $this->group = $group;

        return $this;
    }

    /**
     * The user account ID that the filter is shared with. For a request, specify the `accountId` property for the user.
     */
    public function getUser(): SharePermissionUser
    {
        return $this->user;
    }

    /**
     * The user account ID that the filter is shared with. For a request, specify the `accountId` property for the user.
     */
    public function setUser(SharePermissionUser $user): self
    {
        $this->initialized['user'] = true;
        $this->user = $user;

        return $this;
    }
}
