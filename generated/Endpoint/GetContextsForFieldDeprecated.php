<?php

namespace JiraSdk\Endpoint;

class GetContextsForFieldDeprecated extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldId;
    /**
     * Returns a [paginated](#pagination) list of the contexts a field is used in. Deprecated, use [ Get custom field contexts](#api-rest-api-3-field-fieldId-context-get).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId The ID of the field to return contexts for.
     * @param array $queryParameters {
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
        return str_replace(array('{fieldId}'), array($this->fieldId), '/rest/api/3/field/{fieldId}/contexts');
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
        $optionsResolver->setDefined(array('startAt', 'maxResults'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('startAt' => 0, 'maxResults' => 20));
        $optionsResolver->addAllowedTypes('startAt', array('int'));
        $optionsResolver->addAllowedTypes('maxResults', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\GetContextsForFieldDeprecatedUnauthorizedException
     * @throws \JiraSdk\Exception\GetContextsForFieldDeprecatedForbiddenException
     *
     * @return null|\JiraSdk\Model\PageBeanContext
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\PageBeanContext', 'json');
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\GetContextsForFieldDeprecatedUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\GetContextsForFieldDeprecatedForbiddenException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
