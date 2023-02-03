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

class FindUsersWithBrowsePermission extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

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
        return '/rest/api/3/user/viewissue/search';
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
        $optionsResolver->setDefined(['query', 'username', 'accountId', 'issueKey', 'projectKey', 'startAt', 'maxResults']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['startAt' => 0, 'maxResults' => 50]);
        $optionsResolver->addAllowedTypes('query', ['string']);
        $optionsResolver->addAllowedTypes('username', ['string']);
        $optionsResolver->addAllowedTypes('accountId', ['string']);
        $optionsResolver->addAllowedTypes('issueKey', ['string']);
        $optionsResolver->addAllowedTypes('projectKey', ['string']);
        $optionsResolver->addAllowedTypes('startAt', ['int']);
        $optionsResolver->addAllowedTypes('maxResults', ['int']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \JiraSdk\Api\Model\User[]|null
     *
     * @throws \JiraSdk\Api\Exception\FindUsersWithBrowsePermissionBadRequestException
     * @throws \JiraSdk\Api\Exception\FindUsersWithBrowsePermissionUnauthorizedException
     * @throws \JiraSdk\Api\Exception\FindUsersWithBrowsePermissionNotFoundException
     * @throws \JiraSdk\Api\Exception\FindUsersWithBrowsePermissionTooManyRequestsException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\User[]', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\FindUsersWithBrowsePermissionBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\FindUsersWithBrowsePermissionUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\FindUsersWithBrowsePermissionNotFoundException($response);
        }
        if (429 === $status) {
            throw new \JiraSdk\Api\Exception\FindUsersWithBrowsePermissionTooManyRequestsException($response);
        }
    }
}
