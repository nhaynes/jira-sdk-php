<?php

namespace JiraSdk\Endpoint;

class SelectTimeTrackingImplementation extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
     * Selects a time tracking provider.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\TimeTrackingProvider $requestBody
     */
    public function __construct(\JiraSdk\Model\TimeTrackingProvider $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return '/rest/api/3/configuration/timetracking';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\TimeTrackingProvider) {
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
     * @throws \JiraSdk\Exception\SelectTimeTrackingImplementationBadRequestException
     * @throws \JiraSdk\Exception\SelectTimeTrackingImplementationUnauthorizedException
     * @throws \JiraSdk\Exception\SelectTimeTrackingImplementationForbiddenException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (204 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\SelectTimeTrackingImplementationBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SelectTimeTrackingImplementationUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\SelectTimeTrackingImplementationForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
