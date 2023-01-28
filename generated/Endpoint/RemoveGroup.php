<?php

namespace JiraSdk\Endpoint;

class RemoveGroup extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Deletes a group.

    **[Permissions](#permissions) required:** Site administration (that is, member of the *site-admin* strategic [group](https://confluence.atlassian.com/x/24xjL)).
    *
    * @param array $queryParameters {
    *     @var string $groupname As a group's name can change, use of `groupId` is recommended to identify a group.
    The name of the group. This parameter cannot be used with the `groupId` parameter.
    *     @var string $groupId The ID of the group. This parameter cannot be used with the `groupName` parameter.
    *     @var string $swapGroup As a group's name can change, use of `swapGroupId` is recommended to identify a group.
    The group to transfer restrictions to. Only comments and worklogs are transferred. If restrictions are not transferred, comments and worklogs are inaccessible after the deletion. This parameter cannot be used with the `swapGroupId` parameter.
    *     @var string $swapGroupId The ID of the group to transfer restrictions to. Only comments and worklogs are transferred. If restrictions are not transferred, comments and worklogs are inaccessible after the deletion. This parameter cannot be used with the `swapGroup` parameter.
    * }
    */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return '/rest/api/3/group';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('groupname', 'groupId', 'swapGroup', 'swapGroupId'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('groupname', array('string'));
        $optionsResolver->addAllowedTypes('groupId', array('string'));
        $optionsResolver->addAllowedTypes('swapGroup', array('string'));
        $optionsResolver->addAllowedTypes('swapGroupId', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\RemoveGroupBadRequestException
     * @throws \JiraSdk\Exception\RemoveGroupUnauthorizedException
     * @throws \JiraSdk\Exception\RemoveGroupForbiddenException
     * @throws \JiraSdk\Exception\RemoveGroupNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\RemoveGroupBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\RemoveGroupUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\RemoveGroupForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\RemoveGroupNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
