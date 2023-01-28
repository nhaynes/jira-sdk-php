<?php

namespace JiraSdk\Model;

class UpdateProjectDetails
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
     * Project keys must be unique and start with an uppercase letter followed by one or more uppercase alphanumeric characters. The maximum length is 10 characters.
     *
     * @var string
     */
    protected $key;
    /**
     * The name of the project.
     *
     * @var string
     */
    protected $name;
    /**
     * A brief description of the project.
     *
     * @var string
     */
    protected $description;
    /**
     * This parameter is deprecated because of privacy changes. Use `leadAccountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. The user name of the project lead. Cannot be provided with `leadAccountId`.
     *
     * @var string
     */
    protected $lead;
    /**
     * The account ID of the project lead. Cannot be provided with `lead`.
     *
     * @var string
     */
    protected $leadAccountId;
    /**
     * A link to information about this project, such as project documentation
     *
     * @var string
     */
    protected $url;
    /**
     * The default assignee when creating issues for this project.
     *
     * @var string
     */
    protected $assigneeType;
    /**
     * An integer value for the project's avatar.
     *
     * @var int
     */
    protected $avatarId;
    /**
     * The ID of the issue security scheme for the project, which enables you to control who can and cannot view issues. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) resource to get all issue security scheme IDs.
     *
     * @var int
     */
    protected $issueSecurityScheme;
    /**
     * The ID of the permission scheme for the project. Use the [Get all permission schemes](#api-rest-api-3-permissionscheme-get) resource to see a list of all permission scheme IDs.
     *
     * @var int
     */
    protected $permissionScheme;
    /**
     * The ID of the notification scheme for the project. Use the [Get notification schemes](#api-rest-api-3-notificationscheme-get) resource to get a list of notification scheme IDs.
     *
     * @var int
     */
    protected $notificationScheme;
    /**
     * The ID of the project's category. A complete list of category IDs is found using the [Get all project categories](#api-rest-api-3-projectCategory-get) operation. To remove the project category from the project, set the value to `-1.`
     *
     * @var int
     */
    protected $categoryId;
    /**
     * Project keys must be unique and start with an uppercase letter followed by one or more uppercase alphanumeric characters. The maximum length is 10 characters.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }
    /**
     * Project keys must be unique and start with an uppercase letter followed by one or more uppercase alphanumeric characters. The maximum length is 10 characters.
     *
     * @param string $key
     *
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;
        return $this;
    }
    /**
     * The name of the project.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * The name of the project.
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
     * A brief description of the project.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
    /**
     * A brief description of the project.
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
     * This parameter is deprecated because of privacy changes. Use `leadAccountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. The user name of the project lead. Cannot be provided with `leadAccountId`.
     *
     * @return string
     */
    public function getLead(): string
    {
        return $this->lead;
    }
    /**
     * This parameter is deprecated because of privacy changes. Use `leadAccountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. The user name of the project lead. Cannot be provided with `leadAccountId`.
     *
     * @param string $lead
     *
     * @return self
     */
    public function setLead(string $lead): self
    {
        $this->initialized['lead'] = true;
        $this->lead = $lead;
        return $this;
    }
    /**
     * The account ID of the project lead. Cannot be provided with `lead`.
     *
     * @return string
     */
    public function getLeadAccountId(): string
    {
        return $this->leadAccountId;
    }
    /**
     * The account ID of the project lead. Cannot be provided with `lead`.
     *
     * @param string $leadAccountId
     *
     * @return self
     */
    public function setLeadAccountId(string $leadAccountId): self
    {
        $this->initialized['leadAccountId'] = true;
        $this->leadAccountId = $leadAccountId;
        return $this;
    }
    /**
     * A link to information about this project, such as project documentation
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
    /**
     * A link to information about this project, such as project documentation
     *
     * @param string $url
     *
     * @return self
     */
    public function setUrl(string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
    /**
     * The default assignee when creating issues for this project.
     *
     * @return string
     */
    public function getAssigneeType(): string
    {
        return $this->assigneeType;
    }
    /**
     * The default assignee when creating issues for this project.
     *
     * @param string $assigneeType
     *
     * @return self
     */
    public function setAssigneeType(string $assigneeType): self
    {
        $this->initialized['assigneeType'] = true;
        $this->assigneeType = $assigneeType;
        return $this;
    }
    /**
     * An integer value for the project's avatar.
     *
     * @return int
     */
    public function getAvatarId(): int
    {
        return $this->avatarId;
    }
    /**
     * An integer value for the project's avatar.
     *
     * @param int $avatarId
     *
     * @return self
     */
    public function setAvatarId(int $avatarId): self
    {
        $this->initialized['avatarId'] = true;
        $this->avatarId = $avatarId;
        return $this;
    }
    /**
     * The ID of the issue security scheme for the project, which enables you to control who can and cannot view issues. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) resource to get all issue security scheme IDs.
     *
     * @return int
     */
    public function getIssueSecurityScheme(): int
    {
        return $this->issueSecurityScheme;
    }
    /**
     * The ID of the issue security scheme for the project, which enables you to control who can and cannot view issues. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) resource to get all issue security scheme IDs.
     *
     * @param int $issueSecurityScheme
     *
     * @return self
     */
    public function setIssueSecurityScheme(int $issueSecurityScheme): self
    {
        $this->initialized['issueSecurityScheme'] = true;
        $this->issueSecurityScheme = $issueSecurityScheme;
        return $this;
    }
    /**
     * The ID of the permission scheme for the project. Use the [Get all permission schemes](#api-rest-api-3-permissionscheme-get) resource to see a list of all permission scheme IDs.
     *
     * @return int
     */
    public function getPermissionScheme(): int
    {
        return $this->permissionScheme;
    }
    /**
     * The ID of the permission scheme for the project. Use the [Get all permission schemes](#api-rest-api-3-permissionscheme-get) resource to see a list of all permission scheme IDs.
     *
     * @param int $permissionScheme
     *
     * @return self
     */
    public function setPermissionScheme(int $permissionScheme): self
    {
        $this->initialized['permissionScheme'] = true;
        $this->permissionScheme = $permissionScheme;
        return $this;
    }
    /**
     * The ID of the notification scheme for the project. Use the [Get notification schemes](#api-rest-api-3-notificationscheme-get) resource to get a list of notification scheme IDs.
     *
     * @return int
     */
    public function getNotificationScheme(): int
    {
        return $this->notificationScheme;
    }
    /**
     * The ID of the notification scheme for the project. Use the [Get notification schemes](#api-rest-api-3-notificationscheme-get) resource to get a list of notification scheme IDs.
     *
     * @param int $notificationScheme
     *
     * @return self
     */
    public function setNotificationScheme(int $notificationScheme): self
    {
        $this->initialized['notificationScheme'] = true;
        $this->notificationScheme = $notificationScheme;
        return $this;
    }
    /**
     * The ID of the project's category. A complete list of category IDs is found using the [Get all project categories](#api-rest-api-3-projectCategory-get) operation. To remove the project category from the project, set the value to `-1.`
     *
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }
    /**
     * The ID of the project's category. A complete list of category IDs is found using the [Get all project categories](#api-rest-api-3-projectCategory-get) operation. To remove the project category from the project, set the value to `-1.`
     *
     * @param int $categoryId
     *
     * @return self
     */
    public function setCategoryId(int $categoryId): self
    {
        $this->initialized['categoryId'] = true;
        $this->categoryId = $categoryId;
        return $this;
    }
}
