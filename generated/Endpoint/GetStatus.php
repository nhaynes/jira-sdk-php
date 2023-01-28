<?php

namespace JiraSdk\Endpoint;

class GetStatus extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $idOrName;
    /**
    * Returns a status. The status must be associated with an active workflow to be returned.

    If a name is used on more than one status, only the status found first is returned. Therefore, identifying the status by its ID may be preferable.

    This operation can be accessed anonymously.

    [Permissions](#permissions) required: None.
    *
    * @param string $idOrName The ID or name of the status.
    */
    public function __construct(string $idOrName)
    {
        $this->idOrName = $idOrName;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{idOrName}'), array($this->idOrName), '/rest/api/3/status/{idOrName}');
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
     * @throws \JiraSdk\Exception\GetStatusUnauthorizedException
     * @throws \JiraSdk\Exception\GetStatusNotFoundException
     *
     * @return null|\JiraSdk\Model\StatusDetails
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\StatusDetails', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetStatusUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetStatusNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
