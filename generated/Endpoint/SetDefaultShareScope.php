<?php

namespace JiraSdk\Endpoint;

class SetDefaultShareScope extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
     * Sets the default sharing for new filters and dashboards for a user.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param \JiraSdk\Model\DefaultShareScope $requestBody
     */
    public function __construct(\JiraSdk\Model\DefaultShareScope $requestBody)
    {
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return '/rest/api/3/filter/defaultShareScope';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\DefaultShareScope) {
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
     * @throws \JiraSdk\Exception\SetDefaultShareScopeBadRequestException
     * @throws \JiraSdk\Exception\SetDefaultShareScopeUnauthorizedException
     *
     * @return null|\JiraSdk\Model\DefaultShareScope
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\DefaultShareScope', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\SetDefaultShareScopeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\SetDefaultShareScopeUnauthorizedException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
