<?php

namespace JiraSdk\Endpoint;

class UpdateMultipleCustomFieldValues extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    /**
     * Updates the value of one or more custom fields on one or more issues. Combinations of custom field and issue should be unique within the request. Custom fields can only be updated by the Forge app that created them.
     **[Permissions](#permissions) required:** Only the app that created the custom field can update its values with this operation.
     *
     * @param \JiraSdk\Model\MultipleCustomFieldValuesUpdateDetails $requestBody
     * @param array $queryParameters {
     *     @var bool $generateChangelog Whether to generate a changelog for this update.
     * }
     */
    public function __construct(\JiraSdk\Model\MultipleCustomFieldValuesUpdateDetails $requestBody, array $queryParameters = array())
    {
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/rest/api/3/app/field/value';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\MultipleCustomFieldValuesUpdateDetails) {
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
     * @throws \JiraSdk\Exception\UpdateMultipleCustomFieldValuesBadRequestException
     * @throws \JiraSdk\Exception\UpdateMultipleCustomFieldValuesForbiddenException
     * @throws \JiraSdk\Exception\UpdateMultipleCustomFieldValuesNotFoundException
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
            throw new \JiraSdk\Exception\UpdateMultipleCustomFieldValuesBadRequestException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateMultipleCustomFieldValuesForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateMultipleCustomFieldValuesNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
