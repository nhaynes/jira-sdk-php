<?php

namespace JiraSdk\Endpoint;

class DeleteCustomFieldContext extends \JiraSdk\Runtime\Client\BaseEndpoint implements \JiraSdk\Runtime\Client\Endpoint
{
    use \JiraSdk\Runtime\Client\EndpointTrait;
    protected $fieldId;
    protected $contextId;
    /**
     * Deletes a [ custom field context](https://confluence.atlassian.com/adminjiracloud/what-are-custom-field-contexts-991923859.html).
     **[Permissions](#permissions) required:** *Administer Jira* [global permission](https://confluence.atlassian.com/x/x4dKLg).
     *
     * @param string $fieldId The ID of the custom field.
     * @param int $contextId The ID of the context.
     */
    public function __construct(string $fieldId, int $contextId)
    {
        $this->fieldId = $fieldId;
        $this->contextId = $contextId;
    }
    public function getMethod(): string
    {
        return 'DELETE';
    }
    public function getUri(): string
    {
        return str_replace(array('{fieldId}', '{contextId}'), array($this->fieldId, $this->contextId), '/rest/api/3/field/{fieldId}/context/{contextId}');
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
     * @throws \JiraSdk\Exception\DeleteCustomFieldContextBadRequestException
     * @throws \JiraSdk\Exception\DeleteCustomFieldContextUnauthorizedException
     * @throws \JiraSdk\Exception\DeleteCustomFieldContextForbiddenException
     * @throws \JiraSdk\Exception\DeleteCustomFieldContextNotFoundException
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
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteCustomFieldContextBadRequestException($response);
        }
        if (401 === $status) {
            throw new \JiraSdk\Exception\DeleteCustomFieldContextUnauthorizedException($response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteCustomFieldContextForbiddenException($response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \JiraSdk\Exception\DeleteCustomFieldContextNotFoundException($response);
        }
    }
    public function getAuthenticationScopes(): array
    {
        return array('basicAuth', 'OAuth2');
    }
}