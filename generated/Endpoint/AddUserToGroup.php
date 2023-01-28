<?php

namespace JiraSdk\Endpoint;

class AddUserToGroup extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Adds a user to a group.

    **[Permissions](#permissions) required:** Site administration (that is, member of the *site-admin* [group](https://confluence.atlassian.com/x/24xjL)).
    *
    * @param \JiraSdk\Model\UpdateUserToGroupBean $requestBody
    * @param array $queryParameters {
    *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
    The name of the group. This parameter cannot be used with the `groupId` parameter.
    *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
    * }
    */
    public function __construct(\JiraSdk\Model\UpdateUserToGroupBean $requestBody, array $queryParameters = array())
    {
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/api/3/group/user';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\UpdateUserToGroupBean) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('groupname', 'groupId'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('groupname', array('string'));
        $optionsResolver->addAllowedTypes('groupId', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\AddUserToGroupBadRequestException
     * @throws \JiraSdk\Exception\AddUserToGroupUnauthorizedException
     * @throws \JiraSdk\Exception\AddUserToGroupForbiddenException
     * @throws \JiraSdk\Exception\AddUserToGroupNotFoundException
     *
     * @return null|\JiraSdk\Model\Group
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\Group', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\AddUserToGroupBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\AddUserToGroupUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\AddUserToGroupForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\AddUserToGroupNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
