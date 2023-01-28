<?php

namespace JiraSdk\Endpoint;

class GetPermittedProjects extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns all the projects where the user is granted a list of project permissions.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** None.
    *
    * @param \JiraSdk\Model\PermissionsKeysBean $requestBody
    */
    public function __construct(\JiraSdk\Model\PermissionsKeysBean $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/api/3/permissions/project';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\PermissionsKeysBean) {
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
     * @throws \JiraSdk\Exception\GetPermittedProjectsBadRequestException
     * @throws \JiraSdk\Exception\GetPermittedProjectsUnauthorizedException
     *
     * @return null|\JiraSdk\Model\PermittedProjects
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PermittedProjects', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetPermittedProjectsBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetPermittedProjectsUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
