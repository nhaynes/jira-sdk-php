<?php

namespace JiraSdk\Endpoint;

class GetFieldConfigurationSchemeProjectMapping extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns a [paginated](#pagination) list of field configuration schemes and, for each scheme, a list of the projects that use it.

    The list is sorted by field configuration scheme ID. The first item contains the list of project IDs assigned to the default field configuration scheme.

    Only field configuration schemes used in classic projects are returned.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $projectId The list of project IDs. To include multiple projects, separate IDs with ampersand: `projectId=10000&projectId=10001`.
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
        return '/rest/api/3/fieldconfigurationscheme/project';
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
        $optionsResolver->setDefined(array('startAt', 'maxResults', 'projectId'));
        $optionsResolver->setRequired(array('projectId'));
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 50));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('projectId', array('array'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetFieldConfigurationSchemeProjectMappingBadRequestException
     * @throws \JiraSdk\Exception\GetFieldConfigurationSchemeProjectMappingUnauthorizedException
     * @throws \JiraSdk\Exception\GetFieldConfigurationSchemeProjectMappingForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanFieldConfigurationSchemeProjects
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanFieldConfigurationSchemeProjects', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetFieldConfigurationSchemeProjectMappingBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetFieldConfigurationSchemeProjectMappingUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetFieldConfigurationSchemeProjectMappingForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
