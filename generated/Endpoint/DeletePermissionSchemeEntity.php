<?php

namespace JiraSdk\Endpoint;

class DeletePermissionSchemeEntity extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $schemeId;
    protected $permissionId;
    /**
     * Deletes a permission grant from a permission scheme. See [About permission schemes and grants](../api-group-permission-schemes/#about-permission-schemes-and-grants) for more details.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $schemeId The ID of the permission scheme to delete the permission grant from.
     * @param int $permissionId The ID of the permission grant to delete.
     */
    public function __construct(int $schemeId, int $permissionId)
    {
        $this->schemeId = $schemeId;
        $this->permissionId = $permissionId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{schemeId}', '{permissionId}'), array($this->schemeId, $this->permissionId), '/rest/api/3/permissionscheme/{schemeId}/permission/{permissionId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeletePermissionSchemeEntityBadRequestException
     * @throws \JiraSdk\Exception\DeletePermissionSchemeEntityUnauthorizedException
     * @throws \JiraSdk\Exception\DeletePermissionSchemeEntityForbiddenException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\DeletePermissionSchemeEntityBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeletePermissionSchemeEntityUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeletePermissionSchemeEntityForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
