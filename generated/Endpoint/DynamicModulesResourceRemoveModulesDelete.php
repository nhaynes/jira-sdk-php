<?php

namespace JiraSdk\Endpoint;

class DynamicModulesResourceRemoveModulesDelete extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
    * Remove all or a list of modules registered by the calling app.

    **[Permissions](#permissions) required:** Only Connect apps can make this request.
    *
    * @param array $queryParameters {
    *     @var array $moduleKey The key of the module to remove. To include multiple module keys, provide multiple copies of this parameter.
    For example, `moduleKey=dynamic-attachment-entity-property&moduleKey=dynamic-select-field`.
    Nonexistent keys are ignored.
    * }
    */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return '/rest/atlassian-connect/1/app/module/dynamic';
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
        $optionsResolver->setDefined(array('moduleKey'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('moduleKey', array('array'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DynamicModulesResourceRemoveModulesDeleteUnauthorizedException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DynamicModulesResourceRemoveModulesDeleteUnauthorizedException($serializer->deserialize($body, 'JiraSdk\\Model\\ErrorMessage', 'json'), $response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array();
    }
}
