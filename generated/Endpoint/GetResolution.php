<?php

namespace JiraSdk\Endpoint;

class GetResolution extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
     * Returns an issue resolution value.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param string $id The ID of the issue resolution value.
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/resolution/{id}');
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
     * @throws \JiraSdk\Exception\GetResolutionUnauthorizedException
     * @throws \JiraSdk\Exception\GetResolutionNotFoundException
     *
     * @return null|\JiraSdk\Model\Resolution
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\Resolution', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetResolutionUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetResolutionNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
