<?php

namespace JiraSdk\Endpoint;

class UpdateProject extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    /**
    * Updates the [project details](https://confluence.atlassian.com/x/ahLpNw) of a project.

    All parameters are optional in the body of the request.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param \JiraSdk\Model\UpdateProjectDetails $requestBody
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that the project description, issue types, and project lead are included in all responses by default. Expand options include:

    *  `description` The project description.
    *  `issueTypes` The issue types associated with the project.
    *  `lead` The project lead.
    *  `projectKeys` All project keys associated with the project.
    * }
    */
    public function __construct(string $projectIdOrKey, \JiraSdk\Model\UpdateProjectDetails $requestBody, array $queryParameters = array())
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}'), array($this->projectIdOrKey), '/rest/api/3/project/{projectIdOrKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\UpdateProjectDetails) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('expand'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('expand', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\UpdateProjectBadRequestException
     * @throws \JiraSdk\Exception\UpdateProjectUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateProjectForbiddenException
     * @throws \JiraSdk\Exception\UpdateProjectNotFoundException
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
            throw new \JiraSdk\Exception\UpdateProjectBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateProjectUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateProjectForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateProjectNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
