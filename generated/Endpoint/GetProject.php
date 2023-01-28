<?php

namespace JiraSdk\Endpoint;

class GetProject extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $projectIdOrKey;
    /**
    * Returns the [project details](https://confluence.atlassian.com/x/ahLpNw) for a project.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) for the project.
    *
    * @param string $projectIdOrKey The project ID or project key (case sensitive).
    * @param array $queryParameters {
    *     @var string $expand Use [expand](#expansion) to include additional information in the response. This parameter accepts a comma-separated list. Note that the project description, issue types, and project lead are included in all responses by default. Expand options include:

    *  `description` The project description.
    *  `issueTypes` The issue types associated with the project.
    *  `lead` The project lead.
    *  `projectKeys` All project keys associated with the project.
    *  `issueTypeHierarchy` The project issue type hierarchy.
    *     @var array $properties A list of project properties to return for the project. This parameter accepts a comma-separated list.
    * }
    */
    public function __construct(string $projectIdOrKey, array $queryParameters = array())
    {
        $this->projectIdOrKey = $projectIdOrKey;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{projectIdOrKey}'), array($this->projectIdOrKey), '/rest/api/3/project/{projectIdOrKey}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('expand', 'properties'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('expand', array('string'));
        $optionsResolver->addAllowedTypes('properties', array('array'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetProjectUnauthorizedException
     * @throws \JiraSdk\Exception\GetProjectNotFoundException
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
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetProjectUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetProjectNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
