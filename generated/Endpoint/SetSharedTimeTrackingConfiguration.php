<?php

namespace JiraSdk\Endpoint;

class SetSharedTimeTrackingConfiguration extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
     * Sets the time tracking settings.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param \JiraSdk\Model\TimeTrackingConfiguration $requestBody
     */
    public function __construct(\JiraSdk\Model\TimeTrackingConfiguration $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return '/rest/api/3/configuration/timetracking/options';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\TimeTrackingConfiguration) {
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
     * @throws \JiraSdk\Exception\SetSharedTimeTrackingConfigurationBadRequestException
     * @throws \JiraSdk\Exception\SetSharedTimeTrackingConfigurationUnauthorizedException
     * @throws \JiraSdk\Exception\SetSharedTimeTrackingConfigurationForbiddenException
     *
     * @return null|\JiraSdk\Model\TimeTrackingConfiguration
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\TimeTrackingConfiguration', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\SetSharedTimeTrackingConfigurationBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SetSharedTimeTrackingConfigurationUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\SetSharedTimeTrackingConfigurationForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
