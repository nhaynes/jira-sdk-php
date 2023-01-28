<?php

namespace JiraSdk\Endpoint;

class DeletePermissionScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $schemeId;
    /**
     * Deletes a permission scheme.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param int $schemeId The ID of the permission scheme being deleted.
     */
    public function __construct(int $schemeId)
    {
        $this->schemeId = $schemeId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{schemeId}'), array($this->schemeId), '/rest/api/3/permissionscheme/{schemeId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeletePermissionSchemeUnauthorizedException
     * @throws \JiraSdk\Exception\DeletePermissionSchemeForbiddenException
     * @throws \JiraSdk\Exception\DeletePermissionSchemeNotFoundException
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
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeletePermissionSchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\DeletePermissionSchemeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeletePermissionSchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
