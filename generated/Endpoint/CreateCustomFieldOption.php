<?php

namespace JiraSdk\Endpoint;

class CreateCustomFieldOption extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldId;
    protected $contextId;
    /**
    * Creates options and, where the custom select field is of the type Select List (cascading), cascading options for a custom select field. The options are added to a context of the field.

    The maximum number of options that can be created per request is 1000 and each field can have a maximum of 10000 options.

    This operation works for custom field options created in Jira or the operations from this resource. **To work with issue field select list options created for Connect apps use the [Issue custom field options (apps)](#api-group-issue-custom-field-options--apps-) operations.**

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param int $contextId The ID of the context.
    * @param \JiraSdk\Model\BulkCustomFieldOptionCreateRequest $requestBody
    */
    public function __construct(string $fieldId, int $contextId, \JiraSdk\Model\BulkCustomFieldOptionCreateRequest $requestBody)
    {
        $this->fieldId = $fieldId;
        $this->contextId = $contextId;
        $this->body = $requestBody;
    }
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldId}', '{contextId}'), array($this->fieldId, $this->contextId), '/rest/api/3/field/{fieldId}/context/{contextId}/option');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \JiraSdk\Model\BulkCustomFieldOptionCreateRequest) {
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
     * @throws \JiraSdk\Exception\CreateCustomFieldOptionBadRequestException
     * @throws \JiraSdk\Exception\CreateCustomFieldOptionUnauthorizedException
     * @throws \JiraSdk\Exception\CreateCustomFieldOptionForbiddenException
     * @throws \JiraSdk\Exception\CreateCustomFieldOptionNotFoundException
     *
     * @return null|\JiraSdk\Model\CustomFieldCreatedContextOptionsList
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'JiraSdk\\Model\\CustomFieldCreatedContextOptionsList', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\CreateCustomFieldOptionBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\CreateCustomFieldOptionUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\CreateCustomFieldOptionForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\CreateCustomFieldOptionNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
