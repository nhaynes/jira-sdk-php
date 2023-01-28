<?php

namespace JiraSdk\Endpoint;

class UpdateProjectType extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    protected $newProjectTypeKey;
    /**
     * Deprecated, this feature is no longer supported and no alternatives are available, see [Convert project to a different template or type](https://confluence.atlassian.com/x/yEKeOQ). Updates a [project type](https://confluence.atlassian.com/x/GwiiLQ). The project type can be updated for classic projects only, project type cannot be updated for next-gen projects.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $projectIdOrKey The project ID or project key (case sensitive).
     * @param string $newProjectTypeKey The key of the new project type.
     */
    public function __construct(string $projectIdOrKey, string $newProjectTypeKey)
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->newProjectTypeKey = $newProjectTypeKey;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}', '{newProjectTypeKey}'), array($this->projectIdOrKey, $this->newProjectTypeKey), '/rest/api/3/project/{projectIdOrKey}/type/{newProjectTypeKey}');
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
     * @throws \JiraSdk\Exception\UpdateProjectTypeBadRequestException
     * @throws \JiraSdk\Exception\UpdateProjectTypeUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateProjectTypeNotFoundException
     *
     * @return null|\JiraSdk\Model\Project
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\Project', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\UpdateProjectTypeBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateProjectTypeUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateProjectTypeNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
