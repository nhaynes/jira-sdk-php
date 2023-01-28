<?php

namespace JiraSdk\Endpoint;

class GetProjectEmail extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectId;
    /**
     * Returns the [project's sender email address](https://confluence.atlassian.com/x/dolKLg).
     **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
     *
     * @param int $projectId The project ID.
     */
    public function __construct(int $projectId)
    {
        $this->projectId = $projectId;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectId}'), array($this->projectId), '/rest/api/3/project/{projectId}/email');
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
     * @throws \JiraSdk\Exception\GetProjectEmailUnauthorizedException
     * @throws \JiraSdk\Exception\GetProjectEmailForbiddenException
     * @throws \JiraSdk\Exception\GetProjectEmailNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectEmailAddress
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ProjectEmailAddress', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetProjectEmailUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetProjectEmailForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetProjectEmailNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
