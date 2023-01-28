<?php

namespace JiraSdk;

class Client extends \JiraSdk\Runtime\Client\Client
{
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetBannerUnauthorizedException
     * @throws \JiraSdk\Exception\GetBannerForbiddenException
     *
     * @return null|\JiraSdk\Model\AnnouncementBannerConfiguration|\Psr\Http\Message\ResponseInterface
     */
    public function getBanner(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetBanner(), $fetch);
    }
    /**
     * Updates the announcement banner configuration.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\AnnouncementBannerConfigurationUpdate $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\SetBannerBadRequestException
     * @throws \JiraSdk\Exception\SetBannerUnauthorizedException
     * @throws \JiraSdk\Exception\SetBannerForbiddenException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function setBanner(\JiraSdk\Model\AnnouncementBannerConfigurationUpdate $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetBanner($requestBody), $fetch);
    }
    /**
     * Updates the value of one or more custom fields on one or more issues. Combinations of custom field and issue should be unique within the request. Custom fields can only be updated by the Forge app that created them.
     **[Permissions](#permissions) required:** Only the app that created the custom field can update its values with this operation.
     *
     * @param \JiraSdk\Model\MultipleCustomFieldValuesUpdateDetails $requestBody 
     * @param array $queryParameters {
     *     @var bool $generateChangelog Whether to generate a changelog for this update.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateMultipleCustomFieldValuesBadRequestException
     * @throws \JiraSdk\Exception\UpdateMultipleCustomFieldValuesForbiddenException
     * @throws \JiraSdk\Exception\UpdateMultipleCustomFieldValuesNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function updateMultipleCustomFieldValues(\JiraSdk\Model\MultipleCustomFieldValuesUpdateDetails $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateMultipleCustomFieldValues($requestBody, $queryParameters), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of configurations for a custom field created by a [Forge app](https://developer.atlassian.com/platform/forge/).
    
    The result can be filtered by one of these criteria:
    
    *  `id`.
    *  `fieldContextId`.
    *  `issueId`.
    *  `projectKeyOrId` and `issueTypeId`.
    
    Otherwise, all configurations are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the Forge app that created the custom field.
    *
    * @param string $fieldIdOrKey The ID or key of the custom field, for example `customfield_10000`.
    * @param array $queryParameters {
    *     @var array $id The list of configuration IDs. To include multiple configurations, separate IDs with an ampersand: `id=10000&id=10001`. Can't be provided with `fieldContextId`, `issueId`, `projectKeyOrId`, or `issueTypeId`.
    *     @var array $fieldContextId The list of field context IDs. To include multiple field contexts, separate IDs with an ampersand: `fieldContextId=10000&fieldContextId=10001`. Can't be provided with `id`, `issueId`, `projectKeyOrId`, or `issueTypeId`.
    *     @var int $issueId The ID of the issue to filter results by. If the issue doesn't exist, an empty list is returned. Can't be provided with `projectKeyOrId`, or `issueTypeId`.
    *     @var string $projectKeyOrId The ID or key of the project to filter results by. Must be provided with `issueTypeId`. Can't be provided with `issueId`.
    *     @var string $issueTypeId The ID of the issue type to filter results by. Must be provided with `projectKeyOrId`. Can't be provided with `issueId`.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetCustomFieldConfigurationBadRequestException
    * @throws \JiraSdk\Exception\GetCustomFieldConfigurationUnauthorizedException
    * @throws \JiraSdk\Exception\GetCustomFieldConfigurationForbiddenException
    * @throws \JiraSdk\Exception\GetCustomFieldConfigurationNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanContextualConfiguration|\Psr\Http\Message\ResponseInterface
    */
    public function getCustomFieldConfiguration(string $fieldIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetCustomFieldConfiguration($fieldIdOrKey, $queryParameters), $fetch);
    }
    /**
     * Update the configuration for contexts of a custom field created by a [Forge app](https://developer.atlassian.com/platform/forge/).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the Forge app that created the custom field.
     *
     * @param string $fieldIdOrKey The ID or key of the custom field, for example `customfield_10000`.
     * @param \JiraSdk\Model\CustomFieldConfigurations $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateCustomFieldConfigurationBadRequestException
     * @throws \JiraSdk\Exception\UpdateCustomFieldConfigurationUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateCustomFieldConfigurationForbiddenException
     * @throws \JiraSdk\Exception\UpdateCustomFieldConfigurationNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function updateCustomFieldConfiguration(string $fieldIdOrKey, \JiraSdk\Model\CustomFieldConfigurations $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateCustomFieldConfiguration($fieldIdOrKey, $requestBody), $fetch);
    }
    /**
     * Updates the value of a custom field on one or more issues. Custom fields can only be updated by the Forge app that created them.
     **[Permissions](#permissions) required:** Only the app that created the custom field can update its values with this operation.
     *
     * @param string $fieldIdOrKey The ID or key of the custom field. For example, `customfield_10010`.
     * @param \JiraSdk\Model\CustomFieldValueUpdateDetails $requestBody 
     * @param array $queryParameters {
     *     @var bool $generateChangelog Whether to generate a changelog for this update.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateCustomFieldValueBadRequestException
     * @throws \JiraSdk\Exception\UpdateCustomFieldValueForbiddenException
     * @throws \JiraSdk\Exception\UpdateCustomFieldValueNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function updateCustomFieldValue(string $fieldIdOrKey, \JiraSdk\Model\CustomFieldValueUpdateDetails $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateCustomFieldValue($fieldIdOrKey, $requestBody, $queryParameters), $fetch);
    }
    /**
    * Returns all application properties or an application property.
    
    If you specify a value for the `key` parameter, then an application property is returned as an object (not in an array). Otherwise, an array of all editable application properties is returned. See [Set application property](#api-rest-api-3-application-properties-id-put) for descriptions of editable properties.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var string $key The key of the application property.
    *     @var string $permissionLevel The permission level of all items being returned in the list.
    *     @var string $keyFilter When a `key` isn't provided, this filters the list of results by the application property `key` using a regular expression. For example, using `jira.lf.*` will return all application properties with keys that start with *jira.lf.*.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetApplicationPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\GetApplicationPropertyNotFoundException
    *
    * @return null|\JiraSdk\Model\ApplicationProperty[]|\Psr\Http\Message\ResponseInterface
    */
    public function getApplicationProperty(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetApplicationProperty($queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAdvancedSettingsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAdvancedSettingsForbiddenException
     *
     * @return null|\JiraSdk\Model\ApplicationProperty[]|\Psr\Http\Message\ResponseInterface
     */
    public function getAdvancedSettings(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAdvancedSettings(), $fetch);
    }
    /**
    * Changes the value of an application property. For example, you can change the value of the `jira.clone.prefix` from its default value of *CLONE -* to *Clone -* if you prefer sentence case capitalization. Editable properties are described below along with their default values.
    
    #### Advanced settings ####
    
    The advanced settings below are also accessible in [Jira](https://confluence.atlassian.com/x/vYXKM).
    
    | Key | Description | Default value |  
    | -- | -- | -- |  
    | `jira.clone.prefix` | The string of text prefixed to the title of a cloned issue. | `CLONE -` |  
    | `jira.date.picker.java.format` | The date format for the Java (server-side) generated dates. This must be the same as the `jira.date.picker.javascript.format` format setting. | `d/MMM/yy` |  
    | `jira.date.picker.javascript.format` | The date format for the JavaScript (client-side) generated dates. This must be the same as the `jira.date.picker.java.format` format setting. | `%e/%b/%y` |  
    | `jira.date.time.picker.java.format` | The date format for the Java (server-side) generated date times. This must be the same as the `jira.date.time.picker.javascript.format` format setting. | `dd/MMM/yy h:mm a` |  
    | `jira.date.time.picker.javascript.format` | The date format for the JavaScript (client-side) generated date times. This must be the same as the `jira.date.time.picker.java.format` format setting. | `%e/%b/%y %I:%M %p` |  
    | `jira.issue.actions.order` | The default order of actions (such as *Comments* or *Change history*) displayed on the issue view. | `asc` |  
    | `jira.table.cols.subtasks` | The columns to show while viewing subtask issues in a table. For example, a list of subtasks on an issue. | `issuetype, status, assignee, progress` |  
    | `jira.view.issue.links.sort.order` | The sort order of the list of issue links on the issue view. | `type, status, priority` |  
    | `jira.comment.collapsing.minimum.hidden` | The minimum number of comments required for comment collapsing to occur. A value of `0` disables comment collapsing. | `4` |  
    | `jira.newsletter.tip.delay.days` | The number of days before a prompt to sign up to the Jira Insiders newsletter is shown. A value of `-1` disables this feature. | `7` |  
    
    
    #### Look and feel ####
    
    The settings listed below adjust the [look and feel](https://confluence.atlassian.com/x/VwCLLg).
    
    | Key | Description | Default value |  
    | -- | -- | -- |  
    | `jira.lf.date.time` | The [ time format](https://docs.oracle.com/javase/6/docs/api/index.html?java/text/SimpleDateFormat.html). | `h:mm a` |  
    | `jira.lf.date.day` | The [ day format](https://docs.oracle.com/javase/6/docs/api/index.html?java/text/SimpleDateFormat.html). | `EEEE h:mm a` |  
    | `jira.lf.date.complete` | The [ date and time format](https://docs.oracle.com/javase/6/docs/api/index.html?java/text/SimpleDateFormat.html). | `dd/MMM/yy h:mm a` |  
    | `jira.lf.date.dmy` | The [ date format](https://docs.oracle.com/javase/6/docs/api/index.html?java/text/SimpleDateFormat.html). | `dd/MMM/yy` |  
    | `jira.date.time.picker.use.iso8061` | When enabled, sets Monday as the first day of the week in the date picker, as specified by the ISO8601 standard. | `false` |  
    | `jira.lf.logo.url` | The URL of the logo image file. | `/images/icon-jira-logo.png` |  
    | `jira.lf.logo.show.application.title` | Controls the visibility of the application title on the sidebar. | `false` |  
    | `jira.lf.favicon.url` | The URL of the favicon. | `/favicon.ico` |  
    | `jira.lf.favicon.hires.url` | The URL of the high-resolution favicon. | `/images/64jira.png` |  
    | `jira.lf.navigation.bgcolour` | The background color of the sidebar. | `#0747A6` |  
    | `jira.lf.navigation.highlightcolour` | The color of the text and logo of the sidebar. | `#DEEBFF` |  
    | `jira.lf.hero.button.base.bg.colour` | The background color of the hero button. | `#3b7fc4` |  
    | `jira.title` | The text for the application title. The application title can also be set in *General settings*. | `Jira` |  
    | `jira.option.globalsharing` | Whether filters and dashboards can be shared with anyone signed into Jira. | `true` |  
    | `xflow.product.suggestions.enabled` | Whether to expose product suggestions for other Atlassian products within Jira. | `true` |  
    
    
    #### Other settings ####
    
    | Key | Description | Default value |  
    | -- | -- | -- |  
    | `jira.issuenav.criteria.autoupdate` | Whether instant updates to search criteria is active. | `true` |  
    
    
    *Note: Be careful when changing [application properties and advanced settings](https://confluence.atlassian.com/x/vYXKM).*
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $id The key of the application property to update.
    * @param \JiraSdk\Model\SimpleApplicationPropertyBean $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetApplicationPropertyBadRequestException
    * @throws \JiraSdk\Exception\SetApplicationPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\SetApplicationPropertyForbiddenException
    * @throws \JiraSdk\Exception\SetApplicationPropertyNotFoundException
    *
    * @return null|\JiraSdk\Model\ApplicationProperty|\Psr\Http\Message\ResponseInterface
    */
    public function setApplicationProperty(string $id, \JiraSdk\Model\SimpleApplicationPropertyBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetApplicationProperty($id, $requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAllApplicationRolesUnauthorizedException
     * @throws \JiraSdk\Exception\GetAllApplicationRolesForbiddenException
     *
     * @return null|\JiraSdk\Model\ApplicationRole[]|\Psr\Http\Message\ResponseInterface
     */
    public function getAllApplicationRoles(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllApplicationRoles(), $fetch);
    }
    /**
     * Returns an application role.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $key The key of the application role. Use the [Get all application roles](#api-rest-api-3-applicationrole-get) operation to get the key for each application role.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetApplicationRoleUnauthorizedException
     * @throws \JiraSdk\Exception\GetApplicationRoleForbiddenException
     * @throws \JiraSdk\Exception\GetApplicationRoleNotFoundException
     *
     * @return null|\JiraSdk\Model\ApplicationRole|\Psr\Http\Message\ResponseInterface
     */
    public function getApplicationRole(string $key, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetApplicationRole($key), $fetch);
    }
    /**
    * Returns the contents of an attachment. A `Range` header can be set to define a range of bytes within the attachment to download. See the [HTTP Range header standard](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Range) for details.
    
    To return a thumbnail of the attachment, use [Get attachment thumbnail](#api-rest-api-3-attachment-thumbnail-id-get).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** For the issue containing the attachment:
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $id The ID of the attachment.
    * @param array $queryParameters {
    *     @var bool $redirect Whether a redirect is provided for the attachment download. Clients that do not automatically follow redirects can set this to `false` to avoid making multiple requests to download the attachment.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAttachmentContentBadRequestException
    * @throws \JiraSdk\Exception\GetAttachmentContentUnauthorizedException
    * @throws \JiraSdk\Exception\GetAttachmentContentForbiddenException
    * @throws \JiraSdk\Exception\GetAttachmentContentNotFoundException
    * @throws \JiraSdk\Exception\GetAttachmentContentRequestedRangeNotSatisfiableException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function getAttachmentContent(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAttachmentContent($id, $queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAttachmentMetaUnauthorizedException
     *
     * @return null|\JiraSdk\Model\AttachmentSettings|\Psr\Http\Message\ResponseInterface
     */
    public function getAttachmentMeta(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAttachmentMeta(), $fetch);
    }
    /**
    * Returns the thumbnail of an attachment.
    
    To return the attachment contents, use [Get attachment content](#api-rest-api-3-attachment-content-id-get).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** For the issue containing the attachment:
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $id The ID of the attachment.
    * @param array $queryParameters {
    *     @var bool $redirect Whether a redirect is provided for the attachment download. Clients that do not automatically follow redirects can set this to `false` to avoid making multiple requests to download the attachment.
    *     @var bool $fallbackToDefault Whether a default thumbnail is returned when the requested thumbnail is not found.
    *     @var int $width The maximum width to scale the thumbnail to.
    *     @var int $height The maximum height to scale the thumbnail to.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAttachmentThumbnailBadRequestException
    * @throws \JiraSdk\Exception\GetAttachmentThumbnailUnauthorizedException
    * @throws \JiraSdk\Exception\GetAttachmentThumbnailForbiddenException
    * @throws \JiraSdk\Exception\GetAttachmentThumbnailNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function getAttachmentThumbnail(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAttachmentThumbnail($id, $queryParameters), $fetch);
    }
    /**
    * Deletes an attachment from an issue.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** For the project holding the issue containing the attachment:
    
    *  *Delete own attachments* [project permission](https://confluence.atlassian.com/x/yodKLg) to delete an attachment created by the calling user.
    *  *Delete all attachments* [project permission](https://confluence.atlassian.com/x/yodKLg) to delete an attachment created by any user.
    *
    * @param string $id The ID of the attachment.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\RemoveAttachmentForbiddenException
    * @throws \JiraSdk\Exception\RemoveAttachmentNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function removeAttachment(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveAttachment($id), $fetch);
    }
    /**
    * Returns the metadata for an attachment. Note that the attachment itself is not returned.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $id The ID of the attachment.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAttachmentUnauthorizedException
    * @throws \JiraSdk\Exception\GetAttachmentForbiddenException
    * @throws \JiraSdk\Exception\GetAttachmentNotFoundException
    *
    * @return null|\JiraSdk\Model\AttachmentMetadata|\Psr\Http\Message\ResponseInterface
    */
    public function getAttachment(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAttachment($id), $fetch);
    }
    /**
    * Returns the metadata for the contents of an attachment, if it is an archive, and metadata for the attachment itself. For example, if the attachment is a ZIP archive, then information about the files in the archive is returned and metadata for the ZIP archive. Currently, only the ZIP archive format is supported.
    
    Use this operation to retrieve data that is presented to the user, as this operation returns the metadata for the attachment itself, such as the attachment's ID and name. Otherwise, use [ Get contents metadata for an expanded attachment](#api-rest-api-3-attachment-id-expand-raw-get), which only returns the metadata for the attachment's contents.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** For the issue containing the attachment:
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $id The ID of the attachment.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\ExpandAttachmentForHumansUnauthorizedException
    * @throws \JiraSdk\Exception\ExpandAttachmentForHumansForbiddenException
    * @throws \JiraSdk\Exception\ExpandAttachmentForHumansNotFoundException
    * @throws \JiraSdk\Exception\ExpandAttachmentForHumansConflictException
    *
    * @return null|\JiraSdk\Model\AttachmentArchiveMetadataReadable|\Psr\Http\Message\ResponseInterface
    */
    public function expandAttachmentForHumans(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\ExpandAttachmentForHumans($id), $fetch);
    }
    /**
    * Returns the metadata for the contents of an attachment, if it is an archive. For example, if the attachment is a ZIP archive, then information about the files in the archive is returned. Currently, only the ZIP archive format is supported.
    
    Use this operation if you are processing the data without presenting it to the user, as this operation only returns the metadata for the contents of the attachment. Otherwise, to retrieve data to present to the user, use [ Get all metadata for an expanded attachment](#api-rest-api-3-attachment-id-expand-human-get) which also returns the metadata for the attachment itself, such as the attachment's ID and name.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** For the issue containing the attachment:
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $id The ID of the attachment.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\ExpandAttachmentForMachinesUnauthorizedException
    * @throws \JiraSdk\Exception\ExpandAttachmentForMachinesForbiddenException
    * @throws \JiraSdk\Exception\ExpandAttachmentForMachinesNotFoundException
    * @throws \JiraSdk\Exception\ExpandAttachmentForMachinesConflictException
    *
    * @return null|\JiraSdk\Model\AttachmentArchiveImpl|\Psr\Http\Message\ResponseInterface
    */
    public function expandAttachmentForMachines(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\ExpandAttachmentForMachines($id), $fetch);
    }
    /**
    * Returns a list of audit records. The list can be filtered to include items:
    
    *  where each item in `filter` has at least one match in any of these fields:
       
        *  `summary`
        *  `category`
        *  `eventSource`
        *  `objectItem.name` If the object is a user, account ID is available to filter.
        *  `objectItem.parentName`
        *  `objectItem.typeName`
        *  `changedValues.changedFrom`
        *  `changedValues.changedTo`
        *  `remoteAddress`
       
       For example, if `filter` contains *man ed*, an audit record containing `summary": "User added to group"` and `"category": "group management"` is returned.
    *  created on or after a date and time.
    *  created or or before a date and time.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $offset The number of records to skip before returning the first result.
    *     @var int $limit The maximum number of results to return.
    *     @var string $filter The strings to match with audit field content, space separated.
    *     @var string $from The date and time on or after which returned audit records must have been created. If `to` is provided `from` must be before `to` or no audit records are returned.
    *     @var string $to The date and time on or before which returned audit results must have been created. If `from` is provided `to` must be after `from` or no audit records are returned.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAuditRecordsUnauthorizedException
    * @throws \JiraSdk\Exception\GetAuditRecordsForbiddenException
    *
    * @return null|\JiraSdk\Model\AuditRecords|\Psr\Http\Message\ResponseInterface
    */
    public function getAuditRecords(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAuditRecords($queryParameters), $fetch);
    }
    /**
    * Returns a list of system avatar details by owner type, where the owner types are issue type, project, or user.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param string $type The avatar type.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAllSystemAvatarsUnauthorizedException
    * @throws \JiraSdk\Exception\GetAllSystemAvatarsInternalServerErrorException
    *
    * @return null|\JiraSdk\Model\SystemAvatars|\Psr\Http\Message\ResponseInterface
    */
    public function getAllSystemAvatars(string $type, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllSystemAvatars($type), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of comments specified by a list of comment IDs.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** Comments are returned where the user:
    
    *  has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the comment.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param \JiraSdk\Model\IssueCommentListRequestBean $requestBody 
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `renderedBody` Returns the comment body rendered in HTML.
    *  `properties` Returns the comment's properties.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetCommentsByIdsBadRequestException
    *
    * @return null|\JiraSdk\Model\PageBeanComment|\Psr\Http\Message\ResponseInterface
    */
    public function getCommentsByIds(\JiraSdk\Model\IssueCommentListRequestBean $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetCommentsByIds($requestBody, $queryParameters), $fetch);
    }
    /**
    * Returns the keys of all the properties of a comment.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $commentId The ID of the comment.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetCommentPropertyKeysBadRequestException
    * @throws \JiraSdk\Exception\GetCommentPropertyKeysUnauthorizedException
    * @throws \JiraSdk\Exception\GetCommentPropertyKeysForbiddenException
    * @throws \JiraSdk\Exception\GetCommentPropertyKeysNotFoundException
    *
    * @return null|\JiraSdk\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface
    */
    public function getCommentPropertyKeys(string $commentId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetCommentPropertyKeys($commentId), $fetch);
    }
    /**
    * Deletes a comment property.
    
    **[Permissions](#permissions) required:** either of:
    
    *  *Edit All Comments* [project permission](https://confluence.atlassian.com/x/yodKLg) to delete a property from any comment.
    *  *Edit Own Comments* [project permission](https://confluence.atlassian.com/x/yodKLg) to delete a property from a comment created by the user.
    
    Also, when the visibility of a comment is restricted to a role or group the user must be a member of that role or group.
    *
    * @param string $commentId The ID of the comment.
    * @param string $propertyKey The key of the property.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteCommentPropertyBadRequestException
    * @throws \JiraSdk\Exception\DeleteCommentPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteCommentPropertyForbiddenException
    * @throws \JiraSdk\Exception\DeleteCommentPropertyNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteCommentProperty(string $commentId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteCommentProperty($commentId, $propertyKey), $fetch);
    }
    /**
    * Returns the value of a comment property.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $commentId The ID of the comment.
    * @param string $propertyKey The key of the property.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetCommentPropertyBadRequestException
    * @throws \JiraSdk\Exception\GetCommentPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\GetCommentPropertyForbiddenException
    * @throws \JiraSdk\Exception\GetCommentPropertyNotFoundException
    *
    * @return null|\JiraSdk\Model\EntityProperty|\Psr\Http\Message\ResponseInterface
    */
    public function getCommentProperty(string $commentId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetCommentProperty($commentId, $propertyKey), $fetch);
    }
    /**
    * Creates or updates the value of a property for a comment. Use this resource to store custom data against a comment.
    
    The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
    
    **[Permissions](#permissions) required:** either of:
    
    *  *Edit All Comments* [project permission](https://confluence.atlassian.com/x/yodKLg) to create or update the value of a property on any comment.
    *  *Edit Own Comments* [project permission](https://confluence.atlassian.com/x/yodKLg) to create or update the value of a property on a comment created by the user.
    
    Also, when the visibility of a comment is restricted to a role or group the user must be a member of that role or group.
    *
    * @param string $commentId The ID of the comment.
    * @param string $propertyKey The key of the property. The maximum length is 255 characters.
    * @param mixed $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetCommentPropertyBadRequestException
    * @throws \JiraSdk\Exception\SetCommentPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\SetCommentPropertyForbiddenException
    * @throws \JiraSdk\Exception\SetCommentPropertyNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function setCommentProperty(string $commentId, string $propertyKey, $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetCommentProperty($commentId, $propertyKey, $requestBody), $fetch);
    }
    /**
    * Creates a component. Use components to provide containers for issues within a project.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project in which the component is created or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\ProjectComponent $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateComponentBadRequestException
    * @throws \JiraSdk\Exception\CreateComponentUnauthorizedException
    * @throws \JiraSdk\Exception\CreateComponentForbiddenException
    * @throws \JiraSdk\Exception\CreateComponentNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectComponent|\Psr\Http\Message\ResponseInterface
    */
    public function createComponent(\JiraSdk\Model\ProjectComponent $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateComponent($requestBody), $fetch);
    }
    /**
    * Deletes a component.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the component or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $id The ID of the component.
    * @param array $queryParameters {
    *     @var string $moveIssuesTo The ID of the component to replace the deleted component. If this value is null no replacement is made.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteComponentUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteComponentForbiddenException
    * @throws \JiraSdk\Exception\DeleteComponentNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteComponent(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteComponent($id, $queryParameters), $fetch);
    }
    /**
    * Returns a component.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for project containing the component.
    *
    * @param string $id The ID of the component.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetComponentUnauthorizedException
    * @throws \JiraSdk\Exception\GetComponentNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectComponent|\Psr\Http\Message\ResponseInterface
    */
    public function getComponent(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetComponent($id), $fetch);
    }
    /**
    * Updates a component. Any fields included in the request are overwritten. If `leadAccountId` is an empty string ("") the component lead is removed.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the component or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $id The ID of the component.
    * @param \JiraSdk\Model\ProjectComponent $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateComponentBadRequestException
    * @throws \JiraSdk\Exception\UpdateComponentUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateComponentForbiddenException
    * @throws \JiraSdk\Exception\UpdateComponentNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectComponent|\Psr\Http\Message\ResponseInterface
    */
    public function updateComponent(string $id, \JiraSdk\Model\ProjectComponent $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateComponent($id, $requestBody), $fetch);
    }
    /**
    * Returns the counts of issues assigned to the component.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param string $id The ID of the component.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetComponentRelatedIssuesUnauthorizedException
    * @throws \JiraSdk\Exception\GetComponentRelatedIssuesNotFoundException
    *
    * @return null|\JiraSdk\Model\ComponentIssuesCount|\Psr\Http\Message\ResponseInterface
    */
    public function getComponentRelatedIssues(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetComponentRelatedIssues($id), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetConfigurationUnauthorizedException
     *
     * @return null|\JiraSdk\Model\Configuration|\Psr\Http\Message\ResponseInterface
     */
    public function getConfiguration(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetConfiguration(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetSelectedTimeTrackingImplementationUnauthorizedException
     * @throws \JiraSdk\Exception\GetSelectedTimeTrackingImplementationForbiddenException
     *
     * @return null|\JiraSdk\Model\TimeTrackingProvider|\Psr\Http\Message\ResponseInterface
     */
    public function getSelectedTimeTrackingImplementation(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetSelectedTimeTrackingImplementation(), $fetch);
    }
    /**
     * Selects a time tracking provider.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\TimeTrackingProvider $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\SelectTimeTrackingImplementationBadRequestException
     * @throws \JiraSdk\Exception\SelectTimeTrackingImplementationUnauthorizedException
     * @throws \JiraSdk\Exception\SelectTimeTrackingImplementationForbiddenException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function selectTimeTrackingImplementation(\JiraSdk\Model\TimeTrackingProvider $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SelectTimeTrackingImplementation($requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAvailableTimeTrackingImplementationsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAvailableTimeTrackingImplementationsForbiddenException
     *
     * @return null|\JiraSdk\Model\TimeTrackingProvider[]|\Psr\Http\Message\ResponseInterface
     */
    public function getAvailableTimeTrackingImplementations(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAvailableTimeTrackingImplementations(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetSharedTimeTrackingConfigurationUnauthorizedException
     * @throws \JiraSdk\Exception\GetSharedTimeTrackingConfigurationForbiddenException
     *
     * @return null|\JiraSdk\Model\TimeTrackingConfiguration|\Psr\Http\Message\ResponseInterface
     */
    public function getSharedTimeTrackingConfiguration(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetSharedTimeTrackingConfiguration(), $fetch);
    }
    /**
     * Sets the time tracking settings.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\TimeTrackingConfiguration $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\SetSharedTimeTrackingConfigurationBadRequestException
     * @throws \JiraSdk\Exception\SetSharedTimeTrackingConfigurationUnauthorizedException
     * @throws \JiraSdk\Exception\SetSharedTimeTrackingConfigurationForbiddenException
     *
     * @return null|\JiraSdk\Model\TimeTrackingConfiguration|\Psr\Http\Message\ResponseInterface
     */
    public function setSharedTimeTrackingConfiguration(\JiraSdk\Model\TimeTrackingConfiguration $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetSharedTimeTrackingConfiguration($requestBody), $fetch);
    }
    /**
    * Returns a custom field option. For example, an option in a select list.
    
    Note that this operation **only works for issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource**, it cannot be used with issue field select list options created by Connect apps.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** The custom field option is returned as follows:
    
    *  if the user has the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *  if the user has the *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one project the custom field is used in, and the field is visible in at least one layout the user has permission to view.
    *
    * @param string $id The ID of the custom field option.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetCustomFieldOptionUnauthorizedException
    * @throws \JiraSdk\Exception\GetCustomFieldOptionNotFoundException
    *
    * @return null|\JiraSdk\Model\CustomFieldOption|\Psr\Http\Message\ResponseInterface
    */
    public function getCustomFieldOption(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetCustomFieldOption($id), $fetch);
    }
    /**
    * Returns a list of dashboards owned by or shared with the user. The list may be filtered to include only favorite or owned dashboards.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param array $queryParameters {
    *     @var string $filter The filter applied to the list of dashboards. Valid values are:
    
    *  `favourite` Returns dashboards the user has marked as favorite.
    *  `my` Returns dashboards owned by the user.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAllDashboardsBadRequestException
    * @throws \JiraSdk\Exception\GetAllDashboardsUnauthorizedException
    *
    * @return null|\JiraSdk\Model\PageOfDashboards|\Psr\Http\Message\ResponseInterface
    */
    public function getAllDashboards(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllDashboards($queryParameters), $fetch);
    }
    /**
     * Creates a dashboard.
     **[Permissions](#permissions) required:** None.
     *
     * @param \JiraSdk\Model\DashboardDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateDashboardBadRequestException
     * @throws \JiraSdk\Exception\CreateDashboardUnauthorizedException
     *
     * @return null|\JiraSdk\Model\Dashboard|\Psr\Http\Message\ResponseInterface
     */
    public function createDashboard(\JiraSdk\Model\DashboardDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateDashboard($requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAllAvailableDashboardGadgetsBadRequestException
     * @throws \JiraSdk\Exception\GetAllAvailableDashboardGadgetsUnauthorizedException
     *
     * @return null|\JiraSdk\Model\AvailableDashboardGadgetsResponse|\Psr\Http\Message\ResponseInterface
     */
    public function getAllAvailableDashboardGadgets(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllAvailableDashboardGadgets(), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of dashboards. This operation is similar to [Get dashboards](#api-rest-api-3-dashboard-get) except that the results can be refined to include dashboards that have specific attributes. For example, dashboards with a particular name. When multiple attributes are specified only filters matching all attributes are returned.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** The following dashboards that match the query parameters are returned:
    
    *  Dashboards owned by the user. Not returned for anonymous users.
    *  Dashboards shared with a group that the user is a member of. Not returned for anonymous users.
    *  Dashboards shared with a private project that the user can browse. Not returned for anonymous users.
    *  Dashboards shared with a public project.
    *  Dashboards shared with the public.
    *
    * @param array $queryParameters {
    *     @var string $dashboardName String used to perform a case-insensitive partial match with `name`.
    *     @var string $accountId User account ID used to return dashboards with the matching `owner.accountId`. This parameter cannot be used with the `owner` parameter.
    *     @var string $owner This parameter is deprecated because of privacy changes. Use `accountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. User name used to return dashboards with the matching `owner.name`. This parameter cannot be used with the `accountId` parameter.
    *     @var string $groupname As a group's name can change, use of `groupId` is recommended. Group name used to return dashboards that are shared with a group that matches `sharePermissions.group.name`. This parameter cannot be used with the `groupId` parameter.
    *     @var string $groupId Group ID used to return dashboards that are shared with a group that matches `sharePermissions.group.groupId`. This parameter cannot be used with the `groupname` parameter.
    *     @var int $projectId Project ID used to returns dashboards that are shared with a project that matches `sharePermissions.project.id`.
    *     @var string $orderBy [Order](#ordering) the results by a field:
    
    *  `description` Sorts by dashboard description. Note that this sort works independently of whether the expand to display the description field is in use.
    *  `favourite_count` Sorts by dashboard popularity.
    *  `id` Sorts by dashboard ID.
    *  `is_favourite` Sorts by whether the dashboard is marked as a favorite.
    *  `name` Sorts by dashboard name.
    *  `owner` Sorts by dashboard owner name.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var string $status The status to filter by. It may be active, archived or deleted.
    *     @var string $expand Use [expand](#expansion) to include additional information about dashboard in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `description` Returns the description of the dashboard.
    *  `owner` Returns the owner of the dashboard.
    *  `viewUrl` Returns the URL that is used to view the dashboard.
    *  `favourite` Returns `isFavourite`, an indicator of whether the user has set the dashboard as a favorite.
    *  `favouritedCount` Returns `popularity`, a count of how many users have set this dashboard as a favorite.
    *  `sharePermissions` Returns details of the share permissions defined for the dashboard.
    *  `editPermissions` Returns details of the edit permissions defined for the dashboard.
    *  `isWritable` Returns whether the current user has permission to edit the dashboard.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetDashboardsPaginatedBadRequestException
    * @throws \JiraSdk\Exception\GetDashboardsPaginatedUnauthorizedException
    *
    * @return null|\JiraSdk\Model\PageBeanDashboard|\Psr\Http\Message\ResponseInterface
    */
    public function getDashboardsPaginated(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetDashboardsPaginated($queryParameters), $fetch);
    }
    /**
    * Returns a list of dashboard gadgets on a dashboard.
    
    This operation returns:
    
    *  Gadgets from a list of IDs, when `id` is set.
    *  Gadgets with a module key, when `moduleKey` is set.
    *  Gadgets from a list of URIs, when `uri` is set.
    *  All gadgets, when no other parameters are set.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param int $dashboardId The ID of the dashboard.
    * @param array $queryParameters {
    *     @var array $moduleKey The list of gadgets module keys. To include multiple module keys, separate module keys with ampersand: `moduleKey=key:one&moduleKey=key:two`.
    *     @var array $uri The list of gadgets URIs. To include multiple URIs, separate URIs with ampersand: `uri=/rest/example/uri/1&uri=/rest/example/uri/2`.
    *     @var array $gadgetId The list of gadgets IDs. To include multiple IDs, separate IDs with ampersand: `gadgetId=10000&gadgetId=10001`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAllGadgetsUnauthorizedException
    * @throws \JiraSdk\Exception\GetAllGadgetsNotFoundException
    *
    * @return null|\JiraSdk\Model\DashboardGadgetResponse|\Psr\Http\Message\ResponseInterface
    */
    public function getAllGadgets(int $dashboardId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllGadgets($dashboardId, $queryParameters), $fetch);
    }
    /**
     * Adds a gadget to a dashboard.
     **[Permissions](#permissions) required:** None.
     *
     * @param int $dashboardId The ID of the dashboard.
     * @param \JiraSdk\Model\DashboardGadgetSettings $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\AddGadgetBadRequestException
     * @throws \JiraSdk\Exception\AddGadgetUnauthorizedException
     * @throws \JiraSdk\Exception\AddGadgetNotFoundException
     *
     * @return null|\JiraSdk\Model\DashboardGadget|\Psr\Http\Message\ResponseInterface
     */
    public function addGadget(int $dashboardId, \JiraSdk\Model\DashboardGadgetSettings $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddGadget($dashboardId, $requestBody), $fetch);
    }
    /**
    * Removes a dashboard gadget from a dashboard.
    
    When a gadget is removed from a dashboard, other gadgets in the same column are moved up to fill the emptied position.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param int $dashboardId The ID of the dashboard.
    * @param int $gadgetId The ID of the gadget.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\RemoveGadgetUnauthorizedException
    * @throws \JiraSdk\Exception\RemoveGadgetNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function removeGadget(int $dashboardId, int $gadgetId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveGadget($dashboardId, $gadgetId), $fetch);
    }
    /**
     * Changes the title, position, and color of the gadget on a dashboard.
     **[Permissions](#permissions) required:** None.
     *
     * @param int $dashboardId The ID of the dashboard.
     * @param int $gadgetId The ID of the gadget.
     * @param \JiraSdk\Model\DashboardGadgetUpdateRequest $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateGadgetBadRequestException
     * @throws \JiraSdk\Exception\UpdateGadgetUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateGadgetNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function updateGadget(int $dashboardId, int $gadgetId, \JiraSdk\Model\DashboardGadgetUpdateRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateGadget($dashboardId, $gadgetId, $requestBody), $fetch);
    }
    /**
    * Returns the keys of all properties for a dashboard item.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** The user must be the owner of the dashboard or have the dashboard shared with them. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard. The System dashboard is considered to be shared with all other users, and is accessible to anonymous users when Jira’s anonymous access is permitted.
    *
    * @param string $dashboardId The ID of the dashboard.
    * @param string $itemId The ID of the dashboard item.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetDashboardItemPropertyKeysUnauthorizedException
    * @throws \JiraSdk\Exception\GetDashboardItemPropertyKeysNotFoundException
    *
    * @return null|\JiraSdk\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface
    */
    public function getDashboardItemPropertyKeys(string $dashboardId, string $itemId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetDashboardItemPropertyKeys($dashboardId, $itemId), $fetch);
    }
    /**
    * Deletes a dashboard item property.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** The user must be the owner of the dashboard. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard.
    *
    * @param string $dashboardId The ID of the dashboard.
    * @param string $itemId The ID of the dashboard item.
    * @param string $propertyKey The key of the dashboard item property.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteDashboardItemPropertyBadRequestException
    * @throws \JiraSdk\Exception\DeleteDashboardItemPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteDashboardItemPropertyForbiddenException
    * @throws \JiraSdk\Exception\DeleteDashboardItemPropertyNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteDashboardItemProperty(string $dashboardId, string $itemId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteDashboardItemProperty($dashboardId, $itemId, $propertyKey), $fetch);
    }
    /**
    * Returns the key and value of a dashboard item property.
    
    A dashboard item enables an app to add user-specific information to a user dashboard. Dashboard items are exposed to users as gadgets that users can add to their dashboards. For more information on how users do this, see [Adding and customizing gadgets](https://confluence.atlassian.com/x/7AeiLQ).
    
    When an app creates a dashboard item it registers a callback to receive the dashboard item ID. The callback fires whenever the item is rendered or, where the item is configurable, the user edits the item. The app then uses this resource to store the item's content or configuration details. For more information on working with dashboard items, see [ Building a dashboard item for a JIRA Connect add-on](https://developer.atlassian.com/server/jira/platform/guide-building-a-dashboard-item-for-a-jira-connect-add-on-33746254/) and the [Dashboard Item](https://developer.atlassian.com/cloud/jira/platform/modules/dashboard-item/) documentation.
    
    There is no resource to set or get dashboard items.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** The user must be the owner of the dashboard or have the dashboard shared with them. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard. The System dashboard is considered to be shared with all other users, and is accessible to anonymous users when Jira’s anonymous access is permitted.
    *
    * @param string $dashboardId The ID of the dashboard.
    * @param string $itemId The ID of the dashboard item.
    * @param string $propertyKey The key of the dashboard item property.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetDashboardItemPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\GetDashboardItemPropertyNotFoundException
    *
    * @return null|\JiraSdk\Model\EntityProperty|\Psr\Http\Message\ResponseInterface
    */
    public function getDashboardItemProperty(string $dashboardId, string $itemId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetDashboardItemProperty($dashboardId, $itemId, $propertyKey), $fetch);
    }
    /**
    * Sets the value of a dashboard item property. Use this resource in apps to store custom data against a dashboard item.
    
    A dashboard item enables an app to add user-specific information to a user dashboard. Dashboard items are exposed to users as gadgets that users can add to their dashboards. For more information on how users do this, see [Adding and customizing gadgets](https://confluence.atlassian.com/x/7AeiLQ).
    
    When an app creates a dashboard item it registers a callback to receive the dashboard item ID. The callback fires whenever the item is rendered or, where the item is configurable, the user edits the item. The app then uses this resource to store the item's content or configuration details. For more information on working with dashboard items, see [ Building a dashboard item for a JIRA Connect add-on](https://developer.atlassian.com/server/jira/platform/guide-building-a-dashboard-item-for-a-jira-connect-add-on-33746254/) and the [Dashboard Item](https://developer.atlassian.com/cloud/jira/platform/modules/dashboard-item/) documentation.
    
    There is no resource to set or get dashboard items.
    
    The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** The user must be the owner of the dashboard. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard.
    *
    * @param string $dashboardId The ID of the dashboard.
    * @param string $itemId The ID of the dashboard item.
    * @param string $propertyKey The key of the dashboard item property. The maximum length is 255 characters. For dashboard items with a spec URI and no complete module key, if the provided propertyKey is equal to "config", the request body's JSON must be an object with all keys and values as strings.
    * @param mixed $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetDashboardItemPropertyBadRequestException
    * @throws \JiraSdk\Exception\SetDashboardItemPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\SetDashboardItemPropertyForbiddenException
    * @throws \JiraSdk\Exception\SetDashboardItemPropertyNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function setDashboardItemProperty(string $dashboardId, string $itemId, string $propertyKey, $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetDashboardItemProperty($dashboardId, $itemId, $propertyKey, $requestBody), $fetch);
    }
    /**
    * Deletes a dashboard.
    
    **[Permissions](#permissions) required:** None
    
    The dashboard to be deleted must be owned by the user.
    *
    * @param string $id The ID of the dashboard.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteDashboardBadRequestException
    * @throws \JiraSdk\Exception\DeleteDashboardUnauthorizedException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteDashboard(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteDashboard($id), $fetch);
    }
    /**
    * Returns a dashboard.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    
    However, to get a dashboard, the dashboard must be shared with the user or the user must own it. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard. The System dashboard is considered to be shared with all other users.
    *
    * @param string $id The ID of the dashboard.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetDashboardBadRequestException
    * @throws \JiraSdk\Exception\GetDashboardUnauthorizedException
    * @throws \JiraSdk\Exception\GetDashboardNotFoundException
    *
    * @return null|\JiraSdk\Model\Dashboard|\Psr\Http\Message\ResponseInterface
    */
    public function getDashboard(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetDashboard($id), $fetch);
    }
    /**
    * Updates a dashboard, replacing all the dashboard details with those provided.
    
    **[Permissions](#permissions) required:** None
    
    The dashboard to be updated must be owned by the user.
    *
    * @param string $id The ID of the dashboard to update.
    * @param \JiraSdk\Model\DashboardDetails $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateDashboardBadRequestException
    * @throws \JiraSdk\Exception\UpdateDashboardUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateDashboardNotFoundException
    *
    * @return null|\JiraSdk\Model\Dashboard|\Psr\Http\Message\ResponseInterface
    */
    public function updateDashboard(string $id, \JiraSdk\Model\DashboardDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateDashboard($id, $requestBody), $fetch);
    }
    /**
    * Copies a dashboard. Any values provided in the `dashboard` parameter replace those in the copied dashboard.
    
    **[Permissions](#permissions) required:** None
    
    The dashboard to be copied must be owned by or shared with the user.
    *
    * @param string $id 
    * @param \JiraSdk\Model\DashboardDetails $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CopyDashboardBadRequestException
    * @throws \JiraSdk\Exception\CopyDashboardUnauthorizedException
    * @throws \JiraSdk\Exception\CopyDashboardNotFoundException
    *
    * @return null|\JiraSdk\Model\Dashboard|\Psr\Http\Message\ResponseInterface
    */
    public function copyDashboard(string $id, \JiraSdk\Model\DashboardDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CopyDashboard($id, $requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetEventsUnauthorizedException
     * @throws \JiraSdk\Exception\GetEventsForbiddenException
     *
     * @return null|\JiraSdk\Model\IssueEvent[]|\Psr\Http\Message\ResponseInterface
     */
    public function getEvents(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetEvents(), $fetch);
    }
    /**
    * Analyses and validates Jira expressions.
    
    As an experimental feature, this operation can also attempt to type-check the expressions.
    
    Learn more about Jira expressions in the [documentation](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/).
    
    **[Permissions](#permissions) required**: None.
    *
    * @param \JiraSdk\Model\JiraExpressionForAnalysis $requestBody 
    * @param array $queryParameters {
    *     @var string $check The check to perform:
    
    *  `syntax` Each expression's syntax is checked to ensure the expression can be parsed. Also, syntactic limits are validated. For example, the expression's length.
    *  `type` EXPERIMENTAL. Each expression is type checked and the final type of the expression inferred. Any type errors that would result in the expression failure at runtime are reported. For example, accessing properties that don't exist or passing the wrong number of arguments to functions. Also performs the syntax check.
    *  `complexity` EXPERIMENTAL. Determines the formulae for how many [expensive operations](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#expensive-operations) each expression may execute.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AnalyseExpressionBadRequestException
    * @throws \JiraSdk\Exception\AnalyseExpressionUnauthorizedException
    * @throws \JiraSdk\Exception\AnalyseExpressionNotFoundException
    *
    * @return null|\JiraSdk\Model\JiraExpressionsAnalysis|\Psr\Http\Message\ResponseInterface
    */
    public function analyseExpression(\JiraSdk\Model\JiraExpressionForAnalysis $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AnalyseExpression($requestBody, $queryParameters), $fetch);
    }
    /**
    * Evaluates a Jira expression and returns its value.
    
    This resource can be used to test Jira expressions that you plan to use elsewhere, or to fetch data in a flexible way. Consult the [Jira expressions documentation](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/) for more details.
    
    #### Context variables ####
    
    The following context variables are available to Jira expressions evaluated by this resource. Their presence depends on various factors; usually you need to manually request them in the context object sent in the payload, but some of them are added automatically under certain conditions.
    
    *  `user` ([User](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user)): The current user. Always available and equal to `null` if the request is anonymous.
    *  `app` ([App](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#app)): The [Connect app](https://developer.atlassian.com/cloud/jira/platform/index/#connect-apps) that made the request. Available only for authenticated requests made by Connect Apps (read more here: [Authentication for Connect apps](https://developer.atlassian.com/cloud/jira/platform/security-for-connect-apps/)).
    *  `issue` ([Issue](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue)): The current issue. Available only when the issue is provided in the request context object.
    *  `issues` ([List](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#list) of [Issues](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue)): A collection of issues matching a JQL query. Available only when JQL is provided in the request context object.
    *  `project` ([Project](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#project)): The current project. Available only when the project is provided in the request context object.
    *  `sprint` ([Sprint](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#sprint)): The current sprint. Available only when the sprint is provided in the request context object.
    *  `board` ([Board](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#board)): The current board. Available only when the board is provided in the request context object.
    *  `serviceDesk` ([ServiceDesk](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#servicedesk)): The current service desk. Available only when the service desk is provided in the request context object.
    *  `customerRequest` ([CustomerRequest](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#customerrequest)): The current customer request. Available only when the customer request is provided in the request context object.
    
    Also, custom context variables can be passed in the request with their types. Those variables can be accessed by key in the Jira expression. These variable types are available for use in a custom context:
    
    *  `user`: A [user](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user) specified as an Atlassian account ID.
    *  `issue`: An [issue](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue) specified by ID or key. All the fields of the issue object are available in the Jira expression.
    *  `json`: A JSON object containing custom content.
    *  `list`: A JSON list of `user`, `issue`, or `json` variable types.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required**: None. However, an expression may return different results for different users depending on their permissions. For example, different users may see different comments on the same issue.  
    Permission to access Jira Software is required to access Jira Software context variables (`board` and `sprint`) or fields (for example, `issue.sprint`).
    *
    * @param \JiraSdk\Model\JiraExpressionEvalRequestBean $requestBody 
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts `meta.complexity` that returns information about the expression complexity. For example, the number of expensive operations used by the expression and how close the expression is to reaching the [complexity limit](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#restrictions). Useful when designing and debugging your expressions.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\EvaluateJiraExpressionBadRequestException
    * @throws \JiraSdk\Exception\EvaluateJiraExpressionUnauthorizedException
    * @throws \JiraSdk\Exception\EvaluateJiraExpressionNotFoundException
    *
    * @return null|\JiraSdk\Model\JiraExpressionResult|\Psr\Http\Message\ResponseInterface
    */
    public function evaluateJiraExpression(\JiraSdk\Model\JiraExpressionEvalRequestBean $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\EvaluateJiraExpression($requestBody, $queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetFieldsUnauthorizedException
     *
     * @return null|\JiraSdk\Model\FieldDetails[]|\Psr\Http\Message\ResponseInterface
     */
    public function getFields(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetFields(), $fetch);
    }
    /**
     * Creates a custom field.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\CustomFieldDefinitionJsonBean $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateCustomFieldBadRequestException
     *
     * @return null|\JiraSdk\Model\FieldDetails|\Psr\Http\Message\ResponseInterface
     */
    public function createCustomField(\JiraSdk\Model\CustomFieldDefinitionJsonBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateCustomField($requestBody), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of fields for Classic Jira projects. The list can include:
    
    *  all fields
    *  specific fields, by defining `id`
    *  fields that contain a string in the field name or description, by defining `query`
    *  specific fields that contain a string in the field name or description, by defining `id` and `query`
    
    Only custom fields can be queried, `type` must be set to `custom`.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $type The type of fields to search.
    *     @var array $id The IDs of the custom fields to return or, where `query` is specified, filter.
    *     @var string $query String used to perform a case-insensitive partial match with field names or descriptions.
    *     @var string $orderBy [Order](#ordering) the results by a field:
    
    *  `contextsCount` sorts by the number of contexts related to a field
    *  `lastUsed` sorts by the date when the value of the field last changed
    *  `name` sorts by the field name
    *  `screensCount` sorts by the number of screens related to a field
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `key` returns the key for each field
    *  `lastUsed` returns the date when the value of the field last changed
    *  `screensCount` returns the number of screens related to a field
    *  `contextsCount` returns the number of contexts related to a field
    *  `isLocked` returns information about whether the field is [locked](https://confluence.atlassian.com/x/ZSN7Og)
    *  `searcherKey` returns the searcher key for each custom field
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetFieldsPaginatedBadRequestException
    * @throws \JiraSdk\Exception\GetFieldsPaginatedUnauthorizedException
    * @throws \JiraSdk\Exception\GetFieldsPaginatedForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanField|\Psr\Http\Message\ResponseInterface
    */
    public function getFieldsPaginated(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetFieldsPaginated($queryParameters), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of fields in the trash. The list may be restricted to fields whose field name or description partially match a string.
    
    Only custom fields can be queried, `type` must be set to `custom`.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $id 
    *     @var string $query String used to perform a case-insensitive partial match with field names or descriptions.
    *     @var string $expand 
    *     @var string $orderBy [Order](#ordering) the results by a field:
    
    *  `name` sorts by the field name
    *  `trashDate` sorts by the date the field was moved to the trash
    *  `plannedDeletionDate` sorts by the planned deletion date
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetTrashedFieldsPaginatedBadRequestException
    * @throws \JiraSdk\Exception\GetTrashedFieldsPaginatedUnauthorizedException
    * @throws \JiraSdk\Exception\GetTrashedFieldsPaginatedForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanField|\Psr\Http\Message\ResponseInterface
    */
    public function getTrashedFieldsPaginated(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetTrashedFieldsPaginated($queryParameters), $fetch);
    }
    /**
     * Updates a custom field.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId The ID of the custom field.
     * @param \JiraSdk\Model\UpdateCustomFieldDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateCustomFieldBadRequestException
     * @throws \JiraSdk\Exception\UpdateCustomFieldUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateCustomFieldForbiddenException
     * @throws \JiraSdk\Exception\UpdateCustomFieldNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function updateCustomField(string $fieldId, \JiraSdk\Model\UpdateCustomFieldDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateCustomField($fieldId, $requestBody), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) list of [ contexts](https://confluence.atlassian.com/adminjiracloud/what-are-custom-field-contexts-991923859.html) for a custom field. Contexts can be returned as follows:
     *  With no other parameters set, all contexts.
     *  By defining `id` only, all contexts from the list of IDs.
     *  By defining `isAnyIssueType`, limit the list of contexts returned to either those that apply to all issue types (true) or those that apply to only a subset of issue types (false)
     *  By defining `isGlobalContext`, limit the list of contexts return to either those that apply to all projects (global contexts) (true) or those that apply to only a subset of projects (false).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId The ID of the custom field.
     * @param array $queryParameters {
     *     @var bool $isAnyIssueType Whether to return contexts that apply to all issue types.
     *     @var bool $isGlobalContext Whether to return contexts that apply to all projects.
     *     @var array $contextId The list of context IDs. To include multiple contexts, separate IDs with ampersand: `contextId=10000&contextId=10001`.
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetContextsForFieldUnauthorizedException
     * @throws \JiraSdk\Exception\GetContextsForFieldForbiddenException
     * @throws \JiraSdk\Exception\GetContextsForFieldNotFoundException
     *
     * @return null|\JiraSdk\Model\PageBeanCustomFieldContext|\Psr\Http\Message\ResponseInterface
     */
    public function getContextsForField(string $fieldId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetContextsForField($fieldId, $queryParameters), $fetch);
    }
    /**
    * Creates a custom field context.
    
    If `projectIds` is empty, a global context is created. A global context is one that applies to all project. If `issueTypeIds` is empty, the context applies to all issue types.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param \JiraSdk\Model\CreateCustomFieldContext $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateCustomFieldContextBadRequestException
    * @throws \JiraSdk\Exception\CreateCustomFieldContextUnauthorizedException
    * @throws \JiraSdk\Exception\CreateCustomFieldContextNotFoundException
    * @throws \JiraSdk\Exception\CreateCustomFieldContextConflictException
    *
    * @return null|\JiraSdk\Model\CreateCustomFieldContext|\Psr\Http\Message\ResponseInterface
    */
    public function createCustomFieldContext(string $fieldId, \JiraSdk\Model\CreateCustomFieldContext $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateCustomFieldContext($fieldId, $requestBody), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of defaults for a custom field. The results can be filtered by `contextId`, otherwise all values are returned. If no defaults are set for a context, nothing is returned.  
    The returned object depends on type of the custom field:
    
    *  `CustomFieldContextDefaultValueDate` (type `datepicker`) for date fields.
    *  `CustomFieldContextDefaultValueDateTime` (type `datetimepicker`) for date-time fields.
    *  `CustomFieldContextDefaultValueSingleOption` (type `option.single`) for single choice select lists and radio buttons.
    *  `CustomFieldContextDefaultValueMultipleOption` (type `option.multiple`) for multiple choice select lists and checkboxes.
    *  `CustomFieldContextDefaultValueCascadingOption` (type `option.cascading`) for cascading select lists.
    *  `CustomFieldContextSingleUserPickerDefaults` (type `single.user.select`) for single users.
    *  `CustomFieldContextDefaultValueMultiUserPicker` (type `multi.user.select`) for user lists.
    *  `CustomFieldContextDefaultValueSingleGroupPicker` (type `grouppicker.single`) for single choice group pickers.
    *  `CustomFieldContextDefaultValueMultipleGroupPicker` (type `grouppicker.multiple`) for multiple choice group pickers.
    *  `CustomFieldContextDefaultValueURL` (type `url`) for URLs.
    *  `CustomFieldContextDefaultValueProject` (type `project`) for project pickers.
    *  `CustomFieldContextDefaultValueFloat` (type `float`) for floats (floating-point numbers).
    *  `CustomFieldContextDefaultValueLabels` (type `labels`) for labels.
    *  `CustomFieldContextDefaultValueTextField` (type `textfield`) for text fields.
    *  `CustomFieldContextDefaultValueTextArea` (type `textarea`) for text area fields.
    *  `CustomFieldContextDefaultValueReadOnly` (type `readonly`) for read only (text) fields.
    *  `CustomFieldContextDefaultValueMultipleVersion` (type `version.multiple`) for single choice version pickers.
    *  `CustomFieldContextDefaultValueSingleVersion` (type `version.single`) for multiple choice version pickers.
    
    Forge custom fields [types](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/#data-types) are also supported, returning:
    
    *  `CustomFieldContextDefaultValueForgeStringFieldBean` (type `forge.string`) for Forge string fields.
    *  `CustomFieldContextDefaultValueForgeMultiStringFieldBean` (type `forge.string.list`) for Forge string collection fields.
    *  `CustomFieldContextDefaultValueForgeObjectFieldBean` (type `forge.object`) for Forge object fields.
    *  `CustomFieldContextDefaultValueForgeDateTimeFieldBean` (type `forge.datetime`) for Forge date-time fields.
    *  `CustomFieldContextDefaultValueForgeGroupFieldBean` (type `forge.group`) for Forge group fields.
    *  `CustomFieldContextDefaultValueForgeMultiGroupFieldBean` (type `forge.group.list`) for Forge group collection fields.
    *  `CustomFieldContextDefaultValueForgeNumberFieldBean` (type `forge.number`) for Forge number fields.
    *  `CustomFieldContextDefaultValueForgeUserFieldBean` (type `forge.user`) for Forge user fields.
    *  `CustomFieldContextDefaultValueForgeMultiUserFieldBean` (type `forge.user.list`) for Forge user collection fields.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field, for example `customfield\_10000`.
    * @param array $queryParameters {
    *     @var array $contextId The IDs of the contexts.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetDefaultValuesUnauthorizedException
    * @throws \JiraSdk\Exception\GetDefaultValuesForbiddenException
    * @throws \JiraSdk\Exception\GetDefaultValuesNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanCustomFieldContextDefaultValue|\Psr\Http\Message\ResponseInterface
    */
    public function getDefaultValues(string $fieldId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetDefaultValues($fieldId, $queryParameters), $fetch);
    }
    /**
    * Sets default for contexts of a custom field. Default are defined using these objects:
    
    *  `CustomFieldContextDefaultValueDate` (type `datepicker`) for date fields.
    *  `CustomFieldContextDefaultValueDateTime` (type `datetimepicker`) for date-time fields.
    *  `CustomFieldContextDefaultValueSingleOption` (type `option.single`) for single choice select lists and radio buttons.
    *  `CustomFieldContextDefaultValueMultipleOption` (type `option.multiple`) for multiple choice select lists and checkboxes.
    *  `CustomFieldContextDefaultValueCascadingOption` (type `option.cascading`) for cascading select lists.
    *  `CustomFieldContextSingleUserPickerDefaults` (type `single.user.select`) for single users.
    *  `CustomFieldContextDefaultValueMultiUserPicker` (type `multi.user.select`) for user lists.
    *  `CustomFieldContextDefaultValueSingleGroupPicker` (type `grouppicker.single`) for single choice group pickers.
    *  `CustomFieldContextDefaultValueMultipleGroupPicker` (type `grouppicker.multiple`) for multiple choice group pickers.
    *  `CustomFieldContextDefaultValueURL` (type `url`) for URLs.
    *  `CustomFieldContextDefaultValueProject` (type `project`) for project pickers.
    *  `CustomFieldContextDefaultValueFloat` (type `float`) for floats (floating-point numbers).
    *  `CustomFieldContextDefaultValueLabels` (type `labels`) for labels.
    *  `CustomFieldContextDefaultValueTextField` (type `textfield`) for text fields.
    *  `CustomFieldContextDefaultValueTextArea` (type `textarea`) for text area fields.
    *  `CustomFieldContextDefaultValueReadOnly` (type `readonly`) for read only (text) fields.
    *  `CustomFieldContextDefaultValueMultipleVersion` (type `version.multiple`) for single choice version pickers.
    *  `CustomFieldContextDefaultValueSingleVersion` (type `version.single`) for multiple choice version pickers.
    
    Forge custom fields [types](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/#data-types) are also supported, returning:
    
    *  `CustomFieldContextDefaultValueForgeStringFieldBean` (type `forge.string`) for Forge string fields.
    *  `CustomFieldContextDefaultValueForgeMultiStringFieldBean` (type `forge.string.list`) for Forge string collection fields.
    *  `CustomFieldContextDefaultValueForgeObjectFieldBean` (type `forge.object`) for Forge object fields.
    *  `CustomFieldContextDefaultValueForgeDateTimeFieldBean` (type `forge.datetime`) for Forge date-time fields.
    *  `CustomFieldContextDefaultValueForgeGroupFieldBean` (type `forge.group`) for Forge group fields.
    *  `CustomFieldContextDefaultValueForgeMultiGroupFieldBean` (type `forge.group.list`) for Forge group collection fields.
    *  `CustomFieldContextDefaultValueForgeNumberFieldBean` (type `forge.number`) for Forge number fields.
    *  `CustomFieldContextDefaultValueForgeUserFieldBean` (type `forge.user`) for Forge user fields.
    *  `CustomFieldContextDefaultValueForgeMultiUserFieldBean` (type `forge.user.list`) for Forge user collection fields.
    
    Only one type of default object can be included in a request. To remove a default for a context, set the default parameter to `null`.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param \JiraSdk\Model\CustomFieldContextDefaultValueUpdate $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetDefaultValuesBadRequestException
    * @throws \JiraSdk\Exception\SetDefaultValuesUnauthorizedException
    * @throws \JiraSdk\Exception\SetDefaultValuesForbiddenException
    * @throws \JiraSdk\Exception\SetDefaultValuesNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function setDefaultValues(string $fieldId, \JiraSdk\Model\CustomFieldContextDefaultValueUpdate $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetDefaultValues($fieldId, $requestBody), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) list of context to issue type mappings for a custom field. Mappings are returned for all contexts or a list of contexts. Mappings are ordered first by context ID and then by issue type ID.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId The ID of the custom field.
     * @param array $queryParameters {
     *     @var array $contextId The ID of the context. To include multiple contexts, provide an ampersand-separated list. For example, `contextId=10001&contextId=10002`.
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetIssueTypeMappingsForContextsUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueTypeMappingsForContextsForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanIssueTypeToContextMapping|\Psr\Http\Message\ResponseInterface
     */
    public function getIssueTypeMappingsForContexts(string $fieldId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueTypeMappingsForContexts($fieldId, $queryParameters), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of project and issue type mappings and, for each mapping, the ID of a [custom field context](https://confluence.atlassian.com/x/k44fOw) that applies to the project and issue type.
    
    If there is no custom field context assigned to the project then, if present, the custom field context that applies to all projects is returned if it also applies to the issue type or all issue types. If a custom field context is not found, the returned custom field context ID is `null`.
    
    Duplicate project and issue type mappings cannot be provided in the request.
    
    The order of the returned values is the same as provided in the request.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param \JiraSdk\Model\ProjectIssueTypeMappings $requestBody 
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetCustomFieldContextsForProjectsAndIssueTypesBadRequestException
    * @throws \JiraSdk\Exception\GetCustomFieldContextsForProjectsAndIssueTypesUnauthorizedException
    * @throws \JiraSdk\Exception\GetCustomFieldContextsForProjectsAndIssueTypesForbiddenException
    * @throws \JiraSdk\Exception\GetCustomFieldContextsForProjectsAndIssueTypesNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanContextForProjectAndIssueType|\Psr\Http\Message\ResponseInterface
    */
    public function getCustomFieldContextsForProjectsAndIssueTypes(string $fieldId, \JiraSdk\Model\ProjectIssueTypeMappings $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetCustomFieldContextsForProjectsAndIssueTypes($fieldId, $requestBody, $queryParameters), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) list of context to project mappings for a custom field. The result can be filtered by `contextId`. Otherwise, all mappings are returned. Invalid IDs are ignored.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId The ID of the custom field, for example `customfield\_10000`.
     * @param array $queryParameters {
     *     @var array $contextId The list of context IDs. To include multiple context, separate IDs with ampersand: `contextId=10000&contextId=10001`.
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetProjectContextMappingUnauthorizedException
     * @throws \JiraSdk\Exception\GetProjectContextMappingForbiddenException
     * @throws \JiraSdk\Exception\GetProjectContextMappingNotFoundException
     *
     * @return null|\JiraSdk\Model\PageBeanCustomFieldContextProjectMapping|\Psr\Http\Message\ResponseInterface
     */
    public function getProjectContextMapping(string $fieldId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectContextMapping($fieldId, $queryParameters), $fetch);
    }
    /**
     * Deletes a [ custom field context](https://confluence.atlassian.com/adminjiracloud/what-are-custom-field-contexts-991923859.html).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId The ID of the custom field.
     * @param int $contextId The ID of the context.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteCustomFieldContextBadRequestException
     * @throws \JiraSdk\Exception\DeleteCustomFieldContextUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteCustomFieldContextForbiddenException
     * @throws \JiraSdk\Exception\DeleteCustomFieldContextNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteCustomFieldContext(string $fieldId, int $contextId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteCustomFieldContext($fieldId, $contextId), $fetch);
    }
    /**
     * Updates a [ custom field context](https://confluence.atlassian.com/adminjiracloud/what-are-custom-field-contexts-991923859.html).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId The ID of the custom field.
     * @param int $contextId The ID of the context.
     * @param \JiraSdk\Model\CustomFieldContextUpdateDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateCustomFieldContextBadRequestException
     * @throws \JiraSdk\Exception\UpdateCustomFieldContextUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateCustomFieldContextForbiddenException
     * @throws \JiraSdk\Exception\UpdateCustomFieldContextNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function updateCustomFieldContext(string $fieldId, int $contextId, \JiraSdk\Model\CustomFieldContextUpdateDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateCustomFieldContext($fieldId, $contextId, $requestBody), $fetch);
    }
    /**
    * Adds issue types to a custom field context, appending the issue types to the issue types list.
    
    A custom field context without any issue types applies to all issue types. Adding issue types to such a custom field context would result in it applying to only the listed issue types.
    
    If any of the issue types exists in the custom field context, the operation fails and no issue types are added.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param int $contextId The ID of the context.
    * @param \JiraSdk\Model\IssueTypeIds $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AddIssueTypesToContextBadRequestException
    * @throws \JiraSdk\Exception\AddIssueTypesToContextUnauthorizedException
    * @throws \JiraSdk\Exception\AddIssueTypesToContextForbiddenException
    * @throws \JiraSdk\Exception\AddIssueTypesToContextNotFoundException
    * @throws \JiraSdk\Exception\AddIssueTypesToContextConflictException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function addIssueTypesToContext(string $fieldId, int $contextId, \JiraSdk\Model\IssueTypeIds $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddIssueTypesToContext($fieldId, $contextId, $requestBody), $fetch);
    }
    /**
    * Removes issue types from a custom field context.
    
    A custom field context without any issue types applies to all issue types.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param int $contextId The ID of the context.
    * @param \JiraSdk\Model\IssueTypeIds $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\RemoveIssueTypesFromContextBadRequestException
    * @throws \JiraSdk\Exception\RemoveIssueTypesFromContextUnauthorizedException
    * @throws \JiraSdk\Exception\RemoveIssueTypesFromContextForbiddenException
    * @throws \JiraSdk\Exception\RemoveIssueTypesFromContextNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function removeIssueTypesFromContext(string $fieldId, int $contextId, \JiraSdk\Model\IssueTypeIds $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveIssueTypesFromContext($fieldId, $contextId, $requestBody), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of all custom field option for a context. Options are returned first then cascading options, in the order they display in Jira.
    
    This operation works for custom field options created in Jira or the operations from this resource. **To work with issue field select list options created for Connect apps use the [Issue custom field options (apps)](#api-group-issue-custom-field-options--apps-) operations.**
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param int $contextId The ID of the context.
    * @param array $queryParameters {
    *     @var int $optionId The ID of the option.
    *     @var bool $onlyOptions Whether only options are returned.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetOptionsForContextBadRequestException
    * @throws \JiraSdk\Exception\GetOptionsForContextUnauthorizedException
    * @throws \JiraSdk\Exception\GetOptionsForContextForbiddenException
    * @throws \JiraSdk\Exception\GetOptionsForContextNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanCustomFieldContextOption|\Psr\Http\Message\ResponseInterface
    */
    public function getOptionsForContext(string $fieldId, int $contextId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetOptionsForContext($fieldId, $contextId, $queryParameters), $fetch);
    }
    /**
    * Creates options and, where the custom select field is of the type Select List (cascading), cascading options for a custom select field. The options are added to a context of the field.
    
    The maximum number of options that can be created per request is 1000 and each field can have a maximum of 10000 options.
    
    This operation works for custom field options created in Jira or the operations from this resource. **To work with issue field select list options created for Connect apps use the [Issue custom field options (apps)](#api-group-issue-custom-field-options--apps-) operations.**
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param int $contextId The ID of the context.
    * @param \JiraSdk\Model\BulkCustomFieldOptionCreateRequest $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateCustomFieldOptionBadRequestException
    * @throws \JiraSdk\Exception\CreateCustomFieldOptionUnauthorizedException
    * @throws \JiraSdk\Exception\CreateCustomFieldOptionForbiddenException
    * @throws \JiraSdk\Exception\CreateCustomFieldOptionNotFoundException
    *
    * @return null|\JiraSdk\Model\CustomFieldCreatedContextOptionsList|\Psr\Http\Message\ResponseInterface
    */
    public function createCustomFieldOption(string $fieldId, int $contextId, \JiraSdk\Model\BulkCustomFieldOptionCreateRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateCustomFieldOption($fieldId, $contextId, $requestBody), $fetch);
    }
    /**
    * Updates the options of a custom field.
    
    If any of the options are not found, no options are updated. Options where the values in the request match the current values aren't updated and aren't reported in the response.
    
    Note that this operation **only works for issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource**, it cannot be used with issue field select list options created by Connect apps.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param int $contextId The ID of the context.
    * @param \JiraSdk\Model\BulkCustomFieldOptionUpdateRequest $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateCustomFieldOptionBadRequestException
    * @throws \JiraSdk\Exception\UpdateCustomFieldOptionUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateCustomFieldOptionForbiddenException
    * @throws \JiraSdk\Exception\UpdateCustomFieldOptionNotFoundException
    *
    * @return null|\JiraSdk\Model\CustomFieldUpdatedContextOptionsList|\Psr\Http\Message\ResponseInterface
    */
    public function updateCustomFieldOption(string $fieldId, int $contextId, \JiraSdk\Model\BulkCustomFieldOptionUpdateRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateCustomFieldOption($fieldId, $contextId, $requestBody), $fetch);
    }
    /**
    * Changes the order of custom field options or cascading options in a context.
    
    This operation works for custom field options created in Jira or the operations from this resource. **To work with issue field select list options created for Connect apps use the [Issue custom field options (apps)](#api-group-issue-custom-field-options--apps-) operations.**
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param int $contextId The ID of the context.
    * @param \JiraSdk\Model\OrderOfCustomFieldOptions $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\ReorderCustomFieldOptionsBadRequestException
    * @throws \JiraSdk\Exception\ReorderCustomFieldOptionsUnauthorizedException
    * @throws \JiraSdk\Exception\ReorderCustomFieldOptionsForbiddenException
    * @throws \JiraSdk\Exception\ReorderCustomFieldOptionsNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function reorderCustomFieldOptions(string $fieldId, int $contextId, \JiraSdk\Model\OrderOfCustomFieldOptions $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\ReorderCustomFieldOptions($fieldId, $contextId, $requestBody), $fetch);
    }
    /**
    * Deletes a custom field option.
    
    Options with cascading options cannot be deleted without deleting the cascading options first.
    
    This operation works for custom field options created in Jira or the operations from this resource. **To work with issue field select list options created for Connect apps use the [Issue custom field options (apps)](#api-group-issue-custom-field-options--apps-) operations.**
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param int $contextId The ID of the context from which an option should be deleted.
    * @param int $optionId The ID of the option to delete.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteCustomFieldOptionBadRequestException
    * @throws \JiraSdk\Exception\DeleteCustomFieldOptionUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteCustomFieldOptionForbiddenException
    * @throws \JiraSdk\Exception\DeleteCustomFieldOptionNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteCustomFieldOption(string $fieldId, int $contextId, int $optionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteCustomFieldOption($fieldId, $contextId, $optionId), $fetch);
    }
    /**
    * Assigns a custom field context to projects.
    
    If any project in the request is assigned to any context of the custom field, the operation fails.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param int $contextId The ID of the context.
    * @param \JiraSdk\Model\ProjectIds $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AssignProjectsToCustomFieldContextBadRequestException
    * @throws \JiraSdk\Exception\AssignProjectsToCustomFieldContextUnauthorizedException
    * @throws \JiraSdk\Exception\AssignProjectsToCustomFieldContextForbiddenException
    * @throws \JiraSdk\Exception\AssignProjectsToCustomFieldContextNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function assignProjectsToCustomFieldContext(string $fieldId, int $contextId, \JiraSdk\Model\ProjectIds $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AssignProjectsToCustomFieldContext($fieldId, $contextId, $requestBody), $fetch);
    }
    /**
    * Removes a custom field context from projects.
    
    A custom field context without any projects applies to all projects. Removing all projects from a custom field context would result in it applying to all projects.
    
    If any project in the request is not assigned to the context, or the operation would result in two global contexts for the field, the operation fails.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param int $contextId The ID of the context.
    * @param \JiraSdk\Model\ProjectIds $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\RemoveCustomFieldContextFromProjectsBadRequestException
    * @throws \JiraSdk\Exception\RemoveCustomFieldContextFromProjectsUnauthorizedException
    * @throws \JiraSdk\Exception\RemoveCustomFieldContextFromProjectsForbiddenException
    * @throws \JiraSdk\Exception\RemoveCustomFieldContextFromProjectsNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function removeCustomFieldContextFromProjects(string $fieldId, int $contextId, \JiraSdk\Model\ProjectIds $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveCustomFieldContextFromProjects($fieldId, $contextId, $requestBody), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) list of the contexts a field is used in. Deprecated, use [ Get custom field contexts](#api-rest-api-3-field-fieldId-context-get).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId The ID of the field to return contexts for.
     * @param array $queryParameters {
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetContextsForFieldDeprecatedUnauthorizedException
     * @throws \JiraSdk\Exception\GetContextsForFieldDeprecatedForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanContext|\Psr\Http\Message\ResponseInterface
     */
    public function getContextsForFieldDeprecated(string $fieldId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetContextsForFieldDeprecated($fieldId, $queryParameters), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) list of the screens a field is used in.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId The ID of the field to return screens for.
     * @param array $queryParameters {
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     *     @var string $expand Use [expand](#expansion) to include additional information about screens in the response. This parameter accepts `tab` which returns details about the screen tabs the field is used in.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetScreensForFieldUnauthorizedException
     * @throws \JiraSdk\Exception\GetScreensForFieldForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanScreenWithTab|\Psr\Http\Message\ResponseInterface
     */
    public function getScreensForField(string $fieldId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetScreensForField($fieldId, $queryParameters), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of all the options of a select list issue field. A select list issue field is a type of [issue field](https://developer.atlassian.com/cloud/jira/platform/modules/issue-field/) that enables a user to select a value from a list of options.
    
    Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
    *
    * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
    
    *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
    *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAllIssueFieldOptionsBadRequestException
    * @throws \JiraSdk\Exception\GetAllIssueFieldOptionsForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanIssueFieldOption|\Psr\Http\Message\ResponseInterface
    */
    public function getAllIssueFieldOptions(string $fieldKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllIssueFieldOptions($fieldKey, $queryParameters), $fetch);
    }
    /**
    * Creates an option for a select list issue field.
    
    Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
    *
    * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
    
    *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
    *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
    * @param \JiraSdk\Model\IssueFieldOptionCreateBean $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateIssueFieldOptionBadRequestException
    * @throws \JiraSdk\Exception\CreateIssueFieldOptionForbiddenException
    * @throws \JiraSdk\Exception\CreateIssueFieldOptionNotFoundException
    *
    * @return null|\JiraSdk\Model\IssueFieldOption|\Psr\Http\Message\ResponseInterface
    */
    public function createIssueFieldOption(string $fieldKey, \JiraSdk\Model\IssueFieldOptionCreateBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateIssueFieldOption($fieldKey, $requestBody), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of options for a select list issue field that can be viewed and selected by the user.
    
    Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
    
    **[Permissions](#permissions) required:** Permission to access Jira.
    *
    * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
    
    *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
    *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var int $projectId Filters the results to options that are only available in the specified project.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetSelectableIssueFieldOptionsUnauthorizedException
    * @throws \JiraSdk\Exception\GetSelectableIssueFieldOptionsNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanIssueFieldOption|\Psr\Http\Message\ResponseInterface
    */
    public function getSelectableIssueFieldOptions(string $fieldKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetSelectableIssueFieldOptions($fieldKey, $queryParameters), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of options for a select list issue field that can be viewed by the user.
    
    Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
    
    **[Permissions](#permissions) required:** Permission to access Jira.
    *
    * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
    
    *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
    *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var int $projectId Filters the results to options that are only available in the specified project.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetVisibleIssueFieldOptionsUnauthorizedException
    * @throws \JiraSdk\Exception\GetVisibleIssueFieldOptionsNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanIssueFieldOption|\Psr\Http\Message\ResponseInterface
    */
    public function getVisibleIssueFieldOptions(string $fieldKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetVisibleIssueFieldOptions($fieldKey, $queryParameters), $fetch);
    }
    /**
    * Deletes an option from a select list issue field.
    
    Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
    *
    * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
    
    *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
    *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
    * @param int $optionId The ID of the option to be deleted.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteIssueFieldOptionForbiddenException
    * @throws \JiraSdk\Exception\DeleteIssueFieldOptionNotFoundException
    * @throws \JiraSdk\Exception\DeleteIssueFieldOptionConflictException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteIssueFieldOption(string $fieldKey, int $optionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteIssueFieldOption($fieldKey, $optionId), $fetch);
    }
    /**
    * Returns an option from a select list issue field.
    
    Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
    *
    * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
    
    *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
    *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
    * @param int $optionId The ID of the option to be returned.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueFieldOptionBadRequestException
    * @throws \JiraSdk\Exception\GetIssueFieldOptionForbiddenException
    * @throws \JiraSdk\Exception\GetIssueFieldOptionNotFoundException
    *
    * @return null|\JiraSdk\Model\IssueFieldOption|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueFieldOption(string $fieldKey, int $optionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueFieldOption($fieldKey, $optionId), $fetch);
    }
    /**
    * Updates or creates an option for a select list issue field. This operation requires that the option ID is provided when creating an option, therefore, the option ID needs to be specified as a path and body parameter. The option ID provided in the path and body must be identical.
    
    Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
    *
    * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
    
    *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
    *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
    * @param int $optionId The ID of the option to be updated.
    * @param \JiraSdk\Model\IssueFieldOption $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateIssueFieldOptionBadRequestException
    * @throws \JiraSdk\Exception\UpdateIssueFieldOptionForbiddenException
    * @throws \JiraSdk\Exception\UpdateIssueFieldOptionNotFoundException
    *
    * @return null|\JiraSdk\Model\IssueFieldOption|\Psr\Http\Message\ResponseInterface
    */
    public function updateIssueFieldOption(string $fieldKey, int $optionId, \JiraSdk\Model\IssueFieldOption $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateIssueFieldOption($fieldKey, $optionId, $requestBody), $fetch);
    }
    /**
    * Deselects an issue-field select-list option from all issues where it is selected. A different option can be selected to replace the deselected option. The update can also be limited to a smaller set of issues by using a JQL query.
    
    Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) can override the screen security configuration using `overrideScreenSecurity` and `overrideEditableFlag`.
    
    This is an [asynchronous operation](#async). The response object contains a link to the long-running task.
    
    Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
    *
    * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
    
    *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
    *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
    * @param int $optionId The ID of the option to be deselected.
    * @param array $queryParameters {
    *     @var int $replaceWith The ID of the option that will replace the currently selected option.
    *     @var string $jql A JQL query that specifies the issues to be updated. For example, *project=10000*.
    *     @var bool $overrideScreenSecurity Whether screen security is overridden to enable hidden fields to be edited. Available to Connect and Forge app users with admin permission.
    *     @var bool $overrideEditableFlag Whether screen security is overridden to enable uneditable fields to be edited. Available to Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\ReplaceIssueFieldOptionBadRequestException
    * @throws \JiraSdk\Exception\ReplaceIssueFieldOptionForbiddenException
    * @throws \JiraSdk\Exception\ReplaceIssueFieldOptionNotFoundException
    *
    * @return null|\JiraSdk\Model\TaskProgressBeanRemoveOptionFromIssuesResult|\Psr\Http\Message\ResponseInterface
    */
    public function replaceIssueFieldOption(string $fieldKey, int $optionId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\ReplaceIssueFieldOption($fieldKey, $optionId, $queryParameters), $fetch);
    }
    /**
    * Deletes a custom field. The custom field is deleted whether it is in the trash or not. See [Edit or delete a custom field](https://confluence.atlassian.com/x/Z44fOw) for more information on trashing and deleting custom fields.
    
    This operation is [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $id The ID of a custom field.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteCustomFieldBadRequestException
    * @throws \JiraSdk\Exception\DeleteCustomFieldUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteCustomFieldForbiddenException
    * @throws \JiraSdk\Exception\DeleteCustomFieldNotFoundException
    * @throws \JiraSdk\Exception\DeleteCustomFieldConflictException
    *
    * @return null|\JiraSdk\Model\TaskProgressBeanObject|\Psr\Http\Message\ResponseInterface
    */
    public function deleteCustomField(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteCustomField($id), $fetch);
    }
    /**
     * Restores a custom field from trash. See [Edit or delete a custom field](https://confluence.atlassian.com/x/Z44fOw) for more information on trashing and deleting custom fields.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id The ID of a custom field.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\RestoreCustomFieldBadRequestException
     * @throws \JiraSdk\Exception\RestoreCustomFieldUnauthorizedException
     * @throws \JiraSdk\Exception\RestoreCustomFieldForbiddenException
     * @throws \JiraSdk\Exception\RestoreCustomFieldNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function restoreCustomField(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RestoreCustomField($id), $fetch);
    }
    /**
     * Moves a custom field to trash. See [Edit or delete a custom field](https://confluence.atlassian.com/x/Z44fOw) for more information on trashing and deleting custom fields.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id The ID of a custom field.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\TrashCustomFieldBadRequestException
     * @throws \JiraSdk\Exception\TrashCustomFieldUnauthorizedException
     * @throws \JiraSdk\Exception\TrashCustomFieldForbiddenException
     * @throws \JiraSdk\Exception\TrashCustomFieldNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function trashCustomField(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\TrashCustomField($id), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of field configurations. The list can be for all field configurations or a subset determined by any combination of these criteria:
    
    *  a list of field configuration item IDs.
    *  whether the field configuration is a default.
    *  whether the field configuration name or description contains a query string.
    
    Only field configurations used in company-managed (classic) projects are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $id The list of field configuration IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
    *     @var bool $isDefault If *true* returns default field configurations only.
    *     @var string $query The query string used to match against field configuration names and descriptions.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAllFieldConfigurationsUnauthorizedException
    * @throws \JiraSdk\Exception\GetAllFieldConfigurationsForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanFieldConfigurationDetails|\Psr\Http\Message\ResponseInterface
    */
    public function getAllFieldConfigurations(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllFieldConfigurations($queryParameters), $fetch);
    }
    /**
    * Creates a field configuration. The field configuration is created with the same field properties as the default configuration, with all the fields being optional.
    
    This operation can only create configurations for use in company-managed (classic) projects.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\FieldConfigurationDetails $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateFieldConfigurationBadRequestException
    * @throws \JiraSdk\Exception\CreateFieldConfigurationUnauthorizedException
    * @throws \JiraSdk\Exception\CreateFieldConfigurationForbiddenException
    *
    * @return null|\JiraSdk\Model\FieldConfiguration|\Psr\Http\Message\ResponseInterface
    */
    public function createFieldConfiguration(\JiraSdk\Model\FieldConfigurationDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateFieldConfiguration($requestBody), $fetch);
    }
    /**
    * Deletes a field configuration.
    
    This operation can only delete configurations used in company-managed (classic) projects.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the field configuration.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteFieldConfigurationBadRequestException
    * @throws \JiraSdk\Exception\DeleteFieldConfigurationUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteFieldConfigurationForbiddenException
    * @throws \JiraSdk\Exception\DeleteFieldConfigurationNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteFieldConfiguration(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteFieldConfiguration($id), $fetch);
    }
    /**
    * Updates a field configuration. The name and the description provided in the request override the existing values.
    
    This operation can only update configurations used in company-managed (classic) projects.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the field configuration.
    * @param \JiraSdk\Model\FieldConfigurationDetails $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateFieldConfigurationBadRequestException
    * @throws \JiraSdk\Exception\UpdateFieldConfigurationUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateFieldConfigurationForbiddenException
    * @throws \JiraSdk\Exception\UpdateFieldConfigurationNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function updateFieldConfiguration(int $id, \JiraSdk\Model\FieldConfigurationDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateFieldConfiguration($id, $requestBody), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of all fields for a configuration.
    
    Only the fields from configurations used in company-managed (classic) projects are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the field configuration.
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetFieldConfigurationItemsUnauthorizedException
    * @throws \JiraSdk\Exception\GetFieldConfigurationItemsForbiddenException
    * @throws \JiraSdk\Exception\GetFieldConfigurationItemsNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanFieldConfigurationItem|\Psr\Http\Message\ResponseInterface
    */
    public function getFieldConfigurationItems(int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetFieldConfigurationItems($id, $queryParameters), $fetch);
    }
    /**
    * Updates fields in a field configuration. The properties of the field configuration fields provided override the existing values.
    
    This operation can only update field configurations used in company-managed (classic) projects.
    
    The operation can set the renderer for text fields to the default text renderer (`text-renderer`) or wiki style renderer (`wiki-renderer`). However, the renderer cannot be updated for fields using the autocomplete renderer (`autocomplete-renderer`).
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the field configuration.
    * @param \JiraSdk\Model\FieldConfigurationItemsDetails $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateFieldConfigurationItemsBadRequestException
    * @throws \JiraSdk\Exception\UpdateFieldConfigurationItemsUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateFieldConfigurationItemsForbiddenException
    * @throws \JiraSdk\Exception\UpdateFieldConfigurationItemsNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function updateFieldConfigurationItems(int $id, \JiraSdk\Model\FieldConfigurationItemsDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateFieldConfigurationItems($id, $requestBody), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of field configuration schemes.
    
    Only field configuration schemes used in classic projects are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $id The list of field configuration scheme IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAllFieldConfigurationSchemesBadRequestException
    * @throws \JiraSdk\Exception\GetAllFieldConfigurationSchemesUnauthorizedException
    * @throws \JiraSdk\Exception\GetAllFieldConfigurationSchemesForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanFieldConfigurationScheme|\Psr\Http\Message\ResponseInterface
    */
    public function getAllFieldConfigurationSchemes(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllFieldConfigurationSchemes($queryParameters), $fetch);
    }
    /**
    * Creates a field configuration scheme.
    
    This operation can only create field configuration schemes used in company-managed (classic) projects.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\UpdateFieldConfigurationSchemeDetails $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateFieldConfigurationSchemeBadRequestException
    * @throws \JiraSdk\Exception\CreateFieldConfigurationSchemeUnauthorizedException
    * @throws \JiraSdk\Exception\CreateFieldConfigurationSchemeForbiddenException
    *
    * @return null|\JiraSdk\Model\FieldConfigurationScheme|\Psr\Http\Message\ResponseInterface
    */
    public function createFieldConfigurationScheme(\JiraSdk\Model\UpdateFieldConfigurationSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateFieldConfigurationScheme($requestBody), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of field configuration issue type items.
    
    Only items used in classic projects are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $fieldConfigurationSchemeId The list of field configuration scheme IDs. To include multiple field configuration schemes separate IDs with ampersand: `fieldConfigurationSchemeId=10000&fieldConfigurationSchemeId=10001`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetFieldConfigurationSchemeMappingsBadRequestException
    * @throws \JiraSdk\Exception\GetFieldConfigurationSchemeMappingsUnauthorizedException
    * @throws \JiraSdk\Exception\GetFieldConfigurationSchemeMappingsForbiddenException
    * @throws \JiraSdk\Exception\GetFieldConfigurationSchemeMappingsNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanFieldConfigurationIssueTypeItem|\Psr\Http\Message\ResponseInterface
    */
    public function getFieldConfigurationSchemeMappings(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetFieldConfigurationSchemeMappings($queryParameters), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of field configuration schemes and, for each scheme, a list of the projects that use it.
    
    The list is sorted by field configuration scheme ID. The first item contains the list of project IDs assigned to the default field configuration scheme.
    
    Only field configuration schemes used in classic projects are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $projectId The list of project IDs. To include multiple projects, separate IDs with ampersand: `projectId=10000&projectId=10001`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetFieldConfigurationSchemeProjectMappingBadRequestException
    * @throws \JiraSdk\Exception\GetFieldConfigurationSchemeProjectMappingUnauthorizedException
    * @throws \JiraSdk\Exception\GetFieldConfigurationSchemeProjectMappingForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanFieldConfigurationSchemeProjects|\Psr\Http\Message\ResponseInterface
    */
    public function getFieldConfigurationSchemeProjectMapping(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetFieldConfigurationSchemeProjectMapping($queryParameters), $fetch);
    }
    /**
    * Assigns a field configuration scheme to a project. If the field configuration scheme ID is `null`, the operation assigns the default field configuration scheme.
    
    Field configuration schemes can only be assigned to classic projects.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\FieldConfigurationSchemeProjectAssociation $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AssignFieldConfigurationSchemeToProjectBadRequestException
    * @throws \JiraSdk\Exception\AssignFieldConfigurationSchemeToProjectUnauthorizedException
    * @throws \JiraSdk\Exception\AssignFieldConfigurationSchemeToProjectForbiddenException
    * @throws \JiraSdk\Exception\AssignFieldConfigurationSchemeToProjectNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function assignFieldConfigurationSchemeToProject(\JiraSdk\Model\FieldConfigurationSchemeProjectAssociation $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AssignFieldConfigurationSchemeToProject($requestBody), $fetch);
    }
    /**
    * Deletes a field configuration scheme.
    
    This operation can only delete field configuration schemes used in company-managed (classic) projects.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the field configuration scheme.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteFieldConfigurationSchemeBadRequestException
    * @throws \JiraSdk\Exception\DeleteFieldConfigurationSchemeUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteFieldConfigurationSchemeForbiddenException
    * @throws \JiraSdk\Exception\DeleteFieldConfigurationSchemeNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteFieldConfigurationScheme(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteFieldConfigurationScheme($id), $fetch);
    }
    /**
    * Updates a field configuration scheme.
    
    This operation can only update field configuration schemes used in company-managed (classic) projects.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the field configuration scheme.
    * @param \JiraSdk\Model\UpdateFieldConfigurationSchemeDetails $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateFieldConfigurationSchemeBadRequestException
    * @throws \JiraSdk\Exception\UpdateFieldConfigurationSchemeUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateFieldConfigurationSchemeForbiddenException
    * @throws \JiraSdk\Exception\UpdateFieldConfigurationSchemeNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function updateFieldConfigurationScheme(int $id, \JiraSdk\Model\UpdateFieldConfigurationSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateFieldConfigurationScheme($id, $requestBody), $fetch);
    }
    /**
    * Assigns issue types to field configurations on field configuration scheme.
    
    This operation can only modify field configuration schemes used in company-managed (classic) projects.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the field configuration scheme.
    * @param \JiraSdk\Model\AssociateFieldConfigurationsWithIssueTypesRequest $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetFieldConfigurationSchemeMappingBadRequestException
    * @throws \JiraSdk\Exception\SetFieldConfigurationSchemeMappingUnauthorizedException
    * @throws \JiraSdk\Exception\SetFieldConfigurationSchemeMappingForbiddenException
    * @throws \JiraSdk\Exception\SetFieldConfigurationSchemeMappingNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function setFieldConfigurationSchemeMapping(int $id, \JiraSdk\Model\AssociateFieldConfigurationsWithIssueTypesRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetFieldConfigurationSchemeMapping($id, $requestBody), $fetch);
    }
    /**
    * Removes issue types from the field configuration scheme.
    
    This operation can only modify field configuration schemes used in company-managed (classic) projects.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the field configuration scheme.
    * @param \JiraSdk\Model\IssueTypeIdsToRemove $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeBadRequestException
    * @throws \JiraSdk\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeUnauthorizedException
    * @throws \JiraSdk\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeForbiddenException
    * @throws \JiraSdk\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function removeIssueTypesFromGlobalFieldConfigurationScheme(int $id, \JiraSdk\Model\IssueTypeIdsToRemove $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveIssueTypesFromGlobalFieldConfigurationScheme($id, $requestBody), $fetch);
    }
    /**
    * Returns all filters. Deprecated, use [ Search for filters](#api-rest-api-3-filter-search-get) that supports search and pagination.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None, however, only the following filters are returned:
    
    *  filters owned by the user.
    *  filters shared with a group that the user is a member of.
    *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
    *  filters shared with a public project.
    *  filters shared with the public.
    *
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
    *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    *
    * @return null|\JiraSdk\Model\Filter[]|\Psr\Http\Message\ResponseInterface
    */
    public function getFilters(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetFilters($queryParameters), $fetch);
    }
    /**
     * Creates a filter. The filter is shared according to the [default share scope](#api-rest-api-3-filter-post). The filter is not selected as a favorite.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param \JiraSdk\Model\Filter $requestBody 
     * @param array $queryParameters {
     *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
     *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     *     @var bool $overrideSharePermissions EXPERIMENTAL: Whether share permissions are overridden to enable filters with any share permissions to be created. Available to users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateFilterBadRequestException
     * @throws \JiraSdk\Exception\CreateFilterUnauthorizedException
     *
     * @return null|\JiraSdk\Model\Filter|\Psr\Http\Message\ResponseInterface
     */
    public function createFilter(\JiraSdk\Model\Filter $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateFilter($requestBody, $queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetDefaultShareScopeUnauthorizedException
     *
     * @return null|\JiraSdk\Model\DefaultShareScope|\Psr\Http\Message\ResponseInterface
     */
    public function getDefaultShareScope(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetDefaultShareScope(), $fetch);
    }
    /**
     * Sets the default sharing for new filters and dashboards for a user.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param \JiraSdk\Model\DefaultShareScope $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\SetDefaultShareScopeBadRequestException
     * @throws \JiraSdk\Exception\SetDefaultShareScopeUnauthorizedException
     *
     * @return null|\JiraSdk\Model\DefaultShareScope|\Psr\Http\Message\ResponseInterface
     */
    public function setDefaultShareScope(\JiraSdk\Model\DefaultShareScope $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetDefaultShareScope($requestBody), $fetch);
    }
    /**
    * Returns the visible favorite filters of the user.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** A favorite filter is only visible to the user where the filter is:
    
    *  owned by the user.
    *  shared with a group that the user is a member of.
    *  shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
    *  shared with a public project.
    *  shared with the public.
    
    For example, if the user favorites a public filter that is subsequently made private that filter is not returned by this operation.
    *
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
    *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetFavouriteFiltersUnauthorizedException
    *
    * @return null|\JiraSdk\Model\Filter[]|\Psr\Http\Message\ResponseInterface
    */
    public function getFavouriteFilters(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetFavouriteFilters($queryParameters), $fetch);
    }
    /**
    * Returns the filters owned by the user. If `includeFavourites` is `true`, the user's visible favorite filters are also returned.
    
    **[Permissions](#permissions) required:** Permission to access Jira, however, a favorite filters is only visible to the user where the filter is:
    
    *  owned by the user.
    *  shared with a group that the user is a member of.
    *  shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
    *  shared with a public project.
    *  shared with the public.
    
    For example, if the user favorites a public filter that is subsequently made private that filter is not returned by this operation.
    *
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
    *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
    *     @var bool $includeFavourites Include the user's favorite filters in the response.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetMyFiltersUnauthorizedException
    *
    * @return null|\JiraSdk\Model\Filter[]|\Psr\Http\Message\ResponseInterface
    */
    public function getMyFilters(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetMyFilters($queryParameters), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of filters. Use this operation to get:
    
    *  specific filters, by defining `id` only.
    *  filters that match all of the specified attributes. For example, all filters for a user with a particular word in their name. When multiple attributes are specified only filters matching all attributes are returned.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None, however, only the following filters that match the query parameters are returned:
    
    *  filters owned by the user.
    *  filters shared with a group that the user is a member of.
    *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
    *  filters shared with a public project.
    *  filters shared with the public.
    *
    * @param array $queryParameters {
    *     @var string $filterName String used to perform a case-insensitive partial match with `name`.
    *     @var string $accountId User account ID used to return filters with the matching `owner.accountId`. This parameter cannot be used with `owner`.
    *     @var string $owner This parameter is deprecated because of privacy changes. Use `accountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. User name used to return filters with the matching `owner.name`. This parameter cannot be used with `accountId`.
    *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group. Group name used to returns filters that are shared with a group that matches `sharePermissions.group.groupname`. This parameter cannot be used with the `groupId` parameter.
    *     @var string $groupId Group ID used to returns filters that are shared with a group that matches `sharePermissions.group.groupId`. This parameter cannot be used with the `groupname` parameter.
    *     @var int $projectId Project ID used to returns filters that are shared with a project that matches `sharePermissions.project.id`.
    *     @var array $id The list of filter IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`. Do not exceed 200 filter IDs.
    *     @var string $orderBy [Order](#ordering) the results by a field:
    
    *  `description` Sorts by filter description. Note that this sorting works independently of whether the expand to display the description field is in use.
    *  `favourite_count` Sorts by the count of how many users have this filter as a favorite.
    *  `is_favourite` Sorts by whether the filter is marked as a favorite.
    *  `id` Sorts by filter ID.
    *  `name` Sorts by filter name.
    *  `owner` Sorts by the ID of the filter owner.
    *  `is_shared` Sorts by whether the filter is shared.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `description` Returns the description of the filter.
    *  `favourite` Returns an indicator of whether the user has set the filter as a favorite.
    *  `favouritedCount` Returns a count of how many users have set this filter as a favorite.
    *  `jql` Returns the JQL query that the filter uses.
    *  `owner` Returns the owner of the filter.
    *  `searchUrl` Returns a URL to perform the filter's JQL query.
    *  `sharePermissions` Returns the share permissions defined for the filter.
    *  `editPermissions` Returns the edit permissions defined for the filter.
    *  `isWritable` Returns whether the current user has permission to edit the filter.
    *  `subscriptions` Returns the users that are subscribed to the filter.
    *  `viewUrl` Returns a URL to view the filter.
    *     @var bool $overrideSharePermissions EXPERIMENTAL: Whether share permissions are overridden to enable filters with any share permissions to be returned. Available to users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetFiltersPaginatedBadRequestException
    * @throws \JiraSdk\Exception\GetFiltersPaginatedUnauthorizedException
    *
    * @return null|\JiraSdk\Model\PageBeanFilterDetails|\Psr\Http\Message\ResponseInterface
    */
    public function getFiltersPaginated(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetFiltersPaginated($queryParameters), $fetch);
    }
    /**
     * Delete a filter.
     **[Permissions](#permissions) required:** Permission to access Jira, however filters can only be deleted by the creator of the filter or a user with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the filter to delete.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteFilterBadRequestException
     * @throws \JiraSdk\Exception\DeleteFilterUnauthorizedException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteFilter(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteFilter($id), $fetch);
    }
    /**
    * Returns a filter.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None, however, the filter is only returned where it is:
    
    *  owned by the user.
    *  shared with a group that the user is a member of.
    *  shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
    *  shared with a public project.
    *  shared with the public.
    *
    * @param int $id The ID of the filter to return.
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
    *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
    *     @var bool $overrideSharePermissions EXPERIMENTAL: Whether share permissions are overridden to enable filters with any share permissions to be returned. Available to users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetFilterBadRequestException
    * @throws \JiraSdk\Exception\GetFilterUnauthorizedException
    *
    * @return null|\JiraSdk\Model\Filter|\Psr\Http\Message\ResponseInterface
    */
    public function getFilter(int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetFilter($id, $queryParameters), $fetch);
    }
    /**
     * Updates a filter. Use this operation to update a filter's name, description, JQL, or sharing.
     **[Permissions](#permissions) required:** Permission to access Jira, however the user must own the filter.
     *
     * @param int $id The ID of the filter to update.
     * @param \JiraSdk\Model\Filter $requestBody 
     * @param array $queryParameters {
     *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
     *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     *     @var bool $overrideSharePermissions EXPERIMENTAL: Whether share permissions are overridden to enable the addition of any share permissions to filters. Available to users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateFilterBadRequestException
     * @throws \JiraSdk\Exception\UpdateFilterUnauthorizedException
     *
     * @return null|\JiraSdk\Model\Filter|\Psr\Http\Message\ResponseInterface
     */
    public function updateFilter(int $id, \JiraSdk\Model\Filter $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateFilter($id, $requestBody, $queryParameters), $fetch);
    }
    /**
     * Reset the user's column configuration for the filter to the default.
     **[Permissions](#permissions) required:** Permission to access Jira, however, columns are only reset for:
     *  filters owned by the user.
     *  filters shared with a group that the user is a member of.
     *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
     *  filters shared with a public project.
     *  filters shared with the public.
     *
     * @param int $id The ID of the filter.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\ResetColumnsBadRequestException
     * @throws \JiraSdk\Exception\ResetColumnsUnauthorizedException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function resetColumns(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\ResetColumns($id), $fetch);
    }
    /**
    * Returns the columns configured for a filter. The column configuration is used when the filter's results are viewed in *List View* with the *Columns* set to *Filter*.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None, however, column details are only returned for:
    
    *  filters owned by the user.
    *  filters shared with a group that the user is a member of.
    *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
    *  filters shared with a public project.
    *  filters shared with the public.
    *
    * @param int $id The ID of the filter.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetColumnsBadRequestException
    * @throws \JiraSdk\Exception\GetColumnsUnauthorizedException
    * @throws \JiraSdk\Exception\GetColumnsNotFoundException
    *
    * @return null|\JiraSdk\Model\ColumnItem[]|\Psr\Http\Message\ResponseInterface
    */
    public function getColumns(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetColumns($id), $fetch);
    }
    /**
    * Sets the columns for a filter. Only navigable fields can be set as columns. Use [Get fields](#api-rest-api-3-field-get) to get the list fields in Jira. A navigable field has `navigable` set to `true`.
    
    The parameters for this resource are expressed as HTML form data. For example, in curl:
    
    `curl -X PUT -d columns=summary -d columns=description https://your-domain.atlassian.net/rest/api/3/filter/10000/columns`
    
    **[Permissions](#permissions) required:** Permission to access Jira, however, columns are only set for:
    
    *  filters owned by the user.
    *  filters shared with a group that the user is a member of.
    *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
    *  filters shared with a public project.
    *  filters shared with the public.
    *
    * @param int $id The ID of the filter.
    * @param null|array[] $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetColumnsBadRequestException
    * @throws \JiraSdk\Exception\SetColumnsForbiddenException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function setColumns(int $id, ?array $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetColumns($id, $requestBody), $fetch);
    }
    /**
     * Removes a filter as a favorite for the user. Note that this operation only removes filters visible to the user from the user's favorites list. For example, if the user favorites a public filter that is subsequently made private (and is therefore no longer visible on their favorites list) they cannot remove it from their favorites list.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param int $id The ID of the filter.
     * @param array $queryParameters {
     *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
     *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteFavouriteForFilterBadRequestException
     *
     * @return null|\JiraSdk\Model\Filter|\Psr\Http\Message\ResponseInterface
     */
    public function deleteFavouriteForFilter(int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteFavouriteForFilter($id, $queryParameters), $fetch);
    }
    /**
     * Add a filter as a favorite for the user.
     **[Permissions](#permissions) required:** Permission to access Jira, however, the user can only favorite:
     *  filters owned by the user.
     *  filters shared with a group that the user is a member of.
     *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
     *  filters shared with a public project.
     *  filters shared with the public.
     *
     * @param int $id The ID of the filter.
     * @param array $queryParameters {
     *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
     *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\SetFavouriteForFilterBadRequestException
     *
     * @return null|\JiraSdk\Model\Filter|\Psr\Http\Message\ResponseInterface
     */
    public function setFavouriteForFilter(int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetFavouriteForFilter($id, $queryParameters), $fetch);
    }
    /**
     * Changes the owner of the filter.
     **[Permissions](#permissions) required:** Permission to access Jira. However, the user must own the filter or have the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the filter to update.
     * @param \JiraSdk\Model\ChangeFilterOwner $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\ChangeFilterOwnerBadRequestException
     * @throws \JiraSdk\Exception\ChangeFilterOwnerForbiddenException
     * @throws \JiraSdk\Exception\ChangeFilterOwnerNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function changeFilterOwner(int $id, \JiraSdk\Model\ChangeFilterOwner $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\ChangeFilterOwner($id, $requestBody), $fetch);
    }
    /**
    * Returns the share permissions for a filter. A filter can be shared with groups, projects, all logged-in users, or the public. Sharing with all logged-in users or the public is known as a global share permission.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None, however, share permissions are only returned for:
    
    *  filters owned by the user.
    *  filters shared with a group that the user is a member of.
    *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
    *  filters shared with a public project.
    *  filters shared with the public.
    *
    * @param int $id The ID of the filter.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetSharePermissionsUnauthorizedException
    * @throws \JiraSdk\Exception\GetSharePermissionsNotFoundException
    *
    * @return null|\JiraSdk\Model\SharePermission[]|\Psr\Http\Message\ResponseInterface
    */
    public function getSharePermissions(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetSharePermissions($id), $fetch);
    }
    /**
    * Add a share permissions to a filter. If you add a global share permission (one for all logged-in users or the public) it will overwrite all share permissions for the filter.
    
    Be aware that this operation uses different objects for updating share permissions compared to [Update filter](#api-rest-api-3-filter-id-put).
    
    **[Permissions](#permissions) required:** *Share dashboards and filters* [global permission](https://confluence.atlassian.com/x/x4dKLg) and the user must own the filter.
    *
    * @param int $id The ID of the filter.
    * @param \JiraSdk\Model\SharePermissionInputBean $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AddSharePermissionBadRequestException
    * @throws \JiraSdk\Exception\AddSharePermissionUnauthorizedException
    * @throws \JiraSdk\Exception\AddSharePermissionNotFoundException
    *
    * @return null|\JiraSdk\Model\SharePermission[]|\Psr\Http\Message\ResponseInterface
    */
    public function addSharePermission(int $id, \JiraSdk\Model\SharePermissionInputBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddSharePermission($id, $requestBody), $fetch);
    }
    /**
     * Deletes a share permission from a filter.
     **[Permissions](#permissions) required:** Permission to access Jira and the user must own the filter.
     *
     * @param int $id The ID of the filter.
     * @param int $permissionId The ID of the share permission.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteSharePermissionUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteSharePermissionNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteSharePermission(int $id, int $permissionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteSharePermission($id, $permissionId), $fetch);
    }
    /**
    * Returns a share permission for a filter. A filter can be shared with groups, projects, all logged-in users, or the public. Sharing with all logged-in users or the public is known as a global share permission.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None, however, a share permission is only returned for:
    
    *  filters owned by the user.
    *  filters shared with a group that the user is a member of.
    *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
    *  filters shared with a public project.
    *  filters shared with the public.
    *
    * @param int $id The ID of the filter.
    * @param int $permissionId The ID of the share permission.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetSharePermissionUnauthorizedException
    * @throws \JiraSdk\Exception\GetSharePermissionNotFoundException
    *
    * @return null|\JiraSdk\Model\SharePermission|\Psr\Http\Message\ResponseInterface
    */
    public function getSharePermission(int $id, int $permissionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetSharePermission($id, $permissionId), $fetch);
    }
    /**
    * Deletes a group.
    
    **[Permissions](#permissions) required:** Site administration (that is, member of the *site-admin* strategic [group](https://confluence.atlassian.com/x/24xjL)).
    *
    * @param array $queryParameters {
    *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.  
    The name of the group. This parameter cannot be used with the `groupId` parameter.
    *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
    *     @var string $swapGroup As a group's name can change, use of `swapGroupId` is recommended to identify a group.  
    The group to transfer restrictions to. Only comments and worklogs are transferred. If restrictions are not transferred, comments and worklogs are inaccessible after the deletion. This parameter cannot be used with the `swapGroupId` parameter.
    *     @var string $swapGroupId The ID of the group to transfer restrictions to. Only comments and worklogs are transferred. If restrictions are not transferred, comments and worklogs are inaccessible after the deletion. This parameter cannot be used with the `swapGroup` parameter.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\RemoveGroupBadRequestException
    * @throws \JiraSdk\Exception\RemoveGroupUnauthorizedException
    * @throws \JiraSdk\Exception\RemoveGroupForbiddenException
    * @throws \JiraSdk\Exception\RemoveGroupNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function removeGroup(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveGroup($queryParameters), $fetch);
    }
    /**
    * This operation is deprecated, use [`group/member`](#api-rest-api-3-group-member-get).
    
    Returns all users in a group.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.  
    The name of the group. This parameter cannot be used with the `groupId` parameter.
    *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
    *     @var string $expand List of fields to expand.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetGroupBadRequestException
    * @throws \JiraSdk\Exception\GetGroupUnauthorizedException
    * @throws \JiraSdk\Exception\GetGroupForbiddenException
    * @throws \JiraSdk\Exception\GetGroupNotFoundException
    *
    * @return null|\JiraSdk\Model\Group|\Psr\Http\Message\ResponseInterface
    */
    public function getGroup(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetGroup($queryParameters), $fetch);
    }
    /**
     * Creates a group.
     **[Permissions](#permissions) required:** Site administration (that is, member of the *site-admin* [group](https://confluence.atlassian.com/x/24xjL)).
     *
     * @param \JiraSdk\Model\AddGroupBean $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateGroupBadRequestException
     * @throws \JiraSdk\Exception\CreateGroupUnauthorizedException
     * @throws \JiraSdk\Exception\CreateGroupForbiddenException
     *
     * @return null|\JiraSdk\Model\Group|\Psr\Http\Message\ResponseInterface
     */
    public function createGroup(\JiraSdk\Model\AddGroupBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateGroup($requestBody), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) list of groups.
     **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     *     @var array $groupId The ID of a group. To specify multiple IDs, pass multiple `groupId` parameters. For example, `groupId=5b10a2844c20165700ede21g&groupId=5b10ac8d82e05b22cc7d4ef5`.
     *     @var array $groupName The name of a group. To specify multiple names, pass multiple `groupName` parameters. For example, `groupName=administrators&groupName=jira-software-users`.
     *     @var string $accessType The access level of a group. Valid values: 'site-admin', 'admin', 'user'.
     *     @var string $applicationKey The application key of the product user groups to search for. Valid values: 'jira-servicedesk', 'jira-software', 'jira-product-discovery', 'jira-core'.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\BulkGetGroupsBadRequestException
     * @throws \JiraSdk\Exception\BulkGetGroupsUnauthorizedException
     * @throws \JiraSdk\Exception\BulkGetGroupsForbiddenException
     * @throws \JiraSdk\Exception\BulkGetGroupsInternalServerErrorException
     *
     * @return null|\JiraSdk\Model\PageBeanGroupDetails|\Psr\Http\Message\ResponseInterface
     */
    public function bulkGetGroups(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\BulkGetGroups($queryParameters), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of all users in a group.
    
    Note that users are ordered by username, however the username is not returned in the results due to privacy reasons.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.  
    The name of the group. This parameter cannot be used with the `groupId` parameter.
    *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
    *     @var bool $includeInactiveUsers Include inactive users.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetUsersFromGroupBadRequestException
    * @throws \JiraSdk\Exception\GetUsersFromGroupUnauthorizedException
    * @throws \JiraSdk\Exception\GetUsersFromGroupForbiddenException
    * @throws \JiraSdk\Exception\GetUsersFromGroupNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanUserDetails|\Psr\Http\Message\ResponseInterface
    */
    public function getUsersFromGroup(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetUsersFromGroup($queryParameters), $fetch);
    }
    /**
    * Removes a user from a group.
    
    **[Permissions](#permissions) required:** Site administration (that is, member of the *site-admin* [group](https://confluence.atlassian.com/x/24xjL)).
    *
    * @param array $queryParameters {
    *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.  
    The name of the group. This parameter cannot be used with the `groupId` parameter.
    *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
    *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\RemoveUserFromGroupBadRequestException
    * @throws \JiraSdk\Exception\RemoveUserFromGroupUnauthorizedException
    * @throws \JiraSdk\Exception\RemoveUserFromGroupForbiddenException
    * @throws \JiraSdk\Exception\RemoveUserFromGroupNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function removeUserFromGroup(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveUserFromGroup($queryParameters), $fetch);
    }
    /**
    * Adds a user to a group.
    
    **[Permissions](#permissions) required:** Site administration (that is, member of the *site-admin* [group](https://confluence.atlassian.com/x/24xjL)).
    *
    * @param \JiraSdk\Model\UpdateUserToGroupBean $requestBody 
    * @param array $queryParameters {
    *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.  
    The name of the group. This parameter cannot be used with the `groupId` parameter.
    *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AddUserToGroupBadRequestException
    * @throws \JiraSdk\Exception\AddUserToGroupUnauthorizedException
    * @throws \JiraSdk\Exception\AddUserToGroupForbiddenException
    * @throws \JiraSdk\Exception\AddUserToGroupNotFoundException
    *
    * @return null|\JiraSdk\Model\Group|\Psr\Http\Message\ResponseInterface
    */
    public function addUserToGroup(\JiraSdk\Model\UpdateUserToGroupBean $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddUserToGroup($requestBody, $queryParameters), $fetch);
    }
    /**
    * Returns a list of groups whose names contain a query string. A list of group names can be provided to exclude groups from the results.
    
    The primary use case for this resource is to populate a group picker suggestions list. To this end, the returned object includes the `html` field where the matched query term is highlighted in the group name with the HTML strong tag. Also, the groups list is wrapped in a response object that contains a header for use in the picker, specifically *Showing X of Y matching groups*.
    
    The list returns with the groups sorted. If no groups match the list criteria, an empty list is returned.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg). Anonymous calls and calls by users without the required permission return an empty list.
    
    *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg). Without this permission, calls where query is not an exact match to an existing group will return an empty list.
    *
    * @param array $queryParameters {
    *     @var string $accountId This parameter is deprecated, setting it does not affect the results. To find groups containing a particular user, use [Get user groups](#api-rest-api-3-user-groups-get).
    *     @var string $query The string to find in group names.
    *     @var array $exclude As a group's name can change, use of `excludeGroupIds` is recommended to identify a group.  
    A group to exclude from the result. To exclude multiple groups, provide an ampersand-separated list. For example, `exclude=group1&exclude=group2`. This parameter cannot be used with the `excludeGroupIds` parameter.
    *     @var array $excludeId A group ID to exclude from the result. To exclude multiple groups, provide an ampersand-separated list. For example, `excludeId=group1-id&excludeId=group2-id`. This parameter cannot be used with the `excludeGroups` parameter.
    *     @var int $maxResults The maximum number of groups to return. The maximum number of groups that can be returned is limited by the system property `jira.ajax.autocomplete.limit`.
    *     @var bool $caseInsensitive Whether the search for groups should be case insensitive.
    *     @var string $userName This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    *
    * @return null|\JiraSdk\Model\FoundGroups|\Psr\Http\Message\ResponseInterface
    */
    public function findGroups(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\FindGroups($queryParameters), $fetch);
    }
    /**
    * Returns a list of users and groups matching a string. The string is used:
    
    *  for users, to find a case-insensitive match with display name and e-mail address. Note that if a user has hidden their email address in their user profile, partial matches of the email address will not find the user. An exact match is required.
    *  for groups, to find a case-sensitive match with group name.
    
    For example, if the string *tin* is used, records with the display name *Tina*, email address *sarah@tinplatetraining.com*, and the group *accounting* would be returned.
    
    Optionally, the search can be refined to:
    
    *  the projects and issue types associated with a custom field, such as a user picker. The search can then be further refined to return only users and groups that have permission to view specific:
       
        *  projects.
        *  issue types.
       
       If multiple projects or issue types are specified, they must be a subset of those enabled for the custom field or no results are returned. For example, if a field is enabled for projects A, B, and C then the search could be limited to projects B and C. However, if the search is limited to projects B and D, nothing is returned.
    *  not return Connect app users and groups.
    *  return groups that have a case-insensitive match with the query.
    
    The primary use case for this resource is to populate a picker field suggestion list with users or groups. To this end, the returned object includes an `html` field for each list. This field highlights the matched query term in the item name with the HTML strong tag. Also, each list is wrapped in a response object that contains a header for use in a picker, specifically *Showing X of Y matching groups*.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/yodKLg).
    *
    * @param array $queryParameters {
    *     @var string $query The search string.
    *     @var int $maxResults The maximum number of items to return in each list.
    *     @var bool $showAvatar Whether the user avatar should be returned. If an invalid value is provided, the default value is used.
    *     @var string $fieldId The custom field ID of the field this request is for.
    *     @var array $projectId The ID of a project that returned users and groups must have permission to view. To include multiple projects, provide an ampersand-separated list. For example, `projectId=10000&projectId=10001`. This parameter is only used when `fieldId` is present.
    *     @var array $issueTypeId The ID of an issue type that returned users and groups must have permission to view. To include multiple issue types, provide an ampersand-separated list. For example, `issueTypeId=10000&issueTypeId=10001`. Special values, such as `-1` (all standard issue types) and `-2` (all subtask issue types), are supported. This parameter is only used when `fieldId` is present.
    *     @var string $avatarSize The size of the avatar to return. If an invalid value is provided, the default value is used.
    *     @var bool $caseInsensitive Whether the search for groups should be case insensitive.
    *     @var bool $excludeConnectAddons Whether Connect app users and groups should be excluded from the search results. If an invalid value is provided, the default value is used.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\FindUsersAndGroupsBadRequestException
    * @throws \JiraSdk\Exception\FindUsersAndGroupsUnauthorizedException
    * @throws \JiraSdk\Exception\FindUsersAndGroupsForbiddenException
    * @throws \JiraSdk\Exception\FindUsersAndGroupsTooManyRequestsException
    *
    * @return null|\JiraSdk\Model\FoundUsersAndGroups|\Psr\Http\Message\ResponseInterface
    */
    public function findUsersAndGroups(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\FindUsersAndGroups($queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetLicenseUnauthorizedException
     *
     * @return null|\JiraSdk\Model\License|\Psr\Http\Message\ResponseInterface
     */
    public function getLicense(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetLicense(), $fetch);
    }
    /**
    * Creates an issue or, where the option to create subtasks is enabled in Jira, a subtask. A transition may be applied, to move the issue or subtask to a workflow step other than the default start step, and issue properties set.
    
    The content of the issue or subtask is defined using `update` and `fields`. The fields that can be set in the issue or subtask are determined using the [ Get create issue metadata](#api-rest-api-3-issue-createmeta-get). These are the same fields that appear on the issue's create screen. Note that the `description`, `environment`, and any `textarea` type custom fields (multi-line text fields) take Atlassian Document Format content. Single line custom fields (`textfield`) accept a string and don't handle Atlassian Document Format content.
    
    Creating a subtask differs from creating an issue as follows:
    
    *  `issueType` must be set to a subtask issue type (use [ Get create issue metadata](#api-rest-api-3-issue-createmeta-get) to find subtask issue types).
    *  `parent` must contain the ID or key of the parent issue.
    
    In a next-gen project any issue may be made a child providing that the parent and child are members of the same project.
    
    **[Permissions](#permissions) required:** *Browse projects* and *Create issues* [project permissions](https://confluence.atlassian.com/x/yodKLg) for the project in which the issue or subtask is created.
    *
    * @param \JiraSdk\Model\IssueUpdateDetails $requestBody 
    * @param array $queryParameters {
    *     @var bool $updateHistory Whether the project in which the issue is created is added to the user's **Recently viewed** project list, as shown under **Projects** in Jira. When provided, the issue type and request type are added to the user's history for a project. These values are then used to provide defaults on the issue create screen.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateIssueBadRequestException
    * @throws \JiraSdk\Exception\CreateIssueUnauthorizedException
    * @throws \JiraSdk\Exception\CreateIssueForbiddenException
    *
    * @return null|\JiraSdk\Model\CreatedIssue|\Psr\Http\Message\ResponseInterface
    */
    public function createIssue(\JiraSdk\Model\IssueUpdateDetails $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateIssue($requestBody, $queryParameters), $fetch);
    }
    /**
    * Creates upto **50** issues and, where the option to create subtasks is enabled in Jira, subtasks. Transitions may be applied, to move the issues or subtasks to a workflow step other than the default start step, and issue properties set.
    
    The content of each issue or subtask is defined using `update` and `fields`. The fields that can be set in the issue or subtask are determined using the [ Get create issue metadata](#api-rest-api-3-issue-createmeta-get). These are the same fields that appear on the issues' create screens. Note that the `description`, `environment`, and any `textarea` type custom fields (multi-line text fields) take Atlassian Document Format content. Single line custom fields (`textfield`) accept a string and don't handle Atlassian Document Format content.
    
    Creating a subtask differs from creating an issue as follows:
    
    *  `issueType` must be set to a subtask issue type (use [ Get create issue metadata](#api-rest-api-3-issue-createmeta-get) to find subtask issue types).
    *  `parent` the must contain the ID or key of the parent issue.
    
    **[Permissions](#permissions) required:** *Browse projects* and *Create issues* [project permissions](https://confluence.atlassian.com/x/yodKLg) for the project in which each issue or subtask is created.
    *
    * @param \JiraSdk\Model\IssuesUpdateBean $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateIssuesBadRequestException
    * @throws \JiraSdk\Exception\CreateIssuesUnauthorizedException
    *
    * @return null|\JiraSdk\Model\CreatedIssues|\Psr\Http\Message\ResponseInterface
    */
    public function createIssues(\JiraSdk\Model\IssuesUpdateBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateIssues($requestBody), $fetch);
    }
    /**
    * Returns details of projects, issue types within projects, and, when requested, the create screen fields for each issue type for the user. Use the information to populate the requests in [ Create issue](#api-rest-api-3-issue-post) and [Create issues](#api-rest-api-3-issue-bulk-post).
    
    The request can be restricted to specific projects or issue types using the query parameters. The response will contain information for the valid projects, issue types, or project and issue type combinations requested. Note that invalid project, issue type, or project and issue type combinations do not generate errors.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Create issues* [project permission](https://confluence.atlassian.com/x/yodKLg) in the requested projects.
    *
    * @param array $queryParameters {
    *     @var array $projectIds List of project IDs. This parameter accepts a comma-separated list. Multiple project IDs can also be provided using an ampersand-separated list. For example, `projectIds=10000,10001&projectIds=10020,10021`. This parameter may be provided with `projectKeys`.
    *     @var array $projectKeys List of project keys. This parameter accepts a comma-separated list. Multiple project keys can also be provided using an ampersand-separated list. For example, `projectKeys=proj1,proj2&projectKeys=proj3`. This parameter may be provided with `projectIds`.
    *     @var array $issuetypeIds List of issue type IDs. This parameter accepts a comma-separated list. Multiple issue type IDs can also be provided using an ampersand-separated list. For example, `issuetypeIds=10000,10001&issuetypeIds=10020,10021`. This parameter may be provided with `issuetypeNames`.
    *     @var array $issuetypeNames List of issue type names. This parameter accepts a comma-separated list. Multiple issue type names can also be provided using an ampersand-separated list. For example, `issuetypeNames=name1,name2&issuetypeNames=name3`. This parameter may be provided with `issuetypeIds`.
    *     @var string $expand Use [expand](#expansion) to include additional information about issue metadata in the response. This parameter accepts `projects.issuetypes.fields`, which returns information about the fields in the issue creation screen for each issue type. Fields hidden from the screen are not returned. Use the information to populate the `fields` and `update` fields in [Create issue](#api-rest-api-3-issue-post) and [Create issues](#api-rest-api-3-issue-bulk-post).
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetCreateIssueMetaUnauthorizedException
    *
    * @return null|\JiraSdk\Model\IssueCreateMetadata|\Psr\Http\Message\ResponseInterface
    */
    public function getCreateIssueMeta(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetCreateIssueMeta($queryParameters), $fetch);
    }
    /**
    * Returns lists of issues matching a query string. Use this resource to provide auto-completion suggestions when the user is looking for an issue using a word or string.
    
    This operation returns two lists:
    
    *  `History Search` which includes issues from the user's history of created, edited, or viewed issues that contain the string in the `query` parameter.
    *  `Current Search` which includes issues that match the JQL expression in `currentJQL` and contain the string in the `query` parameter.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param array $queryParameters {
    *     @var string $query A string to match against text fields in the issue such as title, description, or comments.
    *     @var string $currentJQL A JQL query defining a list of issues to search for the query term. Note that `username` and `userkey` cannot be used as search terms for this parameter, due to privacy reasons. Use `accountId` instead.
    *     @var string $currentIssueKey The key of an issue to exclude from search results. For example, the issue the user is viewing when they perform this query.
    *     @var string $currentProjectId The ID of a project that suggested issues must belong to.
    *     @var bool $showSubTasks Indicate whether to include subtasks in the suggestions list.
    *     @var bool $showSubTaskParent When `currentIssueKey` is a subtask, whether to include the parent issue in the suggestions if it matches the query.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssuePickerResourceUnauthorizedException
    *
    * @return null|\JiraSdk\Model\IssuePickerSuggestions|\Psr\Http\Message\ResponseInterface
    */
    public function getIssuePickerResource(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssuePickerResource($queryParameters), $fetch);
    }
    /**
    * Sets or updates a list of entity property values on issues. A list of up to 10 entity properties can be specified along with up to 10,000 issues on which to set or update that list of entity properties.
    
    The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON. The maximum length of single issue property value is 32768 characters. This operation can be accessed anonymously.
    
    This operation is:
    
    *  transactional, either all properties are updated in all eligible issues or, when errors occur, no properties are updated.
    *  [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* and *Edit issues* [project permissions](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param \JiraSdk\Model\IssueEntityProperties $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\BulkSetIssuesPropertiesListBadRequestException
    * @throws \JiraSdk\Exception\BulkSetIssuesPropertiesListUnauthorizedException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function bulkSetIssuesPropertiesList(\JiraSdk\Model\IssueEntityProperties $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\BulkSetIssuesPropertiesList($requestBody), $fetch);
    }
    /**
    * Sets or updates entity property values on issues. Up to 10 entity properties can be specified for each issue and up to 100 issues included in the request.
    
    The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON.
    
    This operation is:
    
    *  [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
    *  non-transactional. Updating some entities may fail. Such information will available in the task result.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* and *Edit issues* [project permissions](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param \JiraSdk\Model\MultiIssueEntityProperties $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\BulkSetIssuePropertiesByIssueBadRequestException
    * @throws \JiraSdk\Exception\BulkSetIssuePropertiesByIssueUnauthorizedException
    * @throws \JiraSdk\Exception\BulkSetIssuePropertiesByIssueForbiddenException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function bulkSetIssuePropertiesByIssue(\JiraSdk\Model\MultiIssueEntityProperties $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\BulkSetIssuePropertiesByIssue($requestBody), $fetch);
    }
    /**
    * Deletes a property value from multiple issues. The issues to be updated can be specified by filter criteria.
    
    The criteria the filter used to identify eligible issues are:
    
    *  `entityIds` Only issues from this list are eligible.
    *  `currentValue` Only issues with the property set to this value are eligible.
    
    If both criteria is specified, they are joined with the logical *AND*: only issues that satisfy both criteria are considered eligible.
    
    If no filter criteria are specified, all the issues visible to the user and where the user has the EDIT\_ISSUES permission for the issue are considered eligible.
    
    This operation is:
    
    *  transactional, either the property is deleted from all eligible issues or, when errors occur, no properties are deleted.
    *  [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [ project permission](https://confluence.atlassian.com/x/yodKLg) for each project containing issues.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  *Edit issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for each issue.
    *
    * @param string $propertyKey The key of the property.
    * @param \JiraSdk\Model\IssueFilterForBulkPropertyDelete $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\BulkDeleteIssuePropertyBadRequestException
    * @throws \JiraSdk\Exception\BulkDeleteIssuePropertyUnauthorizedException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function bulkDeleteIssueProperty(string $propertyKey, \JiraSdk\Model\IssueFilterForBulkPropertyDelete $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\BulkDeleteIssueProperty($propertyKey, $requestBody), $fetch);
    }
    /**
    * Sets a property value on multiple issues.
    
    The value set can be a constant or determined by a [Jira expression](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/). Expressions must be computable with constant complexity when applied to a set of issues. Expressions must also comply with the [restrictions](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#restrictions) that apply to all Jira expressions.
    
    The issues to be updated can be specified by a filter.
    
    The filter identifies issues eligible for update using these criteria:
    
    *  `entityIds` Only issues from this list are eligible.
    *  `currentValue` Only issues with the property set to this value are eligible.
    *  `hasProperty`:
       
        *  If *true*, only issues with the property are eligible.
        *  If *false*, only issues without the property are eligible.
    
    If more than one criteria is specified, they are joined with the logical *AND*: only issues that satisfy all criteria are eligible.
    
    If an invalid combination of criteria is provided, an error is returned. For example, specifying a `currentValue` and `hasProperty` as *false* would not match any issues (because without the property the property cannot have a value).
    
    The filter is optional. Without the filter all the issues visible to the user and where the user has the EDIT\_ISSUES permission for the issue are considered eligible.
    
    This operation is:
    
    *  transactional, either all eligible issues are updated or, when errors occur, none are updated.
    *  [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for each project containing issues.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  *Edit issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for each issue.
    *
    * @param string $propertyKey The key of the property. The maximum length is 255 characters.
    * @param \JiraSdk\Model\BulkIssuePropertyUpdateRequest $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\BulkSetIssuePropertyBadRequestException
    * @throws \JiraSdk\Exception\BulkSetIssuePropertyUnauthorizedException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function bulkSetIssueProperty(string $propertyKey, \JiraSdk\Model\BulkIssuePropertyUpdateRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\BulkSetIssueProperty($propertyKey, $requestBody), $fetch);
    }
    /**
    * Returns, for the user, details of the watched status of issues from a list. If an issue ID is invalid, the returned watched status is `false`.
    
    This operation requires the **Allow users to watch issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param \JiraSdk\Model\IssueList $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIsWatchingIssueBulkUnauthorizedException
    *
    * @return null|\JiraSdk\Model\BulkIssueIsWatching|\Psr\Http\Message\ResponseInterface
    */
    public function getIsWatchingIssueBulk(\JiraSdk\Model\IssueList $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIsWatchingIssueBulk($requestBody), $fetch);
    }
    /**
    * Deletes an issue.
    
    An issue cannot be deleted if it has one or more subtasks. To delete an issue with subtasks, set `deleteSubtasks`. This causes the issue's subtasks to be deleted with the issue.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* and *Delete issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param array $queryParameters {
    *     @var string $deleteSubtasks Whether the issue's subtasks are deleted when the issue is deleted.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteIssueBadRequestException
    * @throws \JiraSdk\Exception\DeleteIssueUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteIssueForbiddenException
    * @throws \JiraSdk\Exception\DeleteIssueNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteIssue(string $issueIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteIssue($issueIdOrKey, $queryParameters), $fetch);
    }
    /**
    * Returns the details for an issue.
    
    The issue is identified by its ID or key, however, if the identifier doesn't match an issue, a case-insensitive search and check for moved issues is performed. If a matching issue is found its details are returned, a 302 or other redirect is **not** returned. The issue key returned in the response is the key of the issue found.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param array $queryParameters {
    *     @var array $fields A list of fields to return for the issue. This parameter accepts a comma-separated list. Use it to retrieve a subset of fields. Allowed values:
    
    *  `*all` Returns all fields.
    *  `*navigable` Returns navigable fields.
    *  Any issue field, prefixed with a minus to exclude.
    
    Examples:
    
    *  `summary,comment` Returns only the summary and comments fields.
    *  `-description` Returns all (default) fields except description.
    *  `*navigable,-comment` Returns all navigable fields except comment.
    
    This parameter may be specified multiple times. For example, `fields=field1,field2& fields=field3`.
    
    Note: All fields are returned by default. This differs from [Search for issues using JQL (GET)](#api-rest-api-3-search-get) and [Search for issues using JQL (POST)](#api-rest-api-3-search-post) where the default is all navigable fields.
    *     @var bool $fieldsByKeys Whether fields in `fields` are referenced by keys rather than IDs. This parameter is useful where fields have been added by a connect app and a field's key may differ from its ID.
    *     @var string $expand Use [expand](#expansion) to include additional information about the issues in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `renderedFields` Returns field values rendered in HTML format.
    *  `names` Returns the display name of each field.
    *  `schema` Returns the schema describing a field type.
    *  `transitions` Returns all possible transitions for the issue.
    *  `editmeta` Returns information about how each field can be edited.
    *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.
    *  `versionedRepresentations` Returns a JSON array for each version of a field's value, with the highest number representing the most recent version. Note: When included in the request, the `fields` parameter is ignored.
    *     @var array $properties A list of issue properties to return for the issue. This parameter accepts a comma-separated list. Allowed values:
    
    *  `*all` Returns all issue properties.
    *  Any issue property key, prefixed with a minus to exclude.
    
    Examples:
    
    *  `*all` Returns all properties.
    *  `*all,-prop1` Returns all properties except `prop1`.
    *  `prop1,prop2` Returns `prop1` and `prop2` properties.
    
    This parameter may be specified multiple times. For example, `properties=prop1,prop2& properties=prop3`.
    *     @var bool $updateHistory Whether the project in which the issue is created is added to the user's **Recently viewed** project list, as shown under **Projects** in Jira. This also populates the [JQL issues search](#api-rest-api-3-search-get) `lastViewed` field.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueNotFoundException
    *
    * @return null|\JiraSdk\Model\IssueBean|\Psr\Http\Message\ResponseInterface
    */
    public function getIssue(string $issueIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssue($issueIdOrKey, $queryParameters), $fetch);
    }
    /**
    * Edits an issue. A transition may be applied and issue properties updated as part of the edit.
    
    The edits to the issue's fields are defined using `update` and `fields`. The fields that can be edited are determined using [ Get edit issue metadata](#api-rest-api-3-issue-issueIdOrKey-editmeta-get).
    
    The parent field may be set by key or ID. For standard issue types, the parent may be removed by setting `update.parent.set.none` to *true*. Note that the `description`, `environment`, and any `textarea` type custom fields (multi-line text fields) take Atlassian Document Format content. Single line custom fields (`textfield`) accept a string and don't handle Atlassian Document Format content.
    
    Connect apps having an app user with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), can override the screen security configuration using `overrideScreenSecurity` and `overrideEditableFlag`.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* and *Edit issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param \JiraSdk\Model\IssueUpdateDetails $requestBody 
    * @param array $queryParameters {
    *     @var bool $notifyUsers Whether a notification email about the issue update is sent to all watchers. To disable the notification, administer Jira or administer project permissions are required. If the user doesn't have the necessary permission the request is ignored.
    *     @var bool $overrideScreenSecurity Whether screen security is overridden to enable hidden fields to be edited. Available to Connect app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *     @var bool $overrideEditableFlag Whether screen security is overridden to enable uneditable fields to be edited. Available to Connect app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\EditIssueBadRequestException
    * @throws \JiraSdk\Exception\EditIssueUnauthorizedException
    * @throws \JiraSdk\Exception\EditIssueForbiddenException
    * @throws \JiraSdk\Exception\EditIssueNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function editIssue(string $issueIdOrKey, \JiraSdk\Model\IssueUpdateDetails $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\EditIssue($issueIdOrKey, $requestBody, $queryParameters), $fetch);
    }
    /**
    * Assigns an issue to a user. Use this operation when the calling user does not have the *Edit Issues* permission but has the *Assign issue* permission for the project that the issue is in.
    
    If `name` or `accountId` is set to:
    
    *  `"-1"`, the issue is assigned to the default assignee for the project.
    *  `null`, the issue is set to unassigned.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse Projects* and *Assign Issues* [ project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue to be assigned.
    * @param \JiraSdk\Model\User $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AssignIssueBadRequestException
    * @throws \JiraSdk\Exception\AssignIssueForbiddenException
    * @throws \JiraSdk\Exception\AssignIssueNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function assignIssue(string $issueIdOrKey, \JiraSdk\Model\User $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AssignIssue($issueIdOrKey, $requestBody), $fetch);
    }
    /**
    * Adds one or more attachments to an issue. Attachments are posted as multipart/form-data ([RFC 1867](https://www.ietf.org/rfc/rfc1867.txt)).
    
    Note that:
    
    *  The request must have a `X-Atlassian-Token: no-check` header, if not it is blocked. See [Special headers](#special-request-headers) for more information.
    *  The name of the multipart/form-data parameter that contains the attachments must be `file`.
    
    The following examples upload a file called *myfile.txt* to the issue *TEST-123*:
    
    #### curl ####
    
       curl --location --request POST 'https://your-domain.atlassian.net/rest/api/3/issue/TEST-123/attachments'
        -u 'email@example.com:<api_token>'
        -H 'X-Atlassian-Token: no-check'
        --form 'file=@"myfile.txt"'
    
    #### Node.js ####
    
       // This code sample uses the 'node-fetch' and 'form-data' libraries:
        // https://www.npmjs.com/package/node-fetch
        // https://www.npmjs.com/package/form-data
        const fetch = require('node-fetch');
        const FormData = require('form-data');
        const fs = require('fs');
       
        const filePath = 'myfile.txt';
        const form = new FormData();
        const stats = fs.statSync(filePath);
        const fileSizeInBytes = stats.size;
        const fileStream = fs.createReadStream(filePath);
       
        form.append('file', fileStream, {knownLength: fileSizeInBytes});
       
        fetch('https://your-domain.atlassian.net/rest/api/3/issue/TEST-123/attachments', {
            method: 'POST',
            body: form,
            headers: {
                'Authorization': `Basic ${Buffer.from(
                    'email@example.com:'
                ).toString('base64')}`,
                'Accept': 'application/json',
                'X-Atlassian-Token': 'no-check'
            }
        })
            .then(response => {
                console.log(
                    `Response: ${response.status} ${response.statusText}`
                );
                return response.text();
            })
            .then(text => console.log(text))
            .catch(err => console.error(err));
    
    #### Java ####
    
       // This code sample uses the  'Unirest' library:
        // http://unirest.io/java.html
        HttpResponse response = Unirest.post("https://your-domain.atlassian.net/rest/api/2/issue/{issueIdOrKey}/attachments")
                .basicAuth("email@example.com", "")
                .header("Accept", "application/json")
                .header("X-Atlassian-Token", "no-check")
                .field("file", new File("myfile.txt"))
                .asJson();
       
                System.out.println(response.getBody());
    
    #### Python ####
    
       # This code sample uses the 'requests' library:
        # http://docs.python-requests.org
        import requests
        from requests.auth import HTTPBasicAuth
        import json
       
        url = "https://your-domain.atlassian.net/rest/api/2/issue/{issueIdOrKey}/attachments"
       
        auth = HTTPBasicAuth("email@example.com", "")
       
        headers = {
           "Accept": "application/json",
           "X-Atlassian-Token": "no-check"
        }
       
        response = requests.request(
           "POST",
           url,
           headers = headers,
           auth = auth,
           files = {
                "file": ("myfile.txt", open("myfile.txt","rb"), "application-type")
           }
        )
       
        print(json.dumps(json.loads(response.text), sort_keys=True, indent=4, separators=(",", ": ")))
    
    #### PHP ####
    
       // This code sample uses the 'Unirest' library:
        // http://unirest.io/php.html
        Unirest\Request::auth('email@example.com', '');
       
        $headers = array(
          'Accept' => 'application/json',
          'X-Atlassian-Token' => 'no-check'
        );
       
        $parameters = array(
          'file' => File::add('myfile.txt')
        );
       
        $response = Unirest\Request::post(
          'https://your-domain.atlassian.net/rest/api/2/issue/{issueIdOrKey}/attachments',
          $headers,
          $parameters
        );
       
        var_dump($response)
    
    #### Forge ####
    
       // This sample uses Atlassian Forge and the `form-data` library.
        // https://developer.atlassian.com/platform/forge/
        // https://www.npmjs.com/package/form-data
        import api from "@forge/api";
        import FormData from "form-data";
       
        const form = new FormData();
        form.append('file', fileStream, {knownLength: fileSizeInBytes});
       
        const response = await api.asApp().requestJira('/rest/api/2/issue/{issueIdOrKey}/attachments', {
            method: 'POST',
            body: form,
            headers: {
                'Accept': 'application/json',
                'X-Atlassian-Token': 'no-check'
            }
        });
       
        console.log(`Response: ${response.status} ${response.statusText}`);
        console.log(await response.json());
    
    Tip: Use a client library. Many client libraries have classes for handling multipart POST operations. For example, in Java, the Apache HTTP Components library provides a [MultiPartEntity](http://hc.apache.org/httpcomponents-client-ga/httpmime/apidocs/org/apache/http/entity/mime/MultipartEntity.html) class for multipart POST operations.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** 
    
    *  *Browse Projects* and *Create attachments* [ project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue that attachments are added to.
    * @param null|string|resource|\Psr\Http\Message\StreamInterface $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AddAttachmentForbiddenException
    * @throws \JiraSdk\Exception\AddAttachmentNotFoundException
    * @throws \JiraSdk\Exception\AddAttachmentRequestEntityTooLargeException
    *
    * @return null|\JiraSdk\Model\Attachment[]|\Psr\Http\Message\ResponseInterface
    */
    public function addAttachment(string $issueIdOrKey, $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddAttachment($issueIdOrKey, $requestBody), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of all changelogs for an issue sorted by date, starting from the oldest.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetChangeLogsNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanChangelog|\Psr\Http\Message\ResponseInterface
    */
    public function getChangeLogs(string $issueIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetChangeLogs($issueIdOrKey, $queryParameters), $fetch);
    }
    /**
    * Returns changelogs for an issue specified by a list of changelog IDs.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param \JiraSdk\Model\IssueChangelogIds $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetChangeLogsByIdsBadRequestException
    * @throws \JiraSdk\Exception\GetChangeLogsByIdsNotFoundException
    *
    * @return null|\JiraSdk\Model\PageOfChangelogs|\Psr\Http\Message\ResponseInterface
    */
    public function getChangeLogsByIds(string $issueIdOrKey, \JiraSdk\Model\IssueChangelogIds $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetChangeLogsByIds($issueIdOrKey, $requestBody), $fetch);
    }
    /**
    * Returns all comments for an issue.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** Comments are included in the response where the user has:
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the comment.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the comment has visibility restrictions, belongs to the group or has the role visibility is role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var string $orderBy [Order](#ordering) the results by a field. Accepts *created* to sort comments by their created date.
    *     @var string $expand Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts `renderedBody`, which returns the comment body rendered in HTML.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetCommentsBadRequestException
    * @throws \JiraSdk\Exception\GetCommentsUnauthorizedException
    * @throws \JiraSdk\Exception\GetCommentsNotFoundException
    *
    * @return null|\JiraSdk\Model\PageOfComments|\Psr\Http\Message\ResponseInterface
    */
    public function getComments(string $issueIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetComments($issueIdOrKey, $queryParameters), $fetch);
    }
    /**
    * Adds a comment to an issue.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* and *Add comments* [ project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue containing the comment is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param \JiraSdk\Model\Comment $requestBody 
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts `renderedBody`, which returns the comment body rendered in HTML.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AddCommentBadRequestException
    * @throws \JiraSdk\Exception\AddCommentUnauthorizedException
    * @throws \JiraSdk\Exception\AddCommentNotFoundException
    *
    * @return null|\JiraSdk\Model\Comment|\Psr\Http\Message\ResponseInterface
    */
    public function addComment(string $issueIdOrKey, \JiraSdk\Model\Comment $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddComment($issueIdOrKey, $requestBody, $queryParameters), $fetch);
    }
    /**
     * Deletes a comment.
     **[Permissions](#permissions) required:**
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue containing the comment is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  *Delete all comments*[ project permission](https://confluence.atlassian.com/x/yodKLg) to delete any comment or *Delete own comments* to delete comment created by the user,
     *  If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
     *
     * @param string $issueIdOrKey The ID or key of the issue.
     * @param string $id The ID of the comment.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteCommentBadRequestException
     * @throws \JiraSdk\Exception\DeleteCommentUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteCommentNotFoundException
     * @throws \JiraSdk\Exception\DeleteCommentMethodNotAllowedException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteComment(string $issueIdOrKey, string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteComment($issueIdOrKey, $id), $fetch);
    }
    /**
    * Returns a comment.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the comment.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $id The ID of the comment.
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts `renderedBody`, which returns the comment body rendered in HTML.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetCommentUnauthorizedException
    * @throws \JiraSdk\Exception\GetCommentNotFoundException
    *
    * @return null|\JiraSdk\Model\Comment|\Psr\Http\Message\ResponseInterface
    */
    public function getComment(string $issueIdOrKey, string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetComment($issueIdOrKey, $id, $queryParameters), $fetch);
    }
    /**
    * Updates a comment.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue containing the comment is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  *Edit all comments*[ project permission](https://confluence.atlassian.com/x/yodKLg) to update any comment or *Edit own comments* to update comment created by the user.
    *  If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $id The ID of the comment.
    * @param \JiraSdk\Model\Comment $requestBody 
    * @param array $queryParameters {
    *     @var bool $notifyUsers Whether users are notified when a comment is updated.
    *     @var bool $overrideEditableFlag Whether screen security is overridden to enable uneditable fields to be edited. Available to Connect app users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *     @var string $expand Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts `renderedBody`, which returns the comment body rendered in HTML.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateCommentBadRequestException
    * @throws \JiraSdk\Exception\UpdateCommentUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateCommentNotFoundException
    *
    * @return null|\JiraSdk\Model\Comment|\Psr\Http\Message\ResponseInterface
    */
    public function updateComment(string $issueIdOrKey, string $id, \JiraSdk\Model\Comment $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateComment($issueIdOrKey, $id, $requestBody, $queryParameters), $fetch);
    }
    /**
    * Returns the edit screen fields for an issue that are visible to and editable by the user. Use the information to populate the requests in [Edit issue](#api-rest-api-3-issue-issueIdOrKey-put).
    
    This endpoint will check for these conditions:
    
    1.  Field is available on a field screen - through screen, screen scheme, issue type screen scheme, and issue type scheme configuration. `overrideScreenSecurity=true` skips this condition.
    2.  Field is visible in the [field configuration](https://support.atlassian.com/jira-cloud-administration/docs/change-a-field-configuration/). `overrideScreenSecurity=true` skips this condition.
    3.  Field is shown on the issue: each field has different conditions here. For example: Attachment field only shows if attachments are enabled. Assignee only shows if user has permissions to assign the issue.
    4.  If a field is custom then it must have valid custom field context, applicable for its project and issue type. All system fields are assumed to have context in all projects and all issue types.
    5.  Issue has a project, issue type, and status defined.
    6.  Issue is assigned to a valid workflow, and the current status has assigned a workflow step. `overrideEditableFlag=true` skips this condition.
    7.  The current workflow step is editable. This is true by default, but [can be disabled by setting](https://support.atlassian.com/jira-cloud-administration/docs/use-workflow-properties/) the `jira.issue.editable` property to `false`. `overrideEditableFlag=true` skips this condition.
    8.  User has [Edit issues permission](https://support.atlassian.com/jira-cloud-administration/docs/permissions-for-company-managed-projects/).
    9.  Workflow permissions allow editing a field. This is true by default but [can be modified](https://support.atlassian.com/jira-cloud-administration/docs/use-workflow-properties/) using `jira.permission.*` workflow properties.
    
    Fields hidden using [Issue layout settings page](https://support.atlassian.com/jira-software-cloud/docs/configure-field-layout-in-the-issue-view/) remain editable.
    
    Connect apps having an app user with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), can return additional details using:
    
    *  `overrideScreenSecurity` When this flag is `true`, then this endpoint skips checking if fields are available through screens, and field configuration (conditions 1. and 2. from the list above).
    *  `overrideEditableFlag` When this flag is `true`, then this endpoint skips checking if workflow is present and if the current step is editable (conditions 6. and 7. from the list above).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    
    Note: For any fields to be editable the user must have the *Edit issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param array $queryParameters {
    *     @var bool $overrideScreenSecurity Whether hidden fields are returned. Available to Connect app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *     @var bool $overrideEditableFlag Whether non-editable fields are returned. Available to Connect app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetEditIssueMetaUnauthorizedException
    * @throws \JiraSdk\Exception\GetEditIssueMetaForbiddenException
    * @throws \JiraSdk\Exception\GetEditIssueMetaNotFoundException
    *
    * @return null|\JiraSdk\Model\IssueUpdateMetadata|\Psr\Http\Message\ResponseInterface
    */
    public function getEditIssueMeta(string $issueIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetEditIssueMeta($issueIdOrKey, $queryParameters), $fetch);
    }
    /**
     * Creates an email notification for an issue and adds it to the mail queue.
     **[Permissions](#permissions) required:**
     *  *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey ID or key of the issue that the notification is sent for.
     * @param \JiraSdk\Model\Notification $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\NotifyBadRequestException
     * @throws \JiraSdk\Exception\NotifyForbiddenException
     * @throws \JiraSdk\Exception\NotifyNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function notify(string $issueIdOrKey, \JiraSdk\Model\Notification $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\Notify($issueIdOrKey, $requestBody), $fetch);
    }
    /**
    * Returns the URLs and keys of an issue's properties.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** Property details are only returned where the user has:
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The key or ID of the issue.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssuePropertyKeysNotFoundException
    *
    * @return null|\JiraSdk\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface
    */
    public function getIssuePropertyKeys(string $issueIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssuePropertyKeys($issueIdOrKey), $fetch);
    }
    /**
    * Deletes an issue's property.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* and *Edit issues* [project permissions](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The key or ID of the issue.
    * @param string $propertyKey The key of the property.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteIssuePropertyUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteIssuePropertyNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteIssueProperty(string $issueIdOrKey, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteIssueProperty($issueIdOrKey, $propertyKey), $fetch);
    }
    /**
    * Returns the key and value of an issue's property.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The key or ID of the issue.
    * @param string $propertyKey The key of the property.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssuePropertyUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssuePropertyNotFoundException
    *
    * @return null|\JiraSdk\Model\EntityProperty|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueProperty(string $issueIdOrKey, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueProperty($issueIdOrKey, $propertyKey), $fetch);
    }
    /**
    * Sets the value of an issue's property. Use this resource to store custom data against an issue.
    
    The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* and *Edit issues* [project permissions](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $propertyKey The key of the issue property. The maximum length is 255 characters.
    * @param mixed $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetIssuePropertyBadRequestException
    * @throws \JiraSdk\Exception\SetIssuePropertyUnauthorizedException
    * @throws \JiraSdk\Exception\SetIssuePropertyForbiddenException
    * @throws \JiraSdk\Exception\SetIssuePropertyNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function setIssueProperty(string $issueIdOrKey, string $propertyKey, $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetIssueProperty($issueIdOrKey, $propertyKey, $requestBody), $fetch);
    }
    /**
    * Deletes the remote issue link from the issue using the link's global ID. Where the global ID includes reserved URL characters these must be escaped in the request. For example, pass `system=http://www.mycompany.com/support&id=1` as `system%3Dhttp%3A%2F%2Fwww.mycompany.com%2Fsupport%26id%3D1`.
    
    This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* and *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is implemented, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param array $queryParameters {
    *     @var string $globalId The global ID of a remote issue link.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByGlobalIdBadRequestException
    * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByGlobalIdUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByGlobalIdForbiddenException
    * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByGlobalIdNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteRemoteIssueLinkByGlobalId(string $issueIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteRemoteIssueLinkByGlobalId($issueIdOrKey, $queryParameters), $fetch);
    }
    /**
    * Returns the remote issue links for an issue. When a remote issue link global ID is provided the record with that global ID is returned, otherwise all remote issue links are returned. Where a global ID includes reserved URL characters these must be escaped in the request. For example, pass `system=http://www.mycompany.com/support&id=1` as `system%3Dhttp%3A%2F%2Fwww.mycompany.com%2Fsupport%26id%3D1`.
    
    This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param array $queryParameters {
    *     @var string $globalId The global ID of the remote issue link.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetRemoteIssueLinksBadRequestException
    * @throws \JiraSdk\Exception\GetRemoteIssueLinksUnauthorizedException
    * @throws \JiraSdk\Exception\GetRemoteIssueLinksForbiddenException
    * @throws \JiraSdk\Exception\GetRemoteIssueLinksNotFoundException
    *
    * @return null|\JiraSdk\Model\RemoteIssueLink|\Psr\Http\Message\ResponseInterface
    */
    public function getRemoteIssueLinks(string $issueIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetRemoteIssueLinks($issueIdOrKey, $queryParameters), $fetch);
    }
    /**
    * Creates or updates a remote issue link for an issue.
    
    If a `globalId` is provided and a remote issue link with that global ID is found it is updated. Any fields without values in the request are set to null. Otherwise, the remote issue link is created.
    
    This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* and *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param \JiraSdk\Model\RemoteIssueLinkRequest $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateOrUpdateRemoteIssueLinkBadRequestException
    * @throws \JiraSdk\Exception\CreateOrUpdateRemoteIssueLinkUnauthorizedException
    * @throws \JiraSdk\Exception\CreateOrUpdateRemoteIssueLinkForbiddenException
    * @throws \JiraSdk\Exception\CreateOrUpdateRemoteIssueLinkNotFoundException
    *
    * @return null|\JiraSdk\Model\RemoteIssueLinkIdentifies|\Psr\Http\Message\ResponseInterface
    */
    public function createOrUpdateRemoteIssueLink(string $issueIdOrKey, \JiraSdk\Model\RemoteIssueLinkRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateOrUpdateRemoteIssueLink($issueIdOrKey, $requestBody), $fetch);
    }
    /**
    * Deletes a remote issue link from an issue.
    
    This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects*, *Edit issues*, and *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $linkId The ID of a remote issue link.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByIdBadRequestException
    * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByIdUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByIdForbiddenException
    * @throws \JiraSdk\Exception\DeleteRemoteIssueLinkByIdNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteRemoteIssueLinkById(string $issueIdOrKey, string $linkId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteRemoteIssueLinkById($issueIdOrKey, $linkId), $fetch);
    }
    /**
    * Returns a remote issue link for an issue.
    
    This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $linkId The ID of the remote issue link.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetRemoteIssueLinkByIdBadRequestException
    * @throws \JiraSdk\Exception\GetRemoteIssueLinkByIdUnauthorizedException
    * @throws \JiraSdk\Exception\GetRemoteIssueLinkByIdForbiddenException
    * @throws \JiraSdk\Exception\GetRemoteIssueLinkByIdNotFoundException
    *
    * @return null|\JiraSdk\Model\RemoteIssueLink|\Psr\Http\Message\ResponseInterface
    */
    public function getRemoteIssueLinkById(string $issueIdOrKey, string $linkId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetRemoteIssueLinkById($issueIdOrKey, $linkId), $fetch);
    }
    /**
    * Updates a remote issue link for an issue.
    
    Note: Fields without values in the request are set to null.
    
    This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* and *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $linkId The ID of the remote issue link.
    * @param \JiraSdk\Model\RemoteIssueLinkRequest $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateRemoteIssueLinkBadRequestException
    * @throws \JiraSdk\Exception\UpdateRemoteIssueLinkUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateRemoteIssueLinkForbiddenException
    * @throws \JiraSdk\Exception\UpdateRemoteIssueLinkNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function updateRemoteIssueLink(string $issueIdOrKey, string $linkId, \JiraSdk\Model\RemoteIssueLinkRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateRemoteIssueLink($issueIdOrKey, $linkId, $requestBody), $fetch);
    }
    /**
    * Returns either all transitions or a transition that can be performed by the user on an issue, based on the issue's status.
    
    Note, if a request is made for a transition that does not exist or cannot be performed on the issue, given its status, the response will return any empty transitions list.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required: A list or transition is returned only when the user has:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    
    However, if the user does not have the *Transition issues* [ project permission](https://confluence.atlassian.com/x/yodKLg) the response will not list any transitions.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information about transitions in the response. This parameter accepts `transitions.fields`, which returns information about the fields in the transition screen for each transition. Fields hidden from the screen are not returned. Use this information to populate the `fields` and `update` fields in [Transition issue](#api-rest-api-3-issue-issueIdOrKey-transitions-post).
    *     @var string $transitionId The ID of the transition.
    *     @var bool $skipRemoteOnlyCondition Whether transitions with the condition *Hide From User Condition* are included in the response.
    *     @var bool $includeUnavailableTransitions Whether details of transitions that fail a condition are included in the response
    *     @var bool $sortByOpsBarAndStatus Whether the transitions are sorted by ops-bar sequence value first then category order (Todo, In Progress, Done) or only by ops-bar sequence value.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetTransitionsUnauthorizedException
    * @throws \JiraSdk\Exception\GetTransitionsNotFoundException
    *
    * @return null|\JiraSdk\Model\Transitions|\Psr\Http\Message\ResponseInterface
    */
    public function getTransitions(string $issueIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetTransitions($issueIdOrKey, $queryParameters), $fetch);
    }
    /**
    * Performs an issue transition and, if the transition has a screen, updates the fields from the transition screen.
    
    sortByCategory To update the fields on the transition screen, specify the fields in the `fields` or `update` parameters in the request body. Get details about the fields using [ Get transitions](#api-rest-api-3-issue-issueIdOrKey-transitions-get) with the `transitions.fields` expand.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* and *Transition issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param \JiraSdk\Model\IssueUpdateDetails $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DoTransitionBadRequestException
    * @throws \JiraSdk\Exception\DoTransitionUnauthorizedException
    * @throws \JiraSdk\Exception\DoTransitionNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function doTransition(string $issueIdOrKey, \JiraSdk\Model\IssueUpdateDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DoTransition($issueIdOrKey, $requestBody), $fetch);
    }
    /**
    * Deletes a user's vote from an issue. This is the equivalent of the user clicking *Unvote* on an issue in Jira.
    
    This operation requires the **Allow users to vote on issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\RemoveVoteUnauthorizedException
    * @throws \JiraSdk\Exception\RemoveVoteNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function removeVote(string $issueIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveVote($issueIdOrKey), $fetch);
    }
    /**
    * Returns details about the votes on an issue.
    
    This operation requires the **Allow users to vote on issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is ini
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    
    Note that users with the necessary permissions for this operation but without the *View voters and watchers* project permissions are not returned details in the `voters` field.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetVotesUnauthorizedException
    * @throws \JiraSdk\Exception\GetVotesNotFoundException
    *
    * @return null|\JiraSdk\Model\Votes|\Psr\Http\Message\ResponseInterface
    */
    public function getVotes(string $issueIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetVotes($issueIdOrKey), $fetch);
    }
    /**
    * Adds the user's vote to an issue. This is the equivalent of the user clicking *Vote* on an issue in Jira.
    
    This operation requires the **Allow users to vote on issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AddVoteBadRequestException
    * @throws \JiraSdk\Exception\AddVoteUnauthorizedException
    * @throws \JiraSdk\Exception\AddVoteNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function addVote(string $issueIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddVote($issueIdOrKey), $fetch);
    }
    /**
    * Deletes a user as a watcher of an issue.
    
    This operation requires the **Allow users to watch issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  To remove users other than themselves from the watchlist, *Manage watcher list* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param array $queryParameters {
    *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. Required.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\RemoveWatcherBadRequestException
    * @throws \JiraSdk\Exception\RemoveWatcherUnauthorizedException
    * @throws \JiraSdk\Exception\RemoveWatcherForbiddenException
    * @throws \JiraSdk\Exception\RemoveWatcherNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function removeWatcher(string $issueIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveWatcher($issueIdOrKey, $queryParameters), $fetch);
    }
    /**
    * Returns the watchers for an issue.
    
    This operation requires the **Allow users to watch issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is ini
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  To see details of users on the watchlist other than themselves, *View voters and watchers* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueWatchersUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueWatchersNotFoundException
    *
    * @return null|\JiraSdk\Model\Watchers|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueWatchers(string $issueIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueWatchers($issueIdOrKey), $fetch);
    }
    /**
    * Adds a user as a watcher of an issue by passing the account ID of the user. For example, `"5b10ac8d82e05b22cc7d4ef5"`. If no user is specified the calling user is added.
    
    This operation requires the **Allow users to watch issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  To add users other than themselves to the watchlist, *Manage watcher list* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AddWatcherBadRequestException
    * @throws \JiraSdk\Exception\AddWatcherUnauthorizedException
    * @throws \JiraSdk\Exception\AddWatcherForbiddenException
    * @throws \JiraSdk\Exception\AddWatcherNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function addWatcher(string $issueIdOrKey, string $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddWatcher($issueIdOrKey, $requestBody), $fetch);
    }
    /**
    * Returns worklogs for an issue, starting from the oldest worklog or from the worklog started on or after a date and time.
    
    Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** Workloads are only returned where the user has:
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var int $startedAfter The worklog start date and time, as a UNIX timestamp in milliseconds, after which worklogs are returned.
    *     @var int $startedBefore The worklog start date and time, as a UNIX timestamp in milliseconds, before which worklogs are returned.
    *     @var string $expand Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts`properties`, which returns worklog properties.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueWorklogUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueWorklogNotFoundException
    *
    * @return null|\JiraSdk\Model\PageOfWorklogs|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueWorklog(string $issueIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueWorklog($issueIdOrKey, $queryParameters), $fetch);
    }
    /**
    * Adds a worklog to an issue.
    
    Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* and *Work on issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param string $issueIdOrKey The ID or key the issue.
    * @param \JiraSdk\Model\Worklog $requestBody 
    * @param array $queryParameters {
    *     @var bool $notifyUsers Whether users watching the issue are notified by email.
    *     @var string $adjustEstimate Defines how to update the issue's time estimate, the options are:
    
    *  `new` Sets the estimate to a specific value, defined in `newEstimate`.
    *  `leave` Leaves the estimate unchanged.
    *  `manual` Reduces the estimate by amount specified in `reduceBy`.
    *  `auto` Reduces the estimate by the value of `timeSpent` in the worklog.
    *     @var string $newEstimate The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `new`.
    *     @var string $reduceBy The amount to reduce the issue's remaining estimate by, as days (\#d), hours (\#h), or minutes (\#m). For example, *2d*. Required when `adjustEstimate` is `manual`.
    *     @var string $expand Use [expand](#expansion) to include additional information about work logs in the response. This parameter accepts `properties`, which returns worklog properties.
    *     @var bool $overrideEditableFlag Whether the worklog entry should be added to the issue even if the issue is not editable, because jira.issue.editable set to false or missing. For example, the issue is closed. Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) can use this flag.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AddWorklogBadRequestException
    * @throws \JiraSdk\Exception\AddWorklogUnauthorizedException
    * @throws \JiraSdk\Exception\AddWorklogNotFoundException
    *
    * @return null|\JiraSdk\Model\Worklog|\Psr\Http\Message\ResponseInterface
    */
    public function addWorklog(string $issueIdOrKey, \JiraSdk\Model\Worklog $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddWorklog($issueIdOrKey, $requestBody, $queryParameters), $fetch);
    }
    /**
    * Deletes a worklog from an issue.
    
    Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  *Delete all worklogs*[ project permission](https://confluence.atlassian.com/x/yodKLg) to delete any worklog or *Delete own worklogs* to delete worklogs created by the user,
    *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $id The ID of the worklog.
    * @param array $queryParameters {
    *     @var bool $notifyUsers Whether users watching the issue are notified by email.
    *     @var string $adjustEstimate Defines how to update the issue's time estimate, the options are:
    
    *  `new` Sets the estimate to a specific value, defined in `newEstimate`.
    *  `leave` Leaves the estimate unchanged.
    *  `manual` Increases the estimate by amount specified in `increaseBy`.
    *  `auto` Reduces the estimate by the value of `timeSpent` in the worklog.
    *     @var string $newEstimate The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `new`.
    *     @var string $increaseBy The amount to increase the issue's remaining estimate by, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `manual`.
    *     @var bool $overrideEditableFlag Whether the work log entry should be added to the issue even if the issue is not editable, because jira.issue.editable set to false or missing. For example, the issue is closed. Connect and Forge app users with admin permission can use this flag.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteWorklogBadRequestException
    * @throws \JiraSdk\Exception\DeleteWorklogUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteWorklogNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteWorklog(string $issueIdOrKey, string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteWorklog($issueIdOrKey, $id, $queryParameters), $fetch);
    }
    /**
    * Returns a worklog.
    
    Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $id The ID of the worklog.
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information about work logs in the response. This parameter accepts
    
    `properties`, which returns worklog properties.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetWorklogUnauthorizedException
    * @throws \JiraSdk\Exception\GetWorklogNotFoundException
    *
    * @return null|\JiraSdk\Model\Worklog|\Psr\Http\Message\ResponseInterface
    */
    public function getWorklog(string $issueIdOrKey, string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetWorklog($issueIdOrKey, $id, $queryParameters), $fetch);
    }
    /**
    * Updates a worklog.
    
    Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  *Edit all worklogs*[ project permission](https://confluence.atlassian.com/x/yodKLg) to update any worklog or *Edit own worklogs* to update worklogs created by the user.
    *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key the issue.
    * @param string $id The ID of the worklog.
    * @param \JiraSdk\Model\Worklog $requestBody 
    * @param array $queryParameters {
    *     @var bool $notifyUsers Whether users watching the issue are notified by email.
    *     @var string $adjustEstimate Defines how to update the issue's time estimate, the options are:
    
    *  `new` Sets the estimate to a specific value, defined in `newEstimate`.
    *  `leave` Leaves the estimate unchanged.
    *  `auto` Updates the estimate by the difference between the original and updated value of `timeSpent` or `timeSpentSeconds`.
    *     @var string $newEstimate The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `new`.
    *     @var string $expand Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts `properties`, which returns worklog properties.
    *     @var bool $overrideEditableFlag Whether the worklog should be added to the issue even if the issue is not editable. For example, because the issue is closed. Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) can use this flag.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateWorklogBadRequestException
    * @throws \JiraSdk\Exception\UpdateWorklogUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateWorklogNotFoundException
    *
    * @return null|\JiraSdk\Model\Worklog|\Psr\Http\Message\ResponseInterface
    */
    public function updateWorklog(string $issueIdOrKey, string $id, \JiraSdk\Model\Worklog $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateWorklog($issueIdOrKey, $id, $requestBody, $queryParameters), $fetch);
    }
    /**
    * Returns the keys of all properties for a worklog.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $worklogId The ID of the worklog.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetWorklogPropertyKeysBadRequestException
    * @throws \JiraSdk\Exception\GetWorklogPropertyKeysUnauthorizedException
    * @throws \JiraSdk\Exception\GetWorklogPropertyKeysNotFoundException
    *
    * @return null|\JiraSdk\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface
    */
    public function getWorklogPropertyKeys(string $issueIdOrKey, string $worklogId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetWorklogPropertyKeys($issueIdOrKey, $worklogId), $fetch);
    }
    /**
    * Deletes a worklog property.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $worklogId The ID of the worklog.
    * @param string $propertyKey The key of the property.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteWorklogPropertyBadRequestException
    * @throws \JiraSdk\Exception\DeleteWorklogPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteWorklogPropertyForbiddenException
    * @throws \JiraSdk\Exception\DeleteWorklogPropertyNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteWorklogProperty(string $issueIdOrKey, string $worklogId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteWorklogProperty($issueIdOrKey, $worklogId, $propertyKey), $fetch);
    }
    /**
    * Returns the value of a worklog property.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $worklogId The ID of the worklog.
    * @param string $propertyKey The key of the property.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetWorklogPropertyBadRequestException
    * @throws \JiraSdk\Exception\GetWorklogPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\GetWorklogPropertyNotFoundException
    *
    * @return null|\JiraSdk\Model\EntityProperty|\Psr\Http\Message\ResponseInterface
    */
    public function getWorklogProperty(string $issueIdOrKey, string $worklogId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetWorklogProperty($issueIdOrKey, $worklogId, $propertyKey), $fetch);
    }
    /**
    * Sets the value of a worklog property. Use this operation to store custom data against the worklog.
    
    The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  *Edit all worklogs*[ project permission](https://confluence.atlassian.com/x/yodKLg) to update any worklog or *Edit own worklogs* to update worklogs created by the user.
    *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param string $issueIdOrKey The ID or key of the issue.
    * @param string $worklogId The ID of the worklog.
    * @param string $propertyKey The key of the issue property. The maximum length is 255 characters.
    * @param mixed $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetWorklogPropertyBadRequestException
    * @throws \JiraSdk\Exception\SetWorklogPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\SetWorklogPropertyForbiddenException
    * @throws \JiraSdk\Exception\SetWorklogPropertyNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function setWorklogProperty(string $issueIdOrKey, string $worklogId, string $propertyKey, $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetWorklogProperty($issueIdOrKey, $worklogId, $propertyKey, $requestBody), $fetch);
    }
    /**
    * Creates a link between two issues. Use this operation to indicate a relationship between two issues and optionally add a comment to the from (outward) issue. To use this resource the site must have [Issue Linking](https://confluence.atlassian.com/x/yoXKM) enabled.
    
    This resource returns nothing on the creation of an issue link. To obtain the ID of the issue link, use `https://your-domain.atlassian.net/rest/api/3/issue/[linked issue key]?fields=issuelinks`.
    
    If the link request duplicates a link, the response indicates that the issue link was created. If the request included a comment, the comment is added.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse project* [project permission](https://confluence.atlassian.com/x/yodKLg) for all the projects containing the issues to be linked,
    *  *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) on the project containing the from (outward) issue,
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *  If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
    *
    * @param \JiraSdk\Model\LinkIssueRequestJsonBean $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\LinkIssuesBadRequestException
    * @throws \JiraSdk\Exception\LinkIssuesUnauthorizedException
    * @throws \JiraSdk\Exception\LinkIssuesNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function linkIssues(\JiraSdk\Model\LinkIssueRequestJsonBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\LinkIssues($requestBody), $fetch);
    }
    /**
    * Deletes an issue link.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  Browse project [project permission](https://confluence.atlassian.com/x/yodKLg) for all the projects containing the issues in the link.
    *  *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one of the projects containing issues in the link.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, permission to view both of the issues.
    *
    * @param string $linkId The ID of the issue link.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteIssueLinkBadRequestException
    * @throws \JiraSdk\Exception\DeleteIssueLinkUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteIssueLinkNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteIssueLink(string $linkId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteIssueLink($linkId), $fetch);
    }
    /**
    * Returns an issue link.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Browse project* [project permission](https://confluence.atlassian.com/x/yodKLg) for all the projects containing the linked issues.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, permission to view both of the issues.
    *
    * @param string $linkId The ID of the issue link.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueLinkBadRequestException
    * @throws \JiraSdk\Exception\GetIssueLinkUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueLinkNotFoundException
    *
    * @return null|\JiraSdk\Model\IssueLink|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueLink(string $linkId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueLink($linkId), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetIssueLinkTypesUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueLinkTypesNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueLinkTypes|\Psr\Http\Message\ResponseInterface
     */
    public function getIssueLinkTypes(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueLinkTypes(), $fetch);
    }
    /**
    * Creates an issue link type. Use this operation to create descriptions of the reasons why issues are linked. The issue link type consists of a name and descriptions for a link's inward and outward relationships.
    
    To use this operation, the site must have [issue linking](https://confluence.atlassian.com/x/yoXKM) enabled.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\IssueLinkType $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateIssueLinkTypeBadRequestException
    * @throws \JiraSdk\Exception\CreateIssueLinkTypeUnauthorizedException
    * @throws \JiraSdk\Exception\CreateIssueLinkTypeNotFoundException
    *
    * @return null|\JiraSdk\Model\IssueLinkType|\Psr\Http\Message\ResponseInterface
    */
    public function createIssueLinkType(\JiraSdk\Model\IssueLinkType $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateIssueLinkType($requestBody), $fetch);
    }
    /**
    * Deletes an issue link type.
    
    To use this operation, the site must have [issue linking](https://confluence.atlassian.com/x/yoXKM) enabled.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $issueLinkTypeId The ID of the issue link type.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteIssueLinkTypeBadRequestException
    * @throws \JiraSdk\Exception\DeleteIssueLinkTypeUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteIssueLinkTypeNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteIssueLinkType(string $issueLinkTypeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteIssueLinkType($issueLinkTypeId), $fetch);
    }
    /**
    * Returns an issue link type.
    
    To use this operation, the site must have [issue linking](https://confluence.atlassian.com/x/yoXKM) enabled.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for a project in the site.
    *
    * @param string $issueLinkTypeId The ID of the issue link type.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueLinkTypeBadRequestException
    * @throws \JiraSdk\Exception\GetIssueLinkTypeUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueLinkTypeNotFoundException
    *
    * @return null|\JiraSdk\Model\IssueLinkType|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueLinkType(string $issueLinkTypeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueLinkType($issueLinkTypeId), $fetch);
    }
    /**
    * Updates an issue link type.
    
    To use this operation, the site must have [issue linking](https://confluence.atlassian.com/x/yoXKM) enabled.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $issueLinkTypeId The ID of the issue link type.
    * @param \JiraSdk\Model\IssueLinkType $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateIssueLinkTypeBadRequestException
    * @throws \JiraSdk\Exception\UpdateIssueLinkTypeUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateIssueLinkTypeNotFoundException
    *
    * @return null|\JiraSdk\Model\IssueLinkType|\Psr\Http\Message\ResponseInterface
    */
    public function updateIssueLinkType(string $issueLinkTypeId, \JiraSdk\Model\IssueLinkType $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateIssueLinkType($issueLinkTypeId, $requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetIssueSecuritySchemesUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueSecuritySchemesForbiddenException
     *
     * @return null|\JiraSdk\Model\SecuritySchemes|\Psr\Http\Message\ResponseInterface
     */
    public function getIssueSecuritySchemes(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueSecuritySchemes(), $fetch);
    }
    /**
     * Returns an issue security scheme along with its security levels.
     **[Permissions](#permissions) required:**
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for a project that uses the requested issue security scheme.
     *
     * @param int $id The ID of the issue security scheme. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) operation to get a list of issue security scheme IDs.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetIssueSecuritySchemeUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueSecuritySchemeForbiddenException
     *
     * @return null|\JiraSdk\Model\SecurityScheme|\Psr\Http\Message\ResponseInterface
     */
    public function getIssueSecurityScheme(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueSecurityScheme($id), $fetch);
    }
    /**
    * Returns issue security level members.
    
    Only issue security level members in context of classic projects are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $issueSecuritySchemeId The ID of the issue security scheme. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) operation to get a list of issue security scheme IDs.
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $issueSecurityLevelId The list of issue security level IDs. To include multiple issue security levels separate IDs with ampersand: `issueSecurityLevelId=10000&issueSecurityLevelId=10001`.
    *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `all` Returns all expandable information.
    *  `field` Returns information about the custom field granted the permission.
    *  `group` Returns information about the group that is granted the permission.
    *  `projectRole` Returns information about the project role granted the permission.
    *  `user` Returns information about the user who is granted the permission.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueSecurityLevelMembersBadRequestException
    * @throws \JiraSdk\Exception\GetIssueSecurityLevelMembersUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueSecurityLevelMembersForbiddenException
    * @throws \JiraSdk\Exception\GetIssueSecurityLevelMembersNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanIssueSecurityLevelMember|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueSecurityLevelMembers(int $issueSecuritySchemeId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueSecurityLevelMembers($issueSecuritySchemeId, $queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetIssueAllTypesUnauthorizedException
     *
     * @return null|\JiraSdk\Model\IssueTypeDetails[]|\Psr\Http\Message\ResponseInterface
     */
    public function getIssueAllTypes(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueAllTypes(), $fetch);
    }
    /**
     * Creates an issue type and adds it to the default issue type scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\IssueTypeCreateBean $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateIssueTypeBadRequestException
     * @throws \JiraSdk\Exception\CreateIssueTypeUnauthorizedException
     * @throws \JiraSdk\Exception\CreateIssueTypeForbiddenException
     * @throws \JiraSdk\Exception\CreateIssueTypeConflictException
     *
     * @return null|\JiraSdk\Model\IssueTypeDetails|\Psr\Http\Message\ResponseInterface
     */
    public function createIssueType(\JiraSdk\Model\IssueTypeCreateBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateIssueType($requestBody), $fetch);
    }
    /**
    * Returns issue types for a project.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) in the relevant project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $projectId The ID of the project.
    *     @var int $level The level of the issue type to filter by. Use:
    
    *  `-1` for Subtask.
    *  `0` for Base.
    *  `1` for Epic.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueTypesForProjectBadRequestException
    * @throws \JiraSdk\Exception\GetIssueTypesForProjectUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueTypesForProjectNotFoundException
    *
    * @return null|\JiraSdk\Model\IssueTypeDetails[]|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueTypesForProject(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueTypesForProject($queryParameters), $fetch);
    }
    /**
     * Deletes the issue type. If the issue type is in use, all uses are updated with the alternative issue type (`alternativeIssueTypeId`). A list of alternative issue types are obtained from the [Get alternative issue types](#api-rest-api-3-issuetype-id-alternatives-get) resource.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id The ID of the issue type.
     * @param array $queryParameters {
     *     @var string $alternativeIssueTypeId The ID of the replacement issue type.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteIssueTypeBadRequestException
     * @throws \JiraSdk\Exception\DeleteIssueTypeUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteIssueTypeForbiddenException
     * @throws \JiraSdk\Exception\DeleteIssueTypeNotFoundException
     * @throws \JiraSdk\Exception\DeleteIssueTypeConflictException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteIssueType(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteIssueType($id, $queryParameters), $fetch);
    }
    /**
    * Returns an issue type.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) in a project the issue type is associated with or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $id The ID of the issue type.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueTypeBadRequestException
    * @throws \JiraSdk\Exception\GetIssueTypeUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueTypeNotFoundException
    *
    * @return null|\JiraSdk\Model\IssueTypeDetails|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueType(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueType($id), $fetch);
    }
    /**
     * Updates the issue type.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id The ID of the issue type.
     * @param \JiraSdk\Model\IssueTypeUpdateBean $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateIssueTypeBadRequestException
     * @throws \JiraSdk\Exception\UpdateIssueTypeUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateIssueTypeForbiddenException
     * @throws \JiraSdk\Exception\UpdateIssueTypeNotFoundException
     * @throws \JiraSdk\Exception\UpdateIssueTypeConflictException
     *
     * @return null|\JiraSdk\Model\IssueTypeDetails|\Psr\Http\Message\ResponseInterface
     */
    public function updateIssueType(string $id, \JiraSdk\Model\IssueTypeUpdateBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateIssueType($id, $requestBody), $fetch);
    }
    /**
    * Returns a list of issue types that can be used to replace the issue type. The alternative issue types are those assigned to the same workflow scheme, field configuration scheme, and screen scheme.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param string $id The ID of the issue type.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAlternativeIssueTypesUnauthorizedException
    * @throws \JiraSdk\Exception\GetAlternativeIssueTypesNotFoundException
    *
    * @return null|\JiraSdk\Model\IssueTypeDetails[]|\Psr\Http\Message\ResponseInterface
    */
    public function getAlternativeIssueTypes(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAlternativeIssueTypes($id), $fetch);
    }
    /**
    * Loads an avatar for the issue type.
    
    Specify the avatar's local file location in the body of the request. Also, include the following headers:
    
    *  `X-Atlassian-Token: no-check` To prevent XSRF protection blocking the request, for more information see [Special Headers](#special-request-headers).
    *  `Content-Type: image/image type` Valid image types are JPEG, GIF, or PNG.
    
    For example:  
    `curl --request POST \ --user email@example.com:<api_token> \ --header 'X-Atlassian-Token: no-check' \ --header 'Content-Type: image/< image_type>' \ --data-binary "<@/path/to/file/with/your/avatar>" \ --url 'https://your-domain.atlassian.net/rest/api/3/issuetype/{issueTypeId}'This`
    
    The avatar is cropped to a square. If no crop parameters are specified, the square originates at the top left of the image. The length of the square's sides is set to the smaller of the height or width of the image.
    
    The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size.
    
    After creating the avatar, use [ Update issue type](#api-rest-api-3-issuetype-id-put) to set it as the issue type's displayed avatar.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $id The ID of the issue type.
    * @param mixed $requestBody 
    * @param array $queryParameters {
    *     @var int $x The X coordinate of the top-left corner of the crop region.
    *     @var int $y The Y coordinate of the top-left corner of the crop region.
    *     @var int $size The length of each side of the crop region.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateIssueTypeAvatarBadRequestException
    * @throws \JiraSdk\Exception\CreateIssueTypeAvatarUnauthorizedException
    * @throws \JiraSdk\Exception\CreateIssueTypeAvatarForbiddenException
    * @throws \JiraSdk\Exception\CreateIssueTypeAvatarNotFoundException
    *
    * @return null|\JiraSdk\Model\Avatar|\Psr\Http\Message\ResponseInterface
    */
    public function createIssueTypeAvatar(string $id, $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateIssueTypeAvatar($id, $requestBody, $queryParameters), $fetch);
    }
    /**
    * Returns all the [issue type property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties) keys of the issue type.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) to get the property keys of any issue type.
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) to get the property keys of any issue types associated with the projects the user has permission to browse.
    *
    * @param string $issueTypeId The ID of the issue type.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueTypePropertyKeysBadRequestException
    * @throws \JiraSdk\Exception\GetIssueTypePropertyKeysNotFoundException
    *
    * @return null|\JiraSdk\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueTypePropertyKeys(string $issueTypeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueTypePropertyKeys($issueTypeId), $fetch);
    }
    /**
     * Deletes the [issue type property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueTypeId The ID of the issue type.
     * @param string $propertyKey The key of the property. Use [Get issue type property keys](#api-rest-api-3-issuetype-issueTypeId-properties-get) to get a list of all issue type property keys.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteIssueTypePropertyBadRequestException
     * @throws \JiraSdk\Exception\DeleteIssueTypePropertyUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteIssueTypePropertyForbiddenException
     * @throws \JiraSdk\Exception\DeleteIssueTypePropertyNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteIssueTypeProperty(string $issueTypeId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteIssueTypeProperty($issueTypeId, $propertyKey), $fetch);
    }
    /**
    * Returns the key and value of the [issue type property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) to get the details of any issue type.
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) to get the details of any issue types associated with the projects the user has permission to browse.
    *
    * @param string $issueTypeId The ID of the issue type.
    * @param string $propertyKey The key of the property. Use [Get issue type property keys](#api-rest-api-3-issuetype-issueTypeId-properties-get) to get a list of all issue type property keys.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueTypePropertyBadRequestException
    * @throws \JiraSdk\Exception\GetIssueTypePropertyUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueTypePropertyNotFoundException
    *
    * @return null|\JiraSdk\Model\EntityProperty|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueTypeProperty(string $issueTypeId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueTypeProperty($issueTypeId, $propertyKey), $fetch);
    }
    /**
    * Creates or updates the value of the [issue type property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties). Use this resource to store and update data against an issue type.
    
    The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $issueTypeId The ID of the issue type.
    * @param string $propertyKey The key of the issue type property. The maximum length is 255 characters.
    * @param mixed $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetIssueTypePropertyBadRequestException
    * @throws \JiraSdk\Exception\SetIssueTypePropertyUnauthorizedException
    * @throws \JiraSdk\Exception\SetIssueTypePropertyForbiddenException
    * @throws \JiraSdk\Exception\SetIssueTypePropertyNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function setIssueTypeProperty(string $issueTypeId, string $propertyKey, $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetIssueTypeProperty($issueTypeId, $propertyKey, $requestBody), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of issue type schemes.
    
    Only issue type schemes used in classic projects are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $id The list of issue type schemes IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
    *     @var string $orderBy [Order](#ordering) the results by a field:
    
    *  `name` Sorts by issue type scheme name.
    *  `id` Sorts by issue type scheme ID.
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `projects` For each issue type schemes, returns information about the projects the issue type scheme is assigned to.
    *  `issueTypes` For each issue type schemes, returns information about the issueTypes the issue type scheme have.
    *     @var string $queryString String used to perform a case-insensitive partial match with issue type scheme name.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAllIssueTypeSchemesBadRequestException
    * @throws \JiraSdk\Exception\GetAllIssueTypeSchemesUnauthorizedException
    * @throws \JiraSdk\Exception\GetAllIssueTypeSchemesForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanIssueTypeScheme|\Psr\Http\Message\ResponseInterface
    */
    public function getAllIssueTypeSchemes(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllIssueTypeSchemes($queryParameters), $fetch);
    }
    /**
     * Creates an issue type scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\IssueTypeSchemeDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateIssueTypeSchemeBadRequestException
     * @throws \JiraSdk\Exception\CreateIssueTypeSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\CreateIssueTypeSchemeForbiddenException
     * @throws \JiraSdk\Exception\CreateIssueTypeSchemeConflictException
     *
     * @return null|\JiraSdk\Model\IssueTypeSchemeID|\Psr\Http\Message\ResponseInterface
     */
    public function createIssueTypeScheme(\JiraSdk\Model\IssueTypeSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateIssueTypeScheme($requestBody), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of issue type scheme items.
    
    Only issue type scheme items used in classic projects are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $issueTypeSchemeId The list of issue type scheme IDs. To include multiple IDs, provide an ampersand-separated list. For example, `issueTypeSchemeId=10000&issueTypeSchemeId=10001`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueTypeSchemesMappingBadRequestException
    * @throws \JiraSdk\Exception\GetIssueTypeSchemesMappingUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueTypeSchemesMappingForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanIssueTypeSchemeMapping|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueTypeSchemesMapping(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueTypeSchemesMapping($queryParameters), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of issue type schemes and, for each issue type scheme, a list of the projects that use it.
    
    Only issue type schemes used in classic projects are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $projectId The list of project IDs. To include multiple project IDs, provide an ampersand-separated list. For example, `projectId=10000&projectId=10001`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueTypeSchemeForProjectsBadRequestException
    * @throws \JiraSdk\Exception\GetIssueTypeSchemeForProjectsUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueTypeSchemeForProjectsForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanIssueTypeSchemeProjects|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueTypeSchemeForProjects(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueTypeSchemeForProjects($queryParameters), $fetch);
    }
    /**
    * Assigns an issue type scheme to a project.
    
    If any issues in the project are assigned issue types not present in the new scheme, the operation will fail. To complete the assignment those issues must be updated to use issue types in the new scheme.
    
    Issue type schemes can only be assigned to classic projects.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\IssueTypeSchemeProjectAssociation $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AssignIssueTypeSchemeToProjectBadRequestException
    * @throws \JiraSdk\Exception\AssignIssueTypeSchemeToProjectUnauthorizedException
    * @throws \JiraSdk\Exception\AssignIssueTypeSchemeToProjectForbiddenException
    * @throws \JiraSdk\Exception\AssignIssueTypeSchemeToProjectNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function assignIssueTypeSchemeToProject(\JiraSdk\Model\IssueTypeSchemeProjectAssociation $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AssignIssueTypeSchemeToProject($requestBody), $fetch);
    }
    /**
    * Deletes an issue type scheme.
    
    Only issue type schemes used in classic projects can be deleted.
    
    Any projects assigned to the scheme are reassigned to the default issue type scheme.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $issueTypeSchemeId The ID of the issue type scheme.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteIssueTypeSchemeBadRequestException
    * @throws \JiraSdk\Exception\DeleteIssueTypeSchemeUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteIssueTypeSchemeForbiddenException
    * @throws \JiraSdk\Exception\DeleteIssueTypeSchemeNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteIssueTypeScheme(int $issueTypeSchemeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteIssueTypeScheme($issueTypeSchemeId), $fetch);
    }
    /**
     * Updates an issue type scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $issueTypeSchemeId The ID of the issue type scheme.
     * @param \JiraSdk\Model\IssueTypeSchemeUpdateDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateIssueTypeSchemeBadRequestException
     * @throws \JiraSdk\Exception\UpdateIssueTypeSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateIssueTypeSchemeForbiddenException
     * @throws \JiraSdk\Exception\UpdateIssueTypeSchemeNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function updateIssueTypeScheme(int $issueTypeSchemeId, \JiraSdk\Model\IssueTypeSchemeUpdateDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateIssueTypeScheme($issueTypeSchemeId, $requestBody), $fetch);
    }
    /**
    * Adds issue types to an issue type scheme.
    
    The added issue types are appended to the issue types list.
    
    If any of the issue types exist in the issue type scheme, the operation fails and no issue types are added.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $issueTypeSchemeId The ID of the issue type scheme.
    * @param \JiraSdk\Model\IssueTypeIds $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AddIssueTypesToIssueTypeSchemeBadRequestException
    * @throws \JiraSdk\Exception\AddIssueTypesToIssueTypeSchemeUnauthorizedException
    * @throws \JiraSdk\Exception\AddIssueTypesToIssueTypeSchemeForbiddenException
    * @throws \JiraSdk\Exception\AddIssueTypesToIssueTypeSchemeNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function addIssueTypesToIssueTypeScheme(int $issueTypeSchemeId, \JiraSdk\Model\IssueTypeIds $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddIssueTypesToIssueTypeScheme($issueTypeSchemeId, $requestBody), $fetch);
    }
    /**
    * Changes the order of issue types in an issue type scheme.
    
    The request body parameters must meet the following requirements:
    
    *  all of the issue types must belong to the issue type scheme.
    *  either `after` or `position` must be provided.
    *  the issue type in `after` must not be in the issue type list.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $issueTypeSchemeId The ID of the issue type scheme.
    * @param \JiraSdk\Model\OrderOfIssueTypes $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\ReorderIssueTypesInIssueTypeSchemeBadRequestException
    * @throws \JiraSdk\Exception\ReorderIssueTypesInIssueTypeSchemeUnauthorizedException
    * @throws \JiraSdk\Exception\ReorderIssueTypesInIssueTypeSchemeForbiddenException
    * @throws \JiraSdk\Exception\ReorderIssueTypesInIssueTypeSchemeNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function reorderIssueTypesInIssueTypeScheme(int $issueTypeSchemeId, \JiraSdk\Model\OrderOfIssueTypes $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\ReorderIssueTypesInIssueTypeScheme($issueTypeSchemeId, $requestBody), $fetch);
    }
    /**
    * Removes an issue type from an issue type scheme.
    
    This operation cannot remove:
    
    *  any issue type used by issues.
    *  any issue types from the default issue type scheme.
    *  the last standard issue type from an issue type scheme.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $issueTypeSchemeId The ID of the issue type scheme.
    * @param int $issueTypeId The ID of the issue type.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\RemoveIssueTypeFromIssueTypeSchemeBadRequestException
    * @throws \JiraSdk\Exception\RemoveIssueTypeFromIssueTypeSchemeUnauthorizedException
    * @throws \JiraSdk\Exception\RemoveIssueTypeFromIssueTypeSchemeForbiddenException
    * @throws \JiraSdk\Exception\RemoveIssueTypeFromIssueTypeSchemeNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function removeIssueTypeFromIssueTypeScheme(int $issueTypeSchemeId, int $issueTypeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveIssueTypeFromIssueTypeScheme($issueTypeSchemeId, $issueTypeId), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of issue type screen schemes.
    
    Only issue type screen schemes used in classic projects are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $id The list of issue type screen scheme IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
    *     @var string $queryString String used to perform a case-insensitive partial match with issue type screen scheme name.
    *     @var string $orderBy [Order](#ordering) the results by a field:
    
    *  `name` Sorts by issue type screen scheme name.
    *  `id` Sorts by issue type screen scheme ID.
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts `projects` that, for each issue type screen schemes, returns information about the projects the issue type screen scheme is assigned to.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueTypeScreenSchemesBadRequestException
    * @throws \JiraSdk\Exception\GetIssueTypeScreenSchemesUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueTypeScreenSchemesForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanIssueTypeScreenScheme|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueTypeScreenSchemes(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueTypeScreenSchemes($queryParameters), $fetch);
    }
    /**
     * Creates an issue type screen scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\IssueTypeScreenSchemeDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Exception\CreateIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\CreateIssueTypeScreenSchemeForbiddenException
     * @throws \JiraSdk\Exception\CreateIssueTypeScreenSchemeNotFoundException
     * @throws \JiraSdk\Exception\CreateIssueTypeScreenSchemeConflictException
     *
     * @return null|\JiraSdk\Model\IssueTypeScreenSchemeId|\Psr\Http\Message\ResponseInterface
     */
    public function createIssueTypeScreenScheme(\JiraSdk\Model\IssueTypeScreenSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateIssueTypeScreenScheme($requestBody), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of issue type screen scheme items.
    
    Only issue type screen schemes used in classic projects are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $issueTypeScreenSchemeId The list of issue type screen scheme IDs. To include multiple issue type screen schemes, separate IDs with ampersand: `issueTypeScreenSchemeId=10000&issueTypeScreenSchemeId=10001`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueTypeScreenSchemeMappingsBadRequestException
    * @throws \JiraSdk\Exception\GetIssueTypeScreenSchemeMappingsUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueTypeScreenSchemeMappingsForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanIssueTypeScreenSchemeItem|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueTypeScreenSchemeMappings(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueTypeScreenSchemeMappings($queryParameters), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of issue type screen schemes and, for each issue type screen scheme, a list of the projects that use it.
    
    Only issue type screen schemes used in classic projects are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $projectId The list of project IDs. To include multiple projects, separate IDs with ampersand: `projectId=10000&projectId=10001`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueTypeScreenSchemeProjectAssociationsBadRequestException
    * @throws \JiraSdk\Exception\GetIssueTypeScreenSchemeProjectAssociationsUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueTypeScreenSchemeProjectAssociationsForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanIssueTypeScreenSchemesProjects|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueTypeScreenSchemeProjectAssociations(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueTypeScreenSchemeProjectAssociations($queryParameters), $fetch);
    }
    /**
    * Assigns an issue type screen scheme to a project.
    
    Issue type screen schemes can only be assigned to classic projects.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\IssueTypeScreenSchemeProjectAssociation $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AssignIssueTypeScreenSchemeToProjectBadRequestException
    * @throws \JiraSdk\Exception\AssignIssueTypeScreenSchemeToProjectUnauthorizedException
    * @throws \JiraSdk\Exception\AssignIssueTypeScreenSchemeToProjectForbiddenException
    * @throws \JiraSdk\Exception\AssignIssueTypeScreenSchemeToProjectNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function assignIssueTypeScreenSchemeToProject(\JiraSdk\Model\IssueTypeScreenSchemeProjectAssociation $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AssignIssueTypeScreenSchemeToProject($requestBody), $fetch);
    }
    /**
     * Deletes an issue type screen scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueTypeScreenSchemeId The ID of the issue type screen scheme.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Exception\DeleteIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteIssueTypeScreenSchemeForbiddenException
     * @throws \JiraSdk\Exception\DeleteIssueTypeScreenSchemeNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteIssueTypeScreenScheme(string $issueTypeScreenSchemeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteIssueTypeScreenScheme($issueTypeScreenSchemeId), $fetch);
    }
    /**
     * Updates an issue type screen scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueTypeScreenSchemeId The ID of the issue type screen scheme.
     * @param \JiraSdk\Model\IssueTypeScreenSchemeUpdateDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Exception\UpdateIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateIssueTypeScreenSchemeForbiddenException
     * @throws \JiraSdk\Exception\UpdateIssueTypeScreenSchemeNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function updateIssueTypeScreenScheme(string $issueTypeScreenSchemeId, \JiraSdk\Model\IssueTypeScreenSchemeUpdateDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateIssueTypeScreenScheme($issueTypeScreenSchemeId, $requestBody), $fetch);
    }
    /**
     * Appends issue type to screen scheme mappings to an issue type screen scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueTypeScreenSchemeId The ID of the issue type screen scheme.
     * @param \JiraSdk\Model\IssueTypeScreenSchemeMappingDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\AppendMappingsForIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Exception\AppendMappingsForIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\AppendMappingsForIssueTypeScreenSchemeForbiddenException
     * @throws \JiraSdk\Exception\AppendMappingsForIssueTypeScreenSchemeNotFoundException
     * @throws \JiraSdk\Exception\AppendMappingsForIssueTypeScreenSchemeConflictException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function appendMappingsForIssueTypeScreenScheme(string $issueTypeScreenSchemeId, \JiraSdk\Model\IssueTypeScreenSchemeMappingDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AppendMappingsForIssueTypeScreenScheme($issueTypeScreenSchemeId, $requestBody), $fetch);
    }
    /**
     * Updates the default screen scheme of an issue type screen scheme. The default screen scheme is used for all unmapped issue types.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueTypeScreenSchemeId The ID of the issue type screen scheme.
     * @param \JiraSdk\Model\UpdateDefaultScreenScheme $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateDefaultScreenSchemeBadRequestException
     * @throws \JiraSdk\Exception\UpdateDefaultScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateDefaultScreenSchemeForbiddenException
     * @throws \JiraSdk\Exception\UpdateDefaultScreenSchemeNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function updateDefaultScreenScheme(string $issueTypeScreenSchemeId, \JiraSdk\Model\UpdateDefaultScreenScheme $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateDefaultScreenScheme($issueTypeScreenSchemeId, $requestBody), $fetch);
    }
    /**
     * Removes issue type to screen scheme mappings from an issue type screen scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueTypeScreenSchemeId The ID of the issue type screen scheme.
     * @param \JiraSdk\Model\IssueTypeIds $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\RemoveMappingsFromIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Exception\RemoveMappingsFromIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\RemoveMappingsFromIssueTypeScreenSchemeForbiddenException
     * @throws \JiraSdk\Exception\RemoveMappingsFromIssueTypeScreenSchemeNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function removeMappingsFromIssueTypeScreenScheme(string $issueTypeScreenSchemeId, \JiraSdk\Model\IssueTypeIds $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveMappingsFromIssueTypeScreenScheme($issueTypeScreenSchemeId, $requestBody), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of projects associated with an issue type screen scheme.
    
    Only company-managed projects associated with an issue type screen scheme are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $issueTypeScreenSchemeId The ID of the issue type screen scheme.
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var string $query 
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetProjectsForIssueTypeScreenSchemeBadRequestException
    * @throws \JiraSdk\Exception\GetProjectsForIssueTypeScreenSchemeUnauthorizedException
    * @throws \JiraSdk\Exception\GetProjectsForIssueTypeScreenSchemeForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanProjectDetails|\Psr\Http\Message\ResponseInterface
    */
    public function getProjectsForIssueTypeScreenScheme(int $issueTypeScreenSchemeId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectsForIssueTypeScreenScheme($issueTypeScreenSchemeId, $queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAutoCompleteUnauthorizedException
     *
     * @return null|\JiraSdk\Model\JQLReferenceData|\Psr\Http\Message\ResponseInterface
     */
    public function getAutoComplete(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAutoComplete(), $fetch);
    }
    /**
    * Returns reference data for JQL searches. This is a downloadable version of the documentation provided in [Advanced searching - fields reference](https://confluence.atlassian.com/x/gwORLQ) and [Advanced searching - functions reference](https://confluence.atlassian.com/x/hgORLQ), along with a list of JQL-reserved words. Use this information to assist with the programmatic creation of JQL queries or the validation of queries built in a custom query builder.
    
    This operation can filter the custom fields returned by project. Invalid project IDs in `projectIds` are ignored. System fields are always returned.
    
    It can also return the collapsed field for custom fields. Collapsed fields enable searches to be performed across all fields with the same name and of the same field type. For example, the collapsed field `Component - Component[Dropdown]` enables dropdown fields `Component - cf[10061]` and `Component - cf[10062]` to be searched simultaneously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param \JiraSdk\Model\SearchAutoCompleteFilter $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAutoCompletePostBadRequestException
    * @throws \JiraSdk\Exception\GetAutoCompletePostUnauthorizedException
    *
    * @return null|\JiraSdk\Model\JQLReferenceData|\Psr\Http\Message\ResponseInterface
    */
    public function getAutoCompletePost(\JiraSdk\Model\SearchAutoCompleteFilter $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAutoCompletePost($requestBody), $fetch);
    }
    /**
    * Returns the JQL search auto complete suggestions for a field.
    
    Suggestions can be obtained by providing:
    
    *  `fieldName` to get a list of all values for the field.
    *  `fieldName` and `fieldValue` to get a list of values containing the text in `fieldValue`.
    *  `fieldName` and `predicateName` to get a list of all predicate values for the field.
    *  `fieldName`, `predicateName`, and `predicateValue` to get a list of predicate values containing the text in `predicateValue`.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param array $queryParameters {
    *     @var string $fieldName The name of the field.
    *     @var string $fieldValue The partial field item name entered by the user.
    *     @var string $predicateName The name of the [ CHANGED operator predicate](https://confluence.atlassian.com/x/hQORLQ#Advancedsearching-operatorsreference-CHANGEDCHANGED) for which the suggestions are generated. The valid predicate operators are *by*, *from*, and *to*.
    *     @var string $predicateValue The partial predicate item name entered by the user.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetFieldAutoCompleteForQueryStringBadRequestException
    * @throws \JiraSdk\Exception\GetFieldAutoCompleteForQueryStringUnauthorizedException
    *
    * @return null|\JiraSdk\Model\AutoCompleteSuggestions|\Psr\Http\Message\ResponseInterface
    */
    public function getFieldAutoCompleteForQueryString(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetFieldAutoCompleteForQueryString($queryParameters), $fetch);
    }
    /**
     * Checks whether one or more issues would be returned by one or more JQL queries.
     **[Permissions](#permissions) required:** None, however, issues are only matched against JQL queries where the user has:
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param \JiraSdk\Model\IssuesAndJQLQueries $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\MatchIssuesBadRequestException
     *
     * @return null|\JiraSdk\Model\IssueMatches|\Psr\Http\Message\ResponseInterface
     */
    public function matchIssues(\JiraSdk\Model\IssuesAndJQLQueries $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\MatchIssues($requestBody), $fetch);
    }
    /**
    * Parses and validates JQL queries.
    
    Validation is performed in context of the current user.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param \JiraSdk\Model\JqlQueriesToParse $requestBody 
    * @param array $queryParameters {
    *     @var string $validation How to validate the JQL query and treat the validation results. Validation options include:
    
    *  `strict` Returns all errors. If validation fails, the query structure is not returned.
    *  `warn` Returns all errors. If validation fails but the JQL query is correctly formed, the query structure is returned.
    *  `none` No validation is performed. If JQL query is correctly formed, the query structure is returned.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\ParseJqlQueriesBadRequestException
    * @throws \JiraSdk\Exception\ParseJqlQueriesUnauthorizedException
    *
    * @return null|\JiraSdk\Model\ParsedJqlQueries|\Psr\Http\Message\ResponseInterface
    */
    public function parseJqlQueries(\JiraSdk\Model\JqlQueriesToParse $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\ParseJqlQueries($requestBody, $queryParameters), $fetch);
    }
    /**
    * Converts one or more JQL queries with user identifiers (username or user key) to equivalent JQL queries with account IDs.
    
    You may wish to use this operation if your system stores JQL queries and you want to make them GDPR-compliant. For more information about GDPR-related changes, see the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/).
    
    **[Permissions](#permissions) required:** Permission to access Jira.
    *
    * @param \JiraSdk\Model\JQLPersonalDataMigrationRequest $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\MigrateQueriesBadRequestException
    * @throws \JiraSdk\Exception\MigrateQueriesUnauthorizedException
    *
    * @return null|\JiraSdk\Model\ConvertedJQLQueries|\Psr\Http\Message\ResponseInterface
    */
    public function migrateQueries(\JiraSdk\Model\JQLPersonalDataMigrationRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\MigrateQueries($requestBody), $fetch);
    }
    /**
    * Sanitizes one or more JQL queries by converting readable details into IDs where a user doesn't have permission to view the entity.
    
    For example, if the query contains the clause *project = 'Secret project'*, and a user does not have browse permission for the project "Secret project", the sanitized query replaces the clause with *project = 12345"* (where 12345 is the ID of the project). If a user has the required permission, the clause is not sanitized. If the account ID is null, sanitizing is performed for an anonymous user.
    
    Note that sanitization doesn't make the queries GDPR-compliant, because it doesn't remove user identifiers (username or user key). If you need to make queries GDPR-compliant, use [Convert user identifiers to account IDs in JQL queries](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jql/#api-rest-api-3-jql-sanitize-post).
    
    Before sanitization each JQL query is parsed. The queries are returned in the same order that they were passed.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\JqlQueriesToSanitize $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SanitiseJqlQueriesBadRequestException
    * @throws \JiraSdk\Exception\SanitiseJqlQueriesUnauthorizedException
    * @throws \JiraSdk\Exception\SanitiseJqlQueriesForbiddenException
    *
    * @return null|\JiraSdk\Model\SanitizedJqlQueries|\Psr\Http\Message\ResponseInterface
    */
    public function sanitiseJqlQueries(\JiraSdk\Model\JqlQueriesToSanitize $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SanitiseJqlQueries($requestBody), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) list of labels.
     *
     * @param array $queryParameters {
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return null|\JiraSdk\Model\PageBeanString|\Psr\Http\Message\ResponseInterface
     */
    public function getAllLabels(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllLabels($queryParameters), $fetch);
    }
    /**
    * Returns a list of permissions indicating which permissions the user has. Details of the user's permissions can be obtained in a global, project, issue or comment context.
    
    The user is reported as having a project permission:
    
    *  in the global context, if the user has the project permission in any project.
    *  for a project, where the project permission is determined using issue data, if the user meets the permission's criteria for any issue in the project. Otherwise, if the user has the project permission in the project.
    *  for an issue, where a project permission is determined using issue data, if the user has the permission in the issue. Otherwise, if the user has the project permission in the project containing the issue.
    *  for a comment, where the user has both the permission to browse the comment and the project permission for the comment's parent issue. Only the BROWSE\_PROJECTS permission is supported. If a `commentId` is provided whose `permissions` does not equal BROWSE\_PROJECTS, a 400 error will be returned.
    
    This means that users may be shown as having an issue permission (such as EDIT\_ISSUES) in the global context or a project context but may not have the permission for any or all issues. For example, if Reporters have the EDIT\_ISSUES permission a user would be shown as having this permission in the global context or the context of a project, because any user can be a reporter. However, if they are not the user who reported the issue queried they would not have EDIT\_ISSUES permission for that issue.
    
    Global permissions are unaffected by context.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param array $queryParameters {
    *     @var string $projectKey The key of project. Ignored if `projectId` is provided.
    *     @var string $projectId The ID of project.
    *     @var string $issueKey The key of the issue. Ignored if `issueId` is provided.
    *     @var string $issueId The ID of the issue.
    *     @var string $permissions A list of permission keys. (Required) This parameter accepts a comma-separated list. To get the list of available permissions, use [Get all permissions](#api-rest-api-3-permissions-get).
    *     @var string $projectUuid 
    *     @var string $projectConfigurationUuid 
    *     @var string $commentId The ID of the comment.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetMyPermissionsBadRequestException
    * @throws \JiraSdk\Exception\GetMyPermissionsUnauthorizedException
    * @throws \JiraSdk\Exception\GetMyPermissionsNotFoundException
    *
    * @return null|\JiraSdk\Model\Permissions|\Psr\Http\Message\ResponseInterface
    */
    public function getMyPermissions(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetMyPermissions($queryParameters), $fetch);
    }
    /**
    * Deletes a preference of the user, which restores the default value of system defined settings.
    
    Note that these keys are deprecated:
    
    *  *jira.user.locale* The locale of the user. By default, not set. The user takes the instance locale.
    *  *jira.user.timezone* The time zone of the user. By default, not set. The user takes the instance timezone.
    
    Use [ Update a user profile](https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch) from the user management REST API to manage timezone and locale instead.
    
    **[Permissions](#permissions) required:** Permission to access Jira.
    *
    * @param array $queryParameters {
    *     @var string $key The key of the preference.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\RemovePreferenceUnauthorizedException
    * @throws \JiraSdk\Exception\RemovePreferenceNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function removePreference(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemovePreference($queryParameters), $fetch);
    }
    /**
    * Returns the value of a preference of the current user.
    
    Note that these keys are deprecated:
    
    *  *jira.user.locale* The locale of the user. By default this is not set and the user takes the locale of the instance.
    *  *jira.user.timezone* The time zone of the user. By default this is not set and the user takes the timezone of the instance.
    
    Use [ Update a user profile](https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch) from the user management REST API to manage timezone and locale instead.
    
    **[Permissions](#permissions) required:** Permission to access Jira.
    *
    * @param array $queryParameters {
    *     @var string $key The key of the preference.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetPreferenceUnauthorizedException
    * @throws \JiraSdk\Exception\GetPreferenceNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function getPreference(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetPreference($queryParameters), $fetch);
    }
    /**
    * Creates a preference for the user or updates a preference's value by sending a plain text string. For example, `false`. An arbitrary preference can be created with the value containing up to 255 characters. In addition, the following keys define system preferences that can be set or created:
    
    *  *user.notifications.mimetype* The mime type used in notifications sent to the user. Defaults to `html`.
    *  *user.notify.own.changes* Whether the user gets notified of their own changes. Defaults to `false`.
    *  *user.default.share.private* Whether new [ filters](https://confluence.atlassian.com/x/eQiiLQ) are set to private. Defaults to `true`.
    *  *user.keyboard.shortcuts.disabled* Whether keyboard shortcuts are disabled. Defaults to `false`.
    *  *user.autowatch.disabled* Whether the user automatically watches issues they create or add a comment to. By default, not set: the user takes the instance autowatch setting.
    
    Note that these keys are deprecated:
    
    *  *jira.user.locale* The locale of the user. By default, not set. The user takes the instance locale.
    *  *jira.user.timezone* The time zone of the user. By default, not set. The user takes the instance timezone.
    
    Use [ Update a user profile](https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch) from the user management REST API to manage timezone and locale instead.
    
    **[Permissions](#permissions) required:** Permission to access Jira.
    *
    * @param string $requestBody 
    * @param array $queryParameters {
    *     @var string $key The key of the preference. The maximum length is 255 characters.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetPreferenceUnauthorizedException
    * @throws \JiraSdk\Exception\SetPreferenceNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function setPreference(string $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetPreference($requestBody, $queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteLocaleUnauthorizedException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteLocale(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteLocale(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetLocaleUnauthorizedException
     *
     * @return null|\JiraSdk\Model\Locale|\Psr\Http\Message\ResponseInterface
     */
    public function getLocale(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetLocale(), $fetch);
    }
    /**
    * Deprecated, use [ Update a user profile](https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch) from the user management REST API instead.
    
    Sets the locale of the user. The locale must be one supported by the instance of Jira.
    
    **[Permissions](#permissions) required:** Permission to access Jira.
    *
    * @param \JiraSdk\Model\Locale $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetLocaleBadRequestException
    * @throws \JiraSdk\Exception\SetLocaleUnauthorizedException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function setLocale(\JiraSdk\Model\Locale $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetLocale($requestBody), $fetch);
    }
    /**
     * Returns details for the current user.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *     @var string $expand Use [expand](#expansion) to include additional information about user in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `groups` Returns all groups, including nested groups, the user belongs to.
     *  `applicationRoles` Returns the application roles the user is assigned to.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetCurrentUserUnauthorizedException
     *
     * @return null|\JiraSdk\Model\User|\Psr\Http\Message\ResponseInterface
     */
    public function getCurrentUser(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetCurrentUser($queryParameters), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) list of [notification schemes](https://confluence.atlassian.com/x/8YdKLg) ordered by the display name.
     *Note that you should allow for events without recipients to appear in responses.*
     **[Permissions](#permissions) required:** Permission to access Jira, however, the user must have permission to administer at least one project associated with a notification scheme for it to be returned.
     *
     * @param array $queryParameters {
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     *     @var array $id The list of notification schemes IDs to be filtered by
     *     @var array $projectId The list of projects IDs to be filtered by
     *     @var bool $onlyDefault When set to true, returns only the default notification scheme. If you provide project IDs not associated with the default, returns an empty page. The default value is false.
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `all` Returns all expandable information
     *  `field` Returns information about any custom fields assigned to receive an event
     *  `group` Returns information about any groups assigned to receive an event
     *  `notificationSchemeEvents` Returns a list of event associations. This list is returned for all expandable information
     *  `projectRole` Returns information about any project roles assigned to receive an event
     *  `user` Returns information about any users assigned to receive an event
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetNotificationSchemesBadRequestException
     * @throws \JiraSdk\Exception\GetNotificationSchemesUnauthorizedException
     *
     * @return null|\JiraSdk\Model\PageBeanNotificationScheme|\Psr\Http\Message\ResponseInterface
     */
    public function getNotificationSchemes(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetNotificationSchemes($queryParameters), $fetch);
    }
    /**
     * Creates a notification scheme with notifications. You can create up to 1000 notifications per request.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\CreateNotificationSchemeDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateNotificationSchemeBadRequestException
     * @throws \JiraSdk\Exception\CreateNotificationSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\CreateNotificationSchemeForbiddenException
     *
     * @return null|\JiraSdk\Model\NotificationSchemeId|\Psr\Http\Message\ResponseInterface
     */
    public function createNotificationScheme(\JiraSdk\Model\CreateNotificationSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateNotificationScheme($requestBody), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) mapping of project that have notification scheme assigned. You can provide either one or multiple notification scheme IDs or project IDs to filter by. If you don't provide any, this will return a list of all mappings. Note that only company-managed (classic) projects are supported. This is because team-managed projects don't have a concept of a default notification scheme. The mappings are ordered by projectId.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *     @var string $startAt The index of the first item to return in a page of results (page offset).
     *     @var string $maxResults The maximum number of items to return per page.
     *     @var array $notificationSchemeId The list of notifications scheme IDs to be filtered out
     *     @var array $projectId The list of project IDs to be filtered out
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetNotificationSchemeToProjectMappingsBadRequestException
     * @throws \JiraSdk\Exception\GetNotificationSchemeToProjectMappingsUnauthorizedException
     *
     * @return null|\JiraSdk\Model\PageBeanNotificationSchemeAndProjectMappingJsonBean|\Psr\Http\Message\ResponseInterface
     */
    public function getNotificationSchemeToProjectMappings(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetNotificationSchemeToProjectMappings($queryParameters), $fetch);
    }
    /**
     * Returns a [notification scheme](https://confluence.atlassian.com/x/8YdKLg), including the list of events and the recipients who will receive notifications for those events.
     **[Permissions](#permissions) required:** Permission to access Jira, however, the user must have permission to administer at least one project associated with the notification scheme.
     *
     * @param int $id The ID of the notification scheme. Use [Get notification schemes paginated](#api-rest-api-3-notificationscheme-get) to get a list of notification scheme IDs.
     * @param array $queryParameters {
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `all` Returns all expandable information
     *  `field` Returns information about any custom fields assigned to receive an event
     *  `group` Returns information about any groups assigned to receive an event
     *  `notificationSchemeEvents` Returns a list of event associations. This list is returned for all expandable information
     *  `projectRole` Returns information about any project roles assigned to receive an event
     *  `user` Returns information about any users assigned to receive an event
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetNotificationSchemeBadRequestException
     * @throws \JiraSdk\Exception\GetNotificationSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\GetNotificationSchemeNotFoundException
     *
     * @return null|\JiraSdk\Model\NotificationScheme|\Psr\Http\Message\ResponseInterface
     */
    public function getNotificationScheme(int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetNotificationScheme($id, $queryParameters), $fetch);
    }
    /**
     * Updates a notification scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id The ID of the notification scheme.
     * @param \JiraSdk\Model\UpdateNotificationSchemeDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateNotificationSchemeBadRequestException
     * @throws \JiraSdk\Exception\UpdateNotificationSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateNotificationSchemeForbiddenException
     * @throws \JiraSdk\Exception\UpdateNotificationSchemeNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function updateNotificationScheme(string $id, \JiraSdk\Model\UpdateNotificationSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateNotificationScheme($id, $requestBody), $fetch);
    }
    /**
     * Adds notifications to a notifications scheme. You can add up to 1000 notifications per request.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id The ID of the notification scheme.
     * @param \JiraSdk\Model\AddNotificationsDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\AddNotificationsBadRequestException
     * @throws \JiraSdk\Exception\AddNotificationsUnauthorizedException
     * @throws \JiraSdk\Exception\AddNotificationsForbiddenException
     * @throws \JiraSdk\Exception\AddNotificationsNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function addNotifications(string $id, \JiraSdk\Model\AddNotificationsDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddNotifications($id, $requestBody), $fetch);
    }
    /**
     * Deletes a notification scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $notificationSchemeId The ID of the notification scheme.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteNotificationSchemeBadRequestException
     * @throws \JiraSdk\Exception\DeleteNotificationSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteNotificationSchemeForbiddenException
     * @throws \JiraSdk\Exception\DeleteNotificationSchemeNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteNotificationScheme(string $notificationSchemeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteNotificationScheme($notificationSchemeId), $fetch);
    }
    /**
     * Removes a notification from a notification scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $notificationSchemeId The ID of the notification scheme.
     * @param string $notificationId The ID of the notification.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\RemoveNotificationFromNotificationSchemeBadRequestException
     * @throws \JiraSdk\Exception\RemoveNotificationFromNotificationSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\RemoveNotificationFromNotificationSchemeForbiddenException
     * @throws \JiraSdk\Exception\RemoveNotificationFromNotificationSchemeNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function removeNotificationFromNotificationScheme(string $notificationSchemeId, string $notificationId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveNotificationFromNotificationScheme($notificationSchemeId, $notificationId), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAllPermissionsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAllPermissionsForbiddenException
     *
     * @return null|\JiraSdk\Model\Permissions|\Psr\Http\Message\ResponseInterface
     */
    public function getAllPermissions(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllPermissions(), $fetch);
    }
    /**
    * Returns:
    
    *  for a list of global permissions, the global permissions granted to a user.
    *  for a list of project permissions and lists of projects and issues, for each project permission a list of the projects and issues a user can access or manipulate.
    
    If no account ID is provided, the operation returns details for the logged in user.
    
    Note that:
    
    *  Invalid project and issue IDs are ignored.
    *  A maximum of 1000 projects and 1000 issues can be checked.
    *  Null values in `globalPermissions`, `projectPermissions`, `projectPermissions.projects`, and `projectPermissions.issues` are ignored.
    *  Empty strings in `projectPermissions.permissions` are ignored.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) to check the permissions for other users, otherwise none. However, Connect apps can make a call from the app server to the product to obtain permission details for any user, without admin permission. This Connect app ability doesn't apply to calls made using AP.request() in a browser.
    *
    * @param \JiraSdk\Model\BulkPermissionsRequestBean $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetBulkPermissionsBadRequestException
    * @throws \JiraSdk\Exception\GetBulkPermissionsForbiddenException
    *
    * @return null|\JiraSdk\Model\BulkPermissionGrants|\Psr\Http\Message\ResponseInterface
    */
    public function getBulkPermissions(\JiraSdk\Model\BulkPermissionsRequestBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetBulkPermissions($requestBody), $fetch);
    }
    /**
    * Returns all the projects where the user is granted a list of project permissions.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param \JiraSdk\Model\PermissionsKeysBean $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetPermittedProjectsBadRequestException
    * @throws \JiraSdk\Exception\GetPermittedProjectsUnauthorizedException
    *
    * @return null|\JiraSdk\Model\PermittedProjects|\Psr\Http\Message\ResponseInterface
    */
    public function getPermittedProjects(\JiraSdk\Model\PermissionsKeysBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetPermittedProjects($requestBody), $fetch);
    }
    /**
    * Returns all permission schemes.
    
    ### About permission schemes and grants ###
    
    A permission scheme is a collection of permission grants. A permission grant consists of a `holder` and a `permission`.
    
    #### Holder object ####
    
    The `holder` object contains information about the user or group being granted the permission. For example, the *Administer projects* permission is granted to a group named *Teams in space administrators*. In this case, the type is `"type": "group"`, and the parameter is the group name, `"parameter": "Teams in space administrators"` and the value is group ID, `"value": "ca85fac0-d974-40ca-a615-7af99c48d24f"`. The `holder` object is defined by the following properties:
    
    *  `type` Identifies the user or group (see the list of types below).
    *  `parameter` As a group's name can change, use of `value` is recommended. The value of this property depends on the `type`. For example, if the `type` is a group, then you need to specify the group name.
    *  `value` The value of this property depends on the `type`. If the `type` is a group, then you need to specify the group ID. For other `type` it has the same value as `parameter`
    
    The following `types` are available. The expected values for `parameter` and `value` are given in parentheses (some types may not have a `parameter` or `value`):
    
    *  `anyone` Grant for anonymous users.
    *  `applicationRole` Grant for users with access to the specified application (application name, application name). See [Update product access settings](https://confluence.atlassian.com/x/3YxjL) for more information.
    *  `assignee` Grant for the user currently assigned to an issue.
    *  `group` Grant for the specified group (`parameter` : group name, `value` : group ID).
    *  `groupCustomField` Grant for a user in the group selected in the specified custom field (`parameter` : custom field ID, `value` : custom field ID).
    *  `projectLead` Grant for a project lead.
    *  `projectRole` Grant for the specified project role (`parameter` :project role ID, `value` : project role ID).
    *  `reporter` Grant for the user who reported the issue.
    *  `sd.customer.portal.only` Jira Service Desk only. Grants customers permission to access the customer portal but not Jira. See [Customizing Jira Service Desk permissions](https://confluence.atlassian.com/x/24dKLg) for more information.
    *  `user` Grant for the specified user (`parameter` : user ID - historically this was the userkey but that is deprecated and the account ID should be used, `value` : user ID).
    *  `userCustomField` Grant for a user selected in the specified custom field (`parameter` : custom field ID, `value` : custom field ID).
    
    #### Built-in permissions ####
    
    The [built-in Jira permissions](https://confluence.atlassian.com/x/yodKLg) are listed below. Apps can also define custom permissions. See the [project permission](https://developer.atlassian.com/cloud/jira/platform/modules/project-permission/) and [global permission](https://developer.atlassian.com/cloud/jira/platform/modules/global-permission/) module documentation for more information.
    
    **Project permissions**
    
    *  `ADMINISTER_PROJECTS`
    *  `BROWSE_PROJECTS`
    *  `MANAGE_SPRINTS_PERMISSION` (Jira Software only)
    *  `SERVICEDESK_AGENT` (Jira Service Desk only)
    *  `VIEW_DEV_TOOLS` (Jira Software only)
    *  `VIEW_READONLY_WORKFLOW`
    
    **Issue permissions**
    
    *  `ASSIGNABLE_USER`
    *  `ASSIGN_ISSUES`
    *  `CLOSE_ISSUES`
    *  `CREATE_ISSUES`
    *  `DELETE_ISSUES`
    *  `EDIT_ISSUES`
    *  `LINK_ISSUES`
    *  `MODIFY_REPORTER`
    *  `MOVE_ISSUES`
    *  `RESOLVE_ISSUES`
    *  `SCHEDULE_ISSUES`
    *  `SET_ISSUE_SECURITY`
    *  `TRANSITION_ISSUES`
    
    **Voters and watchers permissions**
    
    *  `MANAGE_WATCHERS`
    *  `VIEW_VOTERS_AND_WATCHERS`
    
    **Comments permissions**
    
    *  `ADD_COMMENTS`
    *  `DELETE_ALL_COMMENTS`
    *  `DELETE_OWN_COMMENTS`
    *  `EDIT_ALL_COMMENTS`
    *  `EDIT_OWN_COMMENTS`
    
    **Attachments permissions**
    
    *  `CREATE_ATTACHMENTS`
    *  `DELETE_ALL_ATTACHMENTS`
    *  `DELETE_OWN_ATTACHMENTS`
    
    **Time tracking permissions**
    
    *  `DELETE_ALL_WORKLOGS`
    *  `DELETE_OWN_WORKLOGS`
    *  `EDIT_ALL_WORKLOGS`
    *  `EDIT_OWN_WORKLOGS`
    *  `WORK_ON_ISSUES`
    
    **[Permissions](#permissions) required:** Permission to access Jira.
    *
    * @param array $queryParameters {
    *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are included when you specify any value. Expand options include:
    
    *  `all` Returns all expandable information.
    *  `field` Returns information about the custom field granted the permission.
    *  `group` Returns information about the group that is granted the permission.
    *  `permissions` Returns all permission grants for each permission scheme.
    *  `projectRole` Returns information about the project role granted the permission.
    *  `user` Returns information about the user who is granted the permission.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAllPermissionSchemesUnauthorizedException
    *
    * @return null|\JiraSdk\Model\PermissionSchemes|\Psr\Http\Message\ResponseInterface
    */
    public function getAllPermissionSchemes(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllPermissionSchemes($queryParameters), $fetch);
    }
    /**
     * Creates a new permission scheme. You can create a permission scheme with or without defining a set of permission grants.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\PermissionScheme $requestBody 
     * @param array $queryParameters {
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreatePermissionSchemeBadRequestException
     * @throws \JiraSdk\Exception\CreatePermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\CreatePermissionSchemeForbiddenException
     *
     * @return null|\JiraSdk\Model\PermissionScheme|\Psr\Http\Message\ResponseInterface
     */
    public function createPermissionScheme(\JiraSdk\Model\PermissionScheme $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreatePermissionScheme($requestBody, $queryParameters), $fetch);
    }
    /**
     * Deletes a permission scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $schemeId The ID of the permission scheme being deleted.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeletePermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\DeletePermissionSchemeForbiddenException
     * @throws \JiraSdk\Exception\DeletePermissionSchemeNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deletePermissionScheme(int $schemeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeletePermissionScheme($schemeId), $fetch);
    }
    /**
     * Returns a permission scheme.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param int $schemeId The ID of the permission scheme to return.
     * @param array $queryParameters {
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are included when you specify any value. Expand options include:
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetPermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\GetPermissionSchemeNotFoundException
     *
     * @return null|\JiraSdk\Model\PermissionScheme|\Psr\Http\Message\ResponseInterface
     */
    public function getPermissionScheme(int $schemeId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetPermissionScheme($schemeId, $queryParameters), $fetch);
    }
    /**
    * Updates a permission scheme. Below are some important things to note when using this resource:
    
    *  If a permissions list is present in the request, then it is set in the permission scheme, overwriting *all existing* grants.
    *  If you want to update only the name and description, then do not send a permissions list in the request.
    *  Sending an empty list will remove all permission grants from the permission scheme.
    
    If you want to add or delete a permission grant instead of updating the whole list, see [Create permission grant](#api-rest-api-3-permissionscheme-schemeId-permission-post) or [Delete permission scheme entity](#api-rest-api-3-permissionscheme-schemeId-permission-permissionId-delete).
    
    See [About permission schemes and grants](../api-group-permission-schemes/#about-permission-schemes-and-grants) for more details.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $schemeId The ID of the permission scheme to update.
    * @param \JiraSdk\Model\PermissionScheme $requestBody 
    * @param array $queryParameters {
    *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:
    
    *  `all` Returns all expandable information.
    *  `field` Returns information about the custom field granted the permission.
    *  `group` Returns information about the group that is granted the permission.
    *  `permissions` Returns all permission grants for each permission scheme.
    *  `projectRole` Returns information about the project role granted the permission.
    *  `user` Returns information about the user who is granted the permission.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdatePermissionSchemeUnauthorizedException
    * @throws \JiraSdk\Exception\UpdatePermissionSchemeForbiddenException
    * @throws \JiraSdk\Exception\UpdatePermissionSchemeNotFoundException
    *
    * @return null|\JiraSdk\Model\PermissionScheme|\Psr\Http\Message\ResponseInterface
    */
    public function updatePermissionScheme(int $schemeId, \JiraSdk\Model\PermissionScheme $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdatePermissionScheme($schemeId, $requestBody, $queryParameters), $fetch);
    }
    /**
     * Returns all permission grants for a permission scheme.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param int $schemeId The ID of the permission scheme.
     * @param array $queryParameters {
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `user` Returns information about the user who is granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `field` Returns information about the custom field granted the permission.
     *  `all` Returns all expandable information.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetPermissionSchemeGrantsUnauthorizedException
     * @throws \JiraSdk\Exception\GetPermissionSchemeGrantsNotFoundException
     *
     * @return null|\JiraSdk\Model\PermissionGrants|\Psr\Http\Message\ResponseInterface
     */
    public function getPermissionSchemeGrants(int $schemeId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetPermissionSchemeGrants($schemeId, $queryParameters), $fetch);
    }
    /**
     * Creates a permission grant in a permission scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $schemeId The ID of the permission scheme in which to create a new permission grant.
     * @param \JiraSdk\Model\PermissionGrant $requestBody 
     * @param array $queryParameters {
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `user` Returns information about the user who is granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `field` Returns information about the custom field granted the permission.
     *  `all` Returns all expandable information.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreatePermissionGrantBadRequestException
     * @throws \JiraSdk\Exception\CreatePermissionGrantUnauthorizedException
     * @throws \JiraSdk\Exception\CreatePermissionGrantForbiddenException
     *
     * @return null|\JiraSdk\Model\PermissionGrant|\Psr\Http\Message\ResponseInterface
     */
    public function createPermissionGrant(int $schemeId, \JiraSdk\Model\PermissionGrant $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreatePermissionGrant($schemeId, $requestBody, $queryParameters), $fetch);
    }
    /**
     * Deletes a permission grant from a permission scheme. See [About permission schemes and grants](../api-group-permission-schemes/#about-permission-schemes-and-grants) for more details.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $schemeId The ID of the permission scheme to delete the permission grant from.
     * @param int $permissionId The ID of the permission grant to delete.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeletePermissionSchemeEntityBadRequestException
     * @throws \JiraSdk\Exception\DeletePermissionSchemeEntityUnauthorizedException
     * @throws \JiraSdk\Exception\DeletePermissionSchemeEntityForbiddenException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deletePermissionSchemeEntity(int $schemeId, int $permissionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeletePermissionSchemeEntity($schemeId, $permissionId), $fetch);
    }
    /**
     * Returns a permission grant.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param int $schemeId The ID of the permission scheme.
     * @param int $permissionId The ID of the permission grant.
     * @param array $queryParameters {
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetPermissionSchemeGrantUnauthorizedException
     * @throws \JiraSdk\Exception\GetPermissionSchemeGrantNotFoundException
     *
     * @return null|\JiraSdk\Model\PermissionGrant|\Psr\Http\Message\ResponseInterface
     */
    public function getPermissionSchemeGrant(int $schemeId, int $permissionId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetPermissionSchemeGrant($schemeId, $permissionId, $queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetPrioritiesUnauthorizedException
     *
     * @return null|\JiraSdk\Model\Priority[]|\Psr\Http\Message\ResponseInterface
     */
    public function getPriorities(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetPriorities(), $fetch);
    }
    /**
     * Creates an issue priority.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\CreatePriorityDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreatePriorityBadRequestException
     * @throws \JiraSdk\Exception\CreatePriorityUnauthorizedException
     * @throws \JiraSdk\Exception\CreatePriorityForbiddenException
     *
     * @return null|\JiraSdk\Model\PriorityId|\Psr\Http\Message\ResponseInterface
     */
    public function createPriority(\JiraSdk\Model\CreatePriorityDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreatePriority($requestBody), $fetch);
    }
    /**
     * Sets default issue priority.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\SetDefaultPriorityRequest $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\SetDefaultPriorityBadRequestException
     * @throws \JiraSdk\Exception\SetDefaultPriorityUnauthorizedException
     * @throws \JiraSdk\Exception\SetDefaultPriorityForbiddenException
     * @throws \JiraSdk\Exception\SetDefaultPriorityNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function setDefaultPriority(\JiraSdk\Model\SetDefaultPriorityRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetDefaultPriority($requestBody), $fetch);
    }
    /**
     * Changes the order of issue priorities.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\ReorderIssuePriorities $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\MovePrioritiesBadRequestException
     * @throws \JiraSdk\Exception\MovePrioritiesUnauthorizedException
     * @throws \JiraSdk\Exception\MovePrioritiesForbiddenException
     * @throws \JiraSdk\Exception\MovePrioritiesNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function movePriorities(\JiraSdk\Model\ReorderIssuePriorities $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\MovePriorities($requestBody), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) list of priorities. The list can contain all priorities or a subset determined by any combination of these criteria:
     *  a list of priority IDs. Any invalid priority IDs are ignored.
     *  whether the field configuration is a default. This returns priorities from company-managed (classic) projects only, as there is no concept of default priorities in team-managed projects.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     *     @var array $id The list of priority IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=2&id=3`.
     *     @var bool $onlyDefault Whether only the default priority is returned.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\SearchPrioritiesUnauthorizedException
     *
     * @return null|\JiraSdk\Model\PageBeanPriority|\Psr\Http\Message\ResponseInterface
     */
    public function searchPriorities(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SearchPriorities($queryParameters), $fetch);
    }
    /**
    * Deletes an issue priority.
    
    This operation is [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $id The ID of the issue priority.
    * @param array $queryParameters {
    *     @var string $replaceWith The ID of the issue priority that will replace the currently selected resolution.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeletePriorityBadRequestException
    * @throws \JiraSdk\Exception\DeletePriorityUnauthorizedException
    * @throws \JiraSdk\Exception\DeletePriorityForbiddenException
    * @throws \JiraSdk\Exception\DeletePriorityNotFoundException
    * @throws \JiraSdk\Exception\DeletePriorityConflictException
    *
    * @return null|\JiraSdk\Model\TaskProgressBeanObject|\Psr\Http\Message\ResponseInterface
    */
    public function deletePriority(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeletePriority($id, $queryParameters), $fetch);
    }
    /**
     * Returns an issue priority.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param string $id The ID of the issue priority.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetPriorityUnauthorizedException
     * @throws \JiraSdk\Exception\GetPriorityNotFoundException
     *
     * @return null|\JiraSdk\Model\Priority|\Psr\Http\Message\ResponseInterface
     */
    public function getPriority(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetPriority($id), $fetch);
    }
    /**
     * Updates an issue priority.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id The ID of the issue priority.
     * @param \JiraSdk\Model\UpdatePriorityDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdatePriorityBadRequestException
     * @throws \JiraSdk\Exception\UpdatePriorityUnauthorizedException
     * @throws \JiraSdk\Exception\UpdatePriorityForbiddenException
     * @throws \JiraSdk\Exception\UpdatePriorityNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function updatePriority(string $id, \JiraSdk\Model\UpdatePriorityDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdatePriority($id, $requestBody), $fetch);
    }
    /**
    * Returns all projects visible to the user. Deprecated, use [ Get projects paginated](#api-rest-api-3-project-search-get) that supports search and pagination.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** Projects are returned only where the user has *Browse Projects* or *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expanded options include:
    
    *  `description` Returns the project description.
    *  `issueTypes` Returns all issue types associated with the project.
    *  `lead` Returns information about the project lead.
    *  `projectKeys` Returns all project keys associated with the project.
    *     @var int $recent Returns the user's most recently accessed projects. You may specify the number of results to return up to a maximum of 20. If access is anonymous, then the recently accessed projects are based on the current HTTP session.
    *     @var array $properties A list of project properties to return for the project. This parameter accepts a comma-separated list.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAllProjectsUnauthorizedException
    *
    * @return null|\JiraSdk\Model\Project[]|\Psr\Http\Message\ResponseInterface
    */
    public function getAllProjects(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllProjects($queryParameters), $fetch);
    }
    /**
    * Creates a project based on a project type template, as shown in the following table:
    
    | Project Type Key | Project Template Key |  
    |--|--|  
    | `business` | `com.atlassian.jira-core-project-templates:jira-core-simplified-content-management`, `com.atlassian.jira-core-project-templates:jira-core-simplified-document-approval`, `com.atlassian.jira-core-project-templates:jira-core-simplified-lead-tracking`, `com.atlassian.jira-core-project-templates:jira-core-simplified-process-control`, `com.atlassian.jira-core-project-templates:jira-core-simplified-procurement`, `com.atlassian.jira-core-project-templates:jira-core-simplified-project-management`, `com.atlassian.jira-core-project-templates:jira-core-simplified-recruitment`, `com.atlassian.jira-core-project-templates:jira-core-simplified-task-tracking` |  
    | `service_desk` | `com.atlassian.servicedesk:simplified-it-service-management`, `com.atlassian.servicedesk:simplified-general-service-desk-it`, `com.atlassian.servicedesk:simplified-general-service-desk-business`, `com.atlassian.servicedesk:simplified-internal-service-desk`, `com.atlassian.servicedesk:simplified-external-service-desk`, `com.atlassian.servicedesk:simplified-hr-service-desk`, `com.atlassian.servicedesk:simplified-facilities-service-desk`, `com.atlassian.servicedesk:simplified-legal-service-desk`, `com.atlassian.servicedesk:simplified-analytics-service-desk`, `com.atlassian.servicedesk:simplified-marketing-service-desk`, `com.atlassian.servicedesk:simplified-finance-service-desk` |  
    | `software` | `com.pyxis.greenhopper.jira:gh-simplified-agility-kanban`, `com.pyxis.greenhopper.jira:gh-simplified-agility-scrum`, `com.pyxis.greenhopper.jira:gh-simplified-basic`, `com.pyxis.greenhopper.jira:gh-simplified-kanban-classic`, `com.pyxis.greenhopper.jira:gh-simplified-scrum-classic` |  
    The project types are available according to the installed Jira features as follows:
    
    *  Jira Core, the default, enables `business` projects.
    *  Jira Service Management enables `service_desk` projects.
    *  Jira Software enables `software` projects.
    
    To determine which features are installed, go to **Jira settings** > **Apps** > **Manage apps** and review the System Apps list. To add Jira Software or Jira Service Management into a JIRA instance, use **Jira settings** > **Apps** > **Finding new apps**. For more information, see [ Managing add-ons](https://confluence.atlassian.com/x/S31NLg).
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\CreateProjectDetails $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateProjectBadRequestException
    * @throws \JiraSdk\Exception\CreateProjectUnauthorizedException
    * @throws \JiraSdk\Exception\CreateProjectForbiddenException
    *
    * @return null|\JiraSdk\Model\ProjectIdentifiers|\Psr\Http\Message\ResponseInterface
    */
    public function createProject(\JiraSdk\Model\CreateProjectDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateProject($requestBody), $fetch);
    }
    /**
    * Returns a list of up to 20 projects recently viewed by the user that are still visible to the user.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** Projects are returned only where the user has one of:
    
    *  *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *  *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expanded options include:
    
    *  `description` Returns the project description.
    *  `projectKeys` Returns all project keys associated with a project.
    *  `lead` Returns information about the project lead.
    *  `issueTypes` Returns all issue types associated with the project.
    *  `url` Returns the URL associated with the project.
    *  `permissions` Returns the permissions associated with the project.
    *  `insight` EXPERIMENTAL. Returns the insight details of total issue count and last issue update time for the project.
    *  `*` Returns the project with all available expand options.
    *     @var array $properties EXPERIMENTAL. A list of project properties to return for the project. This parameter accepts a comma-separated list. Invalid property names are ignored.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetRecentBadRequestException
    * @throws \JiraSdk\Exception\GetRecentUnauthorizedException
    *
    * @return null|\JiraSdk\Model\Project[]|\Psr\Http\Message\ResponseInterface
    */
    public function getRecent(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetRecent($queryParameters), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of projects visible to the user.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** Projects are returned only where the user has one of:
    
    *  *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *  *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var string $orderBy [Order](#ordering) the results by a field.
    
    *  `category` Sorts by project category. A complete list of category IDs is found using [Get all project categories](#api-rest-api-3-projectCategory-get).
    *  `issueCount` Sorts by the total number of issues in each project.
    *  `key` Sorts by project key.
    *  `lastIssueUpdatedTime` Sorts by the last issue update time.
    *  `name` Sorts by project name.
    *  `owner` Sorts by project lead.
    *  `archivedDate` EXPERIMENTAL. Sorts by project archived date.
    *  `deletedDate` EXPERIMENTAL. Sorts by project deleted date.
    *     @var array $id The project IDs to filter the results by. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`. Up to 50 project IDs can be provided.
    *     @var array $keys The project keys to filter the results by. To include multiple keys, provide an ampersand-separated list. For example, `keys=PA&keys=PB`. Up to 50 project keys can be provided.
    *     @var string $query Filter the results using a literal string. Projects with a matching `key` or `name` are returned (case insensitive).
    *     @var string $typeKey Orders results by the [project type](https://confluence.atlassian.com/x/GwiiLQ#Jiraapplicationsoverview-Productfeaturesandprojecttypes). This parameter accepts a comma-separated list. Valid values are `business`, `service_desk`, and `software`.
    *     @var int $categoryId The ID of the project's category. A complete list of category IDs is found using the [Get all project categories](#api-rest-api-3-projectCategory-get) operation.
    *     @var string $action Filter results by projects for which the user can:
    
    *  `view` the project, meaning that they have one of the following permissions:
       
        *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
        *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
        *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *  `browse` the project, meaning that they have the *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *  `edit` the project, meaning that they have one of the following permissions:
       
        *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
        *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expanded options include:
    
    *  `description` Returns the project description.
    *  `projectKeys` Returns all project keys associated with a project.
    *  `lead` Returns information about the project lead.
    *  `issueTypes` Returns all issue types associated with the project.
    *  `url` Returns the URL associated with the project.
    *  `insight` EXPERIMENTAL. Returns the insight details of total issue count and last issue update time for the project.
    *     @var array $status EXPERIMENTAL. Filter results by project status:
    
    *  `live` Search live projects.
    *  `archived` Search archived projects.
    *  `deleted` Search deleted projects, those in the recycle bin.
    *     @var array $properties EXPERIMENTAL. A list of project properties to return for the project. This parameter accepts a comma-separated list.
    *     @var string $propertyQuery EXPERIMENTAL. A query string used to search properties. The query string cannot be specified using a JSON object. For example, to search for the value of `nested` from `{"something":{"nested":1,"other":2}}` use `[thepropertykey].something.nested=1`. Note that the propertyQuery key is enclosed in square brackets to enable searching where the propertyQuery key includes dot (.) or equals (=) characters. Note that `thepropertykey` is only returned when included in `properties`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SearchProjectsBadRequestException
    * @throws \JiraSdk\Exception\SearchProjectsUnauthorizedException
    * @throws \JiraSdk\Exception\SearchProjectsNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanProject|\Psr\Http\Message\ResponseInterface
    */
    public function searchProjects(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SearchProjects($queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAllProjectTypesUnauthorizedException
     *
     * @return null|\JiraSdk\Model\ProjectType[]|\Psr\Http\Message\ResponseInterface
     */
    public function getAllProjectTypes(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllProjectTypes(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return null|\JiraSdk\Model\ProjectType[]|\Psr\Http\Message\ResponseInterface
     */
    public function getAllAccessibleProjectTypes(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllAccessibleProjectTypes(), $fetch);
    }
    /**
    * Returns a [project type](https://confluence.atlassian.com/x/Var1Nw).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param string $projectTypeKey The key of the project type.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetProjectTypeByKeyUnauthorizedException
    * @throws \JiraSdk\Exception\GetProjectTypeByKeyNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectType|\Psr\Http\Message\ResponseInterface
    */
    public function getProjectTypeByKey(string $projectTypeKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectTypeByKey($projectTypeKey), $fetch);
    }
    /**
     * Returns a [project type](https://confluence.atlassian.com/x/Var1Nw) if it is accessible to the user.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param string $projectTypeKey The key of the project type.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAccessibleProjectTypeByKeyUnauthorizedException
     * @throws \JiraSdk\Exception\GetAccessibleProjectTypeByKeyNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectType|\Psr\Http\Message\ResponseInterface
     */
    public function getAccessibleProjectTypeByKey(string $projectTypeKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAccessibleProjectTypeByKey($projectTypeKey), $fetch);
    }
    /**
    * Deletes a project.
    
    You can't delete a project if it's archived. To delete an archived project, restore the project and then delete it. To restore a project, use the Jira UI.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param array $queryParameters {
    *     @var bool $enableUndo Whether this project is placed in the Jira recycle bin where it will be available for restoration.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteProjectUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteProjectNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteProject(string $projectIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteProject($projectIdOrKey, $queryParameters), $fetch);
    }
    /**
    * Returns the [project details](https://confluence.atlassian.com/x/ahLpNw) for a project.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that the project description, issue types, and project lead are included in all responses by default. Expand options include:
    
    *  `description` The project description.
    *  `issueTypes` The issue types associated with the project.
    *  `lead` The project lead.
    *  `projectKeys` All project keys associated with the project.
    *  `issueTypeHierarchy` The project issue type hierarchy.
    *     @var array $properties A list of project properties to return for the project. This parameter accepts a comma-separated list.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetProjectUnauthorizedException
    * @throws \JiraSdk\Exception\GetProjectNotFoundException
    *
    * @return null|\JiraSdk\Model\Project|\Psr\Http\Message\ResponseInterface
    */
    public function getProject(string $projectIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProject($projectIdOrKey, $queryParameters), $fetch);
    }
    /**
    * Updates the [project details](https://confluence.atlassian.com/x/ahLpNw) of a project.
    
    All parameters are optional in the body of the request.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param \JiraSdk\Model\UpdateProjectDetails $requestBody 
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that the project description, issue types, and project lead are included in all responses by default. Expand options include:
    
    *  `description` The project description.
    *  `issueTypes` The issue types associated with the project.
    *  `lead` The project lead.
    *  `projectKeys` All project keys associated with the project.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateProjectBadRequestException
    * @throws \JiraSdk\Exception\UpdateProjectUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateProjectForbiddenException
    * @throws \JiraSdk\Exception\UpdateProjectNotFoundException
    *
    * @return null|\JiraSdk\Model\Project|\Psr\Http\Message\ResponseInterface
    */
    public function updateProject(string $projectIdOrKey, \JiraSdk\Model\UpdateProjectDetails $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateProject($projectIdOrKey, $requestBody, $queryParameters), $fetch);
    }
    /**
     * Archives a project. You can't delete a project if it's archived. To delete an archived project, restore the project and then delete it. To restore a project, use the Jira UI.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\ArchiveProjectBadRequestException
     * @throws \JiraSdk\Exception\ArchiveProjectUnauthorizedException
     * @throws \JiraSdk\Exception\ArchiveProjectForbiddenException
     * @throws \JiraSdk\Exception\ArchiveProjectNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function archiveProject(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\ArchiveProject($projectIdOrKey), $fetch);
    }
    /**
    * Sets the avatar displayed for a project.
    
    Use [Load project avatar](#api-rest-api-3-project-projectIdOrKey-avatar2-post) to store avatars against the project, before using this operation to set the displayed avatar.
    
    **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
    *
    * @param string $projectIdOrKey The ID or (case-sensitive) key of the project.
    * @param \JiraSdk\Model\Avatar $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateProjectAvatarUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateProjectAvatarForbiddenException
    * @throws \JiraSdk\Exception\UpdateProjectAvatarNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function updateProjectAvatar(string $projectIdOrKey, \JiraSdk\Model\Avatar $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateProjectAvatar($projectIdOrKey, $requestBody), $fetch);
    }
    /**
     * Deletes a custom avatar from a project. Note that system avatars cannot be deleted.
     **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectIdOrKey The project ID or (case-sensitive) key.
     * @param int $id The ID of the avatar.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteProjectAvatarUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteProjectAvatarForbiddenException
     * @throws \JiraSdk\Exception\DeleteProjectAvatarNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteProjectAvatar(string $projectIdOrKey, int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteProjectAvatar($projectIdOrKey, $id), $fetch);
    }
    /**
    * Loads an avatar for a project.
    
    Specify the avatar's local file location in the body of the request. Also, include the following headers:
    
    *  `X-Atlassian-Token: no-check` To prevent XSRF protection blocking the request, for more information see [Special Headers](#special-request-headers).
    *  `Content-Type: image/image type` Valid image types are JPEG, GIF, or PNG.
    
    For example:  
    `curl --request POST `
    
    `--user email@example.com:<api_token> `
    
    `--header 'X-Atlassian-Token: no-check' `
    
    `--header 'Content-Type: image/< image_type>' `
    
    `--data-binary "<@/path/to/file/with/your/avatar>" `
    
    `--url 'https://your-domain.atlassian.net/rest/api/3/project/{projectIdOrKey}/avatar2'`
    
    The avatar is cropped to a square. If no crop parameters are specified, the square originates at the top left of the image. The length of the square's sides is set to the smaller of the height or width of the image.
    
    The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size.
    
    After creating the avatar use [Set project avatar](#api-rest-api-3-project-projectIdOrKey-avatar-put) to set it as the project's displayed avatar.
    
    **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
    *
    * @param string $projectIdOrKey The ID or (case-sensitive) key of the project.
    * @param mixed $requestBody 
    * @param array $queryParameters {
    *     @var int $x The X coordinate of the top-left corner of the crop region.
    *     @var int $y The Y coordinate of the top-left corner of the crop region.
    *     @var int $size The length of each side of the crop region.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateProjectAvatarBadRequestException
    * @throws \JiraSdk\Exception\CreateProjectAvatarUnauthorizedException
    * @throws \JiraSdk\Exception\CreateProjectAvatarForbiddenException
    * @throws \JiraSdk\Exception\CreateProjectAvatarNotFoundException
    *
    * @return null|\JiraSdk\Model\Avatar|\Psr\Http\Message\ResponseInterface
    */
    public function createProjectAvatar(string $projectIdOrKey, $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateProjectAvatar($projectIdOrKey, $requestBody, $queryParameters), $fetch);
    }
    /**
    * Returns all project avatars, grouped by system and custom avatars.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The ID or (case-sensitive) key of the project.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAllProjectAvatarsUnauthorizedException
    * @throws \JiraSdk\Exception\GetAllProjectAvatarsNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectAvatars|\Psr\Http\Message\ResponseInterface
    */
    public function getAllProjectAvatars(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllProjectAvatars($projectIdOrKey), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of all components in a project. See the [Get project components](#api-rest-api-3-project-projectIdOrKey-components-get) resource if you want to get a full list of versions without pagination.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var string $orderBy [Order](#ordering) the results by a field:
    
    *  `description` Sorts by the component description.
    *  `issueCount` Sorts by the count of issues associated with the component.
    *  `lead` Sorts by the user key of the component's project lead.
    *  `name` Sorts by component name.
    *     @var string $query Filter the results using a literal string. Components with a matching `name` or `description` are returned (case insensitive).
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetProjectComponentsPaginatedUnauthorizedException
    * @throws \JiraSdk\Exception\GetProjectComponentsPaginatedNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanComponentWithIssueCount|\Psr\Http\Message\ResponseInterface
    */
    public function getProjectComponentsPaginated(string $projectIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectComponentsPaginated($projectIdOrKey, $queryParameters), $fetch);
    }
    /**
    * Returns all components in a project. See the [Get project components paginated](#api-rest-api-3-project-projectIdOrKey-component-get) resource if you want to get a full list of components with pagination.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetProjectComponentsUnauthorizedException
    * @throws \JiraSdk\Exception\GetProjectComponentsNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectComponent[]|\Psr\Http\Message\ResponseInterface
    */
    public function getProjectComponents(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectComponents($projectIdOrKey), $fetch);
    }
    /**
    * Deletes a project asynchronously.
    
    This operation is:
    
    *  transactional, that is, if part of the delete fails the project is not deleted.
    *  [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteProjectAsynchronouslyBadRequestException
    * @throws \JiraSdk\Exception\DeleteProjectAsynchronouslyUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteProjectAsynchronouslyNotFoundException
    *
    * @return null|\JiraSdk\Model\TaskProgressBeanObject|\Psr\Http\Message\ResponseInterface
    */
    public function deleteProjectAsynchronously(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteProjectAsynchronously($projectIdOrKey), $fetch);
    }
    /**
     * Returns the list of features for a project.
     *
     * @param string $projectIdOrKey The ID or (case-sensitive) key of the project.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetFeaturesForProjectBadRequestException
     * @throws \JiraSdk\Exception\GetFeaturesForProjectUnauthorizedException
     * @throws \JiraSdk\Exception\GetFeaturesForProjectForbiddenException
     * @throws \JiraSdk\Exception\GetFeaturesForProjectNotFoundException
     *
     * @return null|\JiraSdk\Model\ContainerForProjectFeatures|\Psr\Http\Message\ResponseInterface
     */
    public function getFeaturesForProject(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetFeaturesForProject($projectIdOrKey), $fetch);
    }
    /**
     * Sets the state of a project feature.
     *
     * @param string $projectIdOrKey The ID or (case-sensitive) key of the project.
     * @param string $featureKey The key of the feature.
     * @param \JiraSdk\Model\ProjectFeatureState $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\ToggleFeatureForProjectBadRequestException
     * @throws \JiraSdk\Exception\ToggleFeatureForProjectUnauthorizedException
     * @throws \JiraSdk\Exception\ToggleFeatureForProjectForbiddenException
     * @throws \JiraSdk\Exception\ToggleFeatureForProjectNotFoundException
     *
     * @return null|\JiraSdk\Model\ContainerForProjectFeatures|\Psr\Http\Message\ResponseInterface
     */
    public function toggleFeatureForProject(string $projectIdOrKey, string $featureKey, \JiraSdk\Model\ProjectFeatureState $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\ToggleFeatureForProject($projectIdOrKey, $featureKey, $requestBody), $fetch);
    }
    /**
    * Returns all [project property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties) keys for the project.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetProjectPropertyKeysBadRequestException
    * @throws \JiraSdk\Exception\GetProjectPropertyKeysUnauthorizedException
    * @throws \JiraSdk\Exception\GetProjectPropertyKeysForbiddenException
    * @throws \JiraSdk\Exception\GetProjectPropertyKeysNotFoundException
    *
    * @return null|\JiraSdk\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface
    */
    public function getProjectPropertyKeys(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectPropertyKeys($projectIdOrKey), $fetch);
    }
    /**
    * Deletes the [property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties) from a project.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the property.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param string $propertyKey The project property key. Use [Get project property keys](#api-rest-api-3-project-projectIdOrKey-properties-get) to get a list of all project property keys.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteProjectPropertyBadRequestException
    * @throws \JiraSdk\Exception\DeleteProjectPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteProjectPropertyForbiddenException
    * @throws \JiraSdk\Exception\DeleteProjectPropertyNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteProjectProperty(string $projectIdOrKey, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteProjectProperty($projectIdOrKey, $propertyKey), $fetch);
    }
    /**
    * Returns the value of a [project property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the property.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param string $propertyKey The project property key. Use [Get project property keys](#api-rest-api-3-project-projectIdOrKey-properties-get) to get a list of all project property keys.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetProjectPropertyBadRequestException
    * @throws \JiraSdk\Exception\GetProjectPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\GetProjectPropertyForbiddenException
    * @throws \JiraSdk\Exception\GetProjectPropertyNotFoundException
    *
    * @return null|\JiraSdk\Model\EntityProperty|\Psr\Http\Message\ResponseInterface
    */
    public function getProjectProperty(string $projectIdOrKey, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectProperty($projectIdOrKey, $propertyKey), $fetch);
    }
    /**
    * Sets the value of the [project property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties). You can use project properties to store custom data against the project.
    
    The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project in which the property is created.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param string $propertyKey The key of the project property. The maximum length is 255 characters.
    * @param mixed $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetProjectPropertyBadRequestException
    * @throws \JiraSdk\Exception\SetProjectPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\SetProjectPropertyForbiddenException
    * @throws \JiraSdk\Exception\SetProjectPropertyNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function setProjectProperty(string $projectIdOrKey, string $propertyKey, $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetProjectProperty($projectIdOrKey, $propertyKey, $requestBody), $fetch);
    }
    /**
     * Restores a project that has been archived or placed in the Jira recycle bin.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\RestoreBadRequestException
     * @throws \JiraSdk\Exception\RestoreUnauthorizedException
     * @throws \JiraSdk\Exception\RestoreNotFoundException
     *
     * @return null|\JiraSdk\Model\Project|\Psr\Http\Message\ResponseInterface
     */
    public function restore(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\Restore($projectIdOrKey), $fetch);
    }
    /**
    * Returns a list of [project roles](https://confluence.atlassian.com/x/3odKLg) for the project returning the name and self URL for each role.
    
    Note that all project roles are shared with all projects in Jira Cloud. See [Get all project roles](#api-rest-api-3-role-get) for more information.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for any project on the site or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetProjectRolesUnauthorizedException
    * @throws \JiraSdk\Exception\GetProjectRolesNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function getProjectRoles(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectRoles($projectIdOrKey), $fetch);
    }
    /**
    * Deletes actors from a project role for the project.
    
    To remove default actors from the project role, use [Delete default actors from project role](#api-rest-api-3-role-id-actors-delete).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
    * @param array $queryParameters {
    *     @var string $user The user account ID of the user to remove from the project role.
    *     @var string $group The name of the group to remove from the project role. This parameter cannot be used with the `groupId` parameter. As a group's name can change, use of `groupId` is recommended.
    *     @var string $groupId The ID of the group to remove from the project role. This parameter cannot be used with the `group` parameter.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteActorBadRequestException
    * @throws \JiraSdk\Exception\DeleteActorNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteActor(string $projectIdOrKey, int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteActor($projectIdOrKey, $id, $queryParameters), $fetch);
    }
    /**
    * Returns a project role's details and actors associated with the project. The list of actors is sorted by display name.
    
    To check whether a user belongs to a role based on their group memberships, use [Get user](#api-rest-api-3-user-get) with the `groups` expand parameter selected. Then check whether the user keys and groups match with the actors returned for the project.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
    * @param array $queryParameters {
    *     @var bool $excludeInactiveUsers Exclude inactive users.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetProjectRoleBadRequestException
    * @throws \JiraSdk\Exception\GetProjectRoleUnauthorizedException
    * @throws \JiraSdk\Exception\GetProjectRoleNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectRole|\Psr\Http\Message\ResponseInterface
    */
    public function getProjectRole(string $projectIdOrKey, int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectRole($projectIdOrKey, $id, $queryParameters), $fetch);
    }
    /**
    * Adds actors to a project role for the project.
    
    To replace all actors for the project, use [Set actors for project role](#api-rest-api-3-project-projectIdOrKey-role-id-put).
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
    * @param \JiraSdk\Model\ActorsMap $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AddActorUsersBadRequestException
    * @throws \JiraSdk\Exception\AddActorUsersUnauthorizedException
    * @throws \JiraSdk\Exception\AddActorUsersNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectRole|\Psr\Http\Message\ResponseInterface
    */
    public function addActorUsers(string $projectIdOrKey, int $id, \JiraSdk\Model\ActorsMap $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddActorUsers($projectIdOrKey, $id, $requestBody), $fetch);
    }
    /**
    * Sets the actors for a project role for a project, replacing all existing actors.
    
    To add actors to the project without overwriting the existing list, use [Add actors to project role](#api-rest-api-3-project-projectIdOrKey-role-id-post).
    
    **[Permissions](#permissions) required:** *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
    * @param \JiraSdk\Model\ProjectRoleActorsUpdateBean $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetActorsBadRequestException
    * @throws \JiraSdk\Exception\SetActorsUnauthorizedException
    * @throws \JiraSdk\Exception\SetActorsNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectRole|\Psr\Http\Message\ResponseInterface
    */
    public function setActors(string $projectIdOrKey, int $id, \JiraSdk\Model\ProjectRoleActorsUpdateBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetActors($projectIdOrKey, $id, $requestBody), $fetch);
    }
    /**
    * Returns all [project roles](https://confluence.atlassian.com/x/3odKLg) and the details for each role. Note that the list of project roles is common to all projects.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param array $queryParameters {
    *     @var bool $currentMember Whether the roles should be filtered to include only those the user is assigned to.
    *     @var bool $excludeConnectAddons 
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetProjectRoleDetailsUnauthorizedException
    * @throws \JiraSdk\Exception\GetProjectRoleDetailsNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectRoleDetails[]|\Psr\Http\Message\ResponseInterface
    */
    public function getProjectRoleDetails(string $projectIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectRoleDetails($projectIdOrKey, $queryParameters), $fetch);
    }
    /**
    * Returns the valid statuses for a project. The statuses are grouped by issue type, as each project has a set of valid issue types and each issue type has a set of valid statuses.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAllStatusesUnauthorizedException
    * @throws \JiraSdk\Exception\GetAllStatusesNotFoundException
    *
    * @return null|\JiraSdk\Model\IssueTypeWithStatus[]|\Psr\Http\Message\ResponseInterface
    */
    public function getAllStatuses(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllStatuses($projectIdOrKey), $fetch);
    }
    /**
     * Deprecated, this feature is no longer supported and no alternatives are available, see [Convert project to a different template or type](https://confluence.atlassian.com/x/yEKeOQ). Updates a [project type](https://confluence.atlassian.com/x/GwiiLQ). The project type can be updated for classic projects only, project type cannot be updated for next-gen projects.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param string $newProjectTypeKey The key of the new project type.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateProjectTypeBadRequestException
     * @throws \JiraSdk\Exception\UpdateProjectTypeUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateProjectTypeNotFoundException
     *
     * @return null|\JiraSdk\Model\Project|\Psr\Http\Message\ResponseInterface
     */
    public function updateProjectType(string $projectIdOrKey, string $newProjectTypeKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateProjectType($projectIdOrKey, $newProjectTypeKey), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of all versions in a project. See the [Get project versions](#api-rest-api-3-project-projectIdOrKey-versions-get) resource if you want to get a full list of versions without pagination.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var string $orderBy [Order](#ordering) the results by a field:
    
    *  `description` Sorts by version description.
    *  `name` Sorts by version name.
    *  `releaseDate` Sorts by release date, starting with the oldest date. Versions with no release date are listed last.
    *  `sequence` Sorts by the order of appearance in the user interface.
    *  `startDate` Sorts by start date, starting with the oldest date. Versions with no start date are listed last.
    *     @var string $query Filter the results using a literal string. Versions with matching `name` or `description` are returned (case insensitive).
    *     @var string $status A list of status values used to filter the results by version status. This parameter accepts a comma-separated list. The status values are `released`, `unreleased`, and `archived`.
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `issuesstatus` Returns the number of issues in each status category for each version.
    *  `operations` Returns actions that can be performed on the specified version.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetProjectVersionsPaginatedNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanVersion|\Psr\Http\Message\ResponseInterface
    */
    public function getProjectVersionsPaginated(string $projectIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectVersionsPaginated($projectIdOrKey, $queryParameters), $fetch);
    }
    /**
    * Returns all versions in a project. The response is not paginated. Use [Get project versions paginated](#api-rest-api-3-project-projectIdOrKey-version-get) if you want to get the versions in a project with pagination.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts `operations`, which returns actions that can be performed on the version.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetProjectVersionsNotFoundException
    *
    * @return null|\JiraSdk\Model\Version[]|\Psr\Http\Message\ResponseInterface
    */
    public function getProjectVersions(string $projectIdOrKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectVersions($projectIdOrKey, $queryParameters), $fetch);
    }
    /**
     * Returns the [project's sender email address](https://confluence.atlassian.com/x/dolKLg).
     **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param int $projectId The project ID.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetProjectEmailUnauthorizedException
     * @throws \JiraSdk\Exception\GetProjectEmailForbiddenException
     * @throws \JiraSdk\Exception\GetProjectEmailNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectEmailAddress|\Psr\Http\Message\ResponseInterface
     */
    public function getProjectEmail(int $projectId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectEmail($projectId), $fetch);
    }
    /**
    * Sets the [project's sender email address](https://confluence.atlassian.com/x/dolKLg).
    
    If `emailAddress` is an empty string, the default email address is restored.
    
    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param int $projectId The project ID.
    * @param \JiraSdk\Model\ProjectEmailAddress $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateProjectEmailBadRequestException
    * @throws \JiraSdk\Exception\UpdateProjectEmailUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateProjectEmailForbiddenException
    * @throws \JiraSdk\Exception\UpdateProjectEmailNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function updateProjectEmail(int $projectId, \JiraSdk\Model\ProjectEmailAddress $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateProjectEmail($projectId, $requestBody), $fetch);
    }
    /**
    * Get the issue type hierarchy for a next-gen project.
    
    The issue type hierarchy for a project consists of:
    
    *  *Epic* at level 1 (optional).
    *  One or more issue types at level 0 such as *Story*, *Task*, or *Bug*. Where the issue type *Epic* is defined, these issue types are used to break down the content of an epic.
    *  *Subtask* at level -1 (optional). This issue type enables level 0 issue types to be broken down into components. Issues based on a level -1 issue type must have a parent issue.
    
    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param int $projectId The ID of the project.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetHierarchyBadRequestException
    * @throws \JiraSdk\Exception\GetHierarchyUnauthorizedException
    * @throws \JiraSdk\Exception\GetHierarchyNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectIssueTypeHierarchy|\Psr\Http\Message\ResponseInterface
    */
    public function getHierarchy(int $projectId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetHierarchy($projectId), $fetch);
    }
    /**
     * Returns the [issue security scheme](https://confluence.atlassian.com/x/J4lKLg) associated with the project.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or the *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectKeyOrId The project ID or project key (case sensitive).
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetProjectIssueSecuritySchemeBadRequestException
     * @throws \JiraSdk\Exception\GetProjectIssueSecuritySchemeUnauthorizedException
     * @throws \JiraSdk\Exception\GetProjectIssueSecuritySchemeForbiddenException
     * @throws \JiraSdk\Exception\GetProjectIssueSecuritySchemeNotFoundException
     *
     * @return null|\JiraSdk\Model\SecurityScheme|\Psr\Http\Message\ResponseInterface
     */
    public function getProjectIssueSecurityScheme(string $projectKeyOrId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectIssueSecurityScheme($projectKeyOrId), $fetch);
    }
    /**
     * Gets a [notification scheme](https://confluence.atlassian.com/x/8YdKLg) associated with the project. Deprecated, use [Get notification schemes paginated](#api-rest-api-3-notificationscheme-get) supporting search and pagination.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectKeyOrId The project ID or project key (case sensitive).
     * @param array $queryParameters {
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `all` Returns all expandable information
     *  `field` Returns information about any custom fields assigned to receive an event
     *  `group` Returns information about any groups assigned to receive an event
     *  `notificationSchemeEvents` Returns a list of event associations. This list is returned for all expandable information
     *  `projectRole` Returns information about any project roles assigned to receive an event
     *  `user` Returns information about any users assigned to receive an event
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetNotificationSchemeForProjectBadRequestException
     * @throws \JiraSdk\Exception\GetNotificationSchemeForProjectUnauthorizedException
     * @throws \JiraSdk\Exception\GetNotificationSchemeForProjectNotFoundException
     *
     * @return null|\JiraSdk\Model\NotificationScheme|\Psr\Http\Message\ResponseInterface
     */
    public function getNotificationSchemeForProject(string $projectKeyOrId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetNotificationSchemeForProject($projectKeyOrId, $queryParameters), $fetch);
    }
    /**
     * Gets the [permission scheme](https://confluence.atlassian.com/x/yodKLg) associated with the project.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectKeyOrId The project ID or project key (case sensitive).
     * @param array $queryParameters {
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are included when you specify any value. Expand options include:
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAssignedPermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\GetAssignedPermissionSchemeForbiddenException
     * @throws \JiraSdk\Exception\GetAssignedPermissionSchemeNotFoundException
     *
     * @return null|\JiraSdk\Model\PermissionScheme|\Psr\Http\Message\ResponseInterface
     */
    public function getAssignedPermissionScheme(string $projectKeyOrId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAssignedPermissionScheme($projectKeyOrId, $queryParameters), $fetch);
    }
    /**
     * Assigns a permission scheme with a project. See [Managing project permissions](https://confluence.atlassian.com/x/yodKLg) for more information about permission schemes.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg)
     *
     * @param string $projectKeyOrId The project ID or project key (case sensitive).
     * @param \JiraSdk\Model\IdBean $requestBody 
     * @param array $queryParameters {
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are included when you specify any value. Expand options include:
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\AssignPermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\AssignPermissionSchemeForbiddenException
     * @throws \JiraSdk\Exception\AssignPermissionSchemeNotFoundException
     *
     * @return null|\JiraSdk\Model\PermissionScheme|\Psr\Http\Message\ResponseInterface
     */
    public function assignPermissionScheme(string $projectKeyOrId, \JiraSdk\Model\IdBean $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AssignPermissionScheme($projectKeyOrId, $requestBody, $queryParameters), $fetch);
    }
    /**
    * Returns all [issue security](https://confluence.atlassian.com/x/J4lKLg) levels for the project that the user has access to.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse projects* [global permission](https://confluence.atlassian.com/x/x4dKLg) for the project, however, issue security levels are only returned for authenticated user with *Set Issue Security* [global permission](https://confluence.atlassian.com/x/x4dKLg) for the project.
    *
    * @param string $projectKeyOrId The project ID or project key (case sensitive).
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetSecurityLevelsForProjectNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectIssueSecurityLevels|\Psr\Http\Message\ResponseInterface
    */
    public function getSecurityLevelsForProject(string $projectKeyOrId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetSecurityLevelsForProject($projectKeyOrId), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAllProjectCategoriesUnauthorizedException
     *
     * @return null|\JiraSdk\Model\ProjectCategory[]|\Psr\Http\Message\ResponseInterface
     */
    public function getAllProjectCategories(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllProjectCategories(), $fetch);
    }
    /**
     * Creates a project category.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\ProjectCategory $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateProjectCategoryBadRequestException
     * @throws \JiraSdk\Exception\CreateProjectCategoryUnauthorizedException
     * @throws \JiraSdk\Exception\CreateProjectCategoryForbiddenException
     * @throws \JiraSdk\Exception\CreateProjectCategoryConflictException
     *
     * @return null|\JiraSdk\Model\ProjectCategory|\Psr\Http\Message\ResponseInterface
     */
    public function createProjectCategory(\JiraSdk\Model\ProjectCategory $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateProjectCategory($requestBody), $fetch);
    }
    /**
     * Deletes a project category.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id ID of the project category to delete.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\RemoveProjectCategoryUnauthorizedException
     * @throws \JiraSdk\Exception\RemoveProjectCategoryForbiddenException
     * @throws \JiraSdk\Exception\RemoveProjectCategoryNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function removeProjectCategory(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveProjectCategory($id), $fetch);
    }
    /**
     * Returns a project category.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param int $id The ID of the project category.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetProjectCategoryByIdUnauthorizedException
     * @throws \JiraSdk\Exception\GetProjectCategoryByIdNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectCategory|\Psr\Http\Message\ResponseInterface
     */
    public function getProjectCategoryById(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectCategoryById($id), $fetch);
    }
    /**
     * Updates a project category.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id 
     * @param \JiraSdk\Model\ProjectCategory $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateProjectCategoryBadRequestException
     * @throws \JiraSdk\Exception\UpdateProjectCategoryUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateProjectCategoryForbiddenException
     * @throws \JiraSdk\Exception\UpdateProjectCategoryNotFoundException
     *
     * @return null|\JiraSdk\Model\UpdatedProjectCategory|\Psr\Http\Message\ResponseInterface
     */
    public function updateProjectCategory(int $id, \JiraSdk\Model\ProjectCategory $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateProjectCategory($id, $requestBody), $fetch);
    }
    /**
     * Validates a project key by confirming the key is a valid string and not in use.
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *     @var string $key The project key.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\ValidateProjectKeyUnauthorizedException
     *
     * @return null|\JiraSdk\Model\ErrorCollection|\Psr\Http\Message\ResponseInterface
     */
    public function validateProjectKey(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\ValidateProjectKey($queryParameters), $fetch);
    }
    /**
     * Validates a project key and, if the key is invalid or in use, generates a valid random string for the project key.
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *     @var string $key The project key.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetValidProjectKeyUnauthorizedException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function getValidProjectKey(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetValidProjectKey($queryParameters), $fetch);
    }
    /**
     * Checks that a project name isn't in use. If the name isn't in use, the passed string is returned. If the name is in use, this operation attempts to generate a valid project name based on the one supplied, usually by adding a sequence number. If a valid project name cannot be generated, a 404 response is returned.
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *     @var string $name The project name.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetValidProjectNameBadRequestException
     * @throws \JiraSdk\Exception\GetValidProjectNameUnauthorizedException
     * @throws \JiraSdk\Exception\GetValidProjectNameNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function getValidProjectName(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetValidProjectName($queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetResolutionsUnauthorizedException
     *
     * @return null|\JiraSdk\Model\Resolution[]|\Psr\Http\Message\ResponseInterface
     */
    public function getResolutions(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetResolutions(), $fetch);
    }
    /**
     * Creates an issue resolution.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\CreateResolutionDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateResolutionBadRequestException
     * @throws \JiraSdk\Exception\CreateResolutionUnauthorizedException
     * @throws \JiraSdk\Exception\CreateResolutionForbiddenException
     *
     * @return null|\JiraSdk\Model\ResolutionId|\Psr\Http\Message\ResponseInterface
     */
    public function createResolution(\JiraSdk\Model\CreateResolutionDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateResolution($requestBody), $fetch);
    }
    /**
     * Sets default issue resolution.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\SetDefaultResolutionRequest $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\SetDefaultResolutionBadRequestException
     * @throws \JiraSdk\Exception\SetDefaultResolutionUnauthorizedException
     * @throws \JiraSdk\Exception\SetDefaultResolutionForbiddenException
     * @throws \JiraSdk\Exception\SetDefaultResolutionNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function setDefaultResolution(\JiraSdk\Model\SetDefaultResolutionRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetDefaultResolution($requestBody), $fetch);
    }
    /**
     * Changes the order of issue resolutions.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\ReorderIssueResolutionsRequest $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\MoveResolutionsBadRequestException
     * @throws \JiraSdk\Exception\MoveResolutionsUnauthorizedException
     * @throws \JiraSdk\Exception\MoveResolutionsForbiddenException
     * @throws \JiraSdk\Exception\MoveResolutionsNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function moveResolutions(\JiraSdk\Model\ReorderIssueResolutionsRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\MoveResolutions($requestBody), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) list of resolutions. The list can contain all resolutions or a subset determined by any combination of these criteria:
     *  a list of resolutions IDs.
     *  whether the field configuration is a default. This returns resolutions from company-managed (classic) projects only, as there is no concept of default resolutions in team-managed projects.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     *     @var array $id The list of resolutions IDs to be filtered out
     *     @var bool $onlyDefault When set to true, return default only, when IDs provided, if none of them is default, return empty page. Default value is false
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\SearchResolutionsUnauthorizedException
     *
     * @return null|\JiraSdk\Model\PageBeanResolutionJsonBean|\Psr\Http\Message\ResponseInterface
     */
    public function searchResolutions(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SearchResolutions($queryParameters), $fetch);
    }
    /**
    * Deletes an issue resolution.
    
    This operation is [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $id The ID of the issue resolution.
    * @param array $queryParameters {
    *     @var string $replaceWith The ID of the issue resolution that will replace the currently selected resolution.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteResolutionBadRequestException
    * @throws \JiraSdk\Exception\DeleteResolutionUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteResolutionForbiddenException
    * @throws \JiraSdk\Exception\DeleteResolutionNotFoundException
    * @throws \JiraSdk\Exception\DeleteResolutionConflictException
    *
    * @return null|\JiraSdk\Model\TaskProgressBeanObject|\Psr\Http\Message\ResponseInterface
    */
    public function deleteResolution(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteResolution($id, $queryParameters), $fetch);
    }
    /**
     * Returns an issue resolution value.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param string $id The ID of the issue resolution value.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetResolutionUnauthorizedException
     * @throws \JiraSdk\Exception\GetResolutionNotFoundException
     *
     * @return null|\JiraSdk\Model\Resolution|\Psr\Http\Message\ResponseInterface
     */
    public function getResolution(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetResolution($id), $fetch);
    }
    /**
     * Updates an issue resolution.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id The ID of the issue resolution.
     * @param \JiraSdk\Model\UpdateResolutionDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateResolutionBadRequestException
     * @throws \JiraSdk\Exception\UpdateResolutionUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateResolutionForbiddenException
     * @throws \JiraSdk\Exception\UpdateResolutionNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function updateResolution(string $id, \JiraSdk\Model\UpdateResolutionDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateResolution($id, $requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAllProjectRolesUnauthorizedException
     * @throws \JiraSdk\Exception\GetAllProjectRolesForbiddenException
     *
     * @return null|\JiraSdk\Model\ProjectRole[]|\Psr\Http\Message\ResponseInterface
     */
    public function getAllProjectRoles(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllProjectRoles(), $fetch);
    }
    /**
     * Creates a new project role with no [default actors](#api-rest-api-3-resolution-get). You can use the [Add default actors to project role](#api-rest-api-3-role-id-actors-post) operation to add default actors to the project role after creating it.
     *Note that although a new project role is available to all projects upon creation, any default actors that are associated with the project role are not added to projects that existed prior to the role being created.*<
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\CreateUpdateRoleRequestBean $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateProjectRoleBadRequestException
     * @throws \JiraSdk\Exception\CreateProjectRoleUnauthorizedException
     * @throws \JiraSdk\Exception\CreateProjectRoleForbiddenException
     * @throws \JiraSdk\Exception\CreateProjectRoleConflictException
     *
     * @return null|\JiraSdk\Model\ProjectRole|\Psr\Http\Message\ResponseInterface
     */
    public function createProjectRole(\JiraSdk\Model\CreateUpdateRoleRequestBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateProjectRole($requestBody), $fetch);
    }
    /**
     * Deletes a project role. You must specify a replacement project role if you wish to delete a project role that is in use.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the project role to delete. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param array $queryParameters {
     *     @var int $swap The ID of the project role that will replace the one being deleted.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteProjectRoleBadRequestException
     * @throws \JiraSdk\Exception\DeleteProjectRoleUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteProjectRoleForbiddenException
     * @throws \JiraSdk\Exception\DeleteProjectRoleNotFoundException
     * @throws \JiraSdk\Exception\DeleteProjectRoleConflictException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteProjectRole(int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteProjectRole($id, $queryParameters), $fetch);
    }
    /**
     * Gets the project role details and the default actors associated with the role. The list of default actors is sorted by display name.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetProjectRoleByIdUnauthorizedException
     * @throws \JiraSdk\Exception\GetProjectRoleByIdForbiddenException
     * @throws \JiraSdk\Exception\GetProjectRoleByIdNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectRole|\Psr\Http\Message\ResponseInterface
     */
    public function getProjectRoleById(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectRoleById($id), $fetch);
    }
    /**
    * Updates either the project role's name or its description.
    
    You cannot update both the name and description at the same time using this operation. If you send a request with a name and a description only the name is updated.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
    * @param \JiraSdk\Model\CreateUpdateRoleRequestBean $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\PartialUpdateProjectRoleBadRequestException
    * @throws \JiraSdk\Exception\PartialUpdateProjectRoleUnauthorizedException
    * @throws \JiraSdk\Exception\PartialUpdateProjectRoleForbiddenException
    * @throws \JiraSdk\Exception\PartialUpdateProjectRoleNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectRole|\Psr\Http\Message\ResponseInterface
    */
    public function partialUpdateProjectRole(int $id, \JiraSdk\Model\CreateUpdateRoleRequestBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\PartialUpdateProjectRole($id, $requestBody), $fetch);
    }
    /**
     * Updates the project role's name and description. You must include both a name and a description in the request.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param \JiraSdk\Model\CreateUpdateRoleRequestBean $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\FullyUpdateProjectRoleBadRequestException
     * @throws \JiraSdk\Exception\FullyUpdateProjectRoleUnauthorizedException
     * @throws \JiraSdk\Exception\FullyUpdateProjectRoleForbiddenException
     * @throws \JiraSdk\Exception\FullyUpdateProjectRoleNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectRole|\Psr\Http\Message\ResponseInterface
     */
    public function fullyUpdateProjectRole(int $id, \JiraSdk\Model\CreateUpdateRoleRequestBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\FullyUpdateProjectRole($id, $requestBody), $fetch);
    }
    /**
    * Deletes the [default actors](#api-rest-api-3-resolution-get) from a project role. You may delete a group or user, but you cannot delete a group and a user in the same request.
    
    Changing a project role's default actors does not affect project role members for projects already created.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
    * @param array $queryParameters {
    *     @var string $user The user account ID of the user to remove as a default actor.
    *     @var string $groupId The group ID of the group to be removed as a default actor. This parameter cannot be used with the `group` parameter.
    *     @var string $group The group name of the group to be removed as a default actor.This parameter cannot be used with the `groupId` parameter. As a group's name can change, use of `groupId` is recommended.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteProjectRoleActorsFromRoleBadRequestException
    * @throws \JiraSdk\Exception\DeleteProjectRoleActorsFromRoleUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteProjectRoleActorsFromRoleForbiddenException
    * @throws \JiraSdk\Exception\DeleteProjectRoleActorsFromRoleNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectRole|\Psr\Http\Message\ResponseInterface
    */
    public function deleteProjectRoleActorsFromRole(int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteProjectRoleActorsFromRole($id, $queryParameters), $fetch);
    }
    /**
     * Returns the [default actors](#api-rest-api-3-resolution-get) for the project role.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetProjectRoleActorsForRoleBadRequestException
     * @throws \JiraSdk\Exception\GetProjectRoleActorsForRoleUnauthorizedException
     * @throws \JiraSdk\Exception\GetProjectRoleActorsForRoleForbiddenException
     * @throws \JiraSdk\Exception\GetProjectRoleActorsForRoleNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectRole|\Psr\Http\Message\ResponseInterface
     */
    public function getProjectRoleActorsForRole(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetProjectRoleActorsForRole($id), $fetch);
    }
    /**
    * Adds [default actors](#api-rest-api-3-resolution-get) to a role. You may add groups or users, but you cannot add groups and users in the same request.
    
    Changing a project role's default actors does not affect project role members for projects already created.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
    * @param \JiraSdk\Model\ActorInputBean $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AddProjectRoleActorsToRoleBadRequestException
    * @throws \JiraSdk\Exception\AddProjectRoleActorsToRoleUnauthorizedException
    * @throws \JiraSdk\Exception\AddProjectRoleActorsToRoleForbiddenException
    * @throws \JiraSdk\Exception\AddProjectRoleActorsToRoleNotFoundException
    *
    * @return null|\JiraSdk\Model\ProjectRole|\Psr\Http\Message\ResponseInterface
    */
    public function addProjectRoleActorsToRole(int $id, \JiraSdk\Model\ActorInputBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddProjectRoleActorsToRole($id, $requestBody), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) list of all screens or those specified by one or more screen IDs.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     *     @var array $id The list of screen IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
     *     @var string $queryString String used to perform a case-insensitive partial match with screen name.
     *     @var array $scope The scope filter string. To filter by multiple scope, provide an ampersand-separated list. For example, `scope=GLOBAL&scope=PROJECT`.
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *  `id` Sorts by screen ID.
     *  `name` Sorts by screen name.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetScreensUnauthorizedException
     * @throws \JiraSdk\Exception\GetScreensForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanScreen|\Psr\Http\Message\ResponseInterface
     */
    public function getScreens(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetScreens($queryParameters), $fetch);
    }
    /**
     * Creates a screen with a default field tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\ScreenDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateScreenBadRequestException
     * @throws \JiraSdk\Exception\CreateScreenUnauthorizedException
     * @throws \JiraSdk\Exception\CreateScreenForbiddenException
     *
     * @return null|\JiraSdk\Model\Screen|\Psr\Http\Message\ResponseInterface
     */
    public function createScreen(\JiraSdk\Model\ScreenDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateScreen($requestBody), $fetch);
    }
    /**
     * Adds a field to the default tab of the default screen.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId The ID of the field.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\AddFieldToDefaultScreenUnauthorizedException
     * @throws \JiraSdk\Exception\AddFieldToDefaultScreenForbiddenException
     * @throws \JiraSdk\Exception\AddFieldToDefaultScreenNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function addFieldToDefaultScreen(string $fieldId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddFieldToDefaultScreen($fieldId), $fetch);
    }
    /**
    * Deletes a screen. A screen cannot be deleted if it is used in a screen scheme, workflow, or workflow draft.
    
    Only screens used in classic projects can be deleted.
    *
    * @param int $screenId The ID of the screen.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteScreenBadRequestException
    * @throws \JiraSdk\Exception\DeleteScreenUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteScreenForbiddenException
    * @throws \JiraSdk\Exception\DeleteScreenNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteScreen(int $screenId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteScreen($screenId), $fetch);
    }
    /**
     * Updates a screen. Only screens used in classic projects can be updated.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId The ID of the screen.
     * @param \JiraSdk\Model\UpdateScreenDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateScreenBadRequestException
     * @throws \JiraSdk\Exception\UpdateScreenUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateScreenForbiddenException
     * @throws \JiraSdk\Exception\UpdateScreenNotFoundException
     *
     * @return null|\JiraSdk\Model\Screen|\Psr\Http\Message\ResponseInterface
     */
    public function updateScreen(int $screenId, \JiraSdk\Model\UpdateScreenDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateScreen($screenId, $requestBody), $fetch);
    }
    /**
     * Returns the fields that can be added to a tab on a screen.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId The ID of the screen.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAvailableScreenFieldsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAvailableScreenFieldsForbiddenException
     * @throws \JiraSdk\Exception\GetAvailableScreenFieldsNotFoundException
     *
     * @return null|\JiraSdk\Model\ScreenableField[]|\Psr\Http\Message\ResponseInterface
     */
    public function getAvailableScreenFields(int $screenId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAvailableScreenFields($screenId), $fetch);
    }
    /**
     * Returns the list of tabs for a screen.
     **[Permissions](#permissions) required:**
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) when the project key is specified, providing that the screen is associated with the project through a Screen Scheme and Issue Type Screen Scheme.
     *
     * @param int $screenId The ID of the screen.
     * @param array $queryParameters {
     *     @var string $projectKey The key of the project.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAllScreenTabsBadRequestException
     * @throws \JiraSdk\Exception\GetAllScreenTabsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAllScreenTabsForbiddenException
     * @throws \JiraSdk\Exception\GetAllScreenTabsNotFoundException
     *
     * @return null|\JiraSdk\Model\ScreenableTab[]|\Psr\Http\Message\ResponseInterface
     */
    public function getAllScreenTabs(int $screenId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllScreenTabs($screenId, $queryParameters), $fetch);
    }
    /**
     * Creates a tab for a screen.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId The ID of the screen.
     * @param \JiraSdk\Model\ScreenableTab $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\AddScreenTabBadRequestException
     * @throws \JiraSdk\Exception\AddScreenTabUnauthorizedException
     * @throws \JiraSdk\Exception\AddScreenTabForbiddenException
     * @throws \JiraSdk\Exception\AddScreenTabNotFoundException
     *
     * @return null|\JiraSdk\Model\ScreenableTab|\Psr\Http\Message\ResponseInterface
     */
    public function addScreenTab(int $screenId, \JiraSdk\Model\ScreenableTab $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddScreenTab($screenId, $requestBody), $fetch);
    }
    /**
     * Deletes a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteScreenTabUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteScreenTabForbiddenException
     * @throws \JiraSdk\Exception\DeleteScreenTabNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteScreenTab(int $screenId, int $tabId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteScreenTab($screenId, $tabId), $fetch);
    }
    /**
     * Updates the name of a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param \JiraSdk\Model\ScreenableTab $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\RenameScreenTabBadRequestException
     * @throws \JiraSdk\Exception\RenameScreenTabUnauthorizedException
     * @throws \JiraSdk\Exception\RenameScreenTabForbiddenException
     * @throws \JiraSdk\Exception\RenameScreenTabNotFoundException
     *
     * @return null|\JiraSdk\Model\ScreenableTab|\Psr\Http\Message\ResponseInterface
     */
    public function renameScreenTab(int $screenId, int $tabId, \JiraSdk\Model\ScreenableTab $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RenameScreenTab($screenId, $tabId, $requestBody), $fetch);
    }
    /**
     * Returns all fields for a screen tab.
     **[Permissions](#permissions) required:**
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) when the project key is specified, providing that the screen is associated with the project through a Screen Scheme and Issue Type Screen Scheme.
     *
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param array $queryParameters {
     *     @var string $projectKey The key of the project.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAllScreenTabFieldsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAllScreenTabFieldsForbiddenException
     * @throws \JiraSdk\Exception\GetAllScreenTabFieldsNotFoundException
     *
     * @return null|\JiraSdk\Model\ScreenableField[]|\Psr\Http\Message\ResponseInterface
     */
    public function getAllScreenTabFields(int $screenId, int $tabId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllScreenTabFields($screenId, $tabId, $queryParameters), $fetch);
    }
    /**
     * Adds a field to a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param \JiraSdk\Model\AddFieldBean $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\AddScreenTabFieldBadRequestException
     * @throws \JiraSdk\Exception\AddScreenTabFieldUnauthorizedException
     * @throws \JiraSdk\Exception\AddScreenTabFieldForbiddenException
     * @throws \JiraSdk\Exception\AddScreenTabFieldNotFoundException
     *
     * @return null|\JiraSdk\Model\ScreenableField|\Psr\Http\Message\ResponseInterface
     */
    public function addScreenTabField(int $screenId, int $tabId, \JiraSdk\Model\AddFieldBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddScreenTabField($screenId, $tabId, $requestBody), $fetch);
    }
    /**
     * Removes a field from a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param string $id The ID of the field.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\RemoveScreenTabFieldBadRequestException
     * @throws \JiraSdk\Exception\RemoveScreenTabFieldUnauthorizedException
     * @throws \JiraSdk\Exception\RemoveScreenTabFieldForbiddenException
     * @throws \JiraSdk\Exception\RemoveScreenTabFieldNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function removeScreenTabField(int $screenId, int $tabId, string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveScreenTabField($screenId, $tabId, $id), $fetch);
    }
    /**
    * Moves a screen tab field.
    
    If `after` and `position` are provided in the request, `position` is ignored.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $screenId The ID of the screen.
    * @param int $tabId The ID of the screen tab.
    * @param string $id The ID of the field.
    * @param \JiraSdk\Model\MoveFieldBean $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\MoveScreenTabFieldBadRequestException
    * @throws \JiraSdk\Exception\MoveScreenTabFieldUnauthorizedException
    * @throws \JiraSdk\Exception\MoveScreenTabFieldForbiddenException
    * @throws \JiraSdk\Exception\MoveScreenTabFieldNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function moveScreenTabField(int $screenId, int $tabId, string $id, \JiraSdk\Model\MoveFieldBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\MoveScreenTabField($screenId, $tabId, $id, $requestBody), $fetch);
    }
    /**
     * Moves a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $screenId The ID of the screen.
     * @param int $tabId The ID of the screen tab.
     * @param int $pos The position of tab. The base index is 0.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\MoveScreenTabBadRequestException
     * @throws \JiraSdk\Exception\MoveScreenTabUnauthorizedException
     * @throws \JiraSdk\Exception\MoveScreenTabForbiddenException
     * @throws \JiraSdk\Exception\MoveScreenTabNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function moveScreenTab(int $screenId, int $tabId, int $pos, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\MoveScreenTab($screenId, $tabId, $pos), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of screen schemes.
    
    Only screen schemes used in classic projects are returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $id The list of screen scheme IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
    *     @var string $expand Use [expand](#expansion) include additional information in the response. This parameter accepts `issueTypeScreenSchemes` that, for each screen schemes, returns information about the issue type screen scheme the screen scheme is assigned to.
    *     @var string $queryString String used to perform a case-insensitive partial match with screen scheme name.
    *     @var string $orderBy [Order](#ordering) the results by a field:
    
    *  `id` Sorts by screen scheme ID.
    *  `name` Sorts by screen scheme name.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetScreenSchemesUnauthorizedException
    * @throws \JiraSdk\Exception\GetScreenSchemesForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanScreenScheme|\Psr\Http\Message\ResponseInterface
    */
    public function getScreenSchemes(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetScreenSchemes($queryParameters), $fetch);
    }
    /**
     * Creates a screen scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\ScreenSchemeDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateScreenSchemeBadRequestException
     * @throws \JiraSdk\Exception\CreateScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\CreateScreenSchemeForbiddenException
     * @throws \JiraSdk\Exception\CreateScreenSchemeNotFoundException
     *
     * @return null|\JiraSdk\Model\ScreenSchemeId|\Psr\Http\Message\ResponseInterface
     */
    public function createScreenScheme(\JiraSdk\Model\ScreenSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateScreenScheme($requestBody), $fetch);
    }
    /**
    * Deletes a screen scheme. A screen scheme cannot be deleted if it is used in an issue type screen scheme.
    
    Only screens schemes used in classic projects can be deleted.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $screenSchemeId The ID of the screen scheme.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteScreenSchemeBadRequestException
    * @throws \JiraSdk\Exception\DeleteScreenSchemeUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteScreenSchemeForbiddenException
    * @throws \JiraSdk\Exception\DeleteScreenSchemeNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteScreenScheme(string $screenSchemeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteScreenScheme($screenSchemeId), $fetch);
    }
    /**
     * Updates a screen scheme. Only screen schemes used in classic projects can be updated.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $screenSchemeId The ID of the screen scheme.
     * @param \JiraSdk\Model\UpdateScreenSchemeDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateScreenSchemeBadRequestException
     * @throws \JiraSdk\Exception\UpdateScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateScreenSchemeForbiddenException
     * @throws \JiraSdk\Exception\UpdateScreenSchemeNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function updateScreenScheme(string $screenSchemeId, \JiraSdk\Model\UpdateScreenSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateScreenScheme($screenSchemeId, $requestBody), $fetch);
    }
    /**
    * Searches for issues using [JQL](https://confluence.atlassian.com/x/egORLQ).
    
    If the JQL query expression is too large to be encoded as a query parameter, use the [POST](#api-rest-api-3-search-post) version of this resource.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** Issues are included in the response where the user has:
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param array $queryParameters {
    *     @var string $jql The [JQL](https://confluence.atlassian.com/x/egORLQ) that defines the search. Note:
    
    *  If no JQL expression is provided, all issues are returned.
    *  `username` and `userkey` cannot be used as search terms due to privacy reasons. Use `accountId` instead.
    *  If a user has hidden their email address in their user profile, partial matches of the email address will not find the user. An exact match is required.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page. To manage page size, Jira may return fewer items per page where a large number of fields are requested. The greatest number of items returned per page is achieved when requesting `id` or `key` only.
    *     @var string $validateQuery Determines how to validate the JQL query and treat the validation results. Supported values are:
    
    *  `strict` Returns a 400 response code if any errors are found, along with a list of all errors (and warnings).
    *  `warn` Returns all errors as warnings.
    *  `none` No validation is performed.
    *  `true` *Deprecated* A legacy synonym for `strict`.
    *  `false` *Deprecated* A legacy synonym for `warn`.
    
    Note: If the JQL is not correctly formed a 400 response code is returned, regardless of the `validateQuery` value.
    *     @var array $fields A list of fields to return for each issue, use it to retrieve a subset of fields. This parameter accepts a comma-separated list. Expand options include:
    
    *  `*all` Returns all fields.
    *  `*navigable` Returns navigable fields.
    *  Any issue field, prefixed with a minus to exclude.
    
    Examples:
    
    *  `summary,comment` Returns only the summary and comments fields.
    *  `-description` Returns all navigable (default) fields except description.
    *  `*all,-comment` Returns all fields except comments.
    
    This parameter may be specified multiple times. For example, `fields=field1,field2&fields=field3`.
    
    Note: All navigable fields are returned by default. This differs from [GET issue](#api-rest-api-3-issue-issueIdOrKey-get) where the default is all fields.
    *     @var string $expand Use [expand](#expansion) to include additional information about issues in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `renderedFields` Returns field values rendered in HTML format.
    *  `names` Returns the display name of each field.
    *  `schema` Returns the schema describing a field type.
    *  `transitions` Returns all possible transitions for the issue.
    *  `operations` Returns all possible operations for the issue.
    *  `editmeta` Returns information about how each field can be edited.
    *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.
    *  `versionedRepresentations` Instead of `fields`, returns `versionedRepresentations` a JSON array containing each version of a field's value, with the highest numbered item representing the most recent version.
    *     @var array $properties A list of issue property keys for issue properties to include in the results. This parameter accepts a comma-separated list. Multiple properties can also be provided using an ampersand separated list. For example, `properties=prop1,prop2&properties=prop3`. A maximum of 5 issue property keys can be specified.
    *     @var bool $fieldsByKeys Reference fields by their key (rather than ID).
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SearchForIssuesUsingJqlBadRequestException
    * @throws \JiraSdk\Exception\SearchForIssuesUsingJqlUnauthorizedException
    *
    * @return null|\JiraSdk\Model\SearchResults|\Psr\Http\Message\ResponseInterface
    */
    public function searchForIssuesUsingJql(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SearchForIssuesUsingJql($queryParameters), $fetch);
    }
    /**
    * Searches for issues using [JQL](https://confluence.atlassian.com/x/egORLQ).
    
    There is a [GET](#api-rest-api-3-search-get) version of this resource that can be used for smaller JQL query expressions.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** Issues are included in the response where the user has:
    
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
    *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
    *
    * @param \JiraSdk\Model\SearchRequestBean $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SearchForIssuesUsingJqlPostBadRequestException
    * @throws \JiraSdk\Exception\SearchForIssuesUsingJqlPostUnauthorizedException
    *
    * @return null|\JiraSdk\Model\SearchResults|\Psr\Http\Message\ResponseInterface
    */
    public function searchForIssuesUsingJqlPost(\JiraSdk\Model\SearchRequestBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SearchForIssuesUsingJqlPost($requestBody), $fetch);
    }
    /**
    * Returns details of an issue security level.
    
    Use [Get issue security scheme](#api-rest-api-3-issuesecurityschemes-id-get) to obtain the IDs of issue security levels associated with the issue security scheme.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param string $id The ID of the issue security level.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIssueSecurityLevelUnauthorizedException
    * @throws \JiraSdk\Exception\GetIssueSecurityLevelNotFoundException
    *
    * @return null|\JiraSdk\Model\SecurityLevel|\Psr\Http\Message\ResponseInterface
    */
    public function getIssueSecurityLevel(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueSecurityLevel($id), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetServerInfoUnauthorizedException
     *
     * @return null|\JiraSdk\Model\ServerInformation|\Psr\Http\Message\ResponseInterface
     */
    public function getServerInfo(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetServerInfo(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetIssueNavigatorDefaultColumnsUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueNavigatorDefaultColumnsForbiddenException
     *
     * @return null|\JiraSdk\Model\ColumnItem[]|\Psr\Http\Message\ResponseInterface
     */
    public function getIssueNavigatorDefaultColumns(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIssueNavigatorDefaultColumns(), $fetch);
    }
    /**
    * Sets the default issue navigator columns.
    
    The `columns` parameter accepts a navigable field value and is expressed as HTML form data. To specify multiple columns, pass multiple `columns` parameters. For example, in curl:
    
    `curl -X PUT -d columns=summary -d columns=description https://your-domain.atlassian.net/rest/api/3/settings/columns`
    
    If no column details are sent, then all default columns are removed.
    
    A navigable field is one that can be used as a column on the issue navigator. Find details of navigable issue columns using [Get fields](#api-rest-api-3-field-get).
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param null|array[] $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetIssueNavigatorDefaultColumnsBadRequestException
    * @throws \JiraSdk\Exception\SetIssueNavigatorDefaultColumnsUnauthorizedException
    * @throws \JiraSdk\Exception\SetIssueNavigatorDefaultColumnsForbiddenException
    * @throws \JiraSdk\Exception\SetIssueNavigatorDefaultColumnsNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function setIssueNavigatorDefaultColumns(?array $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetIssueNavigatorDefaultColumns($requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetStatusesUnauthorizedException
     *
     * @return null|\JiraSdk\Model\StatusDetails[]|\Psr\Http\Message\ResponseInterface
     */
    public function getStatuses(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetStatuses(), $fetch);
    }
    /**
    * Returns a status. The status must be associated with an active workflow to be returned.
    
    If a name is used on more than one status, only the status found first is returned. Therefore, identifying the status by its ID may be preferable.
    
    This operation can be accessed anonymously.
    
    [Permissions](#permissions) required: None.
    *
    * @param string $idOrName The ID or name of the status.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetStatusUnauthorizedException
    * @throws \JiraSdk\Exception\GetStatusNotFoundException
    *
    * @return null|\JiraSdk\Model\StatusDetails|\Psr\Http\Message\ResponseInterface
    */
    public function getStatus(string $idOrName, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetStatus($idOrName), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetStatusCategoriesUnauthorizedException
     *
     * @return null|\JiraSdk\Model\StatusCategory[]|\Psr\Http\Message\ResponseInterface
     */
    public function getStatusCategories(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetStatusCategories(), $fetch);
    }
    /**
     * Returns a status category. Status categories provided a mechanism for categorizing [statuses](#api-rest-api-3-status-idOrName-get).
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param string $idOrKey The ID or key of the status category.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetStatusCategoryUnauthorizedException
     * @throws \JiraSdk\Exception\GetStatusCategoryNotFoundException
     *
     * @return null|\JiraSdk\Model\StatusCategory|\Psr\Http\Message\ResponseInterface
     */
    public function getStatusCategory(string $idOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetStatusCategory($idOrKey), $fetch);
    }
    /**
    * Deletes statuses by ID.
    
    **[Permissions](#permissions) required:**
    
    *  *Administer projects* [project permission.](https://confluence.atlassian.com/x/yodKLg)
    *  *Administer Jira* [project permission.](https://confluence.atlassian.com/x/yodKLg)
    *
    * @param array $queryParameters {
    *     @var array $id The list of status IDs. To include multiple IDs, provide an ampersand-separated list. For example, id=10000&id=10001.
    
    Min items `1`, Max items `50`
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteStatusesByIdBadRequestException
    * @throws \JiraSdk\Exception\DeleteStatusesByIdUnauthorizedException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteStatusesById(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteStatusesById($queryParameters), $fetch);
    }
    /**
    * Returns a list of the statuses specified by one or more status IDs.
    
    **[Permissions](#permissions) required:**
    
    *  *Administer projects* [project permission.](https://confluence.atlassian.com/x/yodKLg)
    *  *Administer Jira* [project permission.](https://confluence.atlassian.com/x/yodKLg)
    *
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `usages` Returns the project and issue types that use the status in their workflow.
    *     @var array $id The list of status IDs. To include multiple IDs, provide an ampersand-separated list. For example, id=10000&id=10001.
    
    Min items `1`, Max items `50`
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetStatusesByIdBadRequestException
    * @throws \JiraSdk\Exception\GetStatusesByIdUnauthorizedException
    *
    * @return null|\JiraSdk\Model\JiraStatus[]|\Psr\Http\Message\ResponseInterface
    */
    public function getStatusesById(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetStatusesById($queryParameters), $fetch);
    }
    /**
     * Creates statuses for a global or project scope.
     **[Permissions](#permissions) required:**
     *  *Administer projects* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *  *Administer Jira* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *
     * @param \JiraSdk\Model\StatusCreateRequest $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateStatusesBadRequestException
     * @throws \JiraSdk\Exception\CreateStatusesUnauthorizedException
     *
     * @return null|\JiraSdk\Model\JiraStatus[]|\Psr\Http\Message\ResponseInterface
     */
    public function createStatuses(\JiraSdk\Model\StatusCreateRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateStatuses($requestBody), $fetch);
    }
    /**
     * Updates statuses by ID.
     **[Permissions](#permissions) required:**
     *  *Administer projects* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *  *Administer Jira* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *
     * @param \JiraSdk\Model\StatusUpdateRequest $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateStatusesBadRequestException
     * @throws \JiraSdk\Exception\UpdateStatusesUnauthorizedException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function updateStatuses(\JiraSdk\Model\StatusUpdateRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateStatuses($requestBody), $fetch);
    }
    /**
     * Returns a [paginated](https://developer.atlassian.com/cloud/jira/platform/rest/v3/intro/#pagination) list of statuses that match a search on name or project.
     **[Permissions](#permissions) required:**
     *  *Administer projects* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *  *Administer Jira* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *
     * @param array $queryParameters {
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `usages` Returns the project and issue types that use the status in their workflow.
     *     @var string $projectId The project the status is part of or null for global statuses.
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     *     @var string $searchString Term to match status names against or null to search for all statuses in the search scope.
     *     @var string $statusCategory Category of the status to filter by. The supported values are: `TODO`, `IN_PROGRESS`, and `DONE`.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\SearchBadRequestException
     * @throws \JiraSdk\Exception\SearchUnauthorizedException
     *
     * @return null|\JiraSdk\Model\PageOfStatuses|\Psr\Http\Message\ResponseInterface
     */
    public function search(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\Search($queryParameters), $fetch);
    }
    /**
    * Returns the status of a [long-running asynchronous task](#async).
    
    When a task has finished, this operation returns the JSON blob applicable to the task. See the documentation of the operation that created the task for details. Task details are not permanently retained. As of September 2019, details are retained for 14 days although this period may change without notice.
    
    **[Permissions](#permissions) required:** either of:
    
    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *  Creator of the task.
    *
    * @param string $taskId The ID of the task.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetTaskUnauthorizedException
    * @throws \JiraSdk\Exception\GetTaskForbiddenException
    * @throws \JiraSdk\Exception\GetTaskNotFoundException
    *
    * @return null|\JiraSdk\Model\TaskProgressBeanObject|\Psr\Http\Message\ResponseInterface
    */
    public function getTask(string $taskId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetTask($taskId), $fetch);
    }
    /**
     * Cancels a task.
     **[Permissions](#permissions) required:** either of:
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  Creator of the task.
     *
     * @param string $taskId The ID of the task.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CancelTaskBadRequestException
     * @throws \JiraSdk\Exception\CancelTaskUnauthorizedException
     * @throws \JiraSdk\Exception\CancelTaskForbiddenException
     * @throws \JiraSdk\Exception\CancelTaskNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function cancelTask(string $taskId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CancelTask($taskId), $fetch);
    }
    /**
     * Gets UI modifications. UI modifications can only be retrieved by Forge apps.
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `data` Returns UI modification data.
     *  `contexts` Returns UI modification contexts.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetUiModificationsBadRequestException
     * @throws \JiraSdk\Exception\GetUiModificationsUnauthorizedException
     * @throws \JiraSdk\Exception\GetUiModificationsForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanUiModificationDetails|\Psr\Http\Message\ResponseInterface
     */
    public function getUiModifications(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetUiModifications($queryParameters), $fetch);
    }
    /**
    * Creates a UI modification. UI modification can only be created by Forge apps.
    
    Each app can define up to 100 UI modifications. Each UI modification can define up to 1000 contexts.
    
    **[Permissions](#permissions) required:**
    
    *  *None* if the UI modification is created without contexts.
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for one or more projects, if the UI modification is created with contexts.
    *
    * @param \JiraSdk\Model\CreateUiModificationDetails $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateUiModificationBadRequestException
    * @throws \JiraSdk\Exception\CreateUiModificationUnauthorizedException
    * @throws \JiraSdk\Exception\CreateUiModificationForbiddenException
    * @throws \JiraSdk\Exception\CreateUiModificationNotFoundException
    *
    * @return null|\JiraSdk\Model\UiModificationIdentifiers|\Psr\Http\Message\ResponseInterface
    */
    public function createUiModification(\JiraSdk\Model\CreateUiModificationDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateUiModification($requestBody), $fetch);
    }
    /**
     * Deletes a UI modification. All the contexts that belong to the UI modification are deleted too. UI modification can only be deleted by Forge apps.
     **[Permissions](#permissions) required:** None.
     *
     * @param string $uiModificationId The ID of the UI modification.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteUiModificationUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteUiModificationForbiddenException
     * @throws \JiraSdk\Exception\DeleteUiModificationNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteUiModification(string $uiModificationId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteUiModification($uiModificationId), $fetch);
    }
    /**
    * Updates a UI modification. UI modification can only be updated by Forge apps.
    
    Each UI modification can define up to 1000 contexts.
    
    **[Permissions](#permissions) required:**
    
    *  *None* if the UI modification is created without contexts.
    *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for one or more projects, if the UI modification is created with contexts.
    *
    * @param string $uiModificationId The ID of the UI modification.
    * @param \JiraSdk\Model\UpdateUiModificationDetails $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateUiModificationBadRequestException
    * @throws \JiraSdk\Exception\UpdateUiModificationUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateUiModificationForbiddenException
    * @throws \JiraSdk\Exception\UpdateUiModificationNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function updateUiModification(string $uiModificationId, \JiraSdk\Model\UpdateUiModificationDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateUiModification($uiModificationId, $requestBody), $fetch);
    }
    /**
    * Returns the system and custom avatars for a project or issue type.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  for custom project avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project the avatar belongs to.
    *  for custom issue type avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one project the issue type is used in.
    *  for system avatars, none.
    *
    * @param string $type The avatar type.
    * @param string $entityId The ID of the item the avatar is associated with.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAvatarsUnauthorizedException
    * @throws \JiraSdk\Exception\GetAvatarsNotFoundException
    *
    * @return null|\JiraSdk\Model\Avatars|\Psr\Http\Message\ResponseInterface
    */
    public function getAvatars(string $type, string $entityId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAvatars($type, $entityId), $fetch);
    }
    /**
    * Loads a custom avatar for a project or issue type.
    
    Specify the avatar's local file location in the body of the request. Also, include the following headers:
    
    *  `X-Atlassian-Token: no-check` To prevent XSRF protection blocking the request, for more information see [Special Headers](#special-request-headers).
    *  `Content-Type: image/image type` Valid image types are JPEG, GIF, or PNG.
    
    For example:  
    `curl --request POST `
    
    `--user email@example.com:<api_token> `
    
    `--header 'X-Atlassian-Token: no-check' `
    
    `--header 'Content-Type: image/< image_type>' `
    
    `--data-binary "<@/path/to/file/with/your/avatar>" `
    
    `--url 'https://your-domain.atlassian.net/rest/api/3/universal_avatar/type/{type}/owner/{entityId}'`
    
    The avatar is cropped to a square. If no crop parameters are specified, the square originates at the top left of the image. The length of the square's sides is set to the smaller of the height or width of the image.
    
    The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size.
    
    After creating the avatar use:
    
    *  [Update issue type](#api-rest-api-3-issuetype-id-put) to set it as the issue type's displayed avatar.
    *  [Set project avatar](#api-rest-api-3-project-projectIdOrKey-avatar-put) to set it as the project's displayed avatar.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $type The avatar type.
    * @param string $entityId The ID of the item the avatar is associated with.
    * @param mixed $requestBody 
    * @param array $queryParameters {
    *     @var int $x The X coordinate of the top-left corner of the crop region.
    *     @var int $y The Y coordinate of the top-left corner of the crop region.
    *     @var int $size The length of each side of the crop region.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\StoreAvatarBadRequestException
    * @throws \JiraSdk\Exception\StoreAvatarUnauthorizedException
    * @throws \JiraSdk\Exception\StoreAvatarForbiddenException
    * @throws \JiraSdk\Exception\StoreAvatarNotFoundException
    *
    * @return null|\JiraSdk\Model\Avatar|\Psr\Http\Message\ResponseInterface
    */
    public function storeAvatar(string $type, string $entityId, $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\StoreAvatar($type, $entityId, $requestBody, $queryParameters), $fetch);
    }
    /**
     * Deletes an avatar from a project or issue type.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $type The avatar type.
     * @param string $owningObjectId The ID of the item the avatar is associated with.
     * @param int $id The ID of the avatar.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteAvatarBadRequestException
     * @throws \JiraSdk\Exception\DeleteAvatarForbiddenException
     * @throws \JiraSdk\Exception\DeleteAvatarNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteAvatar(string $type, string $owningObjectId, int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteAvatar($type, $owningObjectId, $id), $fetch);
    }
    /**
    * Returns the default project or issue type avatar image.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param string $type The icon type of the avatar.
    * @param array $queryParameters {
    *     @var string $size The size of the avatar image. If not provided the default size is returned.
    *     @var string $format The format to return the avatar image in. If not provided the original content format is returned.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @param array $accept Accept content header application/json|image/png|image/svg+xml|*/*
    * @throws \JiraSdk\Exception\GetAvatarImageByTypeUnauthorizedException
    * @throws \JiraSdk\Exception\GetAvatarImageByTypeForbiddenException
    * @throws \JiraSdk\Exception\GetAvatarImageByTypeNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function getAvatarImageByType(string $type, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT, array $accept = array())
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAvatarImageByType($type, $queryParameters, $accept), $fetch);
    }
    /**
    * Returns a project or issue type avatar image by ID.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  For system avatars, none.
    *  For custom project avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project the avatar belongs to.
    *  For custom issue type avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one project the issue type is used in.
    *
    * @param string $type The icon type of the avatar.
    * @param int $id The ID of the avatar.
    * @param array $queryParameters {
    *     @var string $size The size of the avatar image. If not provided the default size is returned.
    *     @var string $format The format to return the avatar image in. If not provided the original content format is returned.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @param array $accept Accept content header application/json|image/png|image/svg+xml|*/*
    * @throws \JiraSdk\Exception\GetAvatarImageByIDBadRequestException
    * @throws \JiraSdk\Exception\GetAvatarImageByIDUnauthorizedException
    * @throws \JiraSdk\Exception\GetAvatarImageByIDForbiddenException
    * @throws \JiraSdk\Exception\GetAvatarImageByIDNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function getAvatarImageByID(string $type, int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT, array $accept = array())
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAvatarImageByID($type, $id, $queryParameters, $accept), $fetch);
    }
    /**
    * Returns the avatar image for a project or issue type.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  For system avatars, none.
    *  For custom project avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project the avatar belongs to.
    *  For custom issue type avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one project the issue type is used in.
    *
    * @param string $type The icon type of the avatar.
    * @param string $entityId The ID of the project or issue type the avatar belongs to.
    * @param array $queryParameters {
    *     @var string $size The size of the avatar image. If not provided the default size is returned.
    *     @var string $format The format to return the avatar image in. If not provided the original content format is returned.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @param array $accept Accept content header application/json|image/png|image/svg+xml|*/*
    * @throws \JiraSdk\Exception\GetAvatarImageByOwnerBadRequestException
    * @throws \JiraSdk\Exception\GetAvatarImageByOwnerUnauthorizedException
    * @throws \JiraSdk\Exception\GetAvatarImageByOwnerForbiddenException
    * @throws \JiraSdk\Exception\GetAvatarImageByOwnerNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function getAvatarImageByOwner(string $type, string $entityId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT, array $accept = array())
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAvatarImageByOwner($type, $entityId, $queryParameters, $accept), $fetch);
    }
    /**
     * Deletes a user. If the operation completes successfully then the user is removed from Jira's user base. This operation does not delete the user's Atlassian account.
     **[Permissions](#permissions) required:** Site administration (that is, membership of the *site-admin* [group](https://confluence.atlassian.com/x/24xjL)).
     *
     * @param array $queryParameters {
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $key This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\RemoveUserBadRequestException
     * @throws \JiraSdk\Exception\RemoveUserUnauthorizedException
     * @throws \JiraSdk\Exception\RemoveUserForbiddenException
     * @throws \JiraSdk\Exception\RemoveUserNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function removeUser(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RemoveUser($queryParameters), $fetch);
    }
    /**
    * Returns a user.
    
    Privacy controls are applied to the response based on the user's preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
    
    **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. Required.
    *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide) for details.
    *     @var string $key This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide) for details.
    *     @var string $expand Use [expand](#expansion) to include additional information about users in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `groups` includes all groups and nested groups to which the user belongs.
    *  `applicationRoles` includes details of all the applications to which the user has access.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetUserUnauthorizedException
    * @throws \JiraSdk\Exception\GetUserForbiddenException
    * @throws \JiraSdk\Exception\GetUserNotFoundException
    *
    * @return null|\JiraSdk\Model\User|\Psr\Http\Message\ResponseInterface
    */
    public function getUser(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetUser($queryParameters), $fetch);
    }
    /**
    * Creates a user. This resource is retained for legacy compatibility. As soon as a more suitable alternative is available this resource will be deprecated.
    
    If the user exists and has access to Jira, the operation returns a 201 status. If the user exists but does not have access to Jira, the operation returns a 400 status.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\NewUserDetails $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateUserBadRequestException
    * @throws \JiraSdk\Exception\CreateUserUnauthorizedException
    * @throws \JiraSdk\Exception\CreateUserForbiddenException
    *
    * @return null|\JiraSdk\Model\User|\Psr\Http\Message\ResponseInterface
    */
    public function createUser(\JiraSdk\Model\NewUserDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateUser($requestBody), $fetch);
    }
    /**
    * Returns a list of users who can be assigned issues in one or more projects. The list may be restricted to users whose attributes match a string.
    
    This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that can be assigned issues in the projects. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who can be assigned issues in the projects, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
    
    Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** None.
    *
    * @param array $queryParameters {
    *     @var string $query A query string that is matched against user attributes, such as `displayName` and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `accountId` is specified.
    *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    *     @var string $accountId A query string that is matched exactly against user `accountId`. Required, unless `query` is specified.
    *     @var string $projectKeys A list of project keys (case sensitive). This parameter accepts a comma-separated list.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\FindBulkAssignableUsersBadRequestException
    * @throws \JiraSdk\Exception\FindBulkAssignableUsersUnauthorizedException
    * @throws \JiraSdk\Exception\FindBulkAssignableUsersNotFoundException
    * @throws \JiraSdk\Exception\FindBulkAssignableUsersTooManyRequestsException
    *
    * @return null|\JiraSdk\Model\User[]|\Psr\Http\Message\ResponseInterface
    */
    public function findBulkAssignableUsers(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\FindBulkAssignableUsers($queryParameters), $fetch);
    }
    /**
    * Returns a list of users that can be assigned to an issue. Use this operation to find the list of users who can be assigned to:
    
    *  a new issue, by providing the `projectKeyOrId`.
    *  an updated issue, by providing the `issueKey`.
    *  to an issue during a transition (workflow action), by providing the `issueKey` and the transition id in `actionDescriptorId`. You can obtain the IDs of an issue's valid transitions using the `transitions` option in the `expand` parameter of [ Get issue](#api-rest-api-3-issue-issueIdOrKey-get).
    
    In all these cases, you can pass an account ID to determine if a user can be assigned to an issue. The user is returned in the response if they can be assigned to the issue or issue transition.
    
    This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that can be assigned the issue. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who can be assigned the issue, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
    
    Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
    
    **[Permissions](#permissions) required:** Permission to access Jira.
    *
    * @param array $queryParameters {
    *     @var string $query A query string that is matched against user attributes, such as `displayName`, and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `username` or `accountId` is specified.
    *     @var string $sessionId The sessionId of this request. SessionId is the same until the assignee is set.
    *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    *     @var string $accountId A query string that is matched exactly against user `accountId`. Required, unless `query` is specified.
    *     @var string $project The project ID or project key (case sensitive). Required, unless `issueKey` is specified.
    *     @var string $issueKey The key of the issue. Required, unless `project` is specified.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return. This operation may return less than the maximum number of items even if more are available. The operation fetches users up to the maximum and then, from the fetched users, returns only the users that can be assigned to the issue.
    *     @var int $actionDescriptorId The ID of the transition.
    *     @var bool $recommend 
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\FindAssignableUsersBadRequestException
    * @throws \JiraSdk\Exception\FindAssignableUsersUnauthorizedException
    * @throws \JiraSdk\Exception\FindAssignableUsersNotFoundException
    * @throws \JiraSdk\Exception\FindAssignableUsersTooManyRequestsException
    *
    * @return null|\JiraSdk\Model\User[]|\Psr\Http\Message\ResponseInterface
    */
    public function findAssignableUsers(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\FindAssignableUsers($queryParameters), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) list of the users specified by one or more account IDs.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     *     @var array $username This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var array $key This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var array $accountId The account ID of a user. To specify multiple users, pass multiple `accountId` parameters. For example, `accountId=5b10a2844c20165700ede21g&accountId=5b10ac8d82e05b22cc7d4ef5`.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\BulkGetUsersBadRequestException
     * @throws \JiraSdk\Exception\BulkGetUsersUnauthorizedException
     *
     * @return null|\JiraSdk\Model\PageBeanUser|\Psr\Http\Message\ResponseInterface
     */
    public function bulkGetUsers(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\BulkGetUsers($queryParameters), $fetch);
    }
    /**
     * Returns the account IDs for the users specified in the `key` or `username` parameters. Note that multiple `key` or `username` parameters can be specified.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     *     @var array $username Username of a user. To specify multiple users, pass multiple copies of this parameter. For example, `username=fred&username=barney`. Required if `key` isn't provided. Cannot be provided if `key` is present.
     *     @var array $key Key of a user. To specify multiple users, pass multiple copies of this parameter. For example, `key=fred&key=barney`. Required if `username` isn't provided. Cannot be provided if `username` is present.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\BulkGetUsersMigrationBadRequestException
     * @throws \JiraSdk\Exception\BulkGetUsersMigrationUnauthorizedException
     *
     * @return null|\JiraSdk\Model\UserMigrationBean[]|\Psr\Http\Message\ResponseInterface
     */
    public function bulkGetUsersMigration(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\BulkGetUsersMigration($queryParameters), $fetch);
    }
    /**
     * Resets the default [ issue table columns](https://confluence.atlassian.com/x/XYdKLg) for the user to the system default. If `accountId` is not passed, the calling user's default columns are reset.
     **[Permissions](#permissions) required:**
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to set the columns on any user.
     *  Permission to access Jira, to set the calling user's columns.
     *
     * @param array $queryParameters {
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\ResetUserColumnsUnauthorizedException
     * @throws \JiraSdk\Exception\ResetUserColumnsForbiddenException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function resetUserColumns(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\ResetUserColumns($queryParameters), $fetch);
    }
    /**
     * Returns the default [issue table columns](https://confluence.atlassian.com/x/XYdKLg) for the user. If `accountId` is not passed in the request, the calling user's details are returned.
     **[Permissions](#permissions) required:**
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLgl), to get the column details for any user.
     *  Permission to access Jira, to get the calling user's column details.
     *
     * @param array $queryParameters {
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *     @var string $username This parameter is no longer available See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetUserDefaultColumnsUnauthorizedException
     * @throws \JiraSdk\Exception\GetUserDefaultColumnsForbiddenException
     * @throws \JiraSdk\Exception\GetUserDefaultColumnsNotFoundException
     *
     * @return null|\JiraSdk\Model\ColumnItem[]|\Psr\Http\Message\ResponseInterface
     */
    public function getUserDefaultColumns(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetUserDefaultColumns($queryParameters), $fetch);
    }
    /**
    * Sets the default [ issue table columns](https://confluence.atlassian.com/x/XYdKLg) for the user. If an account ID is not passed, the calling user's default columns are set. If no column details are sent, then all default columns are removed.
    
    The parameters for this resource are expressed as HTML form data. For example, in curl:
    
    `curl -X PUT -d columns=summary -d columns=description https://your-domain.atlassian.net/rest/api/3/user/columns?accountId=5b10ac8d82e05b22cc7d4ef5'`
    
    **[Permissions](#permissions) required:**
    
    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to set the columns on any user.
    *  Permission to access Jira, to set the calling user's columns.
    *
    * @param null|array[] $requestBody 
    * @param array $queryParameters {
    *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetUserColumnsUnauthorizedException
    * @throws \JiraSdk\Exception\SetUserColumnsForbiddenException
    * @throws \JiraSdk\Exception\SetUserColumnsNotFoundException
    * @throws \JiraSdk\Exception\SetUserColumnsTooManyRequestsException
    * @throws \JiraSdk\Exception\SetUserColumnsInternalServerErrorException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function setUserColumns(?array $requestBody = null, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetUserColumns($requestBody, $queryParameters), $fetch);
    }
    /**
     * Returns a user's email address. This API is only available to apps approved by Atlassian, according to these [guidelines](https://community.developer.atlassian.com/t/guidelines-for-requesting-access-to-email-address/27603).
     *
     * @param array $queryParameters {
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, `5b10ac8d82e05b22cc7d4ef5`.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetUserEmailBadRequestException
     * @throws \JiraSdk\Exception\GetUserEmailUnauthorizedException
     * @throws \JiraSdk\Exception\GetUserEmailNotFoundException
     * @throws \JiraSdk\Exception\GetUserEmailServiceUnavailableException
     *
     * @return null|\JiraSdk\Model\UnrestrictedUserEmail|\Psr\Http\Message\ResponseInterface
     */
    public function getUserEmail(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetUserEmail($queryParameters), $fetch);
    }
    /**
     * Returns a user's email address. This API is only available to apps approved by Atlassian, according to these [guidelines](https://community.developer.atlassian.com/t/guidelines-for-requesting-access-to-email-address/27603).
     *
     * @param array $queryParameters {
     *     @var array $accountId The account IDs of the users for which emails are required. An `accountId` is an identifier that uniquely identifies the user across all Atlassian products. For example, `5b10ac8d82e05b22cc7d4ef5`. Note, this should be treated as an opaque identifier (that is, do not assume any structure in the value).
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetUserEmailBulkBadRequestException
     * @throws \JiraSdk\Exception\GetUserEmailBulkUnauthorizedException
     * @throws \JiraSdk\Exception\GetUserEmailBulkServiceUnavailableException
     *
     * @return null|\JiraSdk\Model\UnrestrictedUserEmail|\Psr\Http\Message\ResponseInterface
     */
    public function getUserEmailBulk(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetUserEmailBulk($queryParameters), $fetch);
    }
    /**
     * Returns the groups to which a user belongs.
     **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $key This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetUserGroupsUnauthorizedException
     * @throws \JiraSdk\Exception\GetUserGroupsForbiddenException
     * @throws \JiraSdk\Exception\GetUserGroupsNotFoundException
     *
     * @return null|\JiraSdk\Model\GroupName[]|\Psr\Http\Message\ResponseInterface
     */
    public function getUserGroups(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetUserGroups($queryParameters), $fetch);
    }
    /**
    * Returns a list of users who fulfill these criteria:
    
    *  their user attributes match a search string.
    *  they have a set of permissions for a project or issue.
    
    If no search string is provided, a list of all users with the permissions is returned.
    
    This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the search string and have permission for the project or issue. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who match the search string and have permission for the project or issue, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
    
    Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:**
    
    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to get users for any project.
    *  *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for a project, to get users for that project.
    *
    * @param array $queryParameters {
    *     @var string $query A query string that is matched against user attributes, such as `displayName` and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `accountId` is specified.
    *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    *     @var string $accountId A query string that is matched exactly against user `accountId`. Required, unless `query` is specified.
    *     @var string $permissions A comma separated list of permissions. Permissions can be specified as any:
    
    *  permission returned by [Get all permissions](#api-rest-api-3-permissions-get).
    *  custom project permission added by Connect apps.
    *  (deprecated) one of the following:
       
        *  ASSIGNABLE\_USER
        *  ASSIGN\_ISSUE
        *  ATTACHMENT\_DELETE\_ALL
        *  ATTACHMENT\_DELETE\_OWN
        *  BROWSE
        *  CLOSE\_ISSUE
        *  COMMENT\_DELETE\_ALL
        *  COMMENT\_DELETE\_OWN
        *  COMMENT\_EDIT\_ALL
        *  COMMENT\_EDIT\_OWN
        *  COMMENT\_ISSUE
        *  CREATE\_ATTACHMENT
        *  CREATE\_ISSUE
        *  DELETE\_ISSUE
        *  EDIT\_ISSUE
        *  LINK\_ISSUE
        *  MANAGE\_WATCHER\_LIST
        *  MODIFY\_REPORTER
        *  MOVE\_ISSUE
        *  PROJECT\_ADMIN
        *  RESOLVE\_ISSUE
        *  SCHEDULE\_ISSUE
        *  SET\_ISSUE\_SECURITY
        *  TRANSITION\_ISSUE
        *  VIEW\_VERSION\_CONTROL
        *  VIEW\_VOTERS\_AND\_WATCHERS
        *  VIEW\_WORKFLOW\_READONLY
        *  WORKLOG\_DELETE\_ALL
        *  WORKLOG\_DELETE\_OWN
        *  WORKLOG\_EDIT\_ALL
        *  WORKLOG\_EDIT\_OWN
        *  WORK\_ISSUE
    *     @var string $issueKey The issue key for the issue.
    *     @var string $projectKey The project key for the project (case sensitive).
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\FindUsersWithAllPermissionsBadRequestException
    * @throws \JiraSdk\Exception\FindUsersWithAllPermissionsUnauthorizedException
    * @throws \JiraSdk\Exception\FindUsersWithAllPermissionsForbiddenException
    * @throws \JiraSdk\Exception\FindUsersWithAllPermissionsNotFoundException
    * @throws \JiraSdk\Exception\FindUsersWithAllPermissionsTooManyRequestsException
    *
    * @return null|\JiraSdk\Model\User[]|\Psr\Http\Message\ResponseInterface
    */
    public function findUsersWithAllPermissions(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\FindUsersWithAllPermissions($queryParameters), $fetch);
    }
    /**
    * Returns a list of users whose attributes match the query term. The returned object includes the `html` field where the matched query term is highlighted with the HTML strong tag. A list of account IDs can be provided to exclude users from the results.
    
    This operation takes the users in the range defined by `maxResults`, up to the thousandth user, and then returns only the users from that range that match the query term. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who match the query term, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
    
    Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg). Anonymous calls and calls by users without the required permission return search results for an exact name match only.
    *
    * @param array $queryParameters {
    *     @var string $query A query string that is matched against user attributes, such as `displayName`, and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*.
    *     @var int $maxResults The maximum number of items to return. The total number of matched users is returned in `total`.
    *     @var bool $showAvatar Include the URI to the user's avatar.
    *     @var array $exclude This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    *     @var array $excludeAccountIds A list of account IDs to exclude from the search results. This parameter accepts a comma-separated list. Multiple account IDs can also be provided using an ampersand-separated list. For example, `excludeAccountIds=5b10a2844c20165700ede21g,5b10a0effa615349cb016cd8&excludeAccountIds=5b10ac8d82e05b22cc7d4ef5`. Cannot be provided with `exclude`.
    *     @var string $avatarSize 
    *     @var bool $excludeConnectUsers 
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\FindUsersForPickerBadRequestException
    * @throws \JiraSdk\Exception\FindUsersForPickerUnauthorizedException
    * @throws \JiraSdk\Exception\FindUsersForPickerTooManyRequestsException
    *
    * @return null|\JiraSdk\Model\FoundUsers|\Psr\Http\Message\ResponseInterface
    */
    public function findUsersForPicker(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\FindUsersForPicker($queryParameters), $fetch);
    }
    /**
    * Returns the keys of all properties for a user.
    
    Note: This operation does not access the [user properties](https://confluence.atlassian.com/x/8YxjL) created and maintained in Jira.
    
    **[Permissions](#permissions) required:**
    
    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to access the property keys on any user.
    *  Access to Jira, to access the calling user's property keys.
    *
    * @param array $queryParameters {
    *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
    *     @var string $userKey This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    *     @var string $username This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetUserPropertyKeysBadRequestException
    * @throws \JiraSdk\Exception\GetUserPropertyKeysUnauthorizedException
    * @throws \JiraSdk\Exception\GetUserPropertyKeysForbiddenException
    * @throws \JiraSdk\Exception\GetUserPropertyKeysNotFoundException
    *
    * @return null|\JiraSdk\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface
    */
    public function getUserPropertyKeys(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetUserPropertyKeys($queryParameters), $fetch);
    }
    /**
    * Deletes a property from a user.
    
    Note: This operation does not access the [user properties](https://confluence.atlassian.com/x/8YxjL) created and maintained in Jira.
    
    **[Permissions](#permissions) required:**
    
    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to delete a property from any user.
    *  Access to Jira, to delete a property from the calling user's record.
    *
    * @param string $propertyKey The key of the user's property.
    * @param array $queryParameters {
    *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
    *     @var string $userKey This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    *     @var string $username This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteUserPropertyBadRequestException
    * @throws \JiraSdk\Exception\DeleteUserPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteUserPropertyForbiddenException
    * @throws \JiraSdk\Exception\DeleteUserPropertyNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteUserProperty(string $propertyKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteUserProperty($propertyKey, $queryParameters), $fetch);
    }
    /**
    * Returns the value of a user's property. If no property key is provided [Get user property keys](#api-rest-api-3-user-properties-get) is called.
    
    Note: This operation does not access the [user properties](https://confluence.atlassian.com/x/8YxjL) created and maintained in Jira.
    
    **[Permissions](#permissions) required:**
    
    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to get a property from any user.
    *  Access to Jira, to get a property from the calling user's record.
    *
    * @param string $propertyKey The key of the user's property.
    * @param array $queryParameters {
    *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
    *     @var string $userKey This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    *     @var string $username This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetUserPropertyBadRequestException
    * @throws \JiraSdk\Exception\GetUserPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\GetUserPropertyForbiddenException
    * @throws \JiraSdk\Exception\GetUserPropertyNotFoundException
    *
    * @return null|\JiraSdk\Model\EntityProperty|\Psr\Http\Message\ResponseInterface
    */
    public function getUserProperty(string $propertyKey, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetUserProperty($propertyKey, $queryParameters), $fetch);
    }
    /**
    * Sets the value of a user's property. Use this resource to store custom data against a user.
    
    Note: This operation does not access the [user properties](https://confluence.atlassian.com/x/8YxjL) created and maintained in Jira.
    
    **[Permissions](#permissions) required:**
    
    *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to set a property on any user.
    *  Access to Jira, to set a property on the calling user's record.
    *
    * @param string $propertyKey The key of the user's property. The maximum length is 255 characters.
    * @param mixed $requestBody 
    * @param array $queryParameters {
    *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
    *     @var string $userKey This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    *     @var string $username This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetUserPropertyBadRequestException
    * @throws \JiraSdk\Exception\SetUserPropertyUnauthorizedException
    * @throws \JiraSdk\Exception\SetUserPropertyForbiddenException
    * @throws \JiraSdk\Exception\SetUserPropertyNotFoundException
    * @throws \JiraSdk\Exception\SetUserPropertyMethodNotAllowedException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function setUserProperty(string $propertyKey, $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetUserProperty($propertyKey, $requestBody, $queryParameters), $fetch);
    }
    /**
    * Returns a list of users that match the search string and property.
    
    This operation first applies a filter to match the search string and property, and then takes the filtered users in the range defined by `startAt` and `maxResults`, up to the thousandth user. To get all the users who match the search string and property, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
    
    This operation can be accessed anonymously.
    
    Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
    
    **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg). Anonymous calls or calls by users without the required permission return empty search results.
    *
    * @param array $queryParameters {
    *     @var string $query A query string that is matched against user attributes ( `displayName`, and `emailAddress`) to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `accountId` or `property` is specified.
    *     @var string $username 
    *     @var string $accountId A query string that is matched exactly against a user `accountId`. Required, unless `query` or `property` is specified.
    *     @var int $startAt The index of the first item to return in a page of filtered results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var string $property A query string used to search properties. Property keys are specified by path, so property keys containing dot (.) or equals (=) characters cannot be used. The query string cannot be specified using a JSON object. Example: To search for the value of `nested` from `{"something":{"nested":1,"other":2}}` use `thepropertykey.something.nested=1`. Required, unless `accountId` or `query` is specified.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\FindUsersBadRequestException
    * @throws \JiraSdk\Exception\FindUsersUnauthorizedException
    * @throws \JiraSdk\Exception\FindUsersTooManyRequestsException
    *
    * @return null|\JiraSdk\Model\User[]|\Psr\Http\Message\ResponseInterface
    */
    public function findUsers(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\FindUsers($queryParameters), $fetch);
    }
    /**
    * Finds users with a structured query and returns a [paginated](#pagination) list of user details.
    
    This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the structured query. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who match the structured query, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
    
    **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    
    The query statements are:
    
    *  `is assignee of PROJ` Returns the users that are assignees of at least one issue in project *PROJ*.
    *  `is assignee of (PROJ-1, PROJ-2)` Returns users that are assignees on the issues *PROJ-1* or *PROJ-2*.
    *  `is reporter of (PROJ-1, PROJ-2)` Returns users that are reporters on the issues *PROJ-1* or *PROJ-2*.
    *  `is watcher of (PROJ-1, PROJ-2)` Returns users that are watchers on the issues *PROJ-1* or *PROJ-2*.
    *  `is voter of (PROJ-1, PROJ-2)` Returns users that are voters on the issues *PROJ-1* or *PROJ-2*.
    *  `is commenter of (PROJ-1, PROJ-2)` Returns users that have posted a comment on the issues *PROJ-1* or *PROJ-2*.
    *  `is transitioner of (PROJ-1, PROJ-2)` Returns users that have performed a transition on issues *PROJ-1* or *PROJ-2*.
    *  `[propertyKey].entity.property.path is "property value"` Returns users with the entity property value.
    
    The list of issues can be extended as needed, as in *(PROJ-1, PROJ-2, ... PROJ-n)*. Statements can be combined using the `AND` and `OR` operators to form more complex queries. For example:
    
    `is assignee of PROJ AND [propertyKey].entity.property.path is "property value"`
    *
    * @param array $queryParameters {
    *     @var string $query The search query.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\FindUsersByQueryBadRequestException
    * @throws \JiraSdk\Exception\FindUsersByQueryUnauthorizedException
    * @throws \JiraSdk\Exception\FindUsersByQueryForbiddenException
    * @throws \JiraSdk\Exception\FindUsersByQueryRequestTimeoutException
    *
    * @return null|\JiraSdk\Model\PageBeanUser|\Psr\Http\Message\ResponseInterface
    */
    public function findUsersByQuery(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\FindUsersByQuery($queryParameters), $fetch);
    }
    /**
    * Finds users with a structured query and returns a [paginated](#pagination) list of user keys.
    
    This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the structured query. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who match the structured query, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
    
    **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    
    The query statements are:
    
    *  `is assignee of PROJ` Returns the users that are assignees of at least one issue in project *PROJ*.
    *  `is assignee of (PROJ-1, PROJ-2)` Returns users that are assignees on the issues *PROJ-1* or *PROJ-2*.
    *  `is reporter of (PROJ-1, PROJ-2)` Returns users that are reporters on the issues *PROJ-1* or *PROJ-2*.
    *  `is watcher of (PROJ-1, PROJ-2)` Returns users that are watchers on the issues *PROJ-1* or *PROJ-2*.
    *  `is voter of (PROJ-1, PROJ-2)` Returns users that are voters on the issues *PROJ-1* or *PROJ-2*.
    *  `is commenter of (PROJ-1, PROJ-2)` Returns users that have posted a comment on the issues *PROJ-1* or *PROJ-2*.
    *  `is transitioner of (PROJ-1, PROJ-2)` Returns users that have performed a transition on issues *PROJ-1* or *PROJ-2*.
    *  `[propertyKey].entity.property.path is "property value"` Returns users with the entity property value.
    
    The list of issues can be extended as needed, as in *(PROJ-1, PROJ-2, ... PROJ-n)*. Statements can be combined using the `AND` and `OR` operators to form more complex queries. For example:
    
    `is assignee of PROJ AND [propertyKey].entity.property.path is "property value"`
    *
    * @param array $queryParameters {
    *     @var string $query The search query.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\FindUserKeysByQueryBadRequestException
    * @throws \JiraSdk\Exception\FindUserKeysByQueryUnauthorizedException
    * @throws \JiraSdk\Exception\FindUserKeysByQueryForbiddenException
    * @throws \JiraSdk\Exception\FindUserKeysByQueryRequestTimeoutException
    *
    * @return null|\JiraSdk\Model\PageBeanUserKey|\Psr\Http\Message\ResponseInterface
    */
    public function findUserKeysByQuery(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\FindUserKeysByQuery($queryParameters), $fetch);
    }
    /**
    * Returns a list of users who fulfill these criteria:
    
    *  their user attributes match a search string.
    *  they have permission to browse issues.
    
    Use this resource to find users who can browse:
    
    *  an issue, by providing the `issueKey`.
    *  any issue in a project, by providing the `projectKey`.
    
    This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the search string and have permission to browse issues. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who match the search string and have permission to browse issues, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
    
    Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg). Anonymous calls and calls by users without the required permission return empty search results.
    *
    * @param array $queryParameters {
    *     @var string $query A query string that is matched against user attributes, such as `displayName` and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `accountId` is specified.
    *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
    *     @var string $accountId A query string that is matched exactly against user `accountId`. Required, unless `query` is specified.
    *     @var string $issueKey The issue key for the issue. Required, unless `projectKey` is specified.
    *     @var string $projectKey The project key for the project (case sensitive). Required, unless `issueKey` is specified.
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\FindUsersWithBrowsePermissionBadRequestException
    * @throws \JiraSdk\Exception\FindUsersWithBrowsePermissionUnauthorizedException
    * @throws \JiraSdk\Exception\FindUsersWithBrowsePermissionNotFoundException
    * @throws \JiraSdk\Exception\FindUsersWithBrowsePermissionTooManyRequestsException
    *
    * @return null|\JiraSdk\Model\User[]|\Psr\Http\Message\ResponseInterface
    */
    public function findUsersWithBrowsePermission(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\FindUsersWithBrowsePermission($queryParameters), $fetch);
    }
    /**
    * Returns a list of all users, including active users, inactive users and previously deleted users that have an Atlassian account.
    
    Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
    
    **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return.
    *     @var int $maxResults The maximum number of items to return.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAllUsersDefaultBadRequestException
    * @throws \JiraSdk\Exception\GetAllUsersDefaultForbiddenException
    * @throws \JiraSdk\Exception\GetAllUsersDefaultConflictException
    *
    * @return null|\JiraSdk\Model\User[]|\Psr\Http\Message\ResponseInterface
    */
    public function getAllUsersDefault(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllUsersDefault($queryParameters), $fetch);
    }
    /**
    * Returns a list of all users, including active users, inactive users and previously deleted users that have an Atlassian account.
    
    Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
    
    **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return.
    *     @var int $maxResults The maximum number of items to return.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAllUsersBadRequestException
    * @throws \JiraSdk\Exception\GetAllUsersForbiddenException
    * @throws \JiraSdk\Exception\GetAllUsersConflictException
    *
    * @return null|\JiraSdk\Model\User[]|\Psr\Http\Message\ResponseInterface
    */
    public function getAllUsers(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllUsers($queryParameters), $fetch);
    }
    /**
    * Creates a project version.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project the version is added to.
    *
    * @param \JiraSdk\Model\Version $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateVersionBadRequestException
    * @throws \JiraSdk\Exception\CreateVersionUnauthorizedException
    * @throws \JiraSdk\Exception\CreateVersionNotFoundException
    *
    * @return null|\JiraSdk\Model\Version|\Psr\Http\Message\ResponseInterface
    */
    public function createVersion(\JiraSdk\Model\Version $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateVersion($requestBody), $fetch);
    }
    /**
    * Deletes a project version.
    
    Deprecated, use [ Delete and replace version](#api-rest-api-3-version-id-removeAndSwap-post) that supports swapping version values in custom fields, in addition to the swapping for `fixVersion` and `affectedVersion` provided in this resource.
    
    Alternative versions can be provided to update issues that use the deleted version in `fixVersion` or `affectedVersion`. If alternatives are not provided, occurrences of `fixVersion` and `affectedVersion` that contain the deleted version are cleared.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that contains the version.
    *
    * @param string $id The ID of the version.
    * @param array $queryParameters {
    *     @var string $moveFixIssuesTo The ID of the version to update `fixVersion` to when the field contains the deleted version. The replacement version must be in the same project as the version being deleted and cannot be the version being deleted.
    *     @var string $moveAffectedIssuesTo The ID of the version to update `affectedVersion` to when the field contains the deleted version. The replacement version must be in the same project as the version being deleted and cannot be the version being deleted.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteVersionBadRequestException
    * @throws \JiraSdk\Exception\DeleteVersionUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteVersionNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteVersion(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteVersion($id, $queryParameters), $fetch);
    }
    /**
    * Returns a project version.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the version.
    *
    * @param string $id The ID of the version.
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information about version in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `operations` Returns the list of operations available for this version.
    *  `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property represents the number of issues with a status other than *to do*, *in progress*, and *done*.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetVersionUnauthorizedException
    * @throws \JiraSdk\Exception\GetVersionNotFoundException
    *
    * @return null|\JiraSdk\Model\Version|\Psr\Http\Message\ResponseInterface
    */
    public function getVersion(string $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetVersion($id, $queryParameters), $fetch);
    }
    /**
    * Updates a project version.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that contains the version.
    *
    * @param string $id The ID of the version.
    * @param \JiraSdk\Model\Version $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateVersionBadRequestException
    * @throws \JiraSdk\Exception\UpdateVersionUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateVersionNotFoundException
    *
    * @return null|\JiraSdk\Model\Version|\Psr\Http\Message\ResponseInterface
    */
    public function updateVersion(string $id, \JiraSdk\Model\Version $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateVersion($id, $requestBody), $fetch);
    }
    /**
    * Merges two project versions. The merge is completed by deleting the version specified in `id` and replacing any occurrences of its ID in `fixVersion` with the version ID specified in `moveIssuesTo`.
    
    Consider using [ Delete and replace version](#api-rest-api-3-version-id-removeAndSwap-post) instead. This resource supports swapping version values in `fixVersion`, `affectedVersion`, and custom fields.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that contains the version.
    *
    * @param string $id The ID of the version to delete.
    * @param string $moveIssuesTo The ID of the version to merge into.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\MergeVersionsBadRequestException
    * @throws \JiraSdk\Exception\MergeVersionsUnauthorizedException
    * @throws \JiraSdk\Exception\MergeVersionsNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function mergeVersions(string $id, string $moveIssuesTo, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\MergeVersions($id, $moveIssuesTo), $fetch);
    }
    /**
    * Modifies the version's sequence within the project, which affects the display order of the versions in Jira.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse projects* project permission for the project that contains the version.
    *
    * @param string $id The ID of the version to be moved.
    * @param \JiraSdk\Model\VersionMoveBean $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\MoveVersionBadRequestException
    * @throws \JiraSdk\Exception\MoveVersionUnauthorizedException
    * @throws \JiraSdk\Exception\MoveVersionNotFoundException
    *
    * @return null|\JiraSdk\Model\Version|\Psr\Http\Message\ResponseInterface
    */
    public function moveVersion(string $id, \JiraSdk\Model\VersionMoveBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\MoveVersion($id, $requestBody), $fetch);
    }
    /**
    * Returns the following counts for a version:
    
    *  Number of issues where the `fixVersion` is set to the version.
    *  Number of issues where the `affectedVersion` is set to the version.
    *  Number of issues where a version custom field is set to the version.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse projects* project permission for the project that contains the version.
    *
    * @param string $id The ID of the version.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetVersionRelatedIssuesUnauthorizedException
    * @throws \JiraSdk\Exception\GetVersionRelatedIssuesNotFoundException
    *
    * @return null|\JiraSdk\Model\VersionIssueCounts|\Psr\Http\Message\ResponseInterface
    */
    public function getVersionRelatedIssues(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetVersionRelatedIssues($id), $fetch);
    }
    /**
    * Deletes a project version.
    
    Alternative versions can be provided to update issues that use the deleted version in `fixVersion`, `affectedVersion`, or any version picker custom fields. If alternatives are not provided, occurrences of `fixVersion`, `affectedVersion`, and any version picker custom field, that contain the deleted version, are cleared. Any replacement version must be in the same project as the version being deleted and cannot be the version being deleted.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that contains the version.
    *
    * @param string $id The ID of the version.
    * @param \JiraSdk\Model\DeleteAndReplaceVersionBean $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteAndReplaceVersionBadRequestException
    * @throws \JiraSdk\Exception\DeleteAndReplaceVersionUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteAndReplaceVersionNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteAndReplaceVersion(string $id, \JiraSdk\Model\DeleteAndReplaceVersionBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteAndReplaceVersion($id, $requestBody), $fetch);
    }
    /**
    * Returns counts of the issues and unresolved issues for the project version.
    
    This operation can be accessed anonymously.
    
    **[Permissions](#permissions) required:** *Browse projects* project permission for the project that contains the version.
    *
    * @param string $id The ID of the version.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetVersionUnresolvedIssuesUnauthorizedException
    * @throws \JiraSdk\Exception\GetVersionUnresolvedIssuesNotFoundException
    *
    * @return null|\JiraSdk\Model\VersionUnresolvedIssuesCount|\Psr\Http\Message\ResponseInterface
    */
    public function getVersionUnresolvedIssues(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetVersionUnresolvedIssues($id), $fetch);
    }
    /**
     * Removes webhooks by ID. Only webhooks registered by the calling app are removed. If webhooks created by other apps are specified, they are ignored.
     **[Permissions](#permissions) required:** Only [Connect](https://developer.atlassian.com/cloud/jira/platform/#connect-apps) and [OAuth 2.0](https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps) apps can use this operation.
     *
     * @param \JiraSdk\Model\ContainerForWebhookIDs $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteWebhookByIdBadRequestException
     * @throws \JiraSdk\Exception\DeleteWebhookByIdForbiddenException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteWebhookById(\JiraSdk\Model\ContainerForWebhookIDs $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteWebhookById($requestBody), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) list of the webhooks registered by the calling app.
     **[Permissions](#permissions) required:** Only [Connect](https://developer.atlassian.com/cloud/jira/platform/#connect-apps) and [OAuth 2.0](https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps) apps can use this operation.
     *
     * @param array $queryParameters {
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetDynamicWebhooksForAppBadRequestException
     * @throws \JiraSdk\Exception\GetDynamicWebhooksForAppForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanWebhook|\Psr\Http\Message\ResponseInterface
     */
    public function getDynamicWebhooksForApp(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetDynamicWebhooksForApp($queryParameters), $fetch);
    }
    /**
     * Registers webhooks.
     **NOTE:** for non-public OAuth apps, webhooks are delivered only if there is a match between the app owner and the user who registered a dynamic webhook.
     **[Permissions](#permissions) required:** Only [Connect](https://developer.atlassian.com/cloud/jira/platform/#connect-apps) and [OAuth 2.0](https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps) apps can use this operation.
     *
     * @param \JiraSdk\Model\WebhookRegistrationDetails $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\RegisterDynamicWebhooksBadRequestException
     * @throws \JiraSdk\Exception\RegisterDynamicWebhooksForbiddenException
     *
     * @return null|\JiraSdk\Model\ContainerForRegisteredWebhooks|\Psr\Http\Message\ResponseInterface
     */
    public function registerDynamicWebhooks(\JiraSdk\Model\WebhookRegistrationDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RegisterDynamicWebhooks($requestBody), $fetch);
    }
    /**
    * Returns webhooks that have recently failed to be delivered to the requesting app after the maximum number of retries.
    
    After 72 hours the failure may no longer be returned by this operation.
    
    The oldest failure is returned first.
    
    This method uses a cursor-based pagination. To request the next page use the failure time of the last webhook on the list as the `failedAfter` value or use the URL provided in `next`.
    
    **[Permissions](#permissions) required:** Only [Connect apps](https://developer.atlassian.com/cloud/jira/platform/index/#connect-apps) can use this operation.
    *
    * @param array $queryParameters {
    *     @var int $maxResults The maximum number of webhooks to return per page. If obeying the maxResults directive would result in records with the same failure time being split across pages, the directive is ignored and all records with the same failure time included on the page.
    *     @var int $after The time after which any webhook failure must have occurred for the record to be returned, expressed as milliseconds since the UNIX epoch.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetFailedWebhooksBadRequestException
    * @throws \JiraSdk\Exception\GetFailedWebhooksForbiddenException
    *
    * @return null|\JiraSdk\Model\FailedWebhooks|\Psr\Http\Message\ResponseInterface
    */
    public function getFailedWebhooks(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetFailedWebhooks($queryParameters), $fetch);
    }
    /**
    * Extends the life of webhook. Webhooks registered through the REST API expire after 30 days. Call this operation to keep them alive.
    
    Unrecognized webhook IDs (those that are not found or belong to other apps) are ignored.
    
    **[Permissions](#permissions) required:** Only [Connect](https://developer.atlassian.com/cloud/jira/platform/#connect-apps) and [OAuth 2.0](https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps) apps can use this operation.
    *
    * @param \JiraSdk\Model\ContainerForWebhookIDs $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\RefreshWebhooksBadRequestException
    * @throws \JiraSdk\Exception\RefreshWebhooksForbiddenException
    *
    * @return null|\JiraSdk\Model\WebhooksExpirationDate|\Psr\Http\Message\ResponseInterface
    */
    public function refreshWebhooks(\JiraSdk\Model\ContainerForWebhookIDs $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\RefreshWebhooks($requestBody), $fetch);
    }
    /**
    * Returns all workflows in Jira or a workflow. Deprecated, use [Get workflows paginated](#api-rest-api-3-workflow-search-get).
    
    If the `workflowName` parameter is specified, the workflow is returned as an object (not in an array). Otherwise, an array of workflow objects is returned.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var string $workflowName The name of the workflow to be returned. Only one workflow can be specified.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetAllWorkflowsUnauthorizedException
    *
    * @return null|\JiraSdk\Model\DeprecatedWorkflow[]|\Psr\Http\Message\ResponseInterface
    */
    public function getAllWorkflows(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllWorkflows($queryParameters), $fetch);
    }
    /**
    * Creates a workflow. You can define transition rules using the shapes detailed in the following sections. If no transitional rules are specified the default system transition rules are used.
    
    #### Conditions ####
    
    Conditions enable workflow rules that govern whether a transition can execute.
    
    ##### Always false condition #####
    
    A condition that always fails.
    
       {
          "type": "AlwaysFalseCondition"
        }
    
    ##### Block transition until approval #####
    
    A condition that blocks issue transition if there is a pending approval.
    
       {
          "type": "BlockInProgressApprovalCondition"
        }
    
    ##### Compare number custom field condition #####
    
    A condition that allows transition if a comparison between a number custom field and a value is true.
    
       {
          "type": "CompareNumberCFCondition",
          "configuration": {
            "comparator": "=",
            "fieldId": "customfield_10029",
            "fieldValue": 2
          }
        }
    
    *  `comparator` One of the supported comparator: `=`, `>`, and `<`.
    *  `fieldId` The custom numeric field ID. Allowed field types:
       
        *  `com.atlassian.jira.plugin.system.customfieldtypes:float`
        *  `com.pyxis.greenhopper.jira:jsw-story-points`
    *  `fieldValue` The value for comparison.
    
    ##### Hide from user condition #####
    
    A condition that hides a transition from users. The transition can only be triggered from a workflow function or REST API operation.
    
       {
          "type": "RemoteOnlyCondition"
        }
    
    ##### Only assignee condition #####
    
    A condition that allows only the assignee to execute a transition.
    
       {
          "type": "AllowOnlyAssignee"
        }
    
    ##### Only Bamboo notifications workflow condition #####
    
    A condition that makes the transition available only to Bamboo build notifications.
    
       {
          "type": "OnlyBambooNotificationsCondition"
        }
    
    ##### Only reporter condition #####
    
    A condition that allows only the reporter to execute a transition.
    
       {
          "type": "AllowOnlyReporter"
        }
    
    ##### Permission condition #####
    
    A condition that allows only users with a permission to execute a transition.
    
       {
          "type": "PermissionCondition",
          "configuration": {
              "permissionKey": "BROWSE_PROJECTS"
          }
        }
    
    *  `permissionKey` The permission required to perform the transition. Allowed values: [built-in](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#built-in-permissions) or app defined permissions.
    
    ##### Previous status condition #####
    
    A condition that allows a transition based on whether an issue has or has not transitioned through a status.
    
       {
          "type": "PreviousStatusCondition",
          "configuration": {
            "ignoreLoopTransitions": true,
            "includeCurrentStatus": true,
            "mostRecentStatusOnly": true,
            "reverseCondition": true,
            "previousStatus": {
              "id": "5"
            }
          }
        }
    
    By default this condition allows the transition if the status, as defined by its ID in the `previousStatus` object, matches any previous issue status, unless:
    
    *  `ignoreLoopTransitions` is `true`, then loop transitions (from and to the same status) are ignored.
    *  `includeCurrentStatus` is `true`, then the current issue status is also checked.
    *  `mostRecentStatusOnly` is `true`, then only the issue's preceding status (the one immediately before the current status) is checked.
    *  `reverseCondition` is `true`, then the status must not be present.
    
    ##### Separation of duties condition #####
    
    A condition that prevents a user to perform the transition, if the user has already performed a transition on the issue.
    
       {
          "type": "SeparationOfDutiesCondition",
          "configuration": {
            "fromStatus": {
              "id": "5"
            },
            "toStatus": {
              "id": "6"
            }
          }
        }
    
    *  `fromStatus` OPTIONAL. An object containing the ID of the source status of the transition that is blocked. If omitted any transition to `toStatus` is blocked.
    *  `toStatus` An object containing the ID of the target status of the transition that is blocked.
    
    ##### Subtask blocking condition #####
    
    A condition that blocks transition on a parent issue if any of its subtasks are in any of one or more statuses.
    
       {
          "type": "SubTaskBlockingCondition",
          "configuration": {
            "statuses": [
              {
                "id": "1"
              },
              {
                "id": "3"
              }
            ]
          }
        }
    
    *  `statuses` A list of objects containing status IDs.
    
    ##### User is in any group condition #####
    
    A condition that allows users belonging to any group from a list of groups to execute a transition.
    
       {
          "type": "UserInAnyGroupCondition",
          "configuration": {
            "groups": [
              "administrators",
              "atlassian-addons-admin"
            ]
          }
        }
    
    *  `groups` A list of group names.
    
    ##### User is in any project role condition #####
    
    A condition that allows only users with at least one project roles from a list of project roles to execute a transition.
    
       {
          "type": "InAnyProjectRoleCondition",
          "configuration": {
            "projectRoles": [
              {
                "id": "10002"
              },
              {
                "id": "10003"
              },
              {
                "id": "10012"
              },
              {
                "id": "10013"
              }
            ]
          }
        }
    
    *  `projectRoles` A list of objects containing project role IDs.
    
    ##### User is in custom field condition #####
    
    A condition that allows only users listed in a given custom field to execute the transition.
    
       {
          "type": "UserIsInCustomFieldCondition",
          "configuration": {
            "allowUserInField": false,
            "fieldId": "customfield_10010"
          }
        }
    
    *  `allowUserInField` If `true` only a user who is listed in `fieldId` can perform the transition, otherwise, only a user who is not listed in `fieldId` can perform the transition.
    *  `fieldId` The ID of the field containing the list of users.
    
    ##### User is in group condition #####
    
    A condition that allows users belonging to a group to execute a transition.
    
       {
          "type": "UserInGroupCondition",
          "configuration": {
            "group": "administrators"
          }
        }
    
    *  `group` The name of the group.
    
    ##### User is in group custom field condition #####
    
    A condition that allows users belonging to a group specified in a custom field to execute a transition.
    
       {
          "type": "InGroupCFCondition",
          "configuration": {
            "fieldId": "customfield_10012"
          }
        }
    
    *  `fieldId` The ID of the field. Allowed field types:
       
        *  `com.atlassian.jira.plugin.system.customfieldtypes:multigrouppicker`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:grouppicker`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:select`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:multiselect`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:radiobuttons`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:multicheckboxes`
        *  `com.pyxis.greenhopper.jira:gh-epic-status`
    
    ##### User is in project role condition #####
    
    A condition that allows users with a project role to execute a transition.
    
       {
          "type": "InProjectRoleCondition",
          "configuration": {
            "projectRole": {
              "id": "10002"
            }
          }
        }
    
    *  `projectRole` An object containing the ID of a project role.
    
    ##### Value field condition #####
    
    A conditions that allows a transition to execute if the value of a field is equal to a constant value or simply set.
    
       {
          "type": "ValueFieldCondition",
          "configuration": {
            "fieldId": "assignee",
            "fieldValue": "qm:6e1ecee6-8e64-4db6-8c85-916bb3275f51:54b56885-2bd2-4381-8239-78263442520f",
            "comparisonType": "NUMBER",
            "comparator": "="
          }
        }
    
    *  `fieldId` The ID of a field used in the comparison.
    *  `fieldValue` The expected value of the field.
    *  `comparisonType` The type of the comparison. Allowed values: `STRING`, `NUMBER`, `DATE`, `DATE_WITHOUT_TIME`, or `OPTIONID`.
    *  `comparator` One of the supported comparator: `>`, `>=`, `=`, `<=`, `<`, `!=`.
    
    **Notes:**
    
    *  If you choose the comparison type `STRING`, only `=` and `!=` are valid options.
    *  You may leave `fieldValue` empty when comparison type is `!=` to indicate that a value is required in the field.
    *  For date fields without time format values as `yyyy-MM-dd`, and for those with time as `yyyy-MM-dd HH:mm`. For example, for July 16 2021 use `2021-07-16`, for 8:05 AM use `2021-07-16 08:05`, and for 4 PM: `2021-07-16 16:00`.
    
    #### Validators ####
    
    Validators check that any input made to the transition is valid before the transition is performed.
    
    ##### Date field validator #####
    
    A validator that compares two dates.
    
       {
          "type": "DateFieldValidator",
          "configuration": {
              "comparator": ">",
              "date1": "updated",
              "date2": "created",
              "expression": "1d",
              "includeTime": true
            }
        }
    
    *  `comparator` One of the supported comparator: `>`, `>=`, `=`, `<=`, `<`, or `!=`.
    *  `date1` The date field to validate. Allowed field types:
       
        *  `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:datetime`
        *  `com.atlassian.jpo:jpo-custom-field-baseline-end`
        *  `com.atlassian.jpo:jpo-custom-field-baseline-start`
        *  `duedate`
        *  `created`
        *  `updated`
        *  `resolutiondate`
    *  `date2` The second date field. Required, if `expression` is not passed. Allowed field types:
       
        *  `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:datetime`
        *  `com.atlassian.jpo:jpo-custom-field-baseline-end`
        *  `com.atlassian.jpo:jpo-custom-field-baseline-start`
        *  `duedate`
        *  `created`
        *  `updated`
        *  `resolutiondate`
    *  `expression` An expression specifying an offset. Required, if `date2` is not passed. Offsets are built with a number, with `-` as prefix for the past, and one of these time units: `d` for day, `w` for week, `m` for month, or `y` for year. For example, -2d means two days into the past and 1w means one week into the future. The `now` keyword enables a comparison with the current date.
    *  `includeTime` If `true`, then the time part of the data is included for the comparison. If the field doesn't have a time part, 00:00:00 is used.
    
    ##### Windows date validator #####
    
    A validator that checks that a date falls on or after a reference date and before or on the reference date plus a number of days.
    
       {
          "type": "WindowsDateValidator",
          "configuration": {
              "date1": "customfield_10009",
              "date2": "created",
              "windowsDays": 5
            }
        }
    
    *  `date1` The date field to validate. Allowed field types:
       
        *  `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:datetime`
        *  `com.atlassian.jpo:jpo-custom-field-baseline-end`
        *  `com.atlassian.jpo:jpo-custom-field-baseline-start`
        *  `duedate`
        *  `created`
        *  `updated`
        *  `resolutiondate`
    *  `date2` The reference date. Allowed field types:
       
        *  `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:datetime`
        *  `com.atlassian.jpo:jpo-custom-field-baseline-end`
        *  `com.atlassian.jpo:jpo-custom-field-baseline-start`
        *  `duedate`
        *  `created`
        *  `updated`
        *  `resolutiondate`
    *  `windowsDays` A positive integer indicating a number of days.
    
    ##### Field required validator #####
    
    A validator that checks fields are not empty. By default, if a field is not included in the current context it's ignored and not validated.
    
       {
            "type": "FieldRequiredValidator",
            "configuration": {
                "ignoreContext": true,
                "errorMessage": "Hey",
                "fieldIds": [
                    "versions",
                    "customfield_10037",
                    "customfield_10003"
                ]
            }
        }
    
    *  `ignoreContext` If `true`, then the context is ignored and all the fields are validated.
    *  `errorMessage` OPTIONAL. The error message displayed when one or more fields are empty. A default error message is shown if an error message is not provided.
    *  `fieldIds` The list of fields to validate.
    
    ##### Field changed validator #####
    
    A validator that checks that a field value is changed. However, this validation can be ignored for users from a list of groups.
    
       {
            "type": "FieldChangedValidator",
            "configuration": {
                "fieldId": "comment",
                "errorMessage": "Hey",
                "exemptedGroups": [
                    "administrators",
                    "atlassian-addons-admin"
                ]
            }
        }
    
    *  `fieldId` The ID of a field.
    *  `errorMessage` OPTIONAL. The error message displayed if the field is not changed. A default error message is shown if the error message is not provided.
    *  `exemptedGroups` OPTIONAL. The list of groups.
    
    ##### Field has single value validator #####
    
    A validator that checks that a multi-select field has only one value. Optionally, the validation can ignore values copied from subtasks.
    
       {
            "type": "FieldHasSingleValueValidator",
            "configuration": {
                "fieldId": "attachment,
                "excludeSubtasks": true
            }
        }
    
    *  `fieldId` The ID of a field.
    *  `excludeSubtasks` If `true`, then values copied from subtasks are ignored.
    
    ##### Parent status validator #####
    
    A validator that checks the status of the parent issue of a subtask. Ìf the issue is not a subtask, no validation is performed.
    
       {
            "type": "ParentStatusValidator",
            "configuration": {
                "parentStatuses": [
                    {
                      "id":"1"
                    },
                    {
                      "id":"2"
                    }
                ]
            }
        }
    
    *  `parentStatus` The list of required parent issue statuses.
    
    ##### Permission validator #####
    
    A validator that checks the user has a permission.
    
       {
          "type": "PermissionValidator",
          "configuration": {
              "permissionKey": "ADMINISTER_PROJECTS"
          }
        }
    
    *  `permissionKey` The permission required to perform the transition. Allowed values: [built-in](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#built-in-permissions) or app defined permissions.
    
    ##### Previous status validator #####
    
    A validator that checks if the issue has held a status.
    
       {
          "type": "PreviousStatusValidator",
          "configuration": {
              "mostRecentStatusOnly": false,
              "previousStatus": {
                  "id": "15"
              }
          }
        }
    
    *  `mostRecentStatusOnly` If `true`, then only the issue's preceding status (the one immediately before the current status) is checked.
    *  `previousStatus` An object containing the ID of an issue status.
    
    ##### Regular expression validator #####
    
    A validator that checks the content of a field against a regular expression.
    
       {
          "type": "RegexpFieldValidator",
          "configuration": {
              "regExp": "[0-9]",
              "fieldId": "customfield_10029"
          }
        }
    
    *  `regExp`A regular expression.
    *  `fieldId` The ID of a field. Allowed field types:
       
        *  `com.atlassian.jira.plugin.system.customfieldtypes:select`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:multiselect`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:radiobuttons`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:multicheckboxes`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:textarea`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:textfield`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:url`
        *  `com.atlassian.jira.plugin.system.customfieldtypes:float`
        *  `com.pyxis.greenhopper.jira:jsw-story-points`
        *  `com.pyxis.greenhopper.jira:gh-epic-status`
        *  `description`
        *  `summary`
    
    ##### User permission validator #####
    
    A validator that checks if a user has a permission. Obsolete. You may encounter this validator when getting transition rules and can pass it when updating or creating rules, for example, when you want to duplicate the rules from a workflow on a new workflow.
    
       {
            "type": "UserPermissionValidator",
            "configuration": {
                "permissionKey": "BROWSE_PROJECTS",
                "nullAllowed": false,
                "username": "TestUser"
            }
        }
    
    *  `permissionKey` The permission to be validated. Allowed values: [built-in](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#built-in-permissions) or app defined permissions.
    *  `nullAllowed` If `true`, allows the transition when `username` is empty.
    *  `username` The username to validate against the `permissionKey`.
    
    #### Post functions ####
    
    Post functions carry out any additional processing required after a Jira workflow transition is executed.
    
    ##### Fire issue event function #####
    
    A post function that fires an event that is processed by the listeners.
    
       {
          "type": "FireIssueEventFunction",
          "configuration": {
            "event": {
              "id":"1"
            }
          }
        }
    
    **Note:** If provided, this post function overrides the default `FireIssueEventFunction`. Can be included once in a transition.
    
    *  `event` An object containing the ID of the issue event.
    
    ##### Update issue status #####
    
    A post function that sets issue status to the linked status of the destination workflow status.
    
       {
          "type": "UpdateIssueStatusFunction"
        }
    
    **Note:** This post function is a default function in global and directed transitions. It can only be added to the initial transition and can only be added once.
    
    ##### Create comment #####
    
    A post function that adds a comment entered during the transition to an issue.
    
       {
          "type": "CreateCommentFunction"
        }
    
    **Note:** This post function is a default function in global and directed transitions. It can only be added to the initial transition and can only be added once.
    
    ##### Store issue #####
    
    A post function that stores updates to an issue.
    
       {
          "type": "IssueStoreFunction"
        }
    
    **Note:** This post function can only be added to the initial transition and can only be added once.
    
    ##### Assign to current user function #####
    
    A post function that assigns the issue to the current user if the current user has the `ASSIGNABLE_USER` permission.
    
       {
            "type": "AssignToCurrentUserFunction"
        }
    
    **Note:** This post function can be included once in a transition.
    
    ##### Assign to lead function #####
    
    A post function that assigns the issue to the project or component lead developer.
    
       {
            "type": "AssignToLeadFunction"
        }
    
    **Note:** This post function can be included once in a transition.
    
    ##### Assign to reporter function #####
    
    A post function that assigns the issue to the reporter.
    
       {
            "type": "AssignToReporterFunction"
        }
    
    **Note:** This post function can be included once in a transition.
    
    ##### Clear field value function #####
    
    A post function that clears the value from a field.
    
       {
          "type": "ClearFieldValuePostFunction",
          "configuration": {
            "fieldId": "assignee"
          }
        }
    
    *  `fieldId` The ID of the field.
    
    ##### Copy value from other field function #####
    
    A post function that copies the value of one field to another, either within an issue or from parent to subtask.
    
       {
          "type": "CopyValueFromOtherFieldPostFunction",
          "configuration": {
            "sourceFieldId": "assignee",
            "destinationFieldId": "creator",
            "copyType": "same"
          }
        }
    
    *  `sourceFieldId` The ID of the source field.
    *  `destinationFieldId` The ID of the destination field.
    *  `copyType` Use `same` to copy the value from a field inside the issue, or `parent` to copy the value from the parent issue.
    
    ##### Create Crucible review workflow function #####
    
    A post function that creates a Crucible review for all unreviewed code for the issue.
    
       {
            "type": "CreateCrucibleReviewWorkflowFunction"
        }
    
    **Note:** This post function can be included once in a transition.
    
    ##### Set issue security level based on user's project role function #####
    
    A post function that sets the issue's security level if the current user has a project role.
    
       {
          "type": "SetIssueSecurityFromRoleFunction",
          "configuration": {
            "projectRole": {
                "id":"10002"
            },
            "issueSecurityLevel": {
                "id":"10000"
            }
          }
        }
    
    *  `projectRole` An object containing the ID of the project role.
    *  `issueSecurityLevel` OPTIONAL. The object containing the ID of the security level. If not passed, then the security level is set to `none`.
    
    ##### Trigger a webhook function #####
    
    A post function that triggers a webhook.
    
       {
          "type": "TriggerWebhookFunction",
          "configuration": {
            "webhook": {
              "id": "1"
            }
          }
        }
    
    *  `webhook` An object containing the ID of the webhook listener to trigger.
    
    ##### Update issue custom field function #####
    
    A post function that updates the content of an issue custom field.
    
       {
          "type": "UpdateIssueCustomFieldPostFunction",
          "configuration": {
            "mode": "append",
            "fieldId": "customfield_10003",
            "fieldValue": "yikes"
          }
        }
    
    *  `mode` Use `replace` to override the field content with `fieldValue` or `append` to add `fieldValue` to the end of the field content.
    *  `fieldId` The ID of the field.
    *  `fieldValue` The update content.
    
    ##### Update issue field function #####
    
    A post function that updates a simple issue field.
    
       {
          "type": "UpdateIssueFieldFunction",
          "configuration": {
            "fieldId": "assignee",
            "fieldValue": "5f0c277e70b8a90025a00776"
          }
        }
    
    *  `fieldId` The ID of the field. Allowed field types:
       
        *  `assignee`
        *  `description`
        *  `environment`
        *  `priority`
        *  `resolution`
        *  `summary`
        *  `timeoriginalestimate`
        *  `timeestimate`
        *  `timespent`
    *  `fieldValue` The update value.
    *  If the `fieldId` is `assignee`, the `fieldValue` should be one of these values:
       
        *  an account ID.
        *  `automatic`.
        *  a blank string, which sets the value to `unassigned`.
    
    #### Connect rules ####
    
    Connect rules are conditions, validators, and post functions of a transition that are registered by Connect apps. To create a rule registered by the app, the app must be enabled and the rule's module must exist.
    
       {
          "type": "appKey__moduleKey",
          "configuration": {
            "value":"{\"isValid\":\"true\"}"
          }
        }
    
    *  `type` A Connect rule key in a form of `appKey__moduleKey`.
    *  `value` The stringified JSON configuration of a Connect rule.
    
    #### Forge rules ####
    
    Forge transition rules are not yet supported.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\CreateWorkflowDetails $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\CreateWorkflowBadRequestException
    * @throws \JiraSdk\Exception\CreateWorkflowUnauthorizedException
    * @throws \JiraSdk\Exception\CreateWorkflowForbiddenException
    * @throws \JiraSdk\Exception\CreateWorkflowNotFoundException
    *
    * @return null|\JiraSdk\Model\WorkflowIDs|\Psr\Http\Message\ResponseInterface
    */
    public function createWorkflow(\JiraSdk\Model\CreateWorkflowDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateWorkflow($requestBody), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of workflows with transition rules. The workflows can be filtered to return only those containing workflow transition rules:
    
    *  of one or more transition rule types, such as [workflow post functions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/).
    *  matching one or more transition rule keys.
    
    Only workflows containing transition rules created by the calling Connect app are returned.
    
    Due to server-side optimizations, workflows with an empty list of rules may be returned; these workflows can be ignored.
    
    **[Permissions](#permissions) required:** Only Connect apps can use this operation.
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $types The types of the transition rules to return.
    *     @var array $keys The transition rule class keys, as defined in the Connect app descriptor, of the transition rules to return.
    *     @var array $workflowNames EXPERIMENTAL: The list of workflow names to filter by.
    *     @var array $withTags EXPERIMENTAL: The list of `tags` to filter by.
    *     @var bool $draft EXPERIMENTAL: Whether draft or published workflows are returned. If not provided, both workflow types are returned.
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts `transition`, which, for each rule, returns information about the transition the rule is assigned to.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetWorkflowTransitionRuleConfigurationsBadRequestException
    * @throws \JiraSdk\Exception\GetWorkflowTransitionRuleConfigurationsForbiddenException
    * @throws \JiraSdk\Exception\GetWorkflowTransitionRuleConfigurationsNotFoundException
    *
    * @return null|\JiraSdk\Model\PageBeanWorkflowTransitionRules|\Psr\Http\Message\ResponseInterface
    */
    public function getWorkflowTransitionRuleConfigurations(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetWorkflowTransitionRuleConfigurations($queryParameters), $fetch);
    }
    /**
    * Updates configuration of workflow transition rules. The following rule types are supported:
    
    *  [post functions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/)
    *  [conditions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-condition/)
    *  [validators](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-validator/)
    
    Only rules created by the calling Connect app can be updated.
    
    To assist with app migration, this operation can be used to:
    
    *  Disable a rule.
    *  Add a `tag`. Use this to filter rules in the [Get workflow transition rule configurations](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-rules/#api-rest-api-3-workflow-rule-config-get).
    
    Rules are enabled if the `disabled` parameter is not provided.
    
    **[Permissions](#permissions) required:** Only Connect apps can use this operation.
    *
    * @param \JiraSdk\Model\WorkflowTransitionRulesUpdate $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateWorkflowTransitionRuleConfigurationsBadRequestException
    * @throws \JiraSdk\Exception\UpdateWorkflowTransitionRuleConfigurationsForbiddenException
    *
    * @return null|\JiraSdk\Model\WorkflowTransitionRulesUpdateErrors|\Psr\Http\Message\ResponseInterface
    */
    public function updateWorkflowTransitionRuleConfigurations(\JiraSdk\Model\WorkflowTransitionRulesUpdate $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateWorkflowTransitionRuleConfigurations($requestBody), $fetch);
    }
    /**
    * Deletes workflow transition rules from one or more workflows. These rule types are supported:
    
    *  [post functions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/)
    *  [conditions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-condition/)
    *  [validators](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-validator/)
    
    Only rules created by the calling Connect app can be deleted.
    
    **[Permissions](#permissions) required:** Only Connect apps can use this operation.
    *
    * @param \JiraSdk\Model\WorkflowsWithTransitionRulesDetails $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteWorkflowTransitionRuleConfigurationsBadRequestException
    * @throws \JiraSdk\Exception\DeleteWorkflowTransitionRuleConfigurationsForbiddenException
    *
    * @return null|\JiraSdk\Model\WorkflowTransitionRulesUpdateErrors|\Psr\Http\Message\ResponseInterface
    */
    public function deleteWorkflowTransitionRuleConfigurations(\JiraSdk\Model\WorkflowsWithTransitionRulesDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteWorkflowTransitionRuleConfigurations($requestBody), $fetch);
    }
    /**
    * Returns a [paginated](#pagination) list of published classic workflows. When workflow names are specified, details of those workflows are returned. Otherwise, all published classic workflows are returned.
    
    This operation does not return next-gen workflows.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $workflowName The name of a workflow to return. To include multiple workflows, provide an ampersand-separated list. For example, `workflowName=name1&workflowName=name2`.
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
    
    *  `transitions` For each workflow, returns information about the transitions inside the workflow.
    *  `transitions.rules` For each workflow transition, returns information about its rules. Transitions are included automatically if this expand is requested.
    *  `transitions.properties` For each workflow transition, returns information about its properties. Transitions are included automatically if this expand is requested.
    *  `statuses` For each workflow, returns information about the statuses inside the workflow.
    *  `statuses.properties` For each workflow status, returns information about its properties. Statuses are included automatically if this expand is requested.
    *  `default` For each workflow, returns information about whether this is the default workflow.
    *  `schemes` For each workflow, returns information about the workflow schemes the workflow is assigned to.
    *  `projects` For each workflow, returns information about the projects the workflow is assigned to, through workflow schemes.
    *  `hasDraftWorkflow` For each workflow, returns information about whether the workflow has a draft version.
    *  `operations` For each workflow, returns information about the actions that can be undertaken on the workflow.
    *     @var string $queryString String used to perform a case-insensitive partial match with workflow name.
    *     @var string $orderBy [Order](#ordering) the results by a field:
    
    *  `name` Sorts by workflow name.
    *  `created` Sorts by create time.
    *  `updated` Sorts by update time.
    *     @var bool $isActive Filters active and inactive workflows.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetWorkflowsPaginatedUnauthorizedException
    * @throws \JiraSdk\Exception\GetWorkflowsPaginatedForbiddenException
    *
    * @return null|\JiraSdk\Model\PageBeanWorkflow|\Psr\Http\Message\ResponseInterface
    */
    public function getWorkflowsPaginated(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetWorkflowsPaginated($queryParameters), $fetch);
    }
    /**
     * Deletes a property from a workflow transition. Transition properties are used to change the behavior of a transition. For more information, see [Transition properties](https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties) and [Workflow properties](https://confluence.atlassian.com/x/JYlKLg).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $transitionId The ID of the transition. To get the ID, view the workflow in text mode in the Jira admin settings. The ID is shown next to the transition.
     * @param array $queryParameters {
     *     @var string $key The name of the transition property to delete, also known as the name of the property.
     *     @var string $workflowName The name of the workflow that the transition belongs to.
     *     @var string $workflowMode The workflow status. Set to `live` for inactive workflows or `draft` for draft workflows. Active workflows cannot be edited.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteWorkflowTransitionPropertyBadRequestException
     * @throws \JiraSdk\Exception\DeleteWorkflowTransitionPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteWorkflowTransitionPropertyForbiddenException
     * @throws \JiraSdk\Exception\DeleteWorkflowTransitionPropertyNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteWorkflowTransitionProperty(int $transitionId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteWorkflowTransitionProperty($transitionId, $queryParameters), $fetch);
    }
    /**
     * Returns the properties on a workflow transition. Transition properties are used to change the behavior of a transition. For more information, see [Transition properties](https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties) and [Workflow properties](https://confluence.atlassian.com/x/JYlKLg).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $transitionId The ID of the transition. To get the ID, view the workflow in text mode in the Jira administration console. The ID is shown next to the transition.
     * @param array $queryParameters {
     *     @var bool $includeReservedKeys Some properties with keys that have the *jira.* prefix are reserved, which means they are not editable. To include these properties in the results, set this parameter to *true*.
     *     @var string $key The key of the property being returned, also known as the name of the property. If this parameter is not specified, all properties on the transition are returned.
     *     @var string $workflowName The name of the workflow that the transition belongs to.
     *     @var string $workflowMode The workflow status. Set to *live* for active and inactive workflows, or *draft* for draft workflows.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetWorkflowTransitionPropertiesBadRequestException
     * @throws \JiraSdk\Exception\GetWorkflowTransitionPropertiesUnauthorizedException
     * @throws \JiraSdk\Exception\GetWorkflowTransitionPropertiesForbiddenException
     * @throws \JiraSdk\Exception\GetWorkflowTransitionPropertiesNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowTransitionProperty|\Psr\Http\Message\ResponseInterface
     */
    public function getWorkflowTransitionProperties(int $transitionId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetWorkflowTransitionProperties($transitionId, $queryParameters), $fetch);
    }
    /**
     * Adds a property to a workflow transition. Transition properties are used to change the behavior of a transition. For more information, see [Transition properties](https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties) and [Workflow properties](https://confluence.atlassian.com/x/JYlKLg).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $transitionId The ID of the transition. To get the ID, view the workflow in text mode in the Jira admin settings. The ID is shown next to the transition.
     * @param \JiraSdk\Model\WorkflowTransitionProperty $requestBody 
     * @param array $queryParameters {
     *     @var string $key The key of the property being added, also known as the name of the property. Set this to the same value as the `key` defined in the request body.
     *     @var string $workflowName The name of the workflow that the transition belongs to.
     *     @var string $workflowMode The workflow status. Set to *live* for inactive workflows or *draft* for draft workflows. Active workflows cannot be edited.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateWorkflowTransitionPropertyBadRequestException
     * @throws \JiraSdk\Exception\CreateWorkflowTransitionPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\CreateWorkflowTransitionPropertyForbiddenException
     * @throws \JiraSdk\Exception\CreateWorkflowTransitionPropertyNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowTransitionProperty|\Psr\Http\Message\ResponseInterface
     */
    public function createWorkflowTransitionProperty(int $transitionId, \JiraSdk\Model\WorkflowTransitionProperty $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateWorkflowTransitionProperty($transitionId, $requestBody, $queryParameters), $fetch);
    }
    /**
     * Updates a workflow transition by changing the property value. Trying to update a property that does not exist results in a new property being added to the transition. Transition properties are used to change the behavior of a transition. For more information, see [Transition properties](https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties) and [Workflow properties](https://confluence.atlassian.com/x/JYlKLg).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $transitionId The ID of the transition. To get the ID, view the workflow in text mode in the Jira admin settings. The ID is shown next to the transition.
     * @param \JiraSdk\Model\WorkflowTransitionProperty $requestBody 
     * @param array $queryParameters {
     *     @var string $key The key of the property being updated, also known as the name of the property. Set this to the same value as the `key` defined in the request body.
     *     @var string $workflowName The name of the workflow that the transition belongs to.
     *     @var string $workflowMode The workflow status. Set to `live` for inactive workflows or `draft` for draft workflows. Active workflows cannot be edited.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateWorkflowTransitionPropertyBadRequestException
     * @throws \JiraSdk\Exception\UpdateWorkflowTransitionPropertyUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateWorkflowTransitionPropertyForbiddenException
     * @throws \JiraSdk\Exception\UpdateWorkflowTransitionPropertyNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowTransitionProperty|\Psr\Http\Message\ResponseInterface
     */
    public function updateWorkflowTransitionProperty(int $transitionId, \JiraSdk\Model\WorkflowTransitionProperty $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateWorkflowTransitionProperty($transitionId, $requestBody, $queryParameters), $fetch);
    }
    /**
    * Deletes a workflow.
    
    The workflow cannot be deleted if it is:
    
    *  an active workflow.
    *  a system workflow.
    *  associated with any workflow scheme.
    *  associated with any draft workflow scheme.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $entityId The entity ID of the workflow.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteInactiveWorkflowBadRequestException
    * @throws \JiraSdk\Exception\DeleteInactiveWorkflowUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteInactiveWorkflowForbiddenException
    * @throws \JiraSdk\Exception\DeleteInactiveWorkflowNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteInactiveWorkflow(string $entityId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteInactiveWorkflow($entityId), $fetch);
    }
    /**
     * Returns a [paginated](#pagination) list of all workflow schemes, not including draft workflow schemes.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetAllWorkflowSchemesUnauthorizedException
     * @throws \JiraSdk\Exception\GetAllWorkflowSchemesForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanWorkflowScheme|\Psr\Http\Message\ResponseInterface
     */
    public function getAllWorkflowSchemes(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetAllWorkflowSchemes($queryParameters), $fetch);
    }
    /**
     * Creates a workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\WorkflowScheme $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateWorkflowSchemeBadRequestException
     * @throws \JiraSdk\Exception\CreateWorkflowSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\CreateWorkflowSchemeForbiddenException
     *
     * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
     */
    public function createWorkflowScheme(\JiraSdk\Model\WorkflowScheme $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateWorkflowScheme($requestBody), $fetch);
    }
    /**
    * Returns a list of the workflow schemes associated with a list of projects. Each returned workflow scheme includes a list of the requested projects associated with it. Any team-managed or non-existent projects in the request are ignored and no errors are returned.
    
    If the project is associated with the `Default Workflow Scheme` no ID is returned. This is because the way the `Default Workflow Scheme` is stored means it has no ID.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var array $projectId The ID of a project to return the workflow schemes for. To include multiple projects, provide an ampersand-Jim: oneseparated list. For example, `projectId=10000&projectId=10001`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetWorkflowSchemeProjectAssociationsBadRequestException
    * @throws \JiraSdk\Exception\GetWorkflowSchemeProjectAssociationsUnauthorizedException
    * @throws \JiraSdk\Exception\GetWorkflowSchemeProjectAssociationsForbiddenException
    *
    * @return null|\JiraSdk\Model\ContainerOfWorkflowSchemeAssociations|\Psr\Http\Message\ResponseInterface
    */
    public function getWorkflowSchemeProjectAssociations(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetWorkflowSchemeProjectAssociations($queryParameters), $fetch);
    }
    /**
    * Assigns a workflow scheme to a project. This operation is performed only when there are no issues in the project.
    
    Workflow schemes can only be assigned to classic projects.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param \JiraSdk\Model\WorkflowSchemeProjectAssociation $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AssignSchemeToProjectBadRequestException
    * @throws \JiraSdk\Exception\AssignSchemeToProjectUnauthorizedException
    * @throws \JiraSdk\Exception\AssignSchemeToProjectForbiddenException
    * @throws \JiraSdk\Exception\AssignSchemeToProjectNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function assignSchemeToProject(\JiraSdk\Model\WorkflowSchemeProjectAssociation $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AssignSchemeToProject($requestBody), $fetch);
    }
    /**
     * Deletes a workflow scheme. Note that a workflow scheme cannot be deleted if it is active (that is, being used by at least one project).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme. Find this ID by editing the desired workflow scheme in Jira. The ID is shown in the URL as `schemeId`. For example, *schemeId=10301*.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeBadRequestException
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeForbiddenException
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteWorkflowScheme(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteWorkflowScheme($id), $fetch);
    }
    /**
     * Returns a workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme. Find this ID by editing the desired workflow scheme in Jira. The ID is shown in the URL as `schemeId`. For example, *schemeId=10301*.
     * @param array $queryParameters {
     *     @var bool $returnDraftIfExists Returns the workflow scheme's draft rather than scheme itself, if set to true. If the workflow scheme does not have a draft, then the workflow scheme is returned.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetWorkflowSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\GetWorkflowSchemeForbiddenException
     * @throws \JiraSdk\Exception\GetWorkflowSchemeNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
     */
    public function getWorkflowScheme(int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetWorkflowScheme($id, $queryParameters), $fetch);
    }
    /**
     * Updates a workflow scheme, including the name, default workflow, issue type to project mappings, and more. If the workflow scheme is active (that is, being used by at least one project), then a draft workflow scheme is created or updated instead, provided that `updateDraftIfNeeded` is set to `true`.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme. Find this ID by editing the desired workflow scheme in Jira. The ID is shown in the URL as `schemeId`. For example, *schemeId=10301*.
     * @param \JiraSdk\Model\WorkflowScheme $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateWorkflowSchemeBadRequestException
     * @throws \JiraSdk\Exception\UpdateWorkflowSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateWorkflowSchemeForbiddenException
     * @throws \JiraSdk\Exception\UpdateWorkflowSchemeNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
     */
    public function updateWorkflowScheme(int $id, \JiraSdk\Model\WorkflowScheme $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateWorkflowScheme($id, $requestBody), $fetch);
    }
    /**
     * Create a draft workflow scheme from an active workflow scheme, by copying the active workflow scheme. Note that an active workflow scheme can only have one draft workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the active workflow scheme that the draft is created from.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\CreateWorkflowSchemeDraftFromParentBadRequestException
     * @throws \JiraSdk\Exception\CreateWorkflowSchemeDraftFromParentUnauthorizedException
     * @throws \JiraSdk\Exception\CreateWorkflowSchemeDraftFromParentForbiddenException
     *
     * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
     */
    public function createWorkflowSchemeDraftFromParent(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\CreateWorkflowSchemeDraftFromParent($id), $fetch);
    }
    /**
    * Resets the default workflow for a workflow scheme. That is, the default workflow is set to Jira's system workflow (the *jira* workflow).
    
    Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` and a draft workflow scheme is created or updated with the default workflow reset. The draft workflow scheme can be published in Jira.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the workflow scheme.
    * @param array $queryParameters {
    *     @var bool $updateDraftIfNeeded Set to true to create or update the draft of a workflow scheme and delete the mapping from the draft, when the workflow scheme cannot be edited. Defaults to `false`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteDefaultWorkflowBadRequestException
    * @throws \JiraSdk\Exception\DeleteDefaultWorkflowUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteDefaultWorkflowForbiddenException
    * @throws \JiraSdk\Exception\DeleteDefaultWorkflowNotFoundException
    *
    * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
    */
    public function deleteDefaultWorkflow(int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteDefaultWorkflow($id, $queryParameters), $fetch);
    }
    /**
     * Returns the default workflow for a workflow scheme. The default workflow is the workflow that is assigned any issue types that have not been mapped to any other workflow. The default workflow has *All Unassigned Issue Types* listed in its issue types for the workflow scheme in Jira.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme.
     * @param array $queryParameters {
     *     @var bool $returnDraftIfExists Set to `true` to return the default workflow for the workflow scheme's draft rather than scheme itself. If the workflow scheme does not have a draft, then the default workflow for the workflow scheme is returned.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetDefaultWorkflowUnauthorizedException
     * @throws \JiraSdk\Exception\GetDefaultWorkflowForbiddenException
     * @throws \JiraSdk\Exception\GetDefaultWorkflowNotFoundException
     *
     * @return null|\JiraSdk\Model\DefaultWorkflow|\Psr\Http\Message\ResponseInterface
     */
    public function getDefaultWorkflow(int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetDefaultWorkflow($id, $queryParameters), $fetch);
    }
    /**
    * Sets the default workflow for a workflow scheme.
    
    Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` in the request object and a draft workflow scheme is created or updated with the new default workflow. The draft workflow scheme can be published in Jira.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the workflow scheme.
    * @param \JiraSdk\Model\DefaultWorkflow $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateDefaultWorkflowBadRequestException
    * @throws \JiraSdk\Exception\UpdateDefaultWorkflowUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateDefaultWorkflowForbiddenException
    * @throws \JiraSdk\Exception\UpdateDefaultWorkflowNotFoundException
    *
    * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
    */
    public function updateDefaultWorkflow(int $id, \JiraSdk\Model\DefaultWorkflow $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateDefaultWorkflow($id, $requestBody), $fetch);
    }
    /**
     * Deletes a draft workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the active workflow scheme that the draft was created from.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeDraftUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeDraftForbiddenException
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeDraftNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteWorkflowSchemeDraft(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteWorkflowSchemeDraft($id), $fetch);
    }
    /**
    * Returns the draft workflow scheme for an active workflow scheme. Draft workflow schemes allow changes to be made to the active workflow schemes: When an active workflow scheme is updated, a draft copy is created. The draft is modified, then the changes in the draft are copied back to the active workflow scheme. See [Configuring workflow schemes](https://confluence.atlassian.com/x/tohKLg) for more information.  
    Note that:
    
    *  Only active workflow schemes can have draft workflow schemes.
    *  An active workflow scheme can only have one draft workflow scheme.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the active workflow scheme that the draft was created from.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetWorkflowSchemeDraftUnauthorizedException
    * @throws \JiraSdk\Exception\GetWorkflowSchemeDraftForbiddenException
    * @throws \JiraSdk\Exception\GetWorkflowSchemeDraftNotFoundException
    *
    * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
    */
    public function getWorkflowSchemeDraft(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetWorkflowSchemeDraft($id), $fetch);
    }
    /**
     * Updates a draft workflow scheme. If a draft workflow scheme does not exist for the active workflow scheme, then a draft is created. Note that an active workflow scheme can only have one draft workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the active workflow scheme that the draft was created from.
     * @param \JiraSdk\Model\WorkflowScheme $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateWorkflowSchemeDraftBadRequestException
     * @throws \JiraSdk\Exception\UpdateWorkflowSchemeDraftUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateWorkflowSchemeDraftForbiddenException
     * @throws \JiraSdk\Exception\UpdateWorkflowSchemeDraftNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
     */
    public function updateWorkflowSchemeDraft(int $id, \JiraSdk\Model\WorkflowScheme $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateWorkflowSchemeDraft($id, $requestBody), $fetch);
    }
    /**
     * Resets the default workflow for a workflow scheme's draft. That is, the default workflow is set to Jira's system workflow (the *jira* workflow).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteDraftDefaultWorkflowUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteDraftDefaultWorkflowForbiddenException
     * @throws \JiraSdk\Exception\DeleteDraftDefaultWorkflowNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
     */
    public function deleteDraftDefaultWorkflow(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteDraftDefaultWorkflow($id), $fetch);
    }
    /**
     * Returns the default workflow for a workflow scheme's draft. The default workflow is the workflow that is assigned any issue types that have not been mapped to any other workflow. The default workflow has *All Unassigned Issue Types* listed in its issue types for the workflow scheme in Jira.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetDraftDefaultWorkflowUnauthorizedException
     * @throws \JiraSdk\Exception\GetDraftDefaultWorkflowForbiddenException
     * @throws \JiraSdk\Exception\GetDraftDefaultWorkflowNotFoundException
     *
     * @return null|\JiraSdk\Model\DefaultWorkflow|\Psr\Http\Message\ResponseInterface
     */
    public function getDraftDefaultWorkflow(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetDraftDefaultWorkflow($id), $fetch);
    }
    /**
     * Sets the default workflow for a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param \JiraSdk\Model\DefaultWorkflow $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateDraftDefaultWorkflowBadRequestException
     * @throws \JiraSdk\Exception\UpdateDraftDefaultWorkflowUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateDraftDefaultWorkflowForbiddenException
     * @throws \JiraSdk\Exception\UpdateDraftDefaultWorkflowNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
     */
    public function updateDraftDefaultWorkflow(int $id, \JiraSdk\Model\DefaultWorkflow $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateDraftDefaultWorkflow($id, $requestBody), $fetch);
    }
    /**
     * Deletes the issue type-workflow mapping for an issue type in a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param string $issueType The ID of the issue type.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeDraftIssueTypeUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeDraftIssueTypeForbiddenException
     * @throws \JiraSdk\Exception\DeleteWorkflowSchemeDraftIssueTypeNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
     */
    public function deleteWorkflowSchemeDraftIssueType(int $id, string $issueType, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteWorkflowSchemeDraftIssueType($id, $issueType), $fetch);
    }
    /**
     * Returns the issue type-workflow mapping for an issue type in a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param string $issueType The ID of the issue type.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetWorkflowSchemeDraftIssueTypeUnauthorizedException
     * @throws \JiraSdk\Exception\GetWorkflowSchemeDraftIssueTypeForbiddenException
     * @throws \JiraSdk\Exception\GetWorkflowSchemeDraftIssueTypeNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueTypeWorkflowMapping|\Psr\Http\Message\ResponseInterface
     */
    public function getWorkflowSchemeDraftIssueType(int $id, string $issueType, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetWorkflowSchemeDraftIssueType($id, $issueType), $fetch);
    }
    /**
     * Sets the workflow for an issue type in a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param string $issueType The ID of the issue type.
     * @param \JiraSdk\Model\IssueTypeWorkflowMapping $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\SetWorkflowSchemeDraftIssueTypeBadRequestException
     * @throws \JiraSdk\Exception\SetWorkflowSchemeDraftIssueTypeUnauthorizedException
     * @throws \JiraSdk\Exception\SetWorkflowSchemeDraftIssueTypeForbiddenException
     * @throws \JiraSdk\Exception\SetWorkflowSchemeDraftIssueTypeNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
     */
    public function setWorkflowSchemeDraftIssueType(int $id, string $issueType, \JiraSdk\Model\IssueTypeWorkflowMapping $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetWorkflowSchemeDraftIssueType($id, $issueType, $requestBody), $fetch);
    }
    /**
    * Publishes a draft workflow scheme.
    
    Where the draft workflow includes new workflow statuses for an issue type, mappings are provided to update issues with the original workflow status to the new workflow status.
    
    This operation is [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain updates.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the workflow scheme that the draft belongs to.
    * @param \JiraSdk\Model\PublishDraftWorkflowScheme $requestBody 
    * @param array $queryParameters {
    *     @var bool $validateOnly Whether the request only performs a validation.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\PublishDraftWorkflowSchemeBadRequestException
    * @throws \JiraSdk\Exception\PublishDraftWorkflowSchemeUnauthorizedException
    * @throws \JiraSdk\Exception\PublishDraftWorkflowSchemeForbiddenException
    * @throws \JiraSdk\Exception\PublishDraftWorkflowSchemeNotFoundException
    *
    * @return null|\JiraSdk\Model\TaskProgressBeanObject|\Psr\Http\Message\ResponseInterface
    */
    public function publishDraftWorkflowScheme(int $id, \JiraSdk\Model\PublishDraftWorkflowScheme $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\PublishDraftWorkflowScheme($id, $requestBody, $queryParameters), $fetch);
    }
    /**
     * Deletes the workflow-issue type mapping for a workflow in a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param array $queryParameters {
     *     @var string $workflowName The name of the workflow.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DeleteDraftWorkflowMappingUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteDraftWorkflowMappingForbiddenException
     * @throws \JiraSdk\Exception\DeleteDraftWorkflowMappingNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function deleteDraftWorkflowMapping(int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteDraftWorkflowMapping($id, $queryParameters), $fetch);
    }
    /**
     * Returns the workflow-issue type mappings for a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param array $queryParameters {
     *     @var string $workflowName The name of a workflow in the scheme. Limits the results to the workflow-issue type mapping for the specified workflow.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetDraftWorkflowUnauthorizedException
     * @throws \JiraSdk\Exception\GetDraftWorkflowForbiddenException
     * @throws \JiraSdk\Exception\GetDraftWorkflowNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueTypesWorkflowMapping|\Psr\Http\Message\ResponseInterface
     */
    public function getDraftWorkflow(int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetDraftWorkflow($id, $queryParameters), $fetch);
    }
    /**
     * Sets the issue types for a workflow in a workflow scheme's draft. The workflow can also be set as the default workflow for the draft workflow scheme. Unmapped issues types are mapped to the default workflow.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme that the draft belongs to.
     * @param \JiraSdk\Model\IssueTypesWorkflowMapping $requestBody 
     * @param array $queryParameters {
     *     @var string $workflowName The name of the workflow.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\UpdateDraftWorkflowMappingBadRequestException
     * @throws \JiraSdk\Exception\UpdateDraftWorkflowMappingUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateDraftWorkflowMappingForbiddenException
     * @throws \JiraSdk\Exception\UpdateDraftWorkflowMappingNotFoundException
     *
     * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
     */
    public function updateDraftWorkflowMapping(int $id, \JiraSdk\Model\IssueTypesWorkflowMapping $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateDraftWorkflowMapping($id, $requestBody, $queryParameters), $fetch);
    }
    /**
    * Deletes the issue type-workflow mapping for an issue type in a workflow scheme.
    
    Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` and a draft workflow scheme is created or updated with the issue type-workflow mapping deleted. The draft workflow scheme can be published in Jira.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the workflow scheme.
    * @param string $issueType The ID of the issue type.
    * @param array $queryParameters {
    *     @var bool $updateDraftIfNeeded Set to true to create or update the draft of a workflow scheme and update the mapping in the draft, when the workflow scheme cannot be edited. Defaults to `false`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteWorkflowSchemeIssueTypeBadRequestException
    * @throws \JiraSdk\Exception\DeleteWorkflowSchemeIssueTypeUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteWorkflowSchemeIssueTypeForbiddenException
    * @throws \JiraSdk\Exception\DeleteWorkflowSchemeIssueTypeNotFoundException
    *
    * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
    */
    public function deleteWorkflowSchemeIssueType(int $id, string $issueType, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteWorkflowSchemeIssueType($id, $issueType, $queryParameters), $fetch);
    }
    /**
     * Returns the issue type-workflow mapping for an issue type in a workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme.
     * @param string $issueType The ID of the issue type.
     * @param array $queryParameters {
     *     @var bool $returnDraftIfExists Returns the mapping from the workflow scheme's draft rather than the workflow scheme, if set to true. If no draft exists, the mapping from the workflow scheme is returned.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetWorkflowSchemeIssueTypeUnauthorizedException
     * @throws \JiraSdk\Exception\GetWorkflowSchemeIssueTypeForbiddenException
     * @throws \JiraSdk\Exception\GetWorkflowSchemeIssueTypeNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueTypeWorkflowMapping|\Psr\Http\Message\ResponseInterface
     */
    public function getWorkflowSchemeIssueType(int $id, string $issueType, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetWorkflowSchemeIssueType($id, $issueType, $queryParameters), $fetch);
    }
    /**
    * Sets the workflow for an issue type in a workflow scheme.
    
    Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` in the request body and a draft workflow scheme is created or updated with the new issue type-workflow mapping. The draft workflow scheme can be published in Jira.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the workflow scheme.
    * @param string $issueType The ID of the issue type.
    * @param \JiraSdk\Model\IssueTypeWorkflowMapping $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\SetWorkflowSchemeIssueTypeBadRequestException
    * @throws \JiraSdk\Exception\SetWorkflowSchemeIssueTypeUnauthorizedException
    * @throws \JiraSdk\Exception\SetWorkflowSchemeIssueTypeForbiddenException
    * @throws \JiraSdk\Exception\SetWorkflowSchemeIssueTypeNotFoundException
    *
    * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
    */
    public function setWorkflowSchemeIssueType(int $id, string $issueType, \JiraSdk\Model\IssueTypeWorkflowMapping $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\SetWorkflowSchemeIssueType($id, $issueType, $requestBody), $fetch);
    }
    /**
    * Deletes the workflow-issue type mapping for a workflow in a workflow scheme.
    
    Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` and a draft workflow scheme is created or updated with the workflow-issue type mapping deleted. The draft workflow scheme can be published in Jira.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the workflow scheme.
    * @param array $queryParameters {
    *     @var string $workflowName The name of the workflow.
    *     @var bool $updateDraftIfNeeded Set to true to create or update the draft of a workflow scheme and delete the mapping from the draft, when the workflow scheme cannot be edited. Defaults to `false`.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DeleteWorkflowMappingBadRequestException
    * @throws \JiraSdk\Exception\DeleteWorkflowMappingUnauthorizedException
    * @throws \JiraSdk\Exception\DeleteWorkflowMappingForbiddenException
    * @throws \JiraSdk\Exception\DeleteWorkflowMappingNotFoundException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function deleteWorkflowMapping(int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DeleteWorkflowMapping($id, $queryParameters), $fetch);
    }
    /**
     * Returns the workflow-issue type mappings for a workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $id The ID of the workflow scheme.
     * @param array $queryParameters {
     *     @var string $workflowName The name of a workflow in the scheme. Limits the results to the workflow-issue type mapping for the specified workflow.
     *     @var bool $returnDraftIfExists Returns the mapping from the workflow scheme's draft rather than the workflow scheme, if set to true. If no draft exists, the mapping from the workflow scheme is returned.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\GetWorkflowUnauthorizedException
     * @throws \JiraSdk\Exception\GetWorkflowForbiddenException
     * @throws \JiraSdk\Exception\GetWorkflowNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueTypesWorkflowMapping|\Psr\Http\Message\ResponseInterface
     */
    public function getWorkflow(int $id, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetWorkflow($id, $queryParameters), $fetch);
    }
    /**
    * Sets the issue types for a workflow in a workflow scheme. The workflow can also be set as the default workflow for the workflow scheme. Unmapped issues types are mapped to the default workflow.
    
    Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` in the request body and a draft workflow scheme is created or updated with the new workflow-issue types mappings. The draft workflow scheme can be published in Jira.
    
    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $id The ID of the workflow scheme.
    * @param \JiraSdk\Model\IssueTypesWorkflowMapping $requestBody 
    * @param array $queryParameters {
    *     @var string $workflowName The name of the workflow.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\UpdateWorkflowMappingBadRequestException
    * @throws \JiraSdk\Exception\UpdateWorkflowMappingUnauthorizedException
    * @throws \JiraSdk\Exception\UpdateWorkflowMappingForbiddenException
    * @throws \JiraSdk\Exception\UpdateWorkflowMappingNotFoundException
    *
    * @return null|\JiraSdk\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface
    */
    public function updateWorkflowMapping(int $id, \JiraSdk\Model\IssueTypesWorkflowMapping $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\UpdateWorkflowMapping($id, $requestBody, $queryParameters), $fetch);
    }
    /**
    * Returns a list of IDs and delete timestamps for worklogs deleted after a date and time.
    
    This resource is paginated, with a limit of 1000 worklogs per page. Each page lists worklogs from oldest to youngest. If the number of items in the date range exceeds 1000, `until` indicates the timestamp of the youngest item on the page. Also, `nextPage` provides the URL for the next page of worklogs. The `lastPage` parameter is set to true on the last page of worklogs.
    
    This resource does not return worklogs deleted during the minute preceding the request.
    
    **[Permissions](#permissions) required:** Permission to access Jira.
    *
    * @param array $queryParameters {
    *     @var int $since The date and time, as a UNIX timestamp in milliseconds, after which deleted worklogs are returned.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIdsOfWorklogsDeletedSinceUnauthorizedException
    *
    * @return null|\JiraSdk\Model\ChangedWorklogs|\Psr\Http\Message\ResponseInterface
    */
    public function getIdsOfWorklogsDeletedSince(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIdsOfWorklogsDeletedSince($queryParameters), $fetch);
    }
    /**
    * Returns worklog details for a list of worklog IDs.
    
    The returned list of worklogs is limited to 1000 items.
    
    **[Permissions](#permissions) required:** Permission to access Jira, however, worklogs are only returned where either of the following is true:
    
    *  the worklog is set as *Viewable by All Users*.
    *  the user is a member of a project role or group with permission to view the worklog.
    *
    * @param \JiraSdk\Model\WorklogIdsRequestBean $requestBody 
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts `properties` that returns the properties of each worklog.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetWorklogsForIdsBadRequestException
    * @throws \JiraSdk\Exception\GetWorklogsForIdsUnauthorizedException
    *
    * @return null|\JiraSdk\Model\Worklog[]|\Psr\Http\Message\ResponseInterface
    */
    public function getWorklogsForIds(\JiraSdk\Model\WorklogIdsRequestBean $requestBody, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetWorklogsForIds($requestBody, $queryParameters), $fetch);
    }
    /**
    * Returns a list of IDs and update timestamps for worklogs updated after a date and time.
    
    This resource is paginated, with a limit of 1000 worklogs per page. Each page lists worklogs from oldest to youngest. If the number of items in the date range exceeds 1000, `until` indicates the timestamp of the youngest item on the page. Also, `nextPage` provides the URL for the next page of worklogs. The `lastPage` parameter is set to true on the last page of worklogs.
    
    This resource does not return worklogs updated during the minute preceding the request.
    
    **[Permissions](#permissions) required:** Permission to access Jira, however, worklogs are only returned where either of the following is true:
    
    *  the worklog is set as *Viewable by All Users*.
    *  the user is a member of a project role or group with permission to view the worklog.
    *
    * @param array $queryParameters {
    *     @var int $since The date and time, as a UNIX timestamp in milliseconds, after which updated worklogs are returned.
    *     @var string $expand Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts `properties` that returns the properties of each worklog.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\GetIdsOfWorklogsModifiedSinceUnauthorizedException
    *
    * @return null|\JiraSdk\Model\ChangedWorklogs|\Psr\Http\Message\ResponseInterface
    */
    public function getIdsOfWorklogsModifiedSince(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\GetIdsOfWorklogsModifiedSince($queryParameters), $fetch);
    }
    /**
    * Gets all the properties of an app.
    
    **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
    Additionally, Forge apps published on the Marketplace can access properties of Connect apps they were [migrated from](https://developer.atlassian.com/platform/forge/build-a-connect-on-forge-app/).
    *
    * @param string $addonKey The key of the app, as defined in its descriptor.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AddonPropertiesResourceGetAddonPropertiesGetUnauthorizedException
    *
    * @return null|\JiraSdk\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface
    */
    public function addonPropertiesResourceGetAddonPropertiesGet(string $addonKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddonPropertiesResourceGetAddonPropertiesGet($addonKey), $fetch);
    }
    /**
     * Deletes an app's property.
     **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
     *
     * @param string $addonKey The key of the app, as defined in its descriptor.
     * @param string $propertyKey The key of the property.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteBadRequestException
     * @throws \JiraSdk\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteUnauthorizedException
     * @throws \JiraSdk\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteNotFoundException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function addonPropertiesResourceDeleteAddonPropertyDelete(string $addonKey, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddonPropertiesResourceDeleteAddonPropertyDelete($addonKey, $propertyKey), $fetch);
    }
    /**
    * Returns the key and value of an app's property.
    
    **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
    Additionally, Forge apps published on the Marketplace can access properties of Connect apps they were [migrated from](https://developer.atlassian.com/platform/forge/build-a-connect-on-forge-app/).
    *
    * @param string $addonKey The key of the app, as defined in its descriptor.
    * @param string $propertyKey The key of the property.
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AddonPropertiesResourceGetAddonPropertyGetBadRequestException
    * @throws \JiraSdk\Exception\AddonPropertiesResourceGetAddonPropertyGetUnauthorizedException
    * @throws \JiraSdk\Exception\AddonPropertiesResourceGetAddonPropertyGetNotFoundException
    *
    * @return null|\JiraSdk\Model\EntityProperty|\Psr\Http\Message\ResponseInterface
    */
    public function addonPropertiesResourceGetAddonPropertyGet(string $addonKey, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddonPropertiesResourceGetAddonPropertyGet($addonKey, $propertyKey), $fetch);
    }
    /**
    * Sets the value of an app's property. Use this resource to store custom data for your app.
    
    The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
    
    **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
    *
    * @param string $addonKey The key of the app, as defined in its descriptor.
    * @param string $propertyKey The key of the property.
    * @param mixed $requestBody 
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AddonPropertiesResourcePutAddonPropertyPutBadRequestException
    * @throws \JiraSdk\Exception\AddonPropertiesResourcePutAddonPropertyPutUnauthorizedException
    *
    * @return null|\JiraSdk\Model\OperationMessage|\Psr\Http\Message\ResponseInterface
    */
    public function addonPropertiesResourcePutAddonPropertyPut(string $addonKey, string $propertyKey, $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AddonPropertiesResourcePutAddonPropertyPut($addonKey, $propertyKey, $requestBody), $fetch);
    }
    /**
    * Remove all or a list of modules registered by the calling app.
    
    **[Permissions](#permissions) required:** Only Connect apps can make this request.
    *
    * @param array $queryParameters {
    *     @var array $moduleKey The key of the module to remove. To include multiple module keys, provide multiple copies of this parameter.
    For example, `moduleKey=dynamic-attachment-entity-property&moduleKey=dynamic-select-field`.
    Nonexistent keys are ignored.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\DynamicModulesResourceRemoveModulesDeleteUnauthorizedException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function dynamicModulesResourceRemoveModulesDelete(array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DynamicModulesResourceRemoveModulesDelete($queryParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DynamicModulesResourceGetModulesGetUnauthorizedException
     *
     * @return null|\JiraSdk\Model\ConnectModules|\Psr\Http\Message\ResponseInterface
     */
    public function dynamicModulesResourceGetModulesGet(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DynamicModulesResourceGetModulesGet(), $fetch);
    }
    /**
     * Registers a list of modules.
     **[Permissions](#permissions) required:** Only Connect apps can make this request.
     *
     * @param \JiraSdk\Model\ConnectModules $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\DynamicModulesResourceRegisterModulesPostBadRequestException
     * @throws \JiraSdk\Exception\DynamicModulesResourceRegisterModulesPostUnauthorizedException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function dynamicModulesResourceRegisterModulesPost(\JiraSdk\Model\ConnectModules $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\DynamicModulesResourceRegisterModulesPost($requestBody), $fetch);
    }
    /**
    * Updates the value of a custom field added by Connect apps on one or more issues.
    The values of up to 200 custom fields can be updated.
    
    **[Permissions](#permissions) required:** Only Connect apps can make this request.
    *
    * @param \JiraSdk\Model\ConnectCustomFieldValues $requestBody 
    * @param array $headerParameters {
    *     @var string $Atlassian-Transfer-Id The ID of the transfer.
    * }
    * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
    * @throws \JiraSdk\Exception\AppIssueFieldValueUpdateResourceUpdateIssueFieldsPutBadRequestException
    * @throws \JiraSdk\Exception\AppIssueFieldValueUpdateResourceUpdateIssueFieldsPutForbiddenException
    *
    * @return null|\Psr\Http\Message\ResponseInterface
    */
    public function appIssueFieldValueUpdateResourceUpdateIssueFieldsPut(\JiraSdk\Model\ConnectCustomFieldValues $requestBody, array $headerParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\AppIssueFieldValueUpdateResourceUpdateIssueFieldsPut($requestBody, $headerParameters), $fetch);
    }
    /**
     * Updates the values of multiple entity properties for an object, up to 50 updates per request. This operation is for use by Connect apps during app migration.
     *
     * @param string $entityType The type indicating the object that contains the entity properties.
     * @param \JiraSdk\Model\EntityPropertyDetails[] $requestBody 
     * @param array $headerParameters {
     *     @var string $Atlassian-Transfer-Id The app migration transfer ID.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\MigrationResourceUpdateEntityPropertiesValuePutBadRequestException
     * @throws \JiraSdk\Exception\MigrationResourceUpdateEntityPropertiesValuePutForbiddenException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function migrationResourceUpdateEntityPropertiesValuePut(string $entityType, array $requestBody, array $headerParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\MigrationResourceUpdateEntityPropertiesValuePut($entityType, $requestBody, $headerParameters), $fetch);
    }
    /**
     * Returns configurations for workflow transition rules migrated from server to cloud and owned by the calling Connect app.
     *
     * @param \JiraSdk\Model\WorkflowRulesSearch $requestBody 
     * @param array $headerParameters {
     *     @var string $Atlassian-Transfer-Id The app migration transfer ID.
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \JiraSdk\Exception\MigrationResourceWorkflowRuleSearchPostBadRequestException
     * @throws \JiraSdk\Exception\MigrationResourceWorkflowRuleSearchPostForbiddenException
     *
     * @return null|\JiraSdk\Model\WorkflowRulesSearchDetails|\Psr\Http\Message\ResponseInterface
     */
    public function migrationResourceWorkflowRuleSearchPost(\JiraSdk\Model\WorkflowRulesSearch $requestBody, array $headerParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Endpoint\MigrationResourceWorkflowRuleSearchPost($requestBody, $headerParameters), $fetch);
    }
    public static function create($httpClient = null, array $additionalPlugins = array(), array $additionalNormalizers = array())
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = array();
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri('https://your-domain.atlassian.net');
            $plugins[] = new \Http\Client\Common\Plugin\AddHostPlugin($uri);
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = array(new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \JiraSdk\Normalizer\JaneObjectNormalizer());
        if (count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, array(new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(array('json_decode_associative' => true)))));
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}