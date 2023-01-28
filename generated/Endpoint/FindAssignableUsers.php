<?php

namespace JiraSdk\Endpoint;

class FindAssignableUsers extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
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
        return '/rest/api/3/user/assignable/search';
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
        $optionsResolver->setDefined(array('query', 'sessionId', 'username', 'accountId', 'project', 'issueKey', 'startAt', 'maxResults', 'actionDescriptorId', 'recommend'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 50, 'recommend' => false));
        $optionsResolver->addAllowedTypes('query', array('string'));
        $optionsResolver->addAllowedTypes('sessionId', array('string'));
        $optionsResolver->addAllowedTypes('username', array('string'));
        $optionsResolver->addAllowedTypes('accountId', array('string'));
        $optionsResolver->addAllowedTypes('project', array('string'));
        $optionsResolver->addAllowedTypes('issueKey', array('string'));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('actionDescriptorId', array('int'));
        $optionsResolver->addAllowedTypes('recommend', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\FindAssignableUsersBadRequestException
     * @throws \JiraSdk\Exception\FindAssignableUsersUnauthorizedException
     * @throws \JiraSdk\Exception\FindAssignableUsersNotFoundException
     * @throws \JiraSdk\Exception\FindAssignableUsersTooManyRequestsException
     *
     * @return null|\JiraSdk\Model\User[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\User[]', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\FindAssignableUsersBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\FindAssignableUsersUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\FindAssignableUsersNotFoundException($response);
        }
        if (429 === $status) {
            throw new \JiraSdk\Exception\FindAssignableUsersTooManyRequestsException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
