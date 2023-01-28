<?php

namespace JiraSdk\Endpoint;

class GetSecurityLevelsForProject extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectKeyOrId;
    /**
    * Returns all [issue security](https://confluence.atlassian.com/x/J4lKLg) levels for the project that the user has access to.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Browse projects* [global permission](https://confluence.atlassian.com/x/x4dKLg) for the project, however, issue security levels are only returned for authenticated user with *Set Issue Security* [global permission](https://confluence.atlassian.com/x/x4dKLg) for the project.
    *
    * @param string $projectKeyOrId The project ID or project key (case sensitive).
    */
    public function __construct(string $projectKeyOrId)
    {
        $this->projectKeyOrId = $projectKeyOrId;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectKeyOrId}'), array($this->projectKeyOrId), '/rest/api/3/project/{projectKeyOrId}/securitylevel');
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
     * @throws \JiraSdk\Exception\GetSecurityLevelsForProjectNotFoundException
     *
     * @return null|\JiraSdk\Model\ProjectIssueSecurityLevels
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\ProjectIssueSecurityLevels', 'json');
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetSecurityLevelsForProjectNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
