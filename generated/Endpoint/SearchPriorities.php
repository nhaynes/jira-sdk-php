<?php

namespace JiraSdk\Endpoint;

class SearchPriorities extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
     * Returns a [paginated](#pagination) list of priorities. The list can contain all priorities or a subset determined by any combination of these criteria:
     *  a list of priority IDs. Any invalid priority IDs are ignored.
     *  whether the field configuration is a default. This returns priorities from company-managed (classic) projects only, as there is no concept of default priorities in team-managed projects.
     **[Permissions](#permissions) required:** Permission to access Jira.
     *
     * @param array $queryParameters {
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     *     @var array $id The list of priority IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=2&id=3`.
     *     @var bool $onlyDefault Whether only the default priority is returned.
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
        return '/rest/api/3/priority/search';
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
        $optionsResolver->setDefined(array('startAt', 'maxResults', 'id', 'onlyDefault'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 50, 'onlyDefault' => false));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('id', array('array'));
        $optionsResolver->addAllowedTypes('onlyDefault', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\SearchPrioritiesUnauthorizedException
     *
     * @return null|\JiraSdk\Model\PageBeanPriority
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanPriority', 'json');
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\SearchPrioritiesUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorCollection', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
