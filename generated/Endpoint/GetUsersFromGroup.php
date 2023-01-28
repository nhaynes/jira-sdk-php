<?php

namespace JiraSdk\Endpoint;

class GetUsersFromGroup extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
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
        return '/rest/api/3/group/member';
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
        $optionsResolver->setDefined(array('groupname', 'groupId', 'includeInactiveUsers', 'startAt', 'maxResults'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('includeInactiveUsers' => false, 'startAt' => 0, 'maxResults' => 50));
        $optionsResolver->addAllowedTypes('groupname', array('string'));
        $optionsResolver->addAllowedTypes('groupId', array('string'));
        $optionsResolver->addAllowedTypes('includeInactiveUsers', array('bool'));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetUsersFromGroupBadRequestException
     * @throws \JiraSdk\Exception\GetUsersFromGroupUnauthorizedException
     * @throws \JiraSdk\Exception\GetUsersFromGroupForbiddenException
     * @throws \JiraSdk\Exception\GetUsersFromGroupNotFoundException
     *
     * @return null|\JiraSdk\Model\PageBeanUserDetails
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanUserDetails', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetUsersFromGroupBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetUsersFromGroupUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetUsersFromGroupForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetUsersFromGroupNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
