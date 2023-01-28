<?php

namespace JiraSdk\Endpoint;

class DeleteCustomFieldOption extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldId;
    protected $contextId;
    protected $optionId;
    /**
    * Deletes a custom field option.

    Options with cascading options cannot be deleted without deleting the cascading options first.

    This operation works for custom field options created in Jira or the operations from this resource. **To work with issue field select list options created for Connect apps use the [Issue custom field options (apps)](#api-group-issue-custom-field-options--apps-) operations.**

    **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
    *
    * @param string $fieldId The ID of the custom field.
    * @param int $contextId The ID of the context from which an option should be deleted.
    * @param int $optionId The ID of the option to delete.
    */
    public function __construct(string $fieldId, int $contextId, int $optionId)
    {
        $this->fieldId = $fieldId;
        $this->contextId = $contextId;
        $this->optionId = $optionId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldId}', '{contextId}', '{optionId}'), array($this->fieldId, $this->contextId, $this->optionId), '/rest/api/3/field/{fieldId}/context/{contextId}/option/{optionId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return array(array(), null);
    }
    public function getExtraHeaders(): array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \JiraSdk\Exception\DeleteCustomFieldOptionBadRequestException
     * @throws \JiraSdk\Exception\DeleteCustomFieldOptionUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteCustomFieldOptionForbiddenException
     * @throws \JiraSdk\Exception\DeleteCustomFieldOptionNotFoundException
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
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteCustomFieldOptionBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteCustomFieldOptionUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteCustomFieldOptionForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteCustomFieldOptionNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}
