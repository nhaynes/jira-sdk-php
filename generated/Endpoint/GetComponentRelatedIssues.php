<?php

namespace JiraSdk\Endpoint;

class GetComponentRelatedIssues extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Returns the counts of issues assigned to the component.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** None.
    *
    * @param string $id The ID of the component.
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
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/component/{id}/relatedIssueCounts');
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
     * @throws \JiraSdk\Exception\GetComponentRelatedIssuesUnauthorizedException
     * @throws \JiraSdk\Exception\GetComponentRelatedIssuesNotFoundException
     *
     * @return null|\JiraSdk\Model\ComponentIssuesCount
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ComponentIssuesCount', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetComponentRelatedIssuesUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetComponentRelatedIssuesNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
