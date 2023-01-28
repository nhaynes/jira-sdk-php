<?php

namespace JiraSdk\Endpoint;

class GetIssueTypesForProject extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns issue types for a project.

    This operation can be accessed anonymously.

    **[Permissions](#permissions) required:** *Browse projects* [project permission](https://confluence.atlassian.com/x/yodKLg) in the relevant project or *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $projectId The ID of the project.
    *     @var int $level The level of the issue type to filter by. Use:

    *  `-1` for Subtask.
    *  `0` for Base.
    *  `1` for Epic.
    * }
    */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return '/rest/api/3/issuetype/project';
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
        $optionsResolver->setDefined(array('projectId', 'level'));
        $optionsResolver->setRequired(array('projectId'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('projectId', array('int'));
        $optionsResolver->addAllowedTypes('level', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetIssueTypesForProjectBadRequestException
     * @throws \JiraSdk\Exception\GetIssueTypesForProjectUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueTypesForProjectNotFoundException
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
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetIssueTypesForProjectBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetIssueTypesForProjectUnauthorizedException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetIssueTypesForProjectNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
