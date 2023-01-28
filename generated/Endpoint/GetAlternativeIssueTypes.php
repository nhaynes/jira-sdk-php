<?php

namespace JiraSdk\Endpoint;

class GetAlternativeIssueTypes extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Returns a list of issue types that can be used to replace the issue type. The alternative issue types are those assigned to the same workflow scheme, field configuration scheme, and screen scheme.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** None.
    *
    * @param string $id The ID of the issue type.
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
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/issuetype/{id}/alternatives');
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
     * @throws \JiraSdk\Exception\GetAlternativeIssueTypesUnauthorizedException
     * @throws \JiraSdk\Exception\GetAlternativeIssueTypesNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueTypeDetails[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\IssueTypeDetails[]', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAlternativeIssueTypesUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetAlternativeIssueTypesNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
