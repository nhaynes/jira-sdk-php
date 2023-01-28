<?php

namespace JiraSdk\Endpoint;

class DeleteSharePermission extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    protected $permissionId;
    /**
     * Deletes a share permission from a filter.
     **[Permissions](#permissions) required:** Permission to access Jira and the user must own the filter.
     *
     * @param int $id The ID of the filter.
     * @param int $permissionId The ID of the share permission.
     */
    public function __construct(int $id, int $permissionId)
    {
        $this->id = $id;
        $this->permissionId = $permissionId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}', '{permissionId}'), array($this->id, $this->permissionId), '/rest/api/3/filter/{id}/permission/{permissionId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteSharePermissionUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteSharePermissionNotFoundException
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
            throw new \JiraSdk\Exception\DeleteSharePermissionUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\DeleteSharePermissionNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
