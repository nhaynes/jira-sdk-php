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

class CreateProjectDetails
{
    /**
     * @var array
     */
    protected $initialized = [];
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
     * This parameter is deprecated because of privacy changes. Use `leadAccountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. The user name of the project lead. Either `lead` or `leadAccountId` must be set when creating a project. Cannot be provided with `leadAccountId`.
     *
     * @var string
     */
    protected $lead;
    /**
     * The account ID of the project lead. Either `lead` or `leadAccountId` must be set when creating a project. Cannot be provided with `lead`.
     *
     * @var string
     */
    protected $leadAccountId;
    /**
     * A link to information about this project, such as project documentation.
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
     * The ID of the project's category. A complete list of category IDs is found using the [Get all project categories](#api-rest-api-3-projectCategory-get) operation.
     *
     * @var int
     */
    protected $categoryId;
    /**
     * The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes), which defines the application-specific feature set. If you don't specify the project template you have to specify the project type.
     *
     * @var string
     */
    protected $projectTypeKey;
    /**
     * A predefined configuration for a project. The type of the `projectTemplateKey` must match with the type of the `projectTypeKey`.
     *
     * @var string
     */
    protected $projectTemplateKey;
    /**
     * The ID of the workflow scheme for the project. Use the [Get all workflow schemes](#api-rest-api-3-workflowscheme-get) operation to get a list of workflow scheme IDs. If you specify the workflow scheme you cannot specify the project template key.
     *
     * @var int
     */
    protected $workflowScheme;
    /**
     * The ID of the issue type screen scheme for the project. Use the [Get all issue type screen schemes](#api-rest-api-3-issuetypescreenscheme-get) operation to get a list of issue type screen scheme IDs. If you specify the issue type screen scheme you cannot specify the project template key.
     *
     * @var int
     */
    protected $issueTypeScreenScheme;
    /**
     * The ID of the issue type scheme for the project. Use the [Get all issue type schemes](#api-rest-api-3-issuetypescheme-get) operation to get a list of issue type scheme IDs. If you specify the issue type scheme you cannot specify the project template key.
     *
     * @var int
     */
    protected $issueTypeScheme;
    /**
     * The ID of the field configuration scheme for the project. Use the [Get all field configuration schemes](#api-rest-api-3-fieldconfigurationscheme-get) operation to get a list of field configuration scheme IDs. If you specify the field configuration scheme you cannot specify the project template key.
     *
     * @var int
     */
    protected $fieldConfigurationScheme;

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }

    /**
     * Project keys must be unique and start with an uppercase letter followed by one or more uppercase alphanumeric characters. The maximum length is 10 characters.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Project keys must be unique and start with an uppercase letter followed by one or more uppercase alphanumeric characters. The maximum length is 10 characters.
     */
    public function setKey(string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * The name of the project.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name of the project.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * A brief description of the project.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * A brief description of the project.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * This parameter is deprecated because of privacy changes. Use `leadAccountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. The user name of the project lead. Either `lead` or `leadAccountId` must be set when creating a project. Cannot be provided with `leadAccountId`.
     */
    public function getLead(): string
    {
        return $this->lead;
    }

    /**
     * This parameter is deprecated because of privacy changes. Use `leadAccountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. The user name of the project lead. Either `lead` or `leadAccountId` must be set when creating a project. Cannot be provided with `leadAccountId`.
     */
    public function setLead(string $lead): self
    {
        $this->initialized['lead'] = true;
        $this->lead = $lead;

        return $this;
    }

    /**
     * The account ID of the project lead. Either `lead` or `leadAccountId` must be set when creating a project. Cannot be provided with `lead`.
     */
    public function getLeadAccountId(): string
    {
        return $this->leadAccountId;
    }

    /**
     * The account ID of the project lead. Either `lead` or `leadAccountId` must be set when creating a project. Cannot be provided with `lead`.
     */
    public function setLeadAccountId(string $leadAccountId): self
    {
        $this->initialized['leadAccountId'] = true;
        $this->leadAccountId = $leadAccountId;

        return $this;
    }

    /**
     * A link to information about this project, such as project documentation.
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * A link to information about this project, such as project documentation.
     */
    public function setUrl(string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;

        return $this;
    }

    /**
     * The default assignee when creating issues for this project.
     */
    public function getAssigneeType(): string
    {
        return $this->assigneeType;
    }

    /**
     * The default assignee when creating issues for this project.
     */
    public function setAssigneeType(string $assigneeType): self
    {
        $this->initialized['assigneeType'] = true;
        $this->assigneeType = $assigneeType;

        return $this;
    }

    /**
     * An integer value for the project's avatar.
     */
    public function getAvatarId(): int
    {
        return $this->avatarId;
    }

    /**
     * An integer value for the project's avatar.
     */
    public function setAvatarId(int $avatarId): self
    {
        $this->initialized['avatarId'] = true;
        $this->avatarId = $avatarId;

        return $this;
    }

    /**
     * The ID of the issue security scheme for the project, which enables you to control who can and cannot view issues. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) resource to get all issue security scheme IDs.
     */
    public function getIssueSecurityScheme(): int
    {
        return $this->issueSecurityScheme;
    }

    /**
     * The ID of the issue security scheme for the project, which enables you to control who can and cannot view issues. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) resource to get all issue security scheme IDs.
     */
    public function setIssueSecurityScheme(int $issueSecurityScheme): self
    {
        $this->initialized['issueSecurityScheme'] = true;
        $this->issueSecurityScheme = $issueSecurityScheme;

        return $this;
    }

    /**
     * The ID of the permission scheme for the project. Use the [Get all permission schemes](#api-rest-api-3-permissionscheme-get) resource to see a list of all permission scheme IDs.
     */
    public function getPermissionScheme(): int
    {
        return $this->permissionScheme;
    }

    /**
     * The ID of the permission scheme for the project. Use the [Get all permission schemes](#api-rest-api-3-permissionscheme-get) resource to see a list of all permission scheme IDs.
     */
    public function setPermissionScheme(int $permissionScheme): self
    {
        $this->initialized['permissionScheme'] = true;
        $this->permissionScheme = $permissionScheme;

        return $this;
    }

    /**
     * The ID of the notification scheme for the project. Use the [Get notification schemes](#api-rest-api-3-notificationscheme-get) resource to get a list of notification scheme IDs.
     */
    public function getNotificationScheme(): int
    {
        return $this->notificationScheme;
    }

    /**
     * The ID of the notification scheme for the project. Use the [Get notification schemes](#api-rest-api-3-notificationscheme-get) resource to get a list of notification scheme IDs.
     */
    public function setNotificationScheme(int $notificationScheme): self
    {
        $this->initialized['notificationScheme'] = true;
        $this->notificationScheme = $notificationScheme;

        return $this;
    }

    /**
     * The ID of the project's category. A complete list of category IDs is found using the [Get all project categories](#api-rest-api-3-projectCategory-get) operation.
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * The ID of the project's category. A complete list of category IDs is found using the [Get all project categories](#api-rest-api-3-projectCategory-get) operation.
     */
    public function setCategoryId(int $categoryId): self
    {
        $this->initialized['categoryId'] = true;
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes), which defines the application-specific feature set. If you don't specify the project template you have to specify the project type.
     */
    public function getProjectTypeKey(): string
    {
        return $this->projectTypeKey;
    }

    /**
     * The [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes), which defines the application-specific feature set. If you don't specify the project template you have to specify the project type.
     */
    public function setProjectTypeKey(string $projectTypeKey): self
    {
        $this->initialized['projectTypeKey'] = true;
        $this->projectTypeKey = $projectTypeKey;

        return $this;
    }

    /**
     * A predefined configuration for a project. The type of the `projectTemplateKey` must match with the type of the `projectTypeKey`.
     */
    public function getProjectTemplateKey(): string
    {
        return $this->projectTemplateKey;
    }

    /**
     * A predefined configuration for a project. The type of the `projectTemplateKey` must match with the type of the `projectTypeKey`.
     */
    public function setProjectTemplateKey(string $projectTemplateKey): self
    {
        $this->initialized['projectTemplateKey'] = true;
        $this->projectTemplateKey = $projectTemplateKey;

        return $this;
    }

    /**
     * The ID of the workflow scheme for the project. Use the [Get all workflow schemes](#api-rest-api-3-workflowscheme-get) operation to get a list of workflow scheme IDs. If you specify the workflow scheme you cannot specify the project template key.
     */
    public function getWorkflowScheme(): int
    {
        return $this->workflowScheme;
    }

    /**
     * The ID of the workflow scheme for the project. Use the [Get all workflow schemes](#api-rest-api-3-workflowscheme-get) operation to get a list of workflow scheme IDs. If you specify the workflow scheme you cannot specify the project template key.
     */
    public function setWorkflowScheme(int $workflowScheme): self
    {
        $this->initialized['workflowScheme'] = true;
        $this->workflowScheme = $workflowScheme;

        return $this;
    }

    /**
     * The ID of the issue type screen scheme for the project. Use the [Get all issue type screen schemes](#api-rest-api-3-issuetypescreenscheme-get) operation to get a list of issue type screen scheme IDs. If you specify the issue type screen scheme you cannot specify the project template key.
     */
    public function getIssueTypeScreenScheme(): int
    {
        return $this->issueTypeScreenScheme;
    }

    /**
     * The ID of the issue type screen scheme for the project. Use the [Get all issue type screen schemes](#api-rest-api-3-issuetypescreenscheme-get) operation to get a list of issue type screen scheme IDs. If you specify the issue type screen scheme you cannot specify the project template key.
     */
    public function setIssueTypeScreenScheme(int $issueTypeScreenScheme): self
    {
        $this->initialized['issueTypeScreenScheme'] = true;
        $this->issueTypeScreenScheme = $issueTypeScreenScheme;

        return $this;
    }

    /**
     * The ID of the issue type scheme for the project. Use the [Get all issue type schemes](#api-rest-api-3-issuetypescheme-get) operation to get a list of issue type scheme IDs. If you specify the issue type scheme you cannot specify the project template key.
     */
    public function getIssueTypeScheme(): int
    {
        return $this->issueTypeScheme;
    }

    /**
     * The ID of the issue type scheme for the project. Use the [Get all issue type schemes](#api-rest-api-3-issuetypescheme-get) operation to get a list of issue type scheme IDs. If you specify the issue type scheme you cannot specify the project template key.
     */
    public function setIssueTypeScheme(int $issueTypeScheme): self
    {
        $this->initialized['issueTypeScheme'] = true;
        $this->issueTypeScheme = $issueTypeScheme;

        return $this;
    }

    /**
     * The ID of the field configuration scheme for the project. Use the [Get all field configuration schemes](#api-rest-api-3-fieldconfigurationscheme-get) operation to get a list of field configuration scheme IDs. If you specify the field configuration scheme you cannot specify the project template key.
     */
    public function getFieldConfigurationScheme(): int
    {
        return $this->fieldConfigurationScheme;
    }

    /**
     * The ID of the field configuration scheme for the project. Use the [Get all field configuration schemes](#api-rest-api-3-fieldconfigurationscheme-get) operation to get a list of field configuration scheme IDs. If you specify the field configuration scheme you cannot specify the project template key.
     */
    public function setFieldConfigurationScheme(int $fieldConfigurationScheme): self
    {
        $this->initialized['fieldConfigurationScheme'] = true;
        $this->fieldConfigurationScheme = $fieldConfigurationScheme;

        return $this;
    }
}
