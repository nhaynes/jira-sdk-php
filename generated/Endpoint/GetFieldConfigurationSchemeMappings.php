<?php

namespace JiraSdk\Endpoint;

class GetFieldConfigurationSchemeMappings extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Returns a [paginated](#pagination) list of field configuration issue type items.

    Only items used in classic projects are returned.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param array $queryParameters {
    *     @var int $startAt The index of the first item to return in a page of results (page offset).
    *     @var int $maxResults The maximum number of items to return per page.
    *     @var array $fieldConfigurationSchemeId The list of field configuration scheme IDs. To include multiple field configuration schemes separate IDs with ampersand: `fieldConfigurationSchemeId=10000&fieldConfigurationSchemeId=10001`.
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
        return '/rest/api/3/fieldconfigurationscheme/mapping';
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
        $optionsResolver->setDefined(array('startAt', 'maxResults', 'fieldConfigurationSchemeId'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 50));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        $optionsResolver->addAllowedTypes('fieldConfigurationSchemeId', array('array'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetFieldConfigurationSchemeMappingsBadRequestException
     * @throws \JiraSdk\Exception\GetFieldConfigurationSchemeMappingsUnauthorizedException
     * @throws \JiraSdk\Exception\GetFieldConfigurationSchemeMappingsForbiddenException
     * @throws \JiraSdk\Exception\GetFieldConfigurationSchemeMappingsNotFoundException
     *
     * @return null|\JiraSdk\Model\PageBeanFieldConfigurationIssueTypeItem
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanFieldConfigurationIssueTypeItem', 'json');
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\GetFieldConfigurationSchemeMappingsBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetFieldConfigurationSchemeMappingsUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetFieldConfigurationSchemeMappingsForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\GetFieldConfigurationSchemeMappingsNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
