<?php

namespace JiraSdk\Endpoint;

class FindBulkAssignableUsers extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
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
        return '/rest/api/3/user/assignable/multiProjectSearch';
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
        $optionsResolver->setDefined(array('query', 'username', 'accountId', 'projectKeys', 'startAt', 'maxResults'));
        $optionsResolver->setRequired(array('projectKeys'));
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 50));
        $optionsResolver->addAllowedTypes('query', array('string'));
        $optionsResolver->addAllowedTypes('username', array('string'));
        $optionsResolver->addAllowedTypes('accountId', array('string'));
        $optionsResolver->addAllowedTypes('projectKeys', array('string'));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\FindBulkAssignableUsersBadRequestException
     * @throws \JiraSdk\Exception\FindBulkAssignableUsersUnauthorizedException
     * @throws \JiraSdk\Exception\FindBulkAssignableUsersNotFoundException
     * @throws \JiraSdk\Exception\FindBulkAssignableUsersTooManyRequestsException
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
            throw new \JiraSdk\Exception\FindBulkAssignableUsersBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\FindBulkAssignableUsersUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\FindBulkAssignableUsersNotFoundException($response);
        }
        if (429 === $status) {
            throw new \JiraSdk\Exception\FindBulkAssignableUsersTooManyRequestsException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
