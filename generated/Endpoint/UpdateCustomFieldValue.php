<?php

namespace JiraSdk\Endpoint;

class UpdateCustomFieldValue extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldIdOrKey;
    /**
     * Updates the value of a custom field on one or more issues. Custom fields can only be updated by the Forge app that created them.
     **[Permissions](#permissions) required:** Only the app that created the custom field can update its values with this operation.
     *
     * @param string $fieldIdOrKey The ID or key of the custom field. For example, `customfield_10010`.
     * @param \JiraSdk\Model\CustomFieldValueUpdateDetails $requestBody
     * @param array $queryParameters {
     *     @var bool $generateChangelog Whether to generate a changelog for this update.
     * }
     */
    public function __construct(string $fieldIdOrKey, \JiraSdk\Model\CustomFieldValueUpdateDetails $requestBody, array $queryParameters = array())
    {
        $this->fieldIdOrKey = $fieldIdOrKey;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldIdOrKey}'), array($this->fieldIdOrKey), '/rest/api/3/app/field/{fieldIdOrKey}/value');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\CustomFieldValueUpdateDetails) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('generateChangelog'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('generateChangelog' => true));
        $optionsResolver->addAllowedTypes('generateChangelog', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\UpdateCustomFieldValueBadRequestException
     * @throws \JiraSdk\Exception\UpdateCustomFieldValueForbiddenException
     * @throws \JiraSdk\Exception\UpdateCustomFieldValueNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (204 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\UpdateCustomFieldValueBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateCustomFieldValueForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateCustomFieldValueNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
