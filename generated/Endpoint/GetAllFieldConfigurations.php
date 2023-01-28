<?php

namespace JiraSdk\Endpoint;

class GetAllFieldConfigurations extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns a [paginated](#pagination) list of field configurations. The list can be for all field configurations or a subset determined by any combination of these criteria:

    *  a list of field configuration item IDs.
    *  whether the field configuration is a default.
    *  whether the field configuration name or description contains a query string.

    Only field configurations used in company-managed (classic) projects are returned.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $id The list of field configuration IDs. To include multiple IDs, provide an ampersand-separated list. For example, `id=10000&id=10001`.
    *     @var bool $isDefault If *true* returns default field configurations only.
    *     @var string $query The query string used to match against field configuration names and descriptions.
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
        return '/rest/api/3/fieldconfiguration';
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
        $optionsResolver->setDefined(array('startAt', 'maxResults', 'id', 'isDefault', 'query'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 50, 'isDefault' => false, 'query' => ''));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('id', array('array'));
        $optionsResolver->addAllowedTypes('isDefault', array('bool'));
        $optionsResolver->addAllowedTypes('query', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetAllFieldConfigurationsUnauthorizedException
     * @throws \JiraSdk\Exception\GetAllFieldConfigurationsForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanFieldConfigurationDetails
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanFieldConfigurationDetails', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetAllFieldConfigurationsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetAllFieldConfigurationsForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
