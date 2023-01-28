<?php

namespace JiraSdk\Endpoint;

class MoveVersion extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Modifies the version's sequence within the project, which affects the display order of the versions in Jira.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Browse projects* project permission for the project that contains the version.
    *
    * @param string $id The ID of the version to be moved.
    * @param \JiraSdk\Model\VersionMoveBean $requestBody
    */
    public function __construct(string $id, \JiraSdk\Model\VersionMoveBean $requestBody)
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
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/version/{id}/move');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\VersionMoveBean) {
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
     * @throws \JiraSdk\Exception\MoveVersionBadRequestException
     * @throws \JiraSdk\Exception\MoveVersionUnauthorizedException
     * @throws \JiraSdk\Exception\MoveVersionNotFoundException
     *
     * @return null|\JiraSdk\Model\Version
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\Version', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\MoveVersionBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\MoveVersionUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\MoveVersionNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
