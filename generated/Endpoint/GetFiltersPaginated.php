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

namespace JiraSdk\Api\Endpoint;

class GetFiltersPaginated extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

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
     */
    public function __construct(array $queryParameters = [])
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
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    public function getAuthenticationScopes(): array
    {
        return ['basicAuth', 'OAuth2'];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['filterName', 'accountId', 'owner', 'groupname', 'groupId', 'projectId', 'id', 'orderBy', 'startAt', 'maxResults', 'expand', 'overrideSharePermissions']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['orderBy' => 'name', 'startAt' => 0, 'maxResults' => 50, 'overrideSharePermissions' => false]);
        $optionsResolver->addAllowedTypes('filterName', ['string']);
        $optionsResolver->addAllowedTypes('accountId', ['string']);
        $optionsResolver->addAllowedTypes('owner', ['string']);
        $optionsResolver->addAllowedTypes('groupname', ['string']);
        $optionsResolver->addAllowedTypes('groupId', ['string']);
        $optionsResolver->addAllowedTypes('projectId', ['int']);
        $optionsResolver->addAllowedTypes('id', ['array']);
        $optionsResolver->addAllowedTypes('orderBy', ['string']);
        $optionsResolver->addAllowedTypes('startAt', ['int']);
        $optionsResolver->addAllowedTypes('maxResults', ['int']);
        $optionsResolver->addAllowedTypes('expand', ['string']);
        $optionsResolver->addAllowedTypes('overrideSharePermissions', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\PageBeanFilterDetails|null
     *
     * @throws \JiraSdk\Api\Exception\GetFiltersPaginatedBadRequestException
     * @throws \JiraSdk\Api\Exception\GetFiltersPaginatedUnauthorizedException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\PageBeanFilterDetails', 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetFiltersPaginatedBadRequestException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\GetFiltersPaginatedUnauthorizedException($response);
        }
    }
}
