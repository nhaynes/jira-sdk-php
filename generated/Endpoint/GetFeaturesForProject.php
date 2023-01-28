<?php

namespace JiraSdk\Endpoint;

class GetFeaturesForProject extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    /**
     * Returns the list of features for a project.
     *
     * @param string $projectIdOrKey The ID or (case-sensitive) key of the project.
     */
    public function __construct(string $projectIdOrKey)
    {
        $this->projectIdOrKey = $projectIdOrKey;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}'), array($this->projectIdOrKey), '/rest/api/3/project/{projectIdOrKey}/features');
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
     * @throws \JiraSdk\Exception\GetFeaturesForProjectBadRequestException
     * @throws \JiraSdk\Exception\GetFeaturesForProjectUnauthorizedException
     * @throws \JiraSdk\Exception\GetFeaturesForProjectForbiddenException
     * @throws \JiraSdk\Exception\GetFeaturesForProjectNotFoundException
     *
     * @return null|\JiraSdk\Model\ContainerForProjectFeatures
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ContainerForProjectFeatures', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetFeaturesForProjectBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetFeaturesForProjectUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetFeaturesForProjectForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetFeaturesForProjectNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
