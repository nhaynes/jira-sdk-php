<?php

namespace JiraSdk\Endpoint;

class GetIssueNavigatorDefaultColumns extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return '/rest/api/3/settings/columns';
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
     * @throws \JiraSdk\Exception\GetIssueNavigatorDefaultColumnsUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueNavigatorDefaultColumnsForbiddenException
     *
     * @return null|\JiraSdk\Model\ColumnItem[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ColumnItem[]', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetIssueNavigatorDefaultColumnsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetIssueNavigatorDefaultColumnsForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth');
    }
}
