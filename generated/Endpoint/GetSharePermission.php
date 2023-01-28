<?php

namespace JiraSdk\Endpoint;

class GetSharePermission extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    protected $permissionId;
    /**
    * Returns a share permission for a filter. A filter can be shared with groups, projects, all logged-in users, or the public. Sharing with all logged-in users or the public is known as a global share permission.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** None, however, a share permission is only returned for:

    *  filters owned by the user.
    *  filters shared with a group that the user is a member of.
    *  filters shared with a private project that the user has *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for.
    *  filters shared with a public project.
    *  filters shared with the public.
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
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}', '{permissionId}'), array($this->id, $this->permissionId), '/rest/api/3/filter/{id}/permission/{permissionId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetSharePermissionUnauthorizedException
     * @throws \JiraSdk\Exception\GetSharePermissionNotFoundException
     *
     * @return null|\JiraSdk\Model\SharePermission
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\SharePermission', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetSharePermissionUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetSharePermissionNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
