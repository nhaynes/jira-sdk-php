<?php

namespace JiraSdk\Endpoint;

class BulkGetUsers extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
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
        return '/rest/api/3/user/bulk';
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
        $optionsResolver->setDefined(array('startAt', 'maxResults', 'username', 'key', 'accountId'));
        $optionsResolver->setRequired(array('accountId'));
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 10));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('username', array('array'));
        $optionsResolver->addAllowedTypes('key', array('array'));
        $optionsResolver->addAllowedTypes('accountId', array('array'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\BulkGetUsersBadRequestException
     * @throws \JiraSdk\Exception\BulkGetUsersUnauthorizedException
     *
     * @return null|\JiraSdk\Model\PageBeanUser
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanUser', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\BulkGetUsersBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\BulkGetUsersUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
