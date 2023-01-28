<?php

namespace JiraSdk\Endpoint;

class GetAssignedPermissionScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectKeyOrId;
    /**
     * Gets the [permission scheme](https://confluence.atlassian.com/x/yodKLg) associated with the project.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or *Administer projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
     *
     * @param string $projectKeyOrId The project ID or project key (case sensitive).
     * @param array $queryParameters {
     *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that permissions are included when you specify any value. Expand options include:
     *  `all` Returns all expandable information.
     *  `field` Returns information about the custom field granted the permission.
     *  `group` Returns information about the group that is granted the permission.
     *  `permissions` Returns all permission grants for each permission scheme.
     *  `projectRole` Returns information about the project role granted the permission.
     *  `user` Returns information about the user who is granted the permission.
     * }
     */
    public function __construct(string $projectKeyOrId, array $queryParameters = array())
    {
        $this->projectKeyOrId = $projectKeyOrId;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectKeyOrId}'), array($this->projectKeyOrId), '/rest/api/3/project/{projectKeyOrId}/permissionscheme');
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
     * @throws \JiraSdk\Exception\GetAssignedPermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\GetAssignedPermissionSchemeForbiddenException
     * @throws \JiraSdk\Exception\GetAssignedPermissionSchemeNotFoundException
     *
     * @return null|\JiraSdk\Model\PermissionScheme
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PermissionScheme', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAssignedPermissionSchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetAssignedPermissionSchemeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetAssignedPermissionSchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
