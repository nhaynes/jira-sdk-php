<?php

namespace JiraSdk\Endpoint;

class AssignPermissionScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectKeyOrId;
    /**
     * Assigns a permission scheme with a project. See [Managing project permissions](https://confluence.atlassian.com/x/yodKLg) for more information about permission schemes.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg)
     *
     * @param string $projectKeyOrId The project ID or project key (case sensitive).
     * @param \JiraSdk\Model\IdBean $requestBody
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
    public function __construct(string $projectKeyOrId, \JiraSdk\Model\IdBean $requestBody, array $queryParameters = array())
    {
        $this->projectKeyOrId = $projectKeyOrId;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectKeyOrId}'), array($this->projectKeyOrId), '/rest/api/3/project/{projectKeyOrId}/permissionscheme');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\IdBean) {
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
     * @throws \JiraSdk\Exception\AssignPermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\AssignPermissionSchemeForbiddenException
     * @throws \JiraSdk\Exception\AssignPermissionSchemeNotFoundException
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
            throw new \JiraSdk\Exception\AssignPermissionSchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\AssignPermissionSchemeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\AssignPermissionSchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
