<?php

namespace JiraSdk\Endpoint;

class GetGroup extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * This operation is deprecated, use [`group/member`](#api-rest-api-3-group-member-get).

    Returns all users in a group.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
    The name of the group. This parameter cannot be used with the `groupId` parameter.
    *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
    *     @var string $expand List of fields to expand.
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
        return '/rest/api/3/group';
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
        $optionsResolver->setDefined(array('groupname', 'groupId', 'expand'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('groupname', array('string'));
        $optionsResolver->addAllowedTypes('groupId', array('string'));
        $optionsResolver->addAllowedTypes('expand', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetGroupBadRequestException
     * @throws \JiraSdk\Exception\GetGroupUnauthorizedException
     * @throws \JiraSdk\Exception\GetGroupForbiddenException
     * @throws \JiraSdk\Exception\GetGroupNotFoundException
     *
     * @return null|\JiraSdk\Model\Group
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\Group', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetGroupBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetGroupUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetGroupForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetGroupNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
