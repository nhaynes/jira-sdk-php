<?php

namespace JiraSdk\Endpoint;

class AddSharePermission extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Add a share permissions to a filter. If you add a global share permission (one for all logged-in users or the public) it will overwrite all share permissions for the filter.

    Be aware that this operation uses different objects for updating share permissions compared to [Update filter](#api-rest-api-3-filter-id-put).

    **[Permissions](#permissions) required:** *Share dashboards and filters* [global permission](https://confluence.atlassian.com/x/x4dKLg) and the user must own the filter.
    *
    * @param int $id The ID of the filter.
    * @param \JiraSdk\Model\SharePermissionInputBean $requestBody
    */
    public function __construct(int $id, \JiraSdk\Model\SharePermissionInputBean $requestBody)
    {
        $this->id = $id;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/filter/{id}/permission');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\SharePermissionInputBean) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\AddSharePermissionBadRequestException
     * @throws \JiraSdk\Exception\AddSharePermissionUnauthorizedException
     * @throws \JiraSdk\Exception\AddSharePermissionNotFoundException
     *
     * @return null|\JiraSdk\Model\SharePermission[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\SharePermission[]', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\AddSharePermissionBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\AddSharePermissionUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\AddSharePermissionNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
