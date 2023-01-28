<?php

namespace JiraSdk\Endpoint;

class UpdatePermissionScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $schemeId;
    /**
    * Updates a permission scheme. Below are some important things to note when using this resource:

    *  If a permissions list is present in the request, then it is set in the permission scheme, overwriting *all existing* grants.
    *  If you want to update only the name and description, then do not send a permissions list in the request.
    *  Sending an empty list will remove all permission grants from the permission scheme.

    If you want to add or delete a permission grant instead of updating the whole list, see [Create permission grant](#api-rest-api-3-permissionscheme-schemeId-permission-post) or [Delete permission scheme entity](#api-rest-api-3-permissionscheme-schemeId-permission-permissionId-delete).

    See [About permission schemes and grants](../api-group-permission-schemes/#about-permission-schemes-and-grants) for more details.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param int $schemeId The ID of the permission scheme to update.
    * @param \JiraSdk\Model\PermissionScheme $requestBody
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
    public function __construct(int $schemeId, \JiraSdk\Model\PermissionScheme $requestBody, array $queryParameters = array())
    {
        $this->schemeId = $schemeId;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{schemeId}'), array($this->schemeId), '/rest/api/3/permissionscheme/{schemeId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\PermissionScheme) {
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
     * @throws \JiraSdk\Exception\UpdatePermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\UpdatePermissionSchemeForbiddenException
     * @throws \JiraSdk\Exception\UpdatePermissionSchemeNotFoundException
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
            throw new \JiraSdk\Exception\UpdatePermissionSchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdatePermissionSchemeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdatePermissionSchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
