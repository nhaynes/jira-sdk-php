<?php

namespace JiraSdk\Endpoint;

class GetNotificationSchemeToProjectMappings extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
     * Returns a [paginated](#pagination) mapping of project that have notification scheme assigned. You can provide either one or multiple notification scheme IDs or project IDs to filter by. If you don't provide any, this will return a list of all mappings. Note that only company-managed (classic) projects are supported. This is because team-managed projects don't have a concept of a default notification scheme. The mappings are ordered by projectId.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *     @var string $startAt The index of the first item to return in a page of results (page offset).
     *     @var string $maxResults The maximum number of items to return per page.
     *     @var array $notificationSchemeId The list of notifications scheme IDs to be filtered out
     *     @var array $projectId The list of project IDs to be filtered out
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
        return '/rest/api/3/notificationscheme/project';
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
        $optionsResolver->setDefined(array('startAt', 'maxResults', 'notificationSchemeId', 'projectId'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => '0', 'maxResults' => '50'));
        $optionsResolver->addAllowedTypes('startAt', array('string'));
        $optionsResolver->addAllowedTypes('maxResults', array('string'));
        $optionsResolver->addAllowedTypes('notificationSchemeId', array('array'));
        $optionsResolver->addAllowedTypes('projectId', array('array'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetNotificationSchemeToProjectMappingsBadRequestException
     * @throws \JiraSdk\Exception\GetNotificationSchemeToProjectMappingsUnauthorizedException
     *
     * @return null|\JiraSdk\Model\PageBeanNotificationSchemeAndProjectMappingJsonBean
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanNotificationSchemeAndProjectMappingJsonBean', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetNotificationSchemeToProjectMappingsBadRequestException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetNotificationSchemeToProjectMappingsUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
