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

namespace JiraSdk\Api;

class Client extends \JiraSdk\Api\Runtime\Client\Client
{
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\AnnouncementBannerConfiguration|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetBannerUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetBannerForbiddenException
     */
    public function getBanner(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetBanner(), $fetch);
    }

    /**
     * Updates the announcement banner configuration.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\AnnouncementBannerConfigurationUpdate $requestBody
     * @param string                                                   $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetBannerBadRequestException
     * @throws \JiraSdk\Api\Exception\SetBannerUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetBannerForbiddenException
     */
    public function setBanner(Model\AnnouncementBannerConfigurationUpdate $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetBanner($requestBody), $fetch);
    }

    /**
     * Updates the value of one or more custom fields on one or more issues. Combinations of custom field and issue should be unique within the request. Custom fields can only be updated by the Forge app that created them.
     **[Permissions](#permissions) required:** Only the app that created the custom field can update its values with this operation.
     *
     * @param \JiraSdk\Api\Model\MultipleCustomFieldValuesUpdateDetails $requestBody
     * @param array                                                     $queryParameters {
     *
     *     @var bool $generateChangelog Whether to generate a changelog for this update.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateMultipleCustomFieldValuesBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateMultipleCustomFieldValuesForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateMultipleCustomFieldValuesNotFoundException
     */
    public function updateMultipleCustomFieldValues(Model\MultipleCustomFieldValuesUpdateDetails $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateMultipleCustomFieldValues($requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of configurations for a custom field created by a [Forge app](https://developer.atlassian.com/platform/forge/).
     *
     * The result can be filtered by one of these criteria:
     *
     *  `id`.
     *  `fieldContextId`.
     *  `issueId`.
     *  `projectKeyOrId` and `issueTypeId`.
     *
     * Otherwise, all configurations are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the Forge app that created the custom field.
     *
     * @param string $fieldIdOrKey    the ID or key of the custom field, for example `customfield_10000`
     * @param array  $queryParameters {
     *
     *     @var array $id The list of configuration IDs. To include multiple configurations, separate IDs with an ampersand: `id=10000&id=10001`. Can't be provided with `fieldContextId`, `issueId`, `projectKeyOrId`, or `issueTypeId`.
     *     @var array $fieldContextId The list of field context IDs. To include multiple field contexts, separate IDs with an ampersand: `fieldContextId=10000&fieldContextId=10001`. Can't be provided with `id`, `issueId`, `projectKeyOrId`, or `issueTypeId`.
     *     @var int $issueId The ID of the issue to filter results by. If the issue doesn't exist, an empty list is returned. Can't be provided with `projectKeyOrId`, or `issueTypeId`.
     *     @var string $projectKeyOrId The ID or key of the project to filter results by. Must be provided with `issueTypeId`. Can't be provided with `issueId`.
     *     @var string $issueTypeId The ID of the issue type to filter results by. Must be provided with `projectKeyOrId`. Can't be provided with `issueId`.
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanContextualConfiguration|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetCustomFieldConfigurationBadRequestException
     * @throws \JiraSdk\Api\Exception\GetCustomFieldConfigurationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetCustomFieldConfigurationForbiddenException
     * @throws \JiraSdk\Api\Exception\GetCustomFieldConfigurationNotFoundException
     */
    public function getCustomFieldConfiguration(string $fieldIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetCustomFieldConfiguration($fieldIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Update the configuration for contexts of a custom field created by a [Forge app](https://developer.atlassian.com/platform/forge/).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the Forge app that created the custom field.
     *
     * @param string                                       $fieldIdOrKey the ID or key of the custom field, for example `customfield_10000`
     * @param \JiraSdk\Api\Model\CustomFieldConfigurations $requestBody
     * @param string                                       $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldConfigurationBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldConfigurationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldConfigurationForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldConfigurationNotFoundException
     */
    public function updateCustomFieldConfiguration(string $fieldIdOrKey, Model\CustomFieldConfigurations $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateCustomFieldConfiguration($fieldIdOrKey, $requestBody), $fetch);
    }

    /**
     * Updates the value of a custom field on one or more issues. Custom fields can only be updated by the Forge app that created them.
     **[Permissions](#permissions) required:** Only the app that created the custom field can update its values with this operation.
     *
     * @param string                                           $fieldIdOrKey    The ID or key of the custom field. For example, `customfield_10010`.
     * @param \JiraSdk\Api\Model\CustomFieldValueUpdateDetails $requestBody
     * @param array                                            $queryParameters {
     *
     *     @var bool $generateChangelog Whether to generate a changelog for this update.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldValueBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldValueForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldValueNotFoundException
     */
    public function updateCustomFieldValue(string $fieldIdOrKey, Model\CustomFieldValueUpdateDetails $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateCustomFieldValue($fieldIdOrKey, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns all application properties or an application property.
     *
     * If you specify a value for the `key` parameter, then an application property is returned as an object (not in an array). Otherwise, an array of all editable application properties is returned. See [Set application property](#api-rest-api-3-application-properties-id-put) for descriptions of editable properties.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var string $key the key of the application property
     *     @var string $permissionLevel the permission level of all items being returned in the list
     *     @var string $keyFilter When a `key` isn't provided, this filters the list of results by the application property `key` using a regular expression. For example, using `jira.lf.*` will return all application properties with keys that start with *jira.lf.*.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ApplicationProperty[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetApplicationPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetApplicationPropertyNotFoundException
     */
    public function getApplicationProperty(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetApplicationProperty($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ApplicationProperty[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAdvancedSettingsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAdvancedSettingsForbiddenException
     */
    public function getAdvancedSettings(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAdvancedSettings(), $fetch);
    }

    /**
     * Changes the value of an application property. For example, you can change the value of the `jira.clone.prefix` from its default value of *CLONE -* to *Clone -* if you prefer sentence case capitalization. Editable properties are described below along with their default values.
     *
     * #### Advanced settings ####
     *
     * The advanced settings below are also accessible in [Jira](https://confluence.atlassian.com/x/vYXKM).
     *
     * | Key | Description | Default value |
     * | -- | -- | -- |
     * | `jira.clone.prefix` | The string of text prefixed to the title of a cloned issue. | `CLONE -` |
     * | `jira.date.picker.java.format` | The date format for the Java (server-side) generated dates. This must be the same as the `jira.date.picker.javascript.format` format setting. | `d/MMM/yy` |
     * | `jira.date.picker.javascript.format` | The date format for the JavaScript (client-side) generated dates. This must be the same as the `jira.date.picker.java.format` format setting. | `%e/%b/%y` |
     * | `jira.date.time.picker.java.format` | The date format for the Java (server-side) generated date times. This must be the same as the `jira.date.time.picker.javascript.format` format setting. | `dd/MMM/yy h:mm a` |
     * | `jira.date.time.picker.javascript.format` | The date format for the JavaScript (client-side) generated date times. This must be the same as the `jira.date.time.picker.java.format` format setting. | `%e/%b/%y %I:%M %p` |
     * | `jira.issue.actions.order` | The default order of actions (such as *Comments* or *Change history*) displayed on the issue view. | `asc` |
     * | `jira.table.cols.subtasks` | The columns to show while viewing subtask issues in a table. For example, a list of subtasks on an issue. | `issuetype, status, assignee, progress` |
     * | `jira.view.issue.links.sort.order` | The sort order of the list of issue links on the issue view. | `type, status, priority` |
     * | `jira.comment.collapsing.minimum.hidden` | The minimum number of comments required for comment collapsing to occur. A value of `0` disables comment collapsing. | `4` |
     * | `jira.newsletter.tip.delay.days` | The number of days before a prompt to sign up to the Jira Insiders newsletter is shown. A value of `-1` disables this feature. | `7` |
     *
     *
     * #### Look and feel ####
     *
     * The settings listed below adjust the [look and feel](https://confluence.atlassian.com/x/VwCLLg).
     *
     * | Key | Description | Default value |
     * | -- | -- | -- |
     * | `jira.lf.date.time` | The [ time format](https://docs.oracle.com/javase/6/docs/api/index.html?java/text/SimpleDateFormat.html). | `h:mm a` |
     * | `jira.lf.date.day` | The [ day format](https://docs.oracle.com/javase/6/docs/api/index.html?java/text/SimpleDateFormat.html). | `EEEE h:mm a` |
     * | `jira.lf.date.complete` | The [ date and time format](https://docs.oracle.com/javase/6/docs/api/index.html?java/text/SimpleDateFormat.html). | `dd/MMM/yy h:mm a` |
     * | `jira.lf.date.dmy` | The [ date format](https://docs.oracle.com/javase/6/docs/api/index.html?java/text/SimpleDateFormat.html). | `dd/MMM/yy` |
     * | `jira.date.time.picker.use.iso8061` | When enabled, sets Monday as the first day of the week in the date picker, as specified by the ISO8601 standard. | `false` |
     * | `jira.lf.logo.url` | The URL of the logo image file. | `/images/icon-jira-logo.png` |
     * | `jira.lf.logo.show.application.title` | Controls the visibility of the application title on the sidebar. | `false` |
     * | `jira.lf.favicon.url` | The URL of the favicon. | `/favicon.ico` |
     * | `jira.lf.favicon.hires.url` | The URL of the high-resolution favicon. | `/images/64jira.png` |
     * | `jira.lf.navigation.bgcolour` | The background color of the sidebar. | `#0747A6` |
     * | `jira.lf.navigation.highlightcolour` | The color of the text and logo of the sidebar. | `#DEEBFF` |
     * | `jira.lf.hero.button.base.bg.colour` | The background color of the hero button. | `#3b7fc4` |
     * | `jira.title` | The text for the application title. The application title can also be set in *General settings*. | `Jira` |
     * | `jira.option.globalsharing` | Whether filters and dashboards can be shared with anyone signed into Jira. | `true` |
     * | `xflow.product.suggestions.enabled` | Whether to expose product suggestions for other Atlassian products within Jira. | `true` |
     *
     *
     * #### Other settings ####
     *
     * | Key | Description | Default value |
     * | -- | -- | -- |
     * | `jira.issuenav.criteria.autoupdate` | Whether instant updates to search criteria is active. | `true` |
     *
     *
     *Note: Be careful when changing [application properties and advanced settings](https://confluence.atlassian.com/x/vYXKM).*
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                           $id          the key of the application property to update
     * @param \JiraSdk\Api\Model\SimpleApplicationPropertyBean $requestBody
     * @param string                                           $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ApplicationProperty|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetApplicationPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\SetApplicationPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetApplicationPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\SetApplicationPropertyNotFoundException
     */
    public function setApplicationProperty(string $id, Model\SimpleApplicationPropertyBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetApplicationProperty($id, $requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ApplicationRole[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllApplicationRolesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllApplicationRolesForbiddenException
     */
    public function getAllApplicationRoles(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllApplicationRoles(), $fetch);
    }

    /**
     * Returns an application role.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $key   The key of the application role. Use the [Get all application roles](#api-rest-api-3-applicationrole-get) operation to get the key for each application role.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ApplicationRole|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetApplicationRoleUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetApplicationRoleForbiddenException
     * @throws \JiraSdk\Api\Exception\GetApplicationRoleNotFoundException
     */
    public function getApplicationRole(string $key, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetApplicationRole($key), $fetch);
    }

    /**
     * Returns the contents of an attachment. A `Range` header can be set to define a range of bytes within the attachment to download. See the [HTTP Range header standard](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Range) for details.
     *
     * To return a thumbnail of the attachment, use [Get attachment thumbnail](#api-rest-api-3-attachment-thumbnail-id-get).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** For the issue containing the attachment:
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $id              the ID of the attachment
     * @param array  $queryParameters {
     *
     *     @var bool $redirect Whether a redirect is provided for the attachment download. Clients that do not automatically follow redirects can set this to `false` to avoid making multiple requests to download the attachment.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAttachmentContentBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAttachmentContentUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAttachmentContentForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAttachmentContentNotFoundException
     * @throws \JiraSdk\Api\Exception\GetAttachmentContentRequestedRangeNotSatisfiableException
     */
    public function getAttachmentContent(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAttachmentContent($id, $queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\AttachmentSettings|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAttachmentMetaUnauthorizedException
     */
    public function getAttachmentMeta(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAttachmentMeta(), $fetch);
    }

    /**
     * Returns the thumbnail of an attachment.
     *
     * To return the attachment contents, use [Get attachment content](#api-rest-api-3-attachment-content-id-get).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** For the issue containing the attachment:
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $id              the ID of the attachment
     * @param array  $queryParameters {
     *
     *     @var bool $redirect Whether a redirect is provided for the attachment download. Clients that do not automatically follow redirects can set this to `false` to avoid making multiple requests to download the attachment.
     *     @var bool $fallbackToDefault whether a default thumbnail is returned when the requested thumbnail is not found
     *     @var int $width the maximum width to scale the thumbnail to
     *     @var int $height The maximum height to scale the thumbnail to.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAttachmentThumbnailBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAttachmentThumbnailUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAttachmentThumbnailForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAttachmentThumbnailNotFoundException
     */
    public function getAttachmentThumbnail(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAttachmentThumbnail($id, $queryParameters), $fetch);
    }

    /**
     * Deletes an attachment from an issue.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** For the project holding the issue containing the attachment:
     *
     *  *Delete own attachments* [project permission](https://confluence.atlassian.com/x/yodKLg) to delete an attachment created by the calling user.
     *  *Delete all attachments* [project permission](https://confluence.atlassian.com/x/yodKLg) to delete an attachment created by any user.
     *
     * @param string $id    the ID of the attachment
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveAttachmentForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveAttachmentNotFoundException
     */
    public function removeAttachment(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveAttachment($id), $fetch);
    }

    /**
     * Returns the metadata for an attachment. Note that the attachment itself is not returned.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $id    the ID of the attachment
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\AttachmentMetadata|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAttachmentUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAttachmentForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAttachmentNotFoundException
     */
    public function getAttachment(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAttachment($id), $fetch);
    }

    /**
     * Returns the metadata for the contents of an attachment, if it is an archive, and metadata for the attachment itself. For example, if the attachment is a ZIP archive, then information about the files in the archive is returned and metadata for the ZIP archive. Currently, only the ZIP archive format is supported.
     *
     * Use this operation to retrieve data that is presented to the user, as this operation returns the metadata for the attachment itself, such as the attachment's ID and name. Otherwise, use [ Get contents metadata for an expanded attachment](#api-rest-api-3-attachment-id-expand-raw-get), which only returns the metadata for the attachment's contents.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** For the issue containing the attachment:
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $id    the ID of the attachment
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\AttachmentArchiveMetadataReadable|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\ExpandAttachmentForHumansUnauthorizedException
     * @throws \JiraSdk\Api\Exception\ExpandAttachmentForHumansForbiddenException
     * @throws \JiraSdk\Api\Exception\ExpandAttachmentForHumansNotFoundException
     * @throws \JiraSdk\Api\Exception\ExpandAttachmentForHumansConflictException
     */
    public function expandAttachmentForHumans(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\ExpandAttachmentForHumans($id), $fetch);
    }

    /**
     * Returns the metadata for the contents of an attachment, if it is an archive. For example, if the attachment is a ZIP archive, then information about the files in the archive is returned. Currently, only the ZIP archive format is supported.
     *
     * Use this operation if you are processing the data without presenting it to the user, as this operation only returns the metadata for the contents of the attachment. Otherwise, to retrieve data to present to the user, use [ Get all metadata for an expanded attachment](#api-rest-api-3-attachment-id-expand-human-get) which also returns the metadata for the attachment itself, such as the attachment's ID and name.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** For the issue containing the attachment:
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $id    the ID of the attachment
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\AttachmentArchiveImpl|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\ExpandAttachmentForMachinesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\ExpandAttachmentForMachinesForbiddenException
     * @throws \JiraSdk\Api\Exception\ExpandAttachmentForMachinesNotFoundException
     * @throws \JiraSdk\Api\Exception\ExpandAttachmentForMachinesConflictException
     */
    public function expandAttachmentForMachines(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\ExpandAttachmentForMachines($id), $fetch);
    }

    /**
     * Returns a list of audit records. The list can be filtered to include items:.
     *
     *  where each item in `filter` has at least one match in any of these fields:
     *
     *  `summary`
     *  `category`
     *  `eventSource`
     *  `objectItem.name` If the object is a user, account ID is available to filter.
     *  `objectItem.parentName`
     *  `objectItem.typeName`
     *  `changedValues.changedFrom`
     *  `changedValues.changedTo`
     *  `remoteAddress`
     *
     * For example, if `filter` contains *man ed*, an audit record containing `summary": "User added to group"` and `"category": "group management"` is returned.
     *  created on or after a date and time.
     *  created or or before a date and time.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $offset the number of records to skip before returning the first result
     *     @var int $limit the maximum number of results to return
     *     @var string $filter the strings to match with audit field content, space separated
     *     @var string $from The date and time on or after which returned audit records must have been created. If `to` is provided `from` must be before `to` or no audit records are returned.
     *     @var string $to The date and time on or before which returned audit results must have been created. If `from` is provided `to` must be after `from` or no audit records are returned.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\AuditRecords|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAuditRecordsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAuditRecordsForbiddenException
     */
    public function getAuditRecords(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAuditRecords($queryParameters), $fetch);
    }

    /**
     * Returns a list of system avatar details by owner type, where the owner types are issue type, project, or user.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param string $type  the avatar type
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\SystemAvatars|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllSystemAvatarsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllSystemAvatarsInternalServerErrorException
     */
    public function getAllSystemAvatars(string $type, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllSystemAvatars($type), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of comments specified by a list of comment IDs.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** Comments are returned where the user:
     *
     *  has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the comment.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param \JiraSdk\Api\Model\IssueCommentListRequestBean $requestBody
     * @param array                                          $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `renderedBody` Returns the comment body rendered in HTML.
     *  `properties` Returns the comment's properties.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanComment|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetCommentsByIdsBadRequestException
     */
    public function getCommentsByIds(Model\IssueCommentListRequestBean $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetCommentsByIds($requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns the keys of all the properties of a comment.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param string $commentId the ID of the comment
     * @param string $fetch     Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetCommentPropertyKeysBadRequestException
     * @throws \JiraSdk\Api\Exception\GetCommentPropertyKeysUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetCommentPropertyKeysForbiddenException
     * @throws \JiraSdk\Api\Exception\GetCommentPropertyKeysNotFoundException
     */
    public function getCommentPropertyKeys(string $commentId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetCommentPropertyKeys($commentId), $fetch);
    }

    /**
     * Deletes a comment property.
     *
     **[Permissions](#permissions) required:** either of:
     *
     *  *Edit All Comments* [project permission](https://confluence.atlassian.com/x/yodKLg) to delete a property from any comment.
     *  *Edit Own Comments* [project permission](https://confluence.atlassian.com/x/yodKLg) to delete a property from a comment created by the user.
     *
     * Also, when the visibility of a comment is restricted to a role or group the user must be a member of that role or group.
     *
     * @param string $commentId   the ID of the comment
     * @param string $propertyKey the key of the property
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteCommentPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteCommentPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteCommentPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteCommentPropertyNotFoundException
     */
    public function deleteCommentProperty(string $commentId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteCommentProperty($commentId, $propertyKey), $fetch);
    }

    /**
     * Returns the value of a comment property.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param string $commentId   the ID of the comment
     * @param string $propertyKey the key of the property
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\EntityProperty|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetCommentPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\GetCommentPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetCommentPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\GetCommentPropertyNotFoundException
     */
    public function getCommentProperty(string $commentId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetCommentProperty($commentId, $propertyKey), $fetch);
    }

    /**
     * Creates or updates the value of a property for a comment. Use this resource to store custom data against a comment.
     *
     * The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
     *
     **[Permissions](#permissions) required:** either of:
     *
     *  *Edit All Comments* [project permission](https://confluence.atlassian.com/x/yodKLg) to create or update the value of a property on any comment.
     *  *Edit Own Comments* [project permission](https://confluence.atlassian.com/x/yodKLg) to create or update the value of a property on a comment created by the user.
     *
     * Also, when the visibility of a comment is restricted to a role or group the user must be a member of that role or group.
     *
     * @param string $commentId   the ID of the comment
     * @param string $propertyKey The key of the property. The maximum length is 255 characters.
     * @param mixed  $requestBody
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetCommentPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\SetCommentPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetCommentPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\SetCommentPropertyNotFoundException
     */
    public function setCommentProperty(string $commentId, string $propertyKey, $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetCommentProperty($commentId, $propertyKey, $requestBody), $fetch);
    }

    /**
     * Creates a component. Use components to provide containers for issues within a project.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project in which the component is created or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\ProjectComponent $requestBody
     * @param string                              $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectComponent|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateComponentBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateComponentUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateComponentForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateComponentNotFoundException
     */
    public function createComponent(Model\ProjectComponent $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateComponent($requestBody), $fetch);
    }

    /**
     * Deletes a component.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the component or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id              the ID of the component
     * @param array  $queryParameters {
     *
     *     @var string $moveIssuesTo The ID of the component to replace the deleted component. If this value is null no replacement is made.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteComponentUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteComponentForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteComponentNotFoundException
     */
    public function deleteComponent(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteComponent($id, $queryParameters), $fetch);
    }

    /**
     * Returns a component.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for project containing the component.
     *
     * @param string $id    the ID of the component
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectComponent|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetComponentUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetComponentNotFoundException
     */
    public function getComponent(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetComponent($id), $fetch);
    }

    /**
     * Updates a component. Any fields included in the request are overwritten. If `leadAccountId` is an empty string ("") the component lead is removed.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the component or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                              $id          the ID of the component
     * @param \JiraSdk\Api\Model\ProjectComponent $requestBody
     * @param string                              $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectComponent|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateComponentBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateComponentUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateComponentForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateComponentNotFoundException
     */
    public function updateComponent(string $id, Model\ProjectComponent $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateComponent($id, $requestBody), $fetch);
    }

    /**
     * Returns the counts of issues assigned to the component.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param string $id    the ID of the component
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ComponentIssuesCount|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetComponentRelatedIssuesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetComponentRelatedIssuesNotFoundException
     */
    public function getComponentRelatedIssues(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetComponentRelatedIssues($id), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Configuration|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetConfigurationUnauthorizedException
     */
    public function getConfiguration(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetConfiguration(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\TimeTrackingProvider|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetSelectedTimeTrackingImplementationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetSelectedTimeTrackingImplementationForbiddenException
     */
    public function getSelectedTimeTrackingImplementation(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetSelectedTimeTrackingImplementation(), $fetch);
    }

    /**
     * Selects a time tracking provider.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\TimeTrackingProvider $requestBody
     * @param string                                  $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SelectTimeTrackingImplementationBadRequestException
     * @throws \JiraSdk\Api\Exception\SelectTimeTrackingImplementationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SelectTimeTrackingImplementationForbiddenException
     */
    public function selectTimeTrackingImplementation(Model\TimeTrackingProvider $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SelectTimeTrackingImplementation($requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\TimeTrackingProvider[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAvailableTimeTrackingImplementationsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAvailableTimeTrackingImplementationsForbiddenException
     */
    public function getAvailableTimeTrackingImplementations(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAvailableTimeTrackingImplementations(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\TimeTrackingConfiguration|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetSharedTimeTrackingConfigurationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetSharedTimeTrackingConfigurationForbiddenException
     */
    public function getSharedTimeTrackingConfiguration(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetSharedTimeTrackingConfiguration(), $fetch);
    }

    /**
     * Sets the time tracking settings.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\TimeTrackingConfiguration $requestBody
     * @param string                                       $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\TimeTrackingConfiguration|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetSharedTimeTrackingConfigurationBadRequestException
     * @throws \JiraSdk\Api\Exception\SetSharedTimeTrackingConfigurationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetSharedTimeTrackingConfigurationForbiddenException
     */
    public function setSharedTimeTrackingConfiguration(Model\TimeTrackingConfiguration $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetSharedTimeTrackingConfiguration($requestBody), $fetch);
    }

    /**
     * Returns a custom field option. For example, an option in a select list.
     *
     * Note that this operation **only works for issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource**, it cannot be used with issue field select list options created by Connect apps.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** The custom field option is returned as follows:
     *
     *  if the user has the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  if the user has the *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one project the custom field is used in, and the field is visible in at least one layout the user has permission to view.
     *
     * @param string $id    the ID of the custom field option
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\CustomFieldOption|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetCustomFieldOptionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetCustomFieldOptionNotFoundException
     */
    public function getCustomFieldOption(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetCustomFieldOption($id), $fetch);
    }

    /**
     * Returns a list of dashboards owned by or shared with the user. The list may be filtered to include only favorite or owned dashboards.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *
     *     @var string $filter The filter applied to the list of dashboards. Valid values are:
     *
     *  `favourite` Returns dashboards the user has marked as favorite.
     *  `my` Returns dashboards owned by the user.
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageOfDashboards|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllDashboardsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAllDashboardsUnauthorizedException
     */
    public function getAllDashboards(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllDashboards($queryParameters), $fetch);
    }

    /**
     * Creates a dashboard.
     **[Permissions](#permissions) required:** None.
     *
     * @param \JiraSdk\Api\Model\DashboardDetails $requestBody
     * @param string                              $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Dashboard|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateDashboardBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateDashboardUnauthorizedException
     */
    public function createDashboard(Model\DashboardDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateDashboard($requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\AvailableDashboardGadgetsResponse|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllAvailableDashboardGadgetsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAllAvailableDashboardGadgetsUnauthorizedException
     */
    public function getAllAvailableDashboardGadgets(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllAvailableDashboardGadgets(), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of dashboards. This operation is similar to [Get dashboards](#api-rest-api-3-dashboard-get) except that the results can be refined to include dashboards that have specific attributes. For example, dashboards with a particular name. When multiple attributes are specified only filters matching all attributes are returned.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** The following dashboards that match the query parameters are returned:
     *
     *  Dashboards owned by the user. Not returned for anonymous users.
     *  Dashboards shared with a group that the user is a member of. Not returned for anonymous users.
     *  Dashboards shared with a private project that the user can browse. Not returned for anonymous users.
     *  Dashboards shared with a public project.
     *  Dashboards shared with the public.
     *
     * @param array $queryParameters {
     *
     *     @var string $dashboardName string used to perform a case-insensitive partial match with `name`
     *     @var string $accountId User account ID used to return dashboards with the matching `owner.accountId`. This parameter cannot be used with the `owner` parameter.
     *     @var string $owner This parameter is deprecated because of privacy changes. Use `accountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. User name used to return dashboards with the matching `owner.name`. This parameter cannot be used with the `accountId` parameter.
     *     @var string $groupname As a group's name can change, use of `groupId` is recommended. Group name used to return dashboards that are shared with a group that matches `sharePermissions.group.name`. This parameter cannot be used with the `groupId` parameter.
     *     @var string $groupId Group ID used to return dashboards that are shared with a group that matches `sharePermissions.group.groupId`. This parameter cannot be used with the `groupname` parameter.
     *     @var int $projectId Project ID used to returns dashboards that are shared with a project that matches `sharePermissions.project.id`.
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *
     *  `description` Sorts by dashboard description. Note that this sort works independently of whether the expand to display the description field is in use.
     *  `favourite_count` Sorts by dashboard popularity.
     *  `id` Sorts by dashboard ID.
     *  `is_favourite` Sorts by whether the dashboard is marked as a favorite.
     *  `name` Sorts by dashboard name.
     *  `owner` Sorts by dashboard owner name.
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var string $status The status to filter by. It may be active, archived or deleted.
     *     @var string $expand Use [expand](#expansion) to include additional information about dashboard in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `description` Returns the description of the dashboard.
     *  `owner` Returns the owner of the dashboard.
     *  `viewUrl` Returns the URL that is used to view the dashboard.
     *  `favourite` Returns `isFavourite`, an indicator of whether the user has set the dashboard as a favorite.
     *  `favouritedCount` Returns `popularity`, a count of how many users have set this dashboard as a favorite.
     *  `sharePermissions` Returns details of the share permissions defined for the dashboard.
     *  `editPermissions` Returns details of the edit permissions defined for the dashboard.
     *  `isWritable` Returns whether the current user has permission to edit the dashboard.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanDashboard|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetDashboardsPaginatedBadRequestException
     * @throws \JiraSdk\Api\Exception\GetDashboardsPaginatedUnauthorizedException
     */
    public function getDashboardsPaginated(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetDashboardsPaginated($queryParameters), $fetch);
    }

    /**
     * Returns a list of dashboard gadgets on a dashboard.
     *
     * This operation returns:
     *
     *  Gadgets from a list of IDs, when `id` is set.
     *  Gadgets with a module key, when `moduleKey` is set.
     *  Gadgets from a list of URIs, when `uri` is set.
     *  All gadgets, when no other parameters are set.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param int   $dashboardId     the ID of the dashboard
     * @param array $queryParameters {
     *
     *     @var array $moduleKey The list of gadgets module keys. To include multiple module keys, separate module keys with ampersand: `moduleKey=key:one&moduleKey=key:two`.
     *     @var array $uri The list of gadgets URIs. To include multiple URIs, separate URIs with ampersand: `uri=/rest/example/uri/1&uri=/rest/example/uri/2`.
     *     @var array $gadgetId The list of gadgets IDs. To include multiple IDs, separate IDs with ampersand: `gadgetId=10000&gadgetId=10001`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\DashboardGadgetResponse|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllGadgetsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllGadgetsNotFoundException
     */
    public function getAllGadgets(int $dashboardId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllGadgets($dashboardId, $queryParameters), $fetch);
    }

    /**
     * Adds a gadget to a dashboard.
     **[Permissions](#permissions) required:** None.
     *
     * @param int                                        $dashboardId the ID of the dashboard
     * @param \JiraSdk\Api\Model\DashboardGadgetSettings $requestBody
     * @param string                                     $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\DashboardGadget|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddGadgetBadRequestException
     * @throws \JiraSdk\Api\Exception\AddGadgetUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddGadgetNotFoundException
     */
    public function addGadget(int $dashboardId, Model\DashboardGadgetSettings $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddGadget($dashboardId, $requestBody), $fetch);
    }

    /**
     * Removes a dashboard gadget from a dashboard.
     *
     * When a gadget is removed from a dashboard, other gadgets in the same column are moved up to fill the emptied position.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param int    $dashboardId the ID of the dashboard
     * @param int    $gadgetId    the ID of the gadget
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveGadgetUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveGadgetNotFoundException
     */
    public function removeGadget(int $dashboardId, int $gadgetId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveGadget($dashboardId, $gadgetId), $fetch);
    }

    /**
     * Changes the title, position, and color of the gadget on a dashboard.
     **[Permissions](#permissions) required:** None.
     *
     * @param int                                             $dashboardId the ID of the dashboard
     * @param int                                             $gadgetId    the ID of the gadget
     * @param \JiraSdk\Api\Model\DashboardGadgetUpdateRequest $requestBody
     * @param string                                          $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateGadgetBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateGadgetUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateGadgetNotFoundException
     */
    public function updateGadget(int $dashboardId, int $gadgetId, Model\DashboardGadgetUpdateRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateGadget($dashboardId, $gadgetId, $requestBody), $fetch);
    }

    /**
     * Returns the keys of all properties for a dashboard item.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** The user must be the owner of the dashboard or have the dashboard shared with them. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard. The System dashboard is considered to be shared with all other users, and is accessible to anonymous users when Jira’s anonymous access is permitted.
     *
     * @param string $dashboardId the ID of the dashboard
     * @param string $itemId      the ID of the dashboard item
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetDashboardItemPropertyKeysUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetDashboardItemPropertyKeysNotFoundException
     */
    public function getDashboardItemPropertyKeys(string $dashboardId, string $itemId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetDashboardItemPropertyKeys($dashboardId, $itemId), $fetch);
    }

    /**
     * Deletes a dashboard item property.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** The user must be the owner of the dashboard. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard.
     *
     * @param string $dashboardId the ID of the dashboard
     * @param string $itemId      the ID of the dashboard item
     * @param string $propertyKey the key of the dashboard item property
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteDashboardItemPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteDashboardItemPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteDashboardItemPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteDashboardItemPropertyNotFoundException
     */
    public function deleteDashboardItemProperty(string $dashboardId, string $itemId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteDashboardItemProperty($dashboardId, $itemId, $propertyKey), $fetch);
    }

    /**
     * Returns the key and value of a dashboard item property.
     *
     * A dashboard item enables an app to add user-specific information to a user dashboard. Dashboard items are exposed to users as gadgets that users can add to their dashboards. For more information on how users do this, see [Adding and customizing gadgets](https://confluence.atlassian.com/x/7AeiLQ).
     *
     * When an app creates a dashboard item it registers a callback to receive the dashboard item ID. The callback fires whenever the item is rendered or, where the item is configurable, the user edits the item. The app then uses this resource to store the item's content or configuration details. For more information on working with dashboard items, see [ Building a dashboard item for a JIRA Connect add-on](https://developer.atlassian.com/server/jira/platform/guide-building-a-dashboard-item-for-a-jira-connect-add-on-33746254/) and the [Dashboard Item](https://developer.atlassian.com/cloud/jira/platform/modules/dashboard-item/) documentation.
     *
     * There is no resource to set or get dashboard items.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** The user must be the owner of the dashboard or have the dashboard shared with them. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard. The System dashboard is considered to be shared with all other users, and is accessible to anonymous users when Jira’s anonymous access is permitted.
     *
     * @param string $dashboardId the ID of the dashboard
     * @param string $itemId      the ID of the dashboard item
     * @param string $propertyKey the key of the dashboard item property
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\EntityProperty|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetDashboardItemPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetDashboardItemPropertyNotFoundException
     */
    public function getDashboardItemProperty(string $dashboardId, string $itemId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetDashboardItemProperty($dashboardId, $itemId, $propertyKey), $fetch);
    }

    /**
     * Sets the value of a dashboard item property. Use this resource in apps to store custom data against a dashboard item.
     *
     * A dashboard item enables an app to add user-specific information to a user dashboard. Dashboard items are exposed to users as gadgets that users can add to their dashboards. For more information on how users do this, see [Adding and customizing gadgets](https://confluence.atlassian.com/x/7AeiLQ).
     *
     * When an app creates a dashboard item it registers a callback to receive the dashboard item ID. The callback fires whenever the item is rendered or, where the item is configurable, the user edits the item. The app then uses this resource to store the item's content or configuration details. For more information on working with dashboard items, see [ Building a dashboard item for a JIRA Connect add-on](https://developer.atlassian.com/server/jira/platform/guide-building-a-dashboard-item-for-a-jira-connect-add-on-33746254/) and the [Dashboard Item](https://developer.atlassian.com/cloud/jira/platform/modules/dashboard-item/) documentation.
     *
     * There is no resource to set or get dashboard items.
     *
     * The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** The user must be the owner of the dashboard. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard.
     *
     * @param string $dashboardId the ID of the dashboard
     * @param string $itemId      the ID of the dashboard item
     * @param string $propertyKey The key of the dashboard item property. The maximum length is 255 characters. For dashboard items with a spec URI and no complete module key, if the provided propertyKey is equal to "config", the request body's JSON must be an object with all keys and values as strings.
     * @param mixed  $requestBody
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetDashboardItemPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\SetDashboardItemPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetDashboardItemPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\SetDashboardItemPropertyNotFoundException
     */
    public function setDashboardItemProperty(string $dashboardId, string $itemId, string $propertyKey, $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetDashboardItemProperty($dashboardId, $itemId, $propertyKey, $requestBody), $fetch);
    }

    /**
     * Deletes a dashboard.
     *
     **[Permissions](#permissions) required:** None
     *
     * The dashboard to be deleted must be owned by the user.
     *
     * @param string $id    the ID of the dashboard
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteDashboardBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteDashboardUnauthorizedException
     */
    public function deleteDashboard(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteDashboard($id), $fetch);
    }

    /**
     * Returns a dashboard.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * However, to get a dashboard, the dashboard must be shared with the user or the user must own it. Note, users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) are considered owners of the System dashboard. The System dashboard is considered to be shared with all other users.
     *
     * @param string $id    the ID of the dashboard
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Dashboard|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetDashboardBadRequestException
     * @throws \JiraSdk\Api\Exception\GetDashboardUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetDashboardNotFoundException
     */
    public function getDashboard(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetDashboard($id), $fetch);
    }

    /**
     * Updates a dashboard, replacing all the dashboard details with those provided.
     *
     **[Permissions](#permissions) required:** None
     *
     * The dashboard to be updated must be owned by the user.
     *
     * @param string                              $id          the ID of the dashboard to update
     * @param \JiraSdk\Api\Model\DashboardDetails $requestBody
     * @param string                              $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Dashboard|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateDashboardBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateDashboardUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateDashboardNotFoundException
     */
    public function updateDashboard(string $id, Model\DashboardDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateDashboard($id, $requestBody), $fetch);
    }

    /**
     * Copies a dashboard. Any values provided in the `dashboard` parameter replace those in the copied dashboard.
     *
     **[Permissions](#permissions) required:** None
     *
     * The dashboard to be copied must be owned by or shared with the user.
     *
     * @param \JiraSdk\Api\Model\DashboardDetails $requestBody
     * @param string                              $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Dashboard|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CopyDashboardBadRequestException
     * @throws \JiraSdk\Api\Exception\CopyDashboardUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CopyDashboardNotFoundException
     */
    public function copyDashboard(string $id, Model\DashboardDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CopyDashboard($id, $requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueEvent[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetEventsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetEventsForbiddenException
     */
    public function getEvents(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetEvents(), $fetch);
    }

    /**
     * Analyses and validates Jira expressions.
     *
     * As an experimental feature, this operation can also attempt to type-check the expressions.
     *
     * Learn more about Jira expressions in the [documentation](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/).
     *
     **[Permissions](#permissions) required**: None.
     *
     * @param \JiraSdk\Api\Model\JiraExpressionForAnalysis $requestBody
     * @param array                                        $queryParameters {
     *
     *     @var string $check The check to perform:
     *
     *  `syntax` Each expression's syntax is checked to ensure the expression can be parsed. Also, syntactic limits are validated. For example, the expression's length.
     *  `type` EXPERIMENTAL. Each expression is type checked and the final type of the expression inferred. Any type errors that would result in the expression failure at runtime are reported. For example, accessing properties that don't exist or passing the wrong number of arguments to functions. Also performs the syntax check.
     *  `complexity` EXPERIMENTAL. Determines the formulae for how many [expensive operations](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#expensive-operations) each expression may execute.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\JiraExpressionsAnalysis|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AnalyseExpressionBadRequestException
     * @throws \JiraSdk\Api\Exception\AnalyseExpressionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AnalyseExpressionNotFoundException
     */
    public function analyseExpression(Model\JiraExpressionForAnalysis $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AnalyseExpression($requestBody, $queryParameters), $fetch);
    }

    /**
     * Evaluates a Jira expression and returns its value.
     *
     * This resource can be used to test Jira expressions that you plan to use elsewhere, or to fetch data in a flexible way. Consult the [Jira expressions documentation](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/) for more details.
     *
     * #### Context variables ####
     *
     * The following context variables are available to Jira expressions evaluated by this resource. Their presence depends on various factors; usually you need to manually request them in the context object sent in the payload, but some of them are added automatically under certain conditions.
     *
     *  `user` ([User](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user)): The current user. Always available and equal to `null` if the request is anonymous.
     *  `app` ([App](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#app)): The [Connect app](https://developer.atlassian.com/cloud/jira/platform/index/#connect-apps) that made the request. Available only for authenticated requests made by Connect Apps (read more here: [Authentication for Connect apps](https://developer.atlassian.com/cloud/jira/platform/security-for-connect-apps/)).
     *  `issue` ([Issue](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue)): The current issue. Available only when the issue is provided in the request context object.
     *  `issues` ([List](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#list) of [Issues](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue)): A collection of issues matching a JQL query. Available only when JQL is provided in the request context object.
     *  `project` ([Project](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#project)): The current project. Available only when the project is provided in the request context object.
     *  `sprint` ([Sprint](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#sprint)): The current sprint. Available only when the sprint is provided in the request context object.
     *  `board` ([Board](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#board)): The current board. Available only when the board is provided in the request context object.
     *  `serviceDesk` ([ServiceDesk](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#servicedesk)): The current service desk. Available only when the service desk is provided in the request context object.
     *  `customerRequest` ([CustomerRequest](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#customerrequest)): The current customer request. Available only when the customer request is provided in the request context object.
     *
     * Also, custom context variables can be passed in the request with their types. Those variables can be accessed by key in the Jira expression. These variable types are available for use in a custom context:
     *
     *  `user`: A [user](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#user) specified as an Atlassian account ID.
     *  `issue`: An [issue](https://developer.atlassian.com/cloud/jira/platform/jira-expressions-type-reference#issue) specified by ID or key. All the fields of the issue object are available in the Jira expression.
     *  `json`: A JSON object containing custom content.
     *  `list`: A JSON list of `user`, `issue`, or `json` variable types.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required**: None. However, an expression may return different results for different users depending on their permissions. For example, different users may see different comments on the same issue.
     * Permission to access Jira Software is required to access Jira Software context variables (`board` and `sprint`) or fields (for example, `issue.sprint`).
     *
     * @param \JiraSdk\Api\Model\JiraExpressionEvalRequestBean $requestBody
     * @param array                                            $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts `meta.complexity` that returns information about the expression complexity. For example, the number of expensive operations used by the expression and how close the expression is to reaching the [complexity limit](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#restrictions). Useful when designing and debugging your expressions.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\JiraExpressionResult|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\EvaluateJiraExpressionBadRequestException
     * @throws \JiraSdk\Api\Exception\EvaluateJiraExpressionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\EvaluateJiraExpressionNotFoundException
     */
    public function evaluateJiraExpression(Model\JiraExpressionEvalRequestBean $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\EvaluateJiraExpression($requestBody, $queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\FieldDetails[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetFieldsUnauthorizedException
     */
    public function getFields(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetFields(), $fetch);
    }

    /**
     * Creates a custom field.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\CustomFieldDefinitionJsonBean $requestBody
     * @param string                                           $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\FieldDetails|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateCustomFieldBadRequestException
     */
    public function createCustomField(Model\CustomFieldDefinitionJsonBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateCustomField($requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of fields for Classic Jira projects. The list can include:.
     *
     *  all fields
     *  specific fields, by defining `id`
     *  fields that contain a string in the field name or description, by defining `query`
     *  specific fields that contain a string in the field name or description, by defining `id` and `query`
     *
     * Only custom fields can be queried, `type` must be set to `custom`.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $type the type of fields to search
     *     @var array $id the IDs of the custom fields to return or, where `query` is specified, filter
     *     @var string $query string used to perform a case-insensitive partial match with field names or descriptions
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *
     *  `contextsCount` sorts by the number of contexts related to a field
     *  `lastUsed` sorts by the date when the value of the field last changed
     *  `name` sorts by the field name
     *  `screensCount` sorts by the number of screens related to a field
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `key` returns the key for each field
     *  `lastUsed` returns the date when the value of the field last changed
     *  `screensCount` returns the number of screens related to a field
     *  `contextsCount` returns the number of contexts related to a field
     *  `isLocked` returns information about whether the field is [locked](https://confluence.atlassian.com/x/ZSN7Og)
     *  `searcherKey` returns the searcher key for each custom field
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanField|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetFieldsPaginatedBadRequestException
     * @throws \JiraSdk\Api\Exception\GetFieldsPaginatedUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetFieldsPaginatedForbiddenException
     */
    public function getFieldsPaginated(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetFieldsPaginated($queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of fields in the trash. The list may be restricted to fields whose field name or description partially match a string.
     *
     * Only custom fields can be queried, `type` must be set to `custom`.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $id
     *     @var string $query string used to perform a case-insensitive partial match with field names or descriptions
     *     @var string $expand
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *
     *  `name` sorts by the field name
     *  `trashDate` sorts by the date the field was moved to the trash
     *  `plannedDeletionDate` sorts by the planned deletion date
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanField|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetTrashedFieldsPaginatedBadRequestException
     * @throws \JiraSdk\Api\Exception\GetTrashedFieldsPaginatedUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetTrashedFieldsPaginatedForbiddenException
     */
    public function getTrashedFieldsPaginated(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetTrashedFieldsPaginated($queryParameters), $fetch);
    }

    /**
     * Updates a custom field.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                      $fieldId     the ID of the custom field
     * @param \JiraSdk\Api\Model\UpdateCustomFieldDetails $requestBody
     * @param string                                      $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldNotFoundException
     */
    public function updateCustomField(string $fieldId, Model\UpdateCustomFieldDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateCustomField($fieldId, $requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of [ contexts](https://confluence.atlassian.com/adminjiracloud/what-are-custom-field-contexts-991923859.html) for a custom field. Contexts can be returned as follows:
     *  With no other parameters set, all contexts.
     *  By defining `id` only, all contexts from the list of IDs.
     *  By defining `isAnyIssueType`, limit the list of contexts returned to either those that apply to all issue types (true) or those that apply to only a subset of issue types (false)
     *  By defining `isGlobalContext`, limit the list of contexts return to either those that apply to all projects (global contexts) (true) or those that apply to only a subset of projects (false).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId         the ID of the custom field
     * @param array  $queryParameters {
     *
     *     @var bool $isAnyIssueType whether to return contexts that apply to all issue types
     *     @var bool $isGlobalContext whether to return contexts that apply to all projects
     *     @var array $contextId The list of context IDs. To include multiple contexts, separate IDs with ampersand: `contextId=10000&contextId=10001`.
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanCustomFieldContext|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetContextsForFieldUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetContextsForFieldForbiddenException
     * @throws \JiraSdk\Api\Exception\GetContextsForFieldNotFoundException
     */
    public function getContextsForField(string $fieldId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetContextsForField($fieldId, $queryParameters), $fetch);
    }

    /**
     * Creates a custom field context.
     *
     * If `projectIds` is empty, a global context is created. A global context is one that applies to all project. If `issueTypeIds` is empty, the context applies to all issue types.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                      $fieldId     the ID of the custom field
     * @param \JiraSdk\Api\Model\CreateCustomFieldContext $requestBody
     * @param string                                      $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\CreateCustomFieldContext|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateCustomFieldContextBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateCustomFieldContextUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateCustomFieldContextNotFoundException
     * @throws \JiraSdk\Api\Exception\CreateCustomFieldContextConflictException
     */
    public function createCustomFieldContext(string $fieldId, Model\CreateCustomFieldContext $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateCustomFieldContext($fieldId, $requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of defaults for a custom field. The results can be filtered by `contextId`, otherwise all values are returned. If no defaults are set for a context, nothing is returned.
     * The returned object depends on type of the custom field:.
     *
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
     *
     * Forge custom fields [types](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/#data-types) are also supported, returning:
     *
     *  `CustomFieldContextDefaultValueForgeStringFieldBean` (type `forge.string`) for Forge string fields.
     *  `CustomFieldContextDefaultValueForgeMultiStringFieldBean` (type `forge.string.list`) for Forge string collection fields.
     *  `CustomFieldContextDefaultValueForgeObjectFieldBean` (type `forge.object`) for Forge object fields.
     *  `CustomFieldContextDefaultValueForgeDateTimeFieldBean` (type `forge.datetime`) for Forge date-time fields.
     *  `CustomFieldContextDefaultValueForgeGroupFieldBean` (type `forge.group`) for Forge group fields.
     *  `CustomFieldContextDefaultValueForgeMultiGroupFieldBean` (type `forge.group.list`) for Forge group collection fields.
     *  `CustomFieldContextDefaultValueForgeNumberFieldBean` (type `forge.number`) for Forge number fields.
     *  `CustomFieldContextDefaultValueForgeUserFieldBean` (type `forge.user`) for Forge user fields.
     *  `CustomFieldContextDefaultValueForgeMultiUserFieldBean` (type `forge.user.list`) for Forge user collection fields.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId         the ID of the custom field, for example `customfield\_10000`
     * @param array  $queryParameters {
     *
     *     @var array $contextId the IDs of the contexts
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanCustomFieldContextDefaultValue|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetDefaultValuesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetDefaultValuesForbiddenException
     * @throws \JiraSdk\Api\Exception\GetDefaultValuesNotFoundException
     */
    public function getDefaultValues(string $fieldId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetDefaultValues($fieldId, $queryParameters), $fetch);
    }

    /**
     * Sets default for contexts of a custom field. Default are defined using these objects:.
     *
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
     *
     * Forge custom fields [types](https://developer.atlassian.com/platform/forge/manifest-reference/modules/jira-custom-field-type/#data-types) are also supported, returning:
     *
     *  `CustomFieldContextDefaultValueForgeStringFieldBean` (type `forge.string`) for Forge string fields.
     *  `CustomFieldContextDefaultValueForgeMultiStringFieldBean` (type `forge.string.list`) for Forge string collection fields.
     *  `CustomFieldContextDefaultValueForgeObjectFieldBean` (type `forge.object`) for Forge object fields.
     *  `CustomFieldContextDefaultValueForgeDateTimeFieldBean` (type `forge.datetime`) for Forge date-time fields.
     *  `CustomFieldContextDefaultValueForgeGroupFieldBean` (type `forge.group`) for Forge group fields.
     *  `CustomFieldContextDefaultValueForgeMultiGroupFieldBean` (type `forge.group.list`) for Forge group collection fields.
     *  `CustomFieldContextDefaultValueForgeNumberFieldBean` (type `forge.number`) for Forge number fields.
     *  `CustomFieldContextDefaultValueForgeUserFieldBean` (type `forge.user`) for Forge user fields.
     *  `CustomFieldContextDefaultValueForgeMultiUserFieldBean` (type `forge.user.list`) for Forge user collection fields.
     *
     * Only one type of default object can be included in a request. To remove a default for a context, set the default parameter to `null`.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                                  $fieldId     the ID of the custom field
     * @param \JiraSdk\Api\Model\CustomFieldContextDefaultValueUpdate $requestBody
     * @param string                                                  $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetDefaultValuesBadRequestException
     * @throws \JiraSdk\Api\Exception\SetDefaultValuesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetDefaultValuesForbiddenException
     * @throws \JiraSdk\Api\Exception\SetDefaultValuesNotFoundException
     */
    public function setDefaultValues(string $fieldId, Model\CustomFieldContextDefaultValueUpdate $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetDefaultValues($fieldId, $requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of context to issue type mappings for a custom field. Mappings are returned for all contexts or a list of contexts. Mappings are ordered first by context ID and then by issue type ID.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId         the ID of the custom field
     * @param array  $queryParameters {
     *
     *     @var array $contextId The ID of the context. To include multiple contexts, provide an ampersand-separated list. For example, `contextId=10001&contextId=10002`.
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanIssueTypeToContextMapping|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueTypeMappingsForContextsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeMappingsForContextsForbiddenException
     */
    public function getIssueTypeMappingsForContexts(string $fieldId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueTypeMappingsForContexts($fieldId, $queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of project and issue type mappings and, for each mapping, the ID of a [custom field context](https://confluence.atlassian.com/x/k44fOw) that applies to the project and issue type.
     *
     * If there is no custom field context assigned to the project then, if present, the custom field context that applies to all projects is returned if it also applies to the issue type or all issue types. If a custom field context is not found, the returned custom field context ID is `null`.
     *
     * Duplicate project and issue type mappings cannot be provided in the request.
     *
     * The order of the returned values is the same as provided in the request.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                      $fieldId         the ID of the custom field
     * @param \JiraSdk\Api\Model\ProjectIssueTypeMappings $requestBody
     * @param array                                       $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanContextForProjectAndIssueType|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetCustomFieldContextsForProjectsAndIssueTypesBadRequestException
     * @throws \JiraSdk\Api\Exception\GetCustomFieldContextsForProjectsAndIssueTypesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetCustomFieldContextsForProjectsAndIssueTypesForbiddenException
     * @throws \JiraSdk\Api\Exception\GetCustomFieldContextsForProjectsAndIssueTypesNotFoundException
     */
    public function getCustomFieldContextsForProjectsAndIssueTypes(string $fieldId, Model\ProjectIssueTypeMappings $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetCustomFieldContextsForProjectsAndIssueTypes($fieldId, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of context to project mappings for a custom field. The result can be filtered by `contextId`. Otherwise, all mappings are returned. Invalid IDs are ignored.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId         the ID of the custom field, for example `customfield\_10000`
     * @param array  $queryParameters {
     *
     *     @var array $contextId The list of context IDs. To include multiple context, separate IDs with ampersand: `contextId=10000&contextId=10001`.
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanCustomFieldContextProjectMapping|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectContextMappingUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectContextMappingForbiddenException
     * @throws \JiraSdk\Api\Exception\GetProjectContextMappingNotFoundException
     */
    public function getProjectContextMapping(string $fieldId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectContextMapping($fieldId, $queryParameters), $fetch);
    }

    /**
     * Deletes a [ custom field context](https://confluence.atlassian.com/adminjiracloud/what-are-custom-field-contexts-991923859.html).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId   the ID of the custom field
     * @param int    $contextId the ID of the context
     * @param string $fetch     Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldContextBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldContextUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldContextForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldContextNotFoundException
     */
    public function deleteCustomFieldContext(string $fieldId, int $contextId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteCustomFieldContext($fieldId, $contextId), $fetch);
    }

    /**
     * Updates a [ custom field context](https://confluence.atlassian.com/adminjiracloud/what-are-custom-field-contexts-991923859.html).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                             $fieldId     the ID of the custom field
     * @param int                                                $contextId   the ID of the context
     * @param \JiraSdk\Api\Model\CustomFieldContextUpdateDetails $requestBody
     * @param string                                             $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldContextBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldContextUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldContextForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldContextNotFoundException
     */
    public function updateCustomFieldContext(string $fieldId, int $contextId, Model\CustomFieldContextUpdateDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateCustomFieldContext($fieldId, $contextId, $requestBody), $fetch);
    }

    /**
     * Adds issue types to a custom field context, appending the issue types to the issue types list.
     *
     * A custom field context without any issue types applies to all issue types. Adding issue types to such a custom field context would result in it applying to only the listed issue types.
     *
     * If any of the issue types exists in the custom field context, the operation fails and no issue types are added.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                          $fieldId     the ID of the custom field
     * @param int                             $contextId   the ID of the context
     * @param \JiraSdk\Api\Model\IssueTypeIds $requestBody
     * @param string                          $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddIssueTypesToContextBadRequestException
     * @throws \JiraSdk\Api\Exception\AddIssueTypesToContextUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddIssueTypesToContextForbiddenException
     * @throws \JiraSdk\Api\Exception\AddIssueTypesToContextNotFoundException
     * @throws \JiraSdk\Api\Exception\AddIssueTypesToContextConflictException
     */
    public function addIssueTypesToContext(string $fieldId, int $contextId, Model\IssueTypeIds $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddIssueTypesToContext($fieldId, $contextId, $requestBody), $fetch);
    }

    /**
     * Removes issue types from a custom field context.
     *
     * A custom field context without any issue types applies to all issue types.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                          $fieldId     the ID of the custom field
     * @param int                             $contextId   the ID of the context
     * @param \JiraSdk\Api\Model\IssueTypeIds $requestBody
     * @param string                          $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypesFromContextBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypesFromContextUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypesFromContextForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypesFromContextNotFoundException
     */
    public function removeIssueTypesFromContext(string $fieldId, int $contextId, Model\IssueTypeIds $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveIssueTypesFromContext($fieldId, $contextId, $requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of all custom field option for a context. Options are returned first then cascading options, in the order they display in Jira.
     *
     * This operation works for custom field options created in Jira or the operations from this resource. **To work with issue field select list options created for Connect apps use the [Issue custom field options (apps)](#api-group-issue-custom-field-options--apps-) operations.**
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId         the ID of the custom field
     * @param int    $contextId       the ID of the context
     * @param array  $queryParameters {
     *
     *     @var int $optionId the ID of the option
     *     @var bool $onlyOptions whether only options are returned
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanCustomFieldContextOption|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetOptionsForContextBadRequestException
     * @throws \JiraSdk\Api\Exception\GetOptionsForContextUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetOptionsForContextForbiddenException
     * @throws \JiraSdk\Api\Exception\GetOptionsForContextNotFoundException
     */
    public function getOptionsForContext(string $fieldId, int $contextId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetOptionsForContext($fieldId, $contextId, $queryParameters), $fetch);
    }

    /**
     * Creates options and, where the custom select field is of the type Select List (cascading), cascading options for a custom select field. The options are added to a context of the field.
     *
     * The maximum number of options that can be created per request is 1000 and each field can have a maximum of 10000 options.
     *
     * This operation works for custom field options created in Jira or the operations from this resource. **To work with issue field select list options created for Connect apps use the [Issue custom field options (apps)](#api-group-issue-custom-field-options--apps-) operations.**
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                                $fieldId     the ID of the custom field
     * @param int                                                   $contextId   the ID of the context
     * @param \JiraSdk\Api\Model\BulkCustomFieldOptionCreateRequest $requestBody
     * @param string                                                $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\CustomFieldCreatedContextOptionsList|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateCustomFieldOptionBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateCustomFieldOptionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateCustomFieldOptionForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateCustomFieldOptionNotFoundException
     */
    public function createCustomFieldOption(string $fieldId, int $contextId, Model\BulkCustomFieldOptionCreateRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateCustomFieldOption($fieldId, $contextId, $requestBody), $fetch);
    }

    /**
     * Updates the options of a custom field.
     *
     * If any of the options are not found, no options are updated. Options where the values in the request match the current values aren't updated and aren't reported in the response.
     *
     * Note that this operation **only works for issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource**, it cannot be used with issue field select list options created by Connect apps.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                                $fieldId     the ID of the custom field
     * @param int                                                   $contextId   the ID of the context
     * @param \JiraSdk\Api\Model\BulkCustomFieldOptionUpdateRequest $requestBody
     * @param string                                                $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\CustomFieldUpdatedContextOptionsList|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldOptionBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldOptionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldOptionForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateCustomFieldOptionNotFoundException
     */
    public function updateCustomFieldOption(string $fieldId, int $contextId, Model\BulkCustomFieldOptionUpdateRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateCustomFieldOption($fieldId, $contextId, $requestBody), $fetch);
    }

    /**
     * Changes the order of custom field options or cascading options in a context.
     *
     * This operation works for custom field options created in Jira or the operations from this resource. **To work with issue field select list options created for Connect apps use the [Issue custom field options (apps)](#api-group-issue-custom-field-options--apps-) operations.**
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                       $fieldId     the ID of the custom field
     * @param int                                          $contextId   the ID of the context
     * @param \JiraSdk\Api\Model\OrderOfCustomFieldOptions $requestBody
     * @param string                                       $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\ReorderCustomFieldOptionsBadRequestException
     * @throws \JiraSdk\Api\Exception\ReorderCustomFieldOptionsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\ReorderCustomFieldOptionsForbiddenException
     * @throws \JiraSdk\Api\Exception\ReorderCustomFieldOptionsNotFoundException
     */
    public function reorderCustomFieldOptions(string $fieldId, int $contextId, Model\OrderOfCustomFieldOptions $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\ReorderCustomFieldOptions($fieldId, $contextId, $requestBody), $fetch);
    }

    /**
     * Deletes a custom field option.
     *
     * Options with cascading options cannot be deleted without deleting the cascading options first.
     *
     * This operation works for custom field options created in Jira or the operations from this resource. **To work with issue field select list options created for Connect apps use the [Issue custom field options (apps)](#api-group-issue-custom-field-options--apps-) operations.**
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId   the ID of the custom field
     * @param int    $contextId the ID of the context from which an option should be deleted
     * @param int    $optionId  the ID of the option to delete
     * @param string $fetch     Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldOptionBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldOptionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldOptionForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldOptionNotFoundException
     */
    public function deleteCustomFieldOption(string $fieldId, int $contextId, int $optionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteCustomFieldOption($fieldId, $contextId, $optionId), $fetch);
    }

    /**
     * Assigns a custom field context to projects.
     *
     * If any project in the request is assigned to any context of the custom field, the operation fails.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                        $fieldId     the ID of the custom field
     * @param int                           $contextId   the ID of the context
     * @param \JiraSdk\Api\Model\ProjectIds $requestBody
     * @param string                        $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AssignProjectsToCustomFieldContextBadRequestException
     * @throws \JiraSdk\Api\Exception\AssignProjectsToCustomFieldContextUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AssignProjectsToCustomFieldContextForbiddenException
     * @throws \JiraSdk\Api\Exception\AssignProjectsToCustomFieldContextNotFoundException
     */
    public function assignProjectsToCustomFieldContext(string $fieldId, int $contextId, Model\ProjectIds $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AssignProjectsToCustomFieldContext($fieldId, $contextId, $requestBody), $fetch);
    }

    /**
     * Removes a custom field context from projects.
     *
     * A custom field context without any projects applies to all projects. Removing all projects from a custom field context would result in it applying to all projects.
     *
     * If any project in the request is not assigned to the context, or the operation would result in two global contexts for the field, the operation fails.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                        $fieldId     the ID of the custom field
     * @param int                           $contextId   the ID of the context
     * @param \JiraSdk\Api\Model\ProjectIds $requestBody
     * @param string                        $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveCustomFieldContextFromProjectsBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveCustomFieldContextFromProjectsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveCustomFieldContextFromProjectsForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveCustomFieldContextFromProjectsNotFoundException
     */
    public function removeCustomFieldContextFromProjects(string $fieldId, int $contextId, Model\ProjectIds $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveCustomFieldContextFromProjects($fieldId, $contextId, $requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of the contexts a field is used in. Deprecated, use [ Get custom field contexts](#api-rest-api-3-field-fieldId-context-get).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId         the ID of the field to return contexts for
     * @param array  $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanContext|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetContextsForFieldDeprecatedUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetContextsForFieldDeprecatedForbiddenException
     */
    public function getContextsForFieldDeprecated(string $fieldId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetContextsForFieldDeprecated($fieldId, $queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of the screens a field is used in.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId         the ID of the field to return screens for
     * @param array  $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var string $expand Use [expand](#expansion) to include additional information about screens in the response. This parameter accepts `tab` which returns details about the screen tabs the field is used in.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanScreenWithTab|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetScreensForFieldUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetScreensForFieldForbiddenException
     */
    public function getScreensForField(string $fieldId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetScreensForField($fieldId, $queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of all the options of a select list issue field. A select list issue field is a type of [issue field](https://developer.atlassian.com/cloud/jira/platform/modules/issue-field/) that enables a user to select a value from a list of options.
     *
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
     *
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
     *
     *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
     *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanIssueFieldOption|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllIssueFieldOptionsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAllIssueFieldOptionsForbiddenException
     */
    public function getAllIssueFieldOptions(string $fieldKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllIssueFieldOptions($fieldKey, $queryParameters), $fetch);
    }

    /**
     * Creates an option for a select list issue field.
     *
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
     *
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
     *
     *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
     *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
     * @param \JiraSdk\Api\Model\IssueFieldOptionCreateBean $requestBody
     * @param string                                        $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueFieldOption|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateIssueFieldOptionBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateIssueFieldOptionForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateIssueFieldOptionNotFoundException
     */
    public function createIssueFieldOption(string $fieldKey, Model\IssueFieldOptionCreateBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateIssueFieldOption($fieldKey, $requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of options for a select list issue field that can be viewed and selected by the user.
     *
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
     *
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
     *
     *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
     *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var int $projectId Filters the results to options that are only available in the specified project.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanIssueFieldOption|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetSelectableIssueFieldOptionsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetSelectableIssueFieldOptionsNotFoundException
     */
    public function getSelectableIssueFieldOptions(string $fieldKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetSelectableIssueFieldOptions($fieldKey, $queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of options for a select list issue field that can be viewed by the user.
     *
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
     *
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
     *
     *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
     *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var int $projectId Filters the results to options that are only available in the specified project.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanIssueFieldOption|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetVisibleIssueFieldOptionsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetVisibleIssueFieldOptionsNotFoundException
     */
    public function getVisibleIssueFieldOptions(string $fieldKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetVisibleIssueFieldOptions($fieldKey, $queryParameters), $fetch);
    }

    /**
     * Deletes an option from a select list issue field.
     *
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
     *
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
     *
     *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
     *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
     * @param int    $optionId the ID of the option to be deleted
     * @param string $fetch    Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteIssueFieldOptionForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteIssueFieldOptionNotFoundException
     * @throws \JiraSdk\Api\Exception\DeleteIssueFieldOptionConflictException
     */
    public function deleteIssueFieldOption(string $fieldKey, int $optionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteIssueFieldOption($fieldKey, $optionId), $fetch);
    }

    /**
     * Returns an option from a select list issue field.
     *
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
     *
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
     *
     *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
     *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
     * @param int    $optionId the ID of the option to be returned
     * @param string $fetch    Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueFieldOption|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueFieldOptionBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueFieldOptionForbiddenException
     * @throws \JiraSdk\Api\Exception\GetIssueFieldOptionNotFoundException
     */
    public function getIssueFieldOption(string $fieldKey, int $optionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueFieldOption($fieldKey, $optionId), $fetch);
    }

    /**
     * Updates or creates an option for a select list issue field. This operation requires that the option ID is provided when creating an option, therefore, the option ID needs to be specified as a path and body parameter. The option ID provided in the path and body must be identical.
     *
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
     *
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
     *
     *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
     *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
     * @param int                                 $optionId    the ID of the option to be updated
     * @param \JiraSdk\Api\Model\IssueFieldOption $requestBody
     * @param string                              $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueFieldOption|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateIssueFieldOptionBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateIssueFieldOptionForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateIssueFieldOptionNotFoundException
     */
    public function updateIssueFieldOption(string $fieldKey, int $optionId, Model\IssueFieldOption $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateIssueFieldOption($fieldKey, $optionId, $requestBody), $fetch);
    }

    /**
     * Deselects an issue-field select-list option from all issues where it is selected. A different option can be selected to replace the deselected option. The update can also be limited to a smaller set of issues by using a JQL query.
     *
     * Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) can override the screen security configuration using `overrideScreenSecurity` and `overrideEditableFlag`.
     *
     * This is an [asynchronous operation](#async). The response object contains a link to the long-running task.
     *
     * Note that this operation **only works for issue field select list options added by Connect apps**, it cannot be used with issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the app providing the field.
     *
     * @param string $fieldKey The field key is specified in the following format: **$(app-key)\_\_$(field-key)**. For example, *example-add-on\_\_example-issue-field*. To determine the `fieldKey` value, do one of the following:
     *
     *  open the app's plugin descriptor, then **app-key** is the key at the top and **field-key** is the key in the `jiraIssueFields` module. **app-key** can also be found in the app listing in the Atlassian Universal Plugin Manager.
     *  run [Get fields](#api-rest-api-3-field-get) and in the field details the value is returned in `key`. For example, `"key": "teams-add-on__team-issue-field"`
     * @param int   $optionId        the ID of the option to be deselected
     * @param array $queryParameters {
     *
     *     @var int $replaceWith the ID of the option that will replace the currently selected option
     *     @var string $jql A JQL query that specifies the issues to be updated. For example, *project=10000*.
     *     @var bool $overrideScreenSecurity Whether screen security is overridden to enable hidden fields to be edited. Available to Connect and Forge app users with admin permission.
     *     @var bool $overrideEditableFlag Whether screen security is overridden to enable uneditable fields to be edited. Available to Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\TaskProgressBeanRemoveOptionFromIssuesResult|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\ReplaceIssueFieldOptionBadRequestException
     * @throws \JiraSdk\Api\Exception\ReplaceIssueFieldOptionForbiddenException
     * @throws \JiraSdk\Api\Exception\ReplaceIssueFieldOptionNotFoundException
     */
    public function replaceIssueFieldOption(string $fieldKey, int $optionId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\ReplaceIssueFieldOption($fieldKey, $optionId, $queryParameters), $fetch);
    }

    /**
     * Deletes a custom field. The custom field is deleted whether it is in the trash or not. See [Edit or delete a custom field](https://confluence.atlassian.com/x/Z44fOw) for more information on trashing and deleting custom fields.
     *
     * This operation is [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id    the ID of a custom field
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\TaskProgressBeanObject|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldNotFoundException
     * @throws \JiraSdk\Api\Exception\DeleteCustomFieldConflictException
     */
    public function deleteCustomField(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteCustomField($id), $fetch);
    }

    /**
     * Restores a custom field from trash. See [Edit or delete a custom field](https://confluence.atlassian.com/x/Z44fOw) for more information on trashing and deleting custom fields.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id    the ID of a custom field
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RestoreCustomFieldBadRequestException
     * @throws \JiraSdk\Api\Exception\RestoreCustomFieldUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RestoreCustomFieldForbiddenException
     * @throws \JiraSdk\Api\Exception\RestoreCustomFieldNotFoundException
     */
    public function restoreCustomField(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RestoreCustomField($id), $fetch);
    }

    /**
     * Moves a custom field to trash. See [Edit or delete a custom field](https://confluence.atlassian.com/x/Z44fOw) for more information on trashing and deleting custom fields.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id    the ID of a custom field
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\TrashCustomFieldBadRequestException
     * @throws \JiraSdk\Api\Exception\TrashCustomFieldUnauthorizedException
     * @throws \JiraSdk\Api\Exception\TrashCustomFieldForbiddenException
     * @throws \JiraSdk\Api\Exception\TrashCustomFieldNotFoundException
     */
    public function trashCustomField(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\TrashCustomField($id), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of field configurations. The list can be for all field configurations or a subset determined by any combination of these criteria:.
     *
     *  a list of field configuration item IDs.
     *  whether the field configuration is a default.
     *  whether the field configuration name or description contains a query string.
     *
     * Only field configurations used in company-managed (classic) projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $id The list of field configuration IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
     *     @var bool $isDefault if *true* returns default field configurations only
     *     @var string $query The query string used to match against field configuration names and descriptions.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanFieldConfigurationDetails|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllFieldConfigurationsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllFieldConfigurationsForbiddenException
     */
    public function getAllFieldConfigurations(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllFieldConfigurations($queryParameters), $fetch);
    }

    /**
     * Creates a field configuration. The field configuration is created with the same field properties as the default configuration, with all the fields being optional.
     *
     * This operation can only create configurations for use in company-managed (classic) projects.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\FieldConfigurationDetails $requestBody
     * @param string                                       $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\FieldConfiguration|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateFieldConfigurationBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateFieldConfigurationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateFieldConfigurationForbiddenException
     */
    public function createFieldConfiguration(Model\FieldConfigurationDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateFieldConfiguration($requestBody), $fetch);
    }

    /**
     * Deletes a field configuration.
     *
     * This operation can only delete configurations used in company-managed (classic) projects.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id    the ID of the field configuration
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteFieldConfigurationBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteFieldConfigurationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteFieldConfigurationForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteFieldConfigurationNotFoundException
     */
    public function deleteFieldConfiguration(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteFieldConfiguration($id), $fetch);
    }

    /**
     * Updates a field configuration. The name and the description provided in the request override the existing values.
     *
     * This operation can only update configurations used in company-managed (classic) projects.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                          $id          the ID of the field configuration
     * @param \JiraSdk\Api\Model\FieldConfigurationDetails $requestBody
     * @param string                                       $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateFieldConfigurationBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateFieldConfigurationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateFieldConfigurationForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateFieldConfigurationNotFoundException
     */
    public function updateFieldConfiguration(int $id, Model\FieldConfigurationDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateFieldConfiguration($id, $requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of all fields for a configuration.
     *
     * Only the fields from configurations used in company-managed (classic) projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $id              the ID of the field configuration
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanFieldConfigurationItem|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetFieldConfigurationItemsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetFieldConfigurationItemsForbiddenException
     * @throws \JiraSdk\Api\Exception\GetFieldConfigurationItemsNotFoundException
     */
    public function getFieldConfigurationItems(int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetFieldConfigurationItems($id, $queryParameters), $fetch);
    }

    /**
     * Updates fields in a field configuration. The properties of the field configuration fields provided override the existing values.
     *
     * This operation can only update field configurations used in company-managed (classic) projects.
     *
     * The operation can set the renderer for text fields to the default text renderer (`text-renderer`) or wiki style renderer (`wiki-renderer`). However, the renderer cannot be updated for fields using the autocomplete renderer (`autocomplete-renderer`).
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                               $id          the ID of the field configuration
     * @param \JiraSdk\Api\Model\FieldConfigurationItemsDetails $requestBody
     * @param string                                            $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateFieldConfigurationItemsBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateFieldConfigurationItemsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateFieldConfigurationItemsForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateFieldConfigurationItemsNotFoundException
     */
    public function updateFieldConfigurationItems(int $id, Model\FieldConfigurationItemsDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateFieldConfigurationItems($id, $requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of field configuration schemes.
     *
     * Only field configuration schemes used in classic projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $id The list of field configuration scheme IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanFieldConfigurationScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllFieldConfigurationSchemesBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAllFieldConfigurationSchemesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllFieldConfigurationSchemesForbiddenException
     */
    public function getAllFieldConfigurationSchemes(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllFieldConfigurationSchemes($queryParameters), $fetch);
    }

    /**
     * Creates a field configuration scheme.
     *
     * This operation can only create field configuration schemes used in company-managed (classic) projects.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\UpdateFieldConfigurationSchemeDetails $requestBody
     * @param string                                                   $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\FieldConfigurationScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateFieldConfigurationSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateFieldConfigurationSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateFieldConfigurationSchemeForbiddenException
     */
    public function createFieldConfigurationScheme(Model\UpdateFieldConfigurationSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateFieldConfigurationScheme($requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of field configuration issue type items.
     *
     * Only items used in classic projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $fieldConfigurationSchemeId The list of field configuration scheme IDs. To include multiple field configuration schemes separate IDs with ampersand: `fieldConfigurationSchemeId=10000&fieldConfigurationSchemeId=10001`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanFieldConfigurationIssueTypeItem|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetFieldConfigurationSchemeMappingsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetFieldConfigurationSchemeMappingsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetFieldConfigurationSchemeMappingsForbiddenException
     * @throws \JiraSdk\Api\Exception\GetFieldConfigurationSchemeMappingsNotFoundException
     */
    public function getFieldConfigurationSchemeMappings(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetFieldConfigurationSchemeMappings($queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of field configuration schemes and, for each scheme, a list of the projects that use it.
     *
     * The list is sorted by field configuration scheme ID. The first item contains the list of project IDs assigned to the default field configuration scheme.
     *
     * Only field configuration schemes used in classic projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $projectId The list of project IDs. To include multiple projects, separate IDs with ampersand: `projectId=10000&projectId=10001`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanFieldConfigurationSchemeProjects|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetFieldConfigurationSchemeProjectMappingBadRequestException
     * @throws \JiraSdk\Api\Exception\GetFieldConfigurationSchemeProjectMappingUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetFieldConfigurationSchemeProjectMappingForbiddenException
     */
    public function getFieldConfigurationSchemeProjectMapping(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetFieldConfigurationSchemeProjectMapping($queryParameters), $fetch);
    }

    /**
     * Assigns a field configuration scheme to a project. If the field configuration scheme ID is `null`, the operation assigns the default field configuration scheme.
     *
     * Field configuration schemes can only be assigned to classic projects.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\FieldConfigurationSchemeProjectAssociation $requestBody
     * @param string                                                        $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AssignFieldConfigurationSchemeToProjectBadRequestException
     * @throws \JiraSdk\Api\Exception\AssignFieldConfigurationSchemeToProjectUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AssignFieldConfigurationSchemeToProjectForbiddenException
     * @throws \JiraSdk\Api\Exception\AssignFieldConfigurationSchemeToProjectNotFoundException
     */
    public function assignFieldConfigurationSchemeToProject(Model\FieldConfigurationSchemeProjectAssociation $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AssignFieldConfigurationSchemeToProject($requestBody), $fetch);
    }

    /**
     * Deletes a field configuration scheme.
     *
     * This operation can only delete field configuration schemes used in company-managed (classic) projects.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id    the ID of the field configuration scheme
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteFieldConfigurationSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteFieldConfigurationSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteFieldConfigurationSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteFieldConfigurationSchemeNotFoundException
     */
    public function deleteFieldConfigurationScheme(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteFieldConfigurationScheme($id), $fetch);
    }

    /**
     * Updates a field configuration scheme.
     *
     * This operation can only update field configuration schemes used in company-managed (classic) projects.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                                      $id          the ID of the field configuration scheme
     * @param \JiraSdk\Api\Model\UpdateFieldConfigurationSchemeDetails $requestBody
     * @param string                                                   $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateFieldConfigurationSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateFieldConfigurationSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateFieldConfigurationSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateFieldConfigurationSchemeNotFoundException
     */
    public function updateFieldConfigurationScheme(int $id, Model\UpdateFieldConfigurationSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateFieldConfigurationScheme($id, $requestBody), $fetch);
    }

    /**
     * Assigns issue types to field configurations on field configuration scheme.
     *
     * This operation can only modify field configuration schemes used in company-managed (classic) projects.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                                                  $id          the ID of the field configuration scheme
     * @param \JiraSdk\Api\Model\AssociateFieldConfigurationsWithIssueTypesRequest $requestBody
     * @param string                                                               $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetFieldConfigurationSchemeMappingBadRequestException
     * @throws \JiraSdk\Api\Exception\SetFieldConfigurationSchemeMappingUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetFieldConfigurationSchemeMappingForbiddenException
     * @throws \JiraSdk\Api\Exception\SetFieldConfigurationSchemeMappingNotFoundException
     */
    public function setFieldConfigurationSchemeMapping(int $id, Model\AssociateFieldConfigurationsWithIssueTypesRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetFieldConfigurationSchemeMapping($id, $requestBody), $fetch);
    }

    /**
     * Removes issue types from the field configuration scheme.
     *
     * This operation can only modify field configuration schemes used in company-managed (classic) projects.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                     $id          the ID of the field configuration scheme
     * @param \JiraSdk\Api\Model\IssueTypeIdsToRemove $requestBody
     * @param string                                  $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypesFromGlobalFieldConfigurationSchemeNotFoundException
     */
    public function removeIssueTypesFromGlobalFieldConfigurationScheme(int $id, Model\IssueTypeIdsToRemove $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveIssueTypesFromGlobalFieldConfigurationScheme($id, $requestBody), $fetch);
    }

    /**
     * Returns all filters. Deprecated, use [ Search for filters](#api-rest-api-3-filter-search-get) that supports search and pagination.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None, however, only the following filters are returned:
     *
     *  filters owned by the user.
     *  filters shared with a group that the user is a member of.
     *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
     *  filters shared with a public project.
     *  filters shared with the public.
     *
     * @param array $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
     *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Filter[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function getFilters(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetFilters($queryParameters), $fetch);
    }

    /**
     * Creates a filter. The filter is shared according to the [default share scope](#api-rest-api-3-filter-post). The filter is not selected as a favorite.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param \JiraSdk\Api\Model\Filter $requestBody
     * @param array                     $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
     *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     *     @var bool $overrideSharePermissions EXPERIMENTAL: Whether share permissions are overridden to enable filters with any share permissions to be created. Available to users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Filter|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateFilterBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateFilterUnauthorizedException
     */
    public function createFilter(Model\Filter $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateFilter($requestBody, $queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\DefaultShareScope|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetDefaultShareScopeUnauthorizedException
     */
    public function getDefaultShareScope(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetDefaultShareScope(), $fetch);
    }

    /**
     * Sets the default sharing for new filters and dashboards for a user.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param \JiraSdk\Api\Model\DefaultShareScope $requestBody
     * @param string                               $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\DefaultShareScope|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetDefaultShareScopeBadRequestException
     * @throws \JiraSdk\Api\Exception\SetDefaultShareScopeUnauthorizedException
     */
    public function setDefaultShareScope(Model\DefaultShareScope $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetDefaultShareScope($requestBody), $fetch);
    }

    /**
     * Returns the visible favorite filters of the user.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** A favorite filter is only visible to the user where the filter is:
     *
     *  owned by the user.
     *  shared with a group that the user is a member of.
     *  shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
     *  shared with a public project.
     *  shared with the public.
     *
     * For example, if the user favorites a public filter that is subsequently made private that filter is not returned by this operation.
     *
     * @param array $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
     *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Filter[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetFavouriteFiltersUnauthorizedException
     */
    public function getFavouriteFilters(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetFavouriteFilters($queryParameters), $fetch);
    }

    /**
     * Returns the filters owned by the user. If `includeFavourites` is `true`, the user's visible favorite filters are also returned.
     *
     **[Permissions](#permissions) required:** Permission to access Jira, however, a favorite filters is only visible to the user where the filter is:
     *
     *  owned by the user.
     *  shared with a group that the user is a member of.
     *  shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
     *  shared with a public project.
     *  shared with the public.
     *
     * For example, if the user favorites a public filter that is subsequently made private that filter is not returned by this operation.
     *
     * @param array $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
     *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     *     @var bool $includeFavourites Include the user's favorite filters in the response.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Filter[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetMyFiltersUnauthorizedException
     */
    public function getMyFilters(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetMyFilters($queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of filters. Use this operation to get:.
     *
     *  specific filters, by defining `id` only.
     *  filters that match all of the specified attributes. For example, all filters for a user with a particular word in their name. When multiple attributes are specified only filters matching all attributes are returned.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None, however, only the following filters that match the query parameters are returned:
     *
     *  filters owned by the user.
     *  filters shared with a group that the user is a member of.
     *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
     *  filters shared with a public project.
     *  filters shared with the public.
     *
     * @param array $queryParameters {
     *
     *     @var string $filterName string used to perform a case-insensitive partial match with `name`
     *     @var string $accountId User account ID used to return filters with the matching `owner.accountId`. This parameter cannot be used with `owner`.
     *     @var string $owner This parameter is deprecated because of privacy changes. Use `accountId` instead. See the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details. User name used to return filters with the matching `owner.name`. This parameter cannot be used with `accountId`.
     *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group. Group name used to returns filters that are shared with a group that matches `sharePermissions.group.groupname`. This parameter cannot be used with the `groupId` parameter.
     *     @var string $groupId Group ID used to returns filters that are shared with a group that matches `sharePermissions.group.groupId`. This parameter cannot be used with the `groupname` parameter.
     *     @var int $projectId Project ID used to returns filters that are shared with a project that matches `sharePermissions.project.id`.
     *     @var array $id The list of filter IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`. Do not exceed 200 filter IDs.
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *
     *  `description` Sorts by filter description. Note that this sorting works independently of whether the expand to display the description field is in use.
     *  `favourite_count` Sorts by the count of how many users have this filter as a favorite.
     *  `is_favourite` Sorts by whether the filter is marked as a favorite.
     *  `id` Sorts by filter ID.
     *  `name` Sorts by filter name.
     *  `owner` Sorts by the ID of the filter owner.
     *  `is_shared` Sorts by whether the filter is shared.
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
     *
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
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanFilterDetails|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetFiltersPaginatedBadRequestException
     * @throws \JiraSdk\Api\Exception\GetFiltersPaginatedUnauthorizedException
     */
    public function getFiltersPaginated(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetFiltersPaginated($queryParameters), $fetch);
    }

    /**
     * Delete a filter.
     **[Permissions](#permissions) required:** Permission to access Jira, however filters can only be deleted by the creator of the filter or a user with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id    the ID of the filter to delete
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteFilterBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteFilterUnauthorizedException
     */
    public function deleteFilter(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteFilter($id), $fetch);
    }

    /**
     * Returns a filter.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None, however, the filter is only returned where it is:
     *
     *  owned by the user.
     *  shared with a group that the user is a member of.
     *  shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
     *  shared with a public project.
     *  shared with the public.
     *
     * @param int   $id              the ID of the filter to return
     * @param array $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
     *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     *     @var bool $overrideSharePermissions EXPERIMENTAL: Whether share permissions are overridden to enable filters with any share permissions to be returned. Available to users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Filter|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetFilterBadRequestException
     * @throws \JiraSdk\Api\Exception\GetFilterUnauthorizedException
     */
    public function getFilter(int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetFilter($id, $queryParameters), $fetch);
    }

    /**
     * Updates a filter. Use this operation to update a filter's name, description, JQL, or sharing.
     **[Permissions](#permissions) required:** Permission to access Jira, however the user must own the filter.
     *
     * @param int                       $id              the ID of the filter to update
     * @param \JiraSdk\Api\Model\Filter $requestBody
     * @param array                     $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
     *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     *     @var bool $overrideSharePermissions EXPERIMENTAL: Whether share permissions are overridden to enable the addition of any share permissions to filters. Available to users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Filter|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateFilterBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateFilterUnauthorizedException
     */
    public function updateFilter(int $id, Model\Filter $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateFilter($id, $requestBody, $queryParameters), $fetch);
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
     * @param int    $id    the ID of the filter
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\ResetColumnsBadRequestException
     * @throws \JiraSdk\Api\Exception\ResetColumnsUnauthorizedException
     */
    public function resetColumns(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\ResetColumns($id), $fetch);
    }

    /**
     * Returns the columns configured for a filter. The column configuration is used when the filter's results are viewed in *List View* with the *Columns* set to *Filter*.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None, however, column details are only returned for:
     *
     *  filters owned by the user.
     *  filters shared with a group that the user is a member of.
     *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
     *  filters shared with a public project.
     *  filters shared with the public.
     *
     * @param int    $id    the ID of the filter
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ColumnItem[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetColumnsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetColumnsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetColumnsNotFoundException
     */
    public function getColumns(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetColumns($id), $fetch);
    }

    /**
     * Sets the columns for a filter. Only navigable fields can be set as columns. Use [Get fields](#api-rest-api-3-field-get) to get the list fields in Jira. A navigable field has `navigable` set to `true`.
     *
     * The parameters for this resource are expressed as HTML form data. For example, in curl:
     *
     * `curl -X PUT -d columns=summary -d columns=description https://your-domain.atlassian.net/rest/api/3/filter/10000/columns`
     *
     **[Permissions](#permissions) required:** Permission to access Jira, however, columns are only set for:
     *
     *  filters owned by the user.
     *  filters shared with a group that the user is a member of.
     *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
     *  filters shared with a public project.
     *  filters shared with the public.
     *
     * @param int          $id          the ID of the filter
     * @param array[]|null $requestBody
     * @param string       $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetColumnsBadRequestException
     * @throws \JiraSdk\Api\Exception\SetColumnsForbiddenException
     */
    public function setColumns(int $id, ?array $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetColumns($id, $requestBody), $fetch);
    }

    /**
     * Removes a filter as a favorite for the user. Note that this operation only removes filters visible to the user from the user's favorites list. For example, if the user favorites a public filter that is subsequently made private (and is therefore no longer visible on their favorites list) they cannot remove it from their favorites list.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param int   $id              the ID of the filter
     * @param array $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
     *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Filter|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteFavouriteForFilterBadRequestException
     */
    public function deleteFavouriteForFilter(int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteFavouriteForFilter($id, $queryParameters), $fetch);
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
     * @param int   $id              the ID of the filter
     * @param array $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about filter in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `sharedUsers` Returns the users that the filter is shared with. This includes users that can browse projects that the filter is shared with. If you don't specify `sharedUsers`, then the `sharedUsers` object is returned but it doesn't list any users. The list of users returned is limited to 1000, to access additional users append `[start-index:end-index]` to the expand request. For example, to access the next 1000 users, use `?expand=sharedUsers[1001:2000]`.
     *  `subscriptions` Returns the users that are subscribed to the filter. If you don't specify `subscriptions`, the `subscriptions` object is returned but it doesn't list any subscriptions. The list of subscriptions returned is limited to 1000, to access additional subscriptions append `[start-index:end-index]` to the expand request. For example, to access the next 1000 subscriptions, use `?expand=subscriptions[1001:2000]`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Filter|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetFavouriteForFilterBadRequestException
     */
    public function setFavouriteForFilter(int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetFavouriteForFilter($id, $queryParameters), $fetch);
    }

    /**
     * Changes the owner of the filter.
     **[Permissions](#permissions) required:** Permission to access Jira. However, the user must own the filter or have the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                  $id          the ID of the filter to update
     * @param \JiraSdk\Api\Model\ChangeFilterOwner $requestBody
     * @param string                               $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\ChangeFilterOwnerBadRequestException
     * @throws \JiraSdk\Api\Exception\ChangeFilterOwnerForbiddenException
     * @throws \JiraSdk\Api\Exception\ChangeFilterOwnerNotFoundException
     */
    public function changeFilterOwner(int $id, Model\ChangeFilterOwner $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\ChangeFilterOwner($id, $requestBody), $fetch);
    }

    /**
     * Returns the share permissions for a filter. A filter can be shared with groups, projects, all logged-in users, or the public. Sharing with all logged-in users or the public is known as a global share permission.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None, however, share permissions are only returned for:
     *
     *  filters owned by the user.
     *  filters shared with a group that the user is a member of.
     *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
     *  filters shared with a public project.
     *  filters shared with the public.
     *
     * @param int    $id    the ID of the filter
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\SharePermission[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetSharePermissionsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetSharePermissionsNotFoundException
     */
    public function getSharePermissions(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetSharePermissions($id), $fetch);
    }

    /**
     * Add a share permissions to a filter. If you add a global share permission (one for all logged-in users or the public) it will overwrite all share permissions for the filter.
     *
     * Be aware that this operation uses different objects for updating share permissions compared to [Update filter](#api-rest-api-3-filter-id-put).
     *
     **[Permissions](#permissions) required:** *Share dashboards and filters* [global permission](https://confluence.atlassian.com/x/x4dKLg) and the user must own the filter.
     *
     * @param int                                         $id          the ID of the filter
     * @param \JiraSdk\Api\Model\SharePermissionInputBean $requestBody
     * @param string                                      $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\SharePermission[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddSharePermissionBadRequestException
     * @throws \JiraSdk\Api\Exception\AddSharePermissionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddSharePermissionNotFoundException
     */
    public function addSharePermission(int $id, Model\SharePermissionInputBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddSharePermission($id, $requestBody), $fetch);
    }

    /**
     * Deletes a share permission from a filter.
     **[Permissions](#permissions) required:** Permission to access Jira and the user must own the filter.
     *
     * @param int    $id           the ID of the filter
     * @param int    $permissionId the ID of the share permission
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteSharePermissionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteSharePermissionNotFoundException
     */
    public function deleteSharePermission(int $id, int $permissionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteSharePermission($id, $permissionId), $fetch);
    }

    /**
     * Returns a share permission for a filter. A filter can be shared with groups, projects, all logged-in users, or the public. Sharing with all logged-in users or the public is known as a global share permission.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None, however, a share permission is only returned for:
     *
     *  filters owned by the user.
     *  filters shared with a group that the user is a member of.
     *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
     *  filters shared with a public project.
     *  filters shared with the public.
     *
     * @param int    $id           the ID of the filter
     * @param int    $permissionId the ID of the share permission
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\SharePermission|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetSharePermissionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetSharePermissionNotFoundException
     */
    public function getSharePermission(int $id, int $permissionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetSharePermission($id, $permissionId), $fetch);
    }

    /**
     * Deletes a group.
     *
     **[Permissions](#permissions) required:** Site administration (that is, member of the *site-admin* strategic [group](https://confluence.atlassian.com/x/24xjL)).
     *
     * @param array $queryParameters {
     *
     *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
     * The name of the group. This parameter cannot be used with the `groupId` parameter.
     *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
     *     @var string $swapGroup As a group's name can change, use of `swapGroupId` is recommended to identify a group.
     * The group to transfer restrictions to. Only comments and worklogs are transferred. If restrictions are not transferred, comments and worklogs are inaccessible after the deletion. This parameter cannot be used with the `swapGroupId` parameter.
     *     @var string $swapGroupId The ID of the group to transfer restrictions to. Only comments and worklogs are transferred. If restrictions are not transferred, comments and worklogs are inaccessible after the deletion. This parameter cannot be used with the `swapGroup` parameter.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveGroupBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveGroupUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveGroupForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveGroupNotFoundException
     */
    public function removeGroup(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveGroup($queryParameters), $fetch);
    }

    /**
     * This operation is deprecated, use [`group/member`](#api-rest-api-3-group-member-get).
     *
     * Returns all users in a group.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
     * The name of the group. This parameter cannot be used with the `groupId` parameter.
     *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
     *     @var string $expand List of fields to expand.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Group|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetGroupBadRequestException
     * @throws \JiraSdk\Api\Exception\GetGroupUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetGroupForbiddenException
     * @throws \JiraSdk\Api\Exception\GetGroupNotFoundException
     */
    public function getGroup(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetGroup($queryParameters), $fetch);
    }

    /**
     * Creates a group.
     **[Permissions](#permissions) required:** Site administration (that is, member of the *site-admin* [group](https://confluence.atlassian.com/x/24xjL)).
     *
     * @param \JiraSdk\Api\Model\AddGroupBean $requestBody
     * @param string                          $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Group|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateGroupBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateGroupUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateGroupForbiddenException
     */
    public function createGroup(Model\AddGroupBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateGroup($requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of groups.
     **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $groupId The ID of a group. To specify multiple IDs, pass multiple `groupId` parameters. For example, `groupId=5b10a2844c20165700ede21g&groupId=5b10ac8d82e05b22cc7d4ef5`.
     *     @var array $groupName The name of a group. To specify multiple names, pass multiple `groupName` parameters. For example, `groupName=administrators&groupName=jira-software-users`.
     *     @var string $accessType The access level of a group. Valid values: 'site-admin', 'admin', 'user'.
     *     @var string $applicationKey The application key of the product user groups to search for. Valid values: 'jira-servicedesk', 'jira-software', 'jira-product-discovery', 'jira-core'.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanGroupDetails|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\BulkGetGroupsBadRequestException
     * @throws \JiraSdk\Api\Exception\BulkGetGroupsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\BulkGetGroupsForbiddenException
     * @throws \JiraSdk\Api\Exception\BulkGetGroupsInternalServerErrorException
     */
    public function bulkGetGroups(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\BulkGetGroups($queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of all users in a group.
     *
     * Note that users are ordered by username, however the username is not returned in the results due to privacy reasons.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
     * The name of the group. This parameter cannot be used with the `groupId` parameter.
     *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
     *     @var bool $includeInactiveUsers include inactive users
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanUserDetails|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetUsersFromGroupBadRequestException
     * @throws \JiraSdk\Api\Exception\GetUsersFromGroupUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetUsersFromGroupForbiddenException
     * @throws \JiraSdk\Api\Exception\GetUsersFromGroupNotFoundException
     */
    public function getUsersFromGroup(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetUsersFromGroup($queryParameters), $fetch);
    }

    /**
     * Removes a user from a group.
     *
     **[Permissions](#permissions) required:** Site administration (that is, member of the *site-admin* [group](https://confluence.atlassian.com/x/24xjL)).
     *
     * @param array $queryParameters {
     *
     *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
     * The name of the group. This parameter cannot be used with the `groupId` parameter.
     *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
     *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveUserFromGroupBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveUserFromGroupUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveUserFromGroupForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveUserFromGroupNotFoundException
     */
    public function removeUserFromGroup(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveUserFromGroup($queryParameters), $fetch);
    }

    /**
     * Adds a user to a group.
     *
     **[Permissions](#permissions) required:** Site administration (that is, member of the *site-admin* [group](https://confluence.atlassian.com/x/24xjL)).
     *
     * @param \JiraSdk\Api\Model\UpdateUserToGroupBean $requestBody
     * @param array                                    $queryParameters {
     *
     *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
     * The name of the group. This parameter cannot be used with the `groupId` parameter.
     *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Group|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddUserToGroupBadRequestException
     * @throws \JiraSdk\Api\Exception\AddUserToGroupUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddUserToGroupForbiddenException
     * @throws \JiraSdk\Api\Exception\AddUserToGroupNotFoundException
     */
    public function addUserToGroup(Model\UpdateUserToGroupBean $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddUserToGroup($requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns a list of groups whose names contain a query string. A list of group names can be provided to exclude groups from the results.
     *
     * The primary use case for this resource is to populate a group picker suggestions list. To this end, the returned object includes the `html` field where the matched query term is highlighted in the group name with the HTML strong tag. Also, the groups list is wrapped in a response object that contains a header for use in the picker, specifically *Showing X of Y matching groups*.
     *
     * The list returns with the groups sorted. If no groups match the list criteria, an empty list is returned.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg). Anonymous calls and calls by users without the required permission return an empty list.
     *
     *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg). Without this permission, calls where query is not an exact match to an existing group will return an empty list.
     *
     * @param array $queryParameters {
     *
     *     @var string $accountId This parameter is deprecated, setting it does not affect the results. To find groups containing a particular user, use [Get user groups](#api-rest-api-3-user-groups-get).
     *     @var string $query the string to find in group names
     *     @var array $exclude As a group's name can change, use of `excludeGroupIds` is recommended to identify a group.
     * A group to exclude from the result. To exclude multiple groups, provide an ampersand-separated list. For example, `exclude=group1&exclude=group2`. This parameter cannot be used with the `excludeGroupIds` parameter.
     *     @var array $excludeId A group ID to exclude from the result. To exclude multiple groups, provide an ampersand-separated list. For example, `excludeId=group1-id&excludeId=group2-id`. This parameter cannot be used with the `excludeGroups` parameter.
     *     @var int $maxResults The maximum number of groups to return. The maximum number of groups that can be returned is limited by the system property `jira.ajax.autocomplete.limit`.
     *     @var bool $caseInsensitive whether the search for groups should be case insensitive
     *     @var string $userName This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\FoundGroups|\Psr\Http\Message\ResponseInterface|null
     */
    public function findGroups(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\FindGroups($queryParameters), $fetch);
    }

    /**
     * Returns a list of users and groups matching a string. The string is used:.
     *
     *  for users, to find a case-insensitive match with display name and e-mail address. Note that if a user has hidden their email address in their user profile, partial matches of the email address will not find the user. An exact match is required.
     *  for groups, to find a case-sensitive match with group name.
     *
     * For example, if the string *tin* is used, records with the display name *Tina*, email address *sarah@tinplatetraining.com*, and the group *accounting* would be returned.
     *
     * Optionally, the search can be refined to:
     *
     *  the projects and issue types associated with a custom field, such as a user picker. The search can then be further refined to return only users and groups that have permission to view specific:
     *
     *  projects.
     *  issue types.
     *
     * If multiple projects or issue types are specified, they must be a subset of those enabled for the custom field or no results are returned. For example, if a field is enabled for projects A, B, and C then the search could be limited to projects B and C. However, if the search is limited to projects B and D, nothing is returned.
     *  not return Connect app users and groups.
     *  return groups that have a case-insensitive match with the query.
     *
     * The primary use case for this resource is to populate a picker field suggestion list with users or groups. To this end, the returned object includes an `html` field for each list. This field highlights the matched query term in the item name with the HTML strong tag. Also, each list is wrapped in a response object that contains a header for use in a picker, specifically *Showing X of Y matching groups*.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param array $queryParameters {
     *
     *     @var string $query the search string
     *     @var int $maxResults the maximum number of items to return in each list
     *     @var bool $showAvatar Whether the user avatar should be returned. If an invalid value is provided, the default value is used.
     *     @var string $fieldId the custom field ID of the field this request is for
     *     @var array $projectId The ID of a project that returned users and groups must have permission to view. To include multiple projects, provide an ampersand-separated list. For example, `projectId=10000&projectId=10001`. This parameter is only used when `fieldId` is present.
     *     @var array $issueTypeId The ID of an issue type that returned users and groups must have permission to view. To include multiple issue types, provide an ampersand-separated list. For example, `issueTypeId=10000&issueTypeId=10001`. Special values, such as `-1` (all standard issue types) and `-2` (all subtask issue types), are supported. This parameter is only used when `fieldId` is present.
     *     @var string $avatarSize The size of the avatar to return. If an invalid value is provided, the default value is used.
     *     @var bool $caseInsensitive whether the search for groups should be case insensitive
     *     @var bool $excludeConnectAddons Whether Connect app users and groups should be excluded from the search results. If an invalid value is provided, the default value is used.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\FoundUsersAndGroups|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\FindUsersAndGroupsBadRequestException
     * @throws \JiraSdk\Api\Exception\FindUsersAndGroupsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\FindUsersAndGroupsForbiddenException
     * @throws \JiraSdk\Api\Exception\FindUsersAndGroupsTooManyRequestsException
     */
    public function findUsersAndGroups(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\FindUsersAndGroups($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\License|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetLicenseUnauthorizedException
     */
    public function getLicense(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetLicense(), $fetch);
    }

    /**
     * Creates an issue or, where the option to create subtasks is enabled in Jira, a subtask. A transition may be applied, to move the issue or subtask to a workflow step other than the default start step, and issue properties set.
     *
     * The content of the issue or subtask is defined using `update` and `fields`. The fields that can be set in the issue or subtask are determined using the [ Get create issue metadata](#api-rest-api-3-issue-createmeta-get). These are the same fields that appear on the issue's create screen. Note that the `description`, `environment`, and any `textarea` type custom fields (multi-line text fields) take Atlassian Document Format content. Single line custom fields (`textfield`) accept a string and don't handle Atlassian Document Format content.
     *
     * Creating a subtask differs from creating an issue as follows:
     *
     *  `issueType` must be set to a subtask issue type (use [ Get create issue metadata](#api-rest-api-3-issue-createmeta-get) to find subtask issue types).
     *  `parent` must contain the ID or key of the parent issue.
     *
     * In a next-gen project any issue may be made a child providing that the parent and child are members of the same project.
     *
     **[Permissions](#permissions) required:** *Browse projects* and *Create issues* [project permissions](https://confluence.atlassian.com/x/yodKLg) for the project in which the issue or subtask is created.
     *
     * @param \JiraSdk\Api\Model\IssueUpdateDetails $requestBody
     * @param array                                 $queryParameters {
     *
     *     @var bool $updateHistory Whether the project in which the issue is created is added to the user's **Recently viewed** project list, as shown under **Projects** in Jira. When provided, the issue type and request type are added to the user's history for a project. These values are then used to provide defaults on the issue create screen.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\CreatedIssue|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateIssueBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateIssueUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateIssueForbiddenException
     */
    public function createIssue(Model\IssueUpdateDetails $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateIssue($requestBody, $queryParameters), $fetch);
    }

    /**
     * Creates upto **50** issues and, where the option to create subtasks is enabled in Jira, subtasks. Transitions may be applied, to move the issues or subtasks to a workflow step other than the default start step, and issue properties set.
     *
     * The content of each issue or subtask is defined using `update` and `fields`. The fields that can be set in the issue or subtask are determined using the [ Get create issue metadata](#api-rest-api-3-issue-createmeta-get). These are the same fields that appear on the issues' create screens. Note that the `description`, `environment`, and any `textarea` type custom fields (multi-line text fields) take Atlassian Document Format content. Single line custom fields (`textfield`) accept a string and don't handle Atlassian Document Format content.
     *
     * Creating a subtask differs from creating an issue as follows:
     *
     *  `issueType` must be set to a subtask issue type (use [ Get create issue metadata](#api-rest-api-3-issue-createmeta-get) to find subtask issue types).
     *  `parent` the must contain the ID or key of the parent issue.
     *
     **[Permissions](#permissions) required:** *Browse projects* and *Create issues* [project permissions](https://confluence.atlassian.com/x/yodKLg) for the project in which each issue or subtask is created.
     *
     * @param \JiraSdk\Api\Model\IssuesUpdateBean $requestBody
     * @param string                              $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\CreatedIssues|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateIssuesBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateIssuesUnauthorizedException
     */
    public function createIssues(Model\IssuesUpdateBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateIssues($requestBody), $fetch);
    }

    /**
     * Returns details of projects, issue types within projects, and, when requested, the create screen fields for each issue type for the user. Use the information to populate the requests in [ Create issue](#api-rest-api-3-issue-post) and [Create issues](#api-rest-api-3-issue-bulk-post).
     *
     * The request can be restricted to specific projects or issue types using the query parameters. The response will contain information for the valid projects, issue types, or project and issue type combinations requested. Note that invalid project, issue type, or project and issue type combinations do not generate errors.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Create issues* [project permission](https://confluence.atlassian.com/x/yodKLg) in the requested projects.
     *
     * @param array $queryParameters {
     *
     *     @var array $projectIds List of project IDs. This parameter accepts a comma-separated list. Multiple project IDs can also be provided using an ampersand-separated list. For example, `projectIds=10000,10001&projectIds=10020,10021`. This parameter may be provided with `projectKeys`.
     *     @var array $projectKeys List of project keys. This parameter accepts a comma-separated list. Multiple project keys can also be provided using an ampersand-separated list. For example, `projectKeys=proj1,proj2&projectKeys=proj3`. This parameter may be provided with `projectIds`.
     *     @var array $issuetypeIds List of issue type IDs. This parameter accepts a comma-separated list. Multiple issue type IDs can also be provided using an ampersand-separated list. For example, `issuetypeIds=10000,10001&issuetypeIds=10020,10021`. This parameter may be provided with `issuetypeNames`.
     *     @var array $issuetypeNames List of issue type names. This parameter accepts a comma-separated list. Multiple issue type names can also be provided using an ampersand-separated list. For example, `issuetypeNames=name1,name2&issuetypeNames=name3`. This parameter may be provided with `issuetypeIds`.
     *     @var string $expand Use [expand](#expansion) to include additional information about issue metadata in the response. This parameter accepts `projects.issuetypes.fields`, which returns information about the fields in the issue creation screen for each issue type. Fields hidden from the screen are not returned. Use the information to populate the `fields` and `update` fields in [Create issue](#api-rest-api-3-issue-post) and [Create issues](#api-rest-api-3-issue-bulk-post).
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueCreateMetadata|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetCreateIssueMetaUnauthorizedException
     */
    public function getCreateIssueMeta(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetCreateIssueMeta($queryParameters), $fetch);
    }

    /**
     * Returns lists of issues matching a query string. Use this resource to provide auto-completion suggestions when the user is looking for an issue using a word or string.
     *
     * This operation returns two lists:
     *
     *  `History Search` which includes issues from the user's history of created, edited, or viewed issues that contain the string in the `query` parameter.
     *  `Current Search` which includes issues that match the JQL expression in `currentJQL` and contain the string in the `query` parameter.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *
     *     @var string $query a string to match against text fields in the issue such as title, description, or comments
     *     @var string $currentJQL A JQL query defining a list of issues to search for the query term. Note that `username` and `userkey` cannot be used as search terms for this parameter, due to privacy reasons. Use `accountId` instead.
     *     @var string $currentIssueKey The key of an issue to exclude from search results. For example, the issue the user is viewing when they perform this query.
     *     @var string $currentProjectId the ID of a project that suggested issues must belong to
     *     @var bool $showSubTasks indicate whether to include subtasks in the suggestions list
     *     @var bool $showSubTaskParent When `currentIssueKey` is a subtask, whether to include the parent issue in the suggestions if it matches the query.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssuePickerSuggestions|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssuePickerResourceUnauthorizedException
     */
    public function getIssuePickerResource(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssuePickerResource($queryParameters), $fetch);
    }

    /**
     * Sets or updates a list of entity property values on issues. A list of up to 10 entity properties can be specified along with up to 10,000 issues on which to set or update that list of entity properties.
     *
     * The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON. The maximum length of single issue property value is 32768 characters. This operation can be accessed anonymously.
     *
     * This operation is:
     *
     *  transactional, either all properties are updated in all eligible issues or, when errors occur, no properties are updated.
     *  [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* and *Edit issues* [project permissions](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param \JiraSdk\Api\Model\IssueEntityProperties $requestBody
     * @param string                                   $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\BulkSetIssuesPropertiesListBadRequestException
     * @throws \JiraSdk\Api\Exception\BulkSetIssuesPropertiesListUnauthorizedException
     */
    public function bulkSetIssuesPropertiesList(Model\IssueEntityProperties $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\BulkSetIssuesPropertiesList($requestBody), $fetch);
    }

    /**
     * Sets or updates entity property values on issues. Up to 10 entity properties can be specified for each issue and up to 100 issues included in the request.
     *
     * The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON.
     *
     * This operation is:
     *
     *  [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
     *  non-transactional. Updating some entities may fail. Such information will available in the task result.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* and *Edit issues* [project permissions](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param \JiraSdk\Api\Model\MultiIssueEntityProperties $requestBody
     * @param string                                        $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\BulkSetIssuePropertiesByIssueBadRequestException
     * @throws \JiraSdk\Api\Exception\BulkSetIssuePropertiesByIssueUnauthorizedException
     * @throws \JiraSdk\Api\Exception\BulkSetIssuePropertiesByIssueForbiddenException
     */
    public function bulkSetIssuePropertiesByIssue(Model\MultiIssueEntityProperties $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\BulkSetIssuePropertiesByIssue($requestBody), $fetch);
    }

    /**
     * Deletes a property value from multiple issues. The issues to be updated can be specified by filter criteria.
     *
     * The criteria the filter used to identify eligible issues are:
     *
     *  `entityIds` Only issues from this list are eligible.
     *  `currentValue` Only issues with the property set to this value are eligible.
     *
     * If both criteria is specified, they are joined with the logical *AND*: only issues that satisfy both criteria are considered eligible.
     *
     * If no filter criteria are specified, all the issues visible to the user and where the user has the EDIT\_ISSUES permission for the issue are considered eligible.
     *
     * This operation is:
     *
     *  transactional, either the property is deleted from all eligible issues or, when errors occur, no properties are deleted.
     *  [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [ project permission](https://confluence.atlassian.com/x/yodKLg) for each project containing issues.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  *Edit issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for each issue.
     *
     * @param string                                              $propertyKey the key of the property
     * @param \JiraSdk\Api\Model\IssueFilterForBulkPropertyDelete $requestBody
     * @param string                                              $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\BulkDeleteIssuePropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\BulkDeleteIssuePropertyUnauthorizedException
     */
    public function bulkDeleteIssueProperty(string $propertyKey, Model\IssueFilterForBulkPropertyDelete $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\BulkDeleteIssueProperty($propertyKey, $requestBody), $fetch);
    }

    /**
     * Sets a property value on multiple issues.
     *
     * The value set can be a constant or determined by a [Jira expression](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/). Expressions must be computable with constant complexity when applied to a set of issues. Expressions must also comply with the [restrictions](https://developer.atlassian.com/cloud/jira/platform/jira-expressions/#restrictions) that apply to all Jira expressions.
     *
     * The issues to be updated can be specified by a filter.
     *
     * The filter identifies issues eligible for update using these criteria:
     *
     *  `entityIds` Only issues from this list are eligible.
     *  `currentValue` Only issues with the property set to this value are eligible.
     *  `hasProperty`:
     *
     *  If *true*, only issues with the property are eligible.
     *  If *false*, only issues without the property are eligible.
     *
     * If more than one criteria is specified, they are joined with the logical *AND*: only issues that satisfy all criteria are eligible.
     *
     * If an invalid combination of criteria is provided, an error is returned. For example, specifying a `currentValue` and `hasProperty` as *false* would not match any issues (because without the property the property cannot have a value).
     *
     * The filter is optional. Without the filter all the issues visible to the user and where the user has the EDIT\_ISSUES permission for the issue are considered eligible.
     *
     * This operation is:
     *
     *  transactional, either all eligible issues are updated or, when errors occur, none are updated.
     *  [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for each project containing issues.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  *Edit issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for each issue.
     *
     * @param string                                            $propertyKey The key of the property. The maximum length is 255 characters.
     * @param \JiraSdk\Api\Model\BulkIssuePropertyUpdateRequest $requestBody
     * @param string                                            $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\BulkSetIssuePropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\BulkSetIssuePropertyUnauthorizedException
     */
    public function bulkSetIssueProperty(string $propertyKey, Model\BulkIssuePropertyUpdateRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\BulkSetIssueProperty($propertyKey, $requestBody), $fetch);
    }

    /**
     * Returns, for the user, details of the watched status of issues from a list. If an issue ID is invalid, the returned watched status is `false`.
     *
     * This operation requires the **Allow users to watch issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param \JiraSdk\Api\Model\IssueList $requestBody
     * @param string                       $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\BulkIssueIsWatching|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIsWatchingIssueBulkUnauthorizedException
     */
    public function getIsWatchingIssueBulk(Model\IssueList $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIsWatchingIssueBulk($requestBody), $fetch);
    }

    /**
     * Deletes an issue.
     *
     * An issue cannot be deleted if it has one or more subtasks. To delete an issue with subtasks, set `deleteSubtasks`. This causes the issue's subtasks to be deleted with the issue.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* and *Delete issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param array  $queryParameters {
     *
     *     @var string $deleteSubtasks Whether the issue's subtasks are deleted when the issue is deleted.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteIssueBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteIssueUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteIssueForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteIssueNotFoundException
     */
    public function deleteIssue(string $issueIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteIssue($issueIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Returns the details for an issue.
     *
     * The issue is identified by its ID or key, however, if the identifier doesn't match an issue, a case-insensitive search and check for moved issues is performed. If a matching issue is found its details are returned, a 302 or other redirect is **not** returned. The issue key returned in the response is the key of the issue found.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param array  $queryParameters {
     *
     *     @var array $fields A list of fields to return for the issue. This parameter accepts a comma-separated list. Use it to retrieve a subset of fields. Allowed values:
     *
     *  `*all` Returns all fields.
     *  `*navigable` Returns navigable fields.
     *  Any issue field, prefixed with a minus to exclude.
     *
     * Examples:
     *
     *  `summary,comment` Returns only the summary and comments fields.
     *  `-description` Returns all (default) fields except description.
     *  `*navigable,-comment` Returns all navigable fields except comment.
     *
     * This parameter may be specified multiple times. For example, `fields=field1,field2& fields=field3`.
     *
     * Note: All fields are returned by default. This differs from [Search for issues using JQL (GET)](#api-rest-api-3-search-get) and [Search for issues using JQL (POST)](#api-rest-api-3-search-post) where the default is all navigable fields.
     *     @var bool $fieldsByKeys Whether fields in `fields` are referenced by keys rather than IDs. This parameter is useful where fields have been added by a connect app and a field's key may differ from its ID.
     *     @var string $expand Use [expand](#expansion) to include additional information about the issues in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `renderedFields` Returns field values rendered in HTML format.
     *  `names` Returns the display name of each field.
     *  `schema` Returns the schema describing a field type.
     *  `transitions` Returns all possible transitions for the issue.
     *  `editmeta` Returns information about how each field can be edited.
     *  `changelog` Returns a list of recent updates to an issue, sorted by date, starting from the most recent.
     *  `versionedRepresentations` Returns a JSON array for each version of a field's value, with the highest number representing the most recent version. Note: When included in the request, the `fields` parameter is ignored.
     *     @var array $properties A list of issue properties to return for the issue. This parameter accepts a comma-separated list. Allowed values:
     *
     *  `*all` Returns all issue properties.
     *  Any issue property key, prefixed with a minus to exclude.
     *
     * Examples:
     *
     *  `*all` Returns all properties.
     *  `*all,-prop1` Returns all properties except `prop1`.
     *  `prop1,prop2` Returns `prop1` and `prop2` properties.
     *
     * This parameter may be specified multiple times. For example, `properties=prop1,prop2& properties=prop3`.
     *     @var bool $updateHistory Whether the project in which the issue is created is added to the user's **Recently viewed** project list, as shown under **Projects** in Jira. This also populates the [JQL issues search](#api-rest-api-3-search-get) `lastViewed` field.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueBean|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueNotFoundException
     */
    public function getIssue(string $issueIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssue($issueIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Edits an issue. A transition may be applied and issue properties updated as part of the edit.
     *
     * The edits to the issue's fields are defined using `update` and `fields`. The fields that can be edited are determined using [ Get edit issue metadata](#api-rest-api-3-issue-issueIdOrKey-editmeta-get).
     *
     * The parent field may be set by key or ID. For standard issue types, the parent may be removed by setting `update.parent.set.none` to *true*. Note that the `description`, `environment`, and any `textarea` type custom fields (multi-line text fields) take Atlassian Document Format content. Single line custom fields (`textfield`) accept a string and don't handle Atlassian Document Format content.
     *
     * Connect apps having an app user with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), can override the screen security configuration using `overrideScreenSecurity` and `overrideEditableFlag`.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* and *Edit issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string                                $issueIdOrKey    the ID or key of the issue
     * @param \JiraSdk\Api\Model\IssueUpdateDetails $requestBody
     * @param array                                 $queryParameters {
     *
     *     @var bool $notifyUsers Whether a notification email about the issue update is sent to all watchers. To disable the notification, administer Jira or administer project permissions are required. If the user doesn't have the necessary permission the request is ignored.
     *     @var bool $overrideScreenSecurity Whether screen security is overridden to enable hidden fields to be edited. Available to Connect app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *     @var bool $overrideEditableFlag Whether screen security is overridden to enable uneditable fields to be edited. Available to Connect app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\EditIssueBadRequestException
     * @throws \JiraSdk\Api\Exception\EditIssueUnauthorizedException
     * @throws \JiraSdk\Api\Exception\EditIssueForbiddenException
     * @throws \JiraSdk\Api\Exception\EditIssueNotFoundException
     */
    public function editIssue(string $issueIdOrKey, Model\IssueUpdateDetails $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\EditIssue($issueIdOrKey, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Assigns an issue to a user. Use this operation when the calling user does not have the *Edit Issues* permission but has the *Assign issue* permission for the project that the issue is in.
     *
     * If `name` or `accountId` is set to:
     *
     *  `"-1"`, the issue is assigned to the default assignee for the project.
     *  `null`, the issue is set to unassigned.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse Projects* and *Assign Issues* [ project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string                  $issueIdOrKey the ID or key of the issue to be assigned
     * @param \JiraSdk\Api\Model\User $requestBody
     * @param string                  $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AssignIssueBadRequestException
     * @throws \JiraSdk\Api\Exception\AssignIssueForbiddenException
     * @throws \JiraSdk\Api\Exception\AssignIssueNotFoundException
     */
    public function assignIssue(string $issueIdOrKey, Model\User $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AssignIssue($issueIdOrKey, $requestBody), $fetch);
    }

    /**
     * Adds one or more attachments to an issue. Attachments are posted as multipart/form-data ([RFC 1867](https://www.ietf.org/rfc/rfc1867.txt)).
     *
     * Note that:
     *
     *  The request must have a `X-Atlassian-Token: no-check` header, if not it is blocked. See [Special headers](#special-request-headers) for more information.
     *  The name of the multipart/form-data parameter that contains the attachments must be `file`.
     *
     * The following examples upload a file called *myfile.txt* to the issue *TEST-123*:
     *
     * #### curl ####
     *
     * curl --location --request POST 'https://your-domain.atlassian.net/rest/api/3/issue/TEST-123/attachments'
     * -u 'email@example.com:<api_token>'
     * -H 'X-Atlassian-Token: no-check'
     * --form 'file=@"myfile.txt"'
     *
     * #### Node.js ####
     *
     * // This code sample uses the 'node-fetch' and 'form-data' libraries:
     * // https://www.npmjs.com/package/node-fetch
     * // https://www.npmjs.com/package/form-data
     * const fetch = require('node-fetch');
     * const FormData = require('form-data');
     * const fs = require('fs');
     *
     * const filePath = 'myfile.txt';
     * const form = new FormData();
     * const stats = fs.statSync(filePath);
     * const fileSizeInBytes = stats.size;
     * const fileStream = fs.createReadStream(filePath);
     *
     * form.append('file', fileStream, {knownLength: fileSizeInBytes});
     *
     * fetch('https://your-domain.atlassian.net/rest/api/3/issue/TEST-123/attachments', {
     * method: 'POST',
     * body: form,
     * headers: {
     * 'Authorization': `Basic ${Buffer.from(
     * 'email@example.com:'
     * ).toString('base64')}`,
     * 'Accept': 'application/json',
     * 'X-Atlassian-Token': 'no-check'
     * }
     * })
     * .then(response => {
     * console.log(
     * `Response: ${response.status} ${response.statusText}`
     * );
     * return response.text();
     * })
     * .then(text => console.log(text))
     * .catch(err => console.error(err));
     *
     * #### Java ####
     *
     * // This code sample uses the  'Unirest' library:
     * // http://unirest.io/java.html
     * HttpResponse response = Unirest.post("https://your-domain.atlassian.net/rest/api/2/issue/{issueIdOrKey}/attachments")
     * .basicAuth("email@example.com", "")
     * .header("Accept", "application/json")
     * .header("X-Atlassian-Token", "no-check")
     * .field("file", new File("myfile.txt"))
     * .asJson();
     *
     * System.out.println(response.getBody());
     *
     * #### Python ####
     *
     * # This code sample uses the 'requests' library:
     * # http://docs.python-requests.org
     * import requests
     * from requests.auth import HTTPBasicAuth
     * import json
     *
     * url = "https://your-domain.atlassian.net/rest/api/2/issue/{issueIdOrKey}/attachments"
     *
     * auth = HTTPBasicAuth("email@example.com", "")
     *
     * headers = {
     * "Accept": "application/json",
     * "X-Atlassian-Token": "no-check"
     * }
     *
     * response = requests.request(
     * "POST",
     * url,
     * headers = headers,
     * auth = auth,
     * files = {
     * "file": ("myfile.txt", open("myfile.txt","rb"), "application-type")
     * }
     * )
     *
     * print(json.dumps(json.loads(response.text), sort_keys=True, indent=4, separators=(",", ": ")))
     *
     * #### PHP ####
     *
     * // This code sample uses the 'Unirest' library:
     * // http://unirest.io/php.html
     * Unirest\Request::auth('email@example.com', '');
     *
     * $headers = array(
     * 'Accept' => 'application/json',
     * 'X-Atlassian-Token' => 'no-check'
     * );
     *
     * $parameters = array(
     * 'file' => File::add('myfile.txt')
     * );
     *
     * $response = Unirest\Request::post(
     * 'https://your-domain.atlassian.net/rest/api/2/issue/{issueIdOrKey}/attachments',
     * $headers,
     * $parameters
     * );
     *
     * var_dump($response)
     *
     * #### Forge ####
     *
     * // This sample uses Atlassian Forge and the `form-data` library.
     * // https://developer.atlassian.com/platform/forge/
     * // https://www.npmjs.com/package/form-data
     * import api from "@forge/api";
     * import FormData from "form-data";
     *
     * const form = new FormData();
     * form.append('file', fileStream, {knownLength: fileSizeInBytes});
     *
     * const response = await api.asApp().requestJira('/rest/api/2/issue/{issueIdOrKey}/attachments', {
     * method: 'POST',
     * body: form,
     * headers: {
     * 'Accept': 'application/json',
     * 'X-Atlassian-Token': 'no-check'
     * }
     * });
     *
     * console.log(`Response: ${response.status} ${response.statusText}`);
     * console.log(await response.json());
     *
     * Tip: Use a client library. Many client libraries have classes for handling multipart POST operations. For example, in Java, the Apache HTTP Components library provides a [MultiPartEntity](http://hc.apache.org/httpcomponents-client-ga/httpmime/apidocs/org/apache/http/entity/mime/MultipartEntity.html) class for multipart POST operations.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse Projects* and *Create attachments* [ project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string                                                 $issueIdOrKey the ID or key of the issue that attachments are added to
     * @param string|resource|\Psr\Http\Message\StreamInterface|null $requestBody
     * @param string                                                 $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Attachment[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddAttachmentForbiddenException
     * @throws \JiraSdk\Api\Exception\AddAttachmentNotFoundException
     * @throws \JiraSdk\Api\Exception\AddAttachmentRequestEntityTooLargeException
     */
    public function addAttachment(string $issueIdOrKey, $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddAttachment($issueIdOrKey, $requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of all changelogs for an issue sorted by date, starting from the oldest.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param array  $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanChangelog|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetChangeLogsNotFoundException
     */
    public function getChangeLogs(string $issueIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetChangeLogs($issueIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Returns changelogs for an issue specified by a list of changelog IDs.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string                               $issueIdOrKey the ID or key of the issue
     * @param \JiraSdk\Api\Model\IssueChangelogIds $requestBody
     * @param string                               $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageOfChangelogs|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetChangeLogsByIdsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetChangeLogsByIdsNotFoundException
     */
    public function getChangeLogsByIds(string $issueIdOrKey, Model\IssueChangelogIds $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetChangeLogsByIds($issueIdOrKey, $requestBody), $fetch);
    }

    /**
     * Returns all comments for an issue.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** Comments are included in the response where the user has:
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the comment.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  If the comment has visibility restrictions, belongs to the group or has the role visibility is role visibility is restricted to.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param array  $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var string $orderBy [Order](#ordering) the results by a field. Accepts *created* to sort comments by their created date.
     *     @var string $expand Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts `renderedBody`, which returns the comment body rendered in HTML.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageOfComments|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetCommentsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetCommentsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetCommentsNotFoundException
     */
    public function getComments(string $issueIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetComments($issueIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Adds a comment to an issue.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* and *Add comments* [ project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue containing the comment is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string                     $issueIdOrKey    the ID or key of the issue
     * @param \JiraSdk\Api\Model\Comment $requestBody
     * @param array                      $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts `renderedBody`, which returns the comment body rendered in HTML.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Comment|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddCommentBadRequestException
     * @throws \JiraSdk\Api\Exception\AddCommentUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddCommentNotFoundException
     */
    public function addComment(string $issueIdOrKey, Model\Comment $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddComment($issueIdOrKey, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Deletes a comment.
     **[Permissions](#permissions) required:**
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue containing the comment is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  *Delete all comments*[ project permission](https://confluence.atlassian.com/x/yodKLg) to delete any comment or *Delete own comments* to delete comment created by the user,
     *  If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $id           the ID of the comment
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteCommentBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteCommentUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteCommentNotFoundException
     * @throws \JiraSdk\Api\Exception\DeleteCommentMethodNotAllowedException
     */
    public function deleteComment(string $issueIdOrKey, string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteComment($issueIdOrKey, $id), $fetch);
    }

    /**
     * Returns a comment.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the comment.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param string $id              the ID of the comment
     * @param array  $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts `renderedBody`, which returns the comment body rendered in HTML.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Comment|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetCommentUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetCommentNotFoundException
     */
    public function getComment(string $issueIdOrKey, string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetComment($issueIdOrKey, $id, $queryParameters), $fetch);
    }

    /**
     * Updates a comment.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue containing the comment is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  *Edit all comments*[ project permission](https://confluence.atlassian.com/x/yodKLg) to update any comment or *Edit own comments* to update comment created by the user.
     *  If the comment has visibility restrictions, the user belongs to the group or has the role visibility is restricted to.
     *
     * @param string                     $issueIdOrKey    the ID or key of the issue
     * @param string                     $id              the ID of the comment
     * @param \JiraSdk\Api\Model\Comment $requestBody
     * @param array                      $queryParameters {
     *
     *     @var bool $notifyUsers whether users are notified when a comment is updated
     *     @var bool $overrideEditableFlag Whether screen security is overridden to enable uneditable fields to be edited. Available to Connect app users with the *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *     @var string $expand Use [expand](#expansion) to include additional information about comments in the response. This parameter accepts `renderedBody`, which returns the comment body rendered in HTML.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Comment|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateCommentBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateCommentUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateCommentNotFoundException
     */
    public function updateComment(string $issueIdOrKey, string $id, Model\Comment $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateComment($issueIdOrKey, $id, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns the edit screen fields for an issue that are visible to and editable by the user. Use the information to populate the requests in [Edit issue](#api-rest-api-3-issue-issueIdOrKey-put).
     *
     * This endpoint will check for these conditions:
     *
     * 1.  Field is available on a field screen - through screen, screen scheme, issue type screen scheme, and issue type scheme configuration. `overrideScreenSecurity=true` skips this condition.
     * 2.  Field is visible in the [field configuration](https://support.atlassian.com/jira-cloud-administration/docs/change-a-field-configuration/). `overrideScreenSecurity=true` skips this condition.
     * 3.  Field is shown on the issue: each field has different conditions here. For example: Attachment field only shows if attachments are enabled. Assignee only shows if user has permissions to assign the issue.
     * 4.  If a field is custom then it must have valid custom field context, applicable for its project and issue type. All system fields are assumed to have context in all projects and all issue types.
     * 5.  Issue has a project, issue type, and status defined.
     * 6.  Issue is assigned to a valid workflow, and the current status has assigned a workflow step. `overrideEditableFlag=true` skips this condition.
     * 7.  The current workflow step is editable. This is true by default, but [can be disabled by setting](https://support.atlassian.com/jira-cloud-administration/docs/use-workflow-properties/) the `jira.issue.editable` property to `false`. `overrideEditableFlag=true` skips this condition.
     * 8.  User has [Edit issues permission](https://support.atlassian.com/jira-cloud-administration/docs/permissions-for-company-managed-projects/).
     * 9.  Workflow permissions allow editing a field. This is true by default but [can be modified](https://support.atlassian.com/jira-cloud-administration/docs/use-workflow-properties/) using `jira.permission.*` workflow properties.
     *
     * Fields hidden using [Issue layout settings page](https://support.atlassian.com/jira-software-cloud/docs/configure-field-layout-in-the-issue-view/) remain editable.
     *
     * Connect apps having an app user with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), can return additional details using:
     *
     *  `overrideScreenSecurity` When this flag is `true`, then this endpoint skips checking if fields are available through screens, and field configuration (conditions 1. and 2. from the list above).
     *  `overrideEditableFlag` When this flag is `true`, then this endpoint skips checking if workflow is present and if the current step is editable (conditions 6. and 7. from the list above).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * Note: For any fields to be editable the user must have the *Edit issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the issue.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param array  $queryParameters {
     *
     *     @var bool $overrideScreenSecurity Whether hidden fields are returned. Available to Connect app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *     @var bool $overrideEditableFlag Whether non-editable fields are returned. Available to Connect app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) and Forge apps acting on behalf of users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueUpdateMetadata|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetEditIssueMetaUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetEditIssueMetaForbiddenException
     * @throws \JiraSdk\Api\Exception\GetEditIssueMetaNotFoundException
     */
    public function getEditIssueMeta(string $issueIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetEditIssueMeta($issueIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Creates an email notification for an issue and adds it to the mail queue.
     **[Permissions](#permissions) required:**
     *  *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string                          $issueIdOrKey ID or key of the issue that the notification is sent for
     * @param \JiraSdk\Api\Model\Notification $requestBody
     * @param string                          $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\NotifyBadRequestException
     * @throws \JiraSdk\Api\Exception\NotifyForbiddenException
     * @throws \JiraSdk\Api\Exception\NotifyNotFoundException
     */
    public function notify(string $issueIdOrKey, Model\Notification $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\Notify($issueIdOrKey, $requestBody), $fetch);
    }

    /**
     * Returns the URLs and keys of an issue's properties.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** Property details are only returned where the user has:
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey the key or ID of the issue
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssuePropertyKeysNotFoundException
     */
    public function getIssuePropertyKeys(string $issueIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssuePropertyKeys($issueIdOrKey), $fetch);
    }

    /**
     * Deletes an issue's property.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* and *Edit issues* [project permissions](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey the key or ID of the issue
     * @param string $propertyKey  the key of the property
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteIssuePropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteIssuePropertyNotFoundException
     */
    public function deleteIssueProperty(string $issueIdOrKey, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteIssueProperty($issueIdOrKey, $propertyKey), $fetch);
    }

    /**
     * Returns the key and value of an issue's property.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey the key or ID of the issue
     * @param string $propertyKey  the key of the property
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\EntityProperty|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssuePropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssuePropertyNotFoundException
     */
    public function getIssueProperty(string $issueIdOrKey, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueProperty($issueIdOrKey, $propertyKey), $fetch);
    }

    /**
     * Sets the value of an issue's property. Use this resource to store custom data against an issue.
     *
     * The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* and *Edit issues* [project permissions](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $propertyKey  The key of the issue property. The maximum length is 255 characters.
     * @param mixed  $requestBody
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetIssuePropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\SetIssuePropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetIssuePropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\SetIssuePropertyNotFoundException
     */
    public function setIssueProperty(string $issueIdOrKey, string $propertyKey, $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetIssueProperty($issueIdOrKey, $propertyKey, $requestBody), $fetch);
    }

    /**
     * Deletes the remote issue link from the issue using the link's global ID. Where the global ID includes reserved URL characters these must be escaped in the request. For example, pass `system=http://www.mycompany.com/support&id=1` as `system%3Dhttp%3A%2F%2Fwww.mycompany.com%2Fsupport%26id%3D1`.
     *
     * This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* and *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is implemented, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param array  $queryParameters {
     *
     *     @var string $globalId The global ID of a remote issue link.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByGlobalIdBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByGlobalIdUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByGlobalIdForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByGlobalIdNotFoundException
     */
    public function deleteRemoteIssueLinkByGlobalId(string $issueIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteRemoteIssueLinkByGlobalId($issueIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Returns the remote issue links for an issue. When a remote issue link global ID is provided the record with that global ID is returned, otherwise all remote issue links are returned. Where a global ID includes reserved URL characters these must be escaped in the request. For example, pass `system=http://www.mycompany.com/support&id=1` as `system%3Dhttp%3A%2F%2Fwww.mycompany.com%2Fsupport%26id%3D1`.
     *
     * This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param array  $queryParameters {
     *
     *     @var string $globalId The global ID of the remote issue link.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\RemoteIssueLink|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetRemoteIssueLinksBadRequestException
     * @throws \JiraSdk\Api\Exception\GetRemoteIssueLinksUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetRemoteIssueLinksForbiddenException
     * @throws \JiraSdk\Api\Exception\GetRemoteIssueLinksNotFoundException
     */
    public function getRemoteIssueLinks(string $issueIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetRemoteIssueLinks($issueIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Creates or updates a remote issue link for an issue.
     *
     * If a `globalId` is provided and a remote issue link with that global ID is found it is updated. Any fields without values in the request are set to null. Otherwise, the remote issue link is created.
     *
     * This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* and *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string                                    $issueIdOrKey the ID or key of the issue
     * @param \JiraSdk\Api\Model\RemoteIssueLinkRequest $requestBody
     * @param string                                    $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\RemoteIssueLinkIdentifies|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateOrUpdateRemoteIssueLinkBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateOrUpdateRemoteIssueLinkUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateOrUpdateRemoteIssueLinkForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateOrUpdateRemoteIssueLinkNotFoundException
     */
    public function createOrUpdateRemoteIssueLink(string $issueIdOrKey, Model\RemoteIssueLinkRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateOrUpdateRemoteIssueLink($issueIdOrKey, $requestBody), $fetch);
    }

    /**
     * Deletes a remote issue link from an issue.
     *
     * This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects*, *Edit issues*, and *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $linkId       the ID of a remote issue link
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByIdBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByIdUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByIdForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteRemoteIssueLinkByIdNotFoundException
     */
    public function deleteRemoteIssueLinkById(string $issueIdOrKey, string $linkId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteRemoteIssueLinkById($issueIdOrKey, $linkId), $fetch);
    }

    /**
     * Returns a remote issue link for an issue.
     *
     * This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $linkId       the ID of the remote issue link
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\RemoteIssueLink|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetRemoteIssueLinkByIdBadRequestException
     * @throws \JiraSdk\Api\Exception\GetRemoteIssueLinkByIdUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetRemoteIssueLinkByIdForbiddenException
     * @throws \JiraSdk\Api\Exception\GetRemoteIssueLinkByIdNotFoundException
     */
    public function getRemoteIssueLinkById(string $issueIdOrKey, string $linkId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetRemoteIssueLinkById($issueIdOrKey, $linkId), $fetch);
    }

    /**
     * Updates a remote issue link for an issue.
     *
     * Note: Fields without values in the request are set to null.
     *
     * This operation requires [issue linking to be active](https://confluence.atlassian.com/x/yoXKM).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* and *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string                                    $issueIdOrKey the ID or key of the issue
     * @param string                                    $linkId       the ID of the remote issue link
     * @param \JiraSdk\Api\Model\RemoteIssueLinkRequest $requestBody
     * @param string                                    $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateRemoteIssueLinkBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateRemoteIssueLinkUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateRemoteIssueLinkForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateRemoteIssueLinkNotFoundException
     */
    public function updateRemoteIssueLink(string $issueIdOrKey, string $linkId, Model\RemoteIssueLinkRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateRemoteIssueLink($issueIdOrKey, $linkId, $requestBody), $fetch);
    }

    /**
     * Returns either all transitions or a transition that can be performed by the user on an issue, based on the issue's status.
     *
     * Note, if a request is made for a transition that does not exist or cannot be performed on the issue, given its status, the response will return any empty transitions list.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required: A list or transition is returned only when the user has:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * However, if the user does not have the *Transition issues* [ project permission](https://confluence.atlassian.com/x/yodKLg) the response will not list any transitions.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param array  $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about transitions in the response. This parameter accepts `transitions.fields`, which returns information about the fields in the transition screen for each transition. Fields hidden from the screen are not returned. Use this information to populate the `fields` and `update` fields in [Transition issue](#api-rest-api-3-issue-issueIdOrKey-transitions-post).
     *     @var string $transitionId the ID of the transition
     *     @var bool $skipRemoteOnlyCondition whether transitions with the condition *Hide From User Condition* are included in the response
     *     @var bool $includeUnavailableTransitions Whether details of transitions that fail a condition are included in the response
     *     @var bool $sortByOpsBarAndStatus Whether the transitions are sorted by ops-bar sequence value first then category order (Todo, In Progress, Done) or only by ops-bar sequence value.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Transitions|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetTransitionsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetTransitionsNotFoundException
     */
    public function getTransitions(string $issueIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetTransitions($issueIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Performs an issue transition and, if the transition has a screen, updates the fields from the transition screen.
     *
     * sortByCategory To update the fields on the transition screen, specify the fields in the `fields` or `update` parameters in the request body. Get details about the fields using [ Get transitions](#api-rest-api-3-issue-issueIdOrKey-transitions-get) with the `transitions.fields` expand.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* and *Transition issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string                                $issueIdOrKey the ID or key of the issue
     * @param \JiraSdk\Api\Model\IssueUpdateDetails $requestBody
     * @param string                                $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DoTransitionBadRequestException
     * @throws \JiraSdk\Api\Exception\DoTransitionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DoTransitionNotFoundException
     */
    public function doTransition(string $issueIdOrKey, Model\IssueUpdateDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DoTransition($issueIdOrKey, $requestBody), $fetch);
    }

    /**
     * Deletes a user's vote from an issue. This is the equivalent of the user clicking *Unvote* on an issue in Jira.
     *
     * This operation requires the **Allow users to vote on issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveVoteUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveVoteNotFoundException
     */
    public function removeVote(string $issueIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveVote($issueIdOrKey), $fetch);
    }

    /**
     * Returns details about the votes on an issue.
     *
     * This operation requires the **Allow users to vote on issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is ini
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * Note that users with the necessary permissions for this operation but without the *View voters and watchers* project permissions are not returned details in the `voters` field.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Votes|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetVotesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetVotesNotFoundException
     */
    public function getVotes(string $issueIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetVotes($issueIdOrKey), $fetch);
    }

    /**
     * Adds the user's vote to an issue. This is the equivalent of the user clicking *Vote* on an issue in Jira.
     *
     * This operation requires the **Allow users to vote on issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddVoteBadRequestException
     * @throws \JiraSdk\Api\Exception\AddVoteUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddVoteNotFoundException
     */
    public function addVote(string $issueIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddVote($issueIdOrKey), $fetch);
    }

    /**
     * Deletes a user as a watcher of an issue.
     *
     * This operation requires the **Allow users to watch issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  To remove users other than themselves from the watchlist, *Manage watcher list* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param array  $queryParameters {
     *
     *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. Required.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveWatcherBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveWatcherUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveWatcherForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveWatcherNotFoundException
     */
    public function removeWatcher(string $issueIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveWatcher($issueIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Returns the watchers for an issue.
     *
     * This operation requires the **Allow users to watch issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is ini
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  To see details of users on the watchlist other than themselves, *View voters and watchers* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Watchers|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueWatchersUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueWatchersNotFoundException
     */
    public function getIssueWatchers(string $issueIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueWatchers($issueIdOrKey), $fetch);
    }

    /**
     * Adds a user as a watcher of an issue by passing the account ID of the user. For example, `"5b10ac8d82e05b22cc7d4ef5"`. If no user is specified the calling user is added.
     *
     * This operation requires the **Allow users to watch issues** option to be *ON*. This option is set in General configuration for Jira. See [Configuring Jira application options](https://confluence.atlassian.com/x/uYXKM) for details.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  To add users other than themselves to the watchlist, *Manage watcher list* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddWatcherBadRequestException
     * @throws \JiraSdk\Api\Exception\AddWatcherUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddWatcherForbiddenException
     * @throws \JiraSdk\Api\Exception\AddWatcherNotFoundException
     */
    public function addWatcher(string $issueIdOrKey, string $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddWatcher($issueIdOrKey, $requestBody), $fetch);
    }

    /**
     * Returns worklogs for an issue, starting from the oldest worklog or from the worklog started on or after a date and time.
     *
     * Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** Workloads are only returned where the user has:
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param array  $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var int $startedAfter the worklog start date and time, as a UNIX timestamp in milliseconds, after which worklogs are returned
     *     @var int $startedBefore the worklog start date and time, as a UNIX timestamp in milliseconds, before which worklogs are returned
     *     @var string $expand Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts`properties`, which returns worklog properties.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageOfWorklogs|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueWorklogUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueWorklogNotFoundException
     */
    public function getIssueWorklog(string $issueIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueWorklog($issueIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Adds a worklog to an issue.
     *
     * Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* and *Work on issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param string                     $issueIdOrKey    the ID or key the issue
     * @param \JiraSdk\Api\Model\Worklog $requestBody
     * @param array                      $queryParameters {
     *
     *     @var bool $notifyUsers whether users watching the issue are notified by email
     *     @var string $adjustEstimate Defines how to update the issue's time estimate, the options are:
     *
     *  `new` Sets the estimate to a specific value, defined in `newEstimate`.
     *  `leave` Leaves the estimate unchanged.
     *  `manual` Reduces the estimate by amount specified in `reduceBy`.
     *  `auto` Reduces the estimate by the value of `timeSpent` in the worklog.
     *     @var string $newEstimate The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `new`.
     *     @var string $reduceBy The amount to reduce the issue's remaining estimate by, as days (\#d), hours (\#h), or minutes (\#m). For example, *2d*. Required when `adjustEstimate` is `manual`.
     *     @var string $expand Use [expand](#expansion) to include additional information about work logs in the response. This parameter accepts `properties`, which returns worklog properties.
     *     @var bool $overrideEditableFlag Whether the worklog entry should be added to the issue even if the issue is not editable, because jira.issue.editable set to false or missing. For example, the issue is closed. Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) can use this flag.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Worklog|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddWorklogBadRequestException
     * @throws \JiraSdk\Api\Exception\AddWorklogUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddWorklogNotFoundException
     */
    public function addWorklog(string $issueIdOrKey, Model\Worklog $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddWorklog($issueIdOrKey, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Deletes a worklog from an issue.
     *
     * Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  *Delete all worklogs*[ project permission](https://confluence.atlassian.com/x/yodKLg) to delete any worklog or *Delete own worklogs* to delete worklogs created by the user,
     *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param string $id              the ID of the worklog
     * @param array  $queryParameters {
     *
     *     @var bool $notifyUsers whether users watching the issue are notified by email
     *     @var string $adjustEstimate Defines how to update the issue's time estimate, the options are:
     *
     *  `new` Sets the estimate to a specific value, defined in `newEstimate`.
     *  `leave` Leaves the estimate unchanged.
     *  `manual` Increases the estimate by amount specified in `increaseBy`.
     *  `auto` Reduces the estimate by the value of `timeSpent` in the worklog.
     *     @var string $newEstimate The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `new`.
     *     @var string $increaseBy The amount to increase the issue's remaining estimate by, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `manual`.
     *     @var bool $overrideEditableFlag Whether the work log entry should be added to the issue even if the issue is not editable, because jira.issue.editable set to false or missing. For example, the issue is closed. Connect and Forge app users with admin permission can use this flag.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteWorklogBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteWorklogUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteWorklogNotFoundException
     */
    public function deleteWorklog(string $issueIdOrKey, string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteWorklog($issueIdOrKey, $id, $queryParameters), $fetch);
    }

    /**
     * Returns a worklog.
     *
     * Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param string $issueIdOrKey    the ID or key of the issue
     * @param string $id              the ID of the worklog
     * @param array  $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about work logs in the response. This parameter accepts
     *
     * `properties`, which returns worklog properties.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Worklog|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorklogUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetWorklogNotFoundException
     */
    public function getWorklog(string $issueIdOrKey, string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetWorklog($issueIdOrKey, $id, $queryParameters), $fetch);
    }

    /**
     * Updates a worklog.
     *
     * Time tracking must be enabled in Jira, otherwise this operation returns an error. For more information, see [Configuring time tracking](https://confluence.atlassian.com/x/qoXKM).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  *Edit all worklogs*[ project permission](https://confluence.atlassian.com/x/yodKLg) to update any worklog or *Edit own worklogs* to update worklogs created by the user.
     *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param string                     $issueIdOrKey    the ID or key the issue
     * @param string                     $id              the ID of the worklog
     * @param \JiraSdk\Api\Model\Worklog $requestBody
     * @param array                      $queryParameters {
     *
     *     @var bool $notifyUsers whether users watching the issue are notified by email
     *     @var string $adjustEstimate Defines how to update the issue's time estimate, the options are:
     *
     *  `new` Sets the estimate to a specific value, defined in `newEstimate`.
     *  `leave` Leaves the estimate unchanged.
     *  `auto` Updates the estimate by the difference between the original and updated value of `timeSpent` or `timeSpentSeconds`.
     *     @var string $newEstimate The value to set as the issue's remaining time estimate, as days (\#d), hours (\#h), or minutes (\#m or \#). For example, *2d*. Required when `adjustEstimate` is `new`.
     *     @var string $expand Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts `properties`, which returns worklog properties.
     *     @var bool $overrideEditableFlag Whether the worklog should be added to the issue even if the issue is not editable. For example, because the issue is closed. Connect and Forge app users with *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) can use this flag.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Worklog|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateWorklogBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateWorklogUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateWorklogNotFoundException
     */
    public function updateWorklog(string $issueIdOrKey, string $id, Model\Worklog $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateWorklog($issueIdOrKey, $id, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns the keys of all properties for a worklog.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $worklogId    the ID of the worklog
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorklogPropertyKeysBadRequestException
     * @throws \JiraSdk\Api\Exception\GetWorklogPropertyKeysUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetWorklogPropertyKeysNotFoundException
     */
    public function getWorklogPropertyKeys(string $issueIdOrKey, string $worklogId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetWorklogPropertyKeys($issueIdOrKey, $worklogId), $fetch);
    }

    /**
     * Deletes a worklog property.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $worklogId    the ID of the worklog
     * @param string $propertyKey  the key of the property
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteWorklogPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteWorklogPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteWorklogPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteWorklogPropertyNotFoundException
     */
    public function deleteWorklogProperty(string $issueIdOrKey, string $worklogId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteWorklogProperty($issueIdOrKey, $worklogId, $propertyKey), $fetch);
    }

    /**
     * Returns the value of a worklog property.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $worklogId    the ID of the worklog
     * @param string $propertyKey  the key of the property
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\EntityProperty|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorklogPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\GetWorklogPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetWorklogPropertyNotFoundException
     */
    public function getWorklogProperty(string $issueIdOrKey, string $worklogId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetWorklogProperty($issueIdOrKey, $worklogId, $propertyKey), $fetch);
    }

    /**
     * Sets the value of a worklog property. Use this operation to store custom data against the worklog.
     *
     * The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  *Edit all worklogs*[ project permission](https://confluence.atlassian.com/x/yodKLg) to update any worklog or *Edit own worklogs* to update worklogs created by the user.
     *  If the worklog has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param string $issueIdOrKey the ID or key of the issue
     * @param string $worklogId    the ID of the worklog
     * @param string $propertyKey  The key of the issue property. The maximum length is 255 characters.
     * @param mixed  $requestBody
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetWorklogPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\SetWorklogPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetWorklogPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\SetWorklogPropertyNotFoundException
     */
    public function setWorklogProperty(string $issueIdOrKey, string $worklogId, string $propertyKey, $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetWorklogProperty($issueIdOrKey, $worklogId, $propertyKey, $requestBody), $fetch);
    }

    /**
     * Creates a link between two issues. Use this operation to indicate a relationship between two issues and optionally add a comment to the from (outward) issue. To use this resource the site must have [Issue Linking](https://confluence.atlassian.com/x/yoXKM) enabled.
     *
     * This resource returns nothing on the creation of an issue link. To obtain the ID of the issue link, use `https://your-domain.atlassian.net/rest/api/3/issue/[linked issue key]?fields=issuelinks`.
     *
     * If the link request duplicates a link, the response indicates that the issue link was created. If the request included a comment, the comment is added.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse project* [project permission](https://confluence.atlassian.com/x/yodKLg) for all the projects containing the issues to be linked,
     *  *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) on the project containing the from (outward) issue,
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *  If the comment has visibility restrictions, belongs to the group or has the role visibility is restricted to.
     *
     * @param \JiraSdk\Api\Model\LinkIssueRequestJsonBean $requestBody
     * @param string                                      $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\LinkIssuesBadRequestException
     * @throws \JiraSdk\Api\Exception\LinkIssuesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\LinkIssuesNotFoundException
     */
    public function linkIssues(Model\LinkIssueRequestJsonBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\LinkIssues($requestBody), $fetch);
    }

    /**
     * Deletes an issue link.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  Browse project [project permission](https://confluence.atlassian.com/x/yodKLg) for all the projects containing the issues in the link.
     *  *Link issues* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one of the projects containing issues in the link.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, permission to view both of the issues.
     *
     * @param string $linkId the ID of the issue link
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteIssueLinkBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteIssueLinkUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteIssueLinkNotFoundException
     */
    public function deleteIssueLink(string $linkId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteIssueLink($linkId), $fetch);
    }

    /**
     * Returns an issue link.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Browse project* [project permission](https://confluence.atlassian.com/x/yodKLg) for all the projects containing the linked issues.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, permission to view both of the issues.
     *
     * @param string $linkId the ID of the issue link
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueLink|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueLinkBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueLinkUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueLinkNotFoundException
     */
    public function getIssueLink(string $linkId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueLink($linkId), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueLinkTypes|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueLinkTypesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueLinkTypesNotFoundException
     */
    public function getIssueLinkTypes(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueLinkTypes(), $fetch);
    }

    /**
     * Creates an issue link type. Use this operation to create descriptions of the reasons why issues are linked. The issue link type consists of a name and descriptions for a link's inward and outward relationships.
     *
     * To use this operation, the site must have [issue linking](https://confluence.atlassian.com/x/yoXKM) enabled.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\IssueLinkType $requestBody
     * @param string                           $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueLinkType|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateIssueLinkTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateIssueLinkTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateIssueLinkTypeNotFoundException
     */
    public function createIssueLinkType(Model\IssueLinkType $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateIssueLinkType($requestBody), $fetch);
    }

    /**
     * Deletes an issue link type.
     *
     * To use this operation, the site must have [issue linking](https://confluence.atlassian.com/x/yoXKM) enabled.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueLinkTypeId the ID of the issue link type
     * @param string $fetch           Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteIssueLinkTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteIssueLinkTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteIssueLinkTypeNotFoundException
     */
    public function deleteIssueLinkType(string $issueLinkTypeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteIssueLinkType($issueLinkTypeId), $fetch);
    }

    /**
     * Returns an issue link type.
     *
     * To use this operation, the site must have [issue linking](https://confluence.atlassian.com/x/yoXKM) enabled.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for a project in the site.
     *
     * @param string $issueLinkTypeId the ID of the issue link type
     * @param string $fetch           Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueLinkType|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueLinkTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueLinkTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueLinkTypeNotFoundException
     */
    public function getIssueLinkType(string $issueLinkTypeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueLinkType($issueLinkTypeId), $fetch);
    }

    /**
     * Updates an issue link type.
     *
     * To use this operation, the site must have [issue linking](https://confluence.atlassian.com/x/yoXKM) enabled.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                           $issueLinkTypeId the ID of the issue link type
     * @param \JiraSdk\Api\Model\IssueLinkType $requestBody
     * @param string                           $fetch           Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueLinkType|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateIssueLinkTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateIssueLinkTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateIssueLinkTypeNotFoundException
     */
    public function updateIssueLinkType(string $issueLinkTypeId, Model\IssueLinkType $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateIssueLinkType($issueLinkTypeId, $requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\SecuritySchemes|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueSecuritySchemesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueSecuritySchemesForbiddenException
     */
    public function getIssueSecuritySchemes(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueSecuritySchemes(), $fetch);
    }

    /**
     * Returns an issue security scheme along with its security levels.
     **[Permissions](#permissions) required:**
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for a project that uses the requested issue security scheme.
     *
     * @param int    $id    The ID of the issue security scheme. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) operation to get a list of issue security scheme IDs.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\SecurityScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueSecuritySchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueSecuritySchemeForbiddenException
     */
    public function getIssueSecurityScheme(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueSecurityScheme($id), $fetch);
    }

    /**
     * Returns issue security level members.
     *
     * Only issue security level members in context of classic projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $issueSecuritySchemeId The ID of the issue security scheme. Use the [Get issue security schemes](#api-rest-api-3-issuesecurityschemes-get) operation to get a list of issue security scheme IDs.
     * @param array $queryParameters       {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $issueSecurityLevelId The list of issue security level IDs. To include multiple issue security levels separate IDs with ampersand: `issueSecurityLevelId=10000&issueSecurityLevelId=10001`.
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanIssueSecurityLevelMember|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueSecurityLevelMembersBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueSecurityLevelMembersUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueSecurityLevelMembersForbiddenException
     * @throws \JiraSdk\Api\Exception\GetIssueSecurityLevelMembersNotFoundException
     */
    public function getIssueSecurityLevelMembers(int $issueSecuritySchemeId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueSecurityLevelMembers($issueSecuritySchemeId, $queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueTypeDetails[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueAllTypesUnauthorizedException
     */
    public function getIssueAllTypes(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueAllTypes(), $fetch);
    }

    /**
     * Creates an issue type and adds it to the default issue type scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\IssueTypeCreateBean $requestBody
     * @param string                                 $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueTypeDetails|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeConflictException
     */
    public function createIssueType(Model\IssueTypeCreateBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateIssueType($requestBody), $fetch);
    }

    /**
     * Returns issue types for a project.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) in the relevant project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $projectId the ID of the project
     *     @var int $level The level of the issue type to filter by. Use:
     *
     *  `-1` for Subtask.
     *  `0` for Base.
     *  `1` for Epic.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueTypeDetails[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueTypesForProjectBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueTypesForProjectUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueTypesForProjectNotFoundException
     */
    public function getIssueTypesForProject(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueTypesForProject($queryParameters), $fetch);
    }

    /**
     * Deletes the issue type. If the issue type is in use, all uses are updated with the alternative issue type (`alternativeIssueTypeId`). A list of alternative issue types are obtained from the [Get alternative issue types](#api-rest-api-3-issuetype-id-alternatives-get) resource.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id              the ID of the issue type
     * @param array  $queryParameters {
     *
     *     @var string $alternativeIssueTypeId The ID of the replacement issue type.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeNotFoundException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeConflictException
     */
    public function deleteIssueType(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteIssueType($id, $queryParameters), $fetch);
    }

    /**
     * Returns an issue type.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) in a project the issue type is associated with or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id    the ID of the issue type
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueTypeDetails|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeNotFoundException
     */
    public function getIssueType(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueType($id), $fetch);
    }

    /**
     * Updates the issue type.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                 $id          the ID of the issue type
     * @param \JiraSdk\Api\Model\IssueTypeUpdateBean $requestBody
     * @param string                                 $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueTypeDetails|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeNotFoundException
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeConflictException
     */
    public function updateIssueType(string $id, Model\IssueTypeUpdateBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateIssueType($id, $requestBody), $fetch);
    }

    /**
     * Returns a list of issue types that can be used to replace the issue type. The alternative issue types are those assigned to the same workflow scheme, field configuration scheme, and screen scheme.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param string $id    the ID of the issue type
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueTypeDetails[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAlternativeIssueTypesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAlternativeIssueTypesNotFoundException
     */
    public function getAlternativeIssueTypes(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAlternativeIssueTypes($id), $fetch);
    }

    /**
     * Loads an avatar for the issue type.
     *
     * Specify the avatar's local file location in the body of the request. Also, include the following headers:
     *
     *  `X-Atlassian-Token: no-check` To prevent XSRF protection blocking the request, for more information see [Special Headers](#special-request-headers).
     *  `Content-Type: image/image type` Valid image types are JPEG, GIF, or PNG.
     *
     * For example:
     * `curl --request POST \ --user email@example.com:<api_token> \ --header 'X-Atlassian-Token: no-check' \ --header 'Content-Type: image/< image_type>' \ --data-binary "<@/path/to/file/with/your/avatar>" \ --url 'https://your-domain.atlassian.net/rest/api/3/issuetype/{issueTypeId}'This`
     *
     * The avatar is cropped to a square. If no crop parameters are specified, the square originates at the top left of the image. The length of the square's sides is set to the smaller of the height or width of the image.
     *
     * The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size.
     *
     * After creating the avatar, use [ Update issue type](#api-rest-api-3-issuetype-id-put) to set it as the issue type's displayed avatar.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id              the ID of the issue type
     * @param mixed  $requestBody
     * @param array  $queryParameters {
     *
     *     @var int $x the X coordinate of the top-left corner of the crop region
     *     @var int $y the Y coordinate of the top-left corner of the crop region
     *     @var int $size The length of each side of the crop region.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Avatar|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeAvatarBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeAvatarUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeAvatarForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeAvatarNotFoundException
     */
    public function createIssueTypeAvatar(string $id, $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateIssueTypeAvatar($id, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns all the [issue type property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties) keys of the issue type.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) to get the property keys of any issue type.
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) to get the property keys of any issue types associated with the projects the user has permission to browse.
     *
     * @param string $issueTypeId the ID of the issue type
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueTypePropertyKeysBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueTypePropertyKeysNotFoundException
     */
    public function getIssueTypePropertyKeys(string $issueTypeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueTypePropertyKeys($issueTypeId), $fetch);
    }

    /**
     * Deletes the [issue type property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueTypeId the ID of the issue type
     * @param string $propertyKey The key of the property. Use [Get issue type property keys](#api-rest-api-3-issuetype-issueTypeId-properties-get) to get a list of all issue type property keys.
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypePropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypePropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypePropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypePropertyNotFoundException
     */
    public function deleteIssueTypeProperty(string $issueTypeId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteIssueTypeProperty($issueTypeId, $propertyKey), $fetch);
    }

    /**
     * Returns the key and value of the [issue type property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) to get the details of any issue type.
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) to get the details of any issue types associated with the projects the user has permission to browse.
     *
     * @param string $issueTypeId the ID of the issue type
     * @param string $propertyKey The key of the property. Use [Get issue type property keys](#api-rest-api-3-issuetype-issueTypeId-properties-get) to get a list of all issue type property keys.
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\EntityProperty|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueTypePropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueTypePropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueTypePropertyNotFoundException
     */
    public function getIssueTypeProperty(string $issueTypeId, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueTypeProperty($issueTypeId, $propertyKey), $fetch);
    }

    /**
     * Creates or updates the value of the [issue type property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties). Use this resource to store and update data against an issue type.
     *
     * The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueTypeId the ID of the issue type
     * @param string $propertyKey The key of the issue type property. The maximum length is 255 characters.
     * @param mixed  $requestBody
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetIssueTypePropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\SetIssueTypePropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetIssueTypePropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\SetIssueTypePropertyNotFoundException
     */
    public function setIssueTypeProperty(string $issueTypeId, string $propertyKey, $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetIssueTypeProperty($issueTypeId, $propertyKey, $requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of issue type schemes.
     *
     * Only issue type schemes used in classic projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $id The list of issue type schemes IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *
     *  `name` Sorts by issue type scheme name.
     *  `id` Sorts by issue type scheme ID.
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `projects` For each issue type schemes, returns information about the projects the issue type scheme is assigned to.
     *  `issueTypes` For each issue type schemes, returns information about the issueTypes the issue type scheme have.
     *     @var string $queryString String used to perform a case-insensitive partial match with issue type scheme name.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanIssueTypeScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllIssueTypeSchemesBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAllIssueTypeSchemesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllIssueTypeSchemesForbiddenException
     */
    public function getAllIssueTypeSchemes(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllIssueTypeSchemes($queryParameters), $fetch);
    }

    /**
     * Creates an issue type scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\IssueTypeSchemeDetails $requestBody
     * @param string                                    $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueTypeSchemeID|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeSchemeConflictException
     */
    public function createIssueTypeScheme(Model\IssueTypeSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateIssueTypeScheme($requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of issue type scheme items.
     *
     * Only issue type scheme items used in classic projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $issueTypeSchemeId The list of issue type scheme IDs. To include multiple IDs, provide an ampersand-separated list. For example, `issueTypeSchemeId=10000&issueTypeSchemeId=10001`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanIssueTypeSchemeMapping|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueTypeSchemesMappingBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeSchemesMappingUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeSchemesMappingForbiddenException
     */
    public function getIssueTypeSchemesMapping(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueTypeSchemesMapping($queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of issue type schemes and, for each issue type scheme, a list of the projects that use it.
     *
     * Only issue type schemes used in classic projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $projectId The list of project IDs. To include multiple project IDs, provide an ampersand-separated list. For example, `projectId=10000&projectId=10001`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanIssueTypeSchemeProjects|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueTypeSchemeForProjectsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeSchemeForProjectsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeSchemeForProjectsForbiddenException
     */
    public function getIssueTypeSchemeForProjects(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueTypeSchemeForProjects($queryParameters), $fetch);
    }

    /**
     * Assigns an issue type scheme to a project.
     *
     * If any issues in the project are assigned issue types not present in the new scheme, the operation will fail. To complete the assignment those issues must be updated to use issue types in the new scheme.
     *
     * Issue type schemes can only be assigned to classic projects.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\IssueTypeSchemeProjectAssociation $requestBody
     * @param string                                               $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AssignIssueTypeSchemeToProjectBadRequestException
     * @throws \JiraSdk\Api\Exception\AssignIssueTypeSchemeToProjectUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AssignIssueTypeSchemeToProjectForbiddenException
     * @throws \JiraSdk\Api\Exception\AssignIssueTypeSchemeToProjectNotFoundException
     */
    public function assignIssueTypeSchemeToProject(Model\IssueTypeSchemeProjectAssociation $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AssignIssueTypeSchemeToProject($requestBody), $fetch);
    }

    /**
     * Deletes an issue type scheme.
     *
     * Only issue type schemes used in classic projects can be deleted.
     *
     * Any projects assigned to the scheme are reassigned to the default issue type scheme.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $issueTypeSchemeId the ID of the issue type scheme
     * @param string $fetch             Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeSchemeNotFoundException
     */
    public function deleteIssueTypeScheme(int $issueTypeSchemeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteIssueTypeScheme($issueTypeSchemeId), $fetch);
    }

    /**
     * Updates an issue type scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                             $issueTypeSchemeId the ID of the issue type scheme
     * @param \JiraSdk\Api\Model\IssueTypeSchemeUpdateDetails $requestBody
     * @param string                                          $fetch             Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeSchemeNotFoundException
     */
    public function updateIssueTypeScheme(int $issueTypeSchemeId, Model\IssueTypeSchemeUpdateDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateIssueTypeScheme($issueTypeSchemeId, $requestBody), $fetch);
    }

    /**
     * Adds issue types to an issue type scheme.
     *
     * The added issue types are appended to the issue types list.
     *
     * If any of the issue types exist in the issue type scheme, the operation fails and no issue types are added.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                             $issueTypeSchemeId the ID of the issue type scheme
     * @param \JiraSdk\Api\Model\IssueTypeIds $requestBody
     * @param string                          $fetch             Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddIssueTypesToIssueTypeSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\AddIssueTypesToIssueTypeSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddIssueTypesToIssueTypeSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\AddIssueTypesToIssueTypeSchemeNotFoundException
     */
    public function addIssueTypesToIssueTypeScheme(int $issueTypeSchemeId, Model\IssueTypeIds $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddIssueTypesToIssueTypeScheme($issueTypeSchemeId, $requestBody), $fetch);
    }

    /**
     * Changes the order of issue types in an issue type scheme.
     *
     * The request body parameters must meet the following requirements:
     *
     *  all of the issue types must belong to the issue type scheme.
     *  either `after` or `position` must be provided.
     *  the issue type in `after` must not be in the issue type list.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                  $issueTypeSchemeId the ID of the issue type scheme
     * @param \JiraSdk\Api\Model\OrderOfIssueTypes $requestBody
     * @param string                               $fetch             Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\ReorderIssueTypesInIssueTypeSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\ReorderIssueTypesInIssueTypeSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\ReorderIssueTypesInIssueTypeSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\ReorderIssueTypesInIssueTypeSchemeNotFoundException
     */
    public function reorderIssueTypesInIssueTypeScheme(int $issueTypeSchemeId, Model\OrderOfIssueTypes $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\ReorderIssueTypesInIssueTypeScheme($issueTypeSchemeId, $requestBody), $fetch);
    }

    /**
     * Removes an issue type from an issue type scheme.
     *
     * This operation cannot remove:
     *
     *  any issue type used by issues.
     *  any issue types from the default issue type scheme.
     *  the last standard issue type from an issue type scheme.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $issueTypeSchemeId the ID of the issue type scheme
     * @param int    $issueTypeId       the ID of the issue type
     * @param string $fetch             Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypeFromIssueTypeSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypeFromIssueTypeSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypeFromIssueTypeSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveIssueTypeFromIssueTypeSchemeNotFoundException
     */
    public function removeIssueTypeFromIssueTypeScheme(int $issueTypeSchemeId, int $issueTypeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveIssueTypeFromIssueTypeScheme($issueTypeSchemeId, $issueTypeId), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of issue type screen schemes.
     *
     * Only issue type screen schemes used in classic projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $id The list of issue type screen scheme IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
     *     @var string $queryString string used to perform a case-insensitive partial match with issue type screen scheme name
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *
     *  `name` Sorts by issue type screen scheme name.
     *  `id` Sorts by issue type screen scheme ID.
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts `projects` that, for each issue type screen schemes, returns information about the projects the issue type screen scheme is assigned to.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanIssueTypeScreenScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueTypeScreenSchemesBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeScreenSchemesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeScreenSchemesForbiddenException
     */
    public function getIssueTypeScreenSchemes(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueTypeScreenSchemes($queryParameters), $fetch);
    }

    /**
     * Creates an issue type screen scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\IssueTypeScreenSchemeDetails $requestBody
     * @param string                                          $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueTypeScreenSchemeId|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeScreenSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeScreenSchemeNotFoundException
     * @throws \JiraSdk\Api\Exception\CreateIssueTypeScreenSchemeConflictException
     */
    public function createIssueTypeScreenScheme(Model\IssueTypeScreenSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateIssueTypeScreenScheme($requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of issue type screen scheme items.
     *
     * Only issue type screen schemes used in classic projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $issueTypeScreenSchemeId The list of issue type screen scheme IDs. To include multiple issue type screen schemes, separate IDs with ampersand: `issueTypeScreenSchemeId=10000&issueTypeScreenSchemeId=10001`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanIssueTypeScreenSchemeItem|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueTypeScreenSchemeMappingsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeScreenSchemeMappingsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeScreenSchemeMappingsForbiddenException
     */
    public function getIssueTypeScreenSchemeMappings(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueTypeScreenSchemeMappings($queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of issue type screen schemes and, for each issue type screen scheme, a list of the projects that use it.
     *
     * Only issue type screen schemes used in classic projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $projectId The list of project IDs. To include multiple projects, separate IDs with ampersand: `projectId=10000&projectId=10001`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanIssueTypeScreenSchemesProjects|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueTypeScreenSchemeProjectAssociationsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeScreenSchemeProjectAssociationsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueTypeScreenSchemeProjectAssociationsForbiddenException
     */
    public function getIssueTypeScreenSchemeProjectAssociations(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueTypeScreenSchemeProjectAssociations($queryParameters), $fetch);
    }

    /**
     * Assigns an issue type screen scheme to a project.
     *
     * Issue type screen schemes can only be assigned to classic projects.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\IssueTypeScreenSchemeProjectAssociation $requestBody
     * @param string                                                     $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AssignIssueTypeScreenSchemeToProjectBadRequestException
     * @throws \JiraSdk\Api\Exception\AssignIssueTypeScreenSchemeToProjectUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AssignIssueTypeScreenSchemeToProjectForbiddenException
     * @throws \JiraSdk\Api\Exception\AssignIssueTypeScreenSchemeToProjectNotFoundException
     */
    public function assignIssueTypeScreenSchemeToProject(Model\IssueTypeScreenSchemeProjectAssociation $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AssignIssueTypeScreenSchemeToProject($requestBody), $fetch);
    }

    /**
     * Deletes an issue type screen scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $issueTypeScreenSchemeId the ID of the issue type screen scheme
     * @param string $fetch                   Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeScreenSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteIssueTypeScreenSchemeNotFoundException
     */
    public function deleteIssueTypeScreenScheme(string $issueTypeScreenSchemeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteIssueTypeScreenScheme($issueTypeScreenSchemeId), $fetch);
    }

    /**
     * Updates an issue type screen scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                                $issueTypeScreenSchemeId the ID of the issue type screen scheme
     * @param \JiraSdk\Api\Model\IssueTypeScreenSchemeUpdateDetails $requestBody
     * @param string                                                $fetch                   Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeScreenSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateIssueTypeScreenSchemeNotFoundException
     */
    public function updateIssueTypeScreenScheme(string $issueTypeScreenSchemeId, Model\IssueTypeScreenSchemeUpdateDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateIssueTypeScreenScheme($issueTypeScreenSchemeId, $requestBody), $fetch);
    }

    /**
     * Appends issue type to screen scheme mappings to an issue type screen scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                                 $issueTypeScreenSchemeId the ID of the issue type screen scheme
     * @param \JiraSdk\Api\Model\IssueTypeScreenSchemeMappingDetails $requestBody
     * @param string                                                 $fetch                   Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeNotFoundException
     * @throws \JiraSdk\Api\Exception\AppendMappingsForIssueTypeScreenSchemeConflictException
     */
    public function appendMappingsForIssueTypeScreenScheme(string $issueTypeScreenSchemeId, Model\IssueTypeScreenSchemeMappingDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AppendMappingsForIssueTypeScreenScheme($issueTypeScreenSchemeId, $requestBody), $fetch);
    }

    /**
     * Updates the default screen scheme of an issue type screen scheme. The default screen scheme is used for all unmapped issue types.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                       $issueTypeScreenSchemeId the ID of the issue type screen scheme
     * @param \JiraSdk\Api\Model\UpdateDefaultScreenScheme $requestBody
     * @param string                                       $fetch                   Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateDefaultScreenSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateDefaultScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateDefaultScreenSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateDefaultScreenSchemeNotFoundException
     */
    public function updateDefaultScreenScheme(string $issueTypeScreenSchemeId, Model\UpdateDefaultScreenScheme $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateDefaultScreenScheme($issueTypeScreenSchemeId, $requestBody), $fetch);
    }

    /**
     * Removes issue type to screen scheme mappings from an issue type screen scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                          $issueTypeScreenSchemeId the ID of the issue type screen scheme
     * @param \JiraSdk\Api\Model\IssueTypeIds $requestBody
     * @param string                          $fetch                   Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveMappingsFromIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveMappingsFromIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveMappingsFromIssueTypeScreenSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveMappingsFromIssueTypeScreenSchemeNotFoundException
     */
    public function removeMappingsFromIssueTypeScreenScheme(string $issueTypeScreenSchemeId, Model\IssueTypeIds $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveMappingsFromIssueTypeScreenScheme($issueTypeScreenSchemeId, $requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of projects associated with an issue type screen scheme.
     *
     * Only company-managed projects associated with an issue type screen scheme are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $issueTypeScreenSchemeId the ID of the issue type screen scheme
     * @param array $queryParameters         {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var string $query
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanProjectDetails|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectsForIssueTypeScreenSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\GetProjectsForIssueTypeScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectsForIssueTypeScreenSchemeForbiddenException
     */
    public function getProjectsForIssueTypeScreenScheme(int $issueTypeScreenSchemeId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectsForIssueTypeScreenScheme($issueTypeScreenSchemeId, $queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\JQLReferenceData|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAutoCompleteUnauthorizedException
     */
    public function getAutoComplete(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAutoComplete(), $fetch);
    }

    /**
     * Returns reference data for JQL searches. This is a downloadable version of the documentation provided in [Advanced searching - fields reference](https://confluence.atlassian.com/x/gwORLQ) and [Advanced searching - functions reference](https://confluence.atlassian.com/x/hgORLQ), along with a list of JQL-reserved words. Use this information to assist with the programmatic creation of JQL queries or the validation of queries built in a custom query builder.
     *
     * This operation can filter the custom fields returned by project. Invalid project IDs in `projectIds` are ignored. System fields are always returned.
     *
     * It can also return the collapsed field for custom fields. Collapsed fields enable searches to be performed across all fields with the same name and of the same field type. For example, the collapsed field `Component - Component[Dropdown]` enables dropdown fields `Component - cf[10061]` and `Component - cf[10062]` to be searched simultaneously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param \JiraSdk\Api\Model\SearchAutoCompleteFilter $requestBody
     * @param string                                      $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\JQLReferenceData|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAutoCompletePostBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAutoCompletePostUnauthorizedException
     */
    public function getAutoCompletePost(Model\SearchAutoCompleteFilter $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAutoCompletePost($requestBody), $fetch);
    }

    /**
     * Returns the JQL search auto complete suggestions for a field.
     *
     * Suggestions can be obtained by providing:
     *
     *  `fieldName` to get a list of all values for the field.
     *  `fieldName` and `fieldValue` to get a list of values containing the text in `fieldValue`.
     *  `fieldName` and `predicateName` to get a list of all predicate values for the field.
     *  `fieldName`, `predicateName`, and `predicateValue` to get a list of predicate values containing the text in `predicateValue`.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *
     *     @var string $fieldName the name of the field
     *     @var string $fieldValue the partial field item name entered by the user
     *     @var string $predicateName The name of the [ CHANGED operator predicate](https://confluence.atlassian.com/x/hQORLQ#Advancedsearching-operatorsreference-CHANGEDCHANGED) for which the suggestions are generated. The valid predicate operators are *by*, *from*, and *to*.
     *     @var string $predicateValue The partial predicate item name entered by the user.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\AutoCompleteSuggestions|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetFieldAutoCompleteForQueryStringBadRequestException
     * @throws \JiraSdk\Api\Exception\GetFieldAutoCompleteForQueryStringUnauthorizedException
     */
    public function getFieldAutoCompleteForQueryString(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetFieldAutoCompleteForQueryString($queryParameters), $fetch);
    }

    /**
     * Checks whether one or more issues would be returned by one or more JQL queries.
     **[Permissions](#permissions) required:** None, however, issues are only matched against JQL queries where the user has:
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that the issue is in.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param \JiraSdk\Api\Model\IssuesAndJQLQueries $requestBody
     * @param string                                 $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueMatches|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\MatchIssuesBadRequestException
     */
    public function matchIssues(Model\IssuesAndJQLQueries $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\MatchIssues($requestBody), $fetch);
    }

    /**
     * Parses and validates JQL queries.
     *
     * Validation is performed in context of the current user.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param \JiraSdk\Api\Model\JqlQueriesToParse $requestBody
     * @param array                                $queryParameters {
     *
     *     @var string $validation How to validate the JQL query and treat the validation results. Validation options include:
     *
     *  `strict` Returns all errors. If validation fails, the query structure is not returned.
     *  `warn` Returns all errors. If validation fails but the JQL query is correctly formed, the query structure is returned.
     *  `none` No validation is performed. If JQL query is correctly formed, the query structure is returned.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ParsedJqlQueries|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\ParseJqlQueriesBadRequestException
     * @throws \JiraSdk\Api\Exception\ParseJqlQueriesUnauthorizedException
     */
    public function parseJqlQueries(Model\JqlQueriesToParse $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\ParseJqlQueries($requestBody, $queryParameters), $fetch);
    }

    /**
     * Converts one or more JQL queries with user identifiers (username or user key) to equivalent JQL queries with account IDs.
     *
     * You may wish to use this operation if your system stores JQL queries and you want to make them GDPR-compliant. For more information about GDPR-related changes, see the [migration guide](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/).
     *
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param \JiraSdk\Api\Model\JQLPersonalDataMigrationRequest $requestBody
     * @param string                                             $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ConvertedJQLQueries|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\MigrateQueriesBadRequestException
     * @throws \JiraSdk\Api\Exception\MigrateQueriesUnauthorizedException
     */
    public function migrateQueries(Model\JQLPersonalDataMigrationRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\MigrateQueries($requestBody), $fetch);
    }

    /**
     * Sanitizes one or more JQL queries by converting readable details into IDs where a user doesn't have permission to view the entity.
     *
     * For example, if the query contains the clause *project = 'Secret project'*, and a user does not have browse permission for the project "Secret project", the sanitized query replaces the clause with *project = 12345"* (where 12345 is the ID of the project). If a user has the required permission, the clause is not sanitized. If the account ID is null, sanitizing is performed for an anonymous user.
     *
     * Note that sanitization doesn't make the queries GDPR-compliant, because it doesn't remove user identifiers (username or user key). If you need to make queries GDPR-compliant, use [Convert user identifiers to account IDs in JQL queries](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-jql/#api-rest-api-3-jql-sanitize-post).
     *
     * Before sanitization each JQL query is parsed. The queries are returned in the same order that they were passed.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\JqlQueriesToSanitize $requestBody
     * @param string                                  $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\SanitizedJqlQueries|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SanitiseJqlQueriesBadRequestException
     * @throws \JiraSdk\Api\Exception\SanitiseJqlQueriesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SanitiseJqlQueriesForbiddenException
     */
    public function sanitiseJqlQueries(Model\JqlQueriesToSanitize $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SanitiseJqlQueries($requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of labels.
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanString|\Psr\Http\Message\ResponseInterface|null
     */
    public function getAllLabels(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllLabels($queryParameters), $fetch);
    }

    /**
     * Returns a list of permissions indicating which permissions the user has. Details of the user's permissions can be obtained in a global, project, issue or comment context.
     *
     * The user is reported as having a project permission:
     *
     *  in the global context, if the user has the project permission in any project.
     *  for a project, where the project permission is determined using issue data, if the user meets the permission's criteria for any issue in the project. Otherwise, if the user has the project permission in the project.
     *  for an issue, where a project permission is determined using issue data, if the user has the permission in the issue. Otherwise, if the user has the project permission in the project containing the issue.
     *  for a comment, where the user has both the permission to browse the comment and the project permission for the comment's parent issue. Only the BROWSE\_PROJECTS permission is supported. If a `commentId` is provided whose `permissions` does not equal BROWSE\_PROJECTS, a 400 error will be returned.
     *
     * This means that users may be shown as having an issue permission (such as EDIT\_ISSUES) in the global context or a project context but may not have the permission for any or all issues. For example, if Reporters have the EDIT\_ISSUES permission a user would be shown as having this permission in the global context or the context of a project, because any user can be a reporter. However, if they are not the user who reported the issue queried they would not have EDIT\_ISSUES permission for that issue.
     *
     * Global permissions are unaffected by context.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *
     *     @var string $projectKey The key of project. Ignored if `projectId` is provided.
     *     @var string $projectId the ID of project
     *     @var string $issueKey The key of the issue. Ignored if `issueId` is provided.
     *     @var string $issueId the ID of the issue
     *     @var string $permissions A list of permission keys. (Required) This parameter accepts a comma-separated list. To get the list of available permissions, use [Get all permissions](#api-rest-api-3-permissions-get).
     *     @var string $projectUuid
     *     @var string $projectConfigurationUuid
     *     @var string $commentId The ID of the comment.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Permissions|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetMyPermissionsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetMyPermissionsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetMyPermissionsNotFoundException
     */
    public function getMyPermissions(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetMyPermissions($queryParameters), $fetch);
    }

    /**
     * Deletes a preference of the user, which restores the default value of system defined settings.
     *
     * Note that these keys are deprecated:
     *
     *  *jira.user.locale* The locale of the user. By default, not set. The user takes the instance locale.
     *  *jira.user.timezone* The time zone of the user. By default, not set. The user takes the instance timezone.
     *
     * Use [ Update a user profile](https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch) from the user management REST API to manage timezone and locale instead.
     *
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *
     *     @var string $key The key of the preference.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemovePreferenceUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemovePreferenceNotFoundException
     */
    public function removePreference(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemovePreference($queryParameters), $fetch);
    }

    /**
     * Returns the value of a preference of the current user.
     *
     * Note that these keys are deprecated:
     *
     *  *jira.user.locale* The locale of the user. By default this is not set and the user takes the locale of the instance.
     *  *jira.user.timezone* The time zone of the user. By default this is not set and the user takes the timezone of the instance.
     *
     * Use [ Update a user profile](https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch) from the user management REST API to manage timezone and locale instead.
     *
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *
     *     @var string $key The key of the preference.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetPreferenceUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetPreferenceNotFoundException
     */
    public function getPreference(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetPreference($queryParameters), $fetch);
    }

    /**
     * Creates a preference for the user or updates a preference's value by sending a plain text string. For example, `false`. An arbitrary preference can be created with the value containing up to 255 characters. In addition, the following keys define system preferences that can be set or created:.
     *
     *  *user.notifications.mimetype* The mime type used in notifications sent to the user. Defaults to `html`.
     *  *user.notify.own.changes* Whether the user gets notified of their own changes. Defaults to `false`.
     *  *user.default.share.private* Whether new [ filters](https://confluence.atlassian.com/x/eQiiLQ) are set to private. Defaults to `true`.
     *  *user.keyboard.shortcuts.disabled* Whether keyboard shortcuts are disabled. Defaults to `false`.
     *  *user.autowatch.disabled* Whether the user automatically watches issues they create or add a comment to. By default, not set: the user takes the instance autowatch setting.
     *
     * Note that these keys are deprecated:
     *
     *  *jira.user.locale* The locale of the user. By default, not set. The user takes the instance locale.
     *  *jira.user.timezone* The time zone of the user. By default, not set. The user takes the instance timezone.
     *
     * Use [ Update a user profile](https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch) from the user management REST API to manage timezone and locale instead.
     *
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *
     *     @var string $key The key of the preference. The maximum length is 255 characters.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetPreferenceUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetPreferenceNotFoundException
     */
    public function setPreference(string $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetPreference($requestBody, $queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteLocaleUnauthorizedException
     */
    public function deleteLocale(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteLocale(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Locale|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetLocaleUnauthorizedException
     */
    public function getLocale(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetLocale(), $fetch);
    }

    /**
     * Deprecated, use [ Update a user profile](https://developer.atlassian.com/cloud/admin/user-management/rest/#api-users-account-id-manage-profile-patch) from the user management REST API instead.
     *
     * Sets the locale of the user. The locale must be one supported by the instance of Jira.
     *
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param \JiraSdk\Api\Model\Locale $requestBody
     * @param string                    $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetLocaleBadRequestException
     * @throws \JiraSdk\Api\Exception\SetLocaleUnauthorizedException
     */
    public function setLocale(Model\Locale $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetLocale($requestBody), $fetch);
    }

    /**
     * Returns details for the current user.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about user in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `groups` Returns all groups, including nested groups, the user belongs to.
     *  `applicationRoles` Returns the application roles the user is assigned to.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\User|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetCurrentUserUnauthorizedException
     */
    public function getCurrentUser(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetCurrentUser($queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of [notification schemes](https://confluence.atlassian.com/x/8YdKLg) ordered by the display name.
     *Note that you should allow for events without recipients to appear in responses.*
     **[Permissions](#permissions) required:** Permission to access Jira, however, the user must have permission to administer at least one project associated with a notification scheme for it to be returned.
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
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
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanNotificationScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetNotificationSchemesBadRequestException
     * @throws \JiraSdk\Api\Exception\GetNotificationSchemesUnauthorizedException
     */
    public function getNotificationSchemes(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetNotificationSchemes($queryParameters), $fetch);
    }

    /**
     * Creates a notification scheme with notifications. You can create up to 1000 notifications per request.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\CreateNotificationSchemeDetails $requestBody
     * @param string                                             $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\NotificationSchemeId|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateNotificationSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateNotificationSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateNotificationSchemeForbiddenException
     */
    public function createNotificationScheme(Model\CreateNotificationSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateNotificationScheme($requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) mapping of project that have notification scheme assigned. You can provide either one or multiple notification scheme IDs or project IDs to filter by. If you don't provide any, this will return a list of all mappings. Note that only company-managed (classic) projects are supported. This is because team-managed projects don't have a concept of a default notification scheme. The mappings are ordered by projectId.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *
     *     @var string $startAt the index of the first item to return in a page of results (page offset)
     *     @var string $maxResults the maximum number of items to return per page
     *     @var array $notificationSchemeId The list of notifications scheme IDs to be filtered out
     *     @var array $projectId The list of project IDs to be filtered out
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanNotificationSchemeAndProjectMappingJsonBean|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetNotificationSchemeToProjectMappingsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetNotificationSchemeToProjectMappingsUnauthorizedException
     */
    public function getNotificationSchemeToProjectMappings(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetNotificationSchemeToProjectMappings($queryParameters), $fetch);
    }

    /**
     * Returns a [notification scheme](https://confluence.atlassian.com/x/8YdKLg), including the list of events and the recipients who will receive notifications for those events.
     **[Permissions](#permissions) required:** Permission to access Jira, however, the user must have permission to administer at least one project associated with the notification scheme.
     *
     * @param int   $id              The ID of the notification scheme. Use [Get notification schemes paginated](#api-rest-api-3-notificationscheme-get) to get a list of notification scheme IDs.
     * @param array $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `all` Returns all expandable information
     *  `field` Returns information about any custom fields assigned to receive an event
     *  `group` Returns information about any groups assigned to receive an event
     *  `notificationSchemeEvents` Returns a list of event associations. This list is returned for all expandable information
     *  `projectRole` Returns information about any project roles assigned to receive an event
     *  `user` Returns information about any users assigned to receive an event
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\NotificationScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetNotificationSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\GetNotificationSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetNotificationSchemeNotFoundException
     */
    public function getNotificationScheme(int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetNotificationScheme($id, $queryParameters), $fetch);
    }

    /**
     * Updates a notification scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                             $id          the ID of the notification scheme
     * @param \JiraSdk\Api\Model\UpdateNotificationSchemeDetails $requestBody
     * @param string                                             $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateNotificationSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateNotificationSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateNotificationSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateNotificationSchemeNotFoundException
     */
    public function updateNotificationScheme(string $id, Model\UpdateNotificationSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateNotificationScheme($id, $requestBody), $fetch);
    }

    /**
     * Adds notifications to a notification scheme. You can add up to 1000 notifications per request.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                     $id          the ID of the notification scheme
     * @param \JiraSdk\Api\Model\AddNotificationsDetails $requestBody
     * @param string                                     $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddNotificationsBadRequestException
     * @throws \JiraSdk\Api\Exception\AddNotificationsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddNotificationsForbiddenException
     * @throws \JiraSdk\Api\Exception\AddNotificationsNotFoundException
     */
    public function addNotifications(string $id, Model\AddNotificationsDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddNotifications($id, $requestBody), $fetch);
    }

    /**
     * Deletes a notification scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $notificationSchemeId the ID of the notification scheme
     * @param string $fetch                Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteNotificationSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteNotificationSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteNotificationSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteNotificationSchemeNotFoundException
     */
    public function deleteNotificationScheme(string $notificationSchemeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteNotificationScheme($notificationSchemeId), $fetch);
    }

    /**
     * Removes a notification from a notification scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $notificationSchemeId the ID of the notification scheme
     * @param string $notificationId       the ID of the notification
     * @param string $fetch                Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveNotificationFromNotificationSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveNotificationFromNotificationSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveNotificationFromNotificationSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveNotificationFromNotificationSchemeNotFoundException
     */
    public function removeNotificationFromNotificationScheme(string $notificationSchemeId, string $notificationId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveNotificationFromNotificationScheme($notificationSchemeId, $notificationId), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Permissions|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllPermissionsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllPermissionsForbiddenException
     */
    public function getAllPermissions(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllPermissions(), $fetch);
    }

    /**
     * Returns:.
     *
     *  for a list of global permissions, the global permissions granted to a user.
     *  for a list of project permissions and lists of projects and issues, for each project permission a list of the projects and issues a user can access or manipulate.
     *
     * If no account ID is provided, the operation returns details for the logged in user.
     *
     * Note that:
     *
     *  Invalid project and issue IDs are ignored.
     *  A maximum of 1000 projects and 1000 issues can be checked.
     *  Null values in `globalPermissions`, `projectPermissions`, `projectPermissions.projects`, and `projectPermissions.issues` are ignored.
     *  Empty strings in `projectPermissions.permissions` are ignored.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) to check the permissions for other users, otherwise none. However, Connect apps can make a call from the app server to the product to obtain permission details for any user, without admin permission. This Connect app ability doesn't apply to calls made using AP.request() in a browser.
     *
     * @param \JiraSdk\Api\Model\BulkPermissionsRequestBean $requestBody
     * @param string                                        $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\BulkPermissionGrants|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetBulkPermissionsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetBulkPermissionsForbiddenException
     */
    public function getBulkPermissions(Model\BulkPermissionsRequestBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetBulkPermissions($requestBody), $fetch);
    }

    /**
     * Returns all the projects where the user is granted a list of project permissions.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param \JiraSdk\Api\Model\PermissionsKeysBean $requestBody
     * @param string                                 $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PermittedProjects|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetPermittedProjectsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetPermittedProjectsUnauthorizedException
     */
    public function getPermittedProjects(Model\PermissionsKeysBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetPermittedProjects($requestBody), $fetch);
    }

    /**
     * Returns all permission schemes.
     *
     * ### About permission schemes and grants ###
     *
     * A permission scheme is a collection of permission grants. A permission grant consists of a `holder` and a `permission`.
     *
     * #### Holder object ####
     *
     * The `holder` object contains information about the user or group being granted the permission. For example, the *Administer projects* permission is granted to a group named *Teams in space administrators*. In this case, the type is `"type": "group"`, and the parameter is the group name, `"parameter": "Teams in space administrators"` and the value is group ID, `"value": "ca85fac0-d974-40ca-a615-7af99c48d24f"`. The `holder` object is defined by the following properties:
     *
     *  `type` Identifies the user or group (see the list of types below).
     *  `parameter` As a group's name can change, use of `value` is recommended. The value of this property depends on the `type`. For example, if the `type` is a group, then you need to specify the group name.
     *  `value` The value of this property depends on the `type`. If the `type` is a group, then you need to specify the group ID. For other `type` it has the same value as `parameter`
     *
     * The following `types` are available. The expected values for `parameter` and `value` are given in parentheses (some types may not have a `parameter` or `value`):
     *
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
     *
     * #### Built-in permissions ####
     *
     * The [built-in Jira permissions](https://confluence.atlassian.com/x/yodKLg) are listed below. Apps can also define custom permissions. See the [project permission](https://developer.atlassian.com/cloud/jira/platform/modules/project-permission/) and [global permission](https://developer.atlassian.com/cloud/jira/platform/modules/global-permission/) module documentation for more information.
     *
     **Project permissions**
     *
     *  `ADMINISTER_PROJECTS`
     *  `BROWSE_PROJECTS`
     *  `MANAGE_SPRINTS_PERMISSION` (Jira Software only)
     *  `SERVICEDESK_AGENT` (Jira Service Desk only)
     *  `VIEW_DEV_TOOLS` (Jira Software only)
     *  `VIEW_READONLY_WORKFLOW`
     *
     **Issue permissions**
     *
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
     *
     **Voters and watchers permissions**
     *
     *  `MANAGE_WATCHERS`
     *  `VIEW_VOTERS_AND_WATCHERS`
     *
     **Comments permissions**
     *
     *  `ADD_COMMENTS`
     *  `DELETE_ALL_COMMENTS`
     *  `DELETE_OWN_COMMENTS`
     *  `EDIT_ALL_COMMENTS`
     *  `EDIT_OWN_COMMENTS`
     *
     **Attachments permissions**
     *
     *  `CREATE_ATTACHMENTS`
     *  `DELETE_ALL_ATTACHMENTS`
     *  `DELETE_OWN_ATTACHMENTS`
     *
     **Time tracking permissions**
     *
     *  `DELETE_ALL_WORKLOGS`
     *  `DELETE_OWN_WORKLOGS`
     *  `EDIT_ALL_WORKLOGS`
     *  `EDIT_OWN_WORKLOGS`
     *  `WORK_ON_ISSUES`
     *
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are included when you specify any value. Expand options include:
     *
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PermissionSchemes|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllPermissionSchemesUnauthorizedException
     */
    public function getAllPermissionSchemes(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllPermissionSchemes($queryParameters), $fetch);
    }

    /**
     * Creates a new permission scheme. You can create a permission scheme with or without defining a set of permission grants.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\PermissionScheme $requestBody
     * @param array                               $queryParameters {
     *
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PermissionScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreatePermissionSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\CreatePermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreatePermissionSchemeForbiddenException
     */
    public function createPermissionScheme(Model\PermissionScheme $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreatePermissionScheme($requestBody, $queryParameters), $fetch);
    }

    /**
     * Deletes a permission scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $schemeId the ID of the permission scheme being deleted
     * @param string $fetch    Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeletePermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeletePermissionSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\DeletePermissionSchemeNotFoundException
     */
    public function deletePermissionScheme(int $schemeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeletePermissionScheme($schemeId), $fetch);
    }

    /**
     * Returns a permission scheme.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param int   $schemeId        the ID of the permission scheme to return
     * @param array $queryParameters {
     *
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are included when you specify any value. Expand options include:
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PermissionScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetPermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetPermissionSchemeNotFoundException
     */
    public function getPermissionScheme(int $schemeId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetPermissionScheme($schemeId, $queryParameters), $fetch);
    }

    /**
     * Updates a permission scheme. Below are some important things to note when using this resource:.
     *
     *  If a permissions list is present in the request, then it is set in the permission scheme, overwriting *all existing* grants.
     *  If you want to update only the name and description, then do not send a permissions list in the request.
     *  Sending an empty list will remove all permission grants from the permission scheme.
     *
     * If you want to add or delete a permission grant instead of updating the whole list, see [Create permission grant](#api-rest-api-3-permissionscheme-schemeId-permission-post) or [Delete permission scheme entity](#api-rest-api-3-permissionscheme-schemeId-permission-permissionId-delete).
     *
     * See [About permission schemes and grants](../api-group-permission-schemes/#about-permission-schemes-and-grants) for more details.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                 $schemeId        the ID of the permission scheme to update
     * @param \JiraSdk\Api\Model\PermissionScheme $requestBody
     * @param array                               $queryParameters {
     *
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:
     *
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PermissionScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdatePermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdatePermissionSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdatePermissionSchemeNotFoundException
     */
    public function updatePermissionScheme(int $schemeId, Model\PermissionScheme $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdatePermissionScheme($schemeId, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns all permission grants for a permission scheme.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param int   $schemeId        the ID of the permission scheme
     * @param array $queryParameters {
     *
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `user` Returns information about the user who is granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `field` Returns information about the custom field granted the permission.
     *  `all` Returns all expandable information.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PermissionGrants|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetPermissionSchemeGrantsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetPermissionSchemeGrantsNotFoundException
     */
    public function getPermissionSchemeGrants(int $schemeId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetPermissionSchemeGrants($schemeId, $queryParameters), $fetch);
    }

    /**
     * Creates a permission grant in a permission scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                $schemeId        the ID of the permission scheme in which to create a new permission grant
     * @param \JiraSdk\Api\Model\PermissionGrant $requestBody
     * @param array                              $queryParameters {
     *
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `user` Returns information about the user who is granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `field` Returns information about the custom field granted the permission.
     *  `all` Returns all expandable information.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PermissionGrant|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreatePermissionGrantBadRequestException
     * @throws \JiraSdk\Api\Exception\CreatePermissionGrantUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreatePermissionGrantForbiddenException
     */
    public function createPermissionGrant(int $schemeId, Model\PermissionGrant $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreatePermissionGrant($schemeId, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Deletes a permission grant from a permission scheme. See [About permission schemes and grants](../api-group-permission-schemes/#about-permission-schemes-and-grants) for more details.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $schemeId     the ID of the permission scheme to delete the permission grant from
     * @param int    $permissionId the ID of the permission grant to delete
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeletePermissionSchemeEntityBadRequestException
     * @throws \JiraSdk\Api\Exception\DeletePermissionSchemeEntityUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeletePermissionSchemeEntityForbiddenException
     */
    public function deletePermissionSchemeEntity(int $schemeId, int $permissionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeletePermissionSchemeEntity($schemeId, $permissionId), $fetch);
    }

    /**
     * Returns a permission grant.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param int   $schemeId        the ID of the permission scheme
     * @param int   $permissionId    the ID of the permission grant
     * @param array $queryParameters {
     *
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PermissionGrant|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetPermissionSchemeGrantUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetPermissionSchemeGrantNotFoundException
     */
    public function getPermissionSchemeGrant(int $schemeId, int $permissionId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetPermissionSchemeGrant($schemeId, $permissionId, $queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Priority[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetPrioritiesUnauthorizedException
     */
    public function getPriorities(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetPriorities(), $fetch);
    }

    /**
     * Creates an issue priority.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\CreatePriorityDetails $requestBody
     * @param string                                   $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PriorityId|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreatePriorityBadRequestException
     * @throws \JiraSdk\Api\Exception\CreatePriorityUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreatePriorityForbiddenException
     */
    public function createPriority(Model\CreatePriorityDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreatePriority($requestBody), $fetch);
    }

    /**
     * Sets default issue priority.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\SetDefaultPriorityRequest $requestBody
     * @param string                                       $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetDefaultPriorityBadRequestException
     * @throws \JiraSdk\Api\Exception\SetDefaultPriorityUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetDefaultPriorityForbiddenException
     * @throws \JiraSdk\Api\Exception\SetDefaultPriorityNotFoundException
     */
    public function setDefaultPriority(Model\SetDefaultPriorityRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetDefaultPriority($requestBody), $fetch);
    }

    /**
     * Changes the order of issue priorities.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\ReorderIssuePriorities $requestBody
     * @param string                                    $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\MovePrioritiesBadRequestException
     * @throws \JiraSdk\Api\Exception\MovePrioritiesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\MovePrioritiesForbiddenException
     * @throws \JiraSdk\Api\Exception\MovePrioritiesNotFoundException
     */
    public function movePriorities(Model\ReorderIssuePriorities $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\MovePriorities($requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of priorities. The list can contain all priorities or a subset determined by any combination of these criteria:
     *  a list of priority IDs. Any invalid priority IDs are ignored.
     *  whether the field configuration is a default. This returns priorities from company-managed (classic) projects only, as there is no concept of default priorities in team-managed projects.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $id The list of priority IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=2&id=3`.
     *     @var bool $onlyDefault Whether only the default priority is returned.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanPriority|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SearchPrioritiesUnauthorizedException
     */
    public function searchPriorities(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SearchPriorities($queryParameters), $fetch);
    }

    /**
     * Deletes an issue priority.
     *
     * This operation is [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id              the ID of the issue priority
     * @param array  $queryParameters {
     *
     *     @var string $replaceWith The ID of the issue priority that will replace the currently selected resolution.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\TaskProgressBeanObject|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeletePriorityBadRequestException
     * @throws \JiraSdk\Api\Exception\DeletePriorityUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeletePriorityForbiddenException
     * @throws \JiraSdk\Api\Exception\DeletePriorityNotFoundException
     * @throws \JiraSdk\Api\Exception\DeletePriorityConflictException
     */
    public function deletePriority(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeletePriority($id, $queryParameters), $fetch);
    }

    /**
     * Returns an issue priority.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param string $id    the ID of the issue priority
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Priority|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetPriorityUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetPriorityNotFoundException
     */
    public function getPriority(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetPriority($id), $fetch);
    }

    /**
     * Updates an issue priority.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                   $id          the ID of the issue priority
     * @param \JiraSdk\Api\Model\UpdatePriorityDetails $requestBody
     * @param string                                   $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdatePriorityBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdatePriorityUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdatePriorityForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdatePriorityNotFoundException
     */
    public function updatePriority(string $id, Model\UpdatePriorityDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdatePriority($id, $requestBody), $fetch);
    }

    /**
     * Returns all projects visible to the user. Deprecated, use [ Get projects paginated](#api-rest-api-3-project-search-get) that supports search and pagination.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** Projects are returned only where the user has *Browse Projects* or *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param array $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expanded options include:
     *
     *  `description` Returns the project description.
     *  `issueTypes` Returns all issue types associated with the project.
     *  `lead` Returns information about the project lead.
     *  `projectKeys` Returns all project keys associated with the project.
     *     @var int $recent Returns the user's most recently accessed projects. You may specify the number of results to return up to a maximum of 20. If access is anonymous, then the recently accessed projects are based on the current HTTP session.
     *     @var array $properties A list of project properties to return for the project. This parameter accepts a comma-separated list.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Project[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllProjectsUnauthorizedException
     */
    public function getAllProjects(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllProjects($queryParameters), $fetch);
    }

    /**
     * Creates a project based on a project type template, as shown in the following table:.
     *
     * | Project Type Key | Project Template Key |
     * |--|--|
     * | `business` | `com.atlassian.jira-core-project-templates:jira-core-simplified-content-management`, `com.atlassian.jira-core-project-templates:jira-core-simplified-document-approval`, `com.atlassian.jira-core-project-templates:jira-core-simplified-lead-tracking`, `com.atlassian.jira-core-project-templates:jira-core-simplified-process-control`, `com.atlassian.jira-core-project-templates:jira-core-simplified-procurement`, `com.atlassian.jira-core-project-templates:jira-core-simplified-project-management`, `com.atlassian.jira-core-project-templates:jira-core-simplified-recruitment`, `com.atlassian.jira-core-project-templates:jira-core-simplified-task-tracking` |
     * | `service_desk` | `com.atlassian.servicedesk:simplified-it-service-management`, `com.atlassian.servicedesk:simplified-general-service-desk-it`, `com.atlassian.servicedesk:simplified-general-service-desk-business`, `com.atlassian.servicedesk:simplified-internal-service-desk`, `com.atlassian.servicedesk:simplified-external-service-desk`, `com.atlassian.servicedesk:simplified-hr-service-desk`, `com.atlassian.servicedesk:simplified-facilities-service-desk`, `com.atlassian.servicedesk:simplified-legal-service-desk`, `com.atlassian.servicedesk:simplified-analytics-service-desk`, `com.atlassian.servicedesk:simplified-marketing-service-desk`, `com.atlassian.servicedesk:simplified-finance-service-desk` |
     * | `software` | `com.pyxis.greenhopper.jira:gh-simplified-agility-kanban`, `com.pyxis.greenhopper.jira:gh-simplified-agility-scrum`, `com.pyxis.greenhopper.jira:gh-simplified-basic`, `com.pyxis.greenhopper.jira:gh-simplified-kanban-classic`, `com.pyxis.greenhopper.jira:gh-simplified-scrum-classic` |
     * The project types are available according to the installed Jira features as follows:
     *
     *  Jira Core, the default, enables `business` projects.
     *  Jira Service Management enables `service_desk` projects.
     *  Jira Software enables `software` projects.
     *
     * To determine which features are installed, go to **Jira settings** > **Apps** > **Manage apps** and review the System Apps list. To add Jira Software or Jira Service Management into a JIRA instance, use **Jira settings** > **Apps** > **Finding new apps**. For more information, see [ Managing add-ons](https://confluence.atlassian.com/x/S31NLg).
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\CreateProjectDetails $requestBody
     * @param string                                  $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectIdentifiers|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateProjectBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateProjectUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateProjectForbiddenException
     */
    public function createProject(Model\CreateProjectDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateProject($requestBody), $fetch);
    }

    /**
     * Returns a list of up to 20 projects recently viewed by the user that are still visible to the user.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** Projects are returned only where the user has one of:
     *
     *  *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *  *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expanded options include:
     *
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
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Project[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetRecentBadRequestException
     * @throws \JiraSdk\Api\Exception\GetRecentUnauthorizedException
     */
    public function getRecent(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetRecent($queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of projects visible to the user.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** Projects are returned only where the user has one of:
     *
     *  *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *  *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var string $orderBy [Order](#ordering) the results by a field.
     *
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
     *
     *  `view` the project, meaning that they have one of the following permissions:
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  `browse` the project, meaning that they have the *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *  `edit` the project, meaning that they have one of the following permissions:
     *
     *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expanded options include:
     *
     *  `description` Returns the project description.
     *  `projectKeys` Returns all project keys associated with a project.
     *  `lead` Returns information about the project lead.
     *  `issueTypes` Returns all issue types associated with the project.
     *  `url` Returns the URL associated with the project.
     *  `insight` EXPERIMENTAL. Returns the insight details of total issue count and last issue update time for the project.
     *     @var array $status EXPERIMENTAL. Filter results by project status:
     *
     *  `live` Search live projects.
     *  `archived` Search archived projects.
     *  `deleted` Search deleted projects, those in the recycle bin.
     *     @var array $properties EXPERIMENTAL. A list of project properties to return for the project. This parameter accepts a comma-separated list.
     *     @var string $propertyQuery EXPERIMENTAL. A query string used to search properties. The query string cannot be specified using a JSON object. For example, to search for the value of `nested` from `{"something":{"nested":1,"other":2}}` use `[thepropertykey].something.nested=1`. Note that the propertyQuery key is enclosed in square brackets to enable searching where the propertyQuery key includes dot (.) or equals (=) characters. Note that `thepropertykey` is only returned when included in `properties`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanProject|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SearchProjectsBadRequestException
     * @throws \JiraSdk\Api\Exception\SearchProjectsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SearchProjectsNotFoundException
     */
    public function searchProjects(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SearchProjects($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectType[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllProjectTypesUnauthorizedException
     */
    public function getAllProjectTypes(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllProjectTypes(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectType[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function getAllAccessibleProjectTypes(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllAccessibleProjectTypes(), $fetch);
    }

    /**
     * Returns a [project type](https://confluence.atlassian.com/x/Var1Nw).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param string $projectTypeKey the key of the project type
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectType|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectTypeByKeyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectTypeByKeyNotFoundException
     */
    public function getProjectTypeByKey(string $projectTypeKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectTypeByKey($projectTypeKey), $fetch);
    }

    /**
     * Returns a [project type](https://confluence.atlassian.com/x/Var1Nw) if it is accessible to the user.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param string $projectTypeKey the key of the project type
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectType|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAccessibleProjectTypeByKeyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAccessibleProjectTypeByKeyNotFoundException
     */
    public function getAccessibleProjectTypeByKey(string $projectTypeKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAccessibleProjectTypeByKey($projectTypeKey), $fetch);
    }

    /**
     * Deletes a project.
     *
     * You can't delete a project if it's archived. To delete an archived project, restore the project and then delete it. To restore a project, use the Jira UI.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey  the project ID or project key (case sensitive)
     * @param array  $queryParameters {
     *
     *     @var bool $enableUndo Whether this project is placed in the Jira recycle bin where it will be available for restoration.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteProjectUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteProjectNotFoundException
     */
    public function deleteProject(string $projectIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteProject($projectIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Returns the [project details](https://confluence.atlassian.com/x/ahLpNw) for a project.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param string $projectIdOrKey  the project ID or project key (case sensitive)
     * @param array  $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that the project description, issue types, and project lead are included in all responses by default. Expand options include:
     *
     *  `description` The project description.
     *  `issueTypes` The issue types associated with the project.
     *  `lead` The project lead.
     *  `projectKeys` All project keys associated with the project.
     *  `issueTypeHierarchy` The project issue type hierarchy.
     *     @var array $properties A list of project properties to return for the project. This parameter accepts a comma-separated list.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Project|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectNotFoundException
     */
    public function getProject(string $projectIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProject($projectIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Updates the [project details](https://confluence.atlassian.com/x/ahLpNw) of a project.
     *
     * All parameters are optional in the body of the request.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                  $projectIdOrKey  the project ID or project key (case sensitive)
     * @param \JiraSdk\Api\Model\UpdateProjectDetails $requestBody
     * @param array                                   $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that the project description, issue types, and project lead are included in all responses by default. Expand options include:
     *
     *  `description` The project description.
     *  `issueTypes` The issue types associated with the project.
     *  `lead` The project lead.
     *  `projectKeys` All project keys associated with the project.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Project|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateProjectBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateProjectUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateProjectForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateProjectNotFoundException
     */
    public function updateProject(string $projectIdOrKey, Model\UpdateProjectDetails $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateProject($projectIdOrKey, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Archives a project. You can't delete a project if it's archived. To delete an archived project, restore the project and then delete it. To restore a project, use the Jira UI.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey the project ID or project key (case sensitive)
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\ArchiveProjectBadRequestException
     * @throws \JiraSdk\Api\Exception\ArchiveProjectUnauthorizedException
     * @throws \JiraSdk\Api\Exception\ArchiveProjectForbiddenException
     * @throws \JiraSdk\Api\Exception\ArchiveProjectNotFoundException
     */
    public function archiveProject(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\ArchiveProject($projectIdOrKey), $fetch);
    }

    /**
     * Sets the avatar displayed for a project.
     *
     * Use [Load project avatar](#api-rest-api-3-project-projectIdOrKey-avatar2-post) to store avatars against the project, before using this operation to set the displayed avatar.
     *
     **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string                    $projectIdOrKey the ID or (case-sensitive) key of the project
     * @param \JiraSdk\Api\Model\Avatar $requestBody
     * @param string                    $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateProjectAvatarUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateProjectAvatarForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateProjectAvatarNotFoundException
     */
    public function updateProjectAvatar(string $projectIdOrKey, Model\Avatar $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateProjectAvatar($projectIdOrKey, $requestBody), $fetch);
    }

    /**
     * Deletes a custom avatar from a project. Note that system avatars cannot be deleted.
     **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectIdOrKey the project ID or (case-sensitive) key
     * @param int    $id             the ID of the avatar
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteProjectAvatarUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteProjectAvatarForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteProjectAvatarNotFoundException
     */
    public function deleteProjectAvatar(string $projectIdOrKey, int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteProjectAvatar($projectIdOrKey, $id), $fetch);
    }

    /**
     * Loads an avatar for a project.
     *
     * Specify the avatar's local file location in the body of the request. Also, include the following headers:
     *
     *  `X-Atlassian-Token: no-check` To prevent XSRF protection blocking the request, for more information see [Special Headers](#special-request-headers).
     *  `Content-Type: image/image type` Valid image types are JPEG, GIF, or PNG.
     *
     * For example:
     * `curl --request POST `
     *
     * `--user email@example.com:<api_token> `
     *
     * `--header 'X-Atlassian-Token: no-check' `
     *
     * `--header 'Content-Type: image/< image_type>' `
     *
     * `--data-binary "<@/path/to/file/with/your/avatar>" `
     *
     * `--url 'https://your-domain.atlassian.net/rest/api/3/project/{projectIdOrKey}/avatar2'`
     *
     * The avatar is cropped to a square. If no crop parameters are specified, the square originates at the top left of the image. The length of the square's sides is set to the smaller of the height or width of the image.
     *
     * The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size.
     *
     * After creating the avatar use [Set project avatar](#api-rest-api-3-project-projectIdOrKey-avatar-put) to set it as the project's displayed avatar.
     *
     **[Permissions](#permissions) required:** *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectIdOrKey  the ID or (case-sensitive) key of the project
     * @param mixed  $requestBody
     * @param array  $queryParameters {
     *
     *     @var int $x the X coordinate of the top-left corner of the crop region
     *     @var int $y the Y coordinate of the top-left corner of the crop region
     *     @var int $size The length of each side of the crop region.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Avatar|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateProjectAvatarBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateProjectAvatarUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateProjectAvatarForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateProjectAvatarNotFoundException
     */
    public function createProjectAvatar(string $projectIdOrKey, $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateProjectAvatar($projectIdOrKey, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns all project avatars, grouped by system and custom avatars.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param string $projectIdOrKey the ID or (case-sensitive) key of the project
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectAvatars|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllProjectAvatarsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllProjectAvatarsNotFoundException
     */
    public function getAllProjectAvatars(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllProjectAvatars($projectIdOrKey), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of all components in a project. See the [Get project components](#api-rest-api-3-project-projectIdOrKey-components-get) resource if you want to get a full list of versions without pagination.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param string $projectIdOrKey  the project ID or project key (case sensitive)
     * @param array  $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *
     *  `description` Sorts by the component description.
     *  `issueCount` Sorts by the count of issues associated with the component.
     *  `lead` Sorts by the user key of the component's project lead.
     *  `name` Sorts by component name.
     *     @var string $query Filter the results using a literal string. Components with a matching `name` or `description` are returned (case insensitive).
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanComponentWithIssueCount|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectComponentsPaginatedUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectComponentsPaginatedNotFoundException
     */
    public function getProjectComponentsPaginated(string $projectIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectComponentsPaginated($projectIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Returns all components in a project. See the [Get project components paginated](#api-rest-api-3-project-projectIdOrKey-component-get) resource if you want to get a full list of components with pagination.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param string $projectIdOrKey the project ID or project key (case sensitive)
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectComponent[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectComponentsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectComponentsNotFoundException
     */
    public function getProjectComponents(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectComponents($projectIdOrKey), $fetch);
    }

    /**
     * Deletes a project asynchronously.
     *
     * This operation is:
     *
     *  transactional, that is, if part of the delete fails the project is not deleted.
     *  [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey the project ID or project key (case sensitive)
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\TaskProgressBeanObject|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteProjectAsynchronouslyBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteProjectAsynchronouslyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteProjectAsynchronouslyNotFoundException
     */
    public function deleteProjectAsynchronously(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteProjectAsynchronously($projectIdOrKey), $fetch);
    }

    /**
     * Returns the list of features for a project.
     *
     * @param string $projectIdOrKey the ID or (case-sensitive) key of the project
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ContainerForProjectFeatures|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetFeaturesForProjectBadRequestException
     * @throws \JiraSdk\Api\Exception\GetFeaturesForProjectUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetFeaturesForProjectForbiddenException
     * @throws \JiraSdk\Api\Exception\GetFeaturesForProjectNotFoundException
     */
    public function getFeaturesForProject(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetFeaturesForProject($projectIdOrKey), $fetch);
    }

    /**
     * Sets the state of a project feature.
     *
     * @param string                                 $projectIdOrKey the ID or (case-sensitive) key of the project
     * @param string                                 $featureKey     the key of the feature
     * @param \JiraSdk\Api\Model\ProjectFeatureState $requestBody
     * @param string                                 $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ContainerForProjectFeatures|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\ToggleFeatureForProjectBadRequestException
     * @throws \JiraSdk\Api\Exception\ToggleFeatureForProjectUnauthorizedException
     * @throws \JiraSdk\Api\Exception\ToggleFeatureForProjectForbiddenException
     * @throws \JiraSdk\Api\Exception\ToggleFeatureForProjectNotFoundException
     */
    public function toggleFeatureForProject(string $projectIdOrKey, string $featureKey, Model\ProjectFeatureState $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\ToggleFeatureForProject($projectIdOrKey, $featureKey, $requestBody), $fetch);
    }

    /**
     * Returns all [project property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties) keys for the project.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param string $projectIdOrKey the project ID or project key (case sensitive)
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectPropertyKeysBadRequestException
     * @throws \JiraSdk\Api\Exception\GetProjectPropertyKeysUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectPropertyKeysForbiddenException
     * @throws \JiraSdk\Api\Exception\GetProjectPropertyKeysNotFoundException
     */
    public function getProjectPropertyKeys(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectPropertyKeys($projectIdOrKey), $fetch);
    }

    /**
     * Deletes the [property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties) from a project.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the property.
     *
     * @param string $projectIdOrKey the project ID or project key (case sensitive)
     * @param string $propertyKey    The project property key. Use [Get project property keys](#api-rest-api-3-project-projectIdOrKey-properties-get) to get a list of all project property keys.
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteProjectPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteProjectPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteProjectPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteProjectPropertyNotFoundException
     */
    public function deleteProjectProperty(string $projectIdOrKey, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteProjectProperty($projectIdOrKey, $propertyKey), $fetch);
    }

    /**
     * Returns the value of a [project property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the property.
     *
     * @param string $projectIdOrKey the project ID or project key (case sensitive)
     * @param string $propertyKey    The project property key. Use [Get project property keys](#api-rest-api-3-project-projectIdOrKey-properties-get) to get a list of all project property keys.
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\EntityProperty|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\GetProjectPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\GetProjectPropertyNotFoundException
     */
    public function getProjectProperty(string $projectIdOrKey, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectProperty($projectIdOrKey, $propertyKey), $fetch);
    }

    /**
     * Sets the value of the [project property](https://developer.atlassian.com/cloud/jira/platform/storing-data-without-a-database/#a-id-jira-entity-properties-a-jira-entity-properties). You can use project properties to store custom data against the project.
     *
     * The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project in which the property is created.
     *
     * @param string $projectIdOrKey the project ID or project key (case sensitive)
     * @param string $propertyKey    The key of the project property. The maximum length is 255 characters.
     * @param mixed  $requestBody
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetProjectPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\SetProjectPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetProjectPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\SetProjectPropertyNotFoundException
     */
    public function setProjectProperty(string $projectIdOrKey, string $propertyKey, $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetProjectProperty($projectIdOrKey, $propertyKey, $requestBody), $fetch);
    }

    /**
     * Restores a project that has been archived or placed in the Jira recycle bin.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey the project ID or project key (case sensitive)
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Project|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RestoreBadRequestException
     * @throws \JiraSdk\Api\Exception\RestoreUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RestoreNotFoundException
     */
    public function restore(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\Restore($projectIdOrKey), $fetch);
    }

    /**
     * Returns a list of [project roles](https://confluence.atlassian.com/x/3odKLg) for the project returning the name and self URL for each role.
     *
     * Note that all project roles are shared with all projects in Jira Cloud. See [Get all project roles](#api-rest-api-3-role-get) for more information.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for any project on the site or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey the project ID or project key (case sensitive)
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectRolesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectRolesNotFoundException
     */
    public function getProjectRoles(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectRoles($projectIdOrKey), $fetch);
    }

    /**
     * Deletes actors from a project role for the project.
     *
     * To remove default actors from the project role, use [Delete default actors from project role](#api-rest-api-3-role-id-actors-delete).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey  the project ID or project key (case sensitive)
     * @param int    $id              The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param array  $queryParameters {
     *
     *     @var string $user the user account ID of the user to remove from the project role
     *     @var string $group The name of the group to remove from the project role. This parameter cannot be used with the `groupId` parameter. As a group's name can change, use of `groupId` is recommended.
     *     @var string $groupId The ID of the group to remove from the project role. This parameter cannot be used with the `group` parameter.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteActorBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteActorNotFoundException
     */
    public function deleteActor(string $projectIdOrKey, int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteActor($projectIdOrKey, $id, $queryParameters), $fetch);
    }

    /**
     * Returns a project role's details and actors associated with the project. The list of actors is sorted by display name.
     *
     * To check whether a user belongs to a role based on their group memberships, use [Get user](#api-rest-api-3-user-get) with the `groups` expand parameter selected. Then check whether the user keys and groups match with the actors returned for the project.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey  the project ID or project key (case sensitive)
     * @param int    $id              The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param array  $queryParameters {
     *
     *     @var bool $excludeInactiveUsers Exclude inactive users.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectRole|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectRoleBadRequestException
     * @throws \JiraSdk\Api\Exception\GetProjectRoleUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectRoleNotFoundException
     */
    public function getProjectRole(string $projectIdOrKey, int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectRole($projectIdOrKey, $id, $queryParameters), $fetch);
    }

    /**
     * Adds actors to a project role for the project.
     *
     * To replace all actors for the project, use [Set actors for project role](#api-rest-api-3-project-projectIdOrKey-role-id-put).
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                       $projectIdOrKey the project ID or project key (case sensitive)
     * @param int                          $id             The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param \JiraSdk\Api\Model\ActorsMap $requestBody
     * @param string                       $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectRole|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddActorUsersBadRequestException
     * @throws \JiraSdk\Api\Exception\AddActorUsersUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddActorUsersNotFoundException
     */
    public function addActorUsers(string $projectIdOrKey, int $id, Model\ActorsMap $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddActorUsers($projectIdOrKey, $id, $requestBody), $fetch);
    }

    /**
     * Sets the actors for a project role for a project, replacing all existing actors.
     *
     * To add actors to the project without overwriting the existing list, use [Add actors to project role](#api-rest-api-3-project-projectIdOrKey-role-id-post).
     *
     **[Permissions](#permissions) required:** *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                         $projectIdOrKey the project ID or project key (case sensitive)
     * @param int                                            $id             The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param \JiraSdk\Api\Model\ProjectRoleActorsUpdateBean $requestBody
     * @param string                                         $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectRole|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetActorsBadRequestException
     * @throws \JiraSdk\Api\Exception\SetActorsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetActorsNotFoundException
     */
    public function setActors(string $projectIdOrKey, int $id, Model\ProjectRoleActorsUpdateBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetActors($projectIdOrKey, $id, $requestBody), $fetch);
    }

    /**
     * Returns all [project roles](https://confluence.atlassian.com/x/3odKLg) and the details for each role. Note that the list of project roles is common to all projects.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param string $projectIdOrKey  the project ID or project key (case sensitive)
     * @param array  $queryParameters {
     *
     *     @var bool $currentMember whether the roles should be filtered to include only those the user is assigned to
     *     @var bool $excludeConnectAddons
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectRoleDetails[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectRoleDetailsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectRoleDetailsNotFoundException
     */
    public function getProjectRoleDetails(string $projectIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectRoleDetails($projectIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Returns the valid statuses for a project. The statuses are grouped by issue type, as each project has a set of valid issue types and each issue type has a set of valid statuses.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param string $projectIdOrKey the project ID or project key (case sensitive)
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueTypeWithStatus[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllStatusesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllStatusesNotFoundException
     */
    public function getAllStatuses(string $projectIdOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllStatuses($projectIdOrKey), $fetch);
    }

    /**
     * Deprecated, this feature is no longer supported and no alternatives are available, see [Convert project to a different template or type](https://confluence.atlassian.com/x/yEKeOQ). Updates a [project type](https://confluence.atlassian.com/x/GwiiLQ). The project type can be updated for classic projects only, project type cannot be updated for next-gen projects.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey    the project ID or project key (case sensitive)
     * @param string $newProjectTypeKey the key of the new project type
     * @param string $fetch             Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Project|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateProjectTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateProjectTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateProjectTypeNotFoundException
     */
    public function updateProjectType(string $projectIdOrKey, string $newProjectTypeKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateProjectType($projectIdOrKey, $newProjectTypeKey), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of all versions in a project. See the [Get project versions](#api-rest-api-3-project-projectIdOrKey-versions-get) resource if you want to get a full list of versions without pagination.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param string $projectIdOrKey  the project ID or project key (case sensitive)
     * @param array  $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *
     *  `description` Sorts by version description.
     *  `name` Sorts by version name.
     *  `releaseDate` Sorts by release date, starting with the oldest date. Versions with no release date are listed last.
     *  `sequence` Sorts by the order of appearance in the user interface.
     *  `startDate` Sorts by start date, starting with the oldest date. Versions with no start date are listed last.
     *     @var string $query Filter the results using a literal string. Versions with matching `name` or `description` are returned (case insensitive).
     *     @var string $status A list of status values used to filter the results by version status. This parameter accepts a comma-separated list. The status values are `released`, `unreleased`, and `archived`.
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `issuesstatus` Returns the number of issues in each status category for each version.
     *  `operations` Returns actions that can be performed on the specified version.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanVersion|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectVersionsPaginatedNotFoundException
     */
    public function getProjectVersionsPaginated(string $projectIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectVersionsPaginated($projectIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Returns all versions in a project. The response is not paginated. Use [Get project versions paginated](#api-rest-api-3-project-projectIdOrKey-version-get) if you want to get the versions in a project with pagination.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param string $projectIdOrKey  the project ID or project key (case sensitive)
     * @param array  $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts `operations`, which returns actions that can be performed on the version.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Version[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectVersionsNotFoundException
     */
    public function getProjectVersions(string $projectIdOrKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectVersions($projectIdOrKey, $queryParameters), $fetch);
    }

    /**
     * Returns the [project's sender email address](https://confluence.atlassian.com/x/dolKLg).
     **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param int    $projectId the project ID
     * @param string $fetch     Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectEmailAddress|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectEmailUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectEmailForbiddenException
     * @throws \JiraSdk\Api\Exception\GetProjectEmailNotFoundException
     */
    public function getProjectEmail(int $projectId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectEmail($projectId), $fetch);
    }

    /**
     * Sets the [project's sender email address](https://confluence.atlassian.com/x/dolKLg).
     *
     * If `emailAddress` is an empty string, the default email address is restored.
     *
     **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param int                                    $projectId   the project ID
     * @param \JiraSdk\Api\Model\ProjectEmailAddress $requestBody
     * @param string                                 $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateProjectEmailBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateProjectEmailUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateProjectEmailForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateProjectEmailNotFoundException
     */
    public function updateProjectEmail(int $projectId, Model\ProjectEmailAddress $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateProjectEmail($projectId, $requestBody), $fetch);
    }

    /**
     * Get the issue type hierarchy for a next-gen project.
     *
     * The issue type hierarchy for a project consists of:
     *
     *  *Epic* at level 1 (optional).
     *  One or more issue types at level 0 such as *Story*, *Task*, or *Bug*. Where the issue type *Epic* is defined, these issue types are used to break down the content of an epic.
     *  *Subtask* at level -1 (optional). This issue type enables level 0 issue types to be broken down into components. Issues based on a level -1 issue type must have a parent issue.
     *
     **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param int    $projectId the ID of the project
     * @param string $fetch     Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectIssueTypeHierarchy|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetHierarchyBadRequestException
     * @throws \JiraSdk\Api\Exception\GetHierarchyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetHierarchyNotFoundException
     */
    public function getHierarchy(int $projectId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetHierarchy($projectId), $fetch);
    }

    /**
     * Returns the [issue security scheme](https://confluence.atlassian.com/x/J4lKLg) associated with the project.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or the *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectKeyOrId the project ID or project key (case sensitive)
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\SecurityScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectIssueSecuritySchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\GetProjectIssueSecuritySchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectIssueSecuritySchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\GetProjectIssueSecuritySchemeNotFoundException
     */
    public function getProjectIssueSecurityScheme(string $projectKeyOrId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectIssueSecurityScheme($projectKeyOrId), $fetch);
    }

    /**
     * Gets a [notification scheme](https://confluence.atlassian.com/x/8YdKLg) associated with the project. Deprecated, use [Get notification schemes paginated](#api-rest-api-3-notificationscheme-get) supporting search and pagination.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectKeyOrId  the project ID or project key (case sensitive)
     * @param array  $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `all` Returns all expandable information
     *  `field` Returns information about any custom fields assigned to receive an event
     *  `group` Returns information about any groups assigned to receive an event
     *  `notificationSchemeEvents` Returns a list of event associations. This list is returned for all expandable information
     *  `projectRole` Returns information about any project roles assigned to receive an event
     *  `user` Returns information about any users assigned to receive an event
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\NotificationScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetNotificationSchemeForProjectBadRequestException
     * @throws \JiraSdk\Api\Exception\GetNotificationSchemeForProjectUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetNotificationSchemeForProjectNotFoundException
     */
    public function getNotificationSchemeForProject(string $projectKeyOrId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetNotificationSchemeForProject($projectKeyOrId, $queryParameters), $fetch);
    }

    /**
     * Gets the [permission scheme](https://confluence.atlassian.com/x/yodKLg) associated with the project.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectKeyOrId  the project ID or project key (case sensitive)
     * @param array  $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are included when you specify any value. Expand options include:
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PermissionScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAssignedPermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAssignedPermissionSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAssignedPermissionSchemeNotFoundException
     */
    public function getAssignedPermissionScheme(string $projectKeyOrId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAssignedPermissionScheme($projectKeyOrId, $queryParameters), $fetch);
    }

    /**
     * Assigns a permission scheme with a project. See [Managing project permissions](https://confluence.atlassian.com/x/yodKLg) for more information about permission schemes.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                    $projectKeyOrId  the project ID or project key (case sensitive)
     * @param \JiraSdk\Api\Model\IdBean $requestBody
     * @param array                     $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are included when you specify any value. Expand options include:
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PermissionScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AssignPermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AssignPermissionSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\AssignPermissionSchemeNotFoundException
     */
    public function assignPermissionScheme(string $projectKeyOrId, Model\IdBean $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AssignPermissionScheme($projectKeyOrId, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns all [issue security](https://confluence.atlassian.com/x/J4lKLg) levels for the project that the user has access to.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse projects* [global permission](https://confluence.atlassian.com/x/x4dKLg) for the project, however, issue security levels are only returned for authenticated user with *Set Issue Security* [global permission](https://confluence.atlassian.com/x/x4dKLg) for the project.
     *
     * @param string $projectKeyOrId the project ID or project key (case sensitive)
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectIssueSecurityLevels|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetSecurityLevelsForProjectNotFoundException
     */
    public function getSecurityLevelsForProject(string $projectKeyOrId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetSecurityLevelsForProject($projectKeyOrId), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectCategory[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllProjectCategoriesUnauthorizedException
     */
    public function getAllProjectCategories(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllProjectCategories(), $fetch);
    }

    /**
     * Creates a project category.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\ProjectCategory $requestBody
     * @param string                             $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectCategory|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateProjectCategoryBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateProjectCategoryUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateProjectCategoryForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateProjectCategoryConflictException
     */
    public function createProjectCategory(Model\ProjectCategory $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateProjectCategory($requestBody), $fetch);
    }

    /**
     * Deletes a project category.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id    ID of the project category to delete
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveProjectCategoryUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveProjectCategoryForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveProjectCategoryNotFoundException
     */
    public function removeProjectCategory(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveProjectCategory($id), $fetch);
    }

    /**
     * Returns a project category.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param int    $id    the ID of the project category
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectCategory|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectCategoryByIdUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectCategoryByIdNotFoundException
     */
    public function getProjectCategoryById(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectCategoryById($id), $fetch);
    }

    /**
     * Updates a project category.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\ProjectCategory $requestBody
     * @param string                             $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\UpdatedProjectCategory|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateProjectCategoryBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateProjectCategoryUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateProjectCategoryForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateProjectCategoryNotFoundException
     */
    public function updateProjectCategory(int $id, Model\ProjectCategory $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateProjectCategory($id, $requestBody), $fetch);
    }

    /**
     * Validates a project key by confirming the key is a valid string and not in use.
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *
     *     @var string $key The project key.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ErrorCollection|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\ValidateProjectKeyUnauthorizedException
     */
    public function validateProjectKey(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\ValidateProjectKey($queryParameters), $fetch);
    }

    /**
     * Validates a project key and, if the key is invalid or in use, generates a valid random string for the project key.
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *
     *     @var string $key The project key.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetValidProjectKeyUnauthorizedException
     */
    public function getValidProjectKey(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetValidProjectKey($queryParameters), $fetch);
    }

    /**
     * Checks that a project name isn't in use. If the name isn't in use, the passed string is returned. If the name is in use, this operation attempts to generate a valid project name based on the one supplied, usually by adding a sequence number. If a valid project name cannot be generated, a 404 response is returned.
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *
     *     @var string $name The project name.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetValidProjectNameBadRequestException
     * @throws \JiraSdk\Api\Exception\GetValidProjectNameUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetValidProjectNameNotFoundException
     */
    public function getValidProjectName(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetValidProjectName($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Resolution[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetResolutionsUnauthorizedException
     */
    public function getResolutions(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetResolutions(), $fetch);
    }

    /**
     * Creates an issue resolution.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\CreateResolutionDetails $requestBody
     * @param string                                     $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ResolutionId|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateResolutionBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateResolutionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateResolutionForbiddenException
     */
    public function createResolution(Model\CreateResolutionDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateResolution($requestBody), $fetch);
    }

    /**
     * Sets default issue resolution.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\SetDefaultResolutionRequest $requestBody
     * @param string                                         $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetDefaultResolutionBadRequestException
     * @throws \JiraSdk\Api\Exception\SetDefaultResolutionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetDefaultResolutionForbiddenException
     * @throws \JiraSdk\Api\Exception\SetDefaultResolutionNotFoundException
     */
    public function setDefaultResolution(Model\SetDefaultResolutionRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetDefaultResolution($requestBody), $fetch);
    }

    /**
     * Changes the order of issue resolutions.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\ReorderIssueResolutionsRequest $requestBody
     * @param string                                            $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\MoveResolutionsBadRequestException
     * @throws \JiraSdk\Api\Exception\MoveResolutionsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\MoveResolutionsForbiddenException
     * @throws \JiraSdk\Api\Exception\MoveResolutionsNotFoundException
     */
    public function moveResolutions(Model\ReorderIssueResolutionsRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\MoveResolutions($requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of resolutions. The list can contain all resolutions or a subset determined by any combination of these criteria:
     *  a list of resolutions IDs.
     *  whether the field configuration is a default. This returns resolutions from company-managed (classic) projects only, as there is no concept of default resolutions in team-managed projects.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $id The list of resolutions IDs to be filtered out
     *     @var bool $onlyDefault When set to true, return default only, when IDs provided, if none of them is default, return empty page. Default value is false
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanResolutionJsonBean|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SearchResolutionsUnauthorizedException
     */
    public function searchResolutions(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SearchResolutions($queryParameters), $fetch);
    }

    /**
     * Deletes an issue resolution.
     *
     * This operation is [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain subsequent updates.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $id              the ID of the issue resolution
     * @param array  $queryParameters {
     *
     *     @var string $replaceWith The ID of the issue resolution that will replace the currently selected resolution.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\TaskProgressBeanObject|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteResolutionBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteResolutionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteResolutionForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteResolutionNotFoundException
     * @throws \JiraSdk\Api\Exception\DeleteResolutionConflictException
     */
    public function deleteResolution(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteResolution($id, $queryParameters), $fetch);
    }

    /**
     * Returns an issue resolution value.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param string $id    the ID of the issue resolution value
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Resolution|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetResolutionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetResolutionNotFoundException
     */
    public function getResolution(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetResolution($id), $fetch);
    }

    /**
     * Updates an issue resolution.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                     $id          the ID of the issue resolution
     * @param \JiraSdk\Api\Model\UpdateResolutionDetails $requestBody
     * @param string                                     $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateResolutionBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateResolutionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateResolutionForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateResolutionNotFoundException
     */
    public function updateResolution(string $id, Model\UpdateResolutionDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateResolution($id, $requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectRole[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllProjectRolesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllProjectRolesForbiddenException
     */
    public function getAllProjectRoles(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllProjectRoles(), $fetch);
    }

    /**
     * Creates a new project role with no [default actors](#api-rest-api-3-resolution-get). You can use the [Add default actors to project role](#api-rest-api-3-role-id-actors-post) operation to add default actors to the project role after creating it.
     *Note that although a new project role is available to all projects upon creation, any default actors that are associated with the project role are not added to projects that existed prior to the role being created.*<
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\CreateUpdateRoleRequestBean $requestBody
     * @param string                                         $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectRole|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateProjectRoleBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateProjectRoleUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateProjectRoleForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateProjectRoleConflictException
     */
    public function createProjectRole(Model\CreateUpdateRoleRequestBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateProjectRole($requestBody), $fetch);
    }

    /**
     * Deletes a project role. You must specify a replacement project role if you wish to delete a project role that is in use.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $id              The ID of the project role to delete. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param array $queryParameters {
     *
     *     @var int $swap The ID of the project role that will replace the one being deleted.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteProjectRoleBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteProjectRoleUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteProjectRoleForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteProjectRoleNotFoundException
     * @throws \JiraSdk\Api\Exception\DeleteProjectRoleConflictException
     */
    public function deleteProjectRole(int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteProjectRole($id, $queryParameters), $fetch);
    }

    /**
     * Gets the project role details and the default actors associated with the role. The list of default actors is sorted by display name.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id    The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectRole|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectRoleByIdUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectRoleByIdForbiddenException
     * @throws \JiraSdk\Api\Exception\GetProjectRoleByIdNotFoundException
     */
    public function getProjectRoleById(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectRoleById($id), $fetch);
    }

    /**
     * Updates either the project role's name or its description.
     *
     * You cannot update both the name and description at the same time using this operation. If you send a request with a name and a description only the name is updated.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                            $id          The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param \JiraSdk\Api\Model\CreateUpdateRoleRequestBean $requestBody
     * @param string                                         $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectRole|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\PartialUpdateProjectRoleBadRequestException
     * @throws \JiraSdk\Api\Exception\PartialUpdateProjectRoleUnauthorizedException
     * @throws \JiraSdk\Api\Exception\PartialUpdateProjectRoleForbiddenException
     * @throws \JiraSdk\Api\Exception\PartialUpdateProjectRoleNotFoundException
     */
    public function partialUpdateProjectRole(int $id, Model\CreateUpdateRoleRequestBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\PartialUpdateProjectRole($id, $requestBody), $fetch);
    }

    /**
     * Updates the project role's name and description. You must include both a name and a description in the request.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                            $id          The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param \JiraSdk\Api\Model\CreateUpdateRoleRequestBean $requestBody
     * @param string                                         $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectRole|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\FullyUpdateProjectRoleBadRequestException
     * @throws \JiraSdk\Api\Exception\FullyUpdateProjectRoleUnauthorizedException
     * @throws \JiraSdk\Api\Exception\FullyUpdateProjectRoleForbiddenException
     * @throws \JiraSdk\Api\Exception\FullyUpdateProjectRoleNotFoundException
     */
    public function fullyUpdateProjectRole(int $id, Model\CreateUpdateRoleRequestBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\FullyUpdateProjectRole($id, $requestBody), $fetch);
    }

    /**
     * Deletes the [default actors](#api-rest-api-3-resolution-get) from a project role. You may delete a group or user, but you cannot delete a group and a user in the same request.
     *
     * Changing a project role's default actors does not affect project role members for projects already created.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $id              The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param array $queryParameters {
     *
     *     @var string $user the user account ID of the user to remove as a default actor
     *     @var string $groupId The group ID of the group to be removed as a default actor. This parameter cannot be used with the `group` parameter.
     *     @var string $group The group name of the group to be removed as a default actor.This parameter cannot be used with the `groupId` parameter. As a group's name can change, use of `groupId` is recommended.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectRole|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteProjectRoleActorsFromRoleBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteProjectRoleActorsFromRoleUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteProjectRoleActorsFromRoleForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteProjectRoleActorsFromRoleNotFoundException
     */
    public function deleteProjectRoleActorsFromRole(int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteProjectRoleActorsFromRole($id, $queryParameters), $fetch);
    }

    /**
     * Returns the [default actors](#api-rest-api-3-resolution-get) for the project role.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id    The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectRole|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetProjectRoleActorsForRoleBadRequestException
     * @throws \JiraSdk\Api\Exception\GetProjectRoleActorsForRoleUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetProjectRoleActorsForRoleForbiddenException
     * @throws \JiraSdk\Api\Exception\GetProjectRoleActorsForRoleNotFoundException
     */
    public function getProjectRoleActorsForRole(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetProjectRoleActorsForRole($id), $fetch);
    }

    /**
     * Adds [default actors](#api-rest-api-3-resolution-get) to a role. You may add groups or users, but you cannot add groups and users in the same request.
     *
     * Changing a project role's default actors does not affect project role members for projects already created.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                               $id          The ID of the project role. Use [Get all project roles](#api-rest-api-3-role-get) to get a list of project role IDs.
     * @param \JiraSdk\Api\Model\ActorInputBean $requestBody
     * @param string                            $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ProjectRole|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddProjectRoleActorsToRoleBadRequestException
     * @throws \JiraSdk\Api\Exception\AddProjectRoleActorsToRoleUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddProjectRoleActorsToRoleForbiddenException
     * @throws \JiraSdk\Api\Exception\AddProjectRoleActorsToRoleNotFoundException
     */
    public function addProjectRoleActorsToRole(int $id, Model\ActorInputBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddProjectRoleActorsToRole($id, $requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of all screens or those specified by one or more screen IDs.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $id The list of screen IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
     *     @var string $queryString string used to perform a case-insensitive partial match with screen name
     *     @var array $scope The scope filter string. To filter by multiple scope, provide an ampersand-separated list. For example, `scope=GLOBAL&scope=PROJECT`.
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *  `id` Sorts by screen ID.
     *  `name` Sorts by screen name.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanScreen|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetScreensUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetScreensForbiddenException
     */
    public function getScreens(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetScreens($queryParameters), $fetch);
    }

    /**
     * Creates a screen with a default field tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\ScreenDetails $requestBody
     * @param string                           $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Screen|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateScreenBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateScreenUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateScreenForbiddenException
     */
    public function createScreen(Model\ScreenDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateScreen($requestBody), $fetch);
    }

    /**
     * Adds a field to the default tab of the default screen.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId the ID of the field
     * @param string $fetch   Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddFieldToDefaultScreenUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddFieldToDefaultScreenForbiddenException
     * @throws \JiraSdk\Api\Exception\AddFieldToDefaultScreenNotFoundException
     */
    public function addFieldToDefaultScreen(string $fieldId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddFieldToDefaultScreen($fieldId), $fetch);
    }

    /**
     * Deletes a screen. A screen cannot be deleted if it is used in a screen scheme, workflow, or workflow draft.
     *
     * Only screens used in classic projects can be deleted.
     *
     * @param int    $screenId the ID of the screen
     * @param string $fetch    Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteScreenBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteScreenUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteScreenForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteScreenNotFoundException
     */
    public function deleteScreen(int $screenId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteScreen($screenId), $fetch);
    }

    /**
     * Updates a screen. Only screens used in classic projects can be updated.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                    $screenId    the ID of the screen
     * @param \JiraSdk\Api\Model\UpdateScreenDetails $requestBody
     * @param string                                 $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Screen|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateScreenBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateScreenUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateScreenForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateScreenNotFoundException
     */
    public function updateScreen(int $screenId, Model\UpdateScreenDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateScreen($screenId, $requestBody), $fetch);
    }

    /**
     * Returns the fields that can be added to a tab on a screen.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $screenId the ID of the screen
     * @param string $fetch    Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ScreenableField[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAvailableScreenFieldsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAvailableScreenFieldsForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAvailableScreenFieldsNotFoundException
     */
    public function getAvailableScreenFields(int $screenId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAvailableScreenFields($screenId), $fetch);
    }

    /**
     * Returns the list of tabs for a screen.
     **[Permissions](#permissions) required:**
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) when the project key is specified, providing that the screen is associated with the project through a Screen Scheme and Issue Type Screen Scheme.
     *
     * @param int   $screenId        the ID of the screen
     * @param array $queryParameters {
     *
     *     @var string $projectKey The key of the project.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ScreenableTab[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllScreenTabsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAllScreenTabsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllScreenTabsForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAllScreenTabsNotFoundException
     */
    public function getAllScreenTabs(int $screenId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllScreenTabs($screenId, $queryParameters), $fetch);
    }

    /**
     * Creates a tab for a screen.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                              $screenId    the ID of the screen
     * @param \JiraSdk\Api\Model\ScreenableTab $requestBody
     * @param string                           $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ScreenableTab|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddScreenTabBadRequestException
     * @throws \JiraSdk\Api\Exception\AddScreenTabUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddScreenTabForbiddenException
     * @throws \JiraSdk\Api\Exception\AddScreenTabNotFoundException
     */
    public function addScreenTab(int $screenId, Model\ScreenableTab $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddScreenTab($screenId, $requestBody), $fetch);
    }

    /**
     * Deletes a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $screenId the ID of the screen
     * @param int    $tabId    the ID of the screen tab
     * @param string $fetch    Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteScreenTabUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteScreenTabForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteScreenTabNotFoundException
     */
    public function deleteScreenTab(int $screenId, int $tabId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteScreenTab($screenId, $tabId), $fetch);
    }

    /**
     * Updates the name of a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                              $screenId    the ID of the screen
     * @param int                              $tabId       the ID of the screen tab
     * @param \JiraSdk\Api\Model\ScreenableTab $requestBody
     * @param string                           $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ScreenableTab|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RenameScreenTabBadRequestException
     * @throws \JiraSdk\Api\Exception\RenameScreenTabUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RenameScreenTabForbiddenException
     * @throws \JiraSdk\Api\Exception\RenameScreenTabNotFoundException
     */
    public function renameScreenTab(int $screenId, int $tabId, Model\ScreenableTab $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RenameScreenTab($screenId, $tabId, $requestBody), $fetch);
    }

    /**
     * Returns all fields for a screen tab.
     **[Permissions](#permissions) required:**
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg) when the project key is specified, providing that the screen is associated with the project through a Screen Scheme and Issue Type Screen Scheme.
     *
     * @param int   $screenId        the ID of the screen
     * @param int   $tabId           the ID of the screen tab
     * @param array $queryParameters {
     *
     *     @var string $projectKey The key of the project.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ScreenableField[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllScreenTabFieldsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllScreenTabFieldsForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAllScreenTabFieldsNotFoundException
     */
    public function getAllScreenTabFields(int $screenId, int $tabId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllScreenTabFields($screenId, $tabId, $queryParameters), $fetch);
    }

    /**
     * Adds a field to a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                             $screenId    the ID of the screen
     * @param int                             $tabId       the ID of the screen tab
     * @param \JiraSdk\Api\Model\AddFieldBean $requestBody
     * @param string                          $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ScreenableField|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddScreenTabFieldBadRequestException
     * @throws \JiraSdk\Api\Exception\AddScreenTabFieldUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddScreenTabFieldForbiddenException
     * @throws \JiraSdk\Api\Exception\AddScreenTabFieldNotFoundException
     */
    public function addScreenTabField(int $screenId, int $tabId, Model\AddFieldBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddScreenTabField($screenId, $tabId, $requestBody), $fetch);
    }

    /**
     * Removes a field from a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $screenId the ID of the screen
     * @param int    $tabId    the ID of the screen tab
     * @param string $id       the ID of the field
     * @param string $fetch    Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveScreenTabFieldBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveScreenTabFieldUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveScreenTabFieldForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveScreenTabFieldNotFoundException
     */
    public function removeScreenTabField(int $screenId, int $tabId, string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveScreenTabField($screenId, $tabId, $id), $fetch);
    }

    /**
     * Moves a screen tab field.
     *
     * If `after` and `position` are provided in the request, `position` is ignored.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                              $screenId    the ID of the screen
     * @param int                              $tabId       the ID of the screen tab
     * @param string                           $id          the ID of the field
     * @param \JiraSdk\Api\Model\MoveFieldBean $requestBody
     * @param string                           $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\MoveScreenTabFieldBadRequestException
     * @throws \JiraSdk\Api\Exception\MoveScreenTabFieldUnauthorizedException
     * @throws \JiraSdk\Api\Exception\MoveScreenTabFieldForbiddenException
     * @throws \JiraSdk\Api\Exception\MoveScreenTabFieldNotFoundException
     */
    public function moveScreenTabField(int $screenId, int $tabId, string $id, Model\MoveFieldBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\MoveScreenTabField($screenId, $tabId, $id, $requestBody), $fetch);
    }

    /**
     * Moves a screen tab.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $screenId the ID of the screen
     * @param int    $tabId    the ID of the screen tab
     * @param int    $pos      The position of tab. The base index is 0.
     * @param string $fetch    Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\MoveScreenTabBadRequestException
     * @throws \JiraSdk\Api\Exception\MoveScreenTabUnauthorizedException
     * @throws \JiraSdk\Api\Exception\MoveScreenTabForbiddenException
     * @throws \JiraSdk\Api\Exception\MoveScreenTabNotFoundException
     */
    public function moveScreenTab(int $screenId, int $tabId, int $pos, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\MoveScreenTab($screenId, $tabId, $pos), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of screen schemes.
     *
     * Only screen schemes used in classic projects are returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $id The list of screen scheme IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
     *     @var string $expand Use [expand](#expansion) include additional information in the response. This parameter accepts `issueTypeScreenSchemes` that, for each screen schemes, returns information about the issue type screen scheme the screen scheme is assigned to.
     *     @var string $queryString string used to perform a case-insensitive partial match with screen scheme name
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *
     *  `id` Sorts by screen scheme ID.
     *  `name` Sorts by screen scheme name.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanScreenScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetScreenSchemesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetScreenSchemesForbiddenException
     */
    public function getScreenSchemes(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetScreenSchemes($queryParameters), $fetch);
    }

    /**
     * Creates a screen scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\ScreenSchemeDetails $requestBody
     * @param string                                 $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ScreenSchemeId|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateScreenSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateScreenSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateScreenSchemeNotFoundException
     */
    public function createScreenScheme(Model\ScreenSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateScreenScheme($requestBody), $fetch);
    }

    /**
     * Deletes a screen scheme. A screen scheme cannot be deleted if it is used in an issue type screen scheme.
     *
     * Only screens schemes used in classic projects can be deleted.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $screenSchemeId the ID of the screen scheme
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteScreenSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteScreenSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteScreenSchemeNotFoundException
     */
    public function deleteScreenScheme(string $screenSchemeId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteScreenScheme($screenSchemeId), $fetch);
    }

    /**
     * Updates a screen scheme. Only screen schemes used in classic projects can be updated.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string                                       $screenSchemeId the ID of the screen scheme
     * @param \JiraSdk\Api\Model\UpdateScreenSchemeDetails $requestBody
     * @param string                                       $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateScreenSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateScreenSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateScreenSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateScreenSchemeNotFoundException
     */
    public function updateScreenScheme(string $screenSchemeId, Model\UpdateScreenSchemeDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateScreenScheme($screenSchemeId, $requestBody), $fetch);
    }

    /**
     * Searches for issues using [JQL](https://confluence.atlassian.com/x/egORLQ).
     *
     * If the JQL query expression is too large to be encoded as a query parameter, use the [POST](#api-rest-api-3-search-post) version of this resource.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** Issues are included in the response where the user has:
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param array $queryParameters {
     *
     *     @var string $jql The [JQL](https://confluence.atlassian.com/x/egORLQ) that defines the search. Note:
     *
     *  If no JQL expression is provided, all issues are returned.
     *  `username` and `userkey` cannot be used as search terms due to privacy reasons. Use `accountId` instead.
     *  If a user has hidden their email address in their user profile, partial matches of the email address will not find the user. An exact match is required.
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page. To manage page size, Jira may return fewer items per page where a large number of fields are requested. The greatest number of items returned per page is achieved when requesting `id` or `key` only.
     *     @var string $validateQuery Determines how to validate the JQL query and treat the validation results. Supported values are:
     *
     *  `strict` Returns a 400 response code if any errors are found, along with a list of all errors (and warnings).
     *  `warn` Returns all errors as warnings.
     *  `none` No validation is performed.
     *  `true` *Deprecated* A legacy synonym for `strict`.
     *  `false` *Deprecated* A legacy synonym for `warn`.
     *
     * Note: If the JQL is not correctly formed a 400 response code is returned, regardless of the `validateQuery` value.
     *     @var array $fields A list of fields to return for each issue, use it to retrieve a subset of fields. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `*all` Returns all fields.
     *  `*navigable` Returns navigable fields.
     *  Any issue field, prefixed with a minus to exclude.
     *
     * Examples:
     *
     *  `summary,comment` Returns only the summary and comments fields.
     *  `-description` Returns all navigable (default) fields except description.
     *  `*all,-comment` Returns all fields except comments.
     *
     * This parameter may be specified multiple times. For example, `fields=field1,field2&fields=field3`.
     *
     * Note: All navigable fields are returned by default. This differs from [GET issue](#api-rest-api-3-issue-issueIdOrKey-get) where the default is all fields.
     *     @var string $expand Use [expand](#expansion) to include additional information about issues in the response. This parameter accepts a comma-separated list. Expand options include:
     *
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
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\SearchResults|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SearchForIssuesUsingJqlBadRequestException
     * @throws \JiraSdk\Api\Exception\SearchForIssuesUsingJqlUnauthorizedException
     */
    public function searchForIssuesUsingJql(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SearchForIssuesUsingJql($queryParameters), $fetch);
    }

    /**
     * Searches for issues using [JQL](https://confluence.atlassian.com/x/egORLQ).
     *
     * There is a [GET](#api-rest-api-3-search-get) version of this resource that can be used for smaller JQL query expressions.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** Issues are included in the response where the user has:
     *
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the issue.
     *  If [issue-level security](https://confluence.atlassian.com/x/J4lKLg) is configured, issue-level security permission to view the issue.
     *
     * @param \JiraSdk\Api\Model\SearchRequestBean $requestBody
     * @param string                               $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\SearchResults|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SearchForIssuesUsingJqlPostBadRequestException
     * @throws \JiraSdk\Api\Exception\SearchForIssuesUsingJqlPostUnauthorizedException
     */
    public function searchForIssuesUsingJqlPost(Model\SearchRequestBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SearchForIssuesUsingJqlPost($requestBody), $fetch);
    }

    /**
     * Returns details of an issue security level.
     *
     * Use [Get issue security scheme](#api-rest-api-3-issuesecurityschemes-id-get) to obtain the IDs of issue security levels associated with the issue security scheme.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param string $id    the ID of the issue security level
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\SecurityLevel|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueSecurityLevelUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueSecurityLevelNotFoundException
     */
    public function getIssueSecurityLevel(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueSecurityLevel($id), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ServerInformation|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetServerInfoUnauthorizedException
     */
    public function getServerInfo(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetServerInfo(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ColumnItem[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIssueNavigatorDefaultColumnsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetIssueNavigatorDefaultColumnsForbiddenException
     */
    public function getIssueNavigatorDefaultColumns(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIssueNavigatorDefaultColumns(), $fetch);
    }

    /**
     * Sets the default issue navigator columns.
     *
     * The `columns` parameter accepts a navigable field value and is expressed as HTML form data. To specify multiple columns, pass multiple `columns` parameters. For example, in curl:
     *
     * `curl -X PUT -d columns=summary -d columns=description https://your-domain.atlassian.net/rest/api/3/settings/columns`
     *
     * If no column details are sent, then all default columns are removed.
     *
     * A navigable field is one that can be used as a column on the issue navigator. Find details of navigable issue columns using [Get fields](#api-rest-api-3-field-get).
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array[]|null $requestBody
     * @param string       $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetIssueNavigatorDefaultColumnsBadRequestException
     * @throws \JiraSdk\Api\Exception\SetIssueNavigatorDefaultColumnsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetIssueNavigatorDefaultColumnsForbiddenException
     * @throws \JiraSdk\Api\Exception\SetIssueNavigatorDefaultColumnsNotFoundException
     */
    public function setIssueNavigatorDefaultColumns(?array $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetIssueNavigatorDefaultColumns($requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\StatusDetails[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetStatusesUnauthorizedException
     */
    public function getStatuses(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetStatuses(), $fetch);
    }

    /**
     * Returns a status. The status must be associated with an active workflow to be returned.
     *
     * If a name is used on more than one status, only the status found first is returned. Therefore, identifying the status by its ID may be preferable.
     *
     * This operation can be accessed anonymously.
     *
     * [Permissions](#permissions) required: None.
     *
     * @param string $idOrName the ID or name of the status
     * @param string $fetch    Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\StatusDetails|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetStatusUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetStatusNotFoundException
     */
    public function getStatus(string $idOrName, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetStatus($idOrName), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\StatusCategory[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetStatusCategoriesUnauthorizedException
     */
    public function getStatusCategories(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetStatusCategories(), $fetch);
    }

    /**
     * Returns a status category. Status categories provided a mechanism for categorizing [statuses](#api-rest-api-3-status-idOrName-get).
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param string $idOrKey the ID or key of the status category
     * @param string $fetch   Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\StatusCategory|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetStatusCategoryUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetStatusCategoryNotFoundException
     */
    public function getStatusCategory(string $idOrKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetStatusCategory($idOrKey), $fetch);
    }

    /**
     * Deletes statuses by ID.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Administer projects* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *  *Administer Jira* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *
     * @param array $queryParameters {
     *
     *     @var array $id The list of status IDs. To include multiple IDs, provide an ampersand-separated list. For example, id=10000&id=10001.
     *
     * Min items `1`, Max items `50`
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteStatusesByIdBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteStatusesByIdUnauthorizedException
     */
    public function deleteStatusesById(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteStatusesById($queryParameters), $fetch);
    }

    /**
     * Returns a list of the statuses specified by one or more status IDs.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Administer projects* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *  *Administer Jira* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *
     * @param array $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `usages` Returns the project and issue types that use the status in their workflow.
     *     @var array $id The list of status IDs. To include multiple IDs, provide an ampersand-separated list. For example, id=10000&id=10001.
     *
     * Min items `1`, Max items `50`
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\JiraStatus[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetStatusesByIdBadRequestException
     * @throws \JiraSdk\Api\Exception\GetStatusesByIdUnauthorizedException
     */
    public function getStatusesById(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetStatusesById($queryParameters), $fetch);
    }

    /**
     * Creates statuses for a global or project scope.
     **[Permissions](#permissions) required:**
     *  *Administer projects* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *  *Administer Jira* [project permission.](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param \JiraSdk\Api\Model\StatusCreateRequest $requestBody
     * @param string                                 $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\JiraStatus[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateStatusesBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateStatusesUnauthorizedException
     */
    public function createStatuses(Model\StatusCreateRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateStatuses($requestBody), $fetch);
    }

    /**
     * Updates statuses by ID.
     **[Permissions](#permissions) required:**
     *  *Administer projects* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *  *Administer Jira* [project permission.](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param \JiraSdk\Api\Model\StatusUpdateRequest $requestBody
     * @param string                                 $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateStatusesBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateStatusesUnauthorizedException
     */
    public function updateStatuses(Model\StatusUpdateRequest $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateStatuses($requestBody), $fetch);
    }

    /**
     * Returns a [paginated](https://developer.atlassian.com/cloud/jira/platform/rest/v3/intro/#pagination) list of statuses that match a search on name or project.
     **[Permissions](#permissions) required:**
     *  *Administer projects* [project permission.](https://confluence.atlassian.com/x/yodKLg)
     *  *Administer Jira* [project permission.](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param array $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `usages` Returns the project and issue types that use the status in their workflow.
     *     @var string $projectId the project the status is part of or null for global statuses
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var string $searchString term to match status names against or null to search for all statuses in the search scope
     *     @var string $statusCategory Category of the status to filter by. The supported values are: `TODO`, `IN_PROGRESS`, and `DONE`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageOfStatuses|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SearchBadRequestException
     * @throws \JiraSdk\Api\Exception\SearchUnauthorizedException
     */
    public function search(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\Search($queryParameters), $fetch);
    }

    /**
     * Returns the status of a [long-running asynchronous task](#async).
     *
     * When a task has finished, this operation returns the JSON blob applicable to the task. See the documentation of the operation that created the task for details. Task details are not permanently retained. As of September 2019, details are retained for 14 days although this period may change without notice.
     *
     **[Permissions](#permissions) required:** either of:
     *
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  Creator of the task.
     *
     * @param string $taskId the ID of the task
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\TaskProgressBeanObject|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetTaskUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetTaskForbiddenException
     * @throws \JiraSdk\Api\Exception\GetTaskNotFoundException
     */
    public function getTask(string $taskId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetTask($taskId), $fetch);
    }

    /**
     * Cancels a task.
     **[Permissions](#permissions) required:** either of:
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *  Creator of the task.
     *
     * @param string $taskId the ID of the task
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CancelTaskBadRequestException
     * @throws \JiraSdk\Api\Exception\CancelTaskUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CancelTaskForbiddenException
     * @throws \JiraSdk\Api\Exception\CancelTaskNotFoundException
     */
    public function cancelTask(string $taskId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CancelTask($taskId), $fetch);
    }

    /**
     * Gets UI modifications. UI modifications can only be retrieved by Forge apps.
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *  `data` Returns UI modification data.
     *  `contexts` Returns UI modification contexts.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanUiModificationDetails|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetUiModificationsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetUiModificationsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetUiModificationsForbiddenException
     */
    public function getUiModifications(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetUiModifications($queryParameters), $fetch);
    }

    /**
     * Creates a UI modification. UI modification can only be created by Forge apps.
     *
     * Each app can define up to 100 UI modifications. Each UI modification can define up to 1000 contexts.
     *
     **[Permissions](#permissions) required:**
     *
     *  *None* if the UI modification is created without contexts.
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for one or more projects, if the UI modification is created with contexts.
     *
     * @param \JiraSdk\Api\Model\CreateUiModificationDetails $requestBody
     * @param string                                         $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\UiModificationIdentifiers|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateUiModificationBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateUiModificationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateUiModificationForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateUiModificationNotFoundException
     */
    public function createUiModification(Model\CreateUiModificationDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateUiModification($requestBody), $fetch);
    }

    /**
     * Deletes a UI modification. All the contexts that belong to the UI modification are deleted too. UI modification can only be deleted by Forge apps.
     **[Permissions](#permissions) required:** None.
     *
     * @param string $uiModificationId the ID of the UI modification
     * @param string $fetch            Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteUiModificationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteUiModificationForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteUiModificationNotFoundException
     */
    public function deleteUiModification(string $uiModificationId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteUiModification($uiModificationId), $fetch);
    }

    /**
     * Updates a UI modification. UI modification can only be updated by Forge apps.
     *
     * Each UI modification can define up to 1000 contexts.
     *
     **[Permissions](#permissions) required:**
     *
     *  *None* if the UI modification is created without contexts.
     *  *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for one or more projects, if the UI modification is created with contexts.
     *
     * @param string                                         $uiModificationId the ID of the UI modification
     * @param \JiraSdk\Api\Model\UpdateUiModificationDetails $requestBody
     * @param string                                         $fetch            Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateUiModificationBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateUiModificationUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateUiModificationForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateUiModificationNotFoundException
     */
    public function updateUiModification(string $uiModificationId, Model\UpdateUiModificationDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateUiModification($uiModificationId, $requestBody), $fetch);
    }

    /**
     * Returns the system and custom avatars for a project or issue type.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  for custom project avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project the avatar belongs to.
     *  for custom issue type avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one project the issue type is used in.
     *  for system avatars, none.
     *
     * @param string $type     the avatar type
     * @param string $entityId the ID of the item the avatar is associated with
     * @param string $fetch    Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Avatars|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAvatarsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAvatarsNotFoundException
     */
    public function getAvatars(string $type, string $entityId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAvatars($type, $entityId), $fetch);
    }

    /**
     * Loads a custom avatar for a project or issue type.
     *
     * Specify the avatar's local file location in the body of the request. Also, include the following headers:
     *
     *  `X-Atlassian-Token: no-check` To prevent XSRF protection blocking the request, for more information see [Special Headers](#special-request-headers).
     *  `Content-Type: image/image type` Valid image types are JPEG, GIF, or PNG.
     *
     * For example:
     * `curl --request POST `
     *
     * `--user email@example.com:<api_token> `
     *
     * `--header 'X-Atlassian-Token: no-check' `
     *
     * `--header 'Content-Type: image/< image_type>' `
     *
     * `--data-binary "<@/path/to/file/with/your/avatar>" `
     *
     * `--url 'https://your-domain.atlassian.net/rest/api/3/universal_avatar/type/{type}/owner/{entityId}'`
     *
     * The avatar is cropped to a square. If no crop parameters are specified, the square originates at the top left of the image. The length of the square's sides is set to the smaller of the height or width of the image.
     *
     * The cropped image is then used to create avatars of 16x16, 24x24, 32x32, and 48x48 in size.
     *
     * After creating the avatar use:
     *
     *  [Update issue type](#api-rest-api-3-issuetype-id-put) to set it as the issue type's displayed avatar.
     *  [Set project avatar](#api-rest-api-3-project-projectIdOrKey-avatar-put) to set it as the project's displayed avatar.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $type            the avatar type
     * @param string $entityId        the ID of the item the avatar is associated with
     * @param mixed  $requestBody
     * @param array  $queryParameters {
     *
     *     @var int $x the X coordinate of the top-left corner of the crop region
     *     @var int $y the Y coordinate of the top-left corner of the crop region
     *     @var int $size The length of each side of the crop region.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Avatar|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\StoreAvatarBadRequestException
     * @throws \JiraSdk\Api\Exception\StoreAvatarUnauthorizedException
     * @throws \JiraSdk\Api\Exception\StoreAvatarForbiddenException
     * @throws \JiraSdk\Api\Exception\StoreAvatarNotFoundException
     */
    public function storeAvatar(string $type, string $entityId, $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\StoreAvatar($type, $entityId, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Deletes an avatar from a project or issue type.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $type           the avatar type
     * @param string $owningObjectId the ID of the item the avatar is associated with
     * @param int    $id             the ID of the avatar
     * @param string $fetch          Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteAvatarBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteAvatarForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteAvatarNotFoundException
     */
    public function deleteAvatar(string $type, string $owningObjectId, int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteAvatar($type, $owningObjectId, $id), $fetch);
    }

    /**
     * Returns the default project or issue type avatar image.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param string $type            the icon type of the avatar
     * @param array  $queryParameters {
     *
     *     @var string $size The size of the avatar image. If not provided the default size is returned.
     *     @var string $format The format to return the avatar image in. If not provided the original content format is returned.
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|image/png|image/svg+xml|*\/*
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByTypeForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByTypeNotFoundException
     */
    public function getAvatarImageByType(string $type, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAvatarImageByType($type, $queryParameters, $accept), $fetch);
    }

    /**
     * Returns a project or issue type avatar image by ID.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  For system avatars, none.
     *  For custom project avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project the avatar belongs to.
     *  For custom issue type avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one project the issue type is used in.
     *
     * @param string $type            the icon type of the avatar
     * @param int    $id              the ID of the avatar
     * @param array  $queryParameters {
     *
     *     @var string $size The size of the avatar image. If not provided the default size is returned.
     *     @var string $format The format to return the avatar image in. If not provided the original content format is returned.
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|image/png|image/svg+xml|*\/*
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByIDBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByIDUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByIDForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByIDNotFoundException
     */
    public function getAvatarImageByID(string $type, int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAvatarImageByID($type, $id, $queryParameters, $accept), $fetch);
    }

    /**
     * Returns the avatar image for a project or issue type.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  For system avatars, none.
     *  For custom project avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project the avatar belongs to.
     *  For custom issue type avatars, *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for at least one project the issue type is used in.
     *
     * @param string $type            the icon type of the avatar
     * @param string $entityId        the ID of the project or issue type the avatar belongs to
     * @param array  $queryParameters {
     *
     *     @var string $size The size of the avatar image. If not provided the default size is returned.
     *     @var string $format The format to return the avatar image in. If not provided the original content format is returned.
     * }
     *
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     * @param array  $accept Accept content header application/json|image/png|image/svg+xml|*\/*
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByOwnerBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByOwnerUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByOwnerForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAvatarImageByOwnerNotFoundException
     */
    public function getAvatarImageByOwner(string $type, string $entityId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAvatarImageByOwner($type, $entityId, $queryParameters, $accept), $fetch);
    }

    /**
     * Deletes a user. If the operation completes successfully then the user is removed from Jira's user base. This operation does not delete the user's Atlassian account.
     **[Permissions](#permissions) required:** Site administration (that is, membership of the *site-admin* [group](https://confluence.atlassian.com/x/24xjL)).
     *
     * @param array $queryParameters {
     *
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $key This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RemoveUserBadRequestException
     * @throws \JiraSdk\Api\Exception\RemoveUserUnauthorizedException
     * @throws \JiraSdk\Api\Exception\RemoveUserForbiddenException
     * @throws \JiraSdk\Api\Exception\RemoveUserNotFoundException
     */
    public function removeUser(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RemoveUser($queryParameters), $fetch);
    }

    /**
     * Returns a user.
     *
     * Privacy controls are applied to the response based on the user's preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
     *
     **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*. Required.
     *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide) for details.
     *     @var string $key This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide) for details.
     *     @var string $expand Use [expand](#expansion) to include additional information about users in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `groups` includes all groups and nested groups to which the user belongs.
     *  `applicationRoles` includes details of all the applications to which the user has access.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\User|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetUserUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetUserForbiddenException
     * @throws \JiraSdk\Api\Exception\GetUserNotFoundException
     */
    public function getUser(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetUser($queryParameters), $fetch);
    }

    /**
     * Creates a user. This resource is retained for legacy compatibility. As soon as a more suitable alternative is available this resource will be deprecated.
     *
     * If the user exists and has access to Jira, the operation returns a 201 status. If the user exists but does not have access to Jira, the operation returns a 400 status.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\NewUserDetails $requestBody
     * @param string                            $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\User|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateUserBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateUserUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateUserForbiddenException
     */
    public function createUser(Model\NewUserDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateUser($requestBody), $fetch);
    }

    /**
     * Returns a list of users who can be assigned issues in one or more projects. The list may be restricted to users whose attributes match a string.
     *
     * This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that can be assigned issues in the projects. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who can be assigned issues in the projects, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
     *
     * Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** None.
     *
     * @param array $queryParameters {
     *
     *     @var string $query A query string that is matched against user attributes, such as `displayName` and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `accountId` is specified.
     *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $accountId A query string that is matched exactly against user `accountId`. Required, unless `query` is specified.
     *     @var string $projectKeys A list of project keys (case sensitive). This parameter accepts a comma-separated list.
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\User[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\FindBulkAssignableUsersBadRequestException
     * @throws \JiraSdk\Api\Exception\FindBulkAssignableUsersUnauthorizedException
     * @throws \JiraSdk\Api\Exception\FindBulkAssignableUsersNotFoundException
     * @throws \JiraSdk\Api\Exception\FindBulkAssignableUsersTooManyRequestsException
     */
    public function findBulkAssignableUsers(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\FindBulkAssignableUsers($queryParameters), $fetch);
    }

    /**
     * Returns a list of users that can be assigned to an issue. Use this operation to find the list of users who can be assigned to:.
     *
     *  a new issue, by providing the `projectKeyOrId`.
     *  an updated issue, by providing the `issueKey`.
     *  to an issue during a transition (workflow action), by providing the `issueKey` and the transition id in `actionDescriptorId`. You can obtain the IDs of an issue's valid transitions using the `transitions` option in the `expand` parameter of [ Get issue](#api-rest-api-3-issue-issueIdOrKey-get).
     *
     * In all these cases, you can pass an account ID to determine if a user can be assigned to an issue. The user is returned in the response if they can be assigned to the issue or issue transition.
     *
     * This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that can be assigned the issue. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who can be assigned the issue, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
     *
     * Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
     *
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *
     *     @var string $query A query string that is matched against user attributes, such as `displayName`, and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `username` or `accountId` is specified.
     *     @var string $sessionId The sessionId of this request. SessionId is the same until the assignee is set.
     *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $accountId A query string that is matched exactly against user `accountId`. Required, unless `query` is specified.
     *     @var string $project The project ID or project key (case sensitive). Required, unless `issueKey` is specified.
     *     @var string $issueKey The key of the issue. Required, unless `project` is specified.
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return. This operation may return less than the maximum number of items even if more are available. The operation fetches users up to the maximum and then, from the fetched users, returns only the users that can be assigned to the issue.
     *     @var int $actionDescriptorId the ID of the transition
     *     @var bool $recommend
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\User[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\FindAssignableUsersBadRequestException
     * @throws \JiraSdk\Api\Exception\FindAssignableUsersUnauthorizedException
     * @throws \JiraSdk\Api\Exception\FindAssignableUsersNotFoundException
     * @throws \JiraSdk\Api\Exception\FindAssignableUsersTooManyRequestsException
     */
    public function findAssignableUsers(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\FindAssignableUsers($queryParameters), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of the users specified by one or more account IDs.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $username This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var array $key This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var array $accountId The account ID of a user. To specify multiple users, pass multiple `accountId` parameters. For example, `accountId=5b10a2844c20165700ede21g&accountId=5b10ac8d82e05b22cc7d4ef5`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanUser|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\BulkGetUsersBadRequestException
     * @throws \JiraSdk\Api\Exception\BulkGetUsersUnauthorizedException
     */
    public function bulkGetUsers(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\BulkGetUsers($queryParameters), $fetch);
    }

    /**
     * Returns the account IDs for the users specified in the `key` or `username` parameters. Note that multiple `key` or `username` parameters can be specified.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $username Username of a user. To specify multiple users, pass multiple copies of this parameter. For example, `username=fred&username=barney`. Required if `key` isn't provided. Cannot be provided if `key` is present.
     *     @var array $key Key of a user. To specify multiple users, pass multiple copies of this parameter. For example, `key=fred&key=barney`. Required if `username` isn't provided. Cannot be provided if `username` is present.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\UserMigrationBean[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\BulkGetUsersMigrationBadRequestException
     * @throws \JiraSdk\Api\Exception\BulkGetUsersMigrationUnauthorizedException
     */
    public function bulkGetUsersMigration(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\BulkGetUsersMigration($queryParameters), $fetch);
    }

    /**
     * Resets the default [ issue table columns](https://confluence.atlassian.com/x/XYdKLg) for the user to the system default. If `accountId` is not passed, the calling user's default columns are reset.
     **[Permissions](#permissions) required:**
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to set the columns on any user.
     *  Permission to access Jira, to set the calling user's columns.
     *
     * @param array $queryParameters {
     *
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\ResetUserColumnsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\ResetUserColumnsForbiddenException
     */
    public function resetUserColumns(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\ResetUserColumns($queryParameters), $fetch);
    }

    /**
     * Returns the default [issue table columns](https://confluence.atlassian.com/x/XYdKLg) for the user. If `accountId` is not passed in the request, the calling user's details are returned.
     **[Permissions](#permissions) required:**
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLgl), to get the column details for any user.
     *  Permission to access Jira, to get the calling user's column details.
     *
     * @param array $queryParameters {
     *
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *     @var string $username This parameter is no longer available See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ColumnItem[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetUserDefaultColumnsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetUserDefaultColumnsForbiddenException
     * @throws \JiraSdk\Api\Exception\GetUserDefaultColumnsNotFoundException
     */
    public function getUserDefaultColumns(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetUserDefaultColumns($queryParameters), $fetch);
    }

    /**
     * Sets the default [ issue table columns](https://confluence.atlassian.com/x/XYdKLg) for the user. If an account ID is not passed, the calling user's default columns are set. If no column details are sent, then all default columns are removed.
     *
     * The parameters for this resource are expressed as HTML form data. For example, in curl:
     *
     * `curl -X PUT -d columns=summary -d columns=description https://your-domain.atlassian.net/rest/api/3/user/columns?accountId=5b10ac8d82e05b22cc7d4ef5'`
     *
     **[Permissions](#permissions) required:**
     *
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to set the columns on any user.
     *  Permission to access Jira, to set the calling user's columns.
     *
     * @param array[]|null $requestBody
     * @param array        $queryParameters {
     *
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetUserColumnsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetUserColumnsForbiddenException
     * @throws \JiraSdk\Api\Exception\SetUserColumnsNotFoundException
     * @throws \JiraSdk\Api\Exception\SetUserColumnsTooManyRequestsException
     * @throws \JiraSdk\Api\Exception\SetUserColumnsInternalServerErrorException
     */
    public function setUserColumns(?array $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetUserColumns($requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns a user's email address. This API is only available to apps approved by Atlassian, according to these [guidelines](https://community.developer.atlassian.com/t/guidelines-for-requesting-access-to-email-address/27603).
     *
     * @param array $queryParameters {
     *
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, `5b10ac8d82e05b22cc7d4ef5`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\UnrestrictedUserEmail|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetUserEmailBadRequestException
     * @throws \JiraSdk\Api\Exception\GetUserEmailUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetUserEmailNotFoundException
     * @throws \JiraSdk\Api\Exception\GetUserEmailServiceUnavailableException
     */
    public function getUserEmail(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetUserEmail($queryParameters), $fetch);
    }

    /**
     * Returns a user's email address. This API is only available to apps approved by Atlassian, according to these [guidelines](https://community.developer.atlassian.com/t/guidelines-for-requesting-access-to-email-address/27603).
     *
     * @param array $queryParameters {
     *
     *     @var array $accountId The account IDs of the users for which emails are required. An `accountId` is an identifier that uniquely identifies the user across all Atlassian products. For example, `5b10ac8d82e05b22cc7d4ef5`. Note, this should be treated as an opaque identifier (that is, do not assume any structure in the value).
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\UnrestrictedUserEmail|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetUserEmailBulkBadRequestException
     * @throws \JiraSdk\Api\Exception\GetUserEmailBulkUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetUserEmailBulkServiceUnavailableException
     */
    public function getUserEmailBulk(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetUserEmailBulk($queryParameters), $fetch);
    }

    /**
     * Returns the groups to which a user belongs.
     **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $key This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\GroupName[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetUserGroupsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetUserGroupsForbiddenException
     * @throws \JiraSdk\Api\Exception\GetUserGroupsNotFoundException
     */
    public function getUserGroups(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetUserGroups($queryParameters), $fetch);
    }

    /**
     * Returns a list of users who fulfill these criteria:.
     *
     *  their user attributes match a search string.
     *  they have a set of permissions for a project or issue.
     *
     * If no search string is provided, a list of all users with the permissions is returned.
     *
     * This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the search string and have permission for the project or issue. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who match the search string and have permission for the project or issue, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
     *
     * Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to get users for any project.
     *  *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for a project, to get users for that project.
     *
     * @param array $queryParameters {
     *
     *     @var string $query A query string that is matched against user attributes, such as `displayName` and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `accountId` is specified.
     *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $accountId A query string that is matched exactly against user `accountId`. Required, unless `query` is specified.
     *     @var string $permissions A comma separated list of permissions. Permissions can be specified as any:
     *
     *  permission returned by [Get all permissions](#api-rest-api-3-permissions-get).
     *  custom project permission added by Connect apps.
     *  (deprecated) one of the following:
     *
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
     *     @var string $issueKey the issue key for the issue
     *     @var string $projectKey the project key for the project (case sensitive)
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\User[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\FindUsersWithAllPermissionsBadRequestException
     * @throws \JiraSdk\Api\Exception\FindUsersWithAllPermissionsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\FindUsersWithAllPermissionsForbiddenException
     * @throws \JiraSdk\Api\Exception\FindUsersWithAllPermissionsNotFoundException
     * @throws \JiraSdk\Api\Exception\FindUsersWithAllPermissionsTooManyRequestsException
     */
    public function findUsersWithAllPermissions(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\FindUsersWithAllPermissions($queryParameters), $fetch);
    }

    /**
     * Returns a list of users whose attributes match the query term. The returned object includes the `html` field where the matched query term is highlighted with the HTML strong tag. A list of account IDs can be provided to exclude users from the results.
     *
     * This operation takes the users in the range defined by `maxResults`, up to the thousandth user, and then returns only the users from that range that match the query term. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who match the query term, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
     *
     * Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg). Anonymous calls and calls by users without the required permission return search results for an exact name match only.
     *
     * @param array $queryParameters {
     *
     *     @var string $query A query string that is matched against user attributes, such as `displayName`, and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*.
     *     @var int $maxResults The maximum number of items to return. The total number of matched users is returned in `total`.
     *     @var bool $showAvatar include the URI to the user's avatar
     *     @var array $exclude This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var array $excludeAccountIds A list of account IDs to exclude from the search results. This parameter accepts a comma-separated list. Multiple account IDs can also be provided using an ampersand-separated list. For example, `excludeAccountIds=5b10a2844c20165700ede21g,5b10a0effa615349cb016cd8&excludeAccountIds=5b10ac8d82e05b22cc7d4ef5`. Cannot be provided with `exclude`.
     *     @var string $avatarSize
     *     @var bool $excludeConnectUsers
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\FoundUsers|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\FindUsersForPickerBadRequestException
     * @throws \JiraSdk\Api\Exception\FindUsersForPickerUnauthorizedException
     * @throws \JiraSdk\Api\Exception\FindUsersForPickerTooManyRequestsException
     */
    public function findUsersForPicker(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\FindUsersForPicker($queryParameters), $fetch);
    }

    /**
     * Returns the keys of all properties for a user.
     *
     * Note: This operation does not access the [user properties](https://confluence.atlassian.com/x/8YxjL) created and maintained in Jira.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to access the property keys on any user.
     *  Access to Jira, to access the calling user's property keys.
     *
     * @param array $queryParameters {
     *
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *     @var string $userKey This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $username This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetUserPropertyKeysBadRequestException
     * @throws \JiraSdk\Api\Exception\GetUserPropertyKeysUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetUserPropertyKeysForbiddenException
     * @throws \JiraSdk\Api\Exception\GetUserPropertyKeysNotFoundException
     */
    public function getUserPropertyKeys(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetUserPropertyKeys($queryParameters), $fetch);
    }

    /**
     * Deletes a property from a user.
     *
     * Note: This operation does not access the [user properties](https://confluence.atlassian.com/x/8YxjL) created and maintained in Jira.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to delete a property from any user.
     *  Access to Jira, to delete a property from the calling user's record.
     *
     * @param string $propertyKey     the key of the user's property
     * @param array  $queryParameters {
     *
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *     @var string $userKey This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $username This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteUserPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteUserPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteUserPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteUserPropertyNotFoundException
     */
    public function deleteUserProperty(string $propertyKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteUserProperty($propertyKey, $queryParameters), $fetch);
    }

    /**
     * Returns the value of a user's property. If no property key is provided [Get user property keys](#api-rest-api-3-user-properties-get) is called.
     *
     * Note: This operation does not access the [user properties](https://confluence.atlassian.com/x/8YxjL) created and maintained in Jira.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to get a property from any user.
     *  Access to Jira, to get a property from the calling user's record.
     *
     * @param string $propertyKey     the key of the user's property
     * @param array  $queryParameters {
     *
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *     @var string $userKey This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $username This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\EntityProperty|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetUserPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\GetUserPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetUserPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\GetUserPropertyNotFoundException
     */
    public function getUserProperty(string $propertyKey, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetUserProperty($propertyKey, $queryParameters), $fetch);
    }

    /**
     * Sets the value of a user's property. Use this resource to store custom data against a user.
     *
     * Note: This operation does not access the [user properties](https://confluence.atlassian.com/x/8YxjL) created and maintained in Jira.
     *
     **[Permissions](#permissions) required:**
     *
     *  *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg), to set a property on any user.
     *  Access to Jira, to set a property on the calling user's record.
     *
     * @param string $propertyKey     The key of the user's property. The maximum length is 255 characters.
     * @param mixed  $requestBody
     * @param array  $queryParameters {
     *
     *     @var string $accountId The account ID of the user, which uniquely identifies the user across all Atlassian products. For example, *5b10ac8d82e05b22cc7d4ef5*.
     *     @var string $userKey This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $username This parameter is no longer available and will be removed from the documentation soon. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetUserPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\SetUserPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetUserPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\SetUserPropertyNotFoundException
     * @throws \JiraSdk\Api\Exception\SetUserPropertyMethodNotAllowedException
     */
    public function setUserProperty(string $propertyKey, $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetUserProperty($propertyKey, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns a list of users that match the search string and property.
     *
     * This operation first applies a filter to match the search string and property, and then takes the filtered users in the range defined by `startAt` and `maxResults`, up to the thousandth user. To get all the users who match the search string and property, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
     *
     * This operation can be accessed anonymously.
     *
     * Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
     *
     **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg). Anonymous calls or calls by users without the required permission return empty search results.
     *
     * @param array $queryParameters {
     *
     *     @var string $query A query string that is matched against user attributes ( `displayName`, and `emailAddress`) to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `accountId` or `property` is specified.
     *     @var string $username
     *     @var string $accountId A query string that is matched exactly against a user `accountId`. Required, unless `query` or `property` is specified.
     *     @var int $startAt the index of the first item to return in a page of filtered results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var string $property A query string used to search properties. Property keys are specified by path, so property keys containing dot (.) or equals (=) characters cannot be used. The query string cannot be specified using a JSON object. Example: To search for the value of `nested` from `{"something":{"nested":1,"other":2}}` use `thepropertykey.something.nested=1`. Required, unless `accountId` or `query` is specified.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\User[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\FindUsersBadRequestException
     * @throws \JiraSdk\Api\Exception\FindUsersUnauthorizedException
     * @throws \JiraSdk\Api\Exception\FindUsersTooManyRequestsException
     */
    public function findUsers(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\FindUsers($queryParameters), $fetch);
    }

    /**
     * Finds users with a structured query and returns a [paginated](#pagination) list of user details.
     *
     * This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the structured query. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who match the structured query, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
     *
     **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * The query statements are:
     *
     *  `is assignee of PROJ` Returns the users that are assignees of at least one issue in project *PROJ*.
     *  `is assignee of (PROJ-1, PROJ-2)` Returns users that are assignees on the issues *PROJ-1* or *PROJ-2*.
     *  `is reporter of (PROJ-1, PROJ-2)` Returns users that are reporters on the issues *PROJ-1* or *PROJ-2*.
     *  `is watcher of (PROJ-1, PROJ-2)` Returns users that are watchers on the issues *PROJ-1* or *PROJ-2*.
     *  `is voter of (PROJ-1, PROJ-2)` Returns users that are voters on the issues *PROJ-1* or *PROJ-2*.
     *  `is commenter of (PROJ-1, PROJ-2)` Returns users that have posted a comment on the issues *PROJ-1* or *PROJ-2*.
     *  `is transitioner of (PROJ-1, PROJ-2)` Returns users that have performed a transition on issues *PROJ-1* or *PROJ-2*.
     *  `[propertyKey].entity.property.path is "property value"` Returns users with the entity property value.
     *
     * The list of issues can be extended as needed, as in *(PROJ-1, PROJ-2, ... PROJ-n)*. Statements can be combined using the `AND` and `OR` operators to form more complex queries. For example:
     *
     * `is assignee of PROJ AND [propertyKey].entity.property.path is "property value"`
     *
     * @param array $queryParameters {
     *
     *     @var string $query the search query
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanUser|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\FindUsersByQueryBadRequestException
     * @throws \JiraSdk\Api\Exception\FindUsersByQueryUnauthorizedException
     * @throws \JiraSdk\Api\Exception\FindUsersByQueryForbiddenException
     * @throws \JiraSdk\Api\Exception\FindUsersByQueryRequestTimeoutException
     */
    public function findUsersByQuery(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\FindUsersByQuery($queryParameters), $fetch);
    }

    /**
     * Finds users with a structured query and returns a [paginated](#pagination) list of user keys.
     *
     * This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the structured query. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who match the structured query, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
     *
     **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * The query statements are:
     *
     *  `is assignee of PROJ` Returns the users that are assignees of at least one issue in project *PROJ*.
     *  `is assignee of (PROJ-1, PROJ-2)` Returns users that are assignees on the issues *PROJ-1* or *PROJ-2*.
     *  `is reporter of (PROJ-1, PROJ-2)` Returns users that are reporters on the issues *PROJ-1* or *PROJ-2*.
     *  `is watcher of (PROJ-1, PROJ-2)` Returns users that are watchers on the issues *PROJ-1* or *PROJ-2*.
     *  `is voter of (PROJ-1, PROJ-2)` Returns users that are voters on the issues *PROJ-1* or *PROJ-2*.
     *  `is commenter of (PROJ-1, PROJ-2)` Returns users that have posted a comment on the issues *PROJ-1* or *PROJ-2*.
     *  `is transitioner of (PROJ-1, PROJ-2)` Returns users that have performed a transition on issues *PROJ-1* or *PROJ-2*.
     *  `[propertyKey].entity.property.path is "property value"` Returns users with the entity property value.
     *
     * The list of issues can be extended as needed, as in *(PROJ-1, PROJ-2, ... PROJ-n)*. Statements can be combined using the `AND` and `OR` operators to form more complex queries. For example:
     *
     * `is assignee of PROJ AND [propertyKey].entity.property.path is "property value"`
     *
     * @param array $queryParameters {
     *
     *     @var string $query the search query
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanUserKey|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\FindUserKeysByQueryBadRequestException
     * @throws \JiraSdk\Api\Exception\FindUserKeysByQueryUnauthorizedException
     * @throws \JiraSdk\Api\Exception\FindUserKeysByQueryForbiddenException
     * @throws \JiraSdk\Api\Exception\FindUserKeysByQueryRequestTimeoutException
     */
    public function findUserKeysByQuery(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\FindUserKeysByQuery($queryParameters), $fetch);
    }

    /**
     * Returns a list of users who fulfill these criteria:.
     *
     *  their user attributes match a search string.
     *  they have permission to browse issues.
     *
     * Use this resource to find users who can browse:
     *
     *  an issue, by providing the `issueKey`.
     *  any issue in a project, by providing the `projectKey`.
     *
     * This operation takes the users in the range defined by `startAt` and `maxResults`, up to the thousandth user, and then returns only the users from that range that match the search string and have permission to browse issues. This means the operation usually returns fewer users than specified in `maxResults`. To get all the users who match the search string and have permission to browse issues, use [Get all users](#api-rest-api-3-users-search-get) and filter the records in your code.
     *
     * Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg). Anonymous calls and calls by users without the required permission return empty search results.
     *
     * @param array $queryParameters {
     *
     *     @var string $query A query string that is matched against user attributes, such as `displayName` and `emailAddress`, to find relevant users. The string can match the prefix of the attribute's value. For example, *query=john* matches a user with a `displayName` of *John Smith* and a user with an `emailAddress` of *johnson@example.com*. Required, unless `accountId` is specified.
     *     @var string $username This parameter is no longer available. See the [deprecation notice](https://developer.atlassian.com/cloud/jira/platform/deprecation-notice-user-privacy-api-migration-guide/) for details.
     *     @var string $accountId A query string that is matched exactly against user `accountId`. Required, unless `query` is specified.
     *     @var string $issueKey The issue key for the issue. Required, unless `projectKey` is specified.
     *     @var string $projectKey The project key for the project (case sensitive). Required, unless `issueKey` is specified.
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\User[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\FindUsersWithBrowsePermissionBadRequestException
     * @throws \JiraSdk\Api\Exception\FindUsersWithBrowsePermissionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\FindUsersWithBrowsePermissionNotFoundException
     * @throws \JiraSdk\Api\Exception\FindUsersWithBrowsePermissionTooManyRequestsException
     */
    public function findUsersWithBrowsePermission(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\FindUsersWithBrowsePermission($queryParameters), $fetch);
    }

    /**
     * Returns a list of all users, including active users, inactive users and previously deleted users that have an Atlassian account.
     *
     * Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
     *
     **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return
     *     @var int $maxResults The maximum number of items to return.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\User[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllUsersDefaultBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAllUsersDefaultForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAllUsersDefaultConflictException
     */
    public function getAllUsersDefault(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllUsersDefault($queryParameters), $fetch);
    }

    /**
     * Returns a list of all users, including active users, inactive users and previously deleted users that have an Atlassian account.
     *
     * Privacy controls are applied to the response based on the users' preferences. This could mean, for example, that the user's email address is hidden. See the [Profile visibility overview](https://developer.atlassian.com/cloud/jira/platform/profile-visibility/) for more details.
     *
     **[Permissions](#permissions) required:** *Browse users and groups* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return
     *     @var int $maxResults The maximum number of items to return.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\User[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllUsersBadRequestException
     * @throws \JiraSdk\Api\Exception\GetAllUsersForbiddenException
     * @throws \JiraSdk\Api\Exception\GetAllUsersConflictException
     */
    public function getAllUsers(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllUsers($queryParameters), $fetch);
    }

    /**
     * Creates a project version.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project the version is added to.
     *
     * @param \JiraSdk\Api\Model\Version $requestBody
     * @param string                     $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Version|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateVersionBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateVersionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateVersionNotFoundException
     */
    public function createVersion(Model\Version $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateVersion($requestBody), $fetch);
    }

    /**
     * Deletes a project version.
     *
     * Deprecated, use [ Delete and replace version](#api-rest-api-3-version-id-removeAndSwap-post) that supports swapping version values in custom fields, in addition to the swapping for `fixVersion` and `affectedVersion` provided in this resource.
     *
     * Alternative versions can be provided to update issues that use the deleted version in `fixVersion` or `affectedVersion`. If alternatives are not provided, occurrences of `fixVersion` and `affectedVersion` that contain the deleted version are cleared.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that contains the version.
     *
     * @param string $id              the ID of the version
     * @param array  $queryParameters {
     *
     *     @var string $moveFixIssuesTo The ID of the version to update `fixVersion` to when the field contains the deleted version. The replacement version must be in the same project as the version being deleted and cannot be the version being deleted.
     *     @var string $moveAffectedIssuesTo The ID of the version to update `affectedVersion` to when the field contains the deleted version. The replacement version must be in the same project as the version being deleted and cannot be the version being deleted.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteVersionBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteVersionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteVersionNotFoundException
     */
    public function deleteVersion(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteVersion($id, $queryParameters), $fetch);
    }

    /**
     * Returns a project version.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project containing the version.
     *
     * @param string $id              the ID of the version
     * @param array  $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about version in the response. This parameter accepts a comma-separated list. Expand options include:
     *
     *  `operations` Returns the list of operations available for this version.
     *  `issuesstatus` Returns the count of issues in this version for each of the status categories *to do*, *in progress*, *done*, and *unmapped*. The *unmapped* property represents the number of issues with a status other than *to do*, *in progress*, and *done*.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Version|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetVersionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetVersionNotFoundException
     */
    public function getVersion(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetVersion($id, $queryParameters), $fetch);
    }

    /**
     * Updates a project version.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that contains the version.
     *
     * @param string                     $id          the ID of the version
     * @param \JiraSdk\Api\Model\Version $requestBody
     * @param string                     $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Version|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateVersionBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateVersionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateVersionNotFoundException
     */
    public function updateVersion(string $id, Model\Version $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateVersion($id, $requestBody), $fetch);
    }

    /**
     * Merges two project versions. The merge is completed by deleting the version specified in `id` and replacing any occurrences of its ID in `fixVersion` with the version ID specified in `moveIssuesTo`.
     *
     * Consider using [ Delete and replace version](#api-rest-api-3-version-id-removeAndSwap-post) instead. This resource supports swapping version values in `fixVersion`, `affectedVersion`, and custom fields.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that contains the version.
     *
     * @param string $id           the ID of the version to delete
     * @param string $moveIssuesTo the ID of the version to merge into
     * @param string $fetch        Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\MergeVersionsBadRequestException
     * @throws \JiraSdk\Api\Exception\MergeVersionsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\MergeVersionsNotFoundException
     */
    public function mergeVersions(string $id, string $moveIssuesTo, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\MergeVersions($id, $moveIssuesTo), $fetch);
    }

    /**
     * Modifies the version's sequence within the project, which affects the display order of the versions in Jira.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse projects* project permission for the project that contains the version.
     *
     * @param string                             $id          the ID of the version to be moved
     * @param \JiraSdk\Api\Model\VersionMoveBean $requestBody
     * @param string                             $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Version|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\MoveVersionBadRequestException
     * @throws \JiraSdk\Api\Exception\MoveVersionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\MoveVersionNotFoundException
     */
    public function moveVersion(string $id, Model\VersionMoveBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\MoveVersion($id, $requestBody), $fetch);
    }

    /**
     * Returns the following counts for a version:.
     *
     *  Number of issues where the `fixVersion` is set to the version.
     *  Number of issues where the `affectedVersion` is set to the version.
     *  Number of issues where a version custom field is set to the version.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse projects* project permission for the project that contains the version.
     *
     * @param string $id    the ID of the version
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\VersionIssueCounts|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetVersionRelatedIssuesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetVersionRelatedIssuesNotFoundException
     */
    public function getVersionRelatedIssues(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetVersionRelatedIssues($id), $fetch);
    }

    /**
     * Deletes a project version.
     *
     * Alternative versions can be provided to update issues that use the deleted version in `fixVersion`, `affectedVersion`, or any version picker custom fields. If alternatives are not provided, occurrences of `fixVersion`, `affectedVersion`, and any version picker custom field, that contain the deleted version, are cleared. Any replacement version must be in the same project as the version being deleted and cannot be the version being deleted.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project that contains the version.
     *
     * @param string                                         $id          the ID of the version
     * @param \JiraSdk\Api\Model\DeleteAndReplaceVersionBean $requestBody
     * @param string                                         $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteAndReplaceVersionBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteAndReplaceVersionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteAndReplaceVersionNotFoundException
     */
    public function deleteAndReplaceVersion(string $id, Model\DeleteAndReplaceVersionBean $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteAndReplaceVersion($id, $requestBody), $fetch);
    }

    /**
     * Returns counts of the issues and unresolved issues for the project version.
     *
     * This operation can be accessed anonymously.
     *
     **[Permissions](#permissions) required:** *Browse projects* project permission for the project that contains the version.
     *
     * @param string $id    the ID of the version
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\VersionUnresolvedIssuesCount|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetVersionUnresolvedIssuesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetVersionUnresolvedIssuesNotFoundException
     */
    public function getVersionUnresolvedIssues(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetVersionUnresolvedIssues($id), $fetch);
    }

    /**
     * Removes webhooks by ID. Only webhooks registered by the calling app are removed. If webhooks created by other apps are specified, they are ignored.
     **[Permissions](#permissions) required:** Only [Connect](https://developer.atlassian.com/cloud/jira/platform/#connect-apps) and [OAuth 2.0](https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps) apps can use this operation.
     *
     * @param \JiraSdk\Api\Model\ContainerForWebhookIDs $requestBody
     * @param string                                    $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteWebhookByIdBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteWebhookByIdForbiddenException
     */
    public function deleteWebhookById(Model\ContainerForWebhookIDs $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteWebhookById($requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of the webhooks registered by the calling app.
     **[Permissions](#permissions) required:** Only [Connect](https://developer.atlassian.com/cloud/jira/platform/#connect-apps) and [OAuth 2.0](https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps) apps can use this operation.
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanWebhook|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetDynamicWebhooksForAppBadRequestException
     * @throws \JiraSdk\Api\Exception\GetDynamicWebhooksForAppForbiddenException
     */
    public function getDynamicWebhooksForApp(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetDynamicWebhooksForApp($queryParameters), $fetch);
    }

    /**
     * Registers webhooks.
     **NOTE:** for non-public OAuth apps, webhooks are delivered only if there is a match between the app owner and the user who registered a dynamic webhook.
     **[Permissions](#permissions) required:** Only [Connect](https://developer.atlassian.com/cloud/jira/platform/#connect-apps) and [OAuth 2.0](https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps) apps can use this operation.
     *
     * @param \JiraSdk\Api\Model\WebhookRegistrationDetails $requestBody
     * @param string                                        $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ContainerForRegisteredWebhooks|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RegisterDynamicWebhooksBadRequestException
     * @throws \JiraSdk\Api\Exception\RegisterDynamicWebhooksForbiddenException
     */
    public function registerDynamicWebhooks(Model\WebhookRegistrationDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RegisterDynamicWebhooks($requestBody), $fetch);
    }

    /**
     * Returns webhooks that have recently failed to be delivered to the requesting app after the maximum number of retries.
     *
     * After 72 hours the failure may no longer be returned by this operation.
     *
     * The oldest failure is returned first.
     *
     * This method uses a cursor-based pagination. To request the next page use the failure time of the last webhook on the list as the `failedAfter` value or use the URL provided in `next`.
     *
     **[Permissions](#permissions) required:** Only [Connect apps](https://developer.atlassian.com/cloud/jira/platform/index/#connect-apps) can use this operation.
     *
     * @param array $queryParameters {
     *
     *     @var int $maxResults The maximum number of webhooks to return per page. If obeying the maxResults directive would result in records with the same failure time being split across pages, the directive is ignored and all records with the same failure time included on the page.
     *     @var int $after The time after which any webhook failure must have occurred for the record to be returned, expressed as milliseconds since the UNIX epoch.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\FailedWebhooks|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetFailedWebhooksBadRequestException
     * @throws \JiraSdk\Api\Exception\GetFailedWebhooksForbiddenException
     */
    public function getFailedWebhooks(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetFailedWebhooks($queryParameters), $fetch);
    }

    /**
     * Extends the life of webhook. Webhooks registered through the REST API expire after 30 days. Call this operation to keep them alive.
     *
     * Unrecognized webhook IDs (those that are not found or belong to other apps) are ignored.
     *
     **[Permissions](#permissions) required:** Only [Connect](https://developer.atlassian.com/cloud/jira/platform/#connect-apps) and [OAuth 2.0](https://developer.atlassian.com/cloud/jira/platform/oauth-2-3lo-apps) apps can use this operation.
     *
     * @param \JiraSdk\Api\Model\ContainerForWebhookIDs $requestBody
     * @param string                                    $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WebhooksExpirationDate|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\RefreshWebhooksBadRequestException
     * @throws \JiraSdk\Api\Exception\RefreshWebhooksForbiddenException
     */
    public function refreshWebhooks(Model\ContainerForWebhookIDs $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\RefreshWebhooks($requestBody), $fetch);
    }

    /**
     * Returns all workflows in Jira or a workflow. Deprecated, use [Get workflows paginated](#api-rest-api-3-workflow-search-get).
     *
     * If the `workflowName` parameter is specified, the workflow is returned as an object (not in an array). Otherwise, an array of workflow objects is returned.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var string $workflowName The name of the workflow to be returned. Only one workflow can be specified.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\DeprecatedWorkflow[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllWorkflowsUnauthorizedException
     */
    public function getAllWorkflows(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllWorkflows($queryParameters), $fetch);
    }

    /**
     * Creates a workflow. You can define transition rules using the shapes detailed in the following sections. If no transitional rules are specified the default system transition rules are used.
     *
     * #### Conditions ####
     *
     * Conditions enable workflow rules that govern whether a transition can execute.
     *
     * ##### Always false condition #####
     *
     * A condition that always fails.
     *
     * {
     * "type": "AlwaysFalseCondition"
     * }
     *
     * ##### Block transition until approval #####
     *
     * A condition that blocks issue transition if there is a pending approval.
     *
     * {
     * "type": "BlockInProgressApprovalCondition"
     * }
     *
     * ##### Compare number custom field condition #####
     *
     * A condition that allows transition if a comparison between a number custom field and a value is true.
     *
     * {
     * "type": "CompareNumberCFCondition",
     * "configuration": {
     * "comparator": "=",
     * "fieldId": "customfield_10029",
     * "fieldValue": 2
     * }
     * }
     *
     *  `comparator` One of the supported comparator: `=`, `>`, and `<`.
     *  `fieldId` The custom numeric field ID. Allowed field types:
     *
     *  `com.atlassian.jira.plugin.system.customfieldtypes:float`
     *  `com.pyxis.greenhopper.jira:jsw-story-points`
     *  `fieldValue` The value for comparison.
     *
     * ##### Hide from user condition #####
     *
     * A condition that hides a transition from users. The transition can only be triggered from a workflow function or REST API operation.
     *
     * {
     * "type": "RemoteOnlyCondition"
     * }
     *
     * ##### Only assignee condition #####
     *
     * A condition that allows only the assignee to execute a transition.
     *
     * {
     * "type": "AllowOnlyAssignee"
     * }
     *
     * ##### Only Bamboo notifications workflow condition #####
     *
     * A condition that makes the transition available only to Bamboo build notifications.
     *
     * {
     * "type": "OnlyBambooNotificationsCondition"
     * }
     *
     * ##### Only reporter condition #####
     *
     * A condition that allows only the reporter to execute a transition.
     *
     * {
     * "type": "AllowOnlyReporter"
     * }
     *
     * ##### Permission condition #####
     *
     * A condition that allows only users with a permission to execute a transition.
     *
     * {
     * "type": "PermissionCondition",
     * "configuration": {
     * "permissionKey": "BROWSE_PROJECTS"
     * }
     * }
     *
     *  `permissionKey` The permission required to perform the transition. Allowed values: [built-in](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#built-in-permissions) or app defined permissions.
     *
     * ##### Previous status condition #####
     *
     * A condition that allows a transition based on whether an issue has or has not transitioned through a status.
     *
     * {
     * "type": "PreviousStatusCondition",
     * "configuration": {
     * "ignoreLoopTransitions": true,
     * "includeCurrentStatus": true,
     * "mostRecentStatusOnly": true,
     * "reverseCondition": true,
     * "previousStatus": {
     * "id": "5"
     * }
     * }
     * }
     *
     * By default this condition allows the transition if the status, as defined by its ID in the `previousStatus` object, matches any previous issue status, unless:
     *
     *  `ignoreLoopTransitions` is `true`, then loop transitions (from and to the same status) are ignored.
     *  `includeCurrentStatus` is `true`, then the current issue status is also checked.
     *  `mostRecentStatusOnly` is `true`, then only the issue's preceding status (the one immediately before the current status) is checked.
     *  `reverseCondition` is `true`, then the status must not be present.
     *
     * ##### Separation of duties condition #####
     *
     * A condition that prevents a user to perform the transition, if the user has already performed a transition on the issue.
     *
     * {
     * "type": "SeparationOfDutiesCondition",
     * "configuration": {
     * "fromStatus": {
     * "id": "5"
     * },
     * "toStatus": {
     * "id": "6"
     * }
     * }
     * }
     *
     *  `fromStatus` OPTIONAL. An object containing the ID of the source status of the transition that is blocked. If omitted any transition to `toStatus` is blocked.
     *  `toStatus` An object containing the ID of the target status of the transition that is blocked.
     *
     * ##### Subtask blocking condition #####
     *
     * A condition that blocks transition on a parent issue if any of its subtasks are in any of one or more statuses.
     *
     * {
     * "type": "SubTaskBlockingCondition",
     * "configuration": {
     * "statuses": [
     * {
     * "id": "1"
     * },
     * {
     * "id": "3"
     * }
     * ]
     * }
     * }
     *
     *  `statuses` A list of objects containing status IDs.
     *
     * ##### User is in any group condition #####
     *
     * A condition that allows users belonging to any group from a list of groups to execute a transition.
     *
     * {
     * "type": "UserInAnyGroupCondition",
     * "configuration": {
     * "groups": [
     * "administrators",
     * "atlassian-addons-admin"
     * ]
     * }
     * }
     *
     *  `groups` A list of group names.
     *
     * ##### User is in any project role condition #####
     *
     * A condition that allows only users with at least one project roles from a list of project roles to execute a transition.
     *
     * {
     * "type": "InAnyProjectRoleCondition",
     * "configuration": {
     * "projectRoles": [
     * {
     * "id": "10002"
     * },
     * {
     * "id": "10003"
     * },
     * {
     * "id": "10012"
     * },
     * {
     * "id": "10013"
     * }
     * ]
     * }
     * }
     *
     *  `projectRoles` A list of objects containing project role IDs.
     *
     * ##### User is in custom field condition #####
     *
     * A condition that allows only users listed in a given custom field to execute the transition.
     *
     * {
     * "type": "UserIsInCustomFieldCondition",
     * "configuration": {
     * "allowUserInField": false,
     * "fieldId": "customfield_10010"
     * }
     * }
     *
     *  `allowUserInField` If `true` only a user who is listed in `fieldId` can perform the transition, otherwise, only a user who is not listed in `fieldId` can perform the transition.
     *  `fieldId` The ID of the field containing the list of users.
     *
     * ##### User is in group condition #####
     *
     * A condition that allows users belonging to a group to execute a transition.
     *
     * {
     * "type": "UserInGroupCondition",
     * "configuration": {
     * "group": "administrators"
     * }
     * }
     *
     *  `group` The name of the group.
     *
     * ##### User is in group custom field condition #####
     *
     * A condition that allows users belonging to a group specified in a custom field to execute a transition.
     *
     * {
     * "type": "InGroupCFCondition",
     * "configuration": {
     * "fieldId": "customfield_10012"
     * }
     * }
     *
     *  `fieldId` The ID of the field. Allowed field types:
     *
     *  `com.atlassian.jira.plugin.system.customfieldtypes:multigrouppicker`
     *  `com.atlassian.jira.plugin.system.customfieldtypes:grouppicker`
     *  `com.atlassian.jira.plugin.system.customfieldtypes:select`
     *  `com.atlassian.jira.plugin.system.customfieldtypes:multiselect`
     *  `com.atlassian.jira.plugin.system.customfieldtypes:radiobuttons`
     *  `com.atlassian.jira.plugin.system.customfieldtypes:multicheckboxes`
     *  `com.pyxis.greenhopper.jira:gh-epic-status`
     *
     * ##### User is in project role condition #####
     *
     * A condition that allows users with a project role to execute a transition.
     *
     * {
     * "type": "InProjectRoleCondition",
     * "configuration": {
     * "projectRole": {
     * "id": "10002"
     * }
     * }
     * }
     *
     *  `projectRole` An object containing the ID of a project role.
     *
     * ##### Value field condition #####
     *
     * A conditions that allows a transition to execute if the value of a field is equal to a constant value or simply set.
     *
     * {
     * "type": "ValueFieldCondition",
     * "configuration": {
     * "fieldId": "assignee",
     * "fieldValue": "qm:6e1ecee6-8e64-4db6-8c85-916bb3275f51:54b56885-2bd2-4381-8239-78263442520f",
     * "comparisonType": "NUMBER",
     * "comparator": "="
     * }
     * }
     *
     *  `fieldId` The ID of a field used in the comparison.
     *  `fieldValue` The expected value of the field.
     *  `comparisonType` The type of the comparison. Allowed values: `STRING`, `NUMBER`, `DATE`, `DATE_WITHOUT_TIME`, or `OPTIONID`.
     *  `comparator` One of the supported comparator: `>`, `>=`, `=`, `<=`, `<`, `!=`.
     *
     **Notes:**
     *
     *  If you choose the comparison type `STRING`, only `=` and `!=` are valid options.
     *  You may leave `fieldValue` empty when comparison type is `!=` to indicate that a value is required in the field.
     *  For date fields without time format values as `yyyy-MM-dd`, and for those with time as `yyyy-MM-dd HH:mm`. For example, for July 16 2021 use `2021-07-16`, for 8:05 AM use `2021-07-16 08:05`, and for 4 PM: `2021-07-16 16:00`.
     *
     * #### Validators ####
     *
     * Validators check that any input made to the transition is valid before the transition is performed.
     *
     * ##### Date field validator #####
     *
     * A validator that compares two dates.
     *
     * {
     * "type": "DateFieldValidator",
     * "configuration": {
     * "comparator": ">",
     * "date1": "updated",
     * "date2": "created",
     * "expression": "1d",
     * "includeTime": true
     * }
     * }
     *
     *  `comparator` One of the supported comparator: `>`, `>=`, `=`, `<=`, `<`, or `!=`.
     *  `date1` The date field to validate. Allowed field types:
     *
     *  `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`
     *  `com.atlassian.jira.plugin.system.customfieldtypes:datetime`
     *  `com.atlassian.jpo:jpo-custom-field-baseline-end`
     *  `com.atlassian.jpo:jpo-custom-field-baseline-start`
     *  `duedate`
     *  `created`
     *  `updated`
     *  `resolutiondate`
     *  `date2` The second date field. Required, if `expression` is not passed. Allowed field types:
     *
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
     *
     * ##### Windows date validator #####
     *
     * A validator that checks that a date falls on or after a reference date and before or on the reference date plus a number of days.
     *
     * {
     * "type": "WindowsDateValidator",
     * "configuration": {
     * "date1": "customfield_10009",
     * "date2": "created",
     * "windowsDays": 5
     * }
     * }
     *
     *  `date1` The date field to validate. Allowed field types:
     *
     *  `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`
     *  `com.atlassian.jira.plugin.system.customfieldtypes:datetime`
     *  `com.atlassian.jpo:jpo-custom-field-baseline-end`
     *  `com.atlassian.jpo:jpo-custom-field-baseline-start`
     *  `duedate`
     *  `created`
     *  `updated`
     *  `resolutiondate`
     *  `date2` The reference date. Allowed field types:
     *
     *  `com.atlassian.jira.plugin.system.customfieldtypes:datepicker`
     *  `com.atlassian.jira.plugin.system.customfieldtypes:datetime`
     *  `com.atlassian.jpo:jpo-custom-field-baseline-end`
     *  `com.atlassian.jpo:jpo-custom-field-baseline-start`
     *  `duedate`
     *  `created`
     *  `updated`
     *  `resolutiondate`
     *  `windowsDays` A positive integer indicating a number of days.
     *
     * ##### Field required validator #####
     *
     * A validator that checks fields are not empty. By default, if a field is not included in the current context it's ignored and not validated.
     *
     * {
     * "type": "FieldRequiredValidator",
     * "configuration": {
     * "ignoreContext": true,
     * "errorMessage": "Hey",
     * "fieldIds": [
     * "versions",
     * "customfield_10037",
     * "customfield_10003"
     * ]
     * }
     * }
     *
     *  `ignoreContext` If `true`, then the context is ignored and all the fields are validated.
     *  `errorMessage` OPTIONAL. The error message displayed when one or more fields are empty. A default error message is shown if an error message is not provided.
     *  `fieldIds` The list of fields to validate.
     *
     * ##### Field changed validator #####
     *
     * A validator that checks that a field value is changed. However, this validation can be ignored for users from a list of groups.
     *
     * {
     * "type": "FieldChangedValidator",
     * "configuration": {
     * "fieldId": "comment",
     * "errorMessage": "Hey",
     * "exemptedGroups": [
     * "administrators",
     * "atlassian-addons-admin"
     * ]
     * }
     * }
     *
     *  `fieldId` The ID of a field.
     *  `errorMessage` OPTIONAL. The error message displayed if the field is not changed. A default error message is shown if the error message is not provided.
     *  `exemptedGroups` OPTIONAL. The list of groups.
     *
     * ##### Field has single value validator #####
     *
     * A validator that checks that a multi-select field has only one value. Optionally, the validation can ignore values copied from subtasks.
     *
     * {
     * "type": "FieldHasSingleValueValidator",
     * "configuration": {
     * "fieldId": "attachment,
     * "excludeSubtasks": true
     * }
     * }
     *
     *  `fieldId` The ID of a field.
     *  `excludeSubtasks` If `true`, then values copied from subtasks are ignored.
     *
     * ##### Parent status validator #####
     *
     * A validator that checks the status of the parent issue of a subtask. Ìf the issue is not a subtask, no validation is performed.
     *
     * {
     * "type": "ParentStatusValidator",
     * "configuration": {
     * "parentStatuses": [
     * {
     * "id":"1"
     * },
     * {
     * "id":"2"
     * }
     * ]
     * }
     * }
     *
     *  `parentStatus` The list of required parent issue statuses.
     *
     * ##### Permission validator #####
     *
     * A validator that checks the user has a permission.
     *
     * {
     * "type": "PermissionValidator",
     * "configuration": {
     * "permissionKey": "ADMINISTER_PROJECTS"
     * }
     * }
     *
     *  `permissionKey` The permission required to perform the transition. Allowed values: [built-in](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#built-in-permissions) or app defined permissions.
     *
     * ##### Previous status validator #####
     *
     * A validator that checks if the issue has held a status.
     *
     * {
     * "type": "PreviousStatusValidator",
     * "configuration": {
     * "mostRecentStatusOnly": false,
     * "previousStatus": {
     * "id": "15"
     * }
     * }
     * }
     *
     *  `mostRecentStatusOnly` If `true`, then only the issue's preceding status (the one immediately before the current status) is checked.
     *  `previousStatus` An object containing the ID of an issue status.
     *
     * ##### Regular expression validator #####
     *
     * A validator that checks the content of a field against a regular expression.
     *
     * {
     * "type": "RegexpFieldValidator",
     * "configuration": {
     * "regExp": "[0-9]",
     * "fieldId": "customfield_10029"
     * }
     * }
     *
     *  `regExp`A regular expression.
     *  `fieldId` The ID of a field. Allowed field types:
     *
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
     *
     * ##### User permission validator #####
     *
     * A validator that checks if a user has a permission. Obsolete. You may encounter this validator when getting transition rules and can pass it when updating or creating rules, for example, when you want to duplicate the rules from a workflow on a new workflow.
     *
     * {
     * "type": "UserPermissionValidator",
     * "configuration": {
     * "permissionKey": "BROWSE_PROJECTS",
     * "nullAllowed": false,
     * "username": "TestUser"
     * }
     * }
     *
     *  `permissionKey` The permission to be validated. Allowed values: [built-in](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-permission-schemes/#built-in-permissions) or app defined permissions.
     *  `nullAllowed` If `true`, allows the transition when `username` is empty.
     *  `username` The username to validate against the `permissionKey`.
     *
     * #### Post functions ####
     *
     * Post functions carry out any additional processing required after a Jira workflow transition is executed.
     *
     * ##### Fire issue event function #####
     *
     * A post function that fires an event that is processed by the listeners.
     *
     * {
     * "type": "FireIssueEventFunction",
     * "configuration": {
     * "event": {
     * "id":"1"
     * }
     * }
     * }
     *
     **Note:** If provided, this post function overrides the default `FireIssueEventFunction`. Can be included once in a transition.
     *
     *  `event` An object containing the ID of the issue event.
     *
     * ##### Update issue status #####
     *
     * A post function that sets issue status to the linked status of the destination workflow status.
     *
     * {
     * "type": "UpdateIssueStatusFunction"
     * }
     *
     **Note:** This post function is a default function in global and directed transitions. It can only be added to the initial transition and can only be added once.
     *
     * ##### Create comment #####
     *
     * A post function that adds a comment entered during the transition to an issue.
     *
     * {
     * "type": "CreateCommentFunction"
     * }
     *
     **Note:** This post function is a default function in global and directed transitions. It can only be added to the initial transition and can only be added once.
     *
     * ##### Store issue #####
     *
     * A post function that stores updates to an issue.
     *
     * {
     * "type": "IssueStoreFunction"
     * }
     *
     **Note:** This post function can only be added to the initial transition and can only be added once.
     *
     * ##### Assign to current user function #####
     *
     * A post function that assigns the issue to the current user if the current user has the `ASSIGNABLE_USER` permission.
     *
     * {
     * "type": "AssignToCurrentUserFunction"
     * }
     *
     **Note:** This post function can be included once in a transition.
     *
     * ##### Assign to lead function #####
     *
     * A post function that assigns the issue to the project or component lead developer.
     *
     * {
     * "type": "AssignToLeadFunction"
     * }
     *
     **Note:** This post function can be included once in a transition.
     *
     * ##### Assign to reporter function #####
     *
     * A post function that assigns the issue to the reporter.
     *
     * {
     * "type": "AssignToReporterFunction"
     * }
     *
     **Note:** This post function can be included once in a transition.
     *
     * ##### Clear field value function #####
     *
     * A post function that clears the value from a field.
     *
     * {
     * "type": "ClearFieldValuePostFunction",
     * "configuration": {
     * "fieldId": "assignee"
     * }
     * }
     *
     *  `fieldId` The ID of the field.
     *
     * ##### Copy value from other field function #####
     *
     * A post function that copies the value of one field to another, either within an issue or from parent to subtask.
     *
     * {
     * "type": "CopyValueFromOtherFieldPostFunction",
     * "configuration": {
     * "sourceFieldId": "assignee",
     * "destinationFieldId": "creator",
     * "copyType": "same"
     * }
     * }
     *
     *  `sourceFieldId` The ID of the source field.
     *  `destinationFieldId` The ID of the destination field.
     *  `copyType` Use `same` to copy the value from a field inside the issue, or `parent` to copy the value from the parent issue.
     *
     * ##### Create Crucible review workflow function #####
     *
     * A post function that creates a Crucible review for all unreviewed code for the issue.
     *
     * {
     * "type": "CreateCrucibleReviewWorkflowFunction"
     * }
     *
     **Note:** This post function can be included once in a transition.
     *
     * ##### Set issue security level based on user's project role function #####
     *
     * A post function that sets the issue's security level if the current user has a project role.
     *
     * {
     * "type": "SetIssueSecurityFromRoleFunction",
     * "configuration": {
     * "projectRole": {
     * "id":"10002"
     * },
     * "issueSecurityLevel": {
     * "id":"10000"
     * }
     * }
     * }
     *
     *  `projectRole` An object containing the ID of the project role.
     *  `issueSecurityLevel` OPTIONAL. The object containing the ID of the security level. If not passed, then the security level is set to `none`.
     *
     * ##### Trigger a webhook function #####
     *
     * A post function that triggers a webhook.
     *
     * {
     * "type": "TriggerWebhookFunction",
     * "configuration": {
     * "webhook": {
     * "id": "1"
     * }
     * }
     * }
     *
     *  `webhook` An object containing the ID of the webhook listener to trigger.
     *
     * ##### Update issue custom field function #####
     *
     * A post function that updates the content of an issue custom field.
     *
     * {
     * "type": "UpdateIssueCustomFieldPostFunction",
     * "configuration": {
     * "mode": "append",
     * "fieldId": "customfield_10003",
     * "fieldValue": "yikes"
     * }
     * }
     *
     *  `mode` Use `replace` to override the field content with `fieldValue` or `append` to add `fieldValue` to the end of the field content.
     *  `fieldId` The ID of the field.
     *  `fieldValue` The update content.
     *
     * ##### Update issue field function #####
     *
     * A post function that updates a simple issue field.
     *
     * {
     * "type": "UpdateIssueFieldFunction",
     * "configuration": {
     * "fieldId": "assignee",
     * "fieldValue": "5f0c277e70b8a90025a00776"
     * }
     * }
     *
     *  `fieldId` The ID of the field. Allowed field types:
     *
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
     *
     *  an account ID.
     *  `automatic`.
     *  a blank string, which sets the value to `unassigned`.
     *
     * #### Connect rules ####
     *
     * Connect rules are conditions, validators, and post functions of a transition that are registered by Connect apps. To create a rule registered by the app, the app must be enabled and the rule's module must exist.
     *
     * {
     * "type": "appKey__moduleKey",
     * "configuration": {
     * "value":"{\"isValid\":\"true\"}"
     * }
     * }
     *
     *  `type` A Connect rule key in a form of `appKey__moduleKey`.
     *  `value` The stringified JSON configuration of a Connect rule.
     *
     * #### Forge rules ####
     *
     * Forge transition rules are not yet supported.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\CreateWorkflowDetails $requestBody
     * @param string                                   $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowIDs|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateWorkflowBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateWorkflowUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateWorkflowForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateWorkflowNotFoundException
     */
    public function createWorkflow(Model\CreateWorkflowDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateWorkflow($requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of workflows with transition rules. The workflows can be filtered to return only those containing workflow transition rules:.
     *
     *  of one or more transition rule types, such as [workflow post functions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/).
     *  matching one or more transition rule keys.
     *
     * Only workflows containing transition rules created by the calling Connect app are returned.
     *
     * Due to server-side optimizations, workflows with an empty list of rules may be returned; these workflows can be ignored.
     *
     **[Permissions](#permissions) required:** Only Connect apps can use this operation.
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $types the types of the transition rules to return
     *     @var array $keys the transition rule class keys, as defined in the Connect app descriptor, of the transition rules to return
     *     @var array $workflowNames EXPERIMENTAL: The list of workflow names to filter by
     *     @var array $withTags EXPERIMENTAL: The list of `tags` to filter by
     *     @var bool $draft EXPERIMENTAL: Whether draft or published workflows are returned. If not provided, both workflow types are returned.
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts `transition`, which, for each rule, returns information about the transition the rule is assigned to.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanWorkflowTransitionRules|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorkflowTransitionRuleConfigurationsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetWorkflowTransitionRuleConfigurationsForbiddenException
     * @throws \JiraSdk\Api\Exception\GetWorkflowTransitionRuleConfigurationsNotFoundException
     */
    public function getWorkflowTransitionRuleConfigurations(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetWorkflowTransitionRuleConfigurations($queryParameters), $fetch);
    }

    /**
     * Updates configuration of workflow transition rules. The following rule types are supported:.
     *
     *  [post functions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/)
     *  [conditions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-condition/)
     *  [validators](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-validator/)
     *
     * Only rules created by the calling Connect app can be updated.
     *
     * To assist with app migration, this operation can be used to:
     *
     *  Disable a rule.
     *  Add a `tag`. Use this to filter rules in the [Get workflow transition rule configurations](https://developer.atlassian.com/cloud/jira/platform/rest/v3/api-group-workflow-transition-rules/#api-rest-api-3-workflow-rule-config-get).
     *
     * Rules are enabled if the `disabled` parameter is not provided.
     *
     **[Permissions](#permissions) required:** Only Connect apps can use this operation.
     *
     * @param \JiraSdk\Api\Model\WorkflowTransitionRulesUpdate $requestBody
     * @param string                                           $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowTransitionRulesUpdateErrors|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowTransitionRuleConfigurationsBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowTransitionRuleConfigurationsForbiddenException
     */
    public function updateWorkflowTransitionRuleConfigurations(Model\WorkflowTransitionRulesUpdate $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateWorkflowTransitionRuleConfigurations($requestBody), $fetch);
    }

    /**
     * Deletes workflow transition rules from one or more workflows. These rule types are supported:.
     *
     *  [post functions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-post-function/)
     *  [conditions](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-condition/)
     *  [validators](https://developer.atlassian.com/cloud/jira/platform/modules/workflow-validator/)
     *
     * Only rules created by the calling Connect app can be deleted.
     *
     **[Permissions](#permissions) required:** Only Connect apps can use this operation.
     *
     * @param \JiraSdk\Api\Model\WorkflowsWithTransitionRulesDetails $requestBody
     * @param string                                                 $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowTransitionRulesUpdateErrors|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowTransitionRuleConfigurationsBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowTransitionRuleConfigurationsForbiddenException
     */
    public function deleteWorkflowTransitionRuleConfigurations(Model\WorkflowsWithTransitionRulesDetails $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteWorkflowTransitionRuleConfigurations($requestBody), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of published classic workflows. When workflow names are specified, details of those workflows are returned. Otherwise, all published classic workflows are returned.
     *
     * This operation does not return next-gen workflows.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults the maximum number of items to return per page
     *     @var array $workflowName The name of a workflow to return. To include multiple workflows, provide an ampersand-separated list. For example, `workflowName=name1&workflowName=name2`.
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Expand options include:
     *
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
     *     @var string $queryString string used to perform a case-insensitive partial match with workflow name
     *     @var string $orderBy [Order](#ordering) the results by a field:
     *
     *  `name` Sorts by workflow name.
     *  `created` Sorts by create time.
     *  `updated` Sorts by update time.
     *     @var bool $isActive Filters active and inactive workflows.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanWorkflow|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorkflowsPaginatedUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetWorkflowsPaginatedForbiddenException
     */
    public function getWorkflowsPaginated(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetWorkflowsPaginated($queryParameters), $fetch);
    }

    /**
     * Deletes a property from a workflow transition. Transition properties are used to change the behavior of a transition. For more information, see [Transition properties](https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties) and [Workflow properties](https://confluence.atlassian.com/x/JYlKLg).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $transitionId    The ID of the transition. To get the ID, view the workflow in text mode in the Jira admin settings. The ID is shown next to the transition.
     * @param array $queryParameters {
     *
     *     @var string $key the name of the transition property to delete, also known as the name of the property
     *     @var string $workflowName the name of the workflow that the transition belongs to
     *     @var string $workflowMode The workflow status. Set to `live` for inactive workflows or `draft` for draft workflows. Active workflows cannot be edited.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowTransitionPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowTransitionPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowTransitionPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowTransitionPropertyNotFoundException
     */
    public function deleteWorkflowTransitionProperty(int $transitionId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteWorkflowTransitionProperty($transitionId, $queryParameters), $fetch);
    }

    /**
     * Returns the properties on a workflow transition. Transition properties are used to change the behavior of a transition. For more information, see [Transition properties](https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties) and [Workflow properties](https://confluence.atlassian.com/x/JYlKLg).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $transitionId    The ID of the transition. To get the ID, view the workflow in text mode in the Jira administration console. The ID is shown next to the transition.
     * @param array $queryParameters {
     *
     *     @var bool $includeReservedKeys Some properties with keys that have the *jira.* prefix are reserved, which means they are not editable. To include these properties in the results, set this parameter to *true*.
     *     @var string $key The key of the property being returned, also known as the name of the property. If this parameter is not specified, all properties on the transition are returned.
     *     @var string $workflowName the name of the workflow that the transition belongs to
     *     @var string $workflowMode The workflow status. Set to *live* for active and inactive workflows, or *draft* for draft workflows.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowTransitionProperty|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorkflowTransitionPropertiesBadRequestException
     * @throws \JiraSdk\Api\Exception\GetWorkflowTransitionPropertiesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetWorkflowTransitionPropertiesForbiddenException
     * @throws \JiraSdk\Api\Exception\GetWorkflowTransitionPropertiesNotFoundException
     */
    public function getWorkflowTransitionProperties(int $transitionId, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetWorkflowTransitionProperties($transitionId, $queryParameters), $fetch);
    }

    /**
     * Adds a property to a workflow transition. Transition properties are used to change the behavior of a transition. For more information, see [Transition properties](https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties) and [Workflow properties](https://confluence.atlassian.com/x/JYlKLg).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                           $transitionId    The ID of the transition. To get the ID, view the workflow in text mode in the Jira admin settings. The ID is shown next to the transition.
     * @param \JiraSdk\Api\Model\WorkflowTransitionProperty $requestBody
     * @param array                                         $queryParameters {
     *
     *     @var string $key The key of the property being added, also known as the name of the property. Set this to the same value as the `key` defined in the request body.
     *     @var string $workflowName the name of the workflow that the transition belongs to
     *     @var string $workflowMode The workflow status. Set to *live* for inactive workflows or *draft* for draft workflows. Active workflows cannot be edited.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowTransitionProperty|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateWorkflowTransitionPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateWorkflowTransitionPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateWorkflowTransitionPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\CreateWorkflowTransitionPropertyNotFoundException
     */
    public function createWorkflowTransitionProperty(int $transitionId, Model\WorkflowTransitionProperty $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateWorkflowTransitionProperty($transitionId, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Updates a workflow transition by changing the property value. Trying to update a property that does not exist results in a new property being added to the transition. Transition properties are used to change the behavior of a transition. For more information, see [Transition properties](https://confluence.atlassian.com/x/zIhKLg#Advancedworkflowconfiguration-transitionproperties) and [Workflow properties](https://confluence.atlassian.com/x/JYlKLg).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                           $transitionId    The ID of the transition. To get the ID, view the workflow in text mode in the Jira admin settings. The ID is shown next to the transition.
     * @param \JiraSdk\Api\Model\WorkflowTransitionProperty $requestBody
     * @param array                                         $queryParameters {
     *
     *     @var string $key The key of the property being updated, also known as the name of the property. Set this to the same value as the `key` defined in the request body.
     *     @var string $workflowName the name of the workflow that the transition belongs to
     *     @var string $workflowMode The workflow status. Set to `live` for inactive workflows or `draft` for draft workflows. Active workflows cannot be edited.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowTransitionProperty|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowTransitionPropertyBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowTransitionPropertyUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowTransitionPropertyForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowTransitionPropertyNotFoundException
     */
    public function updateWorkflowTransitionProperty(int $transitionId, Model\WorkflowTransitionProperty $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateWorkflowTransitionProperty($transitionId, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Deletes a workflow.
     *
     * The workflow cannot be deleted if it is:
     *
     *  an active workflow.
     *  a system workflow.
     *  associated with any workflow scheme.
     *  associated with any draft workflow scheme.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $entityId the entity ID of the workflow
     * @param string $fetch    Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteInactiveWorkflowBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteInactiveWorkflowUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteInactiveWorkflowForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteInactiveWorkflowNotFoundException
     */
    public function deleteInactiveWorkflow(string $entityId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteInactiveWorkflow($entityId), $fetch);
    }

    /**
     * Returns a [paginated](#pagination) list of all workflow schemes, not including draft workflow schemes.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var int $startAt the index of the first item to return in a page of results (page offset)
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PageBeanWorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetAllWorkflowSchemesUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetAllWorkflowSchemesForbiddenException
     */
    public function getAllWorkflowSchemes(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetAllWorkflowSchemes($queryParameters), $fetch);
    }

    /**
     * Creates a workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\WorkflowScheme $requestBody
     * @param string                            $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateWorkflowSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateWorkflowSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateWorkflowSchemeForbiddenException
     */
    public function createWorkflowScheme(Model\WorkflowScheme $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateWorkflowScheme($requestBody), $fetch);
    }

    /**
     * Returns a list of the workflow schemes associated with a list of projects. Each returned workflow scheme includes a list of the requested projects associated with it. Any team-managed or non-existent projects in the request are ignored and no errors are returned.
     *
     * If the project is associated with the `Default Workflow Scheme` no ID is returned. This is because the way the `Default Workflow Scheme` is stored means it has no ID.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param array $queryParameters {
     *
     *     @var array $projectId The ID of a project to return the workflow schemes for. To include multiple projects, provide an ampersand-Jim: oneseparated list. For example, `projectId=10000&projectId=10001`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ContainerOfWorkflowSchemeAssociations|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeProjectAssociationsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeProjectAssociationsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeProjectAssociationsForbiddenException
     */
    public function getWorkflowSchemeProjectAssociations(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetWorkflowSchemeProjectAssociations($queryParameters), $fetch);
    }

    /**
     * Assigns a workflow scheme to a project. This operation is performed only when there are no issues in the project.
     *
     * Workflow schemes can only be assigned to classic projects.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Api\Model\WorkflowSchemeProjectAssociation $requestBody
     * @param string                                              $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AssignSchemeToProjectBadRequestException
     * @throws \JiraSdk\Api\Exception\AssignSchemeToProjectUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AssignSchemeToProjectForbiddenException
     * @throws \JiraSdk\Api\Exception\AssignSchemeToProjectNotFoundException
     */
    public function assignSchemeToProject(Model\WorkflowSchemeProjectAssociation $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AssignSchemeToProject($requestBody), $fetch);
    }

    /**
     * Deletes a workflow scheme. Note that a workflow scheme cannot be deleted if it is active (that is, being used by at least one project).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id    The ID of the workflow scheme. Find this ID by editing the desired workflow scheme in Jira. The ID is shown in the URL as `schemeId`. For example, *schemeId=10301*.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowSchemeNotFoundException
     */
    public function deleteWorkflowScheme(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteWorkflowScheme($id), $fetch);
    }

    /**
     * Returns a workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $id              The ID of the workflow scheme. Find this ID by editing the desired workflow scheme in Jira. The ID is shown in the URL as `schemeId`. For example, *schemeId=10301*.
     * @param array $queryParameters {
     *
     *     @var bool $returnDraftIfExists Returns the workflow scheme's draft rather than scheme itself, if set to true. If the workflow scheme does not have a draft, then the workflow scheme is returned.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeNotFoundException
     */
    public function getWorkflowScheme(int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetWorkflowScheme($id, $queryParameters), $fetch);
    }

    /**
     * Updates a workflow scheme, including the name, default workflow, issue type to project mappings, and more. If the workflow scheme is active (that is, being used by at least one project), then a draft workflow scheme is created or updated instead, provided that `updateDraftIfNeeded` is set to `true`.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                               $id          The ID of the workflow scheme. Find this ID by editing the desired workflow scheme in Jira. The ID is shown in the URL as `schemeId`. For example, *schemeId=10301*.
     * @param \JiraSdk\Api\Model\WorkflowScheme $requestBody
     * @param string                            $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowSchemeNotFoundException
     */
    public function updateWorkflowScheme(int $id, Model\WorkflowScheme $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateWorkflowScheme($id, $requestBody), $fetch);
    }

    /**
     * Create a draft workflow scheme from an active workflow scheme, by copying the active workflow scheme. Note that an active workflow scheme can only have one draft workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id    the ID of the active workflow scheme that the draft is created from
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\CreateWorkflowSchemeDraftFromParentBadRequestException
     * @throws \JiraSdk\Api\Exception\CreateWorkflowSchemeDraftFromParentUnauthorizedException
     * @throws \JiraSdk\Api\Exception\CreateWorkflowSchemeDraftFromParentForbiddenException
     */
    public function createWorkflowSchemeDraftFromParent(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\CreateWorkflowSchemeDraftFromParent($id), $fetch);
    }

    /**
     * Resets the default workflow for a workflow scheme. That is, the default workflow is set to Jira's system workflow (the *jira* workflow).
     *
     * Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` and a draft workflow scheme is created or updated with the default workflow reset. The draft workflow scheme can be published in Jira.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $id              the ID of the workflow scheme
     * @param array $queryParameters {
     *
     *     @var bool $updateDraftIfNeeded Set to true to create or update the draft of a workflow scheme and delete the mapping from the draft, when the workflow scheme cannot be edited. Defaults to `false`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteDefaultWorkflowBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteDefaultWorkflowUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteDefaultWorkflowForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteDefaultWorkflowNotFoundException
     */
    public function deleteDefaultWorkflow(int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteDefaultWorkflow($id, $queryParameters), $fetch);
    }

    /**
     * Returns the default workflow for a workflow scheme. The default workflow is the workflow that is assigned any issue types that have not been mapped to any other workflow. The default workflow has *All Unassigned Issue Types* listed in its issue types for the workflow scheme in Jira.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $id              the ID of the workflow scheme
     * @param array $queryParameters {
     *
     *     @var bool $returnDraftIfExists Set to `true` to return the default workflow for the workflow scheme's draft rather than scheme itself. If the workflow scheme does not have a draft, then the default workflow for the workflow scheme is returned.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\DefaultWorkflow|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetDefaultWorkflowUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetDefaultWorkflowForbiddenException
     * @throws \JiraSdk\Api\Exception\GetDefaultWorkflowNotFoundException
     */
    public function getDefaultWorkflow(int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetDefaultWorkflow($id, $queryParameters), $fetch);
    }

    /**
     * Sets the default workflow for a workflow scheme.
     *
     * Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` in the request object and a draft workflow scheme is created or updated with the new default workflow. The draft workflow scheme can be published in Jira.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                $id          the ID of the workflow scheme
     * @param \JiraSdk\Api\Model\DefaultWorkflow $requestBody
     * @param string                             $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateDefaultWorkflowBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateDefaultWorkflowUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateDefaultWorkflowForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateDefaultWorkflowNotFoundException
     */
    public function updateDefaultWorkflow(int $id, Model\DefaultWorkflow $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateDefaultWorkflow($id, $requestBody), $fetch);
    }

    /**
     * Deletes a draft workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id    the ID of the active workflow scheme that the draft was created from
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowSchemeDraftUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowSchemeDraftForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowSchemeDraftNotFoundException
     */
    public function deleteWorkflowSchemeDraft(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteWorkflowSchemeDraft($id), $fetch);
    }

    /**
     * Returns the draft workflow scheme for an active workflow scheme. Draft workflow schemes allow changes to be made to the active workflow schemes: When an active workflow scheme is updated, a draft copy is created. The draft is modified, then the changes in the draft are copied back to the active workflow scheme. See [Configuring workflow schemes](https://confluence.atlassian.com/x/tohKLg) for more information.
     * Note that:.
     *
     *  Only active workflow schemes can have draft workflow schemes.
     *  An active workflow scheme can only have one draft workflow scheme.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id    the ID of the active workflow scheme that the draft was created from
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeDraftUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeDraftForbiddenException
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeDraftNotFoundException
     */
    public function getWorkflowSchemeDraft(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetWorkflowSchemeDraft($id), $fetch);
    }

    /**
     * Updates a draft workflow scheme. If a draft workflow scheme does not exist for the active workflow scheme, then a draft is created. Note that an active workflow scheme can only have one draft workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                               $id          the ID of the active workflow scheme that the draft was created from
     * @param \JiraSdk\Api\Model\WorkflowScheme $requestBody
     * @param string                            $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowSchemeDraftBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowSchemeDraftUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowSchemeDraftForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowSchemeDraftNotFoundException
     */
    public function updateWorkflowSchemeDraft(int $id, Model\WorkflowScheme $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateWorkflowSchemeDraft($id, $requestBody), $fetch);
    }

    /**
     * Resets the default workflow for a workflow scheme's draft. That is, the default workflow is set to Jira's system workflow (the *jira* workflow).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id    the ID of the workflow scheme that the draft belongs to
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteDraftDefaultWorkflowUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteDraftDefaultWorkflowForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteDraftDefaultWorkflowNotFoundException
     */
    public function deleteDraftDefaultWorkflow(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteDraftDefaultWorkflow($id), $fetch);
    }

    /**
     * Returns the default workflow for a workflow scheme's draft. The default workflow is the workflow that is assigned any issue types that have not been mapped to any other workflow. The default workflow has *All Unassigned Issue Types* listed in its issue types for the workflow scheme in Jira.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id    the ID of the workflow scheme that the draft belongs to
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\DefaultWorkflow|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetDraftDefaultWorkflowUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetDraftDefaultWorkflowForbiddenException
     * @throws \JiraSdk\Api\Exception\GetDraftDefaultWorkflowNotFoundException
     */
    public function getDraftDefaultWorkflow(int $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetDraftDefaultWorkflow($id), $fetch);
    }

    /**
     * Sets the default workflow for a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                $id          the ID of the workflow scheme that the draft belongs to
     * @param \JiraSdk\Api\Model\DefaultWorkflow $requestBody
     * @param string                             $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateDraftDefaultWorkflowBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateDraftDefaultWorkflowUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateDraftDefaultWorkflowForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateDraftDefaultWorkflowNotFoundException
     */
    public function updateDraftDefaultWorkflow(int $id, Model\DefaultWorkflow $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateDraftDefaultWorkflow($id, $requestBody), $fetch);
    }

    /**
     * Deletes the issue type-workflow mapping for an issue type in a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id        the ID of the workflow scheme that the draft belongs to
     * @param string $issueType the ID of the issue type
     * @param string $fetch     Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowSchemeDraftIssueTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowSchemeDraftIssueTypeForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowSchemeDraftIssueTypeNotFoundException
     */
    public function deleteWorkflowSchemeDraftIssueType(int $id, string $issueType, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteWorkflowSchemeDraftIssueType($id, $issueType), $fetch);
    }

    /**
     * Returns the issue type-workflow mapping for an issue type in a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id        the ID of the workflow scheme that the draft belongs to
     * @param string $issueType the ID of the issue type
     * @param string $fetch     Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueTypeWorkflowMapping|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeDraftIssueTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeDraftIssueTypeForbiddenException
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeDraftIssueTypeNotFoundException
     */
    public function getWorkflowSchemeDraftIssueType(int $id, string $issueType, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetWorkflowSchemeDraftIssueType($id, $issueType), $fetch);
    }

    /**
     * Sets the workflow for an issue type in a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                         $id          the ID of the workflow scheme that the draft belongs to
     * @param string                                      $issueType   the ID of the issue type
     * @param \JiraSdk\Api\Model\IssueTypeWorkflowMapping $requestBody
     * @param string                                      $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetWorkflowSchemeDraftIssueTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\SetWorkflowSchemeDraftIssueTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetWorkflowSchemeDraftIssueTypeForbiddenException
     * @throws \JiraSdk\Api\Exception\SetWorkflowSchemeDraftIssueTypeNotFoundException
     */
    public function setWorkflowSchemeDraftIssueType(int $id, string $issueType, Model\IssueTypeWorkflowMapping $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetWorkflowSchemeDraftIssueType($id, $issueType, $requestBody), $fetch);
    }

    /**
     * Publishes a draft workflow scheme.
     *
     * Where the draft workflow includes new workflow statuses for an issue type, mappings are provided to update issues with the original workflow status to the new workflow status.
     *
     * This operation is [asynchronous](#async). Follow the `location` link in the response to determine the status of the task and use [Get task](#api-rest-api-3-task-taskId-get) to obtain updates.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                           $id              the ID of the workflow scheme that the draft belongs to
     * @param \JiraSdk\Api\Model\PublishDraftWorkflowScheme $requestBody
     * @param array                                         $queryParameters {
     *
     *     @var bool $validateOnly Whether the request only performs a validation.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\TaskProgressBeanObject|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\PublishDraftWorkflowSchemeBadRequestException
     * @throws \JiraSdk\Api\Exception\PublishDraftWorkflowSchemeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\PublishDraftWorkflowSchemeForbiddenException
     * @throws \JiraSdk\Api\Exception\PublishDraftWorkflowSchemeNotFoundException
     */
    public function publishDraftWorkflowScheme(int $id, Model\PublishDraftWorkflowScheme $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\PublishDraftWorkflowScheme($id, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Deletes the workflow-issue type mapping for a workflow in a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $id              the ID of the workflow scheme that the draft belongs to
     * @param array $queryParameters {
     *
     *     @var string $workflowName The name of the workflow.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteDraftWorkflowMappingUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteDraftWorkflowMappingForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteDraftWorkflowMappingNotFoundException
     */
    public function deleteDraftWorkflowMapping(int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteDraftWorkflowMapping($id, $queryParameters), $fetch);
    }

    /**
     * Returns the workflow-issue type mappings for a workflow scheme's draft.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $id              the ID of the workflow scheme that the draft belongs to
     * @param array $queryParameters {
     *
     *     @var string $workflowName The name of a workflow in the scheme. Limits the results to the workflow-issue type mapping for the specified workflow.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueTypesWorkflowMapping|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetDraftWorkflowUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetDraftWorkflowForbiddenException
     * @throws \JiraSdk\Api\Exception\GetDraftWorkflowNotFoundException
     */
    public function getDraftWorkflow(int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetDraftWorkflow($id, $queryParameters), $fetch);
    }

    /**
     * Sets the issue types for a workflow in a workflow scheme's draft. The workflow can also be set as the default workflow for the draft workflow scheme. Unmapped issues types are mapped to the default workflow.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                          $id              the ID of the workflow scheme that the draft belongs to
     * @param \JiraSdk\Api\Model\IssueTypesWorkflowMapping $requestBody
     * @param array                                        $queryParameters {
     *
     *     @var string $workflowName The name of the workflow.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateDraftWorkflowMappingBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateDraftWorkflowMappingUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateDraftWorkflowMappingForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateDraftWorkflowMappingNotFoundException
     */
    public function updateDraftWorkflowMapping(int $id, Model\IssueTypesWorkflowMapping $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateDraftWorkflowMapping($id, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Deletes the issue type-workflow mapping for an issue type in a workflow scheme.
     *
     * Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` and a draft workflow scheme is created or updated with the issue type-workflow mapping deleted. The draft workflow scheme can be published in Jira.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id              the ID of the workflow scheme
     * @param string $issueType       the ID of the issue type
     * @param array  $queryParameters {
     *
     *     @var bool $updateDraftIfNeeded Set to true to create or update the draft of a workflow scheme and update the mapping in the draft, when the workflow scheme cannot be edited. Defaults to `false`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowSchemeIssueTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowSchemeIssueTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowSchemeIssueTypeForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowSchemeIssueTypeNotFoundException
     */
    public function deleteWorkflowSchemeIssueType(int $id, string $issueType, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteWorkflowSchemeIssueType($id, $issueType, $queryParameters), $fetch);
    }

    /**
     * Returns the issue type-workflow mapping for an issue type in a workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int    $id              the ID of the workflow scheme
     * @param string $issueType       the ID of the issue type
     * @param array  $queryParameters {
     *
     *     @var bool $returnDraftIfExists Returns the mapping from the workflow scheme's draft rather than the workflow scheme, if set to true. If no draft exists, the mapping from the workflow scheme is returned.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueTypeWorkflowMapping|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeIssueTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeIssueTypeForbiddenException
     * @throws \JiraSdk\Api\Exception\GetWorkflowSchemeIssueTypeNotFoundException
     */
    public function getWorkflowSchemeIssueType(int $id, string $issueType, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetWorkflowSchemeIssueType($id, $issueType, $queryParameters), $fetch);
    }

    /**
     * Sets the workflow for an issue type in a workflow scheme.
     *
     * Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` in the request body and a draft workflow scheme is created or updated with the new issue type-workflow mapping. The draft workflow scheme can be published in Jira.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                         $id          the ID of the workflow scheme
     * @param string                                      $issueType   the ID of the issue type
     * @param \JiraSdk\Api\Model\IssueTypeWorkflowMapping $requestBody
     * @param string                                      $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\SetWorkflowSchemeIssueTypeBadRequestException
     * @throws \JiraSdk\Api\Exception\SetWorkflowSchemeIssueTypeUnauthorizedException
     * @throws \JiraSdk\Api\Exception\SetWorkflowSchemeIssueTypeForbiddenException
     * @throws \JiraSdk\Api\Exception\SetWorkflowSchemeIssueTypeNotFoundException
     */
    public function setWorkflowSchemeIssueType(int $id, string $issueType, Model\IssueTypeWorkflowMapping $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\SetWorkflowSchemeIssueType($id, $issueType, $requestBody), $fetch);
    }

    /**
     * Deletes the workflow-issue type mapping for a workflow in a workflow scheme.
     *
     * Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` and a draft workflow scheme is created or updated with the workflow-issue type mapping deleted. The draft workflow scheme can be published in Jira.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $id              the ID of the workflow scheme
     * @param array $queryParameters {
     *
     *     @var string $workflowName the name of the workflow
     *     @var bool $updateDraftIfNeeded Set to true to create or update the draft of a workflow scheme and delete the mapping from the draft, when the workflow scheme cannot be edited. Defaults to `false`.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowMappingBadRequestException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowMappingUnauthorizedException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowMappingForbiddenException
     * @throws \JiraSdk\Api\Exception\DeleteWorkflowMappingNotFoundException
     */
    public function deleteWorkflowMapping(int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DeleteWorkflowMapping($id, $queryParameters), $fetch);
    }

    /**
     * Returns the workflow-issue type mappings for a workflow scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int   $id              the ID of the workflow scheme
     * @param array $queryParameters {
     *
     *     @var string $workflowName The name of a workflow in the scheme. Limits the results to the workflow-issue type mapping for the specified workflow.
     *     @var bool $returnDraftIfExists Returns the mapping from the workflow scheme's draft rather than the workflow scheme, if set to true. If no draft exists, the mapping from the workflow scheme is returned.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\IssueTypesWorkflowMapping|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorkflowUnauthorizedException
     * @throws \JiraSdk\Api\Exception\GetWorkflowForbiddenException
     * @throws \JiraSdk\Api\Exception\GetWorkflowNotFoundException
     */
    public function getWorkflow(int $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetWorkflow($id, $queryParameters), $fetch);
    }

    /**
     * Sets the issue types for a workflow in a workflow scheme. The workflow can also be set as the default workflow for the workflow scheme. Unmapped issues types are mapped to the default workflow.
     *
     * Note that active workflow schemes cannot be edited. If the workflow scheme is active, set `updateDraftIfNeeded` to `true` in the request body and a draft workflow scheme is created or updated with the new workflow-issue types mappings. The draft workflow scheme can be published in Jira.
     *
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int                                          $id              the ID of the workflow scheme
     * @param \JiraSdk\Api\Model\IssueTypesWorkflowMapping $requestBody
     * @param array                                        $queryParameters {
     *
     *     @var string $workflowName The name of the workflow.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowScheme|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowMappingBadRequestException
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowMappingUnauthorizedException
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowMappingForbiddenException
     * @throws \JiraSdk\Api\Exception\UpdateWorkflowMappingNotFoundException
     */
    public function updateWorkflowMapping(int $id, Model\IssueTypesWorkflowMapping $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\UpdateWorkflowMapping($id, $requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns a list of IDs and delete timestamps for worklogs deleted after a date and time.
     *
     * This resource is paginated, with a limit of 1000 worklogs per page. Each page lists worklogs from oldest to youngest. If the number of items in the date range exceeds 1000, `until` indicates the timestamp of the youngest item on the page. Also, `nextPage` provides the URL for the next page of worklogs. The `lastPage` parameter is set to true on the last page of worklogs.
     *
     * This resource does not return worklogs deleted during the minute preceding the request.
     *
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *
     *     @var int $since The date and time, as a UNIX timestamp in milliseconds, after which deleted worklogs are returned.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ChangedWorklogs|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIdsOfWorklogsDeletedSinceUnauthorizedException
     */
    public function getIdsOfWorklogsDeletedSince(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIdsOfWorklogsDeletedSince($queryParameters), $fetch);
    }

    /**
     * Returns worklog details for a list of worklog IDs.
     *
     * The returned list of worklogs is limited to 1000 items.
     *
     **[Permissions](#permissions) required:** Permission to access Jira, however, worklogs are only returned where either of the following is true:
     *
     *  the worklog is set as *Viewable by All Users*.
     *  the user is a member of a project role or group with permission to view the worklog.
     *
     * @param \JiraSdk\Api\Model\WorklogIdsRequestBean $requestBody
     * @param array                                    $queryParameters {
     *
     *     @var string $expand Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts `properties` that returns the properties of each worklog.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\Worklog[]|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetWorklogsForIdsBadRequestException
     * @throws \JiraSdk\Api\Exception\GetWorklogsForIdsUnauthorizedException
     */
    public function getWorklogsForIds(Model\WorklogIdsRequestBean $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetWorklogsForIds($requestBody, $queryParameters), $fetch);
    }

    /**
     * Returns a list of IDs and update timestamps for worklogs updated after a date and time.
     *
     * This resource is paginated, with a limit of 1000 worklogs per page. Each page lists worklogs from oldest to youngest. If the number of items in the date range exceeds 1000, `until` indicates the timestamp of the youngest item on the page. Also, `nextPage` provides the URL for the next page of worklogs. The `lastPage` parameter is set to true on the last page of worklogs.
     *
     * This resource does not return worklogs updated during the minute preceding the request.
     *
     **[Permissions](#permissions) required:** Permission to access Jira, however, worklogs are only returned where either of the following is true:
     *
     *  the worklog is set as *Viewable by All Users*.
     *  the user is a member of a project role or group with permission to view the worklog.
     *
     * @param array $queryParameters {
     *
     *     @var int $since the date and time, as a UNIX timestamp in milliseconds, after which updated worklogs are returned
     *     @var string $expand Use [expand](#expansion) to include additional information about worklogs in the response. This parameter accepts `properties` that returns the properties of each worklog.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ChangedWorklogs|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\GetIdsOfWorklogsModifiedSinceUnauthorizedException
     */
    public function getIdsOfWorklogsModifiedSince(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\GetIdsOfWorklogsModifiedSince($queryParameters), $fetch);
    }

    /**
     * Gets all the properties of an app.
     *
     **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
     * Additionally, Forge apps published on the Marketplace can access properties of Connect apps they were [migrated from](https://developer.atlassian.com/platform/forge/build-a-connect-on-forge-app/).
     *
     * @param string $addonKey the key of the app, as defined in its descriptor
     * @param string $fetch    Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\PropertyKeys|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourceGetAddonPropertiesGetUnauthorizedException
     */
    public function addonPropertiesResourceGetAddonPropertiesGet(string $addonKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddonPropertiesResourceGetAddonPropertiesGet($addonKey), $fetch);
    }

    /**
     * Deletes an app's property.
     **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
     *
     * @param string $addonKey    the key of the app, as defined in its descriptor
     * @param string $propertyKey the key of the property
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteBadRequestException
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourceDeleteAddonPropertyDeleteNotFoundException
     */
    public function addonPropertiesResourceDeleteAddonPropertyDelete(string $addonKey, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddonPropertiesResourceDeleteAddonPropertyDelete($addonKey, $propertyKey), $fetch);
    }

    /**
     * Returns the key and value of an app's property.
     *
     **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
     * Additionally, Forge apps published on the Marketplace can access properties of Connect apps they were [migrated from](https://developer.atlassian.com/platform/forge/build-a-connect-on-forge-app/).
     *
     * @param string $addonKey    the key of the app, as defined in its descriptor
     * @param string $propertyKey the key of the property
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\EntityProperty|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourceGetAddonPropertyGetBadRequestException
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourceGetAddonPropertyGetUnauthorizedException
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourceGetAddonPropertyGetNotFoundException
     */
    public function addonPropertiesResourceGetAddonPropertyGet(string $addonKey, string $propertyKey, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddonPropertiesResourceGetAddonPropertyGet($addonKey, $propertyKey), $fetch);
    }

    /**
     * Sets the value of an app's property. Use this resource to store custom data for your app.
     *
     * The value of the request body must be a [valid](http://tools.ietf.org/html/rfc4627), non-empty JSON blob. The maximum length is 32768 characters.
     *
     **[Permissions](#permissions) required:** Only a Connect app whose key matches `addonKey` can make this request.
     *
     * @param string $addonKey    the key of the app, as defined in its descriptor
     * @param string $propertyKey the key of the property
     * @param mixed  $requestBody
     * @param string $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\OperationMessage|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourcePutAddonPropertyPutBadRequestException
     * @throws \JiraSdk\Api\Exception\AddonPropertiesResourcePutAddonPropertyPutUnauthorizedException
     */
    public function addonPropertiesResourcePutAddonPropertyPut(string $addonKey, string $propertyKey, $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AddonPropertiesResourcePutAddonPropertyPut($addonKey, $propertyKey, $requestBody), $fetch);
    }

    /**
     * Remove all or a list of modules registered by the calling app.
     *
     **[Permissions](#permissions) required:** Only Connect apps can make this request.
     *
     * @param array $queryParameters {
     *
     *     @var array $moduleKey The key of the module to remove. To include multiple module keys, provide multiple copies of this parameter.
     * For example, `moduleKey=dynamic-attachment-entity-property&moduleKey=dynamic-select-field`.
     * Nonexistent keys are ignored.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DynamicModulesResourceRemoveModulesDeleteUnauthorizedException
     */
    public function dynamicModulesResourceRemoveModulesDelete(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DynamicModulesResourceRemoveModulesDelete($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\ConnectModules|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DynamicModulesResourceGetModulesGetUnauthorizedException
     */
    public function dynamicModulesResourceGetModulesGet(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DynamicModulesResourceGetModulesGet(), $fetch);
    }

    /**
     * Registers a list of modules.
     **[Permissions](#permissions) required:** Only Connect apps can make this request.
     *
     * @param \JiraSdk\Api\Model\ConnectModules $requestBody
     * @param string                            $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\DynamicModulesResourceRegisterModulesPostBadRequestException
     * @throws \JiraSdk\Api\Exception\DynamicModulesResourceRegisterModulesPostUnauthorizedException
     */
    public function dynamicModulesResourceRegisterModulesPost(Model\ConnectModules $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\DynamicModulesResourceRegisterModulesPost($requestBody), $fetch);
    }

    /**
     * Updates the value of a custom field added by Connect apps on one or more issues.
     * The values of up to 200 custom fields can be updated.
     *
     **[Permissions](#permissions) required:** Only Connect apps can make this request.
     *
     * @param \JiraSdk\Api\Model\ConnectCustomFieldValues $requestBody
     * @param array                                       $headerParameters {
     *
     *     @var string $Atlassian-Transfer-Id The ID of the transfer.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\AppIssueFieldValueUpdateResourceUpdateIssueFieldsPutBadRequestException
     * @throws \JiraSdk\Api\Exception\AppIssueFieldValueUpdateResourceUpdateIssueFieldsPutForbiddenException
     */
    public function appIssueFieldValueUpdateResourceUpdateIssueFieldsPut(Model\ConnectCustomFieldValues $requestBody, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\AppIssueFieldValueUpdateResourceUpdateIssueFieldsPut($requestBody, $headerParameters), $fetch);
    }

    /**
     * Updates the values of multiple entity properties for an object, up to 50 updates per request. This operation is for use by Connect apps during app migration.
     *
     * @param string                                     $entityType       the type indicating the object that contains the entity properties
     * @param \JiraSdk\Api\Model\EntityPropertyDetails[] $requestBody
     * @param array                                      $headerParameters {
     *
     *     @var string $Atlassian-Transfer-Id The app migration transfer ID.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\MigrationResourceUpdateEntityPropertiesValuePutBadRequestException
     * @throws \JiraSdk\Api\Exception\MigrationResourceUpdateEntityPropertiesValuePutForbiddenException
     */
    public function migrationResourceUpdateEntityPropertiesValuePut(string $entityType, array $requestBody, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\MigrationResourceUpdateEntityPropertiesValuePut($entityType, $requestBody, $headerParameters), $fetch);
    }

    /**
     * Returns configurations for workflow transition rules migrated from server to cloud and owned by the calling Connect app.
     *
     * @param \JiraSdk\Api\Model\WorkflowRulesSearch $requestBody
     * @param array                                  $headerParameters {
     *
     *     @var string $Atlassian-Transfer-Id The app migration transfer ID.
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \JiraSdk\Api\Model\WorkflowRulesSearchDetails|\Psr\Http\Message\ResponseInterface|null
     *
     * @throws \JiraSdk\Api\Exception\MigrationResourceWorkflowRuleSearchPostBadRequestException
     * @throws \JiraSdk\Api\Exception\MigrationResourceWorkflowRuleSearchPostForbiddenException
     */
    public function migrationResourceWorkflowRuleSearchPost(Model\WorkflowRulesSearch $requestBody, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \JiraSdk\Api\Endpoint\MigrationResourceWorkflowRuleSearchPost($requestBody, $headerParameters), $fetch);
    }

    public static function create($httpClient = null, array $additionalPlugins = [], array $additionalNormalizers = [])
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = [];
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri('https://your-domain.atlassian.net');
            $plugins[] = new \Http\Client\Common\Plugin\AddHostPlugin($uri);
            if (\count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = [new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \JiraSdk\Api\Normalizer\JaneObjectNormalizer()];
        if (\count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, [new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(['json_decode_associative' => true]))]);

        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
