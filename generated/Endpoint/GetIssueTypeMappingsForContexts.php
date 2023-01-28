<?php

namespace JiraSdk\Endpoint;

class GetIssueTypeMappingsForContexts extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldId;
    /**
     * Returns a [paginated](#pagination) list of context to issue type mappings for a custom field. Mappings are returned for all contexts or a list of contexts. Mappings are ordered first by context ID and then by issue type ID.
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId The ID of the custom field.
     * @param array $queryParameters {
     *     @var array $contextId The ID of the context. To include multiple contexts, provide an ampersand-separated list. For example, `contextId=10001&contextId=10002`.
     *     @var int $startAt The index of the first item to return in a page of results (page offset).
     *     @var int $maxResults The maximum number of items to return per page.
     * }
     */
    public function __construct(string $fieldId, array $queryParameters = array())
    {
        $this->fieldId = $fieldId;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldId}'), array($this->fieldId), '/rest/api/3/field/{fieldId}/context/issuetypemapping');
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
        $optionsResolver->setDefined(array('contextId', 'startAt', 'maxResults'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 50));
        $optionsResolver->addAllowedTypes('contextId', array('array'));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetIssueTypeMappingsForContextsUnauthorizedException
     * @throws \JiraSdk\Exception\GetIssueTypeMappingsForContextsForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanIssueTypeToContextMapping
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanIssueTypeToContextMapping', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetIssueTypeMappingsForContextsUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\GetIssueTypeMappingsForContextsForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
