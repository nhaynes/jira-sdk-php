<?php

namespace JiraSdk\Endpoint;

class GetVersionUnresolvedIssues extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Returns counts of the issues and unresolved issues for the project version.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Browse projects* project permission for the project that contains the version.
    *
    * @param string $id The ID of the version.
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
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/version/{id}/unresolvedIssueCount');
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
     * @throws \JiraSdk\Exception\GetVersionUnresolvedIssuesUnauthorizedException
     * @throws \JiraSdk\Exception\GetVersionUnresolvedIssuesNotFoundException
     *
     * @return null|\JiraSdk\Model\VersionUnresolvedIssuesCount
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\VersionUnresolvedIssuesCount', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetVersionUnresolvedIssuesUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetVersionUnresolvedIssuesNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
