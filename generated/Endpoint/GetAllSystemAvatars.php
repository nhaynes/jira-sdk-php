<?php

namespace JiraSdk\Endpoint;

class GetAllSystemAvatars extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $type;
    /**
    * Returns a list of system avatar details by owner type, where the owner types are issue type, project, or user.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** None.
    *
    * @param string $type The avatar type.
    */
    public function __construct(string $type)
    {
        $this->type = $type;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{type}'), array($this->type), '/rest/api/3/avatar/{type}/system');
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
     * @throws \JiraSdk\Exception\GetAllSystemAvatarsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAllSystemAvatarsInternalServerErrorException
     *
     * @return null|\JiraSdk\Model\SystemAvatars
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\SystemAvatars', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAllSystemAvatarsUnauthorizedException($response);
        }
        if (500 === $status) {
            throw new \JiraSdk\Exception\GetAllSystemAvatarsInternalServerErrorException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
