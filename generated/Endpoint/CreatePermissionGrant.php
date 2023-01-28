<?php

namespace JiraSdk\Endpoint;

class CreatePermissionGrant extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $schemeId;
    /**
     * Creates a permission grant in a permission scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $schemeId The ID of the permission scheme in which to create a new permission grant.
     * @param \JiraSdk\Model\PermissionGrant $requestBody
     * @param array $queryParameters {
     *     @var string $expand Use expand to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are always included when you specify any value. Expand options include:
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `user` Returns information about the user who is granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `field` Returns information about the custom field granted the permission.
     *  `all` Returns all expandable information.
     * }
     */
    public function __construct(int $schemeId, \JiraSdk\Model\PermissionGrant $requestBody, array $queryParameters = array())
    {
        $this->schemeId = $schemeId;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{schemeId}'), array($this->schemeId), '/rest/api/3/permissionscheme/{schemeId}/permission');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\PermissionGrant) {
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
        $optionsResolver->setDefined(array('expand'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('expand', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\CreatePermissionGrantBadRequestException
     * @throws \JiraSdk\Exception\CreatePermissionGrantUnauthorizedException
     * @throws \JiraSdk\Exception\CreatePermissionGrantForbiddenException
     *
     * @return null|\JiraSdk\Model\PermissionGrant
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PermissionGrant', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\CreatePermissionGrantBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\CreatePermissionGrantUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\CreatePermissionGrantForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
