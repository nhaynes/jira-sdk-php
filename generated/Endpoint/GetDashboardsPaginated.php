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

class GetDashboardsPaginated extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

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
        return '/rest/api/3/dashboard/search';
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
        $optionsResolver->setDefined(['dashboardName', 'accountId', 'owner', 'groupname', 'groupId', 'projectId', 'orderBy', 'startAt', 'maxResults', 'status', 'expand']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['orderBy' => 'name', 'startAt' => 0, 'maxResults' => 50, 'status' => 'active']);
        $optionsResolver->addAllowedTypes('dashboardName', ['string']);
        $optionsResolver->addAllowedTypes('accountId', ['string']);
        $optionsResolver->addAllowedTypes('owner', ['string']);
        $optionsResolver->addAllowedTypes('groupname', ['string']);
        $optionsResolver->addAllowedTypes('groupId', ['string']);
        $optionsResolver->addAllowedTypes('projectId', ['int']);
        $optionsResolver->addAllowedTypes('orderBy', ['string']);
        $optionsResolver->addAllowedTypes('startAt', ['int']);
        $optionsResolver->addAllowedTypes('maxResults', ['int']);
        $optionsResolver->addAllowedTypes('status', ['string']);
        $optionsResolver->addAllowedTypes('expand', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\PageBeanDashboard|null
     *
     * @throws \JiraSdk\Api\Exception\GetDashboardsPaginatedBadRequestException
     * @throws \JiraSdk\Api\Exception\GetDashboardsPaginatedUnauthorizedException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\PageBeanDashboard', 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetDashboardsPaginatedBadRequestException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \JiraSdk\Api\Exception\GetDashboardsPaginatedUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Api\\Model\\ErrorCollection', 'json'), $response);
        }
    }
}
