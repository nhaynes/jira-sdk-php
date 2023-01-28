<?php

namespace JiraSdk\Endpoint;

class GetFiltersPaginated extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
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
    */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return '/rest/api/3/filter/search';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('filterName', 'accountId', 'owner', 'groupname', 'groupId', 'projectId', 'id', 'orderBy', 'startAt', 'maxResults', 'expand', 'overrideSharePermissions'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('orderBy' => 'name', 'startAt' => 0, 'maxResults' => 50, 'overrideSharePermissions' => false));
        $optionsResolver->addAllowedTypes('filterName', array('string'));
        $optionsResolver->addAllowedTypes('accountId', array('string'));
        $optionsResolver->addAllowedTypes('owner', array('string'));
        $optionsResolver->addAllowedTypes('groupname', array('string'));
        $optionsResolver->addAllowedTypes('groupId', array('string'));
        $optionsResolver->addAllowedTypes('projectId', array('int'));
        $optionsResolver->addAllowedTypes('id', array('array'));
        $optionsResolver->addAllowedTypes('orderBy', array('string'));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('expand', array('string'));
        $optionsResolver->addAllowedTypes('overrideSharePermissions', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetFiltersPaginatedBadRequestException
     * @throws \JiraSdk\Exception\GetFiltersPaginatedUnauthorizedException
     *
     * @return null|\JiraSdk\Model\PageBeanFilterDetails
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanFilterDetails', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetFiltersPaginatedBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetFiltersPaginatedUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
