<?php

namespace JiraSdk\Endpoint;

class GetProjectIssueSecurityScheme extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectKeyOrId;
    /**
     * Returns the [issue security scheme](https://confluence.atlassian.com/x/J4lKLg) associated with the project.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg) or the *Administer Projects* [project permission](https://confluence.atlassian.com/x/yodKLg).
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
        return str_replace(array('{projectKeyOrId}'), array($this->projectKeyOrId), '/rest/api/3/project/{projectKeyOrId}/issuesecuritylevelscheme');
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
     * @throws \JiraSdk\Exception\GetProjectIssueSecuritySchemeBadRequestException
     * @throws \JiraSdk\Exception\GetProjectIssueSecuritySchemeUnauthorizedException
     * @throws \JiraSdk\Exception\GetProjectIssueSecuritySchemeForbiddenException
     * @throws \JiraSdk\Exception\GetProjectIssueSecuritySchemeNotFoundException
     *
     * @return null|\JiraSdk\Model\SecurityScheme
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\SecurityScheme', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetProjectIssueSecuritySchemeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetProjectIssueSecuritySchemeUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetProjectIssueSecuritySchemeForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetProjectIssueSecuritySchemeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
