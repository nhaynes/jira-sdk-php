<?php

namespace JiraSdk\Endpoint;

class ToggleFeatureForProject extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    protected $featureKey;
    /**
     * Sets the state of a project feature.
     *
     * @param string $projectIdOrKey The ID or (case-sensitive) key of the project.
     * @param string $featureKey The key of the feature.
     * @param \JiraSdk\Model\ProjectFeatureState $requestBody
     */
    public function __construct(string $projectIdOrKey, string $featureKey, \JiraSdk\Model\ProjectFeatureState $requestBody)
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->featureKey = $featureKey;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}', '{featureKey}'), array($this->projectIdOrKey, $this->featureKey), '/rest/api/3/project/{projectIdOrKey}/features/{featureKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\ProjectFeatureState) {
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
     * @throws \JiraSdk\Exception\ToggleFeatureForProjectBadRequestException
     * @throws \JiraSdk\Exception\ToggleFeatureForProjectUnauthorizedException
     * @throws \JiraSdk\Exception\ToggleFeatureForProjectForbiddenException
     * @throws \JiraSdk\Exception\ToggleFeatureForProjectNotFoundException
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
            throw new \JiraSdk\Exception\ToggleFeatureForProjectBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\ToggleFeatureForProjectUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\ToggleFeatureForProjectForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\ToggleFeatureForProjectNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
