<?php

namespace JiraSdk\Endpoint;

class GetAllStatuses extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    /**
    * Returns the valid statuses for a project. The statuses are grouped by issue type, as each project has a set of valid issue types and each issue type has a set of valid statuses.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Browse Projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    */
    public function __construct(string $projectIdOrKey)
    {
        $this->projectIdOrKey = $projectIdOrKey;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}'), array($this->projectIdOrKey), '/rest/api/3/project/{projectIdOrKey}/statuses');
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
     * @throws \JiraSdk\Exception\GetAllStatusesUnauthorizedException
     * @throws \JiraSdk\Exception\GetAllStatusesNotFoundException
     *
     * @return null|\JiraSdk\Model\IssueTypeWithStatus[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\IssueTypeWithStatus[]', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAllStatusesUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetAllStatusesNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
