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

class FindUsersWithAllPermissions extends \JiraSdk\Api\Runtime\Client\BaseEndpoint implements \JiraSdk\Api\Runtime\Client\Endpoint
{
    use \JiraSdk\Api\Runtime\Client\EndpointTrait;

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
        return '/rest/api/3/user/permission/search';
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
        $optionsResolver->setDefined(['query', 'username', 'accountId', 'permissions', 'issueKey', 'projectKey', 'startAt', 'maxResults']);
        $optionsResolver->setRequired(['permissions']);
        $optionsResolver->setDefaults(['startAt' => 0, 'maxResults' => 50]);
        $optionsResolver->addAllowedTypes('query', ['string']);
        $optionsResolver->addAllowedTypes('username', ['string']);
        $optionsResolver->addAllowedTypes('accountId', ['string']);
        $optionsResolver->addAllowedTypes('permissions', ['string']);
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
     * @throws \JiraSdk\Api\Exception\FindUsersWithAllPermissionsBadRequestException
     * @throws \JiraSdk\Api\Exception\FindUsersWithAllPermissionsUnauthorizedException
     * @throws \JiraSdk\Api\Exception\FindUsersWithAllPermissionsForbiddenException
     * @throws \JiraSdk\Api\Exception\FindUsersWithAllPermissionsNotFoundException
     * @throws \JiraSdk\Api\Exception\FindUsersWithAllPermissionsTooManyRequestsException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'JiraSdk\\Api\\Model\\User[]', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Api\Exception\FindUsersWithAllPermissionsBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Api\Exception\FindUsersWithAllPermissionsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Api\Exception\FindUsersWithAllPermissionsForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Api\Exception\FindUsersWithAllPermissionsNotFoundException($response);
        }
        if (429 === $status) {
            throw new \JiraSdk\Api\Exception\FindUsersWithAllPermissionsTooManyRequestsException($response);
        }
    }
}
