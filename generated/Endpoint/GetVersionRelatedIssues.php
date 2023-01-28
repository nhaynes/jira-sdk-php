<?php

namespace JiraSdk\Endpoint;

class GetVersionRelatedIssues extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $id;
    /**
    * Returns the following counts for a version:

    *  Number of issues where the `fixVersion` is set to the version.
    *  Number of issues where the `affectedVersion` is set to the version.
    *  Number of issues where a version custom field is set to the version.

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
        return str_replace(array('{id}'), array($this->id), '/rest/api/3/version/{id}/relatedIssueCounts');
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
     * @throws \JiraSdk\Exception\GetVersionRelatedIssuesUnauthorizedException
     * @throws \JiraSdk\Exception\GetVersionRelatedIssuesNotFoundException
     *
     * @return null|\JiraSdk\Model\VersionIssueCounts
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\VersionIssueCounts', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetVersionRelatedIssuesUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetVersionRelatedIssuesNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
