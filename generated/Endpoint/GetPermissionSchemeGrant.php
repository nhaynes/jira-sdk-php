<?php

namespace JiraSdk\Endpoint;

class GetPermissionSchemeGrant extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $schemeId;
    protected $permissionId;
    /**
     * Returns a permission grant.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param int $schemeId The ID of the permission scheme.
     * @param int $permissionId The ID of the permission grant.
     * @param array $queryParameters {
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     */
    public function __construct(int $schemeId, int $permissionId, array $queryParameters = array())
    {
        $this->schemeId = $schemeId;
        $this->permissionId = $permissionId;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{schemeId}', '{permissionId}'), array($this->schemeId, $this->permissionId), '/rest/api/3/permissionscheme/{schemeId}/permission/{permissionId}');
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
        $optionsResolver->setDefined(array('expand'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('expand', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetPermissionSchemeGrantUnauthorizedException
     * @throws \JiraSdk\Exception\GetPermissionSchemeGrantNotFoundException
     *
     * @return null|\JiraSdk\Model\PermissionGrant
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PermissionGrant', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetPermissionSchemeGrantUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetPermissionSchemeGrantNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
