<?php

namespace JiraSdk\Endpoint;

class GetIssueSecuritySchemes extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return '/rest/api/3/issuesecurityschemes';
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
     * @throws \JiraSdk\Exception\GetIssueSecuritySchemesUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueSecuritySchemesForbiddenException
     *
     * @return null|\JiraSdk\Model\SecuritySchemes
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\SecuritySchemes', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetIssueSecuritySchemesUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetIssueSecuritySchemesForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
