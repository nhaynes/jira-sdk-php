<?php

namespace JiraSdk\Endpoint;

class UpdateCustomFieldConfiguration extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldIdOrKey;
    /**
     * Update the configuration for contexts of a custom field created by a [Forge app](https://developer.atlassian.com/platform/forge/).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg). Jira permissions are not required for the Forge app that created the custom field.
     *
     * @param string $fieldIdOrKey The ID or key of the custom field, for example `customfield_10000`.
     * @param \JiraSdk\Model\CustomFieldConfigurations $requestBody
     */
    public function __construct(string $fieldIdOrKey, \JiraSdk\Model\CustomFieldConfigurations $requestBody)
    {
        $this->fieldIdOrKey = $fieldIdOrKey;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldIdOrKey}'), array($this->fieldIdOrKey), '/rest/api/3/app/field/{fieldIdOrKey}/context/configuration');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\CustomFieldConfigurations) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\UpdateCustomFieldConfigurationBadRequestException
     * @throws \JiraSdk\Exception\UpdateCustomFieldConfigurationUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateCustomFieldConfigurationForbiddenException
     * @throws \JiraSdk\Exception\UpdateCustomFieldConfigurationNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \JiraSdk\Exception\UpdateCustomFieldConfigurationBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateCustomFieldConfigurationUnauthorizedException($response);
        }
        if (403 === $status) {
            throw new \JiraSdk\Exception\UpdateCustomFieldConfigurationForbiddenException($response);
        }
        if (404 === $status) {
            throw new \JiraSdk\Exception\UpdateCustomFieldConfigurationNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
