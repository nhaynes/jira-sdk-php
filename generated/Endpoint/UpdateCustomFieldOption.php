<?php

namespace JiraSdk\Endpoint;

class UpdateCustomFieldOption extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldId;
    protected $contextId;
    /**
    * Updates the options of a custom field.

    If any of the options are not found, no options are updated. Options where the values in the request match the current values aren't updated and aren't reported in the response.

    Note that this operation **only works for issue field select list options created in Jira or using operations from the [Issue custom field options](#api-group-Issue-custom-field-options) resource**, it cannot be used with issue field select list options created by Connect apps.

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param int $contextId The ID of the context.
    * @param \JiraSdk\Model\BulkCustomFieldOptionUpdateRequest $requestBody
    */
    public function __construct(string $fieldId, int $contextId, \JiraSdk\Model\BulkCustomFieldOptionUpdateRequest $requestBody)
    {
        $this->fieldId = $fieldId;
        $this->contextId = $contextId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'PUT';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldId}', '{contextId}'), array($this->fieldId, $this->contextId), '/rest/api/3/field/{fieldId}/context/{contextId}/option');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\BulkCustomFieldOptionUpdateRequest) {
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
     * @throws \JiraSdk\Exception\UpdateCustomFieldOptionBadRequestException
     * @throws \JiraSdk\Exception\UpdateCustomFieldOptionUnauthorizedException
     * @throws \JiraSdk\Exception\UpdateCustomFieldOptionForbiddenException
     * @throws \JiraSdk\Exception\UpdateCustomFieldOptionNotFoundException
     *
     * @return null|\JiraSdk\Model\CustomFieldUpdatedContextOptionsList
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\CustomFieldUpdatedContextOptionsList', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\UpdateCustomFieldOptionBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\UpdateCustomFieldOptionUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\UpdateCustomFieldOptionForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\UpdateCustomFieldOptionNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
